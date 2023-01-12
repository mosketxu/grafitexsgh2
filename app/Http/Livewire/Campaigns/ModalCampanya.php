<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\Campaign;
use Livewire\Component;

use Illuminate\Support\Str;

class ModalCampanya extends Component
{
    public $muestramodal=false;
    public $campaign_name='';
    public $campaign_initdate='';
    public $campaign_enddate='';

    protected function rules(){
        return [
            'campaign_name'=>'required|unique:campaigns',
            'campaign_initdate'=>'required',
            'campaign_enddate'=>'required',
        ];
    }

    public function messages(){
        return [
            'campaign_name.required' => 'Agrega el nombre de la campaña.',
            'campaign_name.unique' => 'El nombre de la campaña ya existe. Usa otro.',
            'campaign_initdate.required' => 'La fecha Inicio es necesaria.',
            'campaign_enddate.required' => 'La fecha Fin es necesaria.',
        ];
    }


    public function render(){
        return view('livewire.campaigns.modal-campanya');
    }

    public function cambiamodal(){$this->muestramodal= $this->muestramodal==false ? true : false;}

    public function save(){

        $this->validate();

        $campaign=Campaign::create([
            'campaign_name'=>$this->campaign_name,
            'slug'=>Str::slug($this->campaign_name, '-'),
            'campaign_initdate'=>$this->campaign_initdate,
            'campaign_enddate'=>$this->campaign_enddate,
        ]);

        $this->campaign_name='';
        $this->campaign_initdate='';
        $this->campaign_enddate='';

        return redirect()->route('campaign.edit',$campaign);
    }

}
