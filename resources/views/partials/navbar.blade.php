<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="main-navbar"
     x-data="{ open: false, scrolled: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 30 })"
     :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg shadow-black/5' : 'bg-transparent'">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                @if(!empty($settings['site_logo']))
                    <img src="{{ asset('storage/'.$settings['site_logo']) }}" alt="{{ $settings['site_name'] ?? 'Golfngv' }}" class="h-10">
                @else
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-[#A3E635] rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1E3A2B]" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="8" r="3"/>
                                <path d="M12 11 Q8 16 6 22 h12 Q16 16 12 11z" opacity="0.6"/>
                            </svg>
                        </div>
                        <span :class="scrolled ? 'text-[#1E3A2B]' : 'text-white'"
                              class="text-xl font-bold tracking-tight transition-colors duration-300">
                            {{ $settings['site_name'] ?? 'Golfngv' }}
                        </span>
                    </div>
                @endif
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden lg:flex items-center gap-1">
                <div class="flex items-center gap-1" x-data="{ active: null }">
                    @foreach([
                        ['label' => 'Service', 'href' => '#about', 'has_dd' => true],
                        ['label' => 'Agency', 'href' => '#academy', 'has_dd' => true],
                        ['label' => 'Case study', 'href' => '#facility', 'has_dd' => true],
                        ['label' => 'Resources', 'href' => '#stats', 'has_dd' => true],
                        ['label' => 'Contact', 'href' => '#contact', 'has_dd' => false],
                    ] as $item)
                    <a href="{{ $item['href'] }}"
                       :class="scrolled ? 'text-[#4B5563] hover:text-[#1E3A2B]' : 'text-white/90 hover:text-white'"
                       class="flex items-center gap-1 px-4 py-2 text-sm font-medium rounded-full transition-all duration-200 hover:bg-white/10">
                        {{ $item['label'] }}
                        @if($item['has_dd'])
                        <svg class="w-3.5 h-3.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- CTA Button --}}
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ $settings['nav_cta_url'] ?? '#contact' }}"
                   class="flex items-center gap-2 px-5 py-2.5 bg-[#A3E635] text-[#1E3A2B] font-semibold text-sm rounded-full hover:bg-[#b5f043] hover:shadow-lg hover:shadow-[#A3E635]/30 transition-all duration-300 hover:-translate-y-0.5 group">
                    {{ $settings['nav_cta_text'] ?? 'JOIN OUR TEAM ↗' }}
                    <div class="w-5 h-5 bg-[#1E3A2B] rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-3 h-3 text-[#A3E635]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/>
                        </svg>
                    </div>
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="open = !open"
                    class="lg:hidden p-2 rounded-xl transition-colors"
                    :class="scrolled ? 'text-[#1E3A2B] hover:bg-gray-100' : 'text-white hover:bg-white/10'">
                <svg x-show="!open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden bg-white/95 backdrop-blur-md border-t border-gray-100 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-1">
            @foreach([
                ['label' => 'Service', 'href' => '#about'],
                ['label' => 'Agency', 'href' => '#academy'],
                ['label' => 'Case study', 'href' => '#facility'],
                ['label' => 'Resources', 'href' => '#stats'],
                ['label' => 'Contact', 'href' => '#contact'],
            ] as $item)
            <a href="{{ $item['href'] }}" @click="open = false"
               class="px-4 py-3 text-[#4B5563] hover:text-[#1E3A2B] hover:bg-gray-50 rounded-xl font-medium transition-colors">
                {{ $item['label'] }}
            </a>
            @endforeach
            <a href="{{ $settings['nav_cta_url'] ?? '#contact' }}"
               class="mt-2 flex items-center justify-center gap-2 px-5 py-3 bg-[#A3E635] text-[#1E3A2B] font-semibold rounded-full">
                {{ $settings['nav_cta_text'] ?? 'JOIN OUR TEAM ↗' }}
            </a>
        </div>
    </div>
</nav>
