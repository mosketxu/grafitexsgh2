<?php

namespace App\Http\Livewire\Stores\StoreElementos;

use App\Models\StoreElemento;
use Livewire\Component;

class StoreElementoEliminar extends Component
{

    public $elemento;

    public function mount($elemento)
    {
        $this->elemento=StoreElemento::find($elemento->id);
    }

    public function render()
    {
        return view('livewire.stores.store-elementos.store-elemento-eliminar');
    }

    public function delete($elementoid){
        $ele = StoreElemento::where('id',$elementoid)->first();
        if ($ele) {
            $ele->delete();
            $notification = array(
                'message' => 'Elemento eliminado satisfactoriamente!',
                'alert-type' => 'success'
            );
            return redirect()->route('storeelementos.elementos',$ele->store_id)->with($notification);
        }
    }
}
