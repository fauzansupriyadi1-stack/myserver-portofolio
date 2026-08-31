{{-- ============================================================
     STATS SECTION
     Dynamic counters based on actual database counts
     ============================================================ --}}
<section id="stats" class="py-20 px-4 sm:px-6 lg:px-8 bg-[#F8F9FA]">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Jumlah Pengalaman --}}
            <div class="group relative bg-[#1E3A2B] rounded-2xl sm:rounded-3xl p-5 sm:p-8 overflow-hidden hover:bg-[#2d5a3d] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#1E3A2B]/20">
                <div class="absolute top-0 right-0 w-20 h-20 bg-[#A3E635]/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-12 h-12 bg-[#A3E635]/10 rounded-full translate-y-4 -translate-x-4"></div>
                <div class="relative">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#A3E635] mb-2 leading-none">
                        {{ $experiences_count ?? 0 }}
                    </div>
                    <div class="text-white/90 font-semibold text-xs sm:text-sm uppercase tracking-widest">
                        <span x-show="lang === 'id'">Jumlah Pengalaman</span>
                        <span x-show="lang === 'en'" x-cloak>Work Experience</span>
                    </div>
                    <div class="text-white/40 text-xs mt-2 leading-tight">
                        <span x-show="lang === 'id'">Pengalaman kerja profesional</span>
                        <span x-show="lang === 'en'" x-cloak>Professional work experience</span>
                    </div>
                </div>
            </div>

            {{-- Projects Completed --}}
            <div class="group relative bg-[#1E3A2B] rounded-2xl sm:rounded-3xl p-5 sm:p-8 overflow-hidden hover:bg-[#2d5a3d] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#1E3A2B]/20">
                <div class="absolute top-0 right-0 w-20 h-20 bg-[#A3E635]/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-12 h-12 bg-[#A3E635]/10 rounded-full translate-y-4 -translate-x-4"></div>
                <div class="relative">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#A3E635] mb-2 leading-none">
                        {{ $projects_count ?? 0 }}
                    </div>
                    <div class="text-white/90 font-semibold text-xs sm:text-sm uppercase tracking-widest">
                        <span x-show="lang === 'id'">Projek Selesai</span>
                        <span x-show="lang === 'en'" x-cloak>Projects Completed</span>
                    </div>
                    <div class="text-white/40 text-xs mt-2 leading-tight">
                        <span x-show="lang === 'id'">Proyek berhasil diselesaikan</span>
                        <span x-show="lang === 'en'" x-cloak>Successful projects delivered</span>
                    </div>
                </div>
            </div>

            {{-- Sertifikasi --}}
            <div class="group relative bg-[#1E3A2B] rounded-2xl sm:rounded-3xl p-5 sm:p-8 overflow-hidden hover:bg-[#2d5a3d] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#1E3A2B]/20">
                <div class="absolute top-0 right-0 w-20 h-20 bg-[#A3E635]/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-12 h-12 bg-[#A3E635]/10 rounded-full translate-y-4 -translate-x-4"></div>
                <div class="relative">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#A3E635] mb-2 leading-none">
                        {{ $certifications_count ?? 0 }}
                    </div>
                    <div class="text-white/90 font-semibold text-xs sm:text-sm uppercase tracking-widest">
                        <span x-show="lang === 'id'">Sertifikasi</span>
                        <span x-show="lang === 'en'" x-cloak>Certifications</span>
                    </div>
                    <div class="text-white/40 text-xs mt-2 leading-tight">
                        <span x-show="lang === 'id'">Sertifikat profesional</span>
                        <span x-show="lang === 'en'" x-cloak>Professional certificates</span>
                    </div>
                </div>
            </div>

            {{-- Technologies --}}
            <div class="group relative bg-[#1E3A2B] rounded-2xl sm:rounded-3xl p-5 sm:p-8 overflow-hidden hover:bg-[#2d5a3d] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#1E3A2B]/20">
                <div class="absolute top-0 right-0 w-20 h-20 bg-[#A3E635]/10 rounded-full -translate-y-8 translate-x-8"></div>
                <div class="absolute bottom-0 left-0 w-12 h-12 bg-[#A3E635]/10 rounded-full translate-y-4 -translate-x-4"></div>
                <div class="relative">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#A3E635] mb-2 leading-none">
                        {{ $skills_count ?? 0 }}
                    </div>
                    <div class="text-white/90 font-semibold text-xs sm:text-sm uppercase tracking-widest">
                        <span x-show="lang === 'id'">Teknologi</span>
                        <span x-show="lang === 'en'" x-cloak>Technologies</span>
                    </div>
                    <div class="text-white/40 text-xs mt-2 leading-tight">
                        <span x-show="lang === 'id'">Alat dan framework yang dikuasai</span>
                        <span x-show="lang === 'en'" x-cloak>Tools and frameworks mastered</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
