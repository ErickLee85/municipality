<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Work Order ') }}#{{$full_order->id}}
        </h2>
    </x-slot>

    <div>
        <table class="myTable">
            <tr>
                <th>Description</th>
                <th>Date Created</th>
                <th>Department</th>
                <th>Assigned Employee</th>
              </tr>
            
                <tr>           
                <td>{{$full_order->description}}</td>
                @php
                $time = strtotime($full_order->created_at)
                @endphp
                <td>{{date("M-d H:i:s", $time)}}
                    <p class="text-xs">
                        {{$full_order->created_at->diffForHumans()}}
                    </p>
                </td>
                    @if($full_order->water == 1)
                    <td>Water</td>
                    @elseif($full_order->gas == 1)
                    <td>Gas</td>
                    @elseif($full_order->sewer == 1)
                    <td>Sewer</td>
                    @elseif($full_order->street == 1)
                    <td>Street</td>
                    @endif
    
                @isset($assignedEmployee)
                <td>{{$assignedEmployee->name}}</td>
                @endisset
                @empty($assignedEmployee)
                <td>N/A</td>
                @endempty
                </tr>
                <tr>
                    <th>Address</th>
                    <th>Customer</th>
                    <th>Phone</th>            
                    <th>Work Performed</th>
                    {{-- <th>Complete</th> --}}
                </tr>
                <tr>
               @isset($customer)
               <td>{{$customer->address}}</td>
                <td>{{$customer->customer_name}}</td>   
                <td>{{$customer->phone_number}}</td>
                @endisset
                @empty($customer)
                <td>{{$full_order->address}}</td>
                <td>N/A</td>
                <td>N/A</td>
                @endempty
                @if($full_order->work_performed == null)
                <td>N/A</td>
                @else
                <td>{{$full_order->work_performed}}</td>
                @endif
                {{-- @if($full_order->complete == 0)
                <td>No</td>
                @else
                <td>Yes</td>
                @endif --}}
                
               
                    
                 </tr>
            
    
        </table>
    </div>
  
</x-app-layout>