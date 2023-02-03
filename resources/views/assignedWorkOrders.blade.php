<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth()->user()->name}}'s {{ __('Work Orders') }}
            {{-- <p>Total: {{$total}}</p>
            <p>Completed: {{$complete}}</p> --}}
            <div style="display:flex; flex-direction:column; justify-content:center; align-items:center;">

                <x-searchAssigned /> <span> <x-sortAssigned /></span>
            </div>
           
            
         
                  
        </h2>
    </x-slot>

    
    <table class="myTable">
        <tr>
            <th>Description</th>
            <th>Complete</th>
            <th>Date Created</th>
            <th>Priority</th>
            <th>Details</th>
          </tr>
          @forelse($work_order as $work)
            <tr>           
            <td>{{$work->description}}</td>
            @if($work->complete == 0)
            <td style="color:red; font-weight:bold;">No</td>
            @else
            <td style="color:blue; font-weight:bold;">Yes</td>
            @endif  
            @php
            $time = strtotime($work->created_at)
            @endphp
            <td>{{date("M-d H:i:s", $time)}}
                <p class="text-xs">{{$work->created_at->diffForHumans()}}</p>
            </td>
            @if($work->priority == 0)
            <td style="color:blue; font-weight:bold;">Low</td>
            @else
            <td style="color:red; font-weight:bold;">High</td>
            @endif 
             
            <td>
                <a href="/fullWorkOrder/{{$work->id}}/{{$work->customer_id}}">
                <i class="fa-solid fa-arrow-right-long"></i></td>     
                </a>
             </tr>
        @empty
        @endforelse

    </table>
   
   

</x-app-layout>