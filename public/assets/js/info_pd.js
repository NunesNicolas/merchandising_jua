const openModalButtons = document.querySelectorAll(".open-modal-button");
const closeModalButton = document.querySelector("#close-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");
const div = document.querySelector("#conDiv");
const bodyall = document.querySelector("#bodyallId");

const toggleModal = () => {
    modal.classList.toggle("hide");
    fade.classList.toggle("hide");
    div.classList.toggle("hide");
    bodyall.classList.toggle("hide");
};

openModalButtons.forEach((button) => {
    button.addEventListener("click", toggleModal);
    closeModalButton.addEventListener("click", toggleModal);
});


// Selecione o botão de fechamento


// Função para alternar o modal (abrir/fechar)

// Adicione o evento de clique ao botão de fechamento

