let collapsibleHeaders = document.getElementsByClassName("collapsible__header");
let checkers = document.querySelectorAll(".checker a.menu-active");

checkers.forEach(checker => {
  let accordion = checker.closest(".accordion");
  if (accordion) {
    let collapsible = accordion.querySelector(".accordion__collapsible");
    if (collapsible) {
      collapsible.classList.add("collapsible--open");
    }
  }
});


Array.from(collapsibleHeaders).forEach((header) => {
    header.addEventListener("click", () => {
        header.parentElement.classList.toggle("collapsible--open");
    });
});
document.querySelectorAll(".checker a.menu-active").forEach(link => {
  link.addEventListener("click", function() {
    let accordion = this.closest(".accordion");
    let collapsible = accordion.querySelector(".accordion__collapsible");

    // Toggle the 'collapsible--open' class to open/close the accordion
    if (collapsible) {
      collapsible.classList.toggle("collapsible--open");
    }
  });
});
    // Initially, close all accordion items
    $(".accordion ul.submenu").slideUp();

    // When a top-level link is clicked
    $(".accordion > a").click(function(e) {
        e.preventDefault();
        let submenu = $(this).siblings("ul.submenu");
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
