@props(['messages', 'unreadCount'])

{{-- Messages Section --}}
<div x-show="activeSection === 'messages'" class="max-w-5xl">
    <div class="bg-white rounded-xl shadow-sm p-8">
        {{-- Section Header --}}
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Contact Messages</h2>
                    <p class="text-sm text-gray-500">{{ $messages->count() }} total messages, {{ $unreadCount }} unread
                    </p>
                </div>
            </div>
        </div>

        @if ($messages->isEmpty())
            {{-- Empty State --}}
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                    </path>
                </svg>
                <p class="text-gray-500">No messages yet</p>
            </div>
        @else
            {{-- Messages List --}}
            <div class="space-y-4">
                @foreach ($messages as $message)
                    <div
                        class="border rounded-lg p-4 {{ $message->is_read ? 'bg-gray-50' : 'bg-green-50 border-green-200' }}">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                {{-- Name & Badge --}}
                                <div class="flex items-center space-x-3 mb-2">
                                    <h3 class="font-bold text-gray-900">{{ $message->name }}</h3>
                                    @if (!$message->is_read)
                                        <span
                                            class="bg-green-700 text-white text-xs font-bold px-2 py-1 rounded-full">New</span>
                                    @endif
                                </div>

                                {{-- Contact Info --}}
                                <div class="text-sm text-gray-600 space-y-1 mb-3">
                                    <p>
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>{{ $message->email }}
                                    </p>
                                    @if ($message->phone)
                                        <p>
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                </path>
                                            </svg>{{ $message->phone }}
                                        </p>
                                    @endif
                                    <p class="text-xs text-gray-500">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>{{ $message->created_at->diffForHumans() }}
                                    </p>
                                </div>

                                {{-- Message Content --}}
                                <p class="text-gray-700 bg-white p-3 rounded border">{{ $message->message }}</p>
                            </div>

                            {{-- Actions --}}
                            <div class="flex flex-col space-y-2 ml-4">
                                @if (!$message->is_read)
                                    <form method="POST" action="{{ route('admin.messages.read', $message->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Mark Read</span>
                                        </button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('admin.messages.delete', $message->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-green-700 hover:text-green-900 text-sm font-medium flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
