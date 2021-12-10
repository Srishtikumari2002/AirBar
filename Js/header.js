//  pre loader 

var loader;

function loadNow(opacity) {
    if (opacity <= 0) {
        displayContent();
    } else {
        loader.style.opacity = opacity;
        window.setTimeout(function() {
            loadNow(opacity - 0.02);
        }, 50);
    }
}

function displayContent() {
    loader.style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function() {
    loader = document.getElementById('loader');
    loadNow(1);
});
// navigation bar 

window.addEventListener('scroll', function () {
    let header = document.querySelector('header');
    let windowlPosition = window.scrollY > 0;
    header.classList.toggle('scrolling-active', windowlPosition);
});

// open and close side bar

const sidenav = document.getElementById("sidenav");
const navbtn = document.getElementById("nav_open");
const closenav = document.getElementById("nav_close");

navbtn.addEventListener("click", function (e) {
    sidenav.classList.remove("inactive");
});

closenav.addEventListener("click", function (e) {
    sidenav.classList.add("inactive");
});

// login popup
var modal = document.getElementById("logreg-popup");
var log_btn = document.getElementById("log-btn");
var reg_btn = document.getElementById("reg-btn");
var close_btn = document.getElementsByClassName("close-popup")[0];
var signup = document.getElementById("signup");
var signin_btn = document.getElementById("signin");
var log_model = document.getElementById("login-modal");
var reg_model = document.getElementById("register-modal");
var areg_btn = document.getElementById("admin-reg-btn");
var alog_btn = document.getElementById("admin-signin");
var areg_model = document.getElementById("admin-register-modal");

function show_login() {
    reg_model.style.display = "none";
    log_model.style.display = "block";
    areg_model.style.display = "none";
}

function show_register() {
    reg_model.style.display = "block";
    log_model.style.display = "none";
    areg_model.style.display = "none";
}

function show_admin_register() {
    reg_model.style.display = "none";
    log_model.style.display = "none";
    areg_model.style.display = "block";
}

signin_btn.onclick = function () {
    show_login();
};

alog_btn.onclick = function () {
    show_login();
}

signup.onclick = function () {
    show_register();
}

log_btn.onclick = function () {
    modal.style.display = "block";
    show_login();
}

reg_btn.onclick = function () {
    modal.style.display = "block";
    show_register();
}

areg_btn.onclick = function () {
    modal.style.display = "block";
    show_admin_register();
}

close_btn.onclick = function () {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}