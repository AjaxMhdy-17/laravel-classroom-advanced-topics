<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upcoming Classes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-2xl divide-y">

                    @forelse ($bookings as $class)
                    <div class="py-6">
                        <div class="flex gap-6 justify-between">
                            <div>
                                <p class="text-2xl font-bold text-purple-700">{{ $class->classType->name }}</p>
                                <p class="text-sm">{{ $class->teacher->name }}</p>
                               
                            </div>
                            <div class="text-right flex-shrink-0">
                                <p class="text-lg font-bold">{{ $class->date_time->format('g:i a') }}</p>
                                <p class="text-sm">{{ $class->date_time->format('jS M') }}</p>
                            </div>
                        </div>
                        <div class="mt-1 text-right">
                            <form method="post" action="{{ route('booking.destroy',['id' => $class->id]) }}">
                                @csrf
                                @method('delete')
                                <x-danger-button onclick="return alert('Are you want to cancle this class')" class="px-3 py-1">Cancle</x-danger-button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div>
                        <p>No classes are scheduled. Check back later.</p>
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>