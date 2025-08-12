<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Waiting List - {{ auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{--form--}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Add Customer</h3>

                    <form action="{{ route('dashboard.add') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text"
                                       name="name"
                                       required
                                       class="mt-1 block w-full border-gray-300 rounded-md"
                                       placeholder="Customer name">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text"
                                       name="phone"
                                       required
                                       class="mt-1 block w-full border-gray-300 rounded-md"
                                       placeholder="Phone number">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Service</label>
                                <input type="text"
                                       name="service"
                                       required
                                       class="mt-1 block w-full border-gray-300 rounded-md"
                                       placeholder="Haircut, Beard, etc">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Add to List
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{--waiting list--}}
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Waiting List</h3>
                @forelse($waitingList as $waiting)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg mb-3 border">
                        <div>
                            <h4 class="font-semibold text-lg">{{ $waiting->customer->name }}</h4>
                            <p class="text-gray-600">📱 {{ $waiting->customer->phone }}</p>
                            <p class="text-blue-600">🔧 {{ $waiting->service }}</p>
                        </div>

                        <div>
                            <form action="{{route('notify', $waiting->id)}}" method="post">
                                @csrf
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                                    📤 Notify
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No customers waiting</p>
                @endforelse
            </div>





        </div>
    </div>

    {{--msgs--}}
    @if(session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif
</x-app-layout>
