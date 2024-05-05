<x-mail::message>
<h2 >{{$details['cuerpo']}} </h2>
@if($details['observaciones']!='')
<p>Observaciones: {{$details['observaciones']}}</p>
@endif

<x-mail::table>
| Producto    | Comentario | Unidades  | €/Ud      | Total    |
| :---------- |:----------:| ---------:| ---------:| --------:|
@foreach ($elementos as $elemento)
| {{$elemento->producto->producto}} | {{$elemento->comentario}} |{{$elemento->unidades}} | {{$elemento->preciounidad}} | {{$elemento->total}}  |
@endforeach
|             |            |           | **Total**     | **{{$peticion->total}}** |
</x-mail::table>
<x-mail::button :url="route('peticion.editar', [$peticion])">
Ver Petición en la aplicación
</x-mail::button>

</x-mail::message>
