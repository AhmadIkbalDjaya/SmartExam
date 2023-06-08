const passwordInput = document.getElementById("passwordInput");
const eyeClosedIcon = document.getElementById("eyeClosedIcon");
const eyeOpenIcon = document.getElementById("eyeOpenIcon");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function () {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeClosedIcon.style.display = "none";
        eyeOpenIcon.style.display = "inline";
    } else {
        passwordInput.type = "password";
        eyeClosedIcon.style.display = "inline";
        eyeOpenIcon.style.display = "none";
    }
});

const passwordInput2 = document.getElementById("passwordInput2");
const eyeClosedIcon2 = document.getElementById("eyeClosedIcon2");
const eyeOpenIcon2 = document.getElementById("eyeOpenIcon2");
const togglePassword2 = document.getElementById("togglePassword2");

togglePassword2.addEventListener("click", function () {
    if (passwordInput2.type === "password") {
        passwordInput2.type = "text";
        eyeClosedIcon2.style.display = "none";
        eyeOpenIcon2.style.display = "inline";
    } else {
        passwordInput2.type = "password";
        eyeClosedIcon2.style.display = "inline";
        eyeOpenIcon2.style.display = "none";
    }
});
