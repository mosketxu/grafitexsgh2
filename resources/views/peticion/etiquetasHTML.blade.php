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
                            <th style="color:#ffffff;text-align:center;"  width="70%">
                                Petición Nº {{$peticion->id}}<br>
                                Peticionario:{{$peticion->peticionario->name}}<br>
                                Email:{{$peticion->peticionario->email}}<br>
                                Store: {{$peticion->peticionario->store->name ?? '-'}} <br>
                                F.Petición: {{$peticion->fecha}} <br>
                            </th>
                            {{-- <th style="color:#ffffff;text-align:center;font-size:0.9em;"  width="25%">
                            </th> --}}
                        </tr>
                    </thead>
                </table>
                <div>
                    <table width="100%">
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
                                <td class="celda">
                                    Producto: {{$detalle->producto->producto }}<br>
                                    {{-- Desccripción: {{$detalle->producto->descripcion }}<br> --}}
                                    Unidades: {{$detalle['unidades'] }}<br>
                                    {{-- Imagen: {{$detalle->producto->imagenes->first()->imagen }}<br> --}}
                                    {{-- @if(file_exists( 'storage/galeria/'.$peticion->id.'/'.$detalle['imagen'] )) --}}
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
                </div>
                <div class="idioma">
            </div>
            <div style="page-break-after:always;"></div>
        </main>
    </body>
</html>
