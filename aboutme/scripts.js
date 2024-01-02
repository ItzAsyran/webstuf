// Select elements once at the start
const overlay = document.querySelector(".overlay");
const container = document.querySelector(".container");
const socialLink = document.querySelector(".social a");
const aboutMeLink = document.querySelector(".aboutme");

// Function to handle the transition
function transition(direction, url) {
  container.style.transform = `translateX(${direction})`;
  overlay.classList.add('fade-out'); // Add the fade-out class to the overlay
  setTimeout(() => {
    window.location.href = url;
  }, 500); // Adjust this time to match your animation duration
}

// Attach event listeners
if (socialLink) {
  socialLink.addEventListener("click", (event) => {
    event.preventDefault();
    transition("-100vw", "social.html");
  });
}

if (aboutMeLink) {
  aboutMeLink.addEventListener("click", (event) => {
    event.preventDefault();
    transition("0", "index.html");
  });
}

window.addEventListener("DOMContentLoaded", () => {
  overlay.classList.remove('fade-out'); // Remove the fade-out class when the page loads
});