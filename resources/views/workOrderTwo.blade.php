<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Work Order ') }} {{$full_order->id}}
        </h2>
    </x-slot>

   
    <div class="py-5 text-center" style="display:flex; justify-content:center; margin-top:20px;">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
                        <h1 class="text-red-600 text-xl">{{$full_order->description}} </h1>
                        <p>{{$full_order->address}}</p>
                        <p>{{$full_order->work_performed}}</p>      
                        @if($full_order->priority == 1) 
                        <p class="font-semibold">Priority: <span  class="text-red-600">High</span></p>
                        @else
                        <p class="">Priority: Low</p>
                        @endif
                        
                        @php
                        $time = strtotime($full_order->created_at)
                        @endphp
                        <p class="">Created: <span>{{date("M-d H:i:s", $time)}}</span></p>
                        
             
                        
                </div>
            </div>
    </div>
  
</x-app-layout>