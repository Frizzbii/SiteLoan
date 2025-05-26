
document.getElementById("contact-form").addEventListener("submit", function (e) {
  e.preventDefault();
  alert("Merci pour votre message !");
  this.reset();
});
