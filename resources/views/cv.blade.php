@extends('layouts.dark')
@php $pageTitle = 'Curriculum Vitae'; @endphp

@section('content')
<div x-data="{ activeTab: 'experience' }" style="background:#111827;min-height:100vh;">

    {{-- HERO --}}
    <div style="background:linear-gradient(135deg,#111827 0%,#1a2e1c 50%,#111827 100%);padding:40px 16px 80px;">
        <div style="max-width:896px;margin:0 auto;">

            <a href="{{ route('home') }}"
               style="display:inline-flex;align-items:center;gap:8px;color:rgba(255,255,255,0.45);text-decoration:none;font-size:0.875rem;margin-bottom:40px;"
               onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali / Back
            </a>

            {{-- Profile --}}
            <div style="display:flex;flex-wrap:wrap;align-items:center;gap:24px;margin-bottom:40px;">
                <div style="position:relative;flex-shrink:0;">
                    <div style="width:80px;height:80px;border-radius:16px;background:#A3E635;display:flex;align-items:center;justify-content:center;font-size:2rem;font-weight:900;color:#111827;box-shadow:0 8px 24px rgba(163,230,53,0.3);">F</div>
                    <div style="position:absolute;bottom:-4px;right:-4px;width:16px;height:16px;border-radius:50%;background:#A3E635;border:2px solid #111827;"></div>
                </div>
                <div style="flex:1;min-width:180px;">
                    <div style="display:inline-block;padding:4px 12px;border-radius:999px;background:rgba(163,230,53,0.12);border:1px solid rgba(163,230,53,0.25);color:#A3E635;font-size:0.75rem;font-weight:700;margin-bottom:8px;">
                        📄 Curriculum Vitae
                    </div>
                    <h1 style="font-size:clamp(2rem,5vw,3rem);font-weight:900;color:white;margin:0 0 8px;line-height:1.1;">Fauzan Supriyadi</h1>
                    <div style="display:flex;flex-wrap:wrap;gap:16px;font-size:0.875rem;color:rgba(255,255,255,0.4);">
                        <span>📍 Jakarta, Indonesia</span>
                        <span>✉️ fauzansupriyadi1@gmail.com</span>
                        <span>💼 IT Generalist</span>
                    </div>
                </div>
                <a href="mailto:fauzansupriyadi1@gmail.com"
                   style="display:inline-flex;align-items:center;gap:8px;padding:12px 20px;background:#A3E635;color:#111827;font-weight:900;font-size:0.875rem;border-radius:16px;text-decoration:none;flex-shrink:0;box-shadow:0 4px 16px rgba(163,230,53,0.25);">
                    ✉️ Hubungi Saya
                </a>
            </div>

            {{-- Stats 2 kolom --}}
            <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:12px;max-width:320px;">
                <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:16px;text-align:center;">
                    <div style="font-size:1.5rem;font-weight:900;color:#A3E635;">{{ $experiences->count() }}</div>
                    <div style="font-size:0.7rem;color:rgba(255,255,255,0.35);margin-top:4px;">Pengalaman</div>
                </div>
                <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:16px;text-align:center;">
                    <div style="font-size:1.5rem;font-weight:900;color:#A3E635;">{{ $education->count() }}</div>
                    <div style="font-size:0.7rem;color:rgba(255,255,255,0.35);margin-top:4px;">Pendidikan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABS --}}
    <div style="position:sticky;top:0;z-index:20;background:rgba(17,24,39,0.96);backdrop-filter:blur(20px);border-bottom:1px solid rgba(255,255,255,0.07);">
        <div style="max-width:896px;margin:0 auto;padding:10px 16px;display:flex;gap:8px;">
            <button @click="activeTab = 'experience'"
                    :style="activeTab === 'experience' ? 'background:#A3E635;color:#111827;' : 'background:rgba(255,255,255,0.07);color:rgba(255,255,255,0.6);'"
                    style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;border-radius:12px;font-size:0.875rem;font-weight:700;border:none;cursor:pointer;transition:all 0.2s;">
                💼 Pengalaman
                <span :style="activeTab === 'experience' ? 'background:rgba(0,0,0,0.2);color:#111827;' : 'background:rgba(255,255,255,0.15);color:white;'"
                      style="font-size:0.7rem;font-weight:900;padding:2px 8px;border-radius:6px;">{{ $experiences->count() }}</span>
            </button>
            <button @click="activeTab = 'education'"
                    :style="activeTab === 'education' ? 'background:#A3E635;color:#111827;' : 'background:rgba(255,255,255,0.07);color:rgba(255,255,255,0.6);'"
                    style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;border-radius:12px;font-size:0.875rem;font-weight:700;border:none;cursor:pointer;transition:all 0.2s;">
                🎓 Pendidikan
                <span :style="activeTab === 'education' ? 'background:rgba(0,0,0,0.2);color:#111827;' : 'background:rgba(255,255,255,0.15);color:white;'"
                      style="font-size:0.7rem;font-weight:900;padding:2px 8px;border-radius:6px;">{{ $education->count() }}</span>
            </button>
        </div>
    </div>

    {{-- CONTENT --}}
    <div style="background:#111827;padding:40px 16px 80px;">
        <div style="max-width:896px;margin:0 auto;">

            {{-- EXPERIENCE --}}
            <div x-show="activeTab === 'experience'"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100">
                <div style="position:relative;">
                    <div style="position:absolute;left:23px;top:8px;bottom:8px;width:2px;background:linear-gradient(to bottom,#A3E635,rgba(163,230,53,0.05));"></div>
                    <div style="display:flex;flex-direction:column;gap:20px;">
                        @forelse($experiences as $i => $exp)
                        <div style="position:relative;padding-left:56px;" x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }">
                            <div style="position:absolute;left:14px;top:26px;width:20px;height:20px;border-radius:50%;border:2px solid #A3E635;display:flex;align-items:center;justify-content:center;z-index:10;transition:background 0.3s;"
                                 :style="open ? 'background:#A3E635;' : 'background:#111827;'">
                                <div style="width:8px;height:8px;border-radius:50%;background:#111827;" x-show="open"></div>
                            </div>
                            <div style="border-radius:16px;overflow:hidden;transition:border 0.3s,background 0.3s,box-shadow 0.3s;"
                                 :style="open ? 'border:1.5px solid rgba(163,230,53,0.4);background:#1e2d3d;box-shadow:0 4px 24px rgba(163,230,53,0.06);' : 'border:1.5px solid rgba(255,255,255,0.08);background:#1a2230;'">
                                <button @click="open = !open" style="width:100%;text-align:left;display:flex;align-items:flex-start;gap:16px;padding:24px;background:transparent;border:none;cursor:pointer;">
                                    <div style="width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.25rem;font-weight:900;flex-shrink:0;transition:background 0.3s,color 0.3s;"
                                         :style="open ? 'background:#A3E635;color:#111827;' : 'background:rgba(255,255,255,0.07);color:rgba(255,255,255,0.5);'">
                                        {{ strtoupper(substr($exp->company_name, 0, 1)) }}
                                    </div>
                                    <div style="flex:1;min-width:0;">
                                        <div style="display:flex;flex-wrap:wrap;align-items:center;gap:8px;margin-bottom:4px;">
                                            <span style="font-weight:700;color:white;font-size:1rem;line-height:1.4;">{{ $exp->position }}</span>
                                            @if($exp->is_current)
                                            <span style="padding:2px 10px;border-radius:999px;font-size:0.7rem;font-weight:700;background:rgba(163,230,53,0.12);color:#A3E635;border:1px solid rgba(163,230,53,0.25);">● Aktif</span>
                                            @endif
                                        </div>
                                        <p style="color:#A3E635;font-size:0.875rem;font-weight:600;margin:0 0 8px;">{{ $exp->company_name }}</p>
                                        <div style="display:flex;flex-wrap:wrap;gap:12px;font-size:0.75rem;color:rgba(255,255,255,0.35);">
                                            <span>🗓 {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} — {{ $exp->is_current ? 'Present' : \Carbon\Carbon::parse($exp->end_date)->format('M Y') }}</span>
                                            @if($exp->location)<span>📍 {{ $exp->location }}</span>@endif
                                        </div>
                                    </div>
                                    <div style="width:20px;height:20px;flex-shrink:0;margin-top:4px;transition:transform 0.3s;"
                                         :style="open ? 'transform:rotate(180deg);color:#A3E635;' : 'color:rgba(255,255,255,0.3);'">
                                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </button>
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     style="padding:0 24px 24px;border-top:1px solid rgba(255,255,255,0.06);">
                                    @if($exp->description)
                                    <div style="padding-top:16px;display:flex;flex-direction:column;gap:10px;">
                                        @foreach(array_filter(array_map('trim', explode('.', $exp->description))) as $point)
                                        @if($point)
                                        <div style="display:flex;align-items:flex-start;gap:12px;">
                                            <div style="width:6px;height:6px;border-radius:50%;background:#A3E635;flex-shrink:0;margin-top:7px;"></div>
                                            <p style="font-size:0.875rem;line-height:1.6;color:rgba(255,255,255,0.6);margin:0;">{{ $point }}.</p>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div style="text-align:center;padding:64px 0;">
                            <div style="font-size:3rem;margin-bottom:12px;">💼</div>
                            <p style="color:rgba(255,255,255,0.35);margin:0;">Belum ada data pengalaman.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- EDUCATION --}}
            <div x-show="activeTab === 'education'"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100">
                <div style="position:relative;">
                    <div style="position:absolute;left:23px;top:8px;bottom:8px;width:2px;background:linear-gradient(to bottom,#A3E635,rgba(163,230,53,0.05));"></div>
                    <div style="display:flex;flex-direction:column;gap:20px;">
                        @forelse($education as $i => $edu)
                        <div style="position:relative;padding-left:56px;" x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }">
                            <div style="position:absolute;left:14px;top:26px;width:20px;height:20px;border-radius:50%;border:2px solid #A3E635;display:flex;align-items:center;justify-content:center;z-index:10;transition:background 0.3s;"
                                 :style="open ? 'background:#A3E635;' : 'background:#111827;'">
                                <div style="width:8px;height:8px;border-radius:50%;background:#111827;" x-show="open"></div>
                            </div>
                            <div style="border-radius:16px;overflow:hidden;transition:border 0.3s,background 0.3s,box-shadow 0.3s;"
                                 :style="open ? 'border:1.5px solid rgba(163,230,53,0.4);background:#1e2d3d;box-shadow:0 4px 24px rgba(163,230,53,0.06);' : 'border:1.5px solid rgba(255,255,255,0.08);background:#1a2230;'">
                                <button @click="open = !open" style="width:100%;text-align:left;display:flex;align-items:flex-start;gap:16px;padding:24px;background:transparent;border:none;cursor:pointer;">
                                    <div style="width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0;transition:background 0.3s;"
                                         :style="open ? 'background:#A3E635;' : 'background:rgba(255,255,255,0.07);'">🎓</div>
                                    <div style="flex:1;min-width:0;">
                                        <div style="display:flex;flex-wrap:wrap;align-items:center;gap:8px;margin-bottom:4px;">
                                            <span style="font-weight:700;color:white;font-size:1rem;line-height:1.4;">{{ $edu->institution_name }}</span>
                                            @if($edu->is_current)
                                            <span style="padding:2px 10px;border-radius:999px;font-size:0.7rem;font-weight:700;background:rgba(163,230,53,0.12);color:#A3E635;border:1px solid rgba(163,230,53,0.25);">● Aktif</span>
                                            @endif
                                        </div>
                                        <p style="color:#A3E635;font-size:0.875rem;font-weight:600;margin:0 0 8px;">{{ $edu->degree }}</p>
                                        <div style="display:flex;flex-wrap:wrap;gap:12px;font-size:0.75rem;color:rgba(255,255,255,0.35);">
                                            <span>{{ $edu->field_of_study }}</span>
                                            <span>🗓 {{ \Carbon\Carbon::parse($edu->start_date)->format('Y') }} — {{ $edu->is_current ? 'Present' : \Carbon\Carbon::parse($edu->end_date)->format('Y') }}</span>
                                            @if($edu->location)<span>📍 {{ $edu->location }}</span>@endif
                                        </div>
                                    </div>
                                    <div style="width:20px;height:20px;flex-shrink:0;margin-top:4px;transition:transform 0.3s;"
                                         :style="open ? 'transform:rotate(180deg);color:#A3E635;' : 'color:rgba(255,255,255,0.3);'">
                                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </button>
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     style="padding:0 24px 24px;border-top:1px solid rgba(255,255,255,0.06);">
                                    <div style="padding-top:16px;display:flex;flex-wrap:wrap;gap:12px;">
                                        @if($edu->grade)
                                        <div style="padding:8px 16px;border-radius:12px;background:rgba(163,230,53,0.08);border:1px solid rgba(163,230,53,0.2);">
                                            <span style="font-size:0.875rem;font-weight:700;color:#A3E635;">⭐ GPA: {{ $edu->grade }}</span>
                                        </div>
                                        @endif
                                        @if($edu->description)
                                        <p style="font-size:0.875rem;line-height:1.6;color:rgba(255,255,255,0.55);margin:0;width:100%;">{{ $edu->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div style="text-align:center;padding:64px 0;">
                            <div style="font-size:3rem;margin-bottom:12px;">🎓</div>
                            <p style="color:rgba(255,255,255,0.35);margin:0;">Belum ada data pendidikan.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
