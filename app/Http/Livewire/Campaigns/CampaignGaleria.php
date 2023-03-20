<?php

namespace App\Http\Livewire\Campaigns;

use Livewire\Component;
use Livewire\WithFileUploads;
use Image;



class CampaignGaleria extends Component{

    use WithFileUploads;

    public $campelemento;
    public $campaign;
    public $imagenelemento;
    public $ruta;

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
    }

    public function render(){
        $vista= $this->ruta=="campaign.galeria.edit" ? 'livewire.campaigns.campaign-galeriaedit' : 'livewire.campaigns.campaign-galeria' ;
        return view($vista);
    }

    public function updatedImagenelemento(){
        $this->validate();
        if ($this->ruta=="campaign.galeria.edit")
            $this->saveimgindex();
        else
            $this->saveimgindex();
            // $this->saveimg();
    }


    public function saveimgindex(){
        $this->validate();
        $campGal=$this->campelemento;
        //Por si me interesa estos datos de la imagen
        $extension=$this->imagenelemento->getClientOriginalExtension();
        $tipo=$this->imagenelemento->getClientMimeType();
        $nombre=$this->imagenelemento->getClientOriginalName();
        $tamayo=$this->imagenelemento->getSize();

        // Genero el nombre que le pondré a la imagen
        $file_name=$campGal->elemento.'.jpg';
        $originalPath='storage/galeria/'.$this->campaign->id.'/';

        // Si no existe la carpeta la creo
        // $ruta = public_path().'storage/galeria/'.$this->campaign->id;
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
            mkdir($originalPath.'thumbnails', 0777, true);
        }

        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = public_path().$originalPath.$file_name;
        $mi_imagenthumb = public_path().$originalPath.'thumbnails/thumb_'.$file_name;
        if (@getimagesize($mi_imagen)) unlink($mi_imagen);
        if (@getimagesize($mi_imagenthumb)) unlink($mi_imagenthumb);


        // verifico que realmente llega un fichero
        if ($files=$this->imagenelemento) {
             // for save the original
            $imageUpload=Image::make($files)->encode('jpg');
            // $originalPath='storage/galeria/'.$this->campaign->id.'/';
            $imageUpload->save($originalPath.$file_name);
             //redimensionando
            Image::make($this->imagenelemento)
            ->resize(null,144,function($constraint){
                $constraint->aspectRatio();
            })
            ->save($originalPath.'thumbnails/thumb-'.$file_name);
        }
        $this->campelemento->imagen=$file_name;
        $this->campelemento->save();
    }

}
