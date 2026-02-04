@props([
    'label' => '',
    'id' => '',
])

<div class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-3">
    <div class="flex items-center justify-between gap-3">
        <span class="text-xs font-semibold text-slate-600">{{ $label }}</span>

        <button type="button"
                class="p-2 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-white transition"
                onclick="copyField('{{ $id }}')"
                aria-label="Copiar">
            {{-- copy icon --}}
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                <path d="M9 9h10v10H9V9Z"
                      stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                <path d="M5 15H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    <div class="mt-1 flex items-center justify-between gap-3">
        <span id="{{ $id }}" class="text-sm font-medium text-slate-900 break-all">
            —
        </span>

        {{-- feedback copiado --}}
        <span id="{{ $id }}_copied"
              class="hidden text-xs font-semibold text-emerald-600">
            Copiado ✅
        </span>
    </div>
</div>
