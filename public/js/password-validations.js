
const passwordInput = document.getElementById('password');
const confirmInput = document.getElementById('password_confirmation');
const rulesList = document.getElementById('password-rules');

const rules = {
    length: document.getElementById('rule-length'),
    uppercase: document.getElementById('rule-uppercase'),
    lowercase: document.getElementById('rule-lowercase'),
    number: document.getElementById('rule-number'),
    special: document.getElementById('rule-special')
};

passwordInput.addEventListener('input', handleValidation);
confirmInput.addEventListener('input', matchPasswords);

function handleValidation() {
    const value = passwordInput.value;

    if (value.length > 0) {
        rulesList.classList.toggle("d-none", false);
    } else {
        rulesList.classList.toggle("d-none", true);
    }

    const validations = {
        length: value.length >= 8,
        uppercase: /[A-Z]/.test(value),
        lowercase: /[a-z]/.test(value),
        number: /[0-9]/.test(value),
        special: /[^A-Za-z0-9]/.test(value)
    };

    let allValid = true;

    for (const rule in validations) {
        if (validations[rule]) {
            rules[rule].style.display = 'none';
        } else {
            rules[rule].style.display = 'list-item';
            allValid = false;
        }
    }

    passwordInput.classList.toggle('is-valid', allValid);
    passwordInput.classList.toggle('is-invalid', !allValid);

    matchPasswords();
}

function matchPasswords() {
    const pwd = passwordInput.value;
    const confirm = confirmInput.value;

    if (pwd === confirm && pwd.length > 0 && passwordInput.classList.contains('is-valid')) {
        confirmInput.classList.add('is-valid');
        confirmInput.classList.remove('is-invalid');
    } else {
        confirmInput.classList.add('is-invalid');
        confirmInput.classList.remove('is-valid');
    }
}
