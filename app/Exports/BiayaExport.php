<?php

namespace App\Exports;

use App\Biaya;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiayaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Biaya::all();
    }
}
