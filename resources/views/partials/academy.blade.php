{{-- ============================================================
     PROJECTS SECTION
     Masonry grid showcasing portfolio projects from DB.
     ============================================================ --}}
<section id="projects" class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">

        {{-- Section Badge --}}
        <div class="flex justify-center mb-6">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#1E3A2B]/10 text-[#1E3A2B] text-xs font-bold rounded-full tracking-wider uppercase">
                <div class="w-2 h-2 bg-[#A3E635] rounded-full"></div>
                <span x-show="lang === 'id'">Projek Unggulan</span>
                <span x-show="lang === 'en'" x-cloak>Featured Projects</span>
            </span>
        </div>

        {{-- Section Header --}}
        <div class="text-center mb-4 sm:mb-6">
            <h2 class="text-2xl sm:text-3xl lg:text-5xl font-black text-[#111827]">
                <span x-show="lang === 'id'">Projek yang Pernah Saya Pegang</span>
                <span x-show="lang === 'en'" x-cloak>Projects I've Handled</span>
            </h2>
        </div>
        <p class="text-center text-[#4B5563] mb-10 sm:mb-14 max-w-2xl mx-auto text-sm sm:text-base">
            <span x-show="lang === 'id'">Inilah contoh dari beberapa projek yang pernah saya buat atau saya terlibat dalam pembuatan ataupun pengurusannya.</span>
            <span x-show="lang === 'en'" x-cloak>Here are some examples of projects I've created or been involved in their development and management.</span>
        </p>

        {{-- Projects Masonry Grid --}}
        @php
            $proj1 = $projects->get(0); // Featured (tall left card)
            $proj2 = $projects->get(1); // Top middle
            $proj3 = $projects->get(2); // Top right
            $proj4 = $projects->get(3); // Bottom wide
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

            {{-- Featured Project — tall left card --}}
            <div class="sm:row-span-2 lg:row-span-2 relative rounded-3xl overflow-hidden group cursor-pointer min-h-[280px] sm:min-h-[420px]"
                 style="height: 100%;">
                @if($proj1 && $proj1->image_path)
                    <img src="{{ $proj1->image_url }}" alt="{{ $proj1->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 absolute inset-0">
                @else
                    <div class="absolute inset-0 bg-gradient-to-b from-[#1E3A2B] to-[#0a1f13]">
                        {{-- Code/terminal decoration --}}
                        <div class="absolute inset-0 p-6 flex flex-col justify-center opacity-20">
                            @foreach(['> npm run dev','✓ compiled successfully','→ localhost:3000','> git push origin main','✓ deployed to production'] as $line)
                            <div class="text-[#A3E635] font-mono text-xs mb-2">{{ $line }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-[#0a1f13] via-[#0a1f13]/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 sm:p-6">
                    <h3 class="text-white font-bold text-lg">{{ $proj1 ? $proj1->title : 'E-Commerce Platform' }}</h3>
                    <p class="text-white/60 text-xs mt-1 mb-2">{{ $proj1 ? $proj1->technologies : 'Laravel · MySQL · Stripe' }}</p>
                    <p class="text-white/60 text-sm">{{ $proj1 ? $proj1->description : 'Full-featured online store with inventory management and payment gateway integration.' }}</p>
                </div>
            </div>

            {{-- Project 2 --}}
            <div class="relative rounded-3xl overflow-hidden group cursor-pointer h-[200px]">
                @if($proj2 && $proj2->image_path)
                    <img src="{{ $proj2->image_url }}" alt="{{ $proj2->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-[#374151] to-[#1f2937]">
                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                            <svg viewBox="0 0 100 100" class="w-20 h-20 text-white fill-current"><rect x="10" y="20" width="80" height="60" rx="8"/><rect x="20" y="35" width="60" height="8" rx="3" fill="#A3E635"/><rect x="20" y="50" width="40" height="8" rx="3"/></svg>
                        </div>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-[#111827]/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5">
                    <h3 class="text-white font-bold text-sm sm:text-base">{{ $proj2 ? $proj2->title : 'SaaS Dashboard' }}</h3>
                    <p class="text-white/60 text-xs mt-1">{{ $proj2 ? $proj2->technologies : 'React · Node.js · PostgreSQL' }}</p>
                </div>
            </div>

            {{-- Project 3 --}}
            <div class="relative rounded-3xl overflow-hidden group cursor-pointer h-[200px]">
                @if($proj3 && $proj3->image_path)
                    <img src="{{ $proj3->image_url }}" alt="{{ $proj3->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-[#1E3A2B] to-[#0a1f13]">
                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                            <svg viewBox="0 0 100 100" class="w-20 h-20 text-white fill-current"><rect x="25" y="10" width="50" height="80" rx="8"/><rect x="35" y="25" width="30" height="6" rx="2" fill="#A3E635"/><rect x="35" y="38" width="20" height="6" rx="2"/><circle cx="50" cy="75" r="5"/></svg>
                        </div>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-[#0a1f13]/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5">
                    <h3 class="text-white font-bold text-sm sm:text-base">{{ $proj3 ? $proj3->title : 'Mobile App Backend' }}</h3>
                    <p class="text-white/60 text-xs mt-1">{{ $proj3 ? $proj3->technologies : 'Laravel API · JWT · Redis' }}</p>
                </div>
            </div>

            {{-- Project 4 — wide bottom --}}
            <div class="lg:col-span-2 relative rounded-3xl overflow-hidden group cursor-pointer h-[200px]">
                @if($proj4 && $proj4->image_path)
                    <img src="{{ $proj4->image_url }}" alt="{{ $proj4->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-gradient-to-r from-[#1E3A2B] to-[#2d5a3d]">
                        <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(163,230,53,.3) 10px, rgba(163,230,53,.3) 11px)"></div>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-r from-[#0a1f13]/70 via-transparent to-[#0a1f13]/30"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 sm:p-6">
                    <h3 class="text-white font-bold text-lg">{{ $proj4 ? $proj4->title : 'Network Infrastructure' }}</h3>
                    <p class="text-white/60 text-sm mt-1">{{ $proj4 ? $proj4->technologies : 'Mikrotik • VLAN • VPN' }}</p>
                </div>
            </div>
        </div>

        {{-- Tombol Lihat Semua Project jika ada lebih dari 4 --}}
        @if(($projects_total ?? $projects->count()) > 4)
        <div style="display:flex;justify-content:center;margin-top:56px;padding-top:24px;padding-bottom:32px;">
            <a href="{{ route('projects') }}"
               class="inline-flex items-center gap-3 px-8 py-4 bg-[#111827] border-2 border-[#A3E635]/40 text-white font-bold text-sm rounded-full hover:border-[#A3E635] hover:bg-[#1E3A2B] transition-all duration-200 group">
                <span x-show="lang === 'id'">Lihat Semua {{ $projects_total ?? $projects->count() }} Project</span>
                <span x-show="lang === 'en'" x-cloak>View All {{ $projects_total ?? $projects->count() }} Projects</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        @endif

    </div>
</section>

