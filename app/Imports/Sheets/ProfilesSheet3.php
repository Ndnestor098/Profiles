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
}
