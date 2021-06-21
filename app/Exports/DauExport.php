<?php

namespace App\Exports;

use App\Dau;
use Maatwebsite\Excel\Concerns\FromCollection;

class DauExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dau::all();
    }
}
