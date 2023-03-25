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
    public $fechainstal1;
    public $fechainstal2;
    public $fechainstal3;
    public $monta_desmonta1;
    public $monta_desmonta2;
    public $monta_desmonta3;


    protected function rules(){
        return [
            'campaign_name'=>'required|unique:campaigns',
            'campaign_initdate'=>'required',
            'campaign_enddate'=>'required',
            'fechainstal1'=>'nullable',
            'fechainstal2'=>'nullable',
            'fechainstal3'=>'nullable',
            'monta_desmonta1'=>'nullable',
            'monta_desmonta2'=>'nullable',
            'monta_desmonta3'=>'nullable',
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

        // registering a callback to be executed upon the creation of an activity AR
            $slug= Str::slug($this->campaign_name, '-');
        // check to see if any other slugs exist that are the same & count them
            $count = Campaign::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        // if other slugs exist that are the same, append the count to the slug
            $slug = $count ? "{$slug}-{$count}" : $slug;


        $campaign=Campaign::create([
            'campaign_name'=>$this->campaign_name,
            'slug'=>$slug,
            'campaign_initdate'=>$this->campaign_initdate,
            'campaign_enddate'=>$this->campaign_enddate,
            'fechainstal1'=>$this->fechainstal1,
            'fechainstal2'=>$this->fechainstal2,
            'fechainstal3'=>$this->fechainstal3,
            'monta_desmonta1'=>$this->monta_desmonta1,
            'monta_desmonta2'=>$this->monta_desmonta2,
            'monta_desmonta3'=>$this->monta_desmonta3,
        ]);

        $this->campaign_name='';
        $this->campaign_initdate='';
        $this->campaign_enddate='';
        $this->fechainstal1='';
        $this->fechainstal2='';
        $this->fechainstal3='';
        $this->monta_desmonta1='';
        $this->monta_desmonta2='';
        $this->monta_desmonta3='';

        return redirect()->route('campaign.edit',$campaign);
    }

}
