document.addEventListener("DOMContentLoaded", function() {
    const images = document.querySelectorAll('.slideshow img');
    let index = 0;

    function changeImage() {
        images.forEach(img => img.style.display = 'none');
        index = (index + 1) % images.length;
        images[index].style.display = 'block';
    }

    setInterval(changeImage, 2000);
});

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var showPasswordBtn = document.querySelector(".show-password-btn");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility_off</span>';
    } else {
        passwordInput.type = "password";
        showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility</span>';
    }
}


