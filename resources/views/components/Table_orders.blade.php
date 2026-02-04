@php
    $profiles = [
        [
            'id' => 'p1',
            'level' => 1,
            'nombre' => 'Pablo García',
            'ciudad' => 'Milano',
            'email' => 'pablo@gmail.com',
            'email_recuperacion' => 'pablo.rec@gmail.com',
            'password_recuperacion' => 'rec_pablo_2024',
            'password' => 'clave_test',
            'clave_2fa' => '123456',
            'fecha_creacion' => '24/04/2024',
            'fecha_modificacion' => '24/04/2024',
            'fecha_adquisicion' => '10/03/2024',
            'estado' => 'Activo',
            'proveedor' => 'Google',
            'ciudad_imagenes' => 'Madrid',
            'badge' => 'green',
        ],
        [
            'id' => 'p2',
            'level' => 2,
            'nombre' => 'Tarjeas Alfonso',
            'ciudad' => 'Roma',
            'email' => 'tarjeas@gmail.com',
            'email_recuperacion' => 'tarjeas.rec@gmail.com',
            'password_recuperacion' => 'rec_tarjeas_2024',
            'password' => 'clave_test',
            'clave_2fa' => '123456',
            'fecha_creacion' => '24/04/2024',
            'fecha_modificacion' => '24/04/2024',
            'fecha_adquisicion' => '15/03/2024',
            'estado' => 'Activo',
            'proveedor' => 'Microsoft',
            'ciudad_imagenes' => 'Madrid',
            'badge' => 'blue',
        ],
        [
            'id' => 'p3',
            'level' => 3,
            'nombre' => 'Lotlia Quenes',
            'ciudad' => 'Torino',
            'email' => 'lotlia@gmail.com',
            'email_recuperacion' => 'lotlia.rec@gmail.com',
            'password_recuperacion' => 'rec_lotlia_2024',
            'password' => 'clave_test',
            'clave_2fa' => '123456',
            'fecha_creacion' => '24/04/2024',
            'fecha_modificacion' => '24/04/2024',
            'fecha_adquisicion' => '01/03/2024',
            'estado' => 'Activo',
            'proveedor' => 'Amazon',
            'ciudad_imagenes' => 'Barcelona',
            'badge' => 'orange',
        ],
        [
            'id' => 'p4',
            'level' => 4,
            'nombre' => 'Pecio Garbaas',
            'ciudad' => 'Napoli',
            'email' => 'pecio@gmail.com',
            'email_recuperacion' => 'pecio.rec@gmail.com',
            'password_recuperacion' => 'rec_pecio_2024',
            'password' => 'clave_test',
            'clave_2fa' => '123456',
            'fecha_creacion' => '24/04/2024',
            'fecha_modificacion' => '24/04/2024',
            'fecha_adquisicion' => '20/03/2024',
            'estado' => 'Activo',
            'proveedor' => 'Apple',
            'ciudad_imagenes' => 'Valencia',
            'badge' => 'blue',
        ],
        [
            'id' => 'p5',
            'level' => 2,
            'nombre' => '2hendion Ruiz',
            'ciudad' => 'Firenze',
            'email' => 'hendion@gmail.com',
            'email_recuperacion' => 'hendion.rec@gmail.com',
            'password_recuperacion' => 'rec_hendion_2024',
            'password' => 'clave_test',
            'clave_2fa' => '123456',
            'fecha_creacion' => '24/04/2024',
            'fecha_modificacion' => '24/04/2024',
            'fecha_adquisicion' => '05/04/2024',
            'estado' => 'Activo',
            'proveedor' => 'Meta',
            'ciudad_imagenes' => 'Andalucia',
            'badge' => 'green',
        ],
        [
            'id' => 'p6',
            'level' => 3,
            'nombre' => 'Sergio Rios',
            'ciudad' => 'Bologna',
            'email' => 'sergio@gmail.com',
            'email_recuperacion' => 'sergio.rec@gmail.com',
            'password_recuperacion' => 'rec_sergio_2024',
            'password' => 'clave_test',
            'clave_2fa' => '123456',
            'fecha_creacion' => '24/04/2024',
            'fecha_modificacion' => '24/04/2024',
            'fecha_adquisicion' => '18/03/2024',
            'estado' => 'Activo',
            'proveedor' => 'GitHub',
            'ciudad_imagenes' => 'Andalucia',
            'badge' => 'red',
        ],
    ];


    $badge = [
        'green' => 'bg-green-100 text-green-700',
        'blue' => 'bg-blue-100 text-blue-700',
        'orange' => 'bg-orange-100 text-orange-700',
        'red' => 'bg-red-100 text-red-700',
    ];
@endphp

<section class="p-6">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100">
        {{-- header card --}}
        <div class="px-6 pt-5 pb-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-blue-600/10 text-blue-600 flex items-center justify-center">
                    {{-- Table icon --}}
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h2 class="text-base font-semibold text-slate-800">Perfiles</h2>
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
                            <th class="px-4 py-3 font-semibold">ID</th>
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
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @foreach($profiles as $r)
                            <tr class="hover:bg-slate-50/60" onclick="openModalModify(true, {{ json_encode($r) }})">
                                <td class="px-4 py-3 text-slate-700">{{ $r['id'] }}</td>
                                <td class="px-4 py-3 text-slate-700">{{ $r['nombre'] }}</td>
                                <td class="px-4 py-3 text-slate-700">{{ $r['email'] }}</td>
                                <td class="px-4 py-3 text-slate-800 font-medium">{{ $r['password'] }}</td>
                                <td class="px-4 py-3 text-slate-800 font-medium">{{ $r['clave_2fa'] }}</td>
                                <td class="px-4 py-3 text-slate-800 font-medium">{{ $r['fecha_creacion'] }}</td>
                                <td class="px-4 py-3 text-slate-800 font-medium">{{ $r['fecha_modificacion'] }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $badge[$r['badge']] ?? 'bg-slate-100 text-slate-700' }}">
                                        {{ $r['estado'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
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

</section>


