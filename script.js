document.querySelectorAll('.competences').forEach((competence) => {

  competence.addEventListener('click', () => {

    // Ferme les autres compétences si on veut un seul ouvert à la fois :

    document.querySelectorAll('.competences').forEach((el) => {

      if (el !== competence) el.classList.remove('open');

    });



    competence.classList.toggle('open');

  });

});


// Typewriter for H2
const texts = ["Un projet ?", "Des questions ?", "Contactez moi !"];
let index = 0;
let subIndex = 0;
let deleting = false;

const typewriterElement = document.getElementById("typewriter-text");
const h2Element = document.getElementById("typewriter");

const typingSpeed = 100;
const deletingSpeed = 50;
const delayBetweenWords = 2000;

function type() {
  const currentText = texts[index];

  // Toggle underline on the h2 element
  if (index === 2) {
    h2Element.classList.add("underlined");
  } else {
    h2Element.classList.remove("underlined");
  }

  if (!deleting) {
    typewriterElement.textContent = currentText.substring(0, subIndex + 1);
    subIndex++;
    if (subIndex === currentText.length) {
      deleting = true;
      setTimeout(type, delayBetweenWords);
      return;
    }
  } else {
    typewriterElement.textContent = currentText.substring(0, subIndex - 1);
    subIndex--;
    if (subIndex === 0) {
      deleting = false;
      index = (index + 1) % texts.length;
    }
  }

  setTimeout(type, deleting ? deletingSpeed : typingSpeed);
}

// Typewriter for H1
const titles = ["Un premier titre", "Un deuxieme titre", "Un troisième titre"];
let titleIndex = 0;
let subTitleIndex = 0;
let deletingTitle = false;

const typewriterElementTitle = document.getElementById("typewriter-titletext");
const h1Element = document.getElementById("typewriter-title");

function typeTitle() {
  const currentTitle = titles[titleIndex];

  // Toggle underline on the h1 element
  if (titleIndex === 2) {
    h1Element.classList.add("underlined");
  } else {
    h1Element.classList.remove("underlined");
  }

  if (!deletingTitle) {
    typewriterElementTitle.textContent = currentTitle.substring(0, subTitleIndex + 1);
    subTitleIndex++;
    if (subTitleIndex === currentTitle.length) {
      deletingTitle = true;
      setTimeout(typeTitle, delayBetweenWords);
      return;
    }
  } else {
    typewriterElementTitle.textContent = currentTitle.substring(0, subTitleIndex - 1);
    subTitleIndex--;
    if (subTitleIndex === 0) {
      deletingTitle = false;
      titleIndex = (titleIndex + 1) % titles.length;
    }
  }

  setTimeout(typeTitle, deletingTitle ? deletingSpeed : typingSpeed);
}

// Start both animations
document.addEventListener("DOMContentLoaded", () => {
  type();
  typeTitle();
});

$(document).ready(function () {
  var mySwiper = new Swiper(".swiper", {
    autoHeight: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    speed: 500,
    direction: "horizontal",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar"
    },
    loop: false,
    effect: "slide",
    spaceBetween: 30,
    on: {
      init: function () {
        $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
        $(".swiper-pagination-custom .swiper-pagination-switch").eq(0).addClass("active");
      },
      slideChangeTransitionStart: function () {
        $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
        $(".swiper-pagination-custom .swiper-pagination-switch").eq(mySwiper.realIndex).addClass("active");
      }
    }
  });
  $(".swiper-pagination-custom .swiper-pagination-switch").click(function () {
    mySwiper.slideTo($(this).index());
    $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
    $(this).addClass("active");
  });
});