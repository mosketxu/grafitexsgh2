<x-mail::message>
<div class="bg-red-500">
<h2 >Se han reportado las siguientes deficiencias en una entrega.</h2>
<h3> Campaña: {{$details['campaignname']}}</h3>
<h3 >Tienda: {{$details['storename']}} </h3>
</div>

        {{-- @if(file_exists( 'storage/galeria/'.$details['campaignId'].'/thumbnails/thumb-'.$deficiencia->imagen ))
            <img src="{{ $message->embed('storage/galeria/'.$details['campaignId'].'/thumbnails/thumb-'.$deficiencia->imagen) }}">
        @else
            <img src="{{ $message->embed('storage/galeria/pordefecto.jpg') }}">
        @endif --}}

<x-mail::table>
| Mobiliario    | Prop x Elemento| Carteleria  | Medida      | Material    | Unit x Prop | Incidencia |
| :------------ |:--------------:| -----------:| -----------:| -----------:| -----------:| ----------:|
@foreach ($deficiencias as $deficiencia)
| {{$deficiencia->mobiliario}} | {{$deficiencia->propxelemento}} |{{$deficiencia->carteleria}} | {{$deficiencia->medida}} | {{$deficiencia->material}}  | {{$deficiencia->unitxprop}} | {{$deficiencia->estadorecep->estado}} |
@endforeach

</x-mail::table>

<x-mail::table>
| Elem.Faltante | Cantidad       | Observaciones  |
| :------------ |:--------------:| :------------- |
@foreach ($faltantes as $faltante)
| {{$faltante->elementofaltante}} | {{$faltante->cantidad}} |{{$faltante->observaciones}} |
@endforeach

</x-mail::table>

<x-mail::button :url="route('tienda.editrecepcion', [$details['campaignId'], $details['storeId']])">
Ver incidencias en la aplicación
</x-mail::button>

</x-mail::message>
