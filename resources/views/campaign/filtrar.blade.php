<div class="">
    <div class="h-full p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full rounded-md bg-gray-100 p-1">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 form-control form-control-sm bg-gray-100 rounded-md" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1  form-control form-control-sm bg-gray-100 rounded-md" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 form-control form-control-sm bg-gray-100 rounded-md" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                    </div>
                </div>
            </div>
            <div class="flex  space-x-2 rounded-md shadow-md py-1 px-1">
                <div class="w-6/12 space-y-1 rounded-md shadow-md py-2">
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignStore','tabla1'=>'campaign_stores','model1c1'=>'store_id','model1c2'=>'store','titulo'=>'Stores','color'=>'blue-500'])
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignSegmento','tabla1'=>'campaign_segmentos','model1c1'=>'segmento','model1c2'=>'segmento','titulo'=>'Segmentos','color'=>'green-500'])
                </div>
                <div class="w-6/12 space-y-1 rounded-md shadow-md py-2">
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignUbicacion','tabla1'=>'campaign_ubicacions','model1c1'=>'ubicacion','model1c2'=>'ubicacion','titulo'=>'Ubicaciones','color'=>'yellow-500'])
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignMedida','tabla1'=>'campaign_medidas','model1c1'=>'medida','model1c2'=>'medida','titulo'=>'Medidas','color'=>'gray-500'])
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignMobiliario','tabla1'=>'campaign_mobiliarios','model1c1'=>'mobiliario','model1c2'=>'mobiliario','titulo'=>'Mobiliario','color'=>'blue-800'])
                </div>
            </div>
            <div class="">
                <div class="w-full">
                    <div class="m-2">
                        Hay {{$elementos->count()}} elementos disponibles.
                    </div>
                    <table class="text-left w-full text-xs">
                        <thead class="bg-black text-white flex flex-col items-center justify-between overflow-y-scroll w-full">
                            <tr class="flex w-full">
                                <th class="w-full">Store</th>
                                <th class="w-full">Name</th>
                                <th class="w-full">Country</th>
                                <th class="w-full">Zona</th>
                                <th class="w-full">Area</th>
                                <th class="w-full">Segmento</th>
                                <th class="w-full">Concepto</th>
                                <th class="w-full">Ubicación</th>
                                <th class="w-full">Mobiliario</th>
                                <th class="w-full">Prop x Elemento</th>
                                <th class="w-full">Carteleria</th>
                                <th class="w-full">Medida</th>
                                <th class="w-full">Material</th>
                                <th class="w-full">Unit x Prop</th>
                            </tr>
                        </thead>
                        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 40vh;">
                            @foreach ($elementos as $elemento)
                            <tr class="flex w-full">
                                <td class="w-full">{{$elemento->store_id}}</td>
                                <td class="w-full">{{$elemento->name}}</td>
                                <td class="w-full">{{$elemento->country}}</td>
                                <td class="w-full">{{$elemento->area}}</td>
                                <td class="w-full">{{$elemento->zona}}</td>
                                <td class="w-full">{{$elemento->segmento}}</td>
                                <td class="w-full">{{$elemento->concepto}}</td>
                                <td class="w-full">{{$elemento->ubicacion}}</td>
                                <td class="w-full">{{$elemento->mobiliario}}</td>
                                <td class="w-full">{{$elemento->propxelemento}}</td>
                                <td class="w-full">{{$elemento->carteleria}}</td>
                                <td class="w-full">{{$elemento->medida}}</td>
                                <td class="w-full">{{$elemento->material}}</td>
                                <td class="w-full">{{$elemento->unitxprop}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scriptchosen')

@endpush
