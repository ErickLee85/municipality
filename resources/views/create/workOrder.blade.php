<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Work Order') }}
        </h2>
    </x-slot>
   
   

        <form method="POST" action="/create/newWorkOrder">
            @csrf
            <div style="display:flex; justify-content:cener; flex-direction:column; align-items:center;">    
    
                <div class="text-center">
                    <x-input-label for="" :value="__('Description')" />
                    <textarea style="border-radius:10px;" class="mt-1" name="description" :value="old('description')" required autofocus  cols="50" rows="1"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>              

                <div class="text-center">
                    <x-input-label for="" :value="__('Address')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="address" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
    
                <div class="text-center">
                    <x-input-label for="" :value="__('Work Performed')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="work_performed" :value="old('work_performed')" cols="50" rows="1">
                    </textarea>
                    <x-input-error :messages="$errors->get('work_performed')" class="mt-2" />
                </div>

                <div class="text-center">
                    <x-input-label for="" :value="__('Notes')" />
                    <textarea style="border-radius:10px;  class=" mt-1" type="text" name="notes" :value="old('notes')" cols="50" rows="1">
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


                {{-- <div class="">

                    <x-input-label for="" :value="__('Priority')" />
                    <select type="switch" name="priority">
                        <option value=0>Low</option>
                        <option value=1>High</option>
                    </select> 
                </div> --}}

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
                    <button style="height: 55px; width:100px; color:white; background-color:blue; border-radius:10px; margin-top:10px;"> Submit </button>    
                </div>                    
        </div>
            
        </form>
   
    
</x-app-layout>