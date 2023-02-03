@if(session()->has('message'))

<div x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="animate-pulse fixed top-0 text-center bg-indigo-500 text-white px-48 py-3 w-screen">
    <p>
        {{session('message')}}
    </p>
</div>

@endif