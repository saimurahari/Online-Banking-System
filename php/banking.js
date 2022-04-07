function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
function barFunction(){
    var x = document.getElementById('topnav');
    if(x.className == "navbar-custom"){
        x.className+="responsive";

    }else{
        x.className="navbar-custom";
    }
}
