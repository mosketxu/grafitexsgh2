<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoImagen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoImagenController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:productoimagen.index')->only('index','show');
        $this->middleware('can:productoimagen.edit')->only('show','edit','update','create','deleteimagen');
    }


    public function deleteimagen($producto, $imagen){
        $img=ProductoImagen::find($imagen);
        if($img){
            ProductoImagen::where('id','=',$img->id)->delete();
            $prod=Producto::find($img->producto_id);
            $ruta=$prod->producto_id.'/';
            $exists = Storage::disk('producto')->exists($ruta.$img->imagen);
            if ($exists) {
                Storage::disk('producto')->delete($ruta.$img->imagen);
                Storage::disk('producto')->delete($ruta.'/thumbnails/thumb-'.$img->imagen);
            }
            $notification = array('message' => 'La imagen ha sido borrada.','alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $notification = array('message' => 'La imagen no existe.','alert-type' => 'alarm');
            return redirect()->back()->with($notification);
        }
    }

}
