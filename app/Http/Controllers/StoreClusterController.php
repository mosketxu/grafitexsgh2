<?php

namespace App\Http\Controllers;

use App\Models\StoreCluster;
use Illuminate\Http\Request;

class StoreClusterController extends Controller
{

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campo='store_cluster';
        $route='storecluster.store';
        return view('auxiliares.createaux',compact('campo','route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'store_cluster'=>'required|unique:store_clusters'
        ]);

        StoreCluster::create($request->all());

        $notification = array(
            'message' => 'Cluster creado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect('auxiliares')->with($notification);
    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos=StoreCluster::find($id);
        $campo='store_cluster';
        $route='storecluster.update';
        return view('auxiliares.edit',compact('datos','campo','route'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_cluster'=>'required|unique:store_clusters'
        ]);

        StoreCluster::where('id',$id)->update(['store_cluster'=>$request->storecluster]);

        $notification = array(
            'message' => 'Cluster actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect('auxiliares')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StoreCluster::destroy($id);

        $notification = array(
            'message' => 'Cluster eliminada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
