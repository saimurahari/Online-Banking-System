function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
function openLogin(){
    document.getElementById("login").style.width="100%";
}
function closeNav(){
document.getElementById("login").style.width = "0%";
}
const signinBtn = document.querySelector('.signinBtn');
const signupBtn = document.querySelector('.signupBtn');
const formbx = document.querySelector('.formbx');


signinBtn.onclick = function(){
    formbx.classList.remove('active')
}
signupBtn.onclick = function(){
    formbx.classList.add('active')
}
function barFunction(){
    var x = document.getElementById('topnav');
    if(x.className == "navbar-custom"){
        x.className+="responsive";

    }else{
        x.className="navbar-custom";
    }
}