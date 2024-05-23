const openModalButton = document.querySelector("#open-modal");
const closeModalButton = document.querySelector("#close-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");
const div = document.querySelector("#conDiv");
const bodyall = document.querySelector("#bodyallId");



const ToggleModal = () => {
    modal.classList.toggle("hide");
    fade.classList.toggle("hide");
    div.classList.toggle("hide");
    bodyall.classList.toggle("hide");
}

[openModalButton, closeModalButton, fade].forEach((el) => {
    el.addEventListener("click", () => ToggleModal());
}); 