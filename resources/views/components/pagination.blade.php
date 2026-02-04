@props([
    'profiles' => null,
])

<div class="flex items-center justify-between text-xs text-slate-500 pt-4">

    {{-- Mostrando x a y de z --}}
    <div>
        Mostrando {{ $profiles->firstItem() ?? 0 }} a {{ $profiles->lastItem() ?? 0 }}
        de {{ $profiles->total() }} registros
    </div>

    {{-- paginación --}}
    <div class="flex items-center gap-2">

        {{-- Anterior --}}
        @if ($profiles->onFirstPage())
            <button disabled
                class="px-3 py-2 rounded-lg bg-slate-50 text-slate-300 cursor-not-allowed flex items-center gap-2">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Anterior
            </button>
        @else
            <a href="{{ $profiles->previousPageUrl() }}"
                class="px-3 py-2 rounded-lg hover:bg-slate-100 transition flex items-center gap-2">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Anterior
            </a>
        @endif

        {{-- Números --}}
        <div class="flex items-center gap-2">
            @php
                $current = $profiles->currentPage();
                $last = $profiles->lastPage();

                // ventana de páginas para no mostrar 200 botones
                $start = max(1, $current - 1);
                $end = min($last, $current + 1);

                // si estás al inicio, forzar 3 botones
                if ($current <= 2) {
                    $start = 1;
                    $end = min($last, 3);
                }

                // si estás al final, forzar 3 botones
                if ($current >= $last - 1) {
                    $end = $last;
                    $start = max(1, $last - 2);
                }
            @endphp

            {{-- opcional: mostrar "1" si estamos lejos --}}
            @if ($start > 1)
                <a href="{{ $profiles->url(1) }}"
                class="w-9 h-9 rounded-xl hover:bg-slate-100 transition flex items-center justify-center">
                    1
                </a>
                @if ($start > 2)
                    <span class="px-1 text-slate-400">…</span>
                @endif
            @endif

            {{-- ventana --}}
            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $current)
                    <span class="w-9 h-9 rounded-xl bg-blue-600 text-white font-semibold shadow-sm flex items-center justify-center">
                        {{ $i }}
                    </span>
                @else
                    <a href="{{ $profiles->url($i) }}"
                    class="w-9 h-9 rounded-xl hover:bg-slate-100 transition flex items-center justify-center">
                        {{ $i }}
                    </a>
                @endif
            @endfor

            {{-- opcional: mostrar última página si estamos lejos --}}
            @if ($end < $last)
                @if ($end < $last - 1)
                    <span class="px-1 text-slate-400">…</span>
                @endif
                <a href="{{ $profiles->url($last) }}"
                class="w-9 h-9 rounded-xl hover:bg-slate-100 transition flex items-center justify-center">
                    {{ $last }}
                </a>
            @endif
        </div>

        {{-- Siguiente --}}
        @if ($profiles->hasMorePages())
            <a href="{{ $profiles->nextPageUrl() }}"
                class="px-3 py-2 rounded-lg hover:bg-slate-100 transition flex items-center gap-2">
                Siguientes
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                    <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        @else
            <button disabled
                class="px-3 py-2 rounded-lg bg-slate-50 text-slate-300 cursor-not-allowed flex items-center gap-2">
                Siguientes
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                    <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        @endif

    </div>
</div>