// Retour vers le haut de page

const scrollButton = document.querySelector(".scroll-top-wrapper");

if(scrollButton){
  window.addEventListener('scroll', ()=> {
    if(scrollY > (window.innerHeight * 0.3)){
      scrollButton.style.display="block";
    }else{
      scrollButton.style.display="none";
    }
  });
  scrollButton.addEventListener("click", () => {
    window.scrollTo(0, 0);
  });
}