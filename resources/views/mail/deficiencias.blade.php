<x-mail::message>
<div class="bg-red-500">
<h2 class="text-xl font-semibold leading-tight text-gray-800 mt-9">Se han reportado las siguientes deficiencias en la entrega de la campaña: {{$details['campaignname']}}</h2>
<h2 class="text-xl font-semibold leading-tight text-gray-800 mt-9">Tienda: {{$details['storename']}} ;</h2>
</div>

        {{-- @if(file_exists( 'storage/galeria/'.$details['campaignId'].'/thumbnails/thumb-'.$deficiencia->imagen ))
            <img src="{{ $message->embed('storage/galeria/'.$details['campaignId'].'/thumbnails/thumb-'.$deficiencia->imagen) }}">
        @else
            <img src="{{ $message->embed('storage/galeria/pordefecto.jpg') }}">
        @endif --}}

<x-mail::table>
| Mobiliario    | Prop x Elemento| Carteleria  | Medida      | Material    | Unit x Prop |
| :------------ |:--------------:| -----------:| -----------:| -----------:| -----------:|
@foreach ($deficiencias as $deficiencia)
| {{$deficiencia->mobiliario}} | {{$deficiencia->propxelemento}} |{{$deficiencia->carteleria}} | {{$deficiencia->medida}} | {{$deficiencia->material}}  | {{$deficiencia->unitxprop}} |
@endforeach

</x-mail::table>

<x-mail::button :url="route('tienda.editrecepcion', [$details['campaignId'], $details['storeId']])">
Ver incidencias en la aplicación
</x-mail::button>

</x-mail::message>  
