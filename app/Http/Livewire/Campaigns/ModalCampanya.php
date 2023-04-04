<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\Campaign;
use Illuminate\Validation\Rule;
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
    public $montaje1;
    public $montaje2;
    public $montaje3;
    public $preciomontador;

    protected function rules(){
        return [
            'campaign_name'=>'required|unique:campaigns',
            'campaign_initdate'=>'required',
            'campaign_enddate'=>'required',
            'fechainstal1'=>['nullable','date',Rule::requiredIf($this->montaje1!='')],
            'fechainstal2'=>['nullable','date',Rule::requiredIf($this->montaje2!='')],
            'fechainstal3'=>['nullable','date',Rule::requiredIf($this->montaje3!='')],
            'montaje1'=>['nullable',Rule::requiredIf($this->fechainstal1!='')],
            'montaje2'=>['nullable',Rule::requiredIf($this->fechainstal2!='')],
            'montaje3'=>['nullable',Rule::requiredIf($this->fechainstal3!='')],
            'preciomontador'=>'nullable',
        ];
    }

    public function messages(){
        return [
            'campaign_name.required' => 'Agrega el nombre de la campaña.',
            'campaign_name.unique' => 'El nombre de la campaña ya existe. Usa otro.',
            'campaign_initdate.required' => 'La fecha Inicio es necesaria.',
            'campaign_enddate.required' => 'La fecha Fin es necesaria.',
            'fechainstal1.required'=>'La fecha 1 es necesaria si el campo montaje 1 está rellenado',
            'fechainstal2.required'=>'La fecha 2 es necesaria si el campo montaje 2 está rellenado',
            'fechainstal3.required'=>'La fecha 3 es necesaria si el campo montaje 3 está rellenado',
            'montaje1.required'=>'El tipo de montaje 1 es necesario si la fecha 1 está rellenada',
            'montaje2.required'=>'El tipo de montaje 2 es necesario si la fecha 2 está rellenada',
            'montaje3.required'=>'El tipo de montaje 3 es necesario si la fecha 3 está rellenada',
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
            'montaje1'=>$this->montaje1,
            'montaje2'=>$this->montaje2,
            'montaje3'=>$this->montaje3,
            'preciomontador'=>$this->preciomontador,
        ]);

        $this->campaign_name='';
        $this->campaign_initdate='';
        $this->campaign_enddate='';
        $this->fechainstal1='';
        $this->fechainstal2='';
        $this->fechainstal3='';
        $this->montaje1='';
        $this->montaje2='';
        $this->montaje3='';
        $this->preciomontador='0';

        return redirect()->route('campaign.edit',$campaign);
    }

}
