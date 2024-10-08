    <div class="relative p-2 bg-white border rounded">
        <div class="">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-bold">{{ $titulo }}</h3>
                </div>
                <div>
                    <input type="text" wire:model="search" class="w-full py-2 mb-2 text-xs text-gray-600 placeholder-gray-300 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none" placeholder="Búsqueda" autofocus/>
                </div>
            </div>

            @if ($errors->any())
                <div id="alert" class="relative px-6 py-2 mb-2 text-white bg-red-200 border-red-500 rounded border-1">
                    <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button class="absolute top-0 right-0 mt-2 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
                        <span>×</span>
                    </button>
                </div>
            @endif

            <div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-t-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            @if ($campo1visible==1)
                                <th class="px-1 py-3 pl-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 bg-blue-50" >{{ __($titcampo1) }}</th>
                            @endif
                            @if ($campo2visible==1)
                                <th class="px-1 py-3 pl-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 bg-blue-50" >{{ __($titcampo2) }} </th>
                            @endif
                            @if ($campo3visible==1)
                                <th class="px-1 py-3 pl-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 bg-blue-50" >{{ __($titcampo3) }}</th>
                            @endif
                            @if ($campo4visible==1)
                                <th class="px-1 py-3 pl-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 bg-blue-50" >{{ __($titcampo4) }}</th>
                            @endif
                            <th class="px-1 py-3 pl-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 bg-blue-50" ></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach ($valores as $valor)
                            <tr wire:loading.class.delay="opacity-50">
                                @if ($campo1visible==1)
                                <td class="px-1 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap" >
                                    <input type="text" value="{{ $valor->valorcampo1 }}"
                                    wire:change="changeCampo({{ $valor }},'{{ $campo1 }}',$event.target.value)"
                                    class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo1fondo}}"
                                    {{$campo1disabled}}/>
                                </td>
                                @endif
                                @if ($campo2visible==1)
                                <td class="px-1 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap">
                                    <input type="text" value="{{ $valor->valorcampo2 }}"
                                    wire:change="changeCampo({{ $valor }},'{{ $campo2 }}',$event.target.value)"
                                    class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo2fondo}}"
                                    {{$campo2disabled}}/>
                                </td>
                                @endif
                                @if ($campo3visible==1)
                                <td class="px-1 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap">
                                    @if($campo3=='empresa')
                                    <select  selectname="empresa" id="empresa" name="empresa"
                                        class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo3fondo}}"
                                        wire:change="changeCampo({{ $valor }},'{{ $campo3 }}',$event.target.value)"
                                        {{$campo3disabled}}>
                                        <option value="Grafitex" {{ $valor->valorcampo3=='Grafitex' ? 'selected' : '' }}>Grafitex</option>
                                        <option value="SGH" {{ $valor->valorcampo3=='SGH' ? 'selected' : '' }}>SGH</option>
                                    <select>
                                    @elseif($campo3='password')
                                        <input type="password" value="{{ $valor->valorcampo3 }}"
                                            wire:change="changeCampo({{ $valor }},'{{ $campo3 }}',$event.target.value)"
                                            class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo3fondo}}"
                                            {{$campo3disabled}}/>
                                    @else
                                    <input type="text" value="{{ $valor->valorcampo3 }}"
                                        wire:change="changeCampo({{ $valor }},'{{ $campo3 }}',$event.target.value)"
                                        class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo3fondo}}"
                                        {{$campo3disabled}}/>
                                    @endif
                                </td>
                                @endif
                                @if ($campo4visible==1)
                                <td class="px-1 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap">
                                    @if($titcampo4='Rol')
                                    <input type="text" value="{{ $valor->getRoleNames() }}"
                                        wire:change="changeCampo({{ $valor }},'{{ $campo4 }}',$event.target.value)"
                                        class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo4fondo}}"
                                        {{$campo4disabled}}/>
                                    @else
                                    <input type="text" value="{{ $valor->valorcampo4 }}"
                                        wire:change="changeCampo({{ $valor }},'{{ $campo4 }}',$event.target.value)"
                                        class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo4fondo}}"
                                        {{$campo4disabled}}/>
                                    @endif
                                </td>
                                @endif
                                <td  class="px-4">
                                    <div class="flex items-center justify-center space-x-3">
                                        @if($editarvisible==1)
                                            <x-icon.edit-a wire:click="editar({{ $valor->id }})" class="pl-1"  title="Editar {{ $titulo }}"/>
                                        @endif
                                        <x-icon.delete-a wire:click.prevent="delete({{ $valor->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()" class="pl-1"  title="Eliminar detalle"/>
                                    </div>
                                </td >
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot class="bg-blue-100">
                        <form wire:submit.prevent="save">
                            <tr >
                                @if ($campo1visible==1)
                                <td class="p-2 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap" >
                                    <input type="text" wire:model.defer="valorcampo1"
                                    class="w-full text-xs text-left border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 {{$campo1fondo}}" {{$campo1disabled}}/>
                                </td>
                                @endif
                                @if ($campo2visible==1)
                                <td class="p-2 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap" >
                                    <input type="text" wire:model.defer="valorcampo2"
                                    class="w-full text-xs text-left border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 {{$campo2fondo}}" {{$campo2disabled}}/>
                                </td>
                                @endif
                                @if ($campo3visible==1)
                                <td class="p-2 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap" >
                                    @if($campo3=='empresa')
                                    <select  selectname="empresa" id="empresa" name="empresa"
                                        class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo3fondo}}"
                                        wire:model.defer="valorcampo3" {{$campo3disabled}}>
                                        <option value="" >--Selecciona Empresa--</option>
                                        <option value="Grafitex" {{ $valorcampo3=='Grafitex' ? 'selected' : '' }}>Grafitex</option>
                                        <option value="SGH" {{ $valorcampo3=='SGH' ? 'selected' : '' }}>SGH</option>
                                    <select>
                                    @elseif($campo3=='password')
                                        <input type="password" wire:model.defer="valorcampo3"
                                        class="w-full text-xs text-left border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 {{$campo3fondo}}" {{$campo3disabled}}/>
                                    @else
                                        <input type="text" wire:model.defer="valorcampo3"
                                        class="w-full text-xs text-left border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 {{$campo3fondo}}" {{$campo3disabled}}/>
                                    @endif
                                </td>
                                @endif
                                @if ($campo4visible==1)
                                <td class="p-2 text-xs leading-5 tracking-tighter text-gray-600 whitespace-no-wrap" >
                                    @if(!$titcampo4='Rol')
                                        <input type="text" wire:model.defer="valorcampo4"
                                        class="w-full text-xs text-left border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 {{$campo4fondo}}"
                                        {{$campo4disabled}}/>
                                    @else
                                        <select  selectname="valorcampo4" id="empresa" name="valorcampo4"
                                            class="w-full text-xs font-thin text-gray-500 border-0 rounded-md {{$campo4fondo}}"
                                            wire:model.defer="valorcampo4" {{$campo4disabled}}>
                                            <option value="" >--Selecciona Rol--</option>
                                            @foreach ($campo4combo as $rol )
                                                <option value="{{ $rol->name }}" >{{ $rol->name }}</option>
                                            @endforeach
                                        <select>
                                    @endif
                                </td>
                                @endif

                                <td  class="p-2 ">
                                    <button type="submit" class="items-center pl-1 mx-0 mt-2 text-center w-7 "><x-icon.save-a class="text-blue"></x-icon.save-a></button>
                                </td>
                            </tr>
                        </tfoot>
                        <div class="w-full">
                        </div>
                    </form>
                </table>
                {{ $valores->onEachSide(0)->links() }}
            </div>
        </div>
    </div>
