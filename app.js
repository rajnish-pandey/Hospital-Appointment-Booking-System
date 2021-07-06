const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
  document.getElementById('brand2').style.display="none";
  document.getElementById('brand1').style.display="block";
  document.getElementById('imagerightid').style.display="block";
  
  
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
  document.getElementById('brand2').style.display="block";
  document.getElementById('brand1').style.display="none";
  document.getElementById('imagerightid').style.display="none";
});
