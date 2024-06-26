<div class="h-full p-1 ">
    @in
    <div class="">
        @include('errores')
    </div>
    <div class="">
        <div class="w-full mt-2">
            <table class="w-full text-xs text-left">
                <thead class="flex flex-col w-full text-white bg-black rounded-t-md">
                    <tr class="flex w-full">
                        {{-- <th class="w-1/12 pl-2">#</th> --}}
                        <th class="w-2/12">Material</th>
                        <th class="w-2/12">Medida</th>
                        <th class="w-2/12">Id tarifa</th>
                        <th class="w-2/12">Tarifa Antigua</th>
                        <th class="w-2/12">Tarifa Nueva</th>
                        <th class="w-1/12 "></th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full overflow-y-scroll bg-grey-light" style="height: 65vh;">
                    @foreach($elementos as $elemento)
                    <form id="form{{$elemento->elementificador}}" role="form" method="post" action="{{ route('campaign.presupuesto.updateelemento') }}" >
                        @method('PUT')
                        @csrf
                        <tr class="flex items-center w-full">
                            <input type="hidden" name="elementificador" value="{{$elemento->elementificador}}" >
                            <input type="hidden" name="campaign_id" value="{{$elemento->campaign_id}}" >
                            <td class="w-2/12">{{$elemento->material}}</td>
                            <td class="w-2/12">{{$elemento->medida}}</td>
                            <td class="w-2/12">{{$elemento->familia}}</td>
                            <td class="w-2/12">{{$elemento->tarifa->familia}}</td>
                            <td class="w-2/12">
                                <x-select selectname="familia" class="w-full py-1 text-base border-blue-300" id="familia">
                                    <option value="">--nueva tarifa--</option>
                                    @foreach($tarifas as $tarifa)
                                    <option value="{{$tarifa->id}}" {{ $tarifa->id== $elemento->tarifa->familia ? 'selected' :'' }} >{{$tarifa->familia}}</option>
                                    @endforeach
                                </x-select>

                            </td>
                            <td class="w-1/12 text-center">
                                <button type="submit"><x-icon.save class="w-6 text-blue-600"/></button>
                            </td>
                        </tr>
                    </form>
                    <div class="result"></div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scriptchosen')

<script>
</script>

@endpush
