const modal = document.querySelector("#modal");
const openModal = document.querySelector(".open-loginModal");
const closeModal = document.querySelector(".close-login");

openModal.addEventListener("click", () => {
  modal.showModal();
});

closeModal.addEventListener("click", () => {
  modal.close();
});
