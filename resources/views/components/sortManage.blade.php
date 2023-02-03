<form name="myform" id ="myform" method="GET" action="/sortManage">
    Sort By:
    <select name="sort" onchange="submitForm()">
    <option selected disabled>--Date--</option>
    <option value="newest">Newest</option>
    <option value="oldest">Oldest</option>   
    <option disabled>--Complete--</option>   
    <option value=0>No</option>
    <option value=1>Yes</option>    
    <option disabled>--Department--</option>
    <option value="water">Water</option> 
    <option value="sewer">Sewer</option> 
    <option value="gas">Gas</option> 
    <option value="street">Street</option>            
    </select>              
    </form>  