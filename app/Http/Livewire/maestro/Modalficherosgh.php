<?php

namespace App\Http\Livewire\Maestro;

use App\Http\Controllers\MaestroController;


use Livewire\Component;

class Modalficherosgh extends Component
{
    public $muestramodalsgh=false;
    public $muestraactualizatablassgh=false;
    public $muestractualizatiendas=false;
    public $muestrainsertastores=false;
    public $fichero;

    public function render()
    {
        return view('livewire.maestro.modalficherosgh');
    }


    public function cambiamodalsgh(){$this->muestramodalsgh= $this->muestramodalsgh==false ? true : false;}
    public function cambiamodalactualizatablassgh(){$this->muestraactualizatablassgh= $this->muestraactualizatablassgh==false ? true : false;}
    public function cambiamodalactualizatiendas(){$this->muestractualizatiendas= $this->muestractualizatiendas==false ? true : false;}
    public function cambiamodalinsertastores(){$this->muestrainsertastores= $this->muestrainsertastores==false ? true : false;}
}
