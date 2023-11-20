<?php

namespace App\Http\Livewire\PeticionDetalle;

use App\Models\Peticion;
use App\Models\PeticionDetalle;
use App\Models\Producto;
use App\Models\ProductoImagen;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class PetiDetalle extends Component
{

    public $peticion;
    public $petidetalle;
    public $peticion_id;
    public $producto_id;
    public $comentario;
    public $unidades='1';
    public $preciounidad='0';
    public $total='0';
    public $observaciones;
    public $ruta;
    public $deshabilitado='';
    public $imagenes;
    public $producto;
    public $productodescrip;

    protected function rules(){
        return [
            'producto_id'=>'required',
            'unidades'=>'numeric|required',
            'preciounidad'=>'nullable|numeric',
            'total'=>'nullable|numeric',
            'observaciones'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'peticion_id.required' => 'El detalle debe pertenecer a una petición',
            'producto_id.required' => 'Deber seleccionar un producto',
            'unidades_id.required' => 'Deber seleccionar las unidades',
        ];
    }

    public function mount(Peticion $peticion,PeticionDetalle $petidetalle, $ruta){
        $this->peticion=$peticion;
        $this->petidetalle=$petidetalle;
        if($petidetalle->id){
            $this->peticion_id=$petidetalle->peticion_id;
            $this->producto_id=$petidetalle->producto_id;
            $this->comentario=$petidetalle->comentario;
            $this->unidades=$petidetalle->unidades;
            $this->preciounidad=$petidetalle->preciounidad;
            $this->total=$petidetalle->total;
            $this->observaciones=$petidetalle->observaciones;
            $this->producto=Producto::find($petidetalle->producto_id);
            $this->productodescrip=$this->producto->descripcion;
        }
        $this->imagenes=ProductoImagen::where('producto_id',$petidetalle->producto_id)->get();
    }

    public function render(){
        $productos=Producto::with('imagenes')->where('activo','1')->get();
        return view('livewire.peticion-detalle.peti-detalle',compact(['productos']));
    }

    public function updatedProductoId() {
        $producto=Producto::find($this->producto_id);
        $this->productodescrip=$producto->descripcion;
        $this->imagenes=ProductoImagen::where('producto_id',$this->producto_id)->get();
        $this->preciounidad=$producto->precio;
        $this->total=round($this->preciounidad * $this->unidades,2);
    }
    public function updatedPreciounidad() {$this->total=round($this->preciounidad * $this->unidades,2);}
    public function updatedUnidades() {$this->total=round($this->preciounidad * $this->unidades,2);
    }

    public function save(){
        $this->validate();
        $i=$this->petidetalle->id ? $this->petidetalle->id : '';

        $petidet=PeticionDetalle::updateOrCreate([
            'id'=>$i
            ],
            [
                'peticion_id'=>$this->peticion->id,
                'producto_id'=>$this->producto_id,
                'comentario'=>$this->comentario,
                'unidades'=>$this->unidades,
                'preciounidad'=>$this->preciounidad,
                'total'=>$this->total,
                'observaciones'=>$this->observaciones,
            ]
        );

        $this->petidetalle=$petidet;

        $totpeticion=PeticionDetalle::where('peticion_id',$this->peticion->id)->sum('total');

        $this->peticion->total=$totpeticion;
        $this->peticion->save();
        $this->dispatchBrowserEvent('notify', 'Producto añadido satisfactoriamente');
        // return redirect()->route('producto.edit',$producto)->with($notification);
    }
}
