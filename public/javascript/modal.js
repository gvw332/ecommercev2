
const openModal = document.querySelectorAll(".open-modal");

openModal.forEach((btn) => {
  btn.addEventListener("click", () => {
    var modal = btn.getAttribute("data-modal");
    var modalElement = document.getElementById(modal);

    if (modalElement.style.display === "flex") {
      modalElement.style.display = "none"; // Fermer la modal si elle est déjà ouverte
      console.log("Modal fermée");
    } else {
      modalElement.style.display = "flex"; // Ouvrir la modal si elle est fermée
      console.log("Modal ouverte");
    }
  });
});

const closeModal = document.querySelectorAll(".modal-close");

closeModal.forEach((btn) => {
  btn.addEventListener("click", () => {
    var modal = btn.closest(".modal");
    modal.style.display = "none"; // Fermer la modal lorsque le bouton de fermeture est cliqué
    console.log("Modal fermée via bouton de fermeture");
  });
});

window.addEventListener("click", (e) => {
  if (e.target.className === "modal") {
    e.target.style.display = "none"; // Fermer la modal en cliquant à l'extérieur de celle-ci
    console.log("Fenêtre fermée en cliquant à l'extérieur de la modal");
  }
});
