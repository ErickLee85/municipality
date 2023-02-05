<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meter Work Order') }}
        </h2>
    </x-slot>
   
   

        <form method="POST" action="/store/MeterWorkOrder">
            @csrf
            <div style="display:flex; justify-content:cener; flex-direction:column; align-items:center;">    
    
                <div class="text-center">
                    <x-input-label for="" :value="__('Address')" />
                    <textarea style="border-radius:10px;" class="mt-1" name="address" :value="old('address')" required autofocus  cols="50" rows="1"></textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>              

                <div class="text-center">
                    <x-input-label for="" :value="__('Work Performed')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="work_performed" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('work_performed')" class="mt-2" />
                </div>
    
                <div class="text-center">
                    <x-input-label for="" :value="__('Old Meter #')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="old_meter_number" :value="old('old_meter_number')" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('old_meter_number')" class="mt-2" />
                </div>

                <div class="text-center">
                    <x-input-label for="" :value="__('Old Meter Reading')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="notes" :value="old('old_meter_reading')" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('old_meter_reading')" class="mt-2" />
                </div>

                <div class="text-center">
                    <x-input-label for="" :value="__('New Meter Number')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="notes" :value="old('new_meter_number')" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('new_meter_number')" class="mt-2" />
                </div>

                <div class="text-center">
                    <x-input-label for="" :value="__('New Meter Reading')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="notes" :value="old('new_meter_reading')" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('new_meter_reading')" class="mt-2" />
                </div>

                <div class="text-center">
                    <x-input-label for="" :value="__('New RR Number')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="notes" :value="old('new_radio_number')" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('new_radio_number')" class="mt-2" />
                </div>
            </div>

        <div class="wrapper"> 
                <div class="">
                    <x-input-label for="" :value="__('Department')" />
                    <select name="department">
                        <option selected disabled>--Select--</option>
                        @foreach ($departments as $department)
                        <option value={{$department->department}}>{{$department->department}}</option>
                        @endforeach
                    </select> 
                </div>
               

                <div class="">
                    <x-input-label for="" :value="__('Customer')" />
                    <select name="customer">
                        <option selected disabled>--Select--</option>
                        @forelse($customers as $customer)
                    <option value={{$customer->id}}>{{$customer->customer_name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>

             

              

               

                <div>
                    <p class="font-semibold">Complete</p>
                    <label class="switch" value="Priority">
                        <input type="checkbox" name="complete">
                        <span class="slider round"></span>
                      </label>
                </div>

                <div class="">
                    <button style="height: 55px; width:100px; color:white; background-color:blue; border-radius:10px; margin-top:10px;"> Submit </button>    
                </div>                    
        </div>
            
        </form>
   
    
</x-app-layout>