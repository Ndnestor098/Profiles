{{-- modal-create --}}
<div id="modal-create" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="relative w-full max-w-2xl">
        <div class="relative rounded-lg bg-white p-6">
            <h2 class="text-center text-lg font-semibold mb-4">Crear perfil</h2>

            <button class="cursor-pointer absolute top-2 right-2 text-gray-400 hover:text-gray-600"
                    onclick="openModalCreate(false)">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- IMPORTANTE: action al route store --}}
            <form action="{{ route('profiles.create') }}" method="POST" class="flex flex-col gap-6">
                @csrf
                <input type="hidden" name="level" id="create-level-input" value="1">

                {{-- nombre, ciudad, ubicacion de imagenes y proveedor --}}
                <div class="flex gap-5">
                    {{-- nivel --}}
                    <x-level :modify="true" prefix="create"/>

                    {{-- nombre y ciudad --}}
                    <div class="flex flex-col gap-4">
                        <x-label_input
                            label="Nombre"
                            placeholder="nombre"
                            type="text"
                            id="create_name"
                            name="name"
                        />

                        <x-label_input
                            label="Ciudad"
                            placeholder="ciudad"
                            type="text"
                            id="create_ciudad"
                            name="ciudad"
                        />
                    </div>

                    {{-- ubicacion de imagenes y proveedor --}}
                    <div class="flex flex-col gap-4">
                        <x-label_input
                            label="Ubicacion de imagenes"
                            placeholder="Ciudad de Imagenes"
                            type="text"
                            id="create_ciudad_imagenes"
                            name="ciudad_imagenes"
                        />

                        <x-label_input
                            label="Proveedor"
                            placeholder="proveedor"
                            type="text"
                            id="create_proveedor"
                            name="proveedor"
                        />
                    </div>
                </div>

                {{-- email y password --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-label_input
                        label="Email"
                        placeholder="email"
                        type="email"
                        id="create_email"
                        name="email"
                    />

                    <x-label_input
                        label="Password"
                        placeholder="password"
                        type="text"
                        id="create_password"
                        name="password"
                    />
                </div>

                {{-- email recuperacion y password recuperacion --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-label_input
                        label="Email de Recuperacion"
                        placeholder="email_recuperacion"
                        type="text"
                        id="create_email_recuperacion"
                        name="email_recuperacion"
                    />

                    <x-label_input
                        label="Password de Recuperacion"
                        placeholder="password_recuperacion"
                        type="text"
                        id="create_password_recuperacion"
                        name="password_recuperacion"
                    />
                </div>

                {{-- clave 2FA --}}
                <x-label_input
                    label="Clave 2FA"
                    placeholder="clave_2fa"
                    type="text"
                    id="create_clave_2fa"
                    name="clave_2fa"
                />

                {{-- fechas + estado --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-label_input
                        label="Fecha creación"
                        placeholder="fecha_creacion"
                        type="date"
                        id="create_fecha_creacion"
                        name="fecha_creacion"
                    />

                    <x-label_input
                        label="Fecha modificación"
                        placeholder="fecha_modificacion"
                        type="date"
                        id="create_fecha_modificacion"
                        name="fecha_modificacion"
                    />

                    <x-label_input
                        label="Fecha de adquisición"
                        placeholder="fecha_adquisicion"
                        type="date"
                        id="create_fecha_adquisicion"
                        name="fecha_adquisicion"
                    />

                    <x-label_input
                        label="Estado"
                        placeholder="estado"
                        type="text"
                        id="create_estado"
                        name="estado"
                    />
                </div>

                <button type="submit"
                        class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Crear
                </button>
            </form>
        </div>
    </div>
</div>
