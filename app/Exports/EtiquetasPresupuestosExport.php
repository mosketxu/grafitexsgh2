<?php

namespace App\Exports;

use App\Models\Store;
use Maatwebsite\Excel\Concerns\FromCollection,Maatwebsite\Excel\Concerns\WithHeadings;

class EtiquetasPresupuestosExport implements FromCollection,WithHeadings
{

    protected $peticiones;
    protected $today;

    function __construct($peticiones,$today) {
        $this->peticiones = $peticiones;
        $this->today = $today;
    }

    public function headings(): array
    {
        return [
            'Nº Peticion',
            'Petición',
            'Fecha',
            'Estado',
            'Total',
            'Observaciones',
            'Peticionario',
            'Email',
            'Producto',
            'Descripción',
            'Comentario',
            'Uds.',
            'Precio Ud.',
            'Total',
            'Obs.',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){

        return $this->peticiones;

    }
}
