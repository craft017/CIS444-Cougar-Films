function validateSignupForm() {
    var username = document.getElementById('signup-username').value;
    var password = document.getElementById('signup-password').value;
    var confirmPassword = document.getElementById('confirm-password').value;

    if (username === '' || password === '' || confirmPassword === '') {
        alert('Please fill in all fields.');
        return false;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }

    return true;
}

// Bind the validation function to the form submit event
document.querySelector('form').onsubmit = function() {
    return validateSignupForm();
};
