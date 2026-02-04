@props([
    'level' => 1
])  

@php
    $levelStyles = [
    1  => 'bg-indigo-100 text-indigo-700 ring-indigo-200',
    2  => 'bg-blue-100 text-blue-700 ring-blue-200',
    3  => 'bg-cyan-100 text-cyan-700 ring-cyan-200',
    4  => 'bg-emerald-100 text-emerald-700 ring-emerald-200',
    5  => 'bg-green-100 text-green-700 ring-green-200',
    6  => 'bg-lime-100 text-lime-700 ring-lime-200',
    7  => 'bg-amber-100 text-amber-700 ring-amber-200',
    8  => 'bg-orange-100 text-orange-700 ring-orange-200',
    9  => 'bg-rose-100 text-rose-700 ring-rose-200',
    10 => 'bg-fuchsia-100 text-fuchsia-700 ring-fuchsia-200',
    ];

    $style = $levelStyles[$level];

@endphp

<div class="flex flex-col items-center justify-center gap-3">
  {{-- Círculo --}}
  <div class="relative">
    {{-- círculo --}}
    <div class="w-10 h-10 rounded-full ring-4 shadow-sm
                {{ $style }}
                flex flex-col items-center justify-center select-none">

      <div class="text-xs font-extrabold leading-none">
        {{ $level }}
      </div>
    </div>
  </div>
</div>
