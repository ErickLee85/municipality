<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Work Order') }}                 
        </h2>
    </x-slot>

    <div class="mt-10" style="display:flex; flex-direction:column; justify-content:center; align-items:center; margin-top:25px;">
        <h1 class="font-semibold pb-5">Are you sure you want to delete this Work Order?</h1>
       
       <div style="margin-top:20px;">
        <form method="POST" action="manage/{{$work->id}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="font-semibold mb-5" style="font-weight:900; color:red;">Yes</button>
        </form>
        @if(Auth()->user()->is_admin == 1)
        <a href="/adminManage" style="margin-top: 25px;">No</a>
        @else
        <a href="/manage">No</a>
        @endif
       </div>
    </div>

</x-app-layout>