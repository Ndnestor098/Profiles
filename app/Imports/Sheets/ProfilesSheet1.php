<?php

namespace App\Imports\Sheets;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class ProfilesSheet1 implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $code = trim((string)($row['identificador_del_perfil'] ?? ''));
            if (!$code) continue;

            $email = $row['email'] ?? null;
            $date = Carbon::instance(ExcelDate::excelToDateTimeObject($row['fecha_adquisicion']))->format('Y-m-d');

            Profile::updateOrCreate(
                ['profile_code' => $code],
                [
                    'email' => $email,
                    'email_recuperacion' => $row['bind_email'] ?? null,
                    'clave_2fa' => $row['para_clave_2fa'] ?? null,
                    'proveedor' => $row['proveedor'] ?? null,
                    'fecha_adquisicion' => $date,

                    'bind_email' => !empty($row['bind_email']),
                ]
            );
        }
    }

    private function parseExcelDate($value)
    {
        if (!$value) return null;

        // Excel a veces entrega DateTime directo
        if ($value instanceof \DateTimeInterface) {
            return Carbon::instance($value)->format('Y-m-d');
        }

        // si llega string tipo 24/04/2024
        if (is_string($value) && str_contains($value, '/')) {
            return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }

        return null;
    }
}
