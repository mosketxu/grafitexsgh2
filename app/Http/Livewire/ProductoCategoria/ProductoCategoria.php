<?php

namespace App\Http\Livewire\ProductoCategoria;

use App\Models\ProductoCategoria as ModelsProductoCategoria;
use Livewire\Component;
use Illuminate\Validation\Rule;

class ProductoCategoria extends Component
{

    public $productocategoria;
    public $categoria;
    public $ruta;
    public $deshabilitado='';

    protected function rules(){
        return [
            'categoria'=>'required|unique:producto_categorias,productocategoria',
        ];
    }

    public function messages(){
        return [
            'productocategoria.required' => 'La categoria es necesaria.',
            'productocategoria.unique' => 'La categoria ya existe',
        ];
    }

    public function mount(ModelsProductoCategoria $productocategoria, $ruta){
        $this->productocategoria=$productocategoria;
        if($productocategoria->id){
            $this->categoria=$productocategoria->productocategoria;
        }
        $this->ruta=$ruta;
    }

    public function render(){
        $productocategorias=ModelsProductoCategoria::orderBy('productocategoria')->get();
        $productocategoria=$this->productocategoria;

        return view('livewire.producto-categoria.producto-categoria',compact('productocategorias'));
    }

    public function save(){
        if($this->productocategoria->id){
            $i=$this->productocategoria->id;
            $this->validate([
                'categoria'=>[
                    'required',
                    Rule::unique('producto_categorias','productocategoria')->ignore($this->productocategoria->id)],
            ]);
            $mensaje="Categoria actualizada satisfactoriamente";
        }else{
            $this->validate([
                'categoria'=>[
                    'required',
                    Rule::unique('producto_categorias','productocategoria')],
            ]);
            $i=$this->productocategoria->id;
            $mensaje="Categoria creada satisfactoriamente";
        }

        $productocategoria=ModelsProductoCategoria::updateOrCreate([
            'id'=>$i
            ],
            [
            'productocategoria'=>$this->categoria,
            ]
        );

        $this->productocategoria=$productocategoria;

        $this->dispatchBrowserEvent('notify', $mensaje);
    }

}
