<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\CampaignStore;
use App\Models\StoreElemento;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\DataTable\WithBulkActionsasociar;


class CampaignAsociarstores extends Component
{
    use WithPagination, WithBulkActionsasociar;

    public $visible=true;
    public $campaign;
    public $campaignid;
    public $searchdisponibles='';
    public $searchasociadas='';
    public $titulo='Stores';
    public $color='blue-500';

    public function mount($campaign){
        $this->campaign=$campaign;
        $this->campaignid=$campaign->id;
    }

    public function render(){
        if($this->selectAlldisp) $this->selectPagedispRows();
        if($this->selectAllaso) $this->selectPagesoRows();
        $disponibles = $this->rowsdisp;
        $asociadas = $this->rowsaso;

        return view('livewire.campaigns.campaign-asociarstores',compact('disponibles','asociadas'));

    }

    public function cambiavisible(){$this->visible= $this->visible=='0' ? '1' : '0';}

    public function activa(){
        # code...
    }

    public function asocia($disponible){
        $existe=CampaignStore::where('campaign_id',$this->campaignid)->where('store_id',$disponible['id'])->first();
        if(!$existe)
            CampaignStore::create([
                'campaign_id'=>$this->campaignid,
                'store_id'=>$disponible['id'],
                'store'=>$disponible['name'],
            ]);
    }

    public function asociarselected(){
        dd('ad');
        $selected = $this->selectedRowsdispQuery->get();
        foreach ($selected as $uno) {
            $this->asocia($uno);
        }
        return redirect()->route('campaign.filtrar',$this->campaign);
    }

    public function asociartodos(){
        $todos=$this->rowsdisp;
        foreach ($todos as $uno) {
            $this->asocia($uno);
        }
        return redirect()->route('campaign.filtrar',$this->campaign);
    }

    public function disocia($asociada){
        $borrar=CampaignStore::find($asociada);
        if($borrar)
            $borrar->delete();
    }

    public function disociarselected(){
        $selected = $this->selectedRowsasoQuery->get();
        foreach ($selected as $uno) {
            $this->disocia($uno->id);
        }
        return redirect()->route('campaign.filtrar',$this->campaign);
    }

    public function disociartodos(){
        $todos=$this->rowsaso;
        foreach ($todos as $uno) {
            $this->disocia($uno->id);
        }
        return redirect()->route('campaign.filtrar',$this->campaign);
    }


    public function getRowsdispQueryProperty(){
        return StoreElemento::join('stores','stores.id','store_id')
        ->join('elementos','elementos.id','elemento_id')
        ->select('store_id as id','name as name')
        ->whereNotIn('store_id', function ($query) {
            $query->select('store_id')->from('campaign_stores')->where('campaign_id', '=', $this->campaignid);
        })
        ->when($this->searchdisponibles!='', function ($query){
            $query->where('store_id','like','%'.$this->searchdisponibles.'%')->orWhere('name','like','%'.$this->searchdisponibles.'%');
            })
        ->campstoseg($this->campaignid)
        ->campstoubi($this->campaignid)
        ->campstomob($this->campaignid)
        ->campstomed($this->campaignid)
        ->groupBy('id','name')
        ->orderBy('id','asc');
    }

    public function getRowsdispProperty(){
        return $this->rowsdispQuery->get();
    }
    public function getRowsasoQueryProperty(){

        return CampaignStore::select('id','store_id as campo','store as name')
        ->where('campaign_id', '=', $this->campaignid)
        ->search('campaign_stores.store_id',$this->searchasociadas)
        ->orSearch('campaign_stores.store',$this->searchasociadas)
        ->orderBy('store_id');
    }

    public function getRowsasoProperty(){
        return $this->rowsasoQuery->get();
    }
}
