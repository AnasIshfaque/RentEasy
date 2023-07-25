const modal = document.querySelector(".login_modal");
const openModal = document.querySelector(".loginBtn");
const closeModal = document.querySelector(".close_modal");

openModal.addEventListener("click", () => {
  modal.showModal();
});

closeModal.addEventListener("click", () => {
  modal.close();
});
