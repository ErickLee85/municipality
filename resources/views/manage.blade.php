<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage') }}
        </h2>

        <div style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
            @if(Auth()->user()->is_admin == 1)
            <x-searchManage /> <x-sortManage />
            @else
            <x-searchEmployee /> <x-sortEmployee />
            @endif
        </div>


    </x-slot>
    @if(session()->has('message'))
    <div class="text-red-700 text-sm text-center mt-10 font-weight-bold">
        <p>
            {{session('message')}}
        </p>
    </div>
    @endif
  

    <table class="myTable">
        <tr>
            <th>Description</th>
            <th>Date Created</th>
            <th>Complete</th>
            @if(Auth()->user()->is_admin == 1)
            <th>Delete</th>
            @endif
            <th>Edit</th>
          </tr>
          @forelse($work_order as $work)
            <tr>           
            <td>{{$work->description}}</td>
            @php
            $time = strtotime($work->created_at)
            @endphp
            <td>{{date("M-d H:i:s", $time)}}
            <p class="text-xs"> {{$work->created_at->diffForHumans()}}</p>
            </td>  
            @if($work->complete == 0)
            <td style="color:red; font-weight:bold;">No</td>
            @else
            <td style="color:blue; font-weight:bold;">Yes</td>
            @endif
            
            @if(Auth()->user()->is_admin == 1)
            <td>
                <form method="GET" action="areYouSure/{{$work->id}}">
                    @csrf
                    <button type="submit" class="text-red-700 font-semibold">Delete</button>
                </form></td> 
            @endif
            
            <td>
                  <a href="edit/{{Crypt::encrypt($work->id)}}" class="font-semibold text-green-700">Edit</a>
            </td>     
             </tr>
        @empty
        @endforelse

    </table>
    

   

</x-app-layout>