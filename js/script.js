// Function to display the pop-up
function showPopup() {
  document.getElementById('popup').style.display = 'flex';
}

// Function to close the pop-up
function closePopup() {
  document.getElementById('popup').style.display = 'none';
}

// Show the pop-up when the page loads
window.onload = showPopup;

let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x')
    navbar.classList.toggle('active')
};

window.onscroll = () => {
    menu.classList.remove('bx-x')
    navbar.classList.remove('active')
}
var swiper = new swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: true,
  centerSlide: 'true',
  fade: 'true',
  dragCursor: 'true',
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});

//function to download pdfs
function downloadPDF() {
  window.location.href = 'pdf/sample.pdf';
}

// Function to display the signup pop-up
function showSignUpPopup() {
  document.getElementById('signup-popup').style.display = 'flex';
}

// Function to close the signup pop-up
function closeSignUpPopup() {
  document.getElementById('signup-popup').style.display = 'none';
}

// Function to show login option in the signup pop-up
function showLogin() {
  closeSignUpPopup(); // Close the signup pop-up
  showLoginPopup(); // Show the login pop-up
}

// Function to display the login pop-up
function showLoginPopup() {
  document.getElementById('login-popup').style.display = 'flex';
}

// Function to close the login pop-up
function closeLoginPopup() {
  document.getElementById('login-popup').style.display = 'none';
}

// Function to show signup option in the login pop-up
function showSignUpFromLogin() {
  closeLoginPopup(); // Close the login pop-up
  showSignUpPopup(); // Show the signup pop-up
}
