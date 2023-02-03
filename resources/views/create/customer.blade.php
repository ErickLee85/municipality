<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Customer') }}
        </h2>
        <x-flash-message/>
    </x-slot>
   
   

        <form method="POST" action="/create/customer">
            @csrf
            
    
            <div style="display:flex; justify-content:center; align-items:center; flex-direction:column; margin-top:25px; box-shadow: rgba(8, 8, 8, 0.749) 0px 3px 6px, rgba(0, 0, 0, 0.794) 0px 3px 6px; margin-left:15%; margin-right: 15%;">
                <div class="customerInput">
                    <x-input-label for="" :value="__('Customer Name')" />
                    <x-text-input type="text" class="mt-1" name="customer_name" :value="old('customer_name')" required autofocus />
                    <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                </div>

                <div class="customerInput">
                    <x-input-label for="" :value="__('Address')" />
                    <x-text-input type="text" class="mt-1" name="address" :value="old('address')" required autofocus />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="customerInput">
                    <x-input-label for="" :value="__('Phone Number')" />
                    <x-text-input type="tel" class="mt-1" name="phone_number" :value="old('phone_number')" required autofocus />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

              
                <div>
                    <button  style="height: 55px; width:100px; color:white; background-color:blue; border-radius:10px; margin-top:20px; margin-bottom:20px;"> Submit </button>    
                </div>      
            </div>                  
        
            
        </form>
   
    
</x-app-layout>