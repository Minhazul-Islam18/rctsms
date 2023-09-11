
    // Initially, close all accordion items
    $(".accordion ul.submenu").slideUp();

    // When a top-level link is clicked
    $(".accordion > a").click(function(e) {
        e.preventDefault();
        let submenu = $(this).siblings("ul.submenu");
        submenu.removeClass('collapse');
        if (submenu.is(":visible")) {
            submenu.slideUp();
        } else {
            submenu.slideDown();
        }
    });

    // Check if any child link is active, and open the corresponding accordion
    $(".accordion ul.submenu a").each(function() {
        if (window.location.href.includes($(this).attr("href"))) {
            $(this).closest(".accordion").addClass("active");
            $(this).closest(".submenu").slideDown();
        }
    });


    document.addEventListener("DOMContentLoaded", function () {
        const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
        const navbarCollapse = document.querySelector(".navbar-collapse");
        const closeButton = document.getElementById("close-button");
        const mobilemenu = document.getElementById("mobile-menu");
        mobileMenuToggle.addEventListener("click", function () {
            navbarCollapse.classList.toggle("d-flex");
        });
        closeButton.addEventListener("click", function () {
            mobilemenu.classList.toggle("d-flex"); // Close the menu when the close button is clicked
        });
    });
