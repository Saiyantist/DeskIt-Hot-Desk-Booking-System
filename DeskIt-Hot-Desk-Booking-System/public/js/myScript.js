
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach((n) => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}
/* Code for changing active  
link on clicking */
var a =
    $("#navigation .navbar-nav .navbar-item .nav-link");

for (var i = 0; i < a.length; i++) {
    a[i].addEventListener("click",
        function () {
            var current = document
                .getElementsByClassName("active");

            current[0].className = current[0]
                .className.replace(" active", "");

            this.className += " active";
        });
}

/* Code for changing active  
link on Scrolling */
$(window).scroll(function () {
    var distance = $(window).scrollTop();
    $('.page-section').each(function (i) {

        if ($(this).position().top
            <= distance + 250) {

            $('.navbar-nav a.active')
                .removeClass('active');

            $('.navbar-nav a').eq(i)
                .addClass('active');
        }
    });
}).scroll(); 