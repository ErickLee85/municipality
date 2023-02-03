<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold">
            @if(Auth()->user()->is_admin == 0)
            <p>Total WorkOrders:  <span style="color:red;">{{$total}}</span></p>
            <p>Completed:  <span style="color:red;">{{$complete}}</span></p>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Welcome {{Auth()->user()->name }}
               
                </div>
              {{-- @livewire('testing') --}}
            </div>
        </div>
    </div>
</x-app-layout>
