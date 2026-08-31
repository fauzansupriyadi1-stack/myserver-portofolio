@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    @include('partials.hero', ['hero' => $hero, 'settings' => $settings])

    {{-- About / Premier Destination Section --}}
    @include('partials.about', ['about' => $about, 'settings' => $settings])

    {{-- Professional Coaching & Academy Section --}}
    @include('partials.academy', ['projects' => $projects, 'facility' => $facility])

    {{-- Counter Stats Block --}}
    @include('partials.stats', ['stats' => $stats])

    {{-- FAQ Section --}}
    @include('partials.faq', ['faqs' => $faqs])
@endsection
