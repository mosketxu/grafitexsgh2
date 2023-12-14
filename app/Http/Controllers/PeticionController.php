<?php

namespace App\Http\Controllers;

use App\Mail\MailPeticion;
use App\Models\Destinatario;
use App\Models\Peticion;
use App\Models\PeticionDetalle;
use App\Models\PeticionHistorial;
use App\Models\Store;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;


class PeticionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:peticion.index')->only('index');;
        $this->middleware('can:peticion.edit')->only('nuevo','editar','update','delete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        return view('peticion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $ruta="peticiones";
        return view('peticion.create',compact('ruta'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeticionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function show(Peticion $peticion)
    {
        //
    }

    public function editar(Peticion $peticion)
    {
        $ruta='peticion';
        return view('peticion.edit',compact('peticion','ruta'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeticionRequest  $request
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peticion $peticion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peticion $peticion)
    {
        //
    }

    public function enviopeticion(Peticion $peticion){
        if(Auth::user()->hasRole('tienda')){
            $store=Store::where('id',Auth::user()->name)->first();
        }else{
            $store="analizar este caso";
        }
        $details=[
            'de'=>'grafitex@grafitex.net',
            'asunto'=>'Nueva peticion nº:' .$peticion->id . ' de la Tienda: ' . $store->name ,
            'cuerpo'=>'peticion',
            'storename'=>$store->name,
            'storeId'=>$store->id,
            'cuerpo'=>'Se han generado una nueva petición'
        ];

        $destinatarios=Destinatario::where('empresa','SGH')->get();

        $elementos= PeticionDetalle::where('peticion_id',$peticion->id)->get();

        $notification='';
        if($elementos->count()>0){

            if($peticion->peticionestado_id=='1'){
                $peticion->peticionestado_id='2';
                PeticionHistorial::create([
                    'peticion_id'=>$peticion->id,
                    'user_id'=>$peticion->peticionario_id,
                    'peticionestado_id'=>'2',
                ]);
                $peticion->peticionestado_id='2';
                $peticion->enviado='2';
                $peticion->save();
            }

            foreach ($destinatarios as $destinatario) {
                Mail::to($destinatario->mail)->send(new MailPeticion($details,$elementos,$peticion));
                // Mail::to($user->email)->send(new MailControlrecepcion2($details));
                $notification = array(
                    'message' => '¡Mail de peticion enviado!',
                    'alert-type' => 'success',
                );
            }
        }
        else{
            $notification = array(
                'message' => 'No hay elementos en la petición. Debe seleccionar al menos uno para poder enviar la petición',
                'alert-type' => 'alarm',
            );

        }
        return redirect()->back()->with($notification);

    }

}
