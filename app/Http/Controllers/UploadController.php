<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request){

                // // Genero el nombre y la ruta que le pondré a la imagen
                // $file_name = time().'.'.$request->imagen->extension();
                // $originalPath='storage/plan/'.$request->campaignid.'/'.$request->camptiendaid.'/';

                // // Si no existe la carpeta la creo
                // if (!file_exists($originalPath)) {
                //     mkdir($originalPath, 0777, true);
                //     mkdir($originalPath.'thumbnails', 0777, true);
                // }

                // dd('ls');

        if($request->hasFile('imagenfilepond')){
            $file=$request->file('imagenfilepond');
            $filename=$file->getClientOriginalName();
            $folder=uniqid().'-'.now()->timestamp;
            $file->storeAs('upload/tmp/'.$folder,$filename);
            return $folder;
        }

        return '';
    }

    // public function permisos(){
    //     $originalPath='storage/upload/';
    //     mkdir($originalPath, 0777, true);
    // }
}
