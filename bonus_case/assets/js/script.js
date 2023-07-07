// ! Functionality for the 'register' and 'login' links
document.addEventListener('DOMContentLoaded', function () {
    const registerLink = document.getElementById('register-link');
    const registerTab = document.getElementById('register-tab');
    const loginLink = document.getElementById('login-link');
    const loginTab = document.getElementById('login-tab');

    registerLink.addEventListener('click', function (event) {
        event.preventDefault();
        registerTab.click();
    });

    loginLink.addEventListener('click', function (event) {
        event.preventDefault();
        loginTab.click();
    });
});

// ! Functionality for the 'remember me' checkbox
document.addEventListener('DOMContentLoaded', function () {
    const rememberCheck = document.getElementById('rememberCheck');
    const usernameInput = document.getElementById('username');

    // * Load the saved value of 'remember me' from local storage
    if (localStorage.getItem('rememberMe') === 'true') {
        rememberCheck.checked = true;
        usernameInput.value = localStorage.getItem('savedUsername');
    }

    rememberCheck.addEventListener('change', function () {
        // * Save the value of 'remember me' to local storage
        localStorage.setItem('rememberMe', rememberCheck.checked);
        if (!rememberCheck.checked) {
            localStorage.removeItem('savedUsername');
        }
    });

    usernameInput.addEventListener('input', function () {
        if (rememberCheck.checked) {
            // * Save the value of the username input to local storage
            localStorage.setItem('savedUsername', usernameInput.value);
        }
    });
});