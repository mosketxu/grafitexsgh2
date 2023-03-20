<?php

namespace App\Http\Controllers;

// use App\Http\Livewire\Campaigns\CampaignGaleria;
use App\Models\CampaignTiendaGaleria;
use Illuminate\Http\Request;
use Image;


class CampaignPlanGaleriaController extends Controller
{

    public function updateimagentienda(Request $request){

        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Por si me interesa estos datos de la imagen
        $extension=$request->file('imagen')->getClientOriginalExtension();
        $tipo=$request->file('imagen')->getClientMimeType();
        $nombre=$request->file('imagen')->getClientOriginalName();
        $tamayo=$request->file('imagen')->getSize();

        // Genero el nombre y la ruta que le pondré a la imagen
        $file_name = time().'.'.$request->imagen->extension();
        $originalPath='storage/plan/'.$request->campaignid.'/'.$request->camptiendaid.'/';

        // Si no existe la carpeta la creo
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
            mkdir($originalPath.'thumbnails', 0777, true);
        }

        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = public_path().$originalPath.$file_name;
        $mi_imagenthumb = public_path().$originalPath.'thumbnails/thumb_'.$file_name;
        if (@getimagesize($mi_imagen)) unlink($mi_imagen);
        if (@getimagesize($mi_imagenthumb)) unlink($mi_imagenthumb);

        if ($files=$request->file('imagen')) {
            // for save the original
            $imageUpload=Image::make($files)->encode('jpg');
            $imageUpload->save($originalPath.$file_name);
            //redimensionado
            Image::make($request->file('imagen'))
                ->resize(null,144,function($constraint){
                    $constraint->aspectRatio();
                })
                ->save($originalPath.'thumbnails/thumb-'.$file_name);
        }

        CampaignTiendaGaleria::create([
            'campaigntienda_id'=>$request->camptiendaid,
            'imagen'=>$file_name,
            'observaciones'=>$request->observaciones,
        ]);

        $notification = array(
            'message' => 'Imágen subida satisfactoriamente!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
