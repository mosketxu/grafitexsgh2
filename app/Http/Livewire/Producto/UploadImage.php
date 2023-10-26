<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use App\Models\ProductoImagen;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

use Image;


class UploadImage extends Component
{
    use WithFileUploads;

    public $producto;
    public $imagen;
    public $imagenes=[];

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

    protected $listeners = [ 'refreshuploadimagen' => '$refresh'];

    public function mount(Producto $producto){
        $this->producto=$producto;
    }

    public function render()
    {
        if(Auth::user()->can('productoimagen.create')){
            $deshabilitado='';
            $deshabilitadocolor='bg-white';
        }else{
            $deshabilitado='disabled';
            $deshabilitadocolor='bg-gray-100';
        }

        $galeria=ProductoImagen::where('producto_id',$this->producto->id)->get();

        return view('livewire.producto.upload-image',compact(['galeria','deshabilitado','deshabilitadocolor']));

    }

    public function save(){
        foreach ($this->imagenes as $imagen) {
            $this->imagen=$imagen;
            $this->saveimagen();
        }

        $notification = array(
            'message' => 'Operación realizada satisfactoriamente!',
            'alert-type' => 'success'
        );
        // return back()->with($notification);
        // $mensaje="Actualizado";
        // $this->dispatchBrowserEvent('notify', $mensaje);

        // return redirect()->route('montador.edittienda',$this->campaigntienda)->with($notification);
        // $this->emit('refreshupdateplan');
    }

    public function saveimagen(){
        $this->validate();

        // Genero el nombre y la ruta que le pondré a la imagen
        $file_name = time().'.'.$this->imagen->extension();
        $file_name = uniqid().now()->timestamp.'.'.$this->imagen->extension();


        $originalPath='storage/producto/'.$this->producto->id.'/';

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

        ProductoImagen::create([
            'producto_id'=>$this->producto->id,
            'imagen'=>$file_name,
        ]);

        // $notification = array(
        //     'message' => 'Imágen subida satisfactoriamente!',
        //     'alert-type' => 'success'
        // );
        // return back()->with($notification);
        $notification = array(
            'message' => 'Proceso finalizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        // $this->dispatchBrowserEvent('notify', $mensaje);
        return redirect()->route('producto.editar',$this->producto)->with($notification);

    }

}
