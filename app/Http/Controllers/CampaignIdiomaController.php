<?php

namespace App\Http\Controllers;

use App\Models\CampaignIdioma;
use App\Http\Requests\StoreCampaignIdiomaRequest;
use App\Http\Requests\UpdateCampaignIdiomaRequest;

class CampaignIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCampaignIdiomaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaignIdiomaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CampaignIdioma  $campaignIdioma
     * @return \Illuminate\Http\Response
     */
    public function show(CampaignIdioma $campaignIdioma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CampaignIdioma  $campaignIdioma
     * @return \Illuminate\Http\Response
     */
    public function edit(CampaignIdioma $campaignIdioma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCampaignIdiomaRequest  $request
     * @param  \App\Models\CampaignIdioma  $campaignIdioma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignIdiomaRequest $request, CampaignIdioma $campaignIdioma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CampaignIdioma  $campaignIdioma
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignIdioma $campaignIdioma)
    {
        //
    }
}
