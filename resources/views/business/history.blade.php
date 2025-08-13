<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notification History
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @forelse($history as $item)
                        <div class="border-b pb-4 mb-4 last:border-b-0">

                            <div class="flex justify-between items-start">
                                <div>
                                    <h4><span class="text-sm text-gray-500">Name:</span> <span class="font-medium">{{ $item->customer->name }}</span></h4>
                                    <p><span class="text-sm text-gray-500">Phone:</span> <span class="text-gray-600 text-sm">{{ $item->customer->phone }}</span></p>
                                    <p><span class="text-sm text-gray-500">Service:</span> <span class="text-sm font-medium">{{ $item->service }}</span></p>
                                </div>
                                <div class="text-right text-sm text-gray-500">
                                    {{ $item->updated_at->format('d/m/Y H:i') }}
                                </div>

                            </div>
                            <form action="/historyDelete/{{$item->id}}" method="post">
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </div>

                    @empty
                        <p class="text-gray-500">No notifications sent yet.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
