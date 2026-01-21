@extends('layouts.landing')

@section('content')
    {{-- Header --}}
    <x-landing.header />

    {{-- Mobile Menu --}}
    <x-landing.mobile-menu />

    {{-- Hero Section --}}
    <x-landing.hero :content="$content" />

    {{-- Why Choose Us Section --}}
    <x-landing.why-us />

    {{-- Services Section --}}
    <x-landing.services />

    {{-- Clients Section --}}
    <x-landing.clients />

    {{-- Call to Action Section --}}
    <x-landing.cta />

    {{-- Contact Section --}}
    <x-landing.contact :content="$content" />

    {{-- Footer --}}
    <x-landing.footer />

    {{-- Mobile Navigation --}}
    <x-landing.mobile-nav />
@endsection
