const modal = document.querySelector(".modal");
const openModal = document.querySelector(".loginBtn");
const closeModal = document.querySelector(".close_Modal");

openModal.addEventListener("click", () => {
  modal.showModal();
});

closeModal.addEventListener("click", () => {
  modal.close();
});
