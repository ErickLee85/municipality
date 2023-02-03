<form name="myform" id ="myform" method="GET" action="/sortCustomers">
    Sort By:
    <select name="sort" onchange="submitForm()">
    <option selected disabled>--Alphabetical--</option>
    <option value="ascending">Ascending</option>
    <option value="descending">Descending</option>             
    </select>              
    </form>  