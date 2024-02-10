let activeSlide = 1;
const slideCount = 3;

function showSlide(slideNumber) {
  let slide1 = document.getElementById("slide1");
  let slide2 = document.getElementById("slide2");
  let slide3 = document.getElementById("slide3");
  let slides = [slide1, slide2, slide3]; // Array of all slides

  slides.forEach((slide, index) => {
    if (index+1 == slideNumber) {
      // If the current slide is the target slide, remove 'hidden' class
      if (slide.classList.contains("hidden")) {
        slide.classList.remove("hidden");
      }
    } else {
      // If the current slide is not the target slide, add 'hidden' class
      if (!slide.classList.contains("hidden")) {
        slide.classList.add("hidden");
      }
    }
  });
}

function updateIndicators() {
  const indicators = document
    .getElementById("sliderIndicators")
    .getElementsByTagName("button");
  for (let i = 0; i < indicators.length; i++) {
    if (i + 1 === activeSlide) {
      indicators[i].classList.add("bg-orange-500", "w-16"); // Adjust the width here
      indicators[i].classList.remove("bg-gray-300", "w-3");
    } else {
      indicators[i].classList.remove("bg-orange-500", "w-16");
      indicators[i].classList.add("bg-gray-300", "w-3");
    }
  }
}

function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const icon = document.getElementById("passwordVisibilityIcon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  } else {
    passwordInput.type = "password";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  }
}
