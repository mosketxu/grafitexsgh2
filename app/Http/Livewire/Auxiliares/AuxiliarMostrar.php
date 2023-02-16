<?php

namespace App\Http\Livewire\Auxiliares;

use App\Models\{Area,Carteleria,Country,Furniture,Material,Medida,Mobiliario,Propxelemento,Segmento,Storeconcept,Ubicacion};

use Livewire\Component;

class AuxiliarMostrar extends Component
{
    public $vista='country';
    public $search='';
    public $titulo='Country';
    public $campo='country';
    public $tabla='countries';
    public $valores;
    public $nuevo='0';
    public $valorcampo='';
    public $country='';
    public $segmento='';
    public $furniture;
    public $concept;
    public $ubicacion;
    public $mobiliario;
    public $propxelem;
    public $carteleria;
    public $medida;
    public $material;

    protected function rules(){
        return [
            'valorcampo'=>'required_if:vista,country|unique:countries,country',
            'valorcampo'=>'required_if:vista,area|unique:areas,area',
            'valorcampo'=>'required_if:vista,segmento|unique:segmentos,segmento',
            'valorcampo'=>'required_if:vista,furniture|unique:furnitures,furniture_type',
            'valorcampo'=>'required_if:vista,concept|unique:storeconcepts,storeconcept',
            'valorcampo'=>'required_if:vista,ubicacion|unique:ubicacions,ubicacion',
            'valorcampo'=>'required_if:vista,mobiliario|unique:mobiliarios,mobiliario',
            'valorcampo'=>'required_if:vista,propxelem|unique:propxelementos,propxelemento',
            'valorcampo'=>'required_if:vista,carteleria|unique:cartelerias,carteleria',
            'valorcampo'=>'required_if:vista,medida|unique:medidas,medida',
            'valorcampo'=>'required_if:vista,material|unique:materiales,material',
        ];}

    public function messages(){
        return [
            'valorcampo.required_if'=>'Debes introducir un valor',
            'segmento.required'=>'Debes introducir un valor',
            'segmento.unique'=>'El valor ya existe',
            'valorcampo.unique'=>'El valor ya existe'
        ];}

    public function render(){
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

    public function cambiatabla($vis){
        $this->vista=$vis;
        $this->nuevo='0';
        $this->valorcampo='';
        $this->resetErrorBag();
    }

    public function muestranuevo(){
        $this->nuevo= $this->nuevo=='0' ? '1' : '0';
    }

    public function changeValor($valor,$v){
        if($this->vista=='country') {
            $p=Country::find($valor['ide']);
            // $this->country=$v;
        }elseif($this->vista=='area') {
            $p=Area::find($valor['ide']);
            // $this->area=$v;
        }elseif($this->vista=='segmento') {
            $p=Segmento::find($valor['ide']);
            // $this->segmento=$v;
        }elseif($this->vista=='furniture') {
            $p=Furniture::find($valor['ide']);
            // $this->furniture=$v;
        }elseif($this->vista=='concept') {
            $p=Storeconcept::find($valor['ide']);
            // $this->concept=$v;
        }elseif($this->vista=='ubicacion') {
            $p=Ubicacion::find($valor['ide']);
            // $this->ubicacion=$v;
        }elseif($this->vista=='mobiliario') {
            $p=Mobiliario::find($valor['ide']);
            // $this->mobiliario=$v;
        }elseif($this->vista=='propxelem') {
            $p=Propxelemento::find($valor['ide']);
            // $this->propxelem=$v;
        }elseif($this->vista=='carteleria') {
            $p=Carteleria::find($valor['ide']);
            // $this->carteleria=$v;
        }elseif($this->vista=='medida') {
            $p=Medida::find($valor['ide']);
            // $this->medida=$v;
        }elseif($this->vista=='material') {
            $p=Material::find($valor['ide']);
            // $this->material=$v;
        }

        $c=$this->campo;
        $this->valorcampo=$v;
        $this->validate();
        $p->$c=$v;
        $p->save();
        $mensaje="$this->titulo actualizado";
        $this->dispatchBrowserEvent('notify', $mensaje);
    }

    public function save(){
        if ($this->vista=='country') {
            $p=new Country();
        }elseif($this->vista=='area'){
            $p=new Area;
            $this->area=$this->valorcampo;
        }elseif($this->vista=='segmento'){
            $p=new Segmento;
            $this->segmento=$this->valorcampo;
        }elseif($this->vista=='furniture'){
            $p=new Furniture;
            $this->furniture=$this->valorcampo;
        }elseif($this->vista=='concept'){
            $p=new Storeconcept;
            $this->concept=$this->valorcampo;
        }elseif($this->vista=='ubicacion'){
            $p=new Ubicacion;
            $this->ubicacion=$this->valorcampo;
        }elseif($this->vista=='mobiliario'){
            $p=new Mobiliario;
            $this->mobiliario=$this->valorcampo;
        }elseif($this->vista=='propxelem'){
            $p=new Propxelemento;
            $this->propxelem=$this->valorcampo;
        }elseif($this->vista=='carteleria'){
            $p=new Carteleria;
            $this->carteleria=$this->valorcampo;
        }elseif($this->vista=='medida'){
            $p=new Medida;
            $this->medida=$this->valorcampo;
        }elseif($this->vista=='material'){
            $p=new Material;
            $this->material=$this->valorcampo;
        }
        $this->validate();
        $c=$this->campo;
        $p->$c=$this->valorcampo;
        $p->save();
        $this->resetErrorBag();
        $message="$this->titulo añadido";
        $this->valorcampo='';
        $this->dispatchBrowserEvent('notify', $message);
    }
}
