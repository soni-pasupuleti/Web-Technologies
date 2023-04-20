var straw = 160;
var apple = 200;
var grapes = 170;
var pome = 220;
var gu = 60;
var total = 0;
var check = 1;
var gw;
var sfruit;
var perkg;
var adder = document.querySelector("#getme");
adder.addEventListener("click", getMe);
var by = document.querySelector("#out");
by.addEventListener("click", checkOut);
var cme = document.querySelector("#clr");
cme.addEventListener("click", clearMe);

function getMe() {
  sfruit = document.querySelector("#sf").value;
  perkg = parseFloat(document.querySelector("#entrybox").value);
  gw = document.querySelector("#writeme");
  if (Number.isNaN(perkg) === true) {
    alert("Only Numbers !!! Or The Field is Empty");
    check = 0;
  }
  else if (perkg<0) {
    alert("Negative value!! @stupid");
    check = 0;
  }
  else{
    check = 1;
  }
  if (check == 1) {
 
    switch (sfruit) {
      case "Strawberry":
        var st = straw * perkg;
        gw.value += "DAIRY MILK " + perkg + " items= " + st + " rs\r";
        total += st;
        perkg.value = "";
        break;
      case "Apple":
        var at = apple * perkg;
        gw.value += "5 STAR " + perkg + " items = " + at + " rs\r";
        total += at;
        perkg.value = "";
        break;
      case "Grapes":
        var gr = grapes * perkg;
        gw.value += "KIT-KAT " + perkg + " items = " + gr + " rs\r";
        total += gr;
        perkg.value = "";
        break;
      case "Guava":
        var ga = gu * perkg;
        gw.value += "MUNCH " + perkg + " items  = " + ga + " RS\r";
        total += ga;
        perkg.value = "";
        break;
      case "Pomegranate":
        var pomy = pome * perkg;
        gw.value += "PERK" + perkg + " items  = " + pomy + " rs\r";
        total += pomy;
        perkg.value = "";
        break;
    }

  }
}

function checkOut() {
  gw.value += "--------------------------------------------------------------\r";
  gw.value += "Your Total Bill Is = " + total + " rs \r";
  gw.value +="--------------------------------------------------------------\r";
  gw.value +="Thanks For Shopping!\r";
  gw.value += "--------------------------------------------------------------\r";
  gw.value +="VISIT AGAIN!😀😀😀\r";
  total = 0;
}
function clearMe () {
  gw.value = "";
}
