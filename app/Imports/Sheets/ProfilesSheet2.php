<?php

namespace App\Imports\Sheets;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ProfilesSheet2 implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        // 2) la primera fila del sheet4 son headers -> saltar
        $rows = $rows->slice(1)->values();

        foreach ($rows as $i => $row) {

            $code = trim((string)($row['hacemos_los_primeros_cambios'] ?? ''));
            if (!$code) continue;

            // columnas por índice (según la hoja)
            $nombre   = $row['nuevo_nombre'] ?? '';
            $password = $row['nueva_contrasena_del_mail_principal'] ?? '';
            $emailRec = $row['email_de_recuperacion'] ?? '';
            $passRec = $row['contrasena_mail_de_recuperacion'] ?? '';

            Log::info([
                'profileCode' => $code,
                'nombre' => $nombre,
                'password' => $password,
                'emailRec' => $emailRec,
                'passRec' => $passRec,
            ]);

            Profile::updateOrCreate(
                ['profile_code' => $code],
                [
                    'nombre' => $nombre ?: null,
                    'password' => $password ?: null,
                    'email_recuperacion' => $emailRec ?: null,
                    'password_recuperacion' => $passRec ?: null,
                ]
            );
        }
    }
}
