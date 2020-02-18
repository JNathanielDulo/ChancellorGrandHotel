function counted(val) {
   x=document.getElementById("extend");
   y=x.elements["arrival"].value;

   a=document.getElementById("extend");
   b=a.elements["departure"].value;
   var totaldays = 0;
   var start = new Date(y),
   end = new Date(b),
   diff = 0,
   days = 1000 * 60 * 60 * 24;
   diff = end- start;
   console.log(Math.floor(diff / days) + " Days have Passed now");
   totaldays = diff / days;
   document.getElementById("days_counted").value = totaldays;
   total();
   balance();
}

function total(val){
    var old_price = document.getElementById("before_total").value;
    var sub_total = document.getElementById("sub_total").value;
    var days = document.getElementById("days_counted").value;

    total_cost = days * sub_total;
    document.getElementById("total_cost").value ="₱ "+ total_cost.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
    document.getElementById("total_cost_update").value = total_cost;
    update_total = parseInt(total_cost) + parseInt(old_price);
    document.getElementById("total_price").value = update_total;
}

function balance(){
    var balance = document.getElementById("balance").value;
    var total = document.getElementById("total_cost_update").value;

    payment = total - balance;
    document.getElementById("total_cost_update").value = payment;
    document.getElementById("total_cost").value ="₱ "+  payment.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
}
