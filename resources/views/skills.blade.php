@extends('layouts.dark')
@php $pageTitle = 'Skills'; @endphp

@section('content')
<div style="background:#111827;min-height:100vh;">

    {{-- HERO --}}
    <div style="background:linear-gradient(135deg,#1f2937 0%,#111827 100%);padding:40px 16px 80px;">
        <div style="max-width:1024px;margin:0 auto;">
            <a href="{{ route('home') }}"
               style="display:inline-flex;align-items:center;gap:8px;color:rgba(255,255,255,0.45);text-decoration:none;font-size:0.875rem;margin-bottom:40px;"
               onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Kembali / Back
            </a>
            <div style="display:flex;align-items:center;gap:16px;">
                <div style="width:56px;height:56px;background:#A3E635;border-radius:16px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="28" height="28" style="color:#1E3A2B;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <div>
                    <p style="color:#A3E635;font-size:0.875rem;font-weight:600;margin:0 0 4px;">Skills</p>
                    <h1 style="font-size:clamp(1.75rem,4vw,2.5rem);font-weight:900;color:white;margin:0;">Keahlian & Teknologi</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <div style="max-width:1024px;margin:0 auto;padding:0 16px 80px;margin-top:-32px;">

        @if($skills->count() > 0)
            @foreach($skills as $category => $categorySkills)
            <div style="margin-bottom:40px;">
                {{-- Category badge --}}
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
                    <span style="padding:6px 16px;border-radius:999px;background:#1E3A2B;color:#A3E635;font-size:0.8rem;font-weight:700;flex-shrink:0;">
                        {{ $category }}
                    </span>
                    <div style="flex:1;height:1px;background:rgba(255,255,255,0.08);"></div>
                </div>

                {{-- Skills grid --}}
                <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:16px;">
                    @foreach($categorySkills as $skill)
                    <div style="background:#1a2230;border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:20px;transition:all 0.2s;"
                         onmouseover="this.style.borderColor='rgba(163,230,53,0.4)';this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(163,230,53,0.06)';"
                         onmouseout="this.style.borderColor='rgba(255,255,255,0.08)';this.style.transform='translateY(0)';this.style.boxShadow='none';">
                        {{-- Gambar atau emoji icon --}}
                        <div style="margin-bottom:12px;">
                            @if($skill->image_path)
                                <img src="{{ asset('storage/'.$skill->image_path) }}"
                                     alt="{{ $skill->name }}"
                                     style="width:48px;height:48px;object-fit:contain;border-radius:10px;background:rgba(255,255,255,0.05);padding:4px;">
                            @else
                                <div style="font-size:2rem;">{{ $skill->icon ?? '💡' }}</div>
                            @endif
                        </div>
                        <h3 style="font-weight:700;color:white;font-size:0.875rem;margin:0 0 12px;">{{ $skill->name }}</h3>
                        {{-- Progress bar --}}
                        <div style="width:100%;background:rgba(255,255,255,0.08);border-radius:999px;height:4px;margin-bottom:4px;">
                            <div style="height:4px;border-radius:999px;background:#A3E635;width:{{ $skill->proficiency }}%;transition:width 0.7s;"></div>
                        </div>
                        <p style="font-size:0.75rem;color:rgba(255,255,255,0.35);margin:0;">{{ $skill->proficiency }}%</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        @else
        <div style="text-align:center;padding:80px 0;">
            <div style="font-size:3rem;margin-bottom:16px;">💡</div>
            <p style="color:rgba(255,255,255,0.35);margin:0 0 16px;">Belum ada data skills.</p>
            <a href="{{ route('filament.admin.resources.skills.index') }}"
               style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;background:#1E3A2B;color:white;font-weight:600;font-size:0.875rem;border-radius:999px;text-decoration:none;">
                + Tambah Skills
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
