<div class="">
    <div class="h-full p-1 mx-2">
        <div class="py-1 space-y-2">
            <div class="">
                @include('errores')
            </div>
        </div>
    </div>
    <div class="m-2 space-y-4 text-gray-500">
        <div class="flex w-full">
            <div class="w-6/12">
                @livewire('tarifas.tarifas',['tipo'=>'1','titulo'=>'Tarifas picking','color'=>'bg-blue-500','campo'=>'zona','buscar'=>'0'])
            </div>
            <div class="w-6/12">
                @livewire('tarifas.tarifas',['tipo'=>'2','titulo'=>'Tarifas transporte','color'=>'bg-yellow-500','campo'=>'zona','buscar'=>'0'])
            </div>
        </div>
        <div class="w-full py-2 space-y-1 rounded-md shadow-md">
            @livewire('tarifas.tarifas',['tipo'=>'0','titulo'=>'Tarifas materiales','color'=>'bg-green-500','campo'=>'familia','buscar'=>'1'])
        </div>
    </div>
</div>

@push('scriptchosen')


<script>
</script>

@endpush
