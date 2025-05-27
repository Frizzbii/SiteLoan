document.querySelectorAll('.competences').forEach((competence) => {
  competence.addEventListener('click', () => {
    // Ferme les autres compétences si on veut un seul ouvert à la fois :
    document.querySelectorAll('.competences').forEach((el) => {
      if (el !== competence) el.classList.remove('open');
    });

    competence.classList.toggle('open');
  });
});