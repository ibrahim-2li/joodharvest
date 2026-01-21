{{-- User Info Section --}}
<div class="px-6 py-4 border-b border-gray-200">
    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
            <span class="text-green-700 font-bold text-lg">{{ substr(auth()->user()->name, 0, 1) }}</span>
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-500">
                {{ session('locale', 'en') === 'ar' ? 'مدير النظام' : 'Administrator' }}
            </p>
        </div>
    </div>
</div>
