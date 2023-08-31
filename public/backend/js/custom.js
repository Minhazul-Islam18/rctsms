        let collapsibleHeaders = document.getElementsByClassName("collapsible__header");

        Array.from(collapsibleHeaders).forEach((header) => {
            header.addEventListener("click", () => {
                header.parentElement.classList.toggle("collapsible--open");
            });
        });
