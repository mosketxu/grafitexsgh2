<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;

class NavigationMenuSgh extends Component
{
        /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu-sgh' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.menu.navigation-menu-sgh');
    }
}
