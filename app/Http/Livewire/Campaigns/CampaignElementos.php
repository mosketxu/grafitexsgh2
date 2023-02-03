<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\CampaignElemento;
use App\Models\CampaignTienda;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class CampaignElementos extends Component{

    use WithFileUploads;

    public $campelemento;
    public $campaign;
    public $imagenelemento;
    public $ruta;
    public $observaciones;
    public $precio;

    protected $rules = [
        'imagenelemento' => 'required|image|mimes:pdf,jpeg,png,jpg,gif,svg|max:12288',
    ];

    public function messages(){
        return [
            'imagenelemento.required'=>'Debes seleccionar una imagen.',
            'imagenelemento.max'=>'El tamaño maximo es 12Mb',
        ];
    }

    public function mount($campelemento,$campaign,$ruta){
        $this->campaign=$campaign;
        $this->campelemento=$campelemento;
        $this->ruta=$ruta;
        $this->observaciones=$campelemento->observaciones;
        $this->precio=$campelemento->precio;

    }

    public function render(){
        $vista=$this->ruta=='campaign.elementos' ? 'livewire.campaigns.campaign-elementos' : 'livewire.campaigns.campaign-elemento';
        return view($vista);
    }

    public function updatedImagenelemento(){
        $this->validate();
        $this->saveimg();
    }


    public function saveinput(){
        $this->campelemento->update([
            'observaciones'=>$this->observaciones,
            'precio'=>$this->precio,
        ]);
        $mensaje="Actualizado";
        $this->dispatchBrowserEvent('notify', $mensaje);

    }

    public function saveimg(){
        $this->validate();

        $campElem=CampaignElemento::find($this->campelemento->elementoId);
        $tienda=CampaignTienda::find($this->campelemento->tienda_id);
        $campaignId=$this->campaign->id;

        $extension=$this->imagenelemento->getClientOriginalExtension();
        $tipo=$this->imagenelemento->getClientMimeType();
        $nombre=$this->imagenelemento->getClientOriginalName();
        $tamanyo=$this->imagenelemento->getSize();

        $file_name=$nombre;


        // Si no existe la carpeta la creo
        $ruta = public_path().'/galeria/'.$campaignId;
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
            mkdir($ruta.'/thumbnails', 0777, true);
        }

        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = $ruta.'/'.$file_name;
        $mi_imagenthumb = $ruta.'/thumbails/'.$file_name;

        if (@getimagesize($mi_imagen))  unlink($mi_imagen);
        if (@getimagesize($mi_imagenthumb)) unlink($mi_imagenthumb);

        // verifico que realmente llega un fichero
        if ($files=$this->imagenelemento) {
            // for save the original image
            $imageUpload=Image::make($files)->encode('jpg');
            $originalPath='galeria/'.$campaignId.'/';
            $imageUpload->save($originalPath.$file_name);
            $this->campelemento->update([
                'imagen'=>$nombre,
            ]);

            Image::make($this->imagenelemento)
            ->resize(null, 144, function ($constraint) {
                $constraint->aspectRatio();
            })
                ->encode('jpg')
                ->save('galeria/'.$campaignId.'/thumbnails/thumb-'.$file_name);
        }
    }
}
