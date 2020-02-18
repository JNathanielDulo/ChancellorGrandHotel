$(document).ready(function() {
	$('#dateFilter').click(function(){
		var from = $('#arrival').val();
		var to = $('#departure').val();
		if(from == "" && to == "") {
			alert("Both Fields are Required")
		} else {
			document.getElementById("print_reports").href="print_report.php?from="+from+"&to="+to+"";
			$.ajax({
				url: "http://localhost/seorabeol95/include/admin/php/daily.php?from="+from+"&to="+to+"",
				method: "GET",
				dataType: "JSON",
				success:function(data){
					var body = '';
					var sub= 0;
					for(var i = 0; i<data.length; i++) {
						sub = data[i].total_cost;
						body+='<tr>';
						body+='<td style="font-weight: 300">'+data[i].customer_no+'</td>';
						body+='<td style="font-weight: 300">'+data[i].fname+' '+ data[i].lname +'</td>';
						body+='<td style="font-weight: 300">'+data[i].contact+'</td>';
						body+='<td style="font-weight: 300">'+data[i].adult+'</td>';
						body+='<td style="font-weight: 300">'+data[i].child+'</td>';
						body+='<td style="font-weight: 300">'+data[i].arrival_date+'</td>';
						body+='<td style="font-weight: 300">'+data[i].departure_date+'</td>';
						body+='<td style="font-weight: 300">'+sub.toLocaleString(undefined,  { minimumFractionDigits: 2 }  )+'</td>';
						body+='</tr>';
					} $('#reports_daily').html(body);
					alert("Fetch Succesfully!")
				}
			});
		}
	});
});