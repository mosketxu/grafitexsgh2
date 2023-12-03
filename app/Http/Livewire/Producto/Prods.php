<?php

namespace App\Http\Livewire\Producto;

use Livewire\Component;
use App\Models\Producto;
use App\Models\TiendaTipo;
use Livewire\WithPagination;

class Prods extends Component
{
    use WithPagination;

    public $search='';
    public $filtroestado='';
    public $filtrotiendatipo='';
    public $estados='';


    public Producto $producto;

    public function render(){
        $productos=Producto::query()
            ->with('imagenes')
            ->search('producto',$this->search)
            ->when($this->filtrotiendatipo!='', function ($query) {
                    $query->where('tiendatipo_id', $this->filtrotiendatipo);
                })
            ->when($this->filtroestado!='', function ($query) {
                    $query->where('activo', $this->filtroestado);
                })
            ->orderBy('producto','asc')
            ->get();
        $tiendatipos=TiendaTipo::orderBy('tiendatipo')->get();

        return view('livewire.producto.prods',compact(['productos','tiendatipos']));
    }

    public function updatingSearch(){$this->resetPage();}
    public function updatingFiltroestado(){$this->resetPage();}
    public function updatingFiltrotiendatipo(){$this->resetPage();}

    public function changeValor(Producto $producto,$campo,$valor)
    {
        $producto->update([$campo=>$valor]);
        $this->dispatchBrowserEvent('notify', 'Actulizado con éxito.');
    }

    public function delete($productoId)
    {
        $producto = Producto::find($productoId);
        if ($producto) {
            $producto->delete();
            $this->dispatchBrowserEvent('notify', 'El producto: '.$producto->producto.' ha sido eliminado!');
        }
    }

}
