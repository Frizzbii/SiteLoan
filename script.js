document.querySelectorAll('.competences').forEach((competence) => {
  competence.addEventListener('click', () => {
    // Ferme les autres compétences si on veut un seul ouvert à la fois :
    document.querySelectorAll('.competences').forEach((el) => {
      if (el !== competence) el.classList.remove('open');
    });

    competence.classList.toggle('open');
  });
});

const texts = ["Un projet ?", "Des questions ?", "Contactez moi !"];
const typingSpeed = 100;
    const deletingSpeed = 50;
    const delayBetweenWords = 2000;

    let index = 0;
    let subIndex = 0;
    let deleting = false;

    const typewriterElement = document.getElementById("typewriter-text");
    const h2Element = document.getElementById("typewriter");

    function type() {
      const currentText = texts[index];

      if (index === 2) {
            typewriterElement.classList.add("underlined");
          }
      else {
            typewriterElement.classList.remove("underlined");
      }

      // Update text content
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

    type();