function dateReady(){
var currentdatearrival = new Date();
var shortdatearrival = currentdatearrival.toLocaleDateString();
var currentdatedeparture = new Date();
var date = new Date();
date.setDate(date.getDate() + 1);
var short =date.toLocaleDateString();

    document.getElementById("arrival").value = shortdatearrival;
     document.getElementById("departure").value = short;

}

function selectItem(){ 
  var num = 0;
  var inputElements = document.getElementsByClassName('item_damage');
  var quantity_item = document.getElementById("quantity_item").value;
  var hidden_total = document.getElementById("hidden_total").value;

  for(var i=0;  inputElements[i]; i++)
  {
    if(inputElements[i].checked)
    {
      var value  = inputElements[i].value;
      num += Number(inputElements[i].value);
      quan = num * quantity_item;
      console.log(quantity_item)
      console.log(quan);
      document.getElementById("hidde_total_item").value = quan;
    }
    else
    {
      console.log(num);
      document.getElementById("hidde_total_item").value = num;
    }
  }
  total_item_function();
  item_post();
}
function item_post(){
      var item = document.getElementById("item_name");
      item.innerHTML = "";

       var array = $(':checkbox:checked').map(function() {
    return [ $(this).next('label').text() ];
    }).get();
       //Show the array.
       for (var i = 0; i < array.length; i++) {
          var output = document.createElement('tr');
          output.insertCell(0).innerHTML = array[i];

          var input = document.createElement("input");
          input.type = "hidden";
          input.name = "item_[" + array[i] + "]";
          input.value = array[i];


          item.appendChild(input);
          item.appendChild(output);
       }
       addQuantity();
}
function count_day(){
  var zero = 0;
     x=document.getElementById("step_1");
    y=x.elements["arrival"].value;

    a=document.getElementById("step_1");
    b=a.elements["departure"].value;

      var totaldays = 0;
        var start = new Date(y),
         end = new Date(b),
         diff = 0,
        days = 1000 * 60 * 60 * 24;
        diff = end- start;
        totaldays = diff/days;
        document.getElementById("total_days").value = totaldays;

}
function total_days_function(){
  var multi = 0;
 var total_days  =  document.getElementById("total_days").value;
 var hidden_total = document.getElementById("hidden_total").value;

multi = total_days * hidden_total;
document.getElementById("hidden_total_days").value = multi;
document.getElementById("total_cost_view").innerHTML ="PHP "+  multi.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
  document.getElementById("hidden_over_total_cost").value = multi;
  
}

function total_item_function(){
  var hidden_total_days = document.getElementById("hidden_total_days").value;
  var hidde_total_item = document.getElementById("hidde_total_item").value;

  hidden_total = parseInt(hidde_total_item) +  parseInt(hidden_total_days);
  console.log(hidden_total)
  document.getElementById("hidden_over_total_cost").value = hidden_total;
document.getElementById("total_cost_view").innerHTML ="PHP "+  hidden_total.toLocaleString(undefined,  { minimumFractionDigits: 2 }  );
}

function addQuantity(){

          var inputElements = document.getElementsByClassName('item_damage');   
          var item = document.getElementById("item_name");
          var item_quan_input = document.getElementsByClassName("quan");
          var names = '';
          for(var i=0; i<item_quan_input.length; ++i) {
            if(inputElements[i].checked)
           {
           names += Number(item_quan_input[i].value);
            var yeah = document.createElement("input");

            yeah.name = "item_quantity[" + i + "]";
            yeah.type = "hidden";
            yeah.value = item_quan_input[i].value;
          console.log(names);
           item.appendChild(yeah);
         }
      }
}