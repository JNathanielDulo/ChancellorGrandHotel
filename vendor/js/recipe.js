function counted(val) {
     x=document.getElementById("form1");
    y=x.elements["arrival"].value;

    a=document.getElementById("form1");
    b=a.elements["departure"].value;
   
        var start = new Date(y),
         end = new Date(b),
         diff = 0,
        days = 1000 * 60 * 60 * 24;
        diff = end- start;
        console.log(Math.floor(diff / days) + " Days have Passed now");
        totaldays = diff / days;
         document.getElementById("days_counted").value = totaldays;
        recipe();
}


function recipe(val) {
    var total = 0;
    var totaldays = document.getElementById("days_counted").value;
    var room = document.getElementById("total_room").value;
    var item = document.getElementById("total_item").value;
    var discount = document.getElementById("discount").value;


    total = room * totaldays + parseInt(item);
    total_final = total * discount;
    total_last = total - total_final;

    document.getElementById("total_cost").value = total_last;
    
    document.getElementById("total_cost_text").innerHTML ="₱"+ total_last.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
    document.getElementById("total_cost_amount").value = total_last.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
       
}