document.querySelectorAll('.competences').forEach((competence) => {

  competence.addEventListener('click', () => {

    // Ferme les autres compétences si on veut un seul ouvert à la fois :

    document.querySelectorAll('.competences').forEach((el) => {

      if (el !== competence) el.classList.remove('open');

    });



    competence.classList.toggle('open');

  });

});

// Fonction pour gérer l'expansion des compétences (à ajouter dans script.js)
function toggleDetails(element) {
  // Fermer tous les autres éléments ouverts
  document.querySelectorAll('.competence-item.open').forEach(item => {
    if (item !== element) {
      item.classList.remove('open');
    }
  });
  
  // Basculer l'élément cliqué
  element.classList.toggle('open');
}


// Typewriter for H2
const texts = ["Un projet ?", "Des questions ?", "Contactez-moi !"];
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

/*function typeTitle() {
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
}*/

// Start both animations
document.addEventListener("DOMContentLoaded", () => {
  type();
  //typeTitle();
});

// Fonction pour détecter la couleur de fond sous le menu
function updateMenuColor() {
  const menu = document.querySelector('.menu-container');
  const menuRect = menu.getBoundingClientRect();
  const menuCenterY = menuRect.top + menuRect.height / 2;
  
  // Vérifier dans quelle section se trouve le menu
  const sections = document.querySelectorAll('section');
  let currentSection = null;
  
  sections.forEach(section => {
    const sectionRect = section.getBoundingClientRect();
    if (menuCenterY >= sectionRect.top && menuCenterY <= sectionRect.bottom) {
      currentSection = section;
    }
  });
  
  // Déterminer la couleur en fonction de la section
  if (currentSection) {
    const sectionId = currentSection.id;
    const sectionStyles = window.getComputedStyle(currentSection);
    const backgroundColor = sectionStyles.backgroundColor;
    
    // Fonction pour convertir rgb en luminosité
    function getLuminance(rgbString) {
      const rgb = rgbString.match(/\d+/g);
      if (!rgb) return 0;
      
      const r = parseInt(rgb[0]) / 255;
      const g = parseInt(rgb[1]) / 255;
      const b = parseInt(rgb[2]) / 255;
      
      return 0.299 * r + 0.587 * g + 0.114 * b;
    }
    
    // Déterminer si le fond est sombre ou clair
    const luminance = getLuminance(backgroundColor);
    const isDarkBackground = luminance < 0.5;
    
    // Appliquer les styles appropriés
    if (isDarkBackground) {
      // Fond sombre = texte blanc
      menu.classList.add('menu-on-dark');
      menu.classList.remove('menu-on-light');
    } else {
      // Fond clair = texte sombre
      menu.classList.add('menu-on-light');
      menu.classList.remove('menu-on-dark');
    }
  }
}

// Écouter le scroll
window.addEventListener('scroll', updateMenuColor);
window.addEventListener('resize', updateMenuColor);

// Initialiser au chargement
document.addEventListener('DOMContentLoaded', updateMenuColor);

class TestimonialsCarousel {
      constructor() {
        this.currentSlide = 0;
        this.totalSlides = document.querySelectorAll('.testimonial-card').length;
        this.carousel = document.getElementById('testimonialsCarousel');
        this.indicators = document.querySelectorAll('.indicator');
        this.prevBtn = document.querySelector('.carousel-btn-prev');
        this.nextBtn = document.querySelector('.carousel-btn-next');
        
        this.init();
      }
      
      init() {
        this.setupEventListeners();
        this.updateCarousel();
        this.startAutoplay();
      }
      
      setupEventListeners() {
        this.prevBtn.addEventListener('click', () => this.prevSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());
        
        this.indicators.forEach((indicator, index) => {
          indicator.addEventListener('click', () => this.goToSlide(index));
        });
        
        // Pause autoplay on hover
        this.carousel.addEventListener('mouseenter', () => this.stopAutoplay());
        this.carousel.addEventListener('mouseleave', () => this.startAutoplay());
      }
      
      nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        this.updateCarousel();
      }
      
      prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.updateCarousel();
      }
      
      goToSlide(index) {
        this.currentSlide = index;
        this.updateCarousel();
      }
      
      updateCarousel() {
        // Update cards
        const cards = document.querySelectorAll('.testimonial-card');
        cards.forEach((card, index) => {
          card.classList.toggle('active', index === this.currentSlide);
        });
        
        // Update indicators
        this.indicators.forEach((indicator, index) => {
          indicator.classList.toggle('active', index === this.currentSlide);
        });
        
        // Transform carousel
        const translateX = -this.currentSlide * 100;
        this.carousel.style.transform = `translateX(${translateX}%)`;
      }
      
      startAutoplay() {
        this.autoplayInterval = setInterval(() => {
          this.nextSlide();
        }, 5000);
      }
      
      stopAutoplay() {
        if (this.autoplayInterval) {
          clearInterval(this.autoplayInterval);
        }
      }
    }
    
    // Initialize carousel when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
      new TestimonialsCarousel();
    });

class TestimonialsSimple {
  constructor() {
    this.testimonials = [
      {
        image: "assets/img/loan.png",
        text: "Loan a su parfaitement cerner nos besoins et créer une stratégie de communication qui nous ressemble. Les résultats sont au rendez-vous ! Son approche professionnelle et créative a vraiment fait la différence pour notre entreprise."
      },
      {
        image: "assets/img/loan.png", 
        text: "Un professionnel créatif et à l'écoute. Nos réseaux sociaux n'ont jamais été aussi dynamiques et engageants. Je recommande vivement ses services."
      },
      {
        image: "assets/img/loan.png",
        text: "Grâce à son expertise en SEO, notre visibilité web a considérablement augmenté. Une collaboration exceptionnelle qui a transformé notre image de marque."
      }
    ];
    
    this.currentIndex = 0;
    this.isTransitioning = false;
    this.init();
  }
  
  init() {
    const prevBtn = document.querySelector('.nav-prev');
    const nextBtn = document.querySelector('.nav-next');
    
    prevBtn?.addEventListener('click', () => this.showPrevious());
    nextBtn?.addEventListener('click', () => this.showNext());
  }
  
  showPrevious() {
    if (this.isTransitioning) return;
    this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length;
    this.updateTestimonial();
  }
  
  showNext() {
    if (this.isTransitioning) return;
    this.currentIndex = (this.currentIndex + 1) % this.testimonials.length;
    this.updateTestimonial();
  }
  
  updateTestimonial() {
    if (this.isTransitioning) return;
    
    this.isTransitioning = true;
    const testimonial = this.testimonials[this.currentIndex];
    const card = document.querySelector('.testimonial-card');
    const image = card.querySelector('.testimonial-image img');
    const text = card.querySelector('.testimonial-content p');
    
    // Ajouter la classe de transition
    card.classList.add('transitioning');
    
    setTimeout(() => {
      // Changer le contenu
      image.src = testimonial.image;
      text.textContent = `"${testimonial.text}"`;
      
      // Retirer la classe de transition
      card.classList.remove('transitioning');
      
      // Permettre les transitions suivantes
      setTimeout(() => {
        this.isTransitioning = false;
      }, 100);
      
    }, 150);
  }
}

// Initialiser quand le DOM est chargé
document.addEventListener('DOMContentLoaded', () => {
  new TestimonialsSimple();
});