document.addEventListener("DOMContentLoaded", () => {
  let menu = document.querySelector("#menu-icon");
  let nav = document.querySelector(".nav");
  let sign = document.querySelector(".sign-1");
  let container = document.querySelector(".form-container");
  let login = document.getElementById("login");
  let regi = document.querySelectorAll(".register");
  let signup = document.getElementById("signup");
  let logi = document.querySelector(".login");
  let cross = document.getElementById("cross");
  let shop = document.querySelectorAll(".btn");
  function disableScroll() {
    document.body.classList.add("stop-scrolling");
  }

  function enableScroll() {
    document.body.classList.remove("stop-scrolling");
  }
  menu.onclick = () => {
    menu.classList.toggle("bx-x");
    nav.classList.toggle("open");
  };
  sign.onclick = () => {
    container.style.left = "0%";
    disableScroll();
  };
  regi[0].onclick = () => {
    signup.classList.toggle("hide");
    login.classList.toggle("hide");
    disableScroll();
  };
  regi[1].onclick = () => {
    signup.classList.toggle("hide");
    login.classList.toggle("hide");
    disableScroll();
  };
  cross.onclick = () => {
    container.style.left = "100%";
    enableScroll();
  };
  for (i = 0; i <= 5; i++) {
    shop[i].onclick = () => {
      window.scrollTo(0, 0);
      container.style.left = "0%";
      disableScroll();
    };
  }
  document.onkeydown = function (evt) {
    var isEscape = false;
    if ("key" in evt) {
      isEscape = evt.key === "Escape" || evt.key === "Esc";
    } else {
      isEscape = evt.keyCode === 27;
    }
    if (isEscape) {
      container.style.left = "100%";
      enableScroll();
    }
  };
});

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
