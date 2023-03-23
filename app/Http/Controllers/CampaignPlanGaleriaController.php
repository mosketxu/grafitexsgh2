<?php

namespace App\Http\Controllers;

// use App\Http\Livewire\Campaigns\CampaignGaleria;

use App\Models\Campaign;
use App\Models\CampaignTienda;
use App\Models\CampaignTiendaGaleria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;


class CampaignPlanGaleriaController extends Controller
{

    public function uploadimagentienda(Request $request, CampaignTienda $campaigntienda){
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Genero el nombre y la ruta que le pondré a la imagen
        $file_name = time().'.'.$request->imagen->extension();
        $file_name = uniqid().now()->timestamp.'.'.$request->imagen->extension();


        $originalPath='storage/plan/'.$campaigntienda->campaign_id.'/'.$campaigntienda->id.'/';

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
                // ->save($originalPath.'thumb-'.$file_name);
                ->save($originalPath.'thumbnails/thumb-'.$file_name);
        }

        CampaignTiendaGaleria::create([
            'campaigntienda_id'=>$campaigntienda->id,
            'imagen'=>$file_name,
            // 'observaciones'=>$request->observaciones,
        ]);

        $notification = array(
            'message' => 'Imágen subida satisfactoriamente!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    // public function deleteimagentienda(CampaignTienda $camptienda, CampaignTiendaGaleria $imagen){
        //

    public function deleteimagentienda($camptienda, $imagen){
        $img=CampaignTiendaGaleria::find($imagen);
        if($img){
            CampaignTiendaGaleria::where('id','=',$img->id)->delete();
            $camp=CampaignTienda::find($img->campaigntienda_id);
            $ruta=$camp->campaign_id.'/'.$img->campaigntienda_id.'/';
            $exists = Storage::disk('plan')->exists($ruta.$img->imagen);
            if ($exists) {
                Storage::disk('plan')->delete($ruta.$img->imagen);
                Storage::disk('plan')->delete($ruta.'/thumbnails/thumb-'.$img->imagen);
            }
            $notification = array('message' => 'La imagen ha sido borrada.','alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $notification = array('message' => 'La imagen no existe.','alert-type' => 'alarm');
            return redirect()->back()->with($notification);
        }
    }
}
