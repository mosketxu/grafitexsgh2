<?php

namespace App\Http\Livewire\StoresPeticiones;

use App\Models\Producto;
use App\Models\ProductoCategoria;
use App\Models\Store;
use App\Models\StorePeticionesProducto;
use App\Models\TiendaTipo;
use Livewire\Component;

class StoreProductos extends Component
{

    public $store;
    public $ttipo;
    public $pcategoria;

    public $search='';
    public $filtrotiendatipo='';
    public $filtroestado='';
    public $filtroproductocategoria='';
    public $filtrodescripcion='';
    public $searchasociada='';
    public $filtrotiendatipoasociada='';
    public $filtroestadoasociada='';
    public $filtroproductocategoriaasociada='';
    public $filtrodescripcionasociada='';


    function mount(Store $store)  {
        $this->store=$store;
    }
    public function render()
    {
        // dd($this->filtrodescripcionasociada);
        $ttipos=TiendaTipo::orderBy('tiendatipo')->get();
        $pcategorias=ProductoCategoria::orderBy('productocategoria')->get();

        // $storeproductos=StorePeticionesProducto::with('store','producto')
        // ->when($this->searchasociada!='',function($query) {return $query->where('producto','like','%'.$this->search.'%');})
        // ->when($this->filtrotiendatipoasociada!='',function($query) {return $query->where('tiendatipo_id',$this->filtrotiendatipo);})
        // ->when($this->filtroproductocategoriaasociada!='',function($query) {return $query->where('productocategoria_id',$this->filtroproductocategoria);})
        // ->when($this->filtrodescripcionasociada!='',function($query) {return $query->where('descripcion','like','%'.$this->filtrodescripcion.'%');})
        // ->when($this->filtroestadoasociada!='',function($query) {return $query->where('activo',$this->filtroestado);})
        // ->where('store_id',$this->store->id)
        // ->get();

        $storeproductos=StorePeticionesProducto::with('producto')
        ->join('productos','productos.id','store_peticiones_productos.producto_id')
        ->select('store_peticiones_productos.*','productos.producto as prod','productos.tiendatipo_id','productos.productocategoria_id','productos.descripcion')
        ->when($this->searchasociada!='',function($query) {return $query->where('producto','like','%'.$this->searchasociada.'%');})
        ->when($this->filtrotiendatipoasociada!='',function($query) {return $query->where('tiendatipo_id',$this->filtrotiendatipoasociada);})
        ->when($this->filtroproductocategoriaasociada!='',function($query) {return $query->where('productocategoria_id',$this->filtroproductocategoriaasociada);})
        ->when($this->filtrodescripcionasociada!='',function($query) {return $query->where('descripcion','like','%'.$this->filtrodescripcionasociada.'%');})
        ->when($this->filtroestadoasociada!='',function($query) {return $query->where('activo',$this->filtroestadoasociada);})
        ->where('store_id',$this->store->id)
        ->get();



        // $posts = StorePeticionesProducto::with(['producto' => function ($query) {
        //     $query->when($this->filtrodescripcionasociada!='',function($query) {return $query->where('descripcion','like','%'.$this->filtrodescripcion.'%');});
        // }])->get();

        // dd($posts);



        $productosdisponibles=Producto::query()
            ->whereNotIn('id',$storeproductos->pluck('producto_id'))
            ->when($this->search!='',function($query) {return $query->where('producto','like','%'.$this->search.'%');})
            ->when($this->filtrotiendatipo!='',function($query) {return $query->where('tiendatipo_id',$this->filtrotiendatipo);})
            ->when($this->filtroproductocategoria!='',function($query) {return $query->where('productocategoria_id',$this->filtroproductocategoria);})
            ->when($this->filtrodescripcion!='',function($query) {return $query->where('descripcion','like','%'.$this->filtrodescripcion.'%');})
            ->when($this->filtroestado!='',function($query) {return $query->where('activo',$this->filtroestado);})
            ->get();

            // dd($productosdisponibles);

        return view('livewire.stores-peticiones.store-productos',compact(['storeproductos','productosdisponibles','ttipos','pcategorias']));
    }

    public function addtostore(Producto $producto){

        StorePeticionesProducto::create([
            'store_id'=>$this->store->id,
            'producto_id'=>$producto->id,
        ]);

        $mensaje="Producto vinculado a la tienda satisfactoriamente";
        $this->dispatchBrowserEvent('notify', $mensaje);

    }

    public function deletefromstore($prodId){
        $producto = StorePeticionesProducto::where('id',$prodId)->first();
        if ($producto) {
            $producto->delete();
            $mensaje="Producto desvinculado de la tienda satisfactoriamente";
            $this->dispatchBrowserEvent('notify', $mensaje);
            }
    }

}
