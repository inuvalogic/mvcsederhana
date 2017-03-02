(function() {

"use strict";

toggleHandler();

function toggleHandler() {
    
    var toggle = document.querySelector(".c-hamburger");
    var sidemenu = document.querySelector(".side-menu");
    var container = document.querySelector(".container");
    
    toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (toggle.classList.contains("is-active") === true) ? toggle.classList.remove("is-active") : toggle.classList.add("is-active");
        (sidemenu.classList.contains("is-open") === true) ? sidemenu.classList.remove("is-open") : sidemenu.classList.add("is-open");
    });
    
    sidemenu.addEventListener( "touchmove", function(e) {
        sidemenu.classList.remove("is-open");
        if (toggle.classList.contains("is-active") === true) toggle.classList.remove("is-active");
    });

    container.addEventListener( "touchstart", function(e) {
        sidemenu.classList.remove("is-open");
        if (toggle.classList.contains("is-active") === true) toggle.classList.remove("is-active");
    });

    container.addEventListener( "touchmove", function(e) {
        if (sidemenu.classList.contains("is-open") === false) sidemenu.classList.add("is-open");
    	if (toggle.classList.contains("is-active") === false) toggle.classList.add("is-active");
    });    
}

})();