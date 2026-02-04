<?php

namespace App\Imports\Sheets;

use App\Models\Profile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProfilesSheet4 implements ToCollection
{
    public function collection(Collection $rows)
    {
        // 1) obtener profile_codes ordenados por "profile_code" (p1..pN)
        $codes = Profile::query()
            ->orderByRaw("CAST(SUBSTRING(profile_code, 2) AS UNSIGNED)") // p1,p2...
            ->pluck('profile_code')
            ->values();

        // 2) la primera fila del sheet4 son headers -> saltar
        $rows = $rows->slice(1)->values();

        foreach ($rows as $i => $row) {

            $profileCode = $codes[$i] ?? null;
            if (!$profileCode) continue;

            // columnas por índice (según la hoja)
            $password = trim((string)($row[0] ?? ''));
            $emailRec      = trim((string)($row[1] ?? ''));
            $passRec       = trim((string)($row[2] ?? ''));
            $nuevoNombre   = trim((string)($row[3] ?? ''));



            Profile::where('profile_code', $profileCode)->update([
                'nombre' => $nuevoNombre ?: null,

                // actualiza email recuperación / pass recuperación
                'email_recuperacion' => $emailRec ?: null,
                'password_recuperacion' => $passRec ?: null,

                // si hay nueva contraseña => actualiza hash
                'password' => $password,
            ]);
        }
    }
}
