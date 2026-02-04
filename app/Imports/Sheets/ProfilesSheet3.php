<?php

namespace App\Imports\Sheets;

use App\Models\Profile;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class ProfilesSheet3 implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $code = trim((string)($row['identificador_del_perfil'] ?? ''));
            if (!$code) continue;

            Profile::updateOrCreate(
                ['profile_code' => $code],
                [
                    'lugar_imagen' => $row['lugar'] ?? null,
                    'ciudad' => $row['ciudad'] ?? null,
                ]
            );
        }
    }

    private function parseExcelDateTime($value)
    {
        if (!$value) return null;

        if ($value instanceof \DateTimeInterface) {
            return Carbon::instance($value)->toDateTimeString();
        }

        // si fuese string dd/mm/yyyy hh:mm
        if (is_string($value)) {
            $value = trim($value);
            try {
                return Carbon::parse($value)->toDateTimeString();
            } catch (\Throwable $e) {
                return null;
            }
        }

        return null;
    }
}
