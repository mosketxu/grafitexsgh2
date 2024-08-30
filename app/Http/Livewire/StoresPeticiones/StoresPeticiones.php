<?php

namespace App\Http\Livewire\StoresPeticiones;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class StoresPeticiones extends Component
{
    use WithPagination;
    public $search='';


    public function render()
    {
        $stores=Store::query()
            ->when($this->search!='',function($query) {return $query->where('name','LIKE','%'.$this->search.'%');})
            ->orderBy('name')
            ->paginate();

        return view('livewire.stores-peticiones.stores-peticiones',compact('stores'));
    }
}
