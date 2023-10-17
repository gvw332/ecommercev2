const userIcon = document.getElementById("userIcon");
const logoutMenu = document.getElementById("logoutMenu");

userIcon.addEventListener("click", function() {
  const confirmation = confirm("Êtes-vous sûr de vouloir vous déconnecter ?");
  
  if (confirmation) {
    // Si l'utilisateur clique sur "OK" dans l'alerte, effectuez la déconnexion.
    // Vous pouvez ajouter ici le code pour déconnecter l'utilisateur, par exemple, en le redirigeant vers une page de déconnexion.
    // window.location.href = "page_de_deconnexion.html";
  }
  // Sinon, n'effectuez aucune action.
});

logoutMenu.addEventListener("click", function() {
  // Code pour masquer le menu de déconnexion si nécessaire
  logoutMenu.style.display = "none";
});

