function setWalkin() {
	var currentdatearrival = new Date();
	var shortdatearrival = currentdatearrival.toLocaleDateString();
	var currentdatedeparture = new Date();
	var shordatedeparture = currentdatedeparture.toLocaleDateString();
	document.getElementById("arrival").value = shortdatearrival;

	 x=document.getElementById("myForm");
	 y=x.elements["arrival"].value;

 	a=document.getElementById("myForm");
	b=a.elements["departure"].value;
	var zero = 0;
	var total = document.getElementById('price').value;
	var total_days = 0;
        	var start = new Date(y),
         	end = new Date(b),
         	diff = 0,
       	 days = 1000 * 60 * 60 * 24;
        	diff = end- start;
        	total_days = diff/days;
        	console.log(total_days);
        	document.getElementById("days").value  = total_days;
        	zero = total * total_days;
        	document.getElementById('output_price').innerHTML = 'Total: P'+ zero.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
        	document.getElementById('total_cost_value').value = zero;
}
function changeMoney() {
	var minus = 0;
	var total = document.getElementById('total_cost_value').value;
	var payment = document.getElementById('payment').value;
	minus = payment - total; 
	document.getElementById('change').value = minus.toLocaleString(undefined,  { minimumFractionDigits: 2 }  )
}