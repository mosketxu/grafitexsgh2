<?php

namespace App\Http\Livewire\Stores;

use App\Models\Store;
use Livewire\Component;

class StoreEliminar extends Component
{
    public $store;

    public function mount($store)
    {
        $this->store=Store::find($store->id);
    }

    public function render()
    {
        return view('livewire.stores.store-eliminar');
    }

    public function delete($storeid){
        $sto = Store::find($storeid);
        if ($sto) {
            $sto->delete();
            $notification = array(
                'message' => 'Store eliminada satisfactoriamente!',
                'alert-type' => 'success'
            );
            return redirect()->route('store.index')->with($notification);
        }
    }
}
