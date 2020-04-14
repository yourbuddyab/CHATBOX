<?php

namespace App\Imports;

use App\chat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class chatImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new chat([
            'nameid'     => $row['nameid'],
            'message'    => $row['message'], 
        ]);
    }
}
