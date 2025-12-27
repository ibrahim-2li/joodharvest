<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jood Harvest - Admin Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #C73534 0%, #B92F2E 50%, #4A5568 100%);
        }

        .sidebar-item {
            transition: all 0.3s ease;
        }

        .sidebar-item:hover {
            background: rgba(199, 53, 52, 0.1);
            border-left: 3px solid #C73534;
        }

        .sidebar-item.active {
            background: rgba(199, 53, 52, 0.15);
            border-left: 3px solid #C73534;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-gray-50" x-data="{ activeSection: 'hero', mobileSidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div :class="mobileSidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed md:relative md:translate-x-0 z-30 w-64 bg-white shadow-xl h-full transition-transform duration-300">

            <!-- Logo Section -->
            <div class="gradient-bg px-6 py-6">
                <div class="text-2xl font-black text-white">
                    <span>Jood</span><span class="text-gray-200">Harvest</span>
                </div>
                <p class="text-gray-100 text-sm mt-1">Admin Dashboard</p>
            </div>

            <!-- User Info -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <span class="text-red-600 font-bold text-lg">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="px-4 py-6 space-y-2">
                <button @click="activeSection = 'hero'" :class="activeSection === 'hero' ? 'active' : ''"
                    class="sidebar-item w-full text-left px-4 py-3 rounded-lg text-gray-700 flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span>Hero Section</span>
                </button>

                <button @click="activeSection = 'about'" :class="activeSection === 'about' ? 'active' : ''"
                    class="sidebar-item w-full text-left px-4 py-3 rounded-lg text-gray-700 flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>About Section</span>
                </button>

                <button @click="activeSection = 'services'" :class="activeSection === 'services' ? 'active' : ''"
                    class="sidebar-item w-full text-left px-4 py-3 rounded-lg text-gray-700 flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span>Services Section</span>
                </button>

                <button @click="activeSection = 'contact'" :class="activeSection === 'contact' ? 'active' : ''"
                    class="sidebar-item w-full text-left px-4 py-3 rounded-lg text-gray-700 flex items-center space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span>Contact Info</span>
                </button>

                <button @click="activeSection = 'messages'" :class="activeSection === 'messages' ? 'active' : ''"
                    class="sidebar-item w-full text-left px-4 py-3 rounded-lg text-gray-700 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                            </path>
                        </svg>
                        <span>Messages</span>
                    </div>
                    @if ($unreadCount > 0)
                        <span
                            class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">{{ $unreadCount }}</span>
                    @endif
                </button>
            </nav>

            <!-- Actions -->
            <div class="absolute bottom-0 w-64 border-t border-gray-200 bg-white">
                <a href="{{ url('/') }}" target="_blank"
                    class="flex items-center space-x-3 px-6 py-4 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <span class="text-sm font-medium">Preview Site</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-200">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-3 px-6 py-4 text-red-600 hover:bg-red-50 w-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span class="text-sm font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Mobile Overlay -->
        <div x-show="mobileSidebarOpen" @click="mobileSidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button @click="mobileSidebarOpen = !mobileSidebarOpen" class="md:hidden text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">
                                <span x-show="activeSection === 'hero'">Hero Section</span>
                                <span x-show="activeSection === 'about'">About Section</span>
                                <span x-show="activeSection === 'services'">Services Section</span>
                                <span x-show="activeSection === 'contact'">Contact Information</span>
                                <span x-show="activeSection === 'messages'">Contact Messages</span>
                            </h1>
                            <p class="text-sm text-gray-500">
                                <span x-show="activeSection !== 'messages'">Manage landing page content</span>
                                <span x-show="activeSection === 'messages'">View and manage contact form
                                    submissions</span>
                            </p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Hero Section -->
                    <div x-show="activeSection === 'hero'" class="max-w-5xl">
                        <div class="bg-white rounded-xl shadow-sm p-8 space-y-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">Hero Section Content</h2>
                                    <p class="text-sm text-gray-500">Main banner text displayed on homepage</p>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Title
                                        (English)</label>
                                    <input type="text" name="contents[0][value_en]"
                                        value="{{ $sections['hero']['title']->value_en ?? '' }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                    <input type="hidden" name="contents[0][section]" value="hero">
                                    <input type="hidden" name="contents[0][key]" value="title">
                                    <input type="hidden" name="contents[0][type]" value="text">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">العنوان
                                        (بالعربية)</label>
                                    <input type="text" name="contents[0][value_ar]"
                                        value="{{ $sections['hero']['title']->value_ar ?? '' }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                        dir="rtl">
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description
                                        (English)</label>
                                    <textarea name="contents[1][value_en]" rows="4"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $sections['hero']['description']->value_en ?? '' }}</textarea>
                                    <input type="hidden" name="contents[1][section]" value="hero">
                                    <input type="hidden" name="contents[1][key]" value="description">
                                    <input type="hidden" name="contents[1][type]" value="textarea">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">الوصف
                                        (بالعربية)</label>
                                    <textarea name="contents[1][value_ar]" rows="4"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                        dir="rtl">{{ $sections['hero']['description']->value_ar ?? '' }}</textarea>
                                </div>
                            </div>

                            <!-- Hero Image Upload -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Hero Floating Image
                                </label>
                                <div class="mt-2">
                                    @if (isset($sections['hero']['image']) && $sections['hero']['image']->value_en)
                                        <div class="mb-4">
                                            <img src="{{ asset($sections['hero']['image']->value_en) }}"
                                                alt="Current Hero Image" class="w-full max-w-md rounded-lg shadow-md">
                                            <p class="text-xs text-gray-500 mt-2">Current image</p>
                                        </div>
                                    @endif
                                    <input type="file" name="hero_image" accept="image/*"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                                    <p class="text-xs text-gray-500 mt-2">Recommended: 1920x1080px. Max size: 5MB.
                                        Formats: JPG, PNG, GIF, WebP</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div x-show="activeSection === 'about'" class="max-w-5xl">
                        <div class="bg-white rounded-xl shadow-sm p-8 space-y-8">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">About Section Content</h2>
                                    <p class="text-sm text-gray-500">Company information, vision, and mission</p>
                                </div>
                            </div>

                            <!-- Title -->
                            <div>
                                <h3 class="text-lg font-bold text-gray-700 mb-4">Section Title</h3>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Title
                                            (English)</label>
                                        <input type="text" name="contents[2][value_en]"
                                            value="{{ $sections['about']['title']->value_en ?? '' }}"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                        <input type="hidden" name="contents[2][section]" value="about">
                                        <input type="hidden" name="contents[2][key]" value="title">
                                        <input type="hidden" name="contents[2][type]" value="text">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">العنوان
                                            (بالعربية)</label>
                                        <input type="text" name="contents[2][value_ar]"
                                            value="{{ $sections['about']['title']->value_ar ?? '' }}"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                            dir="rtl">
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <h3 class="text-lg font-bold text-gray-700 mb-4">Company Description</h3>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Description
                                            (English)</label>
                                        <textarea name="contents[3][value_en]" rows="4"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $sections['about']['description']->value_en ?? '' }}</textarea>
                                        <input type="hidden" name="contents[3][section]" value="about">
                                        <input type="hidden" name="contents[3][key]" value="description">
                                        <input type="hidden" name="contents[3][type]" value="textarea">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">الوصف
                                            (بالعربية)</label>
                                        <textarea name="contents[3][value_ar]" rows="4"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                            dir="rtl">{{ $sections['about']['description']->value_ar ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Vision -->
                            <div>
                                <h3 class="text-lg font-bold text-gray-700 mb-4">Our Vision</h3>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Vision
                                            (English)</label>
                                        <textarea name="contents[4][value_en]" rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $sections['about']['vision']->value_en ?? '' }}</textarea>
                                        <input type="hidden" name="contents[4][section]" value="about">
                                        <input type="hidden" name="contents[4][key]" value="vision">
                                        <input type="hidden" name="contents[4][type]" value="textarea">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">الرؤية
                                            (بالعربية)</label>
                                        <textarea name="contents[4][value_ar]" rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                            dir="rtl">{{ $sections['about']['vision']->value_ar ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Mission -->
                            <div>
                                <h3 class="text-lg font-bold text-gray-700 mb-4">Our Mission</h3>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Mission
                                            (English)</label>
                                        <textarea name="contents[5][value_en]" rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $sections['about']['mission']->value_en ?? '' }}</textarea>
                                        <input type="hidden" name="contents[5][section]" value="about">
                                        <input type="hidden" name="contents[5][key]" value="mission">
                                        <input type="hidden" name="contents[5][type]" value="textarea">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">الرسالة
                                            (بالعربية)</label>
                                        <textarea name="contents[5][value_ar]" rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                            dir="rtl">{{ $sections['about']['mission']->value_ar ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Section -->
                    <div x-show="activeSection === 'services'" class="max-w-5xl">
                        <div class="bg-white rounded-xl shadow-sm p-8">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">Services Section</h2>
                                    <p class="text-sm text-gray-500">Services content will be added here</p>
                                </div>
                            </div>
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                <p class="text-gray-500">Services management coming soon...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div x-show="activeSection === 'contact'" class="max-w-5xl">
                        <div class="bg-white rounded-xl shadow-sm p-8">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">Contact Information</h2>
                                    <p class="text-sm text-gray-500">Manage contact details displayed on the website
                                    </p>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                        Phone Number
                                    </label>
                                    <input type="text" name="contents[6][value_en]"
                                        value="{{ $sections['contact']['phone']->value_en ?? '' }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                        placeholder="+966 XX XXX XXXX">
                                    <input type="hidden" name="contents[6][section]" value="contact">
                                    <input type="hidden" name="contents[6][key]" value="phone">
                                    <input type="hidden" name="contents[6][type]" value="phone">
                                    <input type="hidden" name="contents[6][value_ar]" value="">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Email Address
                                    </label>
                                    <input type="email" name="contents[7][value_en]"
                                        value="{{ $sections['contact']['email']->value_en ?? '' }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                        placeholder="info@joodharvest.com">
                                    <input type="hidden" name="contents[7][section]" value="contact">
                                    <input type="hidden" name="contents[7][key]" value="email">
                                    <input type="hidden" name="contents[7][type]" value="email">
                                    <input type="hidden" name="contents[7][value_ar]" value="">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Location / Google Maps Embed
                                    </label>
                                    <textarea name="contents[8][value_en]" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent font-mono text-sm"
                                        placeholder="Paste Google Maps embed code or enter address">{{ $sections['contact']['location']->value_en ?? '' }}</textarea>
                                    <p class="text-xs text-gray-500 mt-1">Enter address or paste Google Maps iframe
                                        embed code</p>
                                    <input type="hidden" name="contents[8][section]" value="contact">
                                    <input type="hidden" name="contents[8][key]" value="location">
                                    <input type="hidden" name="contents[8][type]" value="textarea">
                                    <input type="hidden" name="contents[8][value_ar]"
                                        value="{{ $sections['contact']['location']->value_ar ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Messages Section -->
                    <div x-show="activeSection === 'messages'" class="max-w-5xl">
                        <div class="bg-white rounded-xl shadow-sm p-8">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-800">Contact Messages</h2>
                                        <p class="text-sm text-gray-500">{{ $messages->count() }} total messages,
                                            {{ $unreadCount }} unread</p>
                                    </div>
                                </div>
                            </div>

                            @if ($messages->isEmpty())
                                <div class="text-center py-12">
                                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                    <p class="text-gray-500">No messages yet</p>
                                </div>
                            @else
                                <div class="space-y-4">
                                    @foreach ($messages as $message)
                                        <div
                                            class="border rounded-lg p-4 {{ $message->is_read ? 'bg-gray-50' : 'bg-red-50 border-red-200' }}">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="flex items-center space-x-3 mb-2">
                                                        <h3 class="font-bold text-gray-900">{{ $message->name }}</h3>
                                                        @if (!$message->is_read)
                                                            <span
                                                                class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">New</span>
                                                        @endif
                                                    </div>
                                                    <div class="text-sm text-gray-600 space-y-1 mb-3">
                                                        <p><svg class="w-4 h-4 inline mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                                </path>
                                                            </svg>{{ $message->email }}</p>
                                                        @if ($message->phone)
                                                            <p><svg class="w-4 h-4 inline mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                                    </path>
                                                                </svg>{{ $message->phone }}</p>
                                                        @endif
                                                        <p class="text-xs text-gray-500"><svg
                                                                class="w-4 h-4 inline mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>{{ $message->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <p class="text-gray-700 bg-white p-3 rounded border">
                                                        {{ $message->message }}</p>
                                                </div>
                                                <div class="flex flex-col space-y-2 ml-4">
                                                    @if (!$message->is_read)
                                                        <form method="POST"
                                                            action="{{ route('admin.messages.read', $message->id) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center space-x-1">
                                                                <svg class="w-4 h-4" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 13l4 4L19 7"></path>
                                                                </svg>
                                                                <span>Mark Read</span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <form method="POST"
                                                        action="{{ route('admin.messages.delete', $message->id) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this message?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center space-x-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
                                                            </svg>
                                                            <span>Delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Fixed Bottom Bar -->
                    <div
                        class="fixed bottom-0 right-0 left-0 md:left-64 bg-white border-t border-gray-200 px-6 py-4 z-10">
                        <div class="flex justify-between items-center max-w-5xl">
                            <div class="text-sm text-gray-500">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Changes will be applied to the live website
                            </div>
                            <button type="submit"
                                class="gradient-bg text-white px-8 py-3 rounded-lg font-bold shadow-lg hover:shadow-xl transition transform hover:scale-105 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>

</html>
