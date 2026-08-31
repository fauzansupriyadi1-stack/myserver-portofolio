@extends('layouts.dark')
@php $pageTitle = 'Sertifikasi'; @endphp

@section('content')
<div style="background:#111827;min-height:100vh;">

    {{-- LIGHTBOX MODAL --}}
    <div id="certLightbox"
         style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,0.92);backdrop-filter:blur(8px);align-items:center;justify-content:center;padding:20px;"
         onclick="closeLightbox(event)">
        <div style="position:relative;max-width:90vw;max-height:90vh;display:flex;flex-direction:column;align-items:center;gap:16px;">
            {{-- Close Button --}}
            <button onclick="closeLightbox()"
                    style="position:fixed;top:20px;right:20px;width:44px;height:44px;background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);border-radius:50%;color:white;font-size:1.25rem;cursor:pointer;display:flex;align-items:center;justify-content:center;z-index:10000;transition:all 0.2s;"
                    onmouseover="this.style.background='rgba(255,255,255,0.25)'"
                    onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                ✕
            </button>
            {{-- Image --}}
            <img id="lightboxImg"
                 src=""
                 alt="Sertifikat"
                 style="max-width:90vw;max-height:80vh;object-fit:contain;border-radius:12px;box-shadow:0 24px 64px rgba(0,0,0,0.8);">
            {{-- Caption --}}
            <div id="lightboxCaption"
                 style="color:rgba(255,255,255,0.7);font-size:0.875rem;font-weight:600;text-align:center;"></div>
        </div>
    </div>

    {{-- HERO --}}
    <div style="background:linear-gradient(135deg,#1E3A2B 0%,#111827 100%);padding:40px 16px 80px;">
        <div style="max-width:1024px;margin:0 auto;">
            <a href="{{ route('home') }}"
               style="display:inline-flex;align-items:center;gap:8px;color:rgba(255,255,255,0.45);text-decoration:none;font-size:0.875rem;margin-bottom:40px;"
               onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.45)'">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                <span x-text="lang === 'id' ? 'Kembali' : 'Back'"></span>
            </a>
            <div style="display:flex;align-items:center;gap:16px;">
                <div style="width:56px;height:56px;background:#A3E635;border-radius:16px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="28" height="28" style="color:#1E3A2B;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div>
                    <p style="color:#A3E635;font-size:0.875rem;font-weight:600;margin:0 0 4px;">
                        <span x-show="lang === 'id'">Sertifikasi</span>
                        <span x-show="lang === 'en'" x-cloak>Certifications</span>
                    </p>
                    <h1 style="font-size:clamp(1.75rem,4vw,2.5rem);font-weight:900;color:white;margin:0;">
                        <span x-show="lang === 'id'">Sertifikat Profesional</span>
                        <span x-show="lang === 'en'" x-cloak>Professional Certificates</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <div style="max-width:1024px;margin:-32px auto 0;padding:0 16px 80px;">

        @if($certifications->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">
            @foreach($certifications as $cert)
            <div style="background:#1a2230;border:1px solid rgba(255,255,255,0.08);border-radius:20px;overflow:hidden;display:flex;flex-direction:column;transition:all 0.2s;"
                 onmouseover="this.style.borderColor='rgba(163,230,53,0.4)';this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 32px rgba(163,230,53,0.06)';"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.08)';this.style.transform='translateY(0)';this.style.boxShadow='none';">

                {{-- Cover/Thumbnail — klik untuk lihat full --}}
                @if($cert->logo || $cert->certificate_image)
                @php $coverImg = $cert->certificate_image ? asset('storage/'.$cert->certificate_image) : asset('storage/'.$cert->logo); @endphp
                <div style="width:100%;height:180px;overflow:hidden;background:#0d1116;flex-shrink:0;cursor:zoom-in;position:relative;"
                     onclick="openLightbox('{{ $coverImg }}', '{{ $cert->name }}')">
                    <img src="{{ $coverImg }}"
                         alt="{{ $cert->name }}"
                         style="width:100%;height:100%;object-fit:cover;object-position:center;transition:transform 0.4s;"
                         onmouseover="this.style.transform='scale(1.05)'"
                         onmouseout="this.style.transform='scale(1)'">
                    {{-- Zoom hint overlay --}}
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0);display:flex;align-items:center;justify-content:center;transition:background 0.2s;"
                         onmouseover="this.style.background='rgba(0,0,0,0.3)';this.querySelector('span').style.opacity='1'"
                         onmouseout="this.style.background='rgba(0,0,0,0)';this.querySelector('span').style.opacity='0'">
                        <span style="opacity:0;transition:opacity 0.2s;background:rgba(0,0,0,0.6);border:1px solid rgba(255,255,255,0.3);color:white;padding:8px 16px;border-radius:999px;font-size:0.75rem;font-weight:700;pointer-events:none;">
                            🔍 Lihat Sertifikat
                        </span>
                    </div>
                </div>
                @else
                <div style="width:100%;height:100px;background:linear-gradient(135deg,#1E3A2B,#0d1116);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="40" height="40" style="color:rgba(163,230,53,0.3);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                @endif

                {{-- Content --}}
                <div style="padding:20px;flex:1;display:flex;flex-direction:column;">
                    <h3 style="font-weight:700;color:white;font-size:0.95rem;margin:0 0 4px;line-height:1.4;">{{ $cert->name }}</h3>
                    <p style="color:#A3E635;font-weight:600;font-size:0.8rem;margin:0 0 10px;">{{ $cert->issuing_organization }}</p>

                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.35);margin-bottom:10px;">
                        🗓 {{ \Carbon\Carbon::parse($cert->issue_date)->format('M Y') }}
                        @if($cert->expiry_date)
                            — {{ \Carbon\Carbon::parse($cert->expiry_date)->format('M Y') }}
                        @else
                            &nbsp;<span style="color:#A3E635;font-weight:600;">· Tidak Kadaluarsa</span>
                        @endif
                    </div>

                    @if($cert->description)
                    <p style="font-size:0.78rem;line-height:1.6;color:rgba(255,255,255,0.45);margin:0 0 10px;flex:1;">{{ $cert->description }}</p>
                    @endif

                    @if($cert->credential_id)
                    <p style="font-size:0.72rem;color:rgba(255,255,255,0.2);margin:0 0 8px;">ID: {{ $cert->credential_id }}</p>
                    @endif

                    {{-- Bottom actions --}}
                    <div style="margin-top:auto;padding-top:14px;border-top:1px solid rgba(255,255,255,0.07);display:flex;flex-wrap:wrap;gap:10px;align-items:center;">

                        {{-- Tombol Lihat Sertifikat --}}
                        @if($cert->certificate_image || $cert->logo)
                        @php $imgSrc = $cert->certificate_image ? asset('storage/'.$cert->certificate_image) : asset('storage/'.$cert->logo); @endphp
                        <button onclick="openLightbox('{{ $imgSrc }}', '{{ $cert->name }}')"
                                style="display:inline-flex;align-items:center;gap:6px;padding:8px 14px;background:#A3E635;color:#111827;font-size:0.75rem;font-weight:800;border-radius:999px;border:none;cursor:pointer;transition:all 0.2s;"
                                onmouseover="this.style.background='#c4f542';this.style.transform='scale(1.03)'"
                                onmouseout="this.style.background='#A3E635';this.style.transform='scale(1)'">
                            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <span x-text="lang === 'id' ? 'Lihat Sertifikat' : 'View Certificate'"></span>
                        </button>
                        @endif

                        {{-- Tombol Verifikasi --}}
                        @if($cert->credential_url)
                        <a href="{{ $cert->credential_url }}" target="_blank"
                           style="display:inline-flex;align-items:center;gap:5px;color:rgba(255,255,255,0.4);font-size:0.72rem;font-weight:600;text-decoration:none;transition:color 0.2s;"
                           onmouseover="this.style.color='#A3E635'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">
                            <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Verifikasi
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center;padding:80px 0;">
            <div style="font-size:3rem;margin-bottom:16px;">🏆</div>
            <p style="color:rgba(255,255,255,0.35);margin:0 0 16px;">Belum ada sertifikasi.</p>
            <a href="{{ route('filament.admin.resources.certifications.index') }}"
               style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;background:#1E3A2B;color:white;font-weight:600;font-size:0.875rem;border-radius:999px;text-decoration:none;">
                + Tambah Sertifikasi
            </a>
        </div>
        @endif
    </div>
</div>

{{-- LIGHTBOX SCRIPT --}}
<script>
function openLightbox(src, caption) {
    const lb = document.getElementById('certLightbox');
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightboxCaption').textContent = caption;
    lb.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLightbox(e) {
    // Tutup hanya jika klik backdrop atau tombol close, bukan gambarnya
    if (e && e.target.tagName === 'IMG') return;
    const lb = document.getElementById('certLightbox');
    lb.style.display = 'none';
    document.getElementById('lightboxImg').src = '';
    document.body.style.overflow = '';
}

// Tutup dengan tekan Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});
</script>
@endsection
