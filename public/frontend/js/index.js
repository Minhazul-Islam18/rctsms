document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuToggle = document.getElementById("mobile-menu-toggle");
    const sidebarMenu = document.querySelector(".sidebar-menu");
    const closeButton = document.getElementById("close-button");

    mobileMenuToggle.addEventListener("click", function () {
        $("body").addClass("overflow-hidden");
        sidebarMenu.style.left =
            sidebarMenu.style.left === "0px" ? "-100vw" : "0px";
    });

    closeButton.addEventListener("click", function () {
        $("body").removeClass("overflow-hidden");
        sidebarMenu.style.left = "-100vw"; // Close the menu when the close button is clicked
    });
});
$("nav .accordion-item").click(function () {
    const content = $(this).next(".accordion-content");
    if (content.length) {
        content.slideToggle("slow"); // Apply slide animation
    }
});
