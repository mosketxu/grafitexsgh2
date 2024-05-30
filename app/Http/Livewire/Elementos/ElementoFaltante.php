<?php

namespace App\Http\Livewire\Elementos;

use App\Models\Campaign;
use App\Models\CampaignElemento;
use App\Models\CampaignElementoFaltante;
use Livewire\Component;

class ElementoFaltante extends Component
{
    public $campaigntiendaid='';
    public $campaignid;
    public $storeid;
    public $campaignelementofaltanteid='';
    public $elementofaltante='';
    public $cantidad='1';
    public $observaciones='';

    protected function rules(){
        return [
            'elementofaltante'=>'required',
            'cantidad'=>'required|numeric|min:1',
            'observaciones'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'elementofaltante.required'=>'Debes indicar qué elemento falta',
            'cantidad.required'=>'Debes indicar la cantidad que falta del elemento',
            'cantidad.numeric'=>'La cantidad debe ser un numero superior a 0',
            'cantidad.min'=>'La cantidad debe ser un numero superior a 0',
        ];
    }

    public function mount($campaigntiendaid,$campaignelementofaltanteid=null,$campaignid,$storeid)  {
        $this->campaigntiendaid=$campaigntiendaid;
        $this->$campaignelementofaltanteid=$campaignelementofaltanteid;
        $this->campaignid=$campaignid;
        $this->storeid=$storeid;
    }

    public function render(){
        return view('livewire.elementos.elemento-faltante');
    }

    public function save(){
        $this->validate();

        $ef = CampaignElementoFaltante::updateOrCreate(
            // Condiciones de búsqueda
            ['id' => $this->campaignelementofaltanteid],
            [
                'campaigntienda_id' =>$this->campaigntiendaid,
                'elementofaltante' =>$this->elementofaltante,
                'cantidad' =>$this->cantidad,
                'observaciones' =>$this->observaciones,
            ]
        );
        return redirect()->route('tienda.editrecepcion', [$this->campaignid,$this->storeid] );
    }
}
