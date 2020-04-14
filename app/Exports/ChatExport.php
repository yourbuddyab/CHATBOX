<?php

namespace App\Exports;

use App\chat;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChatExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return chat::all();
    }
}
