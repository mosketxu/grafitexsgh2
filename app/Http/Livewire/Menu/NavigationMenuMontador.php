<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;

class NavigationMenuMontador extends Component
{
        /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu-montador' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.menu.navigation-menu-montador');
    }
}
