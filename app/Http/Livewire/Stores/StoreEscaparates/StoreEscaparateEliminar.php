<?php

namespace App\Http\Livewire\Stores\StoreEscaparates;

use App\Models\StoreEscaparate;
use Livewire\Component;

class StoreEscaparateEliminar extends Component
{

    public $escaparate;

    public function mount($escaparate)
    {
        $this->escaparate=StoreEscaparate::find($escaparate->id);
    }

    public function render()
    {
        return view('livewire.stores.store-escaparates.store-escaparate-eliminar');
    }

    public function delete($escaparateid){
        $ele = StoreEscaparate::where('id',$escaparateid)->first();
        if ($ele) {
            $ele->delete();
            $notification = array(
                'message' => 'Escaparate eliminado satisfactoriamente!',
                'alert-type' => 'success'
            );
            return redirect()->route('storeescaparates.escaparates',$ele->store_id)->with($notification);
        }
    }
}
