<aside class="w-16 bg-blue-600 text-white flex flex-col items-center py-4 gap-4 shadow-lg">
    {{-- Logo --}}
    <div class="w-10 h-10 rounded-2xl bg-white/20 flex items-center justify-center">
        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none">
            <path d="M4 6h16M4 12h16M4 18h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </div>

    {{-- Menu icons --}}
    <nav class="flex flex-col gap-3 mt-2">
        {{-- Dashboard (activo) --}}
        <a href="#"
           class="w-10 h-10 rounded-2xl flex items-center justify-center bg-white/20">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M3 13h8V3H3v10Zm10 8h8V11h-8v10ZM3 21h8v-6H3v6Zm10-18v6h8V3h-8Z"
                      fill="currentColor"/>
            </svg>
        </a>

        {{-- Table / List --}}
        <a href="#"
           class="w-10 h-10 rounded-2xl flex items-center justify-center hover:bg-white/10 transition">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </a>

        {{-- Stack / Layers --}}
        <a href="#"
           class="w-10 h-10 rounded-2xl flex items-center justify-center hover:bg-white/10 transition">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M12 3 3 8l9 5 9-5-9-5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                <path d="M3 12l9 5 9-5" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                <path d="M3 16l9 5 9-5" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
            </svg>
        </a>

        {{-- Users --}}
        <a href="#"
           class="w-10 h-10 rounded-2xl flex items-center justify-center hover:bg-white/10 transition">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M16 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0Z" stroke="currentColor" stroke-width="2"/>
                <path d="M4 21c1.8-4 14.2-4 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </a>

        {{-- Folder --}}
        <a href="#"
           class="w-10 h-10 rounded-2xl flex items-center justify-center hover:bg-white/10 transition">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"
                      stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
            </svg>
        </a>

        {{-- Chat --}}
        <a href="#"
           class="w-10 h-10 rounded-2xl flex items-center justify-center hover:bg-white/10 transition">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                <path d="M21 12c0 4.4-4 8-9 8a10 10 0 0 1-4-.8L3 20l1.2-3.2A8 8 0 0 1 3 12c0-4.4 4-8 9-8s9 3.6 9 8Z"
                      stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
            </svg>
        </a>
    </nav>

    <div class="flex-1"></div>

    {{-- Bottom Settings --}}
    <a href="#"
       class="w-10 h-10 rounded-2xl flex items-center justify-center hover:bg-white/10 transition">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
            <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"
                  stroke="currentColor" stroke-width="2"/>
            <path d="M19.4 15a7.7 7.7 0 0 0 .1-6l2-1.2-2-3.5-2.2 1A8 8 0 0 0 12 2a8 8 0 0 0-5.3 2.3l-2.2-1-2 3.5 2 1.2a7.7 7.7 0 0 0 .1 6l-2 1.2 2 3.5 2.2-1A8 8 0 0 0 12 22a8 8 0 0 0 5.3-2.3l2.2 1 2-3.5-2-1.2Z"
                  stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
        </svg>
    </a>
</aside>
