
/*Set Current Date of Arrival and Departure */

var currentdatearrival = new Date();
var shortdatearrival = currentdatearrival.toLocaleDateString();
var currentdatedeparture = new Date();
var shordatedeparture = currentdatedeparture.toLocaleDateString();
var totaldays = "";
var bet=0;


i = document.getElementById("adult-form").value ;
document.getElementById("adult").innerHTML = i;

j = document.getElementById("child-form").value ;
document.getElementById("child").innerHTML = j;

function myAdult(val) {
            document.getElementById("adult").innerHTML =  val;
            addAdult();

}

function addAdult(val){
            setAdd = document.getElementById("adult-form").value;

            if(setAdd == 4){
                document.getElementById("price-adult").innerHTML = 800;
            }
            else if(setAdd == 3){
                document.getElementById("price-adult").innerHTML = 600;
            }
            else if(setAdd == 2){
                document.getElementById("price-adult").innerHTML = 400;
            }

            else if(setAdd == 1){
                document.getElementById("price-adult").innerHTML = 200;
            }
            else if(setAdd == 0){
                document.getElementById("price-adult").innerHTML = 0;
            }

}
function myChild(val) {

            document.getElementById("child").innerHTML =  val;
             addChild();
}
function addChild(val){
            setAdd2 = document.getElementById("child-form").value;


            if(setAdd2 == 4){
                document.getElementById("price-child").innerHTML = 800;
            }
            else if(setAdd2 == 3){
                document.getElementById("price-child").innerHTML = 600;
            }
            else if(setAdd2 == 2){
                document.getElementById("price-child").innerHTML = 400;
            }

            else if(setAdd2 == 1){
                document.getElementById("price-child").innerHTML = 200;
            }

            else if(setAdd2 == 0){
                document.getElementById("price-child").innerHTML =  0;
            }


}

//DAYS COUNTED //

function counted(val) {
    x=document.getElementById("form1");
    y=x.elements["arrival"].value;

a=document.getElementById("form1");
b=a.elements["departure"].value;

        var start = new Date(y),
         end = new Date(b),
         diff = 0,
        days = 1000 * 60 * 60 * 24;
        diff = end- start;
    console.log(Math.floor(diff / days) + " Days have Passed now");
    document.getElementById("days-counted").innerHTML =  diff / days;
    document.getElementById("days-counted1").value = diff / days;
    totaldays = diff / days;
    total();


}
//TOTAL//
function total(val){
  var person1 = document.getElementById("adult").innerHTML;
  var person2 = document.getElementById("child").innerHTML;
  var total_person1 = document.getElementById("total_adult").value;
  var total_person2 = document.getElementById("total_child").value;
  var overall1 = parseInt(person1) + parseInt(total_person1);
  var overall2 = parseInt(person2) + parseInt(total_person2);
  document.getElementById("overall_adult").value = overall1;
  document.getElementById("overall_child").value = overall2;


   var plus1 = document.getElementById("price-adult").innerHTML;
   var plus2 = document.getElementById("price-child").innerHTML;
    var tutal = parseInt(plus1) + parseInt(plus2);
    price=document.getElementById("price").value;
    item = document.getElementById("price_item").value;
    var meh =   parseInt(price) * totaldays + tutal + parseInt(item);
    document.getElementById("total-revenue").innerHTML = "Total: ₱"+ meh;
    document.getElementById("total-revenue1").value = meh;
    disc = document.getElementById("discount").value ;
    var meh =    parseInt(price) * totaldays  + tutal;
    over = meh * disc;
    discounted = meh - over;
    document.getElementById("total-discount").innerHTML = "Total: ₱"+ discounted;
    document.getElementById("total-header").innerHTML = "Total Cost: ₱"+ discounted;
      document.getElementById("total_cost").value = discounted;

}
