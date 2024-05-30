<?php

namespace App\Http\Livewire\ProductoCategoria;

use App\Models\ProductoCategoria;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoCategorias extends Component
{
    use WithPagination;

    public $search='';


    public function render(){

        $productocategorias=ProductoCategoria::query()
        ->search('productocategoria',$this->search)
        ->orderBy('productocategoria')
        ->get();
        return view('livewire.producto-categoria.producto-categorias',compact('productocategorias'));
    }

    public function updatingSearch(){$this->resetPage();}

    public function changeValor(ProductoCategoria $productocategoria,$campo,$valor)
    {
        $productocategoria->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actualizado con éxito.');
    }

    public function delete($productocategoriaId)
    {
        $productocategoria = ProductoCategoria::find($productocategoriaId);
        if ($productocategoria ) {
            $productocategoria->delete();
            $this->dispatchBrowserEvent('notify', 'Categoria de productos eliminada');
        }
    }

}
