<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
           <div style="display:flex; flex-direction:column; justify-content:ceneter; align-items:center;">
            <x-customerSearch />  
            <x-sortCustomers />             
            </div>       
        </h2>

        
    </x-slot>

    
    <table class="myTable">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th> 
          </tr>
          @forelse($customers as $customer)
            <tr>           
                <td>{{$customer->customer_name}}</td>
                <td>{{$customer->phone_number}}</td>
                <td>{{$customer->address}}</td>
             </tr>
             @empty
             @endforelse
    </table>
    

</x-app-layout>