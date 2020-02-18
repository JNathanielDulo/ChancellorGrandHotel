$(document).ready(function () {
  $.ajax({
    url: "graph/week_data.php",
    type: "GET",
    success : function(data){
      console.log(data);

      var week = [];
      var total = [];

      for(var i in data){
        week.push(data[i].week);
        total.push(data[i].total);
      }
        

      var chartProfit = {
        labels: week,
        datasets: [
          {
          label: "profit_cost",
          fill: true,
          lineTension: 0.1,
          borderColor: "rgba(30,144,255,1)",
          pointHoverBackgroundColor: "rgba(30,144,255,1)",
          pointHoverBorderColor: "rgba(30,144,255,1)",
          data: total
        }
      ]
    };
    var ctx = $("#weeklyChart");
    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartProfit
    });
  },
  });
});
