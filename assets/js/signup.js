
// Password toggle
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    togglePassword.classList.toggle('fa-eye-slash');
});

// Captcha
const captchaBox = document.getElementById('captcha');
const captchaInput = document.getElementById('captchaInput');
const refreshCaptcha = document.getElementById('refreshCaptcha');

function generateCaptcha() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let captcha = '';
    for (let i = 0; i < 5; i++) {
        let char = chars.charAt(Math.floor(Math.random() * chars.length));
        char = Math.random() > 0.5 ? char.toLowerCase() : char;
        captcha += char;
    }
    captchaBox.textContent = captcha;
}
refreshCaptcha.addEventListener('click', generateCaptcha);
generateCaptcha();

document.getElementById('signupBtn').addEventListener('click', e => {
    e.preventDefault();
    if (captchaInput.value !== captchaBox.textContent) {
        alert('Captcha is incorrect!');
        generateCaptcha();
        captchaInput.value = '';
        return;
    }
    alert('Signup successful!');
});




// ***************************************** HEADER START *****************************************
const toggle = document.querySelector(".menu-toggle");
const menu = document.querySelector(".menu");
const dropdowns = document.querySelectorAll(".has-dropdown");

toggle.addEventListener("click", () => {
    menu.classList.toggle("active");
});

dropdowns.forEach(dropdown => {
    const link = dropdown.querySelector(".nav-link");

    link.addEventListener("click", (e) => {
        if (window.innerWidth <= 992) {
            e.preventDefault();
            dropdown.classList.toggle("active");
        }
    });
});