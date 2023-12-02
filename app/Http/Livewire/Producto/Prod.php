<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use App\Models\TiendaTipo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;


class Prod extends Component
{

    public $producto;
    public $prod;
    public $tiendatipo_id;
    public $descripcion;
    public $precio='0';
    public $activo='1';
    public $ruta;

    public $deshabilitado='';

    protected function rules(){
        return [
            'prod'=>'required|unique:productos,producto',
            'tiendatipo_id'=>'nullable',
            'descripcion'=>'nullable',
            'precio'=>'nullable|numeric',
            'activo'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'producto.required' => 'El nombre del producto es necesario',
            'precio' => 'El Precio debe ser un valor numérico',
        ];
    }

    public function mount(Producto $producto, $ruta){
        $this->producto=$producto;
        if($producto->id){
            $this->prod=$producto->producto;
            $this->tiendatipo_id=$producto->tiendatipo_id;
            $this->descripcion=$producto->descripcion;
            $this->precio=!$producto->precio? '0': $producto->precio ;
            $this->activo=$producto->activo;
        }
        $this->ruta=$ruta;
        $this->deshabilitado=Auth::user()->hasRole(['tienda','sgh']) ? 'disabled' : '';
    }

    public function render(){
        // $tiendatipos=TiendaTipo::where('tiendatipo','<>','Grafitex')->orderBy('tiendatipo')->get();
        $tiendatipos=TiendaTipo::orderBy('tiendatipo')->get();
        if (!$this->activo) $this->activo=false;
        $producto=$this->producto;

        return view('livewire.producto.prod',compact('tiendatipos'));
    }

    public function save(){
        if(!$this->precio) $this->precio='0';
        if($this->producto->id){
            $i=$this->producto->id;
            $this->validate([
                'prod'=>[
                    'required',
                    Rule::unique('productos','producto')->ignore($this->producto->id)],
            ]);
            $mensaje="Producto actualizado satisfactoriamente";
        }else{
            $this->validate([
                'prod'=>[
                    'required',
                    Rule::unique('productos','producto')],
                'tiendatipo_id'=>'nullable',
                'descripcion'=>'nullable',
                'precio'=>'nullable|numeric',
                'activo'=>'nullable',
            ]);
            $i=$this->producto->id;
            $mensaje="Producto creado satisfactoriamente";
        }

        $producto=producto::updateOrCreate([
            'id'=>$i
            ],
            [
            'producto'=>$this->prod,
            'tiendatipo_id'=>$this->tiendatipo_id,
            'descripcion'=>$this->descripcion,
            'precio'=>$this->precio,
            'activo'=>$this->activo,
            ]
        );

        $this->producto=$producto;

        $this->dispatchBrowserEvent('notify', $mensaje);
        // return redirect()->route('producto.edit',$producto)->with($notification);
    }
}
