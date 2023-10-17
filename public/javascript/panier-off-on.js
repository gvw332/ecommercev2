// Sélectionnez l'élément du bouton du panier
const panierBtn = document.getElementById("panier-btn");

// Sélectionnez l'élément "aside"
const panier = document.getElementById("panier");

// Écoutez le clic sur le bouton du panier
panierBtn.addEventListener("click", function() {
  // Vérifiez si "aside" est actuellement caché
 
  if (panier.style.display === "none") {
    // Affichez "aside" en utilisant display: block
    panier.style.display = "block";
  } else {
    // Masquez "aside" en utilisant display: none
    panier.style.display = "none";
  }
});