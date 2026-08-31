{{-- ============================================================
     ABOUT / SKILLS SECTION
     ============================================================ --}}
<section id="about" class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 bg-[#F8F9FA]">
    <div class="max-w-7xl mx-auto">

        {{-- Section Header --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10 sm:mb-16">
            <div>
                <h2 class="text-2xl sm:text-3xl lg:text-5xl font-black text-[#111827] leading-tight">
                    <span x-show="lang === 'id'">Menciptakan Pengalaman<br>Digital yang Berarti</span>
                    <span x-show="lang === 'en'" x-cloak>Crafting Digital<br>Experiences That Matter</span>
                </h2>
            </div>
            <div class="flex items-end">
                <p class="text-[#4B5563] leading-relaxed text-sm sm:text-base max-w-md">
                    <span x-show="lang === 'id'">Dari konsep hingga deployment — Saya merancang aplikasi web, mengelola lingkungan server, dan mengkonfigurasi jaringan yang andal untuk menjaga produk digital berjalan lancar.</span>
                    <span x-show="lang === 'en'" x-cloak>From concept to deployment — I design web apps, manage server environments, and configure reliable networks that keep digital products running smoothly.</span>
                </p>
            </div>
        </div>

        {{-- Cards Grid - 2 Kolom --}}
        @if($about->count() > 0)
        @php $card1 = $about->first(); @endphp
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            {{-- Kolom Kiri: About (Tall) --}}
            <div class="relative rounded-3xl overflow-hidden group" style="min-height: 520px;">
                @if($card1->image_path)
                    <img src="{{ $card1->image_url }}" alt="{{ $card1->title }}"
                         class="w-full h-full object-cover absolute inset-0 group-hover:scale-105 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-[#1E3A2B] to-[#2d5a3d] absolute inset-0"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-10">
                        <svg viewBox="0 0 200 200" class="w-48 h-48 text-white fill-current">
                            <rect x="20" y="40" width="160" height="12" rx="6"/>
                            <rect x="40" y="68" width="120" height="12" rx="6"/>
                            <rect x="30" y="96" width="140" height="12" rx="6"/>
                            <rect x="50" y="124" width="100" height="12" rx="6"/>
                            <rect x="20" y="152" width="80" height="12" rx="6"/>
                        </svg>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-[#0a1f13] via-[#1E3A2B]/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 sm:p-7">
                    <span class="inline-block px-3 py-1 bg-[#A3E635]/20 text-[#A3E635] text-xs font-semibold rounded-full mb-3 border border-[#A3E635]/30">About</span>
                    <h3 class="text-white font-bold text-xl sm:text-2xl mb-2">{{ $card1->title }}</h3>
                    <p class="text-white/70 text-sm mb-2">{{ $card1->subtitle }}</p>
                    <p class="text-white/60 text-sm leading-relaxed mb-5">{{ $card1->description }}</p>
                    <a href="{{ route('cv') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#A3E635] text-[#1E3A2B] text-sm font-bold rounded-full hover:bg-[#b5f043] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg">
                        <span x-show="lang === 'id'">Lihat Selengkapnya</span>
                        <span x-show="lang === 'en'" x-cloak>View Full CV</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Kolom Kanan: Skills & Sertifikasi (Stacked) --}}
            <div class="flex flex-col gap-6">
                
                {{-- Card Skills --}}
                <div class="relative rounded-3xl overflow-hidden group" style="height: 250px;">
                    {{-- Background Image --}}
                    <img src="{{ asset('storage/skills_bg.jpg') }}" 
                         alt="Skills Background" 
                         class="absolute inset-0 w-full h-full object-cover"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    {{-- Fallback gradient jika foto tidak ada --}}
                    <div class="w-full h-full bg-gradient-to-br from-[#374151] to-[#1f2937]" style="display: none;"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#111827]/95 via-[#111827]/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-5 sm:p-6">
                        <h3 class="text-white font-bold text-lg sm:text-xl mb-1">Skills</h3>
                        <p class="text-white/60 text-sm mb-4">
                            <span x-show="lang === 'id'">Keahlian teknis dan teknologi yang dikuasai.</span>
                            <span x-show="lang === 'en'" x-cloak>Technical skills and technologies mastered.</span>
                        </p>
                        <a href="{{ route('skills') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 bg-white/10 border border-white/30 text-white text-xs font-bold rounded-full hover:bg-white/20 transition-all duration-200 backdrop-blur-sm">
                            <span x-show="lang === 'id'">Lihat Detail</span>
                            <span x-show="lang === 'en'" x-cloak>View Details</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card Sertifikasi --}}
                <div class="relative rounded-3xl overflow-hidden group" style="height: 250px;">
                    {{-- Background Image --}}
                    <img src="{{ asset('storage/certifications_bg.jpg') }}" 
                         alt="Certifications Background" 
                         class="absolute inset-0 w-full h-full object-cover"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    {{-- Fallback gradient jika foto tidak ada --}}
                    <div class="w-full h-full bg-gradient-to-br from-[#1E3A2B] to-[#0a1f13]" style="display: none;"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a1f13]/95 via-[#0a1f13]/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-5 sm:p-6">
                        <h3 class="text-white font-bold text-lg sm:text-xl mb-1">Sertifikasi</h3>
                        <p class="text-white/60 text-sm mb-4">
                            <span x-show="lang === 'id'">Sertifikat profesional yang telah diraih.</span>
                            <span x-show="lang === 'en'" x-cloak>Professional certifications achieved.</span>
                        </p>
                        <a href="{{ route('certifications') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#A3E635]/20 border border-[#A3E635]/40 text-[#A3E635] text-xs font-bold rounded-full hover:bg-[#A3E635]/30 transition-all duration-200">
                            <span x-show="lang === 'id'">Lihat Lengkapnya</span>
                            <span x-show="lang === 'en'" x-cloak>View All</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-500">No about content available.</p>
        </div>
        @endif
    </div>
</section>
