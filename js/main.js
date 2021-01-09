
//Shows last updated
function time() {
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var date = new Date();
    var dayofweek = days[date.getDay()];
    var monthofyear = months[date.getMonth()];    
    var fulldate = dayofweek + ", " + date.getDate() + " " + monthofyear + " " + date.getFullYear();
    document.getElementById("datetime").innerHTML = fulldate;

}

//Loads date and time
window.addEventListener("load", time())


// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}