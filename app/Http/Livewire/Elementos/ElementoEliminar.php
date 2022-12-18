<?php

namespace App\Http\Livewire\Elementos;

use App\Models\Elemento;
use Livewire\Component;

class ElementoEliminar extends Component
{

    public $elemento;

    public function mount($elemento)
    {
        $this->elemento=Elemento::find($elemento->id);
    }
    public function render()
    {
        return view('livewire.elementos.elemento-eliminar');
    }


    public function delete($elementoid){
        $ele = Elemento::where('id',$elementoid)->first();
        if ($ele) {
            $ele->delete();
            $notification = array(
                'message' => 'Elemento eliminado satisfactoriamente!',
                'alert-type' => 'success'
            );
            return redirect()->route('elemento.index')->with($notification);
        }
    }
}
