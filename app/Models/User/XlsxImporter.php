<?php

namespace App\Models\User;

use App\User;
use Illuminate\Http\UploadedFile;

class XlsxImporter
{
    /**
     * @param UploadedFile $source
     * @return bool
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function importUsers(UploadedFile $source): bool
    {
        ini_set('memory_limit', '125M');
        set_time_limit(0);
        fastexcel()->import($source->getRealPath(), function ($line) {
            return User::create([
                'first_name' => $line['First Name'],
                'last_name' => $line['Last Name'],
                'gender' => $line['Gender'],
                'country' => $line['Country'],
                'age' => $line['Age'],
                'created' => $line['Created'],
            ]);
        });

        return true;
    }
}
