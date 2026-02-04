<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProfilesImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            0 => new Sheets\ProfilesSheet1(),
            1 => new Sheets\ProfilesSheet2(),
            2 => new Sheets\ProfilesSheet3(),
            // 2 => new Sheets\ProfilesSheet4(),
        ];
    }
}
