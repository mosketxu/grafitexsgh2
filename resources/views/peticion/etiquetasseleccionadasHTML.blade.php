<html>
    <head>
        <style>
            @page {
               margin: 10px 25px;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('css/pdf.css')}}">
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
        </header>
        <footer>
            {{now()}}
        </footer>
        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <div class="">
                <table width="100%" cellspacing="0">
                    <thead>
                        <tr style="background-color: #139cdc;">
                            <th style="text-align: center;color:#ffffff" width="30%">
                                <img src="{{asset('img/grafitexLogo.png')}}" width="50px"><br>
                                    Grafitex Servicios Digitales, S.A.
                            </th>
                            {{-- <th style="color:#ffffff;text-align:center;"  width="70%">
                                Petición Nº {{$peticion->id}}<br>
                                Peticionario:{{$peticion->peticionario->name}}<br>
                                Email:{{$peticion->peticionario->email}}<br>
                                Store: {{$peticion->peticionario->store->name ?? '-'}} <br>
                                F.Petición: {{$peticion->fecha}} <br>
                            </th> --}}
                            {{-- <th style="color:#ffffff;text-align:center;font-size:0.9em;"  width="25%">
                            </th> --}}
                        </tr>
                    </thead>
                </table>
                <div>
                    @foreach($peticiones as $peticion)
                        <table width="100%"  cellspacing="0" cellpadding="0" style="margin-top: 5px;margin-bottom: 5px;" >
                            <tbody>
                                <tr style="background-color: #bec0c2;border: none;text-align:center;font-size:0.9em;">
                                    <td>Petición Nº: <br>{{$peticion->id}}</td>
                                    <td >Peticionario:<br>{{$peticion->peticionario->name}}</td>
                                    <td>Email:<br>{{$peticion->peticionario->email}}</td>
                                    <td>Store:<br> {{$peticion->peticionario->store->name ?? '-'}}</td>
                                    <td>F.Petición:<br> {{$peticion->fecha}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="1" cellpadding="1" >
                            <thead>
                                <tr>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                    <th width="20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peticion->peticiondetalles->chunk(5) as $chunk)
                                <tr>
                                    @foreach($chunk as $detalle)
                                    <td class="celda" >
                                        Producto: {{$detalle->producto->producto }}<br>
                                        Unidades: {{$detalle['unidades'] }}<br>
                                        @if($detalle->producto->imagenes->count()>0)
                                            @if(file_exists( 'storage/producto/'.$detalle->producto->id.'/'.$detalle->producto->imagenes->first()->imagen ?? '-'  ))
                                                <img src="{{asset('storage/producto/'.$detalle->producto->id.'/thumbnails/thumb-'.$detalle->producto->imagenes->first()->imagen)}}" class="img-thumbnail" alt="{{$detalle->producto->imagenes->first()->imagen}}"/>
                                            @endif
                                        @else
                                            <img src="{{asset('storage/galeria/pordefecto.jpg')}}" class="img-thumbnail" alt="pordefecto.jpg"/>
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
            <div style="page-break-after:always;"></div>
        </main>
    </body>
</html>
