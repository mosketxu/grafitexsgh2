<?php

namespace App\Http\Livewire\StoresPeticiones;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class StoresPeticiones extends Component
{
    use WithPagination;
    public $search='';
    public $searchcode='';


    public function render()
    {
        $stores=Store::query()
            ->with('are','concep','tiendatipo')
            ->when($this->search!='',function($query) {return $query->where('name','LIKE','%'.$this->search.'%');})
            ->when($this->searchcode!='',function($query) {return $query->where('id','LIKE','%'.$this->searchcode.'%');})
            ->orderBy('name')
            ->paginate();

        return view('livewire.stores-peticiones.stores-peticiones',compact('stores'));
    }
}
