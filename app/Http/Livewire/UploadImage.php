<?php

namespace App\Http\Livewire;

use App\Models\CampaignTienda;
use App\Models\CampaignTiendaGaleria;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Image;

class UploadImage extends Component
{

    use WithFileUploads;

    public $imagen;
    public $imagenes=[];
    public $campaigntienda;


    protected function rules(){
        return [
            'imagen'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:12288',
        ];
    }

    public function messages(){
        return [
            'imagen.required'=>'Hay que seleccionar una imagen',
            'imagen.image'=>'El archivo debe ser una imagen',
            'imagen.mimes'=>'El tipo del archivo debe ser jpeg,png,jpg,gif o svg',
            'imagen.max'=>'El tamaño máximo es 12Mb',
        ];
    }

    public function mount(CampaignTienda $campaigntienda){
        $this->campaigntienda=$campaigntienda;
    }



    public function render(){
        // dd($this->campaigntienda);
        return view('livewire.upload-image');
    }

    // public function updatedImagen(){
        // dd('sdf');
        // $this->validate(['imagen'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:12288']);
    // }

    public function save(){
        // dd($this->imagenes);
        foreach ($this->imagenes as $imagen) {
            $this->imagen=$imagen;
            $this->saveuna();
        }
    }

    public function saveuna(){
        $this->validate();

        // Genero el nombre y la ruta que le pondré a la imagen
        $file_name = time().'.'.$this->imagen->extension();
        $file_name = uniqid().now()->timestamp.'.'.$this->imagen->extension();

        $originalPath='storage/plan/'.$this->campaigntienda->campaign_id.'/'.$this->campaigntienda->id.'/';

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

        if ($files=$this->imagen) {
            // for save the original
            $imageUpload=Image::make($files)->encode('jpg');
            $imageUpload->save($originalPath.$file_name);
            //redimensionado
            Image::make($this->imagen)
                ->resize(null,144,function($constraint){
                    $constraint->aspectRatio();
                })
                // ->save($originalPath.'thumb-'.$file_name);
                ->save($originalPath.'thumbnails/thumb-'.$file_name);
        }

        CampaignTiendaGaleria::create([
            'campaigntienda_id'=>$this->campaigntienda->id,
            'imagen'=>$file_name,
            // 'observaciones'=>$request->observaciones,
        ]);

        $notification = array(
            'message' => 'Imágen subida satisfactoriamente!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
