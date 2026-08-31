{{-- ============================================================
     FOOTER
     Dark green CTA card + social links + copyright.
     ============================================================ --}}
<footer class="bg-[#111827]" id="contact">

    {{-- CTA Card --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div class="relative bg-[#1E3A2B] rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-12 mb-12 sm:mb-16 overflow-hidden">
            {{-- Decorative elements --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#A3E635]/5 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#A3E635]/5 rounded-full translate-y-20 -translate-x-20"></div>

            <div class="relative flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
                <div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white mb-3">
                        <span x-show="lang === 'id'">Siap Membangun Sesuatu?<br><span class="text-[#A3E635]">Mari bekerja sama.</span></span>
                        <span x-show="lang === 'en'" x-cloak>Ready to Build Something?<br><span class="text-[#A3E635]">Let's work together.</span></span>
                    </h2>
                    <p class="text-white/60 text-sm max-w-md leading-relaxed">
                        <span x-show="lang === 'id'">Punya projek dalam pikiran, masalah untuk diselesaikan, atau hanya ingin ngobrol? Saya membalas semua pesan dalam 24 jam — mari wujudkan.</span>
                        <span x-show="lang === 'en'" x-cloak>Have a project in mind, a problem to solve, or just want to chat? I respond to all messages within 24 hours — let's make it happen.</span>
                    </p>
                </div>
                <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                    <a href="mailto:{{ $settings['contact_email'] ?? 'hello@golfngv.com' }}"
                       id="footer-email-cta"
                       class="flex items-center gap-3 px-6 py-4 bg-[#A3E635] text-[#1E3A2B] font-bold rounded-2xl hover:bg-[#b5f043] hover:shadow-xl hover:shadow-[#A3E635]/30 transition-all duration-300 hover:-translate-y-1 group">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ $settings['contact_email'] ?? 'hello@golfngv.com' }}
                    </a>
                    <a href="tel:{{ $settings['contact_phone'] ?? '+15550000000' }}"
                       class="flex items-center gap-3 px-6 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-2xl hover:bg-white/20 transition-all duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ $settings['contact_phone'] ?? '+1 (555) 000-0000' }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Footer Bottom --}}
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">

            {{-- Logo --}}
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-[#A3E635] rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#1E3A2B]" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="8" r="3"/>
                        <path d="M12 11 Q8 16 6 22 h12 Q16 16 12 11z" opacity="0.6"/>
                    </svg>
                </div>
                <span class="text-white font-bold text-lg">{{ $settings['site_name'] ?? 'Golfngv' }}</span>
            </div>

            {{-- Nav Links --}}
            <div class="flex flex-wrap justify-center gap-6">
                @foreach(['Projects', 'Products', 'Team', 'Privacy', 'Contact'] as $link)
                <a href="#" class="text-white/40 hover:text-white/80 text-sm transition-colors duration-200">{{ $link }}</a>
                @endforeach
            </div>

            {{-- Social Links --}}
            <div class="flex items-center gap-3">
                @if(!empty($settings['social_twitter']))
                <a href="{{ $settings['social_twitter'] }}" target="_blank"
                   class="w-10 h-10 bg-white/5 border border-white/10 rounded-full flex items-center justify-center text-white/50 hover:text-white hover:bg-white/10 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.254 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
                @endif
                @if(!empty($settings['social_instagram']))
                <a href="{{ $settings['social_instagram'] }}" target="_blank"
                   class="w-10 h-10 bg-white/5 border border-white/10 rounded-full flex items-center justify-center text-white/50 hover:text-white hover:bg-white/10 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                @endif
                @if(!empty($settings['social_facebook']))
                <a href="{{ $settings['social_facebook'] }}" target="_blank"
                   class="w-10 h-10 bg-white/5 border border-white/10 rounded-full flex items-center justify-center text-white/50 hover:text-white hover:bg-white/10 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                @endif
                @if(!empty($settings['social_youtube']))
                <a href="{{ $settings['social_youtube'] }}" target="_blank"
                   class="w-10 h-10 bg-white/5 border border-white/10 rounded-full flex items-center justify-center text-white/50 hover:text-white hover:bg-white/10 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
                @endif
            </div>
        </div>

        {{-- Copyright --}}
        <div class="mt-8 pt-8 border-t border-white/5 text-center">
            <p class="text-white/30 text-xs">{{ $settings['footer_text'] ?? '© 2026 Fauzan Supriyadi. All rights reserved.' }}</p>
        </div>
    </div>
</footer>

