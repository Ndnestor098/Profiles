{{-- resources/views/components/topbar.blade.php --}}
<header class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-white">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-2xl bg-blue-600 flex items-center justify-center text-white shadow-sm">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <h1 class="text-lg font-semibold text-slate-800">Panel de Control</h1>
    </div>

    <div class="flex items-center gap-4">
        {{-- Search --}}
        <button class="w-9 h-9 rounded-xl hover:bg-slate-100 flex items-center justify-center transition">
            <svg class="w-5 h-5 text-slate-500" viewBox="0 0 24 24" fill="none">
                <path d="M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16Z" stroke="currentColor" stroke-width="2"/>
                <path d="m21 21-4.3-4.3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        {{-- Bell --}}
        <button class="w-9 h-9 rounded-xl hover:bg-slate-100 flex items-center justify-center transition relative">
            <svg class="w-5 h-5 text-slate-500" viewBox="0 0 24 24" fill="none">
                <path d="M18 8a6 6 0 1 0-12 0c0 7-3 7-3 7h18s-3 0-3-7Z"
                      stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                <path d="M13.7 21a2 2 0 0 1-3.4 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        {{-- Settings --}}
        <button class="w-9 h-9 rounded-xl hover:bg-slate-100 flex items-center justify-center transition">
            <svg class="w-5 h-5 text-slate-500" viewBox="0 0 24 24" fill="none">
                <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"
                      stroke="currentColor" stroke-width="2"/>
                <path d="M19.4 15a7.7 7.7 0 0 0 .1-6l2-1.2-2-3.5-2.2 1A8 8 0 0 0 12 2a8 8 0 0 0-5.3 2.3l-2.2-1-2 3.5 2 1.2a7.7 7.7 0 0 0 .1 6l-2 1.2 2 3.5 2.2-1A8 8 0 0 0 12 22a8 8 0 0 0 5.3-2.3l2.2 1 2-3.5-2-1.2Z"
                      stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
            </svg>
        </button>

        {{-- User --}}
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-full bg-slate-200 overflow-hidden flex items-center justify-center">
                <svg class="w-6 h-6 text-slate-500" viewBox="0 0 24 24" fill="none">
                    <path d="M16 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0Z" stroke="currentColor" stroke-width="2"/>
                    <path d="M4 21c1.8-4 14.2-4 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>

            <button class="w-7 h-7 rounded-xl hover:bg-slate-100 flex items-center justify-center transition">
                <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none">
                    <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>
</header>
