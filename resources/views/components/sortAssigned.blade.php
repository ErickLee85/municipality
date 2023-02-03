<form name="myform" id ="myform" method="GET" action="/assignedWorkOrdersSort">
    Sort By:
    <select name="sort" onchange="submitForm()">
    <option selected disabled>--Date--</option>
    <option value="newest">Newest</option>
    <option value="oldest">Oldest</option>   
    <option disabled>--Complete--</option>   
    <option value=0>No</option>
    <option value=1>Yes</option>               
    </select>              
    </form>  