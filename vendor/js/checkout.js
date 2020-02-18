function damage(){
	var checkedValue = 0; 
	var num = 0;
	var inputElements = document.getElementsByClassName('item_damage');
	for(var i=0;  inputElements[i]; i++)
	{
	 	if(inputElements[i].checked)
	 	{
	 		var value  = inputElements[i].value;
	 		num += Number(inputElements[i].value);
	 		document.getElementById("total_damage").innerHTML ="₱ "+   num.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
	 		document.getElementById("damage_payment").value = num;
	 	}     
	 	else
	 	{
	 		document.getElementById("total_damage").innerHTML ="₱ "+   num.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
	 		document.getElementById("damage_payment").value = num;

	 	}
	}
	total();
	total_payment();
	total_qwe();
}
function total_qwe(){

	var recipeElements = document.getElementsByClassName("item_damage");
	var num1 = 0;
		for(var j=0;  recipeElements[j]; j++)
		{
		 	if(recipeElements[j].checked)
		 	{
	 		var value1  = recipeElements[j].value;
	 		num1 += Number(recipeElements[j].value);
	 		document.getElementById("recipe_damage_total").innerHTML ="Total Damage: ₱ "+   num1.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );	
	 	}
}
}
function total(){
	    var damages = document.getElementById("damages");
	    damages.innerHTML = "";
	    var reciept_damage = document.getElementById("reciept_damage");
	    reciept_damage.innerHTML = "";
	     var array = $("fieldset.check input:checked").next('label').map(function(){
	         return $(this).text();
	     }).get();

	     //Show the array.
	     for (var i = 0; i < array.length; i++) {
	         console.log(array[i]);

	                var output1 = document.createElement("li");
	                var output = document.createElement("li");
		   output.innerHTML = array[i];
		   damages.appendChild(output);

		   output1.innerHTML = array[i];
		   reciept_damage.appendChild(output1);
	     }
}

function total_payment(){
	var total_cost = 0;
	var damage_payment = document.getElementById("damage_payment").value;
	var balance = document.getElementById("balance").value;
	var old_cost = document.getElementById("old_cost").value;

	total_cost = parseInt(damage_payment) + parseInt(balance);
	document.getElementById("total_balance").value = total_cost;
	document.getElementById("old_balance").value ="₱ "+    total_cost.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );

	new_cost = parseInt(old_cost) + parseInt(total_cost);
	document.getElementById("qwe").value = new_cost;
	document.getElementById("costing").innerHTML ="₱ "+    new_cost.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
	document.getElementById("costing_value").value = new_cost;
	document.getElementById("recipe_total").innerHTML ="Total Cost: ₱ "+    new_cost.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );

}

function pay_balance(){
	var equ = 0;
	var balance = document.getElementById("balance").value;
	var payment = document.getElementById("payment").value;
	var total_balance = document.getElementById("total_balance").value


	equ = total_balance  - payment;
	if(Number(total_balance) < Number(payment))
	{
		document.getElementById("payment").style.borderColor = "tomato";
		document.getElementById("payment").style.color = "tomato";
		document.getElementById("label_payment").style.borderColor = "tomato";
		document.getElementById("label_payment").style.color = "tomato";
		toomuch = parseInt(payment) - parseInt(total_balance);
		window.alert("More than ₱"+ toomuch.toLocaleString(undefined,  { minimumFractionDigits: 2 }  ) + " that you input!");
	}
	else if(Number(total_balance) > Number(payment))
	{
	document.getElementById("payment").style.borderColor = "tomato";
	document.getElementById("payment").style.color = "tomato";
	document.getElementById("label_payment").style.borderColor = "tomato";
	document.getElementById("label_payment").style.color = "tomato";
	toomuch = parseInt(total_balance) - parseInt(payment);
	window.alert("Less than ₱"+ toomuch.toLocaleString(undefined,  { minimumFractionDigits: 2 }  ) + " that you input!");
	}
	else
	{
	document.getElementById("official_pay").value = equ;
	document.getElementById("old_balance").value = "₱ "+    equ.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );		
	document.getElementById("payment").style.borderColor = "#2ad1a3";
	document.getElementById("payment").style.color = "#2ad1a3";
	document.getElementById("label_payment").style.borderColor = "#2ad1a3";
	document.getElementById("label_payment").style.color = "#2ad1a3";
	}
}

function setPenalty() {
	var currentdatearrival = new Date();
	var shortdatearrival = currentdatearrival.toLocaleDateString();
	var currentdatedeparture = new Date();
	var shordatedeparture = currentdatedeparture.toLocaleDateString();

	document.getElementById("overtime").value = shordatedeparture;

	 x=document.getElementById("penalty");
	 y=x.elements["departure"].value;

 	a=document.getElementById("penalty");
	b=a.elements["overtime"].value;
	var total_days = 0;
        	var start = new Date(y),
         	end = new Date(b),
         	diff = 0,
       	 days = 1000 * 60 * 60 * 24;
        	diff = end- start;
        	total_days = diff/days;
        	if(total_days > 0)
        	{
   	 console.log(Math.floor(total_days) + " Days have Passed now");
   	 document.getElementById("days_counted").value  = total_days;
   	 document.getElementById("departure").style.borderColor = "tomato";
   	 document.getElementById("departure").style.color = "tomato";
   	 document.getElementById("label_departure").style.borderColor = "tomato";
   	 document.getElementById("label_departure").style.color = "tomato";

   	 var days_penalty = document.getElementById("days_penalty").value;
   	 var days_counted = document.getElementById("days_counted").value;

   	 penalty = days_penalty * days_counted;
   	 document.getElementById("total_penalty").value = penalty;
   	 document.getElementById("view_penalty").innerHTML = "₱ "+    penalty.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
   	 document.getElementById("recipe_penalty").innerHTML = "Penalty:₱ "+    penalty.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );

   	}
   	else
   	{
   		document.getElementById("days_counted").value = 0;
   		document.getElementById("total_penalty").value = 0;
   		document.getElementById("view_penalty").innerHTML = "₱ "+  0+".00";
   		document.getElementById("recipe_penalty").innerHTML = "Penalty: ₱ "+  0+".00";
   	}

}
     function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=900');

    mywindow.document.write('<html><head><meta charset="utf-8"><title>' + ""  + '</title>');
    mywindow.document.write('</head><body  style="font-family:Merchant Copy">');
    mywindow.document.write('<table style="border:1px dashed black;" align="center">' + document.getElementById("elem").innerHTML + '</table>');
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
