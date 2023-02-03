<form action="/customers">
    <div class="relative m-4 rounded-lg max-w-xs mx-auto mb-5" style="display:flex;">
    <x-text-input
    type="text"
    name="search"
    title="Search by name, address or phone number"
    class="h-10 w-8/12 pl-10 pr-20 text-black rounded-md z-0 focus:shadow focus:outline-none"
    placeholder="Search..."
    style="flex:1;"/>
    <button type="submit" style="color:rgb(255, 255, 255); font-weight:bold; height:41px; width:75px; background-color:rgb(60, 0, 255); border-radius:5px;">Submit</button>
    </div>   
</form>