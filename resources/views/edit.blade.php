<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Work Order') }} #{{$work_order->id}}
        </h2>
    </x-slot>
   
   

        <form method="POST" action="/update/{{$work_order->id}}">
            @csrf
            @method('PUT')
            <div style="display:flex; justify-content:cener; flex-direction:column; align-items:center;">    
    
                <div class="text-center">
                    <x-input-label for="" :value="__('Description')" />
                    <textarea style="border-radius:10px;" class="mt-1" name="description" :value="old('description')" required autofocus  cols="50" rows="2">
                        {{$work_order->description}}
                    </textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>              

                <div class="text-center">
                    <x-input-label for="" :value="__('Address')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="address" cols="50" rows="2">
                        {{$work_order->address}}
                    </textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
    
                <div class="text-center">
                    <x-input-label for="" :value="__('Work Performed')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="work_performed" :value="old('work_performed')" cols="50" rows="2">
                        {{$work_order->work_performed}}
                    </textarea>
                    <x-input-error :messages="$errors->get('work_performed')" class="mt-2" />
                </div>

                <div class="text-center">
                    <x-input-label for="" :value="__('Notes')" />
                    <textarea style="border-radius:10px;" class="mt-1" name="notes" :value="old('notes')" autofocus  cols="50" rows="2">
                        {{$work_order->notes}}
                    </textarea>
                    <x-input-error :messages="$errors->get('notes')" class="mt-2" />
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
               
                @isset($current_customer)
                <div class="">
                    <x-input-label for="" :value="__('Customer')" />
                    <select name="customer">                      
                    <option selected value={{$current_customer->id}}>{{$current_customer->customer_name}}</option>                    
                    </select>
                </div>
                @endisset
                @empty($current_customer)
                <div class="">
                    <x-input-label for="" :value="__('Customer')" />
                    <select name="customer">
                        <option disabled selected>--Select--</option>
                        @forelse($customers as $customer)
                    <option value={{$customer->id}}>{{$customer->customer_name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                @endempty

                @if(Auth()->user()->is_admin == 1)
                <div class="">
                 <x-input-label for="" :value="__('Assign Employee')" /> 
                 <select type="switch" name="employee">
                     <option selected disabled>--Select--</option>
                     @forelse($employees as $employee)
                     <option value={{$employee->id}}>{{$employee->name}}</option>
                     @empty
                     @endforelse
                 </select> 
             </div> 
             @endif


                <div>
                    <p class="font-semibold">Priority</p>
                    <label class="switch" value="Priority">
                        <input type="checkbox" name="priority">
                        <span class="slider round"></span>
                      </label>
                </div>


                <div>
                    <p class="font-semibold">Complete</p>
                    <label class="switch" value="Priority">
                        <input type="checkbox" name="complete">
                        <span class="slider round"></span>
                      </label>
                </div>

                <div class="">
                    <button style="height: 55px; width:100px; color:white; background-color:blue; border-radius:10px; margin-top:25px;"> Submit </button>    
                </div>                    
        </div>
            
        </form>
   
    
</x-app-layout>