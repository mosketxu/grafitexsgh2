<?php

namespace App\Http\Livewire\Stores\StoreProporciones;

use App\Models\StoreProporcion;
use Livewire\Component;

class StoreProporcionEliminar extends Component
{
    public $proporcion;

    public function mount($proporcion)
    {
        $this->proporcion=StoreProporcion::find($proporcion->id);
    }

    public function render()
    {
        return view('livewire.stores.store-proporciones.store-proporcion-eliminar');
    }

    public function delete($proporcionid){
        $ele = StoreProporcion::where('id',$proporcionid)->first();
        if ($ele) {
            $ele->delete();
            $notification = array(
                'message' => 'Proporcion eliminado satisfactoriamente!',
                'alert-type' => 'success'
            );
            return redirect()->route('storeproporciones.proporciones',$ele->store_id)->with($notification);
        }
    }
}
