<?php

namespace App\Http\Livewire\Campaigns\Presupuesto;

use App\Models\CampaignPresupuestoDetalle;
use App\Models\CampaignPresupuestoExtra;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class PresupuestoExtra extends Component{

    public $campaign;
    public $presupuesto;
    public $visible=false;
    public $titulo='Extras';
    public $concepto='';
    public $zona='ES';
    public $preciounidad='0';
    public $unidades='1';
    public $total='0';
    public $observaciones='';

    protected function rules(){
        return [
            'concepto'=>'required',
            'zona'=>'required',
            'preciounidad'=>'numeric',
            'unidades'=>'numeric',
            'observaciones'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'concepto.required'=>'El concepto es necesario',
            'zona.required'=>'La zona es necesaria',
            'preciounidad.numeric'=>'El preciounidad debe ser numérico',
            'unidades.numeric'=>'Las unidades deben ser numéricas',
        ];
    }

    public function mount($campaign,$presupuesto){
        $this->campaign=$campaign;
        $this->presupuesto=$presupuesto;
    }

    public function render(){

        $extras=CampaignPresupuestoExtra::where('presupuesto_id',$this->presupuesto->id)->get();
        $totalExtras=$extras->sum('total');
        // $totalExtras = CampaignPresupuestoExtra::where('presupuesto_id',$campaignpresupuesto->id)
        // ->sum('total');
        return view('livewire.campaigns.presupuesto.presupuesto-extra',compact('extras','totalExtras'));
    }

    public function updatedUnidades(){$this->calculo();}

    public function updatedPreciounidad(){$this->calculo();}

    public function calculo(){$this->total=$this->unidades* $this->preciounidad;}

    public function changeCampo(CampaignPresupuestoExtra $valor,$campo,$valorcampo){
        if($campo=='unidades' && $valorcampo=='') $valorcampo=0;
        if($campo=='preciounidad'){
            if ($valorcampo=='') $valorcampo=0;
            $validator=Validator::make(['valorcampo'=>$valorcampo],[
                'valorcampo'=>'numeric'],['valorcampo.numeric'=>'El precio unidad debe ser numerico'])->validate();
        }
        if($campo=='concepto'){
            $validator=Validator::make(['valorcampo'=>$valorcampo],[
                'valorcampo'=>'required'],['valorcampo.required'=>'El concepto es necesario'])->validate();
        }

        $p=CampaignPresupuestoExtra::find($valor->id);
        $p->$campo=$valorcampo;
        $p->save();
        $p->total=$p->unidades * $p->preciounidad;
        $p->save();

        $totalExtras = CampaignPresupuestoExtra::where('presupuesto_id',$this->presupuesto->id)->sum('total');
        $totalMateriales=CampaignPresupuestoDetalle::where('presupuesto_id',$this->presupuesto->id)->sum('total');

        $this->presupuesto->total=$totalExtras+$totalMateriales;
        $this->presupuesto->save();

        $this->dispatchBrowserEvent('notify', 'Actualizado.');
    }

    public function save(){
        $this->validate();
        $this->total=$this->preciounidad * $this->unidades;

        $extra=CampaignPresupuestoExtra::create([
            'presupuesto_id'=>$this->presupuesto->id,
            'concepto'=>$this->concepto,
            'zona'=>$this->zona,
            'preciounidad'=>$this->preciounidad,
            'unidades'=>$this->unidades,
            'total'=>$this->total,
            'observaciones'=>$this->observaciones,
        ]);

        $totalExtras = CampaignPresupuestoExtra::where('presupuesto_id',$this->presupuesto->id)->sum('total');
        $totalMateriales=CampaignPresupuestoDetalle::where('presupuesto_id',$this->presupuesto->id)->sum('total');

        $this->presupuesto->total=$totalExtras+$totalMateriales;
        $this->presupuesto->save();

        $this->dispatchBrowserEvent('notify', 'Extra añadido con éxito');

        $this->concepto='';
        $this->zona='ES';
        $this->preciounidad='0';
        $this->unidades='0';
        $this->total='0';
        $this->observaciones='';

        $this->emit('refresh');
    }

    public function delete($valorId){
        $borrar = CampaignPresupuestoExtra::find($valorId);

        if ($borrar) {
            $borrar->delete();
            $this->dispatchBrowserEvent('notify', 'Extra eliminado!');
        }
    }
}
