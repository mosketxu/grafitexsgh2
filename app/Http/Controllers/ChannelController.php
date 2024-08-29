<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campo='channel';
        $route='channel.store';
        return view('auxiliares.createaux',compact('campo','route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChannelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelRequest $request)
    {
        $request->validate([
            'channel'=>'required|unique:channels'
        ]);

        Channel::create($request->all());

        $notification = array(
            'message' => 'Channel creado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect('auxiliares')->with($notification);
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $id)
    {
        $datos=Channel::find($id);
        $campo='channel';
        $route='channel.update';
        return view('auxiliares.edit',compact('datos','campo','route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelRequest  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelRequest $request, $id)
    {
        $request->validate([
            'channel'=>'required|unique:channels'
        ]);

        Channel::where('id',$id)->update(['channel'=>$request->channel]);

        $notification = array(
            'message' => 'Channel actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect('auxiliares')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Channel::destroy($id);

        $notification = array(
            'message' => 'Channel eliminado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
