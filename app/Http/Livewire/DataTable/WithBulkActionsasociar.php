<?php

namespace App\Http\Livewire\DataTable;

trait WithBulkActionsasociar
{
    public $selectPagedisp = false;
    public $selectPagedispaso = false;
    public $selectAlldisp = false;
    public $selectAllaso = false;
    public $selecteddisp = [];
    public $selectedaso = [];

    public function updatedSelecteddisp(){
        $this->selectAlldisp=false;
        $this->selectPagedisp=false;
    }
    public function updatedSelectedaso(){
        $this->selectAllaso=false;
        $this->selectPageaso=false;
    }

    public function updatedSelectPagedisp($value){
        if($value) return $this->selectPagedispRows();
        $this->selecteddisp= [];
    }

    public function updatedSelectPageaso($value){
        if($value) return $this->selectPageasoRows();
        $this->selectedaso= [];
    }

    public function selectAlldisp(){$this->selectAlldisp=true;}
    public function selectAllaso(){$this->selectAllaso=true;}

    public function selectPagedispRows(){$this->selecteddisp = $this->rowsdisp->pluck('id')->map(fn($id) => (string) $id);}
    public function selectPageasoRows(){$this->selectedaso = $this->rowsaso->pluck('id')->map(fn($id) => (string) $id);}

    public function getSelectedRowsdispQueryProperty(){
        return (clone $this->rowsdispQuery)
            ->unless($this->selectAlldisp, fn($query) => $query->whereKey($this->selecteddisp));
    }

    public function getSelectedRowsasoQueryProperty(){
        return (clone $this->rowsasoQuery)
            ->unless($this->selectAllaso, fn($query) => $query->whereKey($this->selectedaso));
    }

    public function getSelecteddispXlsQueryProperty(){
        return (clone $this->xlsQuery)
            ->unless($this->selectAlldisp, fn($query) => $query->whereKey($this->selecteddisp));
    }
    public function getSelectedasoXlsQueryProperty()
    {
        return (clone $this->xlsQuery)
            ->unless($this->selectAllaso, fn($query) => $query->whereKey($this->selectedaso));
    }
}
