<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data = null;
    protected $columna = null;

    public function __construct($data,$columna)
    {
        $this->data = $data;
        $this->columna = $columna;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return $this->columna;
    }
}
