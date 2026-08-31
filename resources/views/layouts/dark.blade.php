<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings['site_name'] ?? 'Fauzan.dev' }} — {{ $pageTitle ?? 'CV' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        html, body { background: #111827 !important; }
        /* Force dark card backgrounds */
        .cert-card, .skill-card { background: #1a2230 !important; color: white !important; }
        /* Override any Tailwind bg-white on cards */
        .bg-white { background: #1a2230 !important; }
        .text-\[\#111827\] { color: white !important; }
        .text-\[\#4B5563\] { color: rgba(255,255,255,0.55) !important; }
        .text-\[\#6B7280\] { color: rgba(255,255,255,0.4) !important; }
        .border-gray-100 { border-color: rgba(255,255,255,0.08) !important; }
    </style>
</head>
<body style="background:#111827; font-family:'Inter',sans-serif; margin:0; padding:0;"
      x-data="{ 
        lang: localStorage.getItem('language') || 'id',
        toggleLang() {
          this.lang = this.lang === 'id' ? 'en' : 'id';
          localStorage.setItem('language', this.lang);
        }
      }">

    {{-- Floating Language Switcher --}}
    <div style="position:fixed; top:20px; right:20px; z-index:50;">
        <button @click="toggleLang()"
                style="display:flex; align-items:center; gap:6px; padding:8px 14px; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.12); border-radius:999px; color:white; font-size:0.75rem; font-weight:700; cursor:pointer; backdrop-filter:blur(12px); transition:all 0.2s;"
                onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
            </svg>
            <span x-text="lang.toUpperCase()"></span>
        </button>
    </div>

    <main>
        @yield('content')
    </main>

    {{-- Inline Footer (dark theme) --}}
    <footer style="background:#0d1116;border-top:1px solid rgba(255,255,255,0.08);padding:48px 16px 32px;">
        <div style="max-width:1280px;margin:0 auto;">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:32px;margin-bottom:32px;">
                {{-- Brand --}}
                <div>
                    <h3 style="color:#A3E635;font-weight:800;font-size:1.125rem;margin:0 0 12px;">{{ $settings['site_name'] ?? 'Fauzan.dev' }}</h3>
                    <p style="color:rgba(255,255,255,0.45);font-size:0.875rem;line-height:1.6;margin:0;">{{ $settings['site_tagline'] ?? 'IT Generalist & Full-Stack Developer' }}</p>
                </div>
                {{-- Quick Links --}}
                <div>
                    <h4 style="color:white;font-weight:700;font-size:0.875rem;margin:0 0 12px;">Quick Links</h4>
                    <div style="display:flex;flex-direction:column;gap:8px;">
                        <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.45);font-size:0.875rem;text-decoration:none;" onmouseover="this.style.color='#A3E635'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">Home</a>
                        <a href="{{ route('about') }}" style="color:rgba(255,255,255,0.45);font-size:0.875rem;text-decoration:none;" onmouseover="this.style.color='#A3E635'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">About</a>
                        <a href="{{ route('cv') }}" style="color:rgba(255,255,255,0.45);font-size:0.875rem;text-decoration:none;" onmouseover="this.style.color='#A3E635'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">CV</a>
                        <a href="{{ route('skills') }}" style="color:rgba(255,255,255,0.45);font-size:0.875rem;text-decoration:none;" onmouseover="this.style.color='#A3E635'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">Skills</a>
                        <a href="{{ route('certifications') }}" style="color:rgba(255,255,255,0.45);font-size:0.875rem;text-decoration:none;" onmouseover="this.style.color='#A3E635'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">Certifications</a>
                    </div>
                </div>
                {{-- Social --}}
                <div>
                    <h4 style="color:white;font-weight:700;font-size:0.875rem;margin:0 0 12px;">Connect</h4>
                    <div style="display:flex;gap:12px;">
                        @if(!empty($settings['github_url']))
                        <a href="{{ $settings['github_url'] }}" target="_blank" rel="noopener" style="width:36px;height:36px;background:rgba(255,255,255,0.08);border-radius:8px;display:flex;align-items:center;justify-content:center;color:white;transition:all 0.2s;" onmouseover="this.style.background='#A3E635';this.style.color='#111827'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='white'">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        @endif
                        @if(!empty($settings['linkedin_url']))
                        <a href="{{ $settings['linkedin_url'] }}" target="_blank" rel="noopener" style="width:36px;height:36px;background:rgba(255,255,255,0.08);border-radius:8px;display:flex;align-items:center;justify-content:center;color:white;transition:all 0.2s;" onmouseover="this.style.background='#A3E635';this.style.color='#111827'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='white'">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div style="border-top:1px solid rgba(255,255,255,0.08);padding-top:24px;text-align:center;">
                <p style="color:rgba(255,255,255,0.3);font-size:0.75rem;margin:0;">&copy; 2026 Fauzan Supriyadi. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
