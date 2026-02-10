<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">الإشعارات</h2>

    @foreach($notifications as $notification)
        <div class="p-4 mb-2 rounded-lg border {{ $notification->read_at ? 'bg-gray-100' : 'bg-blue-50 border-blue-200' }}">
            <div class="flex justify-between items-center">
                <div>
                    <!-- الوصول للبيانات المخزنة في الـ Array -->
                    <p class="font-semibold text-gray-800">
                        {{ $notification->data['message'] ?? 'إشعار جديد' }}
                    </p>
                    <small class="text-gray-500">
                        رقم الحجز: #{{ $notification->data['reservation_id'] }}
                    </small>
                    <p class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</p>
                </div>

                @if(!$notification->read_at)
                    <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm bg-blue-500 text-white px-3 py-1 rounded">
                            Mark as Read
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    @if($notifications->isEmpty())
        <p class="text-gray-500" dir="rtl"> aucune notification.</p>
    @endif
</div>