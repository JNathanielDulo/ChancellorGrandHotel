function setWalkin()
{
	var currentdatearrival = new Date();
	var shortdatearrival = currentdatearrival.toLocaleDateString();
	var currentdatedeparture = new Date();
	var shordatedeparture = currentdatedeparture.toLocaleDateString();
	document.getElementById("arrival").value = shortdatearrival;

	 x=document.getElementById("myForm");
	 y=x.elements["arrival"].value;

 	a=document.getElementById("myForm");
	b=a.elements["departure"].value;

	var total_days = 0;
        	var start = new Date(y),
         	end = new Date(b),
         	diff = 0,
       	 days = 1000 * 60 * 60 * 24;
        	diff = end- start;
        	total_days = diff/days;
        	console.log(total_days);
        	document.getElementById("days").value  = total_days;
        	total_accomodation();

}

function total_accomodation()
{
	var days = document.getElementById("days").value;
	var total_accom = document.getElementById("total_accomodation").value;
 	var discount = document.getElementById("discount").value;
 	

	total_days  = total_accom * days;
	total_discount = total_days * discount;
	final = parseInt(total_days) - parseInt(total_discount);
	document.getElementById("total_cost_value").value = final;
	document.getElementById("total_cost").value = final.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );

 }

 function total_payment()
 {

 	var clear_payment = 0;
 	var total_cost = document.getElementById("total_cost_value").value;
 	var payment = document.getElementById("payment").value;

 	clear_payment = total_cost - payment;
 	console.log(clear_payment);
 	if(payment > clear_payment)
 	{
 		document.getElementById("total_cost").value = "₱ 0.00";

 		console.log(Math.abs(clear_payment));
 		document.getElementById("change").value ="₱ "+ Math.abs(clear_payment).toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
 	}
 	else if(payment < clear_payment)
 	{	
 		toomuch = parseInt(total_cost) - parseInt(payment) ;
 		window.alert("Less than ₱"+ toomuch.toLocaleString(undefined,  { minimumFractionDigits: 2 }  ) + " that you input!");
 	}
 	else
 	{
 		document.getElementById("total_cost_value").value = clear_payment;
 		document.getElementById("total_cost").value = "₱ " + clear_payment.toLocaleString(undefined,  { minimumFractionDigits: 2 } );
 	}
 }

 function select()
 {
 	var e = document.getElementById("discount");
	var strUser = e.options[e.selectedIndex].value;
	var total_accom = document.getElementById("total_accomodation").value;
	var total_cost_value = document.getElementById("total_cost_value").value;

	senior = strUser * total_accom;
	senior_1 = total_cost_value - senior ;
	console.log(senior_1);

	if(strUser == .2)
	{
	document.getElementById("copy_guest").value = "Senior";
	document.getElementById("total_cost_value").value = senior_1;
	document.getElementById("total_cost").value ="₱ "+ senior_1.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
	}
	else
	{
		document.getElementById("copy_guest").value = "Regular";

	}

 }