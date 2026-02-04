{{-- modal-view --}}
<div id="modal-view" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="relative w-full max-w-2xl">
        <div class="relative rounded-lg bg-white p-6">
            <h2 class="text-center text-lg font-semibold mb-4">Información del perfil</h2>

            {{-- cerrar --}}
            <button class="cursor-pointer absolute top-2 right-2 text-gray-400 hover:text-gray-600"
                    onclick="openModalView(false)">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="flex flex-col gap-6">

                {{-- bloque top: level + 2 columnas --}}
                <div class="flex gap-5">
                    {{-- nivel (solo visual) --}}
                    <x-level :modify="false" prefix="view"/>

                    <div class="grid grid-cols-2 gap-4 w-full">
                        <x-info_copy label="Nombre" id="view_nombre"/>
                        <x-info_copy label="Ciudad imágenes" id="view_ciudad_imagenes"/>
                        <x-info_copy label="Ciudad" id="view_ciudad"/>
                        <x-info_copy label="Proveedor" id="view_proveedor"/>
                    </div>
                </div>

                {{-- grid de datos --}}
                <div class="grid grid-cols-2 gap-4">
                    <x-info_copy label="Email" id="view_email"/>
                    <x-info_copy label="Password" id="view_password"/>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <x-info_copy label="Email recuperación" id="view_email_recuperacion"/>
                    <x-info_copy label="Password recuperación" id="view_password_recuperacion"/>
                </div>

                <x-info_copy label="Clave 2FA" id="view_clave_2fa"/>
                
                <div class="grid grid-cols-2 gap-4">
                    <x-info_copy label="Fecha creación" id="view_fecha_creacion"/>
                    <x-info_copy label="Fecha modificación" id="view_fecha_modificacion"/>
                    <x-info_copy label="Fecha adquisición" id="view_fecha_adquisicion"/>
                    <x-info_copy label="Estado" id="view_estado"/>
                </div>


            </div>
        </div>
    </div>
</div>
