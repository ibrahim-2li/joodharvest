@props(['sections'])

{{-- Hero Section Form --}}
<div x-show="activeSection === 'hero'" class="max-w-5xl">
    <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="active_section" value="hero">
        <div class="bg-white rounded-xl shadow-sm p-8 space-y-6">
            {{-- Section Header --}}
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        {{ session('locale', 'en') === 'ar' ? 'محتوى قسم الHero ' : 'Hero Section Content' }}
                    </h2>
                    <p class="text-sm text-gray-500">
                        {{ session('locale', 'en') === 'ar' ? 'نص اللافتة الرئيسية المعروض على الصفحة' : 'Main banner text displayed on homepage' }}
                    </p>
                </div>
            </div>

            {{-- Title Fields --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Title (English)</label>
                    <input type="text" name="contents[0][value_en]"
                        value="{{ $sections['hero']['title']->value_en ?? '' }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    <input type="hidden" name="contents[0][section]" value="hero">
                    <input type="hidden" name="contents[0][key]" value="title">
                    <input type="hidden" name="contents[0][type]" value="text">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">العنوان (بالعربية)</label>
                    <input type="text" name="contents[0][value_ar]"
                        value="{{ $sections['hero']['title']->value_ar ?? '' }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                        dir="rtl">
                </div>
            </div>

            {{-- Description Fields --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description (English)</label>
                    <textarea name="contents[1][value_en]" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">{{ $sections['hero']['description']->value_en ?? '' }}</textarea>
                    <input type="hidden" name="contents[1][section]" value="hero">
                    <input type="hidden" name="contents[1][key]" value="description">
                    <input type="hidden" name="contents[1][type]" value="textarea">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">الوصف (بالعربية)</label>
                    <textarea name="contents[1][value_ar]" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                        dir="rtl">{{ $sections['hero']['description']->value_ar ?? '' }}</textarea>
                </div>
            </div>

            {{-- Hero Image Upload --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Hero Floating Image
                </label>
                <div class="mt-2">
                    @if (isset($sections['hero']['image']) && $sections['hero']['image']->value_en)
                        <div class="mb-4">
                            <img src="{{ asset($sections['hero']['image']->value_en) }}" alt="Current Hero Image"
                                class="w-full max-w-md rounded-lg shadow-md">
                            <p class="text-xs text-gray-500 mt-2">Current image</p>
                        </div>
                    @endif
                    <input type="file" name="hero_image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-800 hover:file:bg-green-100">
                    <p class="text-xs text-gray-500 mt-2">Recommended: 1920x1080px. Max size: 5MB. Formats: JPG, PNG,
                        GIF, WebP</p>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center justify-end pt-6 border-t border-gray-200">
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg font-bold shadow-lg flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('locale', 'en') === 'ar' ? 'حفظ قسم الHero ' : 'Save Hero Section' }}</span>
                </button>
            </div>
        </div>
    </form>
</div>
