<?php

namespace App\Http\Livewire\Campaigns\Plan;

use App\Models\CampaignTienda;
use App\Models\CampaignTiendaGaleria;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class UpdatePlan extends Component
{

    use WithFileUploads;

    public $imagen;
    public $ruta;
    public $imagenes=[];
    public $campaigntienda;
    public $fechamontador1;
    public $fechamontador2;
    public $fechamontador3;


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

    protected $listeners = [ 'refreshupdateplan' => '$refresh'];

    public function mount(CampaignTienda $campaigntienda,$ruta){
        $this->campaigntienda=$campaigntienda;
        $this->fechamontador1=$campaigntienda->fechamontador1;
        $this->fechamontador2=$campaigntienda->fechamontador2;
        $this->fechamontador3=$campaigntienda->fechamontador3;
        $this->ruta=$ruta;
    }

    public function render(){
        if(Auth::user()->can('plan.create')){
            $deshabilitado='';
            $deshabilitadocolor='bg-white';
        }else{
            $deshabilitado='disabled';
            $deshabilitadocolor='bg-gray-100';
        }
        if(Auth::user()->can('plantienda.update')){
            $deshabilitadofechamontador='';
            $deshabilitadofechamontadorcolor='bg-white';
        }else{
            $deshabilitadofechamontador='disabled';
            $deshabilitadofechamontadorcolor='bg-gray-100';
        }

        $galeria=CampaignTiendaGaleria::where('campaigntienda_id',$this->campaigntienda->id)->get();

        return view('livewire.campaigns.plan.update-plan',compact(['galeria','deshabilitado','deshabilitadocolor','deshabilitadofechamontador','deshabilitadofechamontadorcolor']));
    }

    public function save(){

        foreach ($this->imagenes as $imagen) {
            $this->imagen=$imagen;
            $this->saveimagen();
        }

        $this->campaigntienda->fechamontador1=$this->fechamontador1;
        $this->campaigntienda->fechamontador2=$this->fechamontador2;
        $this->campaigntienda->fechamontador3=$this->fechamontador3;
        $this->campaigntienda->save();

        $notification = array(
            'message' => 'Operación realizada satisfactoriamente!',
            'alert-type' => 'success'
        );
        // return back()->with($notification);
        $mensaje="Actualizado";
        $this->dispatchBrowserEvent('notify', $mensaje);

        if($this->ruta=='plan.index')
            return redirect()->route('plan.edit',$this->campaigntienda);
        else
            return redirect()->route('montador.edittienda',$this->campaigntienda)->with($notification);
    }

    public function saveimagen(){
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

        // $notification = array(
        //     'message' => 'Imágen subida satisfactoriamente!',
        //     'alert-type' => 'success'
        // );
        // return back()->with($notification);
    }
}
