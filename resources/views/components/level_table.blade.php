@props([
    'level' => 1
])  

<div class="flex flex-col items-center justify-center gap-3">
  {{-- Círculo --}}
  <div class="relative">
    {{-- círculo --}}
    <div class="w-10 h-10 rounded-full ring-4 shadow-sm
                flex flex-col items-center justify-center select-none">

      <div class="text-xs font-extrabold leading-none">
        {{ $level }}
      </div>
    </div>
  </div>
</div>
