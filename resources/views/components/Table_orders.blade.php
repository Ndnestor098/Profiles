@php
    $status_color = [
        'Activo' => 'bg-blue-100 text-blue-700',
        'Inactivo' => 'bg-orange-100 text-orange-700',
        'Eliminado' => 'bg-red-100 text-red-700',
    ];
@endphp

<section class="p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100">
        {{-- header card --}}
        <div class="px-6 pt-5 pb-4 flex items-center justify-between">
            <div class="flex items-center gap-3 rounded-2xl px-3 py-2
                        bg-blue-50 border border-blue-100
                        cursor-pointer select-none
                        hover:bg-blue-100 hover:border-blue-200
                        transition-all duration-200"
                onclick="openModalCreate(true)"           
            >

                <div class="w-9 h-9 rounded-xl bg-blue-600/10 text-blue-600
                            flex items-center justify-center">
                    {{-- Add user icon --}}
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.5 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 8v6"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M17 11h6"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>

                <h2 class="text-sm font-semibold text-blue-900">
                    Agregar perfil
                </h2>
            </div>



            {{-- search --}}
            <div class="relative w-64">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    {{-- search icon --}}
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                        <path d="M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16Z"
                              stroke="currentColor" stroke-width="2"/>
                        <path d="m21 21-4.3-4.3"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </span>

                <input
                    type="text"
                    placeholder="Buscar"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 pl-11 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-300"
                />
            </div>
        </div>

        {{-- table --}}
        <div class="px-6 pb-4">
            <div class="overflow-hidden rounded-2xl border border-slate-100">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr class="text-left">
                            <th class="text-center w-[72px] px-4 py-3 font-semibold">ID</th>
                            <th class="text-center w-[72px] px-4 py-3 font-semibold">Nivel</th>
                            <th class="px-4 py-3 font-semibold">Nombre</th>
                            <th class="px-4 py-3 font-semibold">Email</th>
                            <th class="px-4 py-3 font-semibold">Password</th>
                            <th class="px-4 py-3 font-semibold">Clave 2FA</th>
                            <th class="px-4 py-3 font-semibold">
                                <button class="flex items-center gap-2 hover:text-slate-800 transition">
                                    Fecha creación
                                    {{-- sort icon --}}
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                        <path d="M8 10l4-4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 14l-4 4-4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </th>
                            <th class="px-4 py-3 font-semibold">
                                <button class="flex items-center gap-2 hover:text-slate-800 transition">
                                    Fecha modificación
                                    {{-- sort icon --}}
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                        <path d="M8 10l4-4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 14l-4 4-4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </th>
                            <th class="px-4 py-3 font-semibold">Estado</th>
                            <th class="text-center w-[63px] px-1 py-3 font-semibold">Modificar</th>
                            <th class="text-center w-[63px] px-1 py-3 font-semibold">Eliminar</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @if($profiles->count() == 0)
                            <tr>
                                <td colspan="11" class="text-center py-4 text-slate-500">No hay perfiles</td>
                            </tr>
                        @else
                            @foreach($profiles as $r)
                                <tr class="hover:bg-slate-50/60">
                                    <td class="cursor-pointer px-4 py-3 text-slate-700 font-bold" onclick="openModalView(true, {{ json_encode($r) }})">{{ $r['profile_code'] }}</td>
                                    <td class="cursor-pointer px-4 py-3 text-slate-700 h-10 w-10" onclick="openModalView(true, {{ json_encode($r) }})">
                                        <x-level_table :level="$r['level']" />
                                    </td>
                                    <td class="cursor-pointer px-4 py-3 text-slate-700" onclick="openModalView(true, {{ json_encode($r) }})">{{ $r['nombre'] }}</td>
                                    <td class="cursor-pointer px-4 py-3 text-slate-700" onclick="openModalView(true, {{ json_encode($r) }})">{{ $r['email'] }}</td>
                                    <td class="cursor-pointer px-4 py-3 text-slate-800 font-medium" onclick="openModalView(true, {{ json_encode($r) }})">{{ $r['password'] }}</td>
                                    <td class="cursor-pointer px-4 py-3 text-slate-800 font-medium" onclick="openModalView(true, {{ json_encode($r) }})">{{ $r['clave_2fa'] }}</td>
                                    <td class="cursor-pointer px-4 py-3 text-slate-800 font-medium" onclick="openModalView(true, {{ json_encode($r) }})">{{ $r['fecha_creacion'] }}</td>
                                    <td class="cursor-pointer px-4 py-3 text-slate-800 font-medium" onclick="openModalView(true, {{ json_encode($r) }})">{{ $r['fecha_modificacion'] }}</td>
                                    <td class="cursor-pointer px-4 py-3" onclick="openModalView(true, {{ json_encode($r) }})">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $status_color[$r['estado']] ?? 'bg-slate-100 text-slate-700' }}">
                                            {{ $r['estado'] }}
                                        </span>
                                    </td>

                                    {{-- modificar --}}
                                    <td class="text-center py-3" onclick="openModalModify(true, {{ json_encode($r) }})">
                                        <button type="button"
                                                class="cursor-pointer p-2 rounded-xl text-slate-600 hover:text-yellow-700
                                                    hover:bg-yellow-100 transition"
                                                aria-label="Editar">
                                            {{-- pencil icon --}}
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 20h9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </td>

                                    {{-- eliminar --}}
                                    <td class="text-center py-3">
                                        <button type="button"
                                                class="cursor-pointer p-2 rounded-xl text-slate-600 hover:text-red-700
                                                    hover:bg-red-50 transition"
                                                aria-label="Eliminar">
                                            {{-- trash icon --}}
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                                <path d="M3 6h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M8 6V4h8v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 6l1 14h10l1-14" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                                <path d="M10 11v6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M14 11v6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- footer pagination --}}
            <div class="flex items-center justify-between text-xs text-slate-500 pt-4">
                <div>Mostrando 1 a 6 de 6 registros</div>

                <div class="flex items-center gap-2">
                    <button class="px-3 py-2 rounded-lg hover:bg-slate-100 transition flex items-center gap-2">
                        {{-- left icon --}}
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                            <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Anterior
                    </button>

                    <div class="flex items-center gap-2">
                        <button class="w-9 h-9 rounded-xl bg-blue-600 text-white font-semibold shadow-sm">1</button>
                        <button class="w-9 h-9 rounded-xl hover:bg-slate-100 transition">2</button>
                        <button class="w-9 h-9 rounded-xl hover:bg-slate-100 transition">3</button>
                    </div>

                    <button class="px-3 py-2 rounded-lg hover:bg-slate-100 transition flex items-center gap-2">
                        Siguientes
                        {{-- right icon --}}
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                            <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <x-modal_modify>
    </x-modal_modify>

    <x-modal_create>
    </x-modal_create>

    <x-modal_view>
    </x-modal_view>

</section>


