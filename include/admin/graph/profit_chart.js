$(document).ready(function () {
  $.ajax({
    url: "graph/profit_data.php",
    type: "GET",
    success : function(data){
      console.log(data);

      var year = [];
      var month = [];
      var total = [];

      for(var i in data){
        year.push(data[i].year);
        month.push(data[i].month);
        total.push(data[i].total);
      }
      var month1 = new Array();
        month1[0] = "January";
        month1[1] = "February";
        month1[2] = "March";
        month1[3] = "April";
        month1[4] = "May";
        month1[5] = "June";
        month1[6] = "July";
        month1[7] = "August";
        month1[8] = "September";
        month1[9] = "October";
        month1[10] = "November";
        month1[11] = "December";
        

      var chartProfit = {
        labels: month = month1,
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
    var ctx = $("#lineChart");
    var LineGraph = new Chart(ctx, {
      type: 'line',
      data: chartProfit
    });
  },
  });
});
