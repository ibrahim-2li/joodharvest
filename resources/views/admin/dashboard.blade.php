@extends('layouts.admin')

@section('content')
    {{-- Sidebar --}}
    <x-admin.sidebar :unreadCount="$unreadCount" />

    {{-- Main Content Area --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Header --}}
        <x-admin.header />

        {{-- Content Sections --}}
        <main class="flex-1 overflow-y-auto bg-gray-50 p-6 pb-24">
            {{-- Hero Section --}}
            <x-admin.sections.hero :sections="$sections" />

            {{-- About Section --}}
            <x-admin.sections.about :sections="$sections" />

            {{-- Services Section --}}
            <x-admin.sections.services />

            {{-- Contact Section --}}
            <x-admin.sections.contact :sections="$sections" />

            {{-- Messages Section --}}
            <x-admin.sections.messages :messages="$messages" :unreadCount="$unreadCount" />
        </main>
    </div>
@endsection
