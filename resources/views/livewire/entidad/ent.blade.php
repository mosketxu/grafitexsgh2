<div class="">
    <div class="p-1 mx-2">
        <div class="flex flex-row">
            <div class="w-6/12">
                <div class="flex flex-row items-center">
                    <div class="">
                        @if($entidad->id)
                            <h1 class="text-2xl font-semibold text-gray-900">Montador: {{ $entidad->entidad }}</h1>
                        @else
                            <h1 class="text-2xl font-semibold text-gray-900">Nuevo Montador</h1>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-6/12 text-right">
                @if($entidad->id)
                <x-button.buttongreen  onclick="location.href = '{{ route('entidad.contactos',$entidad) }}'" > {{ __('Contactos') }}</x-button.buttongreen>
                @endif
                <x-button.button  onclick="location.href = '{{ route('entidad.create') }}'" color="blue">Nuevo</x-button.button>
            </div>
        </div>

    </div>
    <div class="px-2 py-1 space-y-2" >
        <div class="">
            @include('errores')
        </div>
    </div>

    <div class="flex-none lg:flex">
        <div class="flex-col w-full space-y-2 text-gray-500 lg:w-8/12">
            <form wire:submit.prevent="save" class="">
                <div class="px-2 mx-2 my-1 rounded-md bg-blue-50">
                    <h3 class="font-semibold ">Datos generales</h3>
                    <x-jet-input  wire:model.defer="entidad.id" type="hidden"/>
                    <hr>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="entidad">Nombre</x-jet-label>
                        <x-jet-input wire:model.defer="entidad.entidad" type="text" class="w-full " id="entidad" name="entidad" :value="old('entidad') "/>
                        <x-jet-input-error for="entidad" class="mt-2" />
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="nif">{{ __('Nif') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.nif" type="text" id="nif" name="nif" :value="old('nif')" class="w-full"/>
                        <x-jet-input-error for="nif" class="mt-2" />
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="montador">{{ __('montador') }}</x-jet-label>
                        <x-jet-checkbox wire:model.defer="entidad.montador" name="montador" id="montador" />
                        {{-- <x-jet-input  wire:model.defer="entidad.montador" type="text" id="montador" name="montador" :value="old('montador')" class="w-full"/> --}}
                        <x-jet-input-error for="montador" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="emailgral">{{ __('Email Gral') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.emailgral" type="text" id="emailgral" name="emailgral" :value="old('emailgral')" class="w-full"/>
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="emailadm">{{ __('Email Adm') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.emailadm" type="text" id="emailadm" name="emailadm" :value="old('emailadm')" class="w-full"/>
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="emailadm">{{ __('Email Aux') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.emailaux" type="text" id="emailaux" name="emailaux" :value="old('emailaux')" class="w-full"/>
                    </div>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-5/12 form-item">
                        <x-jet-label class="pl-2" for="tfno">{{ __('Tfno.') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.tfno" type="text" id="tfno" name="tfno" :value="old('tfno')" class="w-full"/>
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="direccion">{{ __('Dirección') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.direccion" type="text" id="direccion" name="direccion" :value="old('direccion')" class="w-full"/>
                    </div>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-2/12 form-item">
                        <x-jet-label class="pl-2" for="cp">{{ __('C.P.') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.cp" type="text" id="cp" name="cp" :value="old('cp')" class="w-full"/>
                    </div>
                    <div class="w-4/12 form-item">
                        <x-jet-label class="pl-2" for="localidad">{{ __('Localidad') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.localidad" type="text" id="localidad" name="localidad" :value="old('localidad')" class="w-full"/>
                    </div>
                    <div class="w-4/12 form-item">
                        <x-jet-label class="pl-2" for="provincia">{{ __('Provincia') }}</x-jet-label>
                        <select wire:model.defer="entidad.provincia"
                            class="w-full py-1 text-sm text-gray-600 bg-white border-blue-300 rounded-md shadow-sm appearance-none hover:border-gray-400 focus:outline-none">
                            <option value="">-- selecciona --</option>
                            @foreach ($provincias as $provincia )
                            <option value={{ $provincia->id}} >{{ $provincia->provincia }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-3/12 form-item">
                        <x-jet-label class="pl-2" for="pais">{{ __('Pais') }}</x-jet-label>
                        <x-select wire:model.defer="entidad.pais_id" selectname="pais_id" class="w-full">
                            <option value="">-- choose --</option>
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>
                <div class="px-2 mx-2 my-2 rounded-md bg-blue-50">
                    <h3 class="font-semibold ">Datos Facturación</h3>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="banco1" >{{ __('Banco 1') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.banco1" type="text" id="banco1" name="banco1" :value="old('banco1')" class="w-full"/>
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="iban1" >{{ __('Iban 1') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.iban1" type="text" id="iban1" name="iban1" :value="old('iban1')" class="w-full"/>
                    </div>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="banco2" >{{ __('Banco 2') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.banco2" type="text" id="banco2" name="banco2" :value="old('banco2')" class="w-full"/>
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="iban2" >{{ __('Iban 2') }}</x-jet-label>
                        <x-jet-input  wire:model.defer="entidad.iban2" type="text" id="iban2" name="iban2" :value="old('iban2')" class="w-full"/>
                    </div>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="metodopago_id">{{ __('Método Pago') }}</x-jet-label>
                        <x-select wire:model.defer="entidad.metodopago_id" class="w-full" selectname="metodopago_id">
                            <option value="">-- choose --</option>
                            @foreach ($metodopagos as $metodopago)
                            <option value="{{ $metodopago->id }}">{{ $metodopago->nombrecorto }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="vencimientofechafactura">{{ __('Vto. Factura') }}</x-jet-label>
                        <x-select wire:model.defer="entidad.vencimientofechafactura" class="w-full" selectname="vencimientofechafactura">
                            <option value="">-- choose --</option>
                            <option value="30">30</option>
                            <option value="60">60</option>
                            <option value="90">90</option>
                        </x-select>
                    </div>
                </div>
                <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full form-item">
                        <x-jet-label class="pl-2" for="observaciones">{{ __('Observaciones') }}</x-jet-label>
                        <textarea wire:model.defer="entidad.observaciones" class="w-full text-sm border-gray-300 rounded-md" rows="1">{{ old('observaciones') }} </textarea>
                        <x-jet-input-error for="observaciones" class="mt-2" />
                    </div>
                </div>
                @if($escontacto!='Sí')
                    <div class="px-2 mx-2 my-2 rounded-md bg-blue-50">
                        <h3 class="font-semibold ">Datos Acceso Usuario {{ $entidad->user_id }}</h3>
                    </div>
                    <div class="flex flex-col pl-2 mx-2 space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                        <div class="w-full form-item">
                            <x-jet-label class="pl-2" for="useremail" >{{ __('User Email') }} {{ $entidad->user_id }}</x-jet-label>
                            <x-jet-input  wire:model.defer="entidad.useremail" type="email" id="useremail" name="useremail" :value="old('useremail')" class="w-full"/>
                        </div>
                        <div class="w-full form-item">
                            <x-jet-label class="pl-2" for="password" >{{ __('Password') }}</x-jet-label>
                            <x-jet-input  wire:model.defer="entidad.password" type="text" id="password" name="password" :value="old('password')" class="w-full"/>
                        </div>
                        <div class="w-1/12 form-item">
                            <x-icon.trash class="mt-4 text-red-500" id="borraracceso" title="Borrar datos de acceso" wire:click.prevent="deletedatosacceso({{ $entidad }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
                        </div>
                    </div>
                @endif
                <div class="flex pl-2 mt-2 mb-2 ml-2 space-x-4">
                    <div class="space-x-3">
                        <x-jet-button class="bg-blue-600">
                            {{ __('Guardar') }}
                        </x-jet-button>
                        @if($ruta=="entidad")
                            <x-jet-secondary-button  onclick="location.href = '{{route('entidad.index' )}}'">{{ __('Volver') }}</x-jet-secondary-button>
                        @else
                            <x-jet-secondary-button  onclick="location.href = '{{route('entidad.edit',[$ruta] )}}'">{{ __('Volver') }}</x-jet-secondary-button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        @if($escontacto!='Sí')
        <div class="w-full space-y-2 text-gray-500 lg:w-4/12 lg:mx-2 lg:px-2">
            <div class="rounded-md bg-blue-50"><h3 class="font-semibold ">Areas</h3></div>
                @if($entidad->id)
                <div class="flex">
                    <div class="w-9/12 form-item">
                        <x-select wire:model.defer="area" selectname="area" class="w-full">
                            <option value="">-- añadir Area --</option>
                            @foreach ($areasNo as $area)
                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="items-center w-2/12 mx-auto text-center">
                        <x-jet-button class="py-1 bg-blue-600" wire:click="savearea">{{ __('Añadir') }}</x-jet-button>
                    </div>
                </div>
                @endif
                <div class="flex w-full mx-1 space-x-2 text-sm bg-blue-50">
                    <div class="w-3/12 pl-2">Area</div>
                    <div class="w-8/12">Observaciones</div>
                    <div class="w-10"></div>
                </div>
                @forelse ($entidad->entidadareas as $areaSi )
                    <div class="flex w-full mx-1 mt-1 space-x-2 text-sm">
                        <div class="w-3/12"><x-jet-input type="text" class="w-full" value="{{ $areaSi->area->area }}" readonly /></div>
                        <div class="w-8/12">
                            <x-jet-input type="text" class="w-full" value="{{ $areaSi->observaciones }}"
                                wire:change="changeValor({{ $areaSi }},$event.target.value)"/>
                            </div>
                        <div class="w-10">
                            <x-icon.trash-a class="text-red-500" wire:click.prevent="delete({{ $areaSi->id }})" onclick="confirm('¿Estás seguro?') || event.stopImmediatePropagation()"/>
                        </div>
                    </div>
                @empty
                    <div class="w-full pl-2">
                        No hay áreas asignadas
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</div>
