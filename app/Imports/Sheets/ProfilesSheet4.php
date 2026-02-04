<?php

namespace App\Imports\Sheets;

use App\Models\Profile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProfilesSheet4 implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $code = trim((string)($row[1] ?? ''));
            if (!$code) continue;

            Profile::updateOrCreate(
                ['profile_code' => $code],
                [
                    'software' => $row[5],
                ]
            );
        }
    }
}
