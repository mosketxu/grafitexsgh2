<x-mail::message>
<h2 >Se ha creado una nueva petición en la tienda:</h2><h3 >{{$details['storename']}} </h3>

<x-mail::table>
| Producto    | Comentario | Unidades  | €/Ud      | Total    |
| :---------- |:----------:| ---------:| ---------:| --------:|
@foreach ($elementos as $elemento)
| {{$elemento->producto_id}} | {{$elemento->comentario}} |{{$elemento->unidades}} | {{$elemento->preciounidad}} | {{$elemento->total}}  |
@endforeach

</x-mail::table>

<x-mail::button :url="route('peticion.editar', [$peticion])">
Ver Petición en la aplicación
</x-mail::button>

</x-mail::message>
