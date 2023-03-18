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

    public function saveimgBorrar(){

        //  creo    que no lo uso
        $this->validate();

        $campGal=$this->campelemento;

        //Por si me interesa estos datos de la imagen
        $extension=$this->imagenelemento->getClientOriginalExtension();
        $tipo=$this->imagenelemento->getClientMimeType();
        $nombre=$this->imagenelemento->getClientOriginalName();
        $tamayo=$this->imagenelemento->getSize();

        // Genero el nombre que le pondré a la imagen
        $file_name=$campGal->elemento.'-'.$campGal->campaign_id.'.'.$extension;
        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = public_path().'/galeria/'.$file_name;
        $mi_imagenthumb = public_path().'/galeria/thumbails/thumb-'.$file_name;
        if (@getimagesize($mi_imagen)) {
            unlink($mi_imagen);
        }
        if (@getimagesize($mi_imagenthumb)) {
            unlink($mi_imagenthumb);
        }

        // verifico que realmente llega un fichero
        if ($files=$this->imagenelemento) {
            // for save the original image
            // for save the original
            $imageUpload=Image::make($files);
            $originalPath='galeria/';
            $imageUpload->save($originalPath.$file_name);
            //redimensionando
            Image::make($this->imagenelemento)
            ->resize(null,144,function($constraint){
                $constraint->aspectRatio();
            })
            ->save('galeria/thumbnails/thumb-'.$file_name);
        }
        dd($file_name);

        // $campaigngaleria=CampaignGaleria::find($campGal->id);
        $this->campelemento->imagen=$file_name;
        $this->campelemento->save();
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

        // Si no existe la carpeta la creo
        $ruta = public_path().'/galeria/'.$this->campaign->id;

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
        if ($files=$this->imagenelemento) {
             // for save the original
            $imageUpload=Image::make($files)->encode('jpg');
            $originalPath='galeria/'.$this->campaign->id.'/';
            $imageUpload->save($originalPath.$file_name);
             //redimensionando
            Image::make($this->imagenelemento)
            ->resize(null,144,function($constraint){
                $constraint->aspectRatio();
            })
            ->save('galeria/'.$this->campaign->id.'/thumbnails/thumb-'.$file_name);
        }

        // $campaigngaleria=CampaignGaleria::find($campGal->id);
        // $campaigngaleria->imagen = $file_name;
        // $campaigngaleria->save();
        $this->campelemento->imagen=$file_name;
        $this->campelemento->save();

    }

}
