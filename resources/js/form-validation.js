/**
 * Client-side form validation
 */

// Email validation regex
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

/**
 * Show error message for a field
 */
function showError(field, message) {
    const errorElement = document.getElementById(field.id + '-error');
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.classList.remove('hidden');
    } else {
        // Create error element if it doesn't exist
        const errorDiv = document.createElement('p');
        errorDiv.id = field.id + '-error';
        errorDiv.className = 'text-red-500 text-xs italic mt-1';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }
    field.classList.add('border-red-500');
    field.classList.remove('border-gray-300');
}

/**
 * Clear error message for a field
 */
function clearError(field) {
    const errorElement = document.getElementById(field.id + '-error');
    if (errorElement) {
        errorElement.classList.add('hidden');
    }
    field.classList.remove('border-red-500');
    field.classList.add('border-gray-300');
}

/**
 * Validate email field
 */
function validateEmail(emailField) {
    const email = emailField.value.trim();
    if (!email) {
        showError(emailField, 'E-mailadres is verplicht.');
        return false;
    }
    if (!emailRegex.test(email)) {
        showError(emailField, 'Voer een geldig e-mailadres in.');
        return false;
    }
    clearError(emailField);
    return true;
}

/**
 * Validate required text field
 */
function validateRequired(field, fieldName) {
    const value = field.value.trim();
    if (!value) {
        showError(field, `${fieldName} is verplicht.`);
        return false;
    }
    clearError(field);
    return true;
}

/**
 * Validate password field
 */
function validatePassword(passwordField) {
    const password = passwordField.value;
    if (!password) {
        showError(passwordField, 'Wachtwoord is verplicht.');
        return false;
    }
    if (password.length < 8) {
        showError(passwordField, 'Wachtwoord moet minimaal 8 tekens lang zijn.');
        return false;
    }
    clearError(passwordField);
    return true;
}

/**
 * Validate password confirmation
 */
function validatePasswordConfirmation(passwordField, confirmationField) {
    if (confirmationField.value !== passwordField.value) {
        showError(confirmationField, 'Wachtwoorden komen niet overeen.');
        return false;
    }
    clearError(confirmationField);
    return true;
}

/**
 * Validate textarea field
 */
function validateTextarea(textareaField, fieldName, minLength = 10) {
    const value = textareaField.value.trim();
    if (!value) {
        showError(textareaField, `${fieldName} is verplicht.`);
        return false;
    }
    if (value.length < minLength) {
        showError(textareaField, `${fieldName} moet minimaal ${minLength} tekens lang zijn.`);
        return false;
    }
    clearError(textareaField);
    return true;
}

/**
 * Initialize form validation
 */
document.addEventListener('DOMContentLoaded', function() {
    // Register form validation
    const registerForm = document.querySelector('form[action*="register"]');
    if (registerForm) {
        const nameField = registerForm.querySelector('#name');
        const emailField = registerForm.querySelector('#email');
        const passwordField = registerForm.querySelector('#password');
        const passwordConfirmationField = registerForm.querySelector('#password_confirmation');

        if (nameField) {
            nameField.addEventListener('blur', () => validateRequired(nameField, 'Naam'));
        }
        if (emailField) {
            emailField.addEventListener('blur', () => validateEmail(emailField));
        }
        if (passwordField) {
            passwordField.addEventListener('blur', () => validatePassword(passwordField));
        }
        if (passwordConfirmationField && passwordField) {
            passwordConfirmationField.addEventListener('blur', () => {
                validatePasswordConfirmation(passwordField, passwordConfirmationField);
            });
        }

        registerForm.addEventListener('submit', function(e) {
            let isValid = true;
            if (nameField) isValid = validateRequired(nameField, 'Naam') && isValid;
            if (emailField) isValid = validateEmail(emailField) && isValid;
            if (passwordField) isValid = validatePassword(passwordField) && isValid;
            if (passwordConfirmationField && passwordField) {
                isValid = validatePasswordConfirmation(passwordField, passwordConfirmationField) && isValid;
            }
            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    // Contact form validation
    const contactForm = document.querySelector('form[action*="contact"]');
    if (contactForm) {
        const nameField = contactForm.querySelector('#name');
        const emailField = contactForm.querySelector('#email');
        const messageField = contactForm.querySelector('#message');

        if (nameField) {
            nameField.addEventListener('blur', () => validateRequired(nameField, 'Naam'));
        }
        if (emailField) {
            emailField.addEventListener('blur', () => validateEmail(emailField));
        }
        if (messageField) {
            messageField.addEventListener('blur', () => validateTextarea(messageField, 'Bericht', 10));
        }

        contactForm.addEventListener('submit', function(e) {
            let isValid = true;
            if (nameField) isValid = validateRequired(nameField, 'Naam') && isValid;
            if (emailField) isValid = validateEmail(emailField) && isValid;
            if (messageField) isValid = validateTextarea(messageField, 'Bericht', 10) && isValid;
            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    // Login form validation
    const loginForm = document.querySelector('form[action*="login"]');
    if (loginForm) {
        const emailField = loginForm.querySelector('#email');
        const passwordField = loginForm.querySelector('#password');

        if (emailField) {
            emailField.addEventListener('blur', () => validateEmail(emailField));
        }
        if (passwordField) {
            passwordField.addEventListener('blur', () => validateRequired(passwordField, 'Wachtwoord'));
        }

        loginForm.addEventListener('submit', function(e) {
            let isValid = true;
            if (emailField) isValid = validateEmail(emailField) && isValid;
            if (passwordField) isValid = validateRequired(passwordField, 'Wachtwoord') && isValid;
            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    // Password reset form validation
    const resetPasswordForm = document.querySelector('form[action*="password.update"]');
    if (resetPasswordForm) {
        const passwordField = resetPasswordForm.querySelector('#password');
        const passwordConfirmationField = resetPasswordForm.querySelector('#password_confirmation');

        if (passwordField) {
            passwordField.addEventListener('blur', () => validatePassword(passwordField));
        }
        if (passwordConfirmationField && passwordField) {
            passwordConfirmationField.addEventListener('blur', () => {
                validatePasswordConfirmation(passwordField, passwordConfirmationField);
            });
        }

        resetPasswordForm.addEventListener('submit', function(e) {
            let isValid = true;
            if (passwordField) isValid = validatePassword(passwordField) && isValid;
            if (passwordConfirmationField && passwordField) {
                isValid = validatePasswordConfirmation(passwordField, passwordConfirmationField) && isValid;
            }
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
});
