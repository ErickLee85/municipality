<div style="margin-top:10px;">
    <form name="myform" id ="myform" method="GET" action="/sort">
        <select name="sort" onchange="submitForm()">
        <option selected disabled>--Date--</option>
        <option value="newest">Newest</option>
        <option value="oldest">Oldest</option> 
        <option disabled>--Priority--</option>
        <option value=0>Low</option>
        <option value=1>High</option>
        <option disabled>--Department--</option>
        <option value="water">Water</option> 
        <option value="sewer">Sewer</option> 
        <option value="gas">Gas</option> 
        <option value="street">Street</option>                  
        </select>              
        </form>  
</div>