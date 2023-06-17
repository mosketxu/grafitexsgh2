<?php

namespace App\Imports;

use App\Models\Elemento;
use App\Models\Maestro;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MaestrosImport implements ToModel, WithHeadingRow, WithChunkReading
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['ubicacion']=='' || is_null($row['ubicacion'])) $row['ubicacion']="-" ;
        $e=Elemento::elementificador($row['ubicacion'],$row['mobiliario'],$row['prop_elemento'],$row['carteleria'],$row['medida'],$row['material'],$row['unit_x_prop']);
        $observaciones="";
        $udxprop=trim($row['unit_x_prop']);
        if(!is_numeric($udxprop || $udxprop=='0')){
            if(!is_numeric($udxprop)) $observaciones=$udxprop;
            $udxprop='1';
        }
        return new Maestro([
            'store' => trim($row['store_code']),
            'country' => trim($row['country']),
            'name' => trim($row['store_name']),
            'area' => trim($row['area']),
            'segmento' => trim($row['segment_2019']),
            'storeconcept' => trim($row['store_concept']),
            'elementificador'=>$e,
            'ubicacion' => trim($row['ubicacion']),
            'mobiliario' => trim($row['mobiliario']),
            'propxelemento' => trim($row['prop_elemento']),
            'carteleria' => trim($row['carteleria']),
            'medida' => trim($row['medida']),
            'material' => trim($row['material']),
            'unitxprop' =>$udxprop,
            'observaciones'=>$observaciones,
        ]);
    }

    public function chunkSize(): int
    {
        return 300;
    }
}
