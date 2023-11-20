<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;

class NavigationMenuTienda extends Component
{
        /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu-tienda' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.menu.navigation-menu-tienda');
    }
}
