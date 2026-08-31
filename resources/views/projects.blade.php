@extends('layouts.dark')
@php $pageTitle = 'Projects'; @endphp

@section('content')
<div style="background:#111827;min-height:100vh;">

    {{-- HERO --}}
    <div style="background:linear-gradient(135deg,#1a2230 0%,#111827 100%);padding:40px 16px 80px;">
        <div style="max-width:1200px;margin:0 auto;">
            <a href="{{ route('home') }}"
               style="display:inline-flex;align-items:center;gap:8px;color:rgba(255,255,255,0.45);text-decoration:none;font-size:0.875rem;margin-bottom:40px;"
               onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                <span x-text="lang === 'id' ? 'Kembali' : 'Back'"></span>
            </a>

            <div style="display:flex;align-items:center;gap:16px;margin-bottom:16px;">
                <div style="width:56px;height:56px;background:#A3E635;border-radius:16px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="28" height="28" style="color:#1E3A2B;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div>
                    <p style="color:#A3E635;font-size:0.875rem;font-weight:600;margin:0 0 4px;">
                        <span x-show="lang === 'id'">Portfolio</span>
                        <span x-show="lang === 'en'" x-cloak>Portfolio</span>
                    </p>
                    <h1 style="font-size:clamp(1.75rem,4vw,2.5rem);font-weight:900;color:white;margin:0;line-height:1.1;">
                        <span x-show="lang === 'id'">Semua Project</span>
                        <span x-show="lang === 'en'" x-cloak>All Projects</span>
                    </h1>
                </div>
            </div>
            <p style="color:rgba(255,255,255,0.5);font-size:0.9rem;max-width:600px;margin:0;line-height:1.7;">
                <span x-show="lang === 'id'">Semua projek yang pernah saya buat atau saya terlibat dalam pembuatan ataupun pengurusannya.</span>
                <span x-show="lang === 'en'" x-cloak>All projects I've created or been involved in their development and management.</span>
            </p>

            {{-- Stats --}}
            <div style="display:inline-flex;align-items:center;gap:8px;margin-top:20px;padding:8px 16px;background:rgba(163,230,53,0.08);border:1px solid rgba(163,230,53,0.2);border-radius:999px;">
                <div style="width:8px;height:8px;background:#A3E635;border-radius:50%;"></div>
                <span style="color:#A3E635;font-size:0.8rem;font-weight:700;">{{ $projects->count() }}
                    <span x-show="lang === 'id'">Project</span>
                    <span x-show="lang === 'en'" x-cloak>Projects</span>
                </span>
            </div>
        </div>
    </div>

    {{-- PROJECTS GRID --}}
    <div style="max-width:1200px;margin:-32px auto 0;padding:0 16px 80px;">

        @if($projects->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px;">
            @foreach($projects as $project)
            <div style="background:#1a2230;border:1px solid rgba(255,255,255,0.08);border-radius:20px;overflow:hidden;display:flex;flex-direction:column;transition:all 0.25s;"
                 onmouseover="this.style.borderColor='rgba(163,230,53,0.4)';this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,0.3)';"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.08)';this.style.transform='translateY(0)';this.style.boxShadow='none';">

                {{-- Project Image --}}
                <div style="width:100%;height:200px;overflow:hidden;background:#0d1116;flex-shrink:0;position:relative;">
                    @if($project->image_path)
                        <img src="{{ $project->image_url }}"
                             alt="{{ $project->title }}"
                             style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                    @else
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#1E3A2B,#0d1116);display:flex;align-items:center;justify-content:center;">
                            <svg width="48" height="48" style="color:rgba(163,230,53,0.2);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    @endif
                    {{-- Nomor urut --}}
                    <div style="position:absolute;top:12px;left:12px;width:28px;height:28px;background:rgba(0,0,0,0.6);backdrop-filter:blur(4px);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                        <span style="color:rgba(255,255,255,0.6);font-size:0.7rem;font-weight:700;">{{ $loop->iteration }}</span>
                    </div>
                </div>

                {{-- Content --}}
                <div style="padding:20px;flex:1;display:flex;flex-direction:column;gap:8px;">
                    <h3 style="font-weight:800;color:white;font-size:1rem;margin:0;line-height:1.3;">{{ $project->title }}</h3>

                    @if($project->technologies)
                    <p style="color:#A3E635;font-size:0.75rem;font-weight:600;margin:0;">{{ $project->technologies }}</p>
                    @endif

                    @if($project->description)
                    <p style="font-size:0.8rem;color:rgba(255,255,255,0.5);line-height:1.6;margin:0;flex:1;">{{ Str::limit($project->description, 100) }}</p>
                    @endif

                    {{-- Link --}}
                    @if($project->url)
                    <div style="margin-top:8px;padding-top:12px;border-top:1px solid rgba(255,255,255,0.07);">
                        <a href="{{ $project->url }}" target="_blank" rel="noopener"
                           style="display:inline-flex;align-items:center;gap:6px;color:#A3E635;font-size:0.78rem;font-weight:700;text-decoration:none;transition:gap 0.2s;"
                           onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='6px'">
                            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            <span x-text="lang === 'id' ? 'Lihat Project' : 'View Project'"></span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @else
        <div style="text-align:center;padding:80px 0;">
            <div style="font-size:3rem;margin-bottom:16px;">🚀</div>
            <p style="color:rgba(255,255,255,0.35);margin:0 0 16px;">Belum ada project.</p>
            <a href="{{ route('filament.admin.resources.projects.index') }}"
               style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;background:#1E3A2B;color:white;font-weight:600;font-size:0.875rem;border-radius:999px;text-decoration:none;">
                + Tambah Project
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
