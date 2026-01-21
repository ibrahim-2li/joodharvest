@props(['sections'])

{{-- About Section Form --}}
<div x-show="activeSection === 'about'" class="max-w-5xl">
    <form method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="active_section" value="about">
        <div class="bg-white rounded-xl shadow-sm p-8 space-y-8">
            {{-- Section Header --}}
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">About Section Content</h2>
                    <p class="text-sm text-gray-500">Company information, vision, and mission</p>
                </div>
            </div>

            {{-- Title --}}
            <div>
                <h3 class="text-lg font-bold text-gray-700 mb-4">Section Title</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Title (English)</label>
                        <input type="text" name="contents[2][value_en]"
                            value="{{ $sections['about']['title']->value_en ?? '' }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">
                        <input type="hidden" name="contents[2][section]" value="about">
                        <input type="hidden" name="contents[2][key]" value="title">
                        <input type="hidden" name="contents[2][type]" value="text">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">العنوان (بالعربية)</label>
                        <input type="text" name="contents[2][value_ar]"
                            value="{{ $sections['about']['title']->value_ar ?? '' }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                            dir="rtl">
                    </div>
                </div>
            </div>

            {{-- Description --}}
            <div>
                <h3 class="text-lg font-bold text-gray-700 mb-4">Company Description</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Description (English)</label>
                        <textarea name="contents[3][value_en]" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">{{ $sections['about']['description']->value_en ?? '' }}</textarea>
                        <input type="hidden" name="contents[3][section]" value="about">
                        <input type="hidden" name="contents[3][key]" value="description">
                        <input type="hidden" name="contents[3][type]" value="textarea">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">الوصف (بالعربية)</label>
                        <textarea name="contents[3][value_ar]" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                            dir="rtl">{{ $sections['about']['description']->value_ar ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Vision --}}
            <div>
                <h3 class="text-lg font-bold text-gray-700 mb-4">Our Vision</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Vision (English)</label>
                        <textarea name="contents[4][value_en]" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">{{ $sections['about']['vision']->value_en ?? '' }}</textarea>
                        <input type="hidden" name="contents[4][section]" value="about">
                        <input type="hidden" name="contents[4][key]" value="vision">
                        <input type="hidden" name="contents[4][type]" value="textarea">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">الرؤية (بالعربية)</label>
                        <textarea name="contents[4][value_ar]" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                            dir="rtl">{{ $sections['about']['vision']->value_ar ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Mission --}}
            <div>
                <h3 class="text-lg font-bold text-gray-700 mb-4">Our Mission</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Mission (English)</label>
                        <textarea name="contents[5][value_en]" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent">{{ $sections['about']['mission']->value_en ?? '' }}</textarea>
                        <input type="hidden" name="contents[5][section]" value="about">
                        <input type="hidden" name="contents[5][key]" value="mission">
                        <input type="hidden" name="contents[5][type]" value="textarea">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">الرسالة (بالعربية)</label>
                        <textarea name="contents[5][value_ar]" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-600 focus:border-transparent"
                            dir="rtl">{{ $sections['about']['mission']->value_ar ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center justify-end pt-6 border-t border-gray-200">
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg font-bold shadow-lg flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    <span>{{ session('locale', 'en') === 'ar' ? 'حفظ قسم من نحن' : 'Save About Section' }}</span>
                </button>
            </div>
        </div>
    </form>
</div>
