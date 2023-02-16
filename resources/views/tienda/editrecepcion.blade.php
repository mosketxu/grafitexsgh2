<div class="">
    <div class="p-1 mx-2">
        <div class="text-gray-500 border border-blue-300 rounded shadow-md">
            <div class="flex w-full p-1 bg-gray-100 rounded-md">
                <div class="w-6/12 rounded-md">
                    <label for="campaign_name">Campaña</label>
                    <input type="text" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_name"
                        name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_initdate">Fecha Inicio</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_initdate"
                        name="campaign_initdate"
                        value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                        disabled />
                </div>
                <div class="w-3/12">
                    <label for="campaign_enddate">Fecha Finalización</label>
                    <input type="date" class="w-full py-1 bg-gray-100 rounded-md form-control form-control-sm" id="campaign_enddate"
                        name="campaign_enddate"
                        value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                        disabled />
                </div>
            </div>
        </div>
    </div>
    <div class="mx-2">
        <div class="flex items-center py-2">
            <div class="w-6/12">
                <div class="flex space-x-3">
                    <div class="pl-2 text-xl font-bold ">
                        Listado de elementos recibidos
                    </div>
                    <form method="GET" action="{{route('tienda.editrecepcion',[$campaign->id,$store->id]) }}">
                        <input id="busca" name="busca"  type="search" name="search" value='{{$busqueda}}' placeholder="Search for..."
                        class ="flex-1 block w-full p-1 transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300"/>
                    </form>
                </div>
            </div>
            <div class="flex flex-row-reverse w-6/12 text-left ">
                {{ $elementos->appends(request()->except('page'))->links() }}
            </div>
        </div>
        <div class="w-full h-3/5">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black">
                    <tr class="flex w-full">
                        <th class="text-left w-14">Ubicación</th>
                        <th class="w-1/12 text-left">Mobiliario</th>
                        <th class="w-1/12 text-left">Prop x <br> Elemento</th>
                        <th class="w-1/12 text-left">Carteleria</th>
                        <th class="w-1/12 text-left">Medida</th>
                        <th class="w-1/12 text-left">Material</th>
                        <th class="text-left w-14">Unit x <br> Prop</th>
                        <th class="w-2/12 text-center">
                            <div class="">
                                Estado
                            </div>
                            <div class="flex justify-between px-10">
                                <div class="w-3/12"><x-icon.arrows-rotate-a href="{{route('tienda.editrecepcion',[$campaign->id,$store->id])}}" class="text-blue-600"/></div>
                                <div class="w-3/12 mx-auto text-center"><x-icon.question class="w-2 h-5 mx-auto mb-1 text-center text-white"/>{{$sinvalorar}}</div>
                                <div class="w-3/12 mx-auto text-center"><x-icon.thumbs-up class="w-4 mx-auto mb-1 text-center text-white"/>{{$correctos}}</div>
                                <div class="w-3/12 mx-auto text-center"><x-icon.thumbs-down class="w-4 mx-auto mb-1 text-center text-white"/>{{$incidencias}}</div>
                            </div>
                        </th>
                        <th class="w-3/12">Observaciones</th>
                        <th class="w-1/12"></th>
                        <th class="w-5"></th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 55vh;">
                    @foreach ($elementos as $elemento)
                    <form id="form{{$elemento->id}}" role="form" method="post" action="{{route('tienda.update')}}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="storeId" value="{{$store->id}}">
                    <input type="hidden" name="elementoId" value="{{$elemento->id}}">
                    <input type="hidden" name="campaignId" value="{{$campaign->id}}">
                        <tr class="flex items-center w-full">
                            <td class="w-14">{{$elemento->ubicacion}}</td>
                            <td class="w-1/12">{{$elemento->mobiliario}}</td>
                            <td class="w-1/12">{{$elemento->propxelemento}}</td>
                            <td class="w-1/12">{{$elemento->carteleria}}</td>
                            <td class="w-1/12">{{$elemento->medida}}</td>
                            <td class="w-1/12">{{$elemento->material}}</td>
                            <td class="w-14">{{$elemento->unitxprop}}</td>
                            <td class="w-2/12">
                                <div class="flex">
                                    <div class="">
                                        <span id="estado{{$elemento->id}}">
                                            @if($elemento->estadorecepcion=='1')
                                            <x-icon.thumbs-up  class="w-4 mb-1 text-green-500"/>
                                            @elseif($elemento->estadorecepcion>'1')
                                            <x-icon.thumbs-down  class="w-4 mb-1 text-red-500"/>
                                            @else
                                            <x-icon.question class="w-2 mb-1 text-black"/>
                                            @endif
                                        <span>
                                    </div>
                                    <select name="estadorecepcion"  onchange="update('form{{$elemento->id}}',{{$elemento->id}})" id="valorestado{{$elemento->id}}"
                                        class = "w-full py-1 pl-1 text-xs text-left border-blue-300 rounded-md form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-xs" >
                                        <option value="0" {{$elemento->estadorecepcion == "0" ? 'selected' : ''}}>Selecciona...</option>
                                        <option value="1" {{$elemento->estadorecepcion == "1" ? 'selected' : ''}}>OK</option>
                                        <option value="2" {{$elemento->estadorecepcion == "2" ? 'selected' : ''}}>No recibido</option>
                                        <option value="3" {{$elemento->estadorecepcion == "3" ? 'selected' : ''}}>Defectuoso</option>
                                        <option value="4" {{$elemento->estadorecepcion == "4" ? 'selected' : ''}}>Idioma incorrecto</option>
                                    </select>
                                </div>
                            </td>
                            <td class="w-3/12">
                                <textarea rows="1" name="obsrecepcion"
                                onchange="update('form{{$elemento->id}}',{{$elemento->id}})"
                                class ="flex-1 block w-full py-1.5 text-xs transition duration-150 border border-blue-300 rounded-lg form-input hover:border-blue-300 focus:border-blue-300 active:border-blue-300"
                                placeholder="Escribe tus comentarios">{{old('obsrecepcion', $elemento->obsrecepcion)}}</textarea>

                            </td>
                            <td class="w-1/12 ">
                                @if(file_exists( 'galeria/'.$campaign->id.'/'.$elemento->imagen ))
                                    <img src="{{asset('galeria/'.$campaign->id.'/'.$elemento->imagen.'?'.time())}}"
                                        alt={{$elemento->imagen}} title={{$elemento->imagen}} id="original"
                                        class="p-1 mx-auto border-2 rounded-md shadow-md" style="height: 60px"/>
                                @else
                                    <img src="{{asset('galeria/pordefecto.jpg')}}" alt={{$elemento->imagen}}
                                        title={{$elemento->imagen}} id="original" class="p-1 mx-auto border-2 rounded-md shadow-md"
                                        style="height: 60px"/>
                                @endif
                            </td>
                            <td class="w-5 pr-2 mt-1 mr-2">
                                {{-- <x-icon.save-a href="#" name="Upload" onclick="update('form{{$elemento->id}}',{{$elemento->id}})" title="Upload"/> --}}
                                <x-icon.save-a href="{{route('tienda.editrecepcion',[$campaign->id,$store->id])}}" class="text-blue-600"/>

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

<script>
   function update(formulario,id){
        var token= $('#token').val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('#token').val() },
        });
        var formElement = document.getElementById(formulario);
        var formData = new FormData(formElement);
        var estado='#estado'+id;
        var valest=$('#valorestado'+id).val();

        $.ajax({
            type:'POST',
            url: "{{ route('tienda.update') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
                if(valest==1){
                    // $('#nv').text(parseInt($('#nv').text())-1);
                    // $('#ok').text(parseInt($('#ok').text())+1);
                    $(estado).html('<i class="far fa-thumbs-up text-success fa-lg"></i>');
                }else if(valest>1){
                    // $('#nv').text(parseInt($('#nv').text())-1);
                    // $('#ko').text(parseInt($('#ko').text())+1);
                    $(estado).html('<i class="far fa-thumbs-down text-danger fa-lg"></i>');
                }
                toastr.info('Recepción actualizada con éxito',{
                    "progressBar":true,
                    "positionClass":"toast-top-center"
                });
            },
            error: function(data){
                console.log(data);
                toastr.error("No se ha actualizado la recepcion",{
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

