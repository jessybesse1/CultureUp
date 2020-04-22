// prototype functionality

let active = false;

function viewMore() {
    if (active == true) {
        document.getElementById("overlay").style.top = "94vh";
        document.getElementById('viewMore').innerHTML = '<span class="material-icons btn">expand_more</span> View more';

    } else {
        document.getElementById("overlay").style.top = "200vh";
        document.getElementById('viewMore').innerHTML = '<span class="material-icons btn">expand_less</span> View less';

    }
    active = !active
}

$(document).ready(function () {
    $('.header').height($(window).height());
});

$(document).ready(function () {
    $('.navbar-toggler-icon').on('click', function () {

        $('.animated-icon1').toggleClass('is-active');
    });
});

$(document).ready(function () {
    document.getElementById('viewMore').addEventListener('click', viewMore);
});


// Dark mode button toggle
function init() {
    document.getElementById('toggle-button').addEventListener('click', toggle_style, false);
}
function toggle_style() {
    if(document.getElementById('dynamic-style').href == window.location.href.substring(0, window.location.href.lastIndexOf('/')) + '/css/Main/darkMode.css') {
        document.getElementById('dynamic-style').href = '/css/Main/main.css';
    } else {
        document.getElementById('dynamic-style').href = '/css/Main/darkMode.css';
    }
    console.log("hachoooo");
}
window.addEventListener('load', init, false);
