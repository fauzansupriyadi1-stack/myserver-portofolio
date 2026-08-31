@extends('layouts.dark')
@php $pageTitle = 'About Me'; @endphp

@section('content')
<div style="background:#111827;min-height:100vh;">

    {{-- HERO SECTION --}}
    <div style="background:linear-gradient(135deg,#1E3A2B 0%,#111827 100%);padding:40px 16px 80px;">
        <div style="max-width:896px;margin:0 auto;">
            
            <a href="{{ route('home') }}"
               style="display:inline-flex;align-items:center;gap:8px;color:rgba(255,255,255,0.45);text-decoration:none;font-size:0.875rem;margin-bottom:40px;"
               onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                <span x-text="lang === 'id' ? 'Kembali' : 'Back'"></span>
            </a>

            {{-- Profile Header --}}
            <div style="display:flex;flex-wrap:wrap;align-items:start;gap:24px;margin-bottom:40px;">
                <div style="position:relative;flex-shrink:0;">
                    <div style="width:100px;height:100px;border-radius:20px;background:#A3E635;display:flex;align-items:center;justify-content:center;font-size:2.5rem;font-weight:900;color:#111827;box-shadow:0 12px 32px rgba(163,230,53,0.3);">F</div>
                    <div style="position:absolute;bottom:-6px;right:-6px;width:24px;height:24px;border-radius:50%;background:#A3E635;border:3px solid #111827;"></div>
                </div>
                <div style="flex:1;min-width:240px;">
                    <div style="display:inline-block;padding:5px 14px;border-radius:999px;background:rgba(163,230,53,0.12);border:1px solid rgba(163,230,53,0.25);color:#A3E635;font-size:0.75rem;font-weight:700;margin-bottom:12px;">
                        👤 <span x-text="lang === 'id' ? 'Tentang Saya' : 'About Me'"></span>
                    </div>
                    <h1 style="font-size:clamp(2.25rem,6vw,3.5rem);font-weight:900;color:white;margin:0 0 12px;line-height:1.1;">Fauzan Supriyadi</h1>
                    <p style="font-size:1.125rem;color:rgba(255,255,255,0.6);margin:0 0 16px;line-height:1.6;">
                        <span x-show="lang === 'id'">IT Generalist & Full-Stack Developer dengan passion dalam Network Engineering dan Web Development.</span>
                        <span x-show="lang === 'en'" x-cloak>IT Generalist & Full-Stack Developer with passion in Network Engineering and Web Development.</span>
                    </p>
                    <div style="display:flex;flex-wrap:wrap;gap:16px;font-size:0.875rem;color:rgba(255,255,255,0.4);">
                        <span>📍 Jakarta, Indonesia</span>
                        <span>✉️ fauzansupriyadi1@gmail.com</span>
                        <span>💼 IT Professional</span>
                    </div>
                </div>
            </div>

            {{-- CTA Button --}}
            <div style="display:flex;flex-wrap:wrap;gap:12px;">
                <a href="{{ route('cv') }}"
                   style="display:inline-flex;align-items:center;gap:8px;padding:14px 24px;background:#A3E635;color:#111827;font-weight:900;font-size:0.875rem;border-radius:16px;text-decoration:none;box-shadow:0 4px 16px rgba(163,230,53,0.25);"
                   onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 24px rgba(163,230,53,0.4)';"
                   onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 16px rgba(163,230,53,0.25)';">
                    📄 <span x-text="lang === 'id' ? 'Lihat CV Lengkap' : 'View Full CV'"></span>
                </a>
                <a href="mailto:fauzansupriyadi1@gmail.com"
                   style="display:inline-flex;align-items:center;gap:8px;padding:14px 24px;background:rgba(255,255,255,0.08);color:white;font-weight:700;font-size:0.875rem;border-radius:16px;text-decoration:none;border:1px solid rgba(255,255,255,0.12);"
                   onmouseover="this.style.background='rgba(255,255,255,0.12)';"
                   onmouseout="this.style.background='rgba(255,255,255,0.08)';">
                    ✉️ <span x-text="lang === 'id' ? 'Hubungi Saya' : 'Contact Me'"></span>
                </a>
            </div>
        </div>
    </div>

    {{-- CONTENT SECTION --}}
    <div style="max-width:896px;margin:-32px auto 0;padding:0 16px 80px;">
        
        {{-- Bio Card --}}
        <div style="background:#1a2230;border:1px solid rgba(255,255,255,0.08);border-radius:24px;padding:32px;margin-bottom:32px;">
            <h2 style="font-size:1.5rem;font-weight:800;color:white;margin:0 0 16px;">
                <span x-show="lang === 'id'">🌟 Siapa Saya?</span>
                <span x-show="lang === 'en'" x-cloak>🌟 Who Am I?</span>
            </h2>
            <div style="font-size:0.95rem;line-height:1.8;color:rgba(255,255,255,0.65);">
                <p x-show="lang === 'id'" style="margin:0 0 16px;">
                    Halo! Saya Fauzan Supriyadi, seorang IT Generalist yang passionate dalam mengembangkan solusi teknologi yang efisien dan modern. Dengan pengalaman di Network Engineering, Full-Stack Web Development, dan System Administration, saya selalu siap menghadapi tantangan baru.
                </p>
                <p x-show="lang === 'en'" x-cloak style="margin:0 0 16px;">
                    Hi! I'm Fauzan Supriyadi, an IT Generalist passionate about developing efficient and modern technology solutions. With experience in Network Engineering, Full-Stack Web Development, and System Administration, I'm always ready to face new challenges.
                </p>
                
                <p x-show="lang === 'id'" style="margin:0;">
                    Saya percaya bahwa teknologi harus menjadi solusi yang sederhana namun powerful. Dari membangun infrastruktur jaringan yang aman hingga mengembangkan aplikasi web yang interaktif, saya berkomitmen untuk memberikan hasil terbaik.
                </p>
                <p x-show="lang === 'en'" x-cloak style="margin:0;">
                    I believe that technology should be a simple yet powerful solution. From building secure network infrastructure to developing interactive web applications, I'm committed to delivering the best results.
                </p>
            </div>
        </div>

        {{-- Skills Highlight --}}
        <div style="background:#1a2230;border:1px solid rgba(255,255,255,0.08);border-radius:24px;padding:32px;margin-bottom:32px;">
            <h2 style="font-size:1.5rem;font-weight:800;color:white;margin:0 0 24px;">
                <span x-show="lang === 'id'">💡 Area Keahlian</span>
                <span x-show="lang === 'en'" x-cloak>💡 Expertise Areas</span>
            </h2>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;">
                {{-- Skill 1 --}}
                <div style="background:rgba(163,230,53,0.05);border:1px solid rgba(163,230,53,0.15);border-radius:16px;padding:20px;">
                    <div style="font-size:2rem;margin-bottom:8px;">🌐</div>
                    <h3 style="font-weight:700;color:#A3E635;font-size:0.95rem;margin:0 0 6px;">
                        <span x-show="lang === 'id'">Network Engineering</span>
                        <span x-show="lang === 'en'" x-cloak>Network Engineering</span>
                    </h3>
                    <p style="font-size:0.8rem;color:rgba(255,255,255,0.4);margin:0;">Cisco • Mikrotik • Linux</p>
                </div>

                {{-- Skill 2 --}}
                <div style="background:rgba(163,230,53,0.05);border:1px solid rgba(163,230,53,0.15);border-radius:16px;padding:20px;">
                    <div style="font-size:2rem;margin-bottom:8px;">💻</div>
                    <h3 style="font-weight:700;color:#A3E635;font-size:0.95rem;margin:0 0 6px;">
                        <span x-show="lang === 'id'">Full-Stack Development</span>
                        <span x-show="lang === 'en'" x-cloak>Full-Stack Development</span>
                    </h3>
                    <p style="font-size:0.8rem;color:rgba(255,255,255,0.4);margin:0;">Laravel • Vue.js • React</p>
                </div>

                {{-- Skill 3 --}}
                <div style="background:rgba(163,230,53,0.05);border:1px solid rgba(163,230,53,0.15);border-radius:16px;padding:20px;">
                    <div style="font-size:2rem;margin-bottom:8px;">🗄️</div>
                    <h3 style="font-weight:700;color:#A3E635;font-size:0.95rem;margin:0 0 6px;">
                        <span x-show="lang === 'id'">System Administration</span>
                        <span x-show="lang === 'en'" x-cloak>System Administration</span>
                    </h3>
                    <p style="font-size:0.8rem;color:rgba(255,255,255,0.4);margin:0;">Linux • Docker • DevOps</p>
                </div>
            </div>

            <div style="margin-top:24px;text-align:center;">
                <a href="{{ route('skills') }}"
                   style="display:inline-flex;align-items:center;gap:8px;padding:12px 20px;background:rgba(163,230,53,0.1);border:1px solid rgba(163,230,53,0.25);color:#A3E635;font-weight:700;font-size:0.875rem;border-radius:12px;text-decoration:none;"
                   onmouseover="this.style.background='rgba(163,230,53,0.15)';"
                   onmouseout="this.style.background='rgba(163,230,53,0.1)';">
                    <span x-text="lang === 'id' ? 'Lihat Semua Skills →' : 'View All Skills →'"></span>
                </a>
            </div>
        </div>

        {{-- Values/Philosophy --}}
        <div style="background:#1a2230;border:1px solid rgba(255,255,255,0.08);border-radius:24px;padding:32px;">
            <h2 style="font-size:1.5rem;font-weight:800;color:white;margin:0 0 20px;">
                <span x-show="lang === 'id'">🎯 Filosofi Kerja</span>
                <span x-show="lang === 'en'" x-cloak>🎯 Work Philosophy</span>
            </h2>
            <div style="display:flex;flex-direction:column;gap:16px;">
                <div style="display:flex;align-items:flex-start;gap:12px;">
                    <div style="width:32px;height:32px;background:rgba(163,230,53,0.1);border:1px solid rgba(163,230,53,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="font-size:1.2rem;">✨</span>
                    </div>
                    <div>
                        <h3 style="font-weight:700;color:white;font-size:0.95rem;margin:0 0 4px;">
                            <span x-show="lang === 'id'">Simplicity is Key</span>
                            <span x-show="lang === 'en'" x-cloak>Simplicity is Key</span>
                        </h3>
                        <p x-show="lang === 'id'" style="font-size:0.85rem;color:rgba(255,255,255,0.5);margin:0;">Solusi terbaik adalah yang sederhana namun efektif.</p>
                        <p x-show="lang === 'en'" x-cloak style="font-size:0.85rem;color:rgba(255,255,255,0.5);margin:0;">The best solutions are simple yet effective.</p>
                    </div>
                </div>
                <div style="display:flex;align-items:flex-start;gap:12px;">
                    <div style="width:32px;height:32px;background:rgba(163,230,53,0.1);border:1px solid rgba(163,230,53,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="font-size:1.2rem;">🚀</span>
                    </div>
                    <div>
                        <h3 style="font-weight:700;color:white;font-size:0.95rem;margin:0 0 4px;">
                            <span x-show="lang === 'id'">Continuous Learning</span>
                            <span x-show="lang === 'en'" x-cloak>Continuous Learning</span>
                        </h3>
                        <p x-show="lang === 'id'" style="font-size:0.85rem;color:rgba(255,255,255,0.5);margin:0;">Teknologi terus berkembang, begitu juga dengan skill saya.</p>
                        <p x-show="lang === 'en'" x-cloak style="font-size:0.85rem;color:rgba(255,255,255,0.5);margin:0;">Technology keeps evolving, and so do my skills.</p>
                    </div>
                </div>
                <div style="display:flex;align-items:flex-start;gap:12px;">
                    <div style="width:32px;height:32px;background:rgba(163,230,53,0.1);border:1px solid rgba(163,230,53,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="font-size:1.2rem;">🤝</span>
                    </div>
                    <div>
                        <h3 style="font-weight:700;color:white;font-size:0.95rem;margin:0 0 4px;">
                            <span x-show="lang === 'id'">Collaboration Matters</span>
                            <span x-show="lang === 'en'" x-cloak>Collaboration Matters</span>
                        </h3>
                        <p x-show="lang === 'id'" style="font-size:0.85rem;color:rgba(255,255,255,0.5);margin:0;">Tim yang solid menghasilkan produk yang luar biasa.</p>
                        <p x-show="lang === 'en'" x-cloak style="font-size:0.85rem;color:rgba(255,255,255,0.5);margin:0;">A solid team produces exceptional products.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
