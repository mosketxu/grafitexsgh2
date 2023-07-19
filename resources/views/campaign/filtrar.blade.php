<div class="">
    <div class="h-full p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            @include('campaign.campaigncabecera')
            <div class="flex px-1 py-1 space-x-2 rounded-md shadow-md">
                <div class="w-6/12 py-2 space-y-1 rounded-md shadow-md">
                    {{-- los pongo porque sino run dev me los quita en el componente livewire --}}
                    {{-- <div class="bg-blue-500"></div>
                    <div class="bg-green-500"></div>
                    <div class="bg-yellow-500"></div>
                    <div class="bg-gray-500"></div>
                    <div class="bg-indigo-500"></div> --}}
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignStore','tabla1'=>'campaign_stores','model1c1'=>'store_id','model1c2'=>'store','titulo'=>'Stores','color'=>'blue-500'])
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignSegmento','tabla1'=>'campaign_segmentos','model1c1'=>'segmento','model1c2'=>'segmento','titulo'=>'Segmentos','color'=>'green-500'])
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignIdioma','tabla1'=>'campaign_idiomas','model1c1'=>'idioma','model1c2'=>'idioma','titulo'=>'Idiomas','color'=>'red-400'])
                </div>
                <div class="w-6/12 py-2 space-y-1 rounded-md shadow-md">
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignUbicacion','tabla1'=>'campaign_ubicacions','model1c1'=>'ubicacion','model1c2'=>'ubicacion','titulo'=>'Ubicaciones','color'=>'yellow-500'])
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignMedida','tabla1'=>'campaign_medidas','model1c1'=>'medida','model1c2'=>'medida','titulo'=>'Medidas','color'=>'gray-500'])
                    @livewire('campaigns.campaign-asociarstores',['campaign'=>$campaign,'model1'=>'App\Models\CampaignMobiliario','tabla1'=>'campaign_mobiliarios','model1c1'=>'mobiliario','model1c2'=>'mobiliario','titulo'=>'Mobiliario','color'=>'indigo-500'])
                </div>
            </div>
            <div class="">
                <div class="w-full">
                    <div class="m-2">
                        {{$elementos->links()}}
                    </div>
                    <table class="w-full text-xs text-left">
                        <thead class="flex flex-col items-center justify-between w-full overflow-y-scroll text-white bg-black">
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
                        <tbody class="flex flex-col items-center justify-between w-full overflow-y-scroll bg-grey-light" style="height: 40vh;">
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
