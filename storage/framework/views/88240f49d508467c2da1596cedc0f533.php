

<div class="px-3 sm:px-4 lg:px-6 py-5 sm:py-6">
<section id="hero" class="relative w-full overflow-hidden rounded-2xl sm:rounded-3xl flex flex-col bg-[#0d1f10] min-h-[88vh]">

    
    <img src="<?php echo e(asset('storage/nature_bg.jpg')); ?>"
         alt="Background"
         loading="eager"
         class="absolute inset-0 w-full h-full object-cover object-center hero-bg-zoom z-0">

    
    <div class="absolute inset-0 z-[1]" style="background: linear-gradient(100deg, rgba(5,18,8,0.95) 0%, rgba(5,18,8,0.85) 40%, rgba(5,18,8,0.30) 70%, rgba(5,18,8,0.05) 100%);"></div>

    
    <nav class="relative w-full px-5 sm:px-7 lg:px-9 pt-6 sm:pt-7 z-30" x-data="{ open: false }">
        <div class="flex items-center justify-between bg-white/[0.08] backdrop-blur-md border border-white/10 rounded-full px-4 py-2.5 shadow-xl">

            
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 shrink-0">
                <div class="w-7 h-7 bg-[#A3E635] rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-3.5 h-3.5 text-[#0d2218]" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="8" r="3"/>
                        <path d="M12 11 Q8 16 6 22 h12 Q16 16 12 11z" opacity="0.8"/>
                    </svg>
                </div>
                <span class="text-white font-extrabold text-sm tracking-tight"><?php echo e($settings['site_name'] ?? 'Fauzan.dev'); ?></span>
            </a>

            
            <div class="hidden lg:flex items-center gap-1">
                <a href="#hero" class="px-3 py-1.5 text-xs font-semibold rounded-full transition-all duration-200 bg-[#A3E635] text-[#0d2218]">
                    <span x-show="lang === 'id'">Beranda</span>
                    <span x-show="lang === 'en'" x-cloak>Home</span>
                </a>
                <a href="#about" class="px-3 py-1.5 text-xs font-semibold rounded-full transition-all duration-200 text-white/60 hover:text-white hover:bg-white/10">
                    <span x-show="lang === 'id'">Tentang</span>
                    <span x-show="lang === 'en'" x-cloak>About</span>
                </a>
                <a href="<?php echo e(route('cv')); ?>" class="px-3 py-1.5 text-xs font-semibold rounded-full transition-all duration-200 text-white/60 hover:text-white hover:bg-white/10">
                    CV
                </a>
                <a href="<?php echo e(route('skills')); ?>" class="px-3 py-1.5 text-xs font-semibold rounded-full transition-all duration-200 text-white/60 hover:text-white hover:bg-white/10">
                    Skills
                </a>
                <a href="<?php echo e(route('certifications')); ?>" class="px-3 py-1.5 text-xs font-semibold rounded-full transition-all duration-200 text-white/60 hover:text-white hover:bg-white/10">
                    <span x-show="lang === 'id'">Sertifikasi</span>
                    <span x-show="lang === 'en'" x-cloak>Certifications</span>
                </a>
                <a href="#faq" class="px-3 py-1.5 text-xs font-semibold rounded-full transition-all duration-200 text-white/60 hover:text-white hover:bg-white/10">
                    FAQ
                </a>
                <a href="#contact" class="px-3 py-1.5 text-xs font-semibold rounded-full transition-all duration-200 text-white/60 hover:text-white hover:bg-white/10">
                    <span x-show="lang === 'id'">Kontak</span>
                    <span x-show="lang === 'en'" x-cloak>Contact</span>
                </a>
            </div>

            
            <div class="flex items-center gap-2 shrink-0">
                
                <button @click="toggleLang()" 
                        class="flex items-center gap-1.5 px-3 py-2 bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200 border border-white/10">
                    <span class="text-white text-xs font-bold uppercase" x-text="lang"></span>
                    <svg class="w-3.5 h-3.5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                    </svg>
                </button>

                <a href="<?php echo e(route('filament.admin.pages.dashboard')); ?>"
                   class="hidden sm:flex items-center gap-1.5 bg-[#A3E635] text-[#0d2218] font-black text-xs
                          pl-4 pr-2 py-2 rounded-full hover:bg-[#c4f542] transition-all duration-200">
                    <span x-show="lang === 'id'">DASHBOARD</span>
                    <span x-show="lang === 'en'">DASHBOARD</span>
                    <span class="w-5 h-5 bg-[#0d2218] rounded-full flex items-center justify-center">
                        <svg class="w-2.5 h-2.5 text-[#A3E635]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                    </span>
                </a>
                <button @click="open=!open" class="lg:hidden p-2 text-white/70 hover:text-white hover:bg-white/10 rounded-full transition-colors">
                    <svg x-show="!open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open"  class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        
        <div x-show="open" x-transition class="mt-2 bg-black/80 backdrop-blur-xl border border-white/10 rounded-2xl p-3 flex flex-col gap-1">
            <a href="#hero" @click="open=false" class="px-4 py-2.5 text-white/80 hover:text-white hover:bg-white/10 rounded-xl text-sm font-semibold transition-colors">
                <span x-show="lang === 'id'">Beranda</span>
                <span x-show="lang === 'en'" x-cloak>Home</span>
            </a>
            <a href="#about" @click="open=false" class="px-4 py-2.5 text-white/80 hover:text-white hover:bg-white/10 rounded-xl text-sm font-semibold transition-colors">
                <span x-show="lang === 'id'">Tentang</span>
                <span x-show="lang === 'en'" x-cloak>About</span>
            </a>
            <a href="<?php echo e(route('cv')); ?>" @click="open=false" class="px-4 py-2.5 text-white/80 hover:text-white hover:bg-white/10 rounded-xl text-sm font-semibold transition-colors">CV</a>
            <a href="<?php echo e(route('skills')); ?>" @click="open=false" class="px-4 py-2.5 text-white/80 hover:text-white hover:bg-white/10 rounded-xl text-sm font-semibold transition-colors">Skills</a>
            <a href="<?php echo e(route('certifications')); ?>" @click="open=false" class="px-4 py-2.5 text-white/80 hover:text-white hover:bg-white/10 rounded-xl text-sm font-semibold transition-colors">
                <span x-show="lang === 'id'">Sertifikasi</span>
                <span x-show="lang === 'en'" x-cloak>Certifications</span>
            </a>
            <a href="#faq" @click="open=false" class="px-4 py-2.5 text-white/80 hover:text-white hover:bg-white/10 rounded-xl text-sm font-semibold transition-colors">FAQ</a>
            <a href="#contact" @click="open=false" class="px-4 py-2.5 text-white/80 hover:text-white hover:bg-white/10 rounded-xl text-sm font-semibold transition-colors">
                <span x-show="lang === 'id'">Kontak</span>
                <span x-show="lang === 'en'" x-cloak>Contact</span>
            </a>
            <div class="border-t border-white/10 my-1 pt-2">
                <a href="<?php echo e(route('filament.admin.pages.dashboard')); ?>" 
                   class="flex items-center justify-center gap-2 bg-[#A3E635] text-[#0d2218] font-black text-sm px-4 py-2.5 rounded-xl hover:bg-[#c4f542] transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                    DASHBOARD
                </a>
            </div>
        </div>
    </nav>

    
    <div class="relative z-10 flex-1 flex flex-col-reverse md:flex-row items-stretch justify-between w-full px-6 sm:px-12 lg:px-16 gap-8" style="min-height: 0;">
        
        
        <div class="w-full md:w-[52%] flex flex-col justify-center py-10 md:py-12">
            
            
            <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-black text-white leading-[1.08] tracking-tight mb-5"
                style="text-shadow: 0 2px 20px rgba(0,0,0,0.5); overflow-wrap: break-word;">
                <span x-show="lang === 'id'">Hai, Saya Fauzan — IT Generalist</span>
                <span x-show="lang === 'en'" x-cloak>Hi, I'm Fauzan — IT Generalist</span>
            </h1>

            
            <p class="text-white/80 text-sm sm:text-base leading-relaxed mb-8 max-w-md"
               style="overflow-wrap: break-word;">
                <span x-show="lang === 'id'">Dari pengembangan web hingga infrastruktur jaringan, saya membangun solusi digital lengkap dari nol. Mengubah tantangan teknis yang kompleks menjadi kenyataan yang mulus.</span>
                <span x-show="lang === 'en'" x-cloak>From web development to network infrastructure, I build complete digital solutions from the ground up. Turning complex technical challenges into seamless reality.</span>
            </p>

            
            <div class="flex flex-wrap items-center gap-3 mb-10">
                <a href="<?php echo e($hero?->primary_cta_url ?? '#contact'); ?>"
                   target="_blank" rel="noopener noreferrer"
                   class="flex items-center gap-2 bg-[#A3E635] text-[#0d2218] font-black text-sm
                          pl-5 pr-2 py-3 rounded-full hover:bg-[#c4f542]
                          hover:shadow-xl hover:shadow-[#A3E635]/30 hover:-translate-y-0.5
                          transition-all duration-200 group">
                    <span x-show="lang === 'id'">Hubungi Saya</span>
                    <span x-show="lang === 'en'" x-cloak>Hire Me</span>
                    <span class="w-7 h-7 bg-[#0d2218] rounded-full flex items-center justify-center group-hover:rotate-45 transition-transform duration-300">
                        <svg class="w-3.5 h-3.5 text-[#A3E635] -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                </a>
                <a href="<?php echo e($hero?->secondary_cta_url ?? '#projects'); ?>"
                   class="flex items-center gap-2 px-5 py-3
                          border-2 border-white/30 text-white font-bold text-sm rounded-full
                          hover:border-white/60 hover:bg-white/10
                          backdrop-blur-sm transition-all duration-200">
                    <span x-show="lang === 'id'">Lihat Projek</span>
                    <span x-show="lang === 'en'" x-cloak>View Projects</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            
            <div class="flex items-center gap-8 pt-6 border-t border-white/15">
                <div>
                    <div class="text-2xl font-black text-[#A3E635]"><?php echo e($experiences_count ?? 0); ?></div>
                    <div class="text-xs font-semibold text-white/60 mt-1">
                        <span x-show="lang === 'id'">Jumlah<br>Pengalaman</span>
                        <span x-show="lang === 'en'" x-cloak>Work<br>Experience</span>
                    </div>
                </div>
                <div class="w-px h-10 bg-white/15"></div>
                <div>
                    <div class="text-2xl font-black text-[#A3E635]"><?php echo e($projects_count ?? $projects->count()); ?></div>
                    <div class="text-xs font-semibold text-white/60 mt-1">
                        <span x-show="lang === 'id'">Projek<br>Selesai</span>
                        <span x-show="lang === 'en'" x-cloak>Projects<br>Completed</span>
                    </div>
                </div>
                <div class="w-px h-10 bg-white/15"></div>
                <div>
                    <div class="text-2xl font-black text-[#A3E635]"><?php echo e($certifications_count ?? 0); ?></div>
                    <div class="text-xs font-semibold text-white/60 mt-1">
                        <span x-show="lang === 'id'">Sertifi<br>kasi</span>
                        <span x-show="lang === 'en'" x-cloak>Certifi<br>cations</span>
                    </div>
                </div>
                <div class="w-px h-10 bg-white/15"></div>
                <div>
                    <div class="text-2xl font-black text-[#A3E635]"><?php echo e($skills_count ?? 0); ?></div>
                    <div class="text-xs font-semibold text-white/60 mt-1">
                        <span x-show="lang === 'id'">Tekno<br>logi</span>
                        <span x-show="lang === 'en'" x-cloak>Techno<br>logies</span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="w-full md:w-[48%] flex items-end justify-center md:justify-start md:pl-8 lg:pl-12 overflow-hidden relative min-h-[320px] md:min-h-0 mt-5 md:mt-0">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hero && $hero->background_image): ?>
            <img src="<?php echo e(asset('storage/'.$hero->background_image)); ?>"
                 alt="<?php echo e($settings['site_name'] ?? 'Fauzan'); ?>"
                 loading="lazy"
                 style="filter: drop-shadow(0 10px 40px rgba(0,0,0,0.6)); mask-image: linear-gradient(to bottom, black 70%, transparent 100%);"
                 class="h-full md:h-[95%] w-auto object-contain object-bottom hero-photo-float max-h-[420px] md:max-h-[580px] lg:max-h-[650px]">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

</section>
</div>
<?php /**PATH C:\Users\fauzan supriyadi\OneDrive\Dokumen\myporto\resources\views/partials/hero.blade.php ENDPATH**/ ?>