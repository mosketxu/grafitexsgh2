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

        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $filename=$file->getClientOriginalName();
            $folder=uniqid().'-'.now()->timestamp;
            $file->storeAs('upload/tmp'.$folder,$filename);
            return $folder;
        }

        return '';
    }

    public function permisos()
    {
        // dd('d');
                // Genero el nombre y la ruta que le pondré a la imagen
                // $file_name = time().'.'.$request->imagen->extension();
                $originalPath='storage/upload/';

                // Si no existe la carpeta la creo
                    mkdir($originalPath, 0777, true);

                // dd('ls');
    }
}
