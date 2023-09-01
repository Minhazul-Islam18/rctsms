let collapsibleHeaders = document.getElementsByClassName("collapsible__header");
let checker = document.querySelector(".checker a");
if (checker.classList.contains("menu-active")) {
    // console.log('asdfsdfsdfasf');
    $(".accordion__collapsible").addClass("collapsible--open");
}
Array.from(collapsibleHeaders).forEach((header) => {
    header.addEventListener("click", () => {
        header.parentElement.classList.toggle("collapsible--open");
    });
});
