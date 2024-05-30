<?php

namespace App\Http\Controllers;

use App\Models\{Campaign,CampaignElemento, CampaignElementoFaltante, CampaignTienda};
use Illuminate\Http\Request;
use App\Exports\{CampaignElemenIdiMatMedMobExport, CampaignElementosExport,CampaignElemenMatExport,CampaignElemenMatMedExport};
use Maatwebsite\Excel\Facades\Excel;
Use Image;

class CampaignElementoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($campaignId, Request $request){
        $busqueda = '';
        if ($request->busca) $busqueda = $request->busca;

        $campaign = Campaign::find($campaignId);

        $elementos= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->search2($request->busca)
        ->where('campaign_id',$campaignId)
        ->select('campaign_elementos.id as id','campaign_elementos.store_id as store_id','name','country','idioma','area','segmento','storeconcept',
            'ubicacion','mobiliario','propxelemento','carteleria','medida',
            'material','familia','precio','unitxprop','imagen','observaciones')
        ->orderBy('store_id')
        ->paginate(10);

        return view('campaign.elementos.index', compact('campaign','elementos','busqueda'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($campaignId,$elementoId){
        $campaign=Campaign::find($campaignId);
        $campaignelemento=CampaignElemento::where('id',$elementoId)->first();
        return view('campaign.elementos.edit',compact('campaign','campaignelemento'));
    }

    public function editelemento($campaignId,$elementoId){
        $campaign=Campaign::find($campaignId);
        $campaignelemento=CampaignElemento::where('id',$elementoId)->first();

        return view('campaign.elementos.edit',compact('campaign','campaignelemento'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        // solo actulizo los campos, la imagen no lo hago desde aquí;
        $campElem=json_decode($request->campaignelemento);
        $campaignelem=CampaignElemento::find($campElem->id);
        $campaignelem->observaciones=$request->observaciones;
        $campaignelem->precio=$request->precio;
        $campaignelem->save();

        $campaign=Campaign::find($campaignelem->campaign_id);
        $elementos=CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->where('campaign_id',$campaignelem->campaign_id)
        ->orderBy('store_id')
        ->paginate('5');

        return view('campaign.elementos.index',compact('campaign','elementos'));

    }


    public function updateimagenindex(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:pdf,jpeg,png,jpg,gif,svg|max:12288',
            ]);
        $campElem=CampaignElemento::find($request->elementoId);
        $tienda=CampaignTienda::find($campElem->tienda_id);
        $campaignId=$tienda->campaign_id;

        // json_decode($request->campaigngaleria);

        //Por si me interesa estos datos de la imagen
        $extension=$request->file('photo')->getClientOriginalExtension();
        $tipo=$request->file('photo')->getClientMimeType();
        $nombre=$request->file('photo')->getClientOriginalName();
        $tamanyo=$request->file('photo')->getSize();

        // Genero el nombre que le pondré a la imagen
        $file_name=$nombre;

        // Si no existe la carpeta la creo
        $ruta = public_path().'/storage/galeria/'.$campaignId;
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
            mkdir($ruta.'/thumbnails', 0777, true);
        }


        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = $ruta.'/'.$file_name;
        $mi_imagenthumb = $ruta.'/thumbails/'.$file_name;

        if (@getimagesize($mi_imagen)) {
            unlink($mi_imagen);
        }
        if (@getimagesize($mi_imagenthumb)) {
            unlink($mi_imagenthumb);
        }

        // verifico que realmente llega un fichero
        if($files=$request->file('photo')){
            // for save the original image
            $imageUpload=Image::make($files)->encode('jpg');
            $originalPath='storage/galeria/'.$campaignId.'/';
            $imageUpload->save($originalPath.$file_name);
            $campElem->imagen=$nombre;
            $campElem->save();

            Image::make($request->file('photo'))
                ->resize(null,144,function($constraint){
                    $constraint->aspectRatio();
                })
                ->encode('jpg')
                ->save('storage/galeria/'.$campaignId.'/thumbnails/thumb-'.$file_name);
        }

        // grabo el nuevo nombre de la imagen en

        $campElem->imagen = $file_name;
        $campElem->save();

        return response()->json($campElem);
    }

    public function exportConteoIdiomaMatMedMob($campaignId){
        return Excel::download(new CampaignElemenIdiMatMedMobExport($campaignId), 'estadistica.xlsx');
    }

    public function exportCampaignElementos($campaignId){
        return Excel::download(new CampaignElementosExport($campaignId), 'campaignelementos.xlsx');
    }

    public function exportCampaignElementosMat($campaignId){
        return Excel::download(new CampaignElemenMatExport($campaignId), 'materiales.xlsx');
    }

    public function exportCampaignElementosMatMed($campaignId){
        return Excel::download(new CampaignElemenMatMedExport($campaignId), 'materialesmedidas.xlsx');
    }


}
