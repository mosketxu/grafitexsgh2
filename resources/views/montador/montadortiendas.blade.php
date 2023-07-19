<div class="">
    <div class="">
        @include('errores')
    </div>
    <table class="w-full text-sm text-left">
        <thead class="flex flex-col w-full text-white bg-black rounded-t-md">
            <tr class="flex w-full ">
                <th class="w-4/12 pl-2">Store</th>
                <th class="w-2/12">Campaña</th>
                <th class="w-4/12">Fechas Previstas</th>
                <th class="w-2/12">Estado</th>
            </tr>
        </thead>
        <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 55vh;">
            @foreach ($camptiendas as $camptienda)
            <tr class="flex w-full py-1 {{ $loop->even ? 'bg-blue-50' : 'bg-blue-100'}} hover:bg-gray-100 cursor-pointer" onclick="location.href = '{{ route('montador.edittienda',$camptienda) }}'" color="gray" >
                <td class="w-4/12 pl-2">{{$camptienda->store_id}} {{$camptienda->tienda->name}} {{$camptienda->tienda->city !='' ? '('.$camptienda->tienda->city.')' : ''}}</td>
                <td class="w-2/12 pl-2">{{$camptienda->campaign->campaign_name}}</td>
                <td class="flex-col w-4/12 pl-2">
                    <div class="">{{$camptienda->fechaprev1}} {{ $camptienda->monta1 }}</div>
                    <div class="">{{$camptienda->fechaprev2}} {{ $camptienda->monta2 }}</div>
                    <div class="">{{$camptienda->fechaprev3}} {{ $camptienda->monta3 }}</div>
                </td>
                <td class="w-2/12 pl-2">{{$camptienda->estadomonta}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mx-2 ">
        {{ $camptiendas->appends(request()->except('page'))->links() }}
    </div>
</div>

@push('scriptchosen')

<script>

var select = document.getElementById('filtroestadomontaje');
select.onchange = function(){
    this.form.submit();
};

</script>

@endpush
