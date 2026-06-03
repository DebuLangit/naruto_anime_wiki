const buttons =
document.querySelectorAll(".accordion-btn");

buttons.forEach(button => {

    button.addEventListener("click", () => {

        const content =
        button.nextElementSibling;

        content.classList.toggle("show");

    });

});