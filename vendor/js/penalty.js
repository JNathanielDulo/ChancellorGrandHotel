function setPenalty()
{
	var currentdatearrival = new Date();
	var shortdatearrival = currentdatearrival.toLocaleDateString();
	var currentdatedeparture = new Date();
	var shordatedeparture = currentdatedeparture.toLocaleDateString();	

	document.getElementById("date_now").value = shordatedeparture;
	
	 x=document.getElementById("penalty");
	 y=x.elements["departure"].value;

 	a=document.getElementById("penalty");
	b=a.elements["date_now"].value;
	var total_days = 0;
        	var start = new Date(y),
         	end = new Date(b),
         	diff = 0,
       	 days = 1000 * 60 * 60 * 24;
        	diff = end- start;
        	total_days = diff/days;
        	if(total_days > 0)
        	{	

        		document.getElementById("days_counted").value = total_days;
	   	 document.getElementById("departure").style.borderColor = "tomato";
	   	 document.getElementById("departure").style.color = "tomato";
	   	 document.getElementById("label_departure").style.borderColor = "tomato";
	   	 document.getElementById("label_departure").style.color = "tomato";
        		var days =  document.getElementById("days_counted").value;
        		var sub =  document.getElementById("sub_total").value;
        		
        		total_penalty = days * sub;
        		document.getElementById("total_penalty").value = total_penalty;
        		document.getElementById("total_penalty_cost").innerHTML ="₱ "+ total_penalty.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
        			
        	}
        	else
        	{
        		document.getElementById("total_penalty").value = 0;
        		document.getElementById("total_penalty_cost").innerHTML ="₱ "+  0+".00";
        	}

}