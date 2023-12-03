<?php

namespace App\Http\Livewire\PeticionDetalle;

use App\Http\Livewire\TiendaTipo\TiendaTipo;
use App\Models\Peticion;
use App\Models\PeticionDetalle;
use App\Models\Producto;
use App\Models\ProductoImagen;
use App\Models\Store;
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

    public function mount(Peticion $peticion,PeticionDetalle $peticiondetalle, $ruta){
        $this->peticion=$peticion;
        $this->petidetalle=$peticiondetalle;
        if($peticiondetalle->id){
            $this->peticion_id=$peticiondetalle->peticion_id;
            $this->producto_id=$peticiondetalle->producto_id;
            $this->comentario=$peticiondetalle->comentario;
            $this->unidades=$peticiondetalle->unidades;
            $this->preciounidad=$peticiondetalle->preciounidad;
            $this->total=$peticiondetalle->total;
            $this->observaciones=$peticiondetalle->observaciones;
            $this->producto=Producto::find($peticiondetalle->producto_id);
            $this->productodescrip=$this->producto->descripcion;
        }
        $this->imagenes=ProductoImagen::where('producto_id',$peticiondetalle->producto_id)->get();
    }

    public function render(){
        $estienda=Auth::user()->hasRole('tienda')==true ? '1' : '';
        $tiendatipo=Store::find(Auth::user()->name)->tiendatipo_id;

        $productos=Producto::with('imagenes')
            ->when(!empty($estienda),function($query) use($tiendatipo){return $query->where('tiendatipo_id',$tiendatipo);})
            ->where('activo','1')
            ->get();
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
