@props([
    'modify' => false,
    'prefix' => 'level', // 👈 prefijo único
])

@php
  $downId  = $prefix . '-btn-level-down';
  $upId    = $prefix . '-btn-level-up';
  $classId = $prefix . '-class-level';
  $levelId = $prefix . '-level';
  $inputId = $prefix . '-level-input';
@endphp

<div class="flex flex-col items-center justify-center gap-3">
  {{-- Círculo --}}
  <div class="relative">

    {{-- botón bajar --}}
    @if ($modify)
      <button type="button"
              id="{{ $downId }}"
              class="cursor-pointer absolute -left-4 top-1/2 -translate-y-1/2
                    w-10 h-10 rounded-full bg-white shadow-md ring-1 ring-slate-200
                    flex items-center justify-center text-slate-700
                    hover:bg-slate-50 active:scale-95 transition"
              aria-label="Bajar nivel">
        <span class="text-2xl font-bold leading-none">−</span>
      </button>
    @endif

    {{-- círculo --}}
    <div id="{{ $classId }}"
         class="w-32 h-32 rounded-full ring-4 shadow-sm
                flex flex-col items-center justify-center select-none">

      <div id="{{ $levelId }}" class="text-4xl font-extrabold leading-none">
        1
      </div>

      <div class="text-xs text-center font-semibold tracking-wide uppercase opacity-80">
        Nivel <br> Local Guide
      </div>

      {{-- input hidden para enviar en el form --}}
      <input type="hidden" name="level" id="{{ $inputId }}" value="1">
    </div>

    {{-- botón subir --}}
    @if ($modify)
      <button type="button"
              id="{{ $upId }}"
              class="cursor-pointer absolute -right-4 top-1/2 -translate-y-1/2
                     w-10 h-10 rounded-full bg-white shadow-md ring-1 ring-slate-200
                   flex items-center justify-center text-slate-700
                   hover:bg-slate-50 active:scale-95 transition"
              aria-label="Subir nivel">
        <span class="text-2xl font-bold leading-none">+</span>
      </button>
    @endif

  </div>
</div>
