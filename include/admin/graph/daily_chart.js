$(document).ready(function () {
	$.ajax({
		url: "graph/daily_data.php",
		type: "GET",
		success : function(data){
			var room = [];
			var occupied = [];
			var total = [];
			for(var i in data){
				room.push(data[i].room_name);
				occupied.push(data[i].occupied);
				total.push(data[i].total);
			}
			var chartdata = {
				labels: room,
				datasets: [{
					label: 'Most Occupied',
					borderColor : "#fff",
					borderWidth : "3",
					hoverBorderColor : "#000",
					backgroundColor: ["#f38b4a","#56d798","#ff8397","#6970d5"], 
					data: total
				}]
			}
			var ctx = $("#barRoom");
			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		}
	});
});
