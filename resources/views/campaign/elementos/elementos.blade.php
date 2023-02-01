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
        </div>
    </div>
    <div class="">
        <div class="w-full">
            <div class="m-2">
                <a href="{{route('campaign.elementos.export',$campaign->id)}}" title="Exporta Excel"><x-icon.xls/></a></td>
                Hay {{$elementos->count()}} elementos disponibles.
            </div>
            <table class="text-left w-full text-xs">
                <thead class="bg-black text-white flex flex-col  w-full">
                    <tr class="flex w-full">
                        <th class="w-1/12">#</th>
                        <th class="w-1/12">Store</th>
                        <th class="w-1/12">Name</th>
                        <th class="w-1/12">Country</th>
                        <th class="w-1/12">Area</th>
                        <th class="w-1/12">Idioma</th>
                        <th class="w-1/12">Segmento</th>
                        <th class="w-1/12">Store Concept</th>
                        <th class="w-1/12">Ubicación</th>
                        <th class="w-1/12">Mobiliario</th>
                        <th class="w-1/12">Prop x Elemento</th>
                        <th class="w-1/12">Carteleria</th>
                        <th class="w-1/12">Medida</th>
                        <th class="w-1/12">Material</th>
                        <th class="w-1/12">Unit x Prop</th>
                        {{-- <th class="w-1/12">Observaciones</th> --}}
                        <th width="150px">Imagen </th>
                        <th width="50px" class="text-center"><span class="ml-1">Acción</th>
                    </tr>
                </thead>
                <tbody class="bg-grey-light flex flex-col  overflow-y-scroll w-full" style="height: 40vh;">
                    @foreach ($elementos as $elemento)
                    <form id="form{{$elemento->id}}" role="form" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                    @csrf
                        <tr class="flex w-full">
                            <input type="hidden" name="elementoId" value="{{$elemento->id}}"/>
                            <td class="w-1/12">{{$elemento->id}}</td>
                            <td class="w-1/12">{{$elemento->store_id}}</td>
                            <td class="w-1/12">{{$elemento->name}}</td>
                            <td class="w-1/12">{{$elemento->country}}</td>
                            <td class="w-1/12">{{$elemento->area}}</td>
                            <td class="w-1/12">{{$elemento->idioma}}</td>
                            <td class="w-1/12">{{$elemento->segmento}}</td>
                            <td class="w-1/12">{{$elemento->storeconcept}}</td>
                            <td class="w-1/12">{{$elemento->ubicacion}}</td>
                            <td class="w-1/12">{{$elemento->mobiliario}}</td>
                            <td class="w-1/12">{{$elemento->propxelemento}}</td>
                            <td class="w-1/12">{{$elemento->carteleria}}</td>
                            <td class="w-1/12">{{$elemento->medida}}</td>
                            <td class="w-1/12">{{$elemento->material}}</td>
                            <td class="w-1/12">{{$elemento->unitxprop}}</td>
                            {{-- <td class="w-1/12">{{$elemento->observaciones}}</td> --}}
                            <td width="150px">
                                <div class="flex">
                                    <div>
                                        @can('campaign.edit')
                                        <x-input.text type="file" id="inputFile{{$elemento->id}}" name="photo" style="display:none"/>
                                        @endcan
                                        @if(file_exists( 'storage/galeria/'.$campaign->id.'/'.$elemento->imagen ))
                                            <img src="{{asset('storage/galeria/'.$campaign->id.'/'.$elemento->imagen.'?'.time())}}" alt={{$elemento->imagen}} title={{$elemento->imagen}}
                                                id="original{{$elemento->id}}" class=""
                                                style="width: 100px;cursor:pointer"
                                                onclick='document.getElementById("inputFile{{$elemento->id}}").click()'/>
                                        @else
                                            <img src="{{asset('storage/galeria/pordefecto.jpg')}}"  alt={{$elemento->imagen}} title={{$elemento->imagen}}
                                                id="original{{$elemento->id}}" class="img-fluid img-thumbnail"
                                                style="width: 100px;cursor:pointer"
                                                onclick='document.getElementById("inputFile{{$elemento->id}}").click()'/>
                                        @endif
                                    </div>
                                    <div>
                                        @can('campaign.edit')
                                        <a href="#" name="Upload" onclick="subirImagenIndex('form{{$elemento->id}}','{{$elemento->id}}','{{$campaign->id}}')"><i class="mx-1 fas fa-upload text-info fa-2x"></i></a>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                            <td width="50px">
                                <div class="text-center">
                                    @can('campaign.edit')
                                    <a href="{{ route('campaign.elemento.editelemento',[$campaign->id,$elemento->id]) }}" title="Edit"><x-icon.edit/></a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@push('scriptchosen')

<script src="{{ asset('js/sortTable.js')}}"></script>
<script>
    $(document).ready(function() {

    });
   function subirImagenIndex(formulario,elementoId,campaignId){
        var token= $('#token').val();
        let timestamp = Math.floor( Date.now() );
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('#token').val() },
        });

        var formElement = document.getElementById(formulario);
        var formData = new FormData(formElement);
        formData.append("elementoId", elementoId);

        $.ajax({
            type:'POST',
            url: "{{ route('campaign.elementos.updateimagenindex') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#'+formulario +' img').remove();
                $('#original'+elementoId).attr('src', '/storage/galeria/'+ campaignId+'/'+ data.imagen+'?ver=' + timestamp);
                toastr.info('Imagen actualizada con éxito','Imagen',{
                    "progressBar":true,
                    "positionClass":"toast-top-center"
                });
            },
            error: function(data){
                console.log(data);
                toastr.error("No se ha actualizado la imagen.<br>"+ data.responseJSON.message,'Error actualización',{
                    "closeButton": true,
                    "progressBar":true,
                    "positionClass":"toast-top-center",
                    "options.escapeHtml" : true,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": 0,
                });
            }
        });
    }


</script>

@endpush
