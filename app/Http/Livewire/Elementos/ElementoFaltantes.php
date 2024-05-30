<?php

namespace App\Http\Livewire\Elementos;

use App\Models\Campaign;
use App\Models\CampaignElemento;
use App\Models\CampaignElementoFaltante;
use Livewire\Component;

class ElementoFaltantes extends Component
{

    public $campaigntienda;
    public $campaignid;
    public $storeid;
    public $elementofaltante='';
    public $cantidad='1';
    public $observaciones='';

    protected $rules = [
        'elementofaltante' => 'required',
        'cantidad' => 'numeric|required',
        'observaciones' => 'nullable',
    ];

    public function messages(){
        return [
            'elementofaltante.required'=>'Debes indicar qué elemento falta.',
            'cantidad.required'=>'Debes indicar la cantidad que falta de este elemento.',
        ];
    }

    public function mount($campaigntienda,$campaignid,$storeid){
        $this->campaigntienda=$campaigntienda;
        $this->campaignid=$campaignid;
        $this->storeid=$storeid;

   }

    public function render(){
        $elementofaltantes= CampaignElementoFaltante::where('campaigntienda_id',$this->campaigntienda->id)->get();
        return view('livewire.elementos.elemento-faltantes',compact('elementofaltantes'));
    }

    public function delete($elementofaltante){
        $ef = CampaignElementoFaltante::where('id',$elementofaltante)->first();
        if ($ef) {
            $ef->delete();
            $notification = array(
                'message' => 'Elemento eliminado satisfactoriamente!',
                'alert-type' => 'success'
            );
        }
    }
}
