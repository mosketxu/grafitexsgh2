<?php

namespace App\Http\Livewire\Auxiliares;

use App\Models\{Area,Carteleria,Country,Furniture,Material,Medida,Mobiliario,Propxelemento,Segmento,Storeconcept,Ubicacion};
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AuxiliarMostrar extends Component
{
    public  $country='1';
    public $vista='country';
    public $search='';
    public $titulo='Country';
    public $campo='country';
    public $tabla='countries';
    public $valores;

    public function render(){

        // dd($c);
        if($this->vista=='country'){
            $this->titulo='Country';$this->campo='country';$this->tabla='countries';
            $this->valores=Country::select('id as ide','country as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='area'){
            $this->titulo='Area';$this->campo='area';$this->tabla='areas';
            $this->valores=Area::select('id as ide','area as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='segmento'){
            $this->titulo='Segmento';$this->campo='segmento';$this->tabla='segmentos';
            $this->valores=Segmento::select('id as ide','segmento as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='furniture'){
            $this->titulo='Furniture Type';$this->campo='furniture_type';$this->tabla='furnitures';
            $this->valores=Furniture::select('id as ide','furniture_type as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='concept'){
            $this->titulo='Store Concept';$this->campo='storeconcept';$this->tabla='storeconcepts';
            $this->valores=Storeconcept::select('id as ide','storeconcept as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='ubicacion'){
            $this->titulo='Ubicación';$this->campo='ubicacion';$this->tabla='ubicacions';
            $this->valores=Ubicacion::select('id as ide','ubicacion as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='mobiliario'){
            $this->titulo='Mobiliario';$this->campo='mobiliario';$this->tabla='mobiliarios';
            $this->valores=Mobiliario::select('id as ide','mobiliario as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='propxelem'){
            $this->titulo='Prop. x Elemento';$this->campo='propxelemento';$this->tabla='propxelementos';
            $this->valores=Propxelemento::select('id as ide','propxelemento as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='carteleria'){
            $this->titulo='Carteleria';$this->campo='carteleria';$this->tabla='cartelerias';
            $this->valores=Carteleria::select('id as ide','carteleria as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='medida'){
            $this->titulo='Medida';$this->campo='medida';$this->tabla='medidas';
            $this->valores=Medida::select('id as ide','medida as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }elseif($this->vista=='material'){
            $this->titulo='Material';$this->campo='material';$this->tabla='materials';
            $this->valores=Material::select('id as ide','material as valor')
                ->when($this->search!='',function($query) {return $query->where($this->campo,'like','%'.$this->search.'%');})
                ->get();
        }
        return view('livewire.auxiliares.auxiliar-mostrar',);
    }

    public function cambiatabla($vis){$this->vista=$vis;}

    public function changeValor($valor,$v){
        if($this->vista=='country') $p=Country::find($valor['ide']);
        elseif($this->vista=='area') $p=Area::find($valor['ide']);
        elseif($this->vista=='segmento') $p=Segmento::find($valor['ide']);
        elseif($this->vista=='furniture') $p=Furniture::find($valor['ide']);
        elseif($this->vista=='concept') $p=Storeconcept::find($valor['ide']);
        elseif($this->vista=='ubicacion') $p=Ubicacion::find($valor['ide']);
        elseif($this->vista=='mobiliario') $p=Mobiliario::find($valor['ide']);
        elseif($this->vista=='propxelem') $p=Propxelemento::find($valor['ide']);
        elseif($this->vista=='carteleria') $p=Carteleria::find($valor['ide']);
        elseif($this->vista=='medida') $p=Medida::find($valor['ide']);
        elseif($this->vista=='material') $p=Material::find($valor['ide']);

        $c=$this->campo;
        $p->$c=$v;
        $p->save();
        $mensaje="$this->titulo actualizado";
        $this->dispatchBrowserEvent('notify', $mensaje);
    }
}
