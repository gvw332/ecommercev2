// const openModal = document.querySelectorAll(".open-modal");

// openModal.forEach((btn) => {
//   btn.addEventListener("click", () => {
//     var modal = btn.getAttribute("data-modal");
//     var modalElement = document.getElementById(modal);

//     if (modalElement.style.display === "flex") {
//       modalElement.style.display = "none"; // Fermer la modal si elle est déjà ouverte
//       console.log("Modal fermée");
//     } else {
//       modalElement.style.display = "flex"; // Ouvrir la modal si elle est fermée
//       console.log("Modal ouverte");
//     }
//   });
// });

// const closeModal = document.querySelectorAll(".modal-close");

// closeModal.forEach((btn) => {
//   btn.addEventListener("click", () => {
//     var modal = btn.closest(".modal");
//     modal.style.display = "none"; // Fermer la modal lorsque le bouton de fermeture est cliqué
//     console.log("Modal fermée via bouton de fermeture");
//   });
// });

// window.addEventListener("click", (e) => {
//   if (e.target.className === "modal") {
//     e.target.style.display = "none"; // Fermer la modal en cliquant à l'extérieur de celle-ci
//     console.log("Fenêtre fermée en cliquant à l'extérieur de la modal");
//   }
// });

// // Empêcher le comportement par défaut des boutons "+" et "-"
// const plusButtons = document.querySelectorAll(".plus-btn");
// const moinsButtons = document.querySelectorAll(".moins-btn");

// plusButtons.forEach((btn) => {
//   btn.addEventListener("click", (event) => {
//     event.preventDefault(); // Empêcher le rechargement de la page
//     // Votre code pour augmenter le nombre d'articles ici
//   });
// });

// moinsButtons.forEach((btn) => {
//   btn.addEventListener("click", (event) => {
//     event.preventDefault(); // Empêcher le rechargement de la page
//     // Votre code pour diminuer le nombre d'articles ici
//   });
// });



window.onload = function () {
  if (sessionStorage.getItem("panier") == "true") {
    document.getElementById("modal-panier").style.display = "flex";
  }
};

const openModal = document.querySelectorAll(".open-modal");

openModal.forEach((btn) => {
  btn.onclick = () => {
    var modal = btn.getAttribute("data-modal");
    document.getElementById(modal).style.display = "flex";
    console.log("Btn Clické");
    sessionStorage.setItem("panier", "true");
  };
});

const closeModal = document.querySelectorAll(".close-modal");

closeModal.forEach((btn) => {
  btn.onclick = () => {
    var modal = (btn.closest(".modal").style.display = "none");
    sessionStorage.setItem("panier", "false");
  };
});

window.onclick = (e) => {
  if (e.target.className === "modal") {
    e.target.style.display = "none";
    console.log("Fenetre fermée");
    sessionStorage.setItem("panier", "false");
  }
};
