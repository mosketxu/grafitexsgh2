<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GrafitexSgh V2') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
            <header class="">
                <div class="">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 mt-9">Se han reportado las siguientes deficiencias en la entrega de la campaña: {{$details['campaignname']}}</h2>
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 mt-9">Tienda: {{$details['storename']}}</h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>

                @foreach ($deficiencias as $deficiencia )
                <div class="flex">
                    <div class="bg-red-400 ">{{$deficiencia->mobiliario}}</div>
                    <div class="">{{$deficiencia->propxelemento}}</div>
                    <div class="">{{$deficiencia->carteleria}}</div>
                    <div class="">{{$deficiencia->medida}}</div>
                    <div class="">{{$deficiencia->material}}</div>
                    <div class="">{{$deficiencia->initxprop}}</div>
                    <div class="">
                    @if(file_exists( 'storage/galeria/'.$details['campaignId'].'/thumbnails/thumb-'.$deficiencia->imagen ))
                        <img src="{{ $message->embed('storage/galeria/'.$details['campaignId'].'/thumbnails/thumb-'.$deficiencia->imagen) }}">
                    @else
                        <img src="{{ $message->embed('storage/galeria/pordefecto.jpg') }}">
                    @endif
                    </div>
                    <div class="">
                        {{$deficiencia->estadorecep->estado}}
                        {{$deficiencia->estadorecep->updated_at}}
                    </div>
                </div>
            @endforeach

            </main>
        </div>

        <footer>
            <div class="p-2 text-xs">powered by  <a href="mailto:alex.arregui@hotmail.es" class="text-blue-800 underline">alex.arregui@hotmail.es</a></div>
            <div class="w-11/12"></div> {{-- es por el npm runwatch --}}
        </footer>



    </body>
</html>
