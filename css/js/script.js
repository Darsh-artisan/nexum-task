document.addEventListener("DOMContentLoaded", function() {
    const registerForm = document.querySelector("form[action='submit_register.php']");
    const loginForm = document.querySelector("form[action='submit_login.php']");
    const feedbackForm = document.querySelector("form[action='submit_feedback.php']");

    if (registerForm) {
        registerForm.addEventListener("submit", function(event) {
            if (!validatePassword(registerForm.password.value)) {
                event.preventDefault();
                alert("Password must be at least 6 characters long and contain at least one number.");
            }
        });
    }

   
});

function validatePassword(password) {
    return password.length >= 6 && /\d/.test(password);
}
