<?php

namespace App\Http\Livewire\Campaigns;

// use App\Models\CampaignStore;
use App\Models\StoreElemento;
use Livewire\Component;
use Livewire\WithPagination;

class CampaignAsociarstores extends Component
{
    use WithPagination;

    public $visible=false;
    public $campaign;
    public $campaignid;
    public $searchdisponibles='';
    public $searchasociadas='';
    public $titulo='';
    public $color='';
    public $model1;
    public $tabla1;
    public $model1c1;
    public $model1c2;

    protected $listeners = [ 'refresh' => '$refresh'];

    public function mount($campaign,$model1,$tabla1,$model1c1,$model1c2,$titulo,$color){
        $this->campaign=$campaign;
        $this->campaignid=$campaign->id;
        $this->model1=$model1;
        $this->tabla1=$tabla1;
        $this->model1c1=$model1c1;
        $this->model1c2=$model1c2;
        $this->titulo=$titulo;
        $this->color=$color;
    }

    public function render(){

        $disponibles = $this->rowsdisp;
        $asociadas = $this->rowsaso;

        return view('livewire.campaigns.campaign-asociarstores',compact('disponibles','asociadas'));

    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

    public function asocia($disponible,$unotodos){
        $existe=$this->model1::where('campaign_id',$this->campaignid)->where($this->model1c1,$disponible['ident'])->first();
        if(!$existe)
            $this->model1::create([
                'campaign_id'=>$this->campaignid,
                $this->model1c1=>$disponible['ident'],
                $this->model1c2=>$disponible['name'],
            ]);
        // if($unotodos=='1') return redirect()->route('campaign.filtrar');
    }

    public function asociartodos(){
        $todos=$this->rowsdisp;
        foreach ($todos as $uno) {
            $this->asocia($uno,'0');
        }
        // return redirect()->route('campaign.filtrar',$this->campaign);
    }

    public function disocia($asociada,$unotodos){
        $borrar=$this->model1::find($asociada);
        if($borrar)
            $borrar->delete();

        if($unotodos=='1') return redirect()->route('campaign.filtrar',$this->campaign);
    }


    public function disociartodos(){
        $todos=$this->rowsaso;
        foreach ($todos as $uno) {
            $this->disocia($uno->id,'0');
        }
        return redirect()->route('campaign.filtrar',$this->campaign);
    }

    public function getRowsdispProperty(){
        if($this->model1c1=='store_id'){
            return StoreElemento::join('stores','stores.id','store_id')
                ->join('elementos','elementos.id','elemento_id')
                ->select('store_elementos.store_id as ident','stores.name as name')
                ->whereNotIn($this->model1c1, function ($query) {
                    $query->select($this->model1c1)->from($this->tabla1)->where('campaign_id', '=', $this->campaignid);
                })
                ->when($this->searchdisponibles!='', function ($query){
                    $query->where($this->model1c1,'like','%'.$this->searchdisponibles.'%')->orWhere($this->model1c2,'like','%'.$this->searchdisponibles.'%');
                    })
                ->campstoseg($this->campaignid)
                ->campstoubi($this->campaignid)
                ->campstomob($this->campaignid)
                ->campstomed($this->campaignid)
                ->groupBy($this->model1c1)
                ->orderBy($this->model1c1,'asc')
                ->get();}
        else{
            return StoreElemento::join('stores','stores.id','store_id')
            ->join('elementos','elementos.id','elemento_id')
            ->select($this->model1c1.' as ident', $this->model1c1 .' as name')
            ->whereNotIn($this->model1c1, function ($query) {
                $query->select($this->model1c1)->from($this->tabla1)->where('campaign_id', '=', $this->campaignid);
            })
            ->when($this->searchdisponibles!='', function ($query){
                $query->where($this->model1c1,'like','%'.$this->searchdisponibles.'%')->orWhere($this->model1c2,'like','%'.$this->searchdisponibles.'%');
                })
            ->campstosto($this->campaignid)
            ->when($this->model1c1!='segmento',function($query){$query->campstoseg($this->campaignid);})
            ->when($this->model1c1!='ubicacion',function($query){$query->campstoubi($this->campaignid);})
            ->when($this->model1c1!='mobiliario',function($query){$query->campstomob($this->campaignid);})
            ->when($this->model1c1!='medida',function($query){$query->campstomed($this->campaignid);})
            ->groupBy($this->model1c1)
            ->orderBy($this->model1c1,'asc')
            ->get();
        }
    }

    public function getRowsasoProperty(){
        return $this->model1::select('id',$this->model1c1.' as campo',$this->model1c2.' as name')
        ->where('campaign_id', '=', $this->campaignid)
        ->search($this->tabla1.'.'.$this->model1c1,$this->searchasociadas)
        ->orSearch($this->tabla1.'.'.$this->model1c2,$this->searchasociadas)
        ->orderBy($this->model1c1)
        ->get();
    }
}
