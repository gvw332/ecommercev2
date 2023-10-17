const userIcon = document.getElementById("userIcon");
const logoutMenu = document.getElementById("logoutMenu");

userIcon.addEventListener("click", function(event) {
  event.preventDefault;
  const confirmation = confirm("Êtes-vous sûr de vouloir vous déconnecter ?");
  
  if (confirmation) {
     window.location.href = "deconnexion";
  }
  // Sinon, n'effectuez aucune action.
});




