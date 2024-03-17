<?php

namespace App\Http\Livewire\Peticion;

use App\Exports\EtiquetasPresupuestosExport;
use App\Models\{EstadoPeticion,Peticion,User};
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\DataTable\WithBulkActions;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;



class Peticiones extends Component
{

    use WithPagination,WithBulkActions;

    public $search='';
    public $filtroestado='';
    public $filtropeticionario='';

    // public $showDeleteModal=false;

    public function render(){

        if($this->selectAll) $this->selectPageRows();

        $peticiones = $this->rows;

        $estados=EstadoPeticion::get();

        $peticionarios = User::role(['tienda','sgh'])->get();

        if(Auth::user()->hasRole('tienda'))
            $peticiones=$peticiones->where('peticionario_id',Auth::user()->id);

        return view('livewire.peticion.peticiones',compact('peticionarios','peticiones','estados'));
    }

    public function getRowsQueryProperty(){
        return Peticion::query()
            ->with('estado')
            ->search('id',$this->search)
            ->when($this->filtroestado!='', function ($query) {
                $query->where('peticionestado_id', $this->filtroestado);
            })
            ->when($this->filtropeticionario!='', function ($query) {
                $query->where('peticionario_id', $this->filtropeticionario);
            })
            ->orderBy('id','desc');
    }

    public function getXlsQueryProperty(){
        return Peticion::query()
            ->join('users','users.id','peticiones.peticionario_id')
            ->join('peticion_detalles','peticiones.id','peticion_detalles.peticion_id')
            ->join('productos','productos.id','peticion_detalles.producto_id')
            ->select(
                'peticiones.id','peticiones.peticion','peticiones.fecha','peticiones.peticionestado_id','peticiones.total as total','peticiones.observaciones',
                'users.name','users.email',
                'productos.producto','productos.descripcion',
                'peticion_detalles.comentario','peticion_detalles.unidades','peticion_detalles.preciounidad','peticion_detalles.total as pd_total','peticion_detalles.observaciones',
            )
            ->search('id',$this->search)
            ->when($this->filtroestado!='', function ($query) {
                $query->where('peticionestado_id', $this->filtroestado);
            })
            ->when($this->filtropeticionario!='', function ($query) {
                $query->where('peticionario_id', $this->filtropeticionario);
            })
            ->orderBy('peticiones.id','desc');
    }

    public function getRowsProperty(){
        return $this->rowsQuery->paginate(10);
    }

    public function getXlsProperty(){
        return $this->xlsQuery->paginate(10);
    }

    public function etiquetasXls() {
        $peticiones=$this->selectedXlsQuery->get();
        $today=Carbon::now()->format('d/m/Y');
        // dd($peticiones);
        return Excel::download(new EtiquetasPresupuestosExport($peticiones,$today), 'peticiones.xlsx');

    // return Excel::download(new EtiquetasPresupuestosExport($lux,$sto,$nam,$coun,$are,$segmen,$cha,$clu,$conce,$fur),'stores.xlsx');


}

    public function etiquetasPDF(){
        $peticiones=$this->selectedRowsQuery->get();
        $today=Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('peticion.etiquetasseleccionadasHTML',compact('peticiones','today'))->output();
        return response()->streamDownload(function () use ($pdf) { print($pdf); }, md5(time()).".pdf");
    }



    public function delete($peticionId){
        $peticionBorrar = Peticion::find($peticionId);
        if ($peticionBorrar) {
            $peticionBorrar->delete();
            $this->dispatchBrowserEvent('notify', 'La peticion ha sido eliminada');
        }
    }
}
