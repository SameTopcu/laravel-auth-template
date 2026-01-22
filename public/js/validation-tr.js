// HTML5 Validation Messages in Turkish
document.addEventListener('DOMContentLoaded', function() {
    // Set HTML lang attribute to Turkish
    document.documentElement.setAttribute('lang', 'tr');
    
    // Get all forms
    const forms = document.querySelectorAll('form');
    
    forms.forEach(function(form) {
        // Get all required inputs
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        
        inputs.forEach(function(input) {
            // Set custom validation messages
            input.addEventListener('invalid', function(e) {
                e.preventDefault();
                
                let message = '';
                const fieldName = input.labels && input.labels[0] ? input.labels[0].textContent : input.name;
                
                if (input.validity.valueMissing) {
                    message = fieldName + ' alanı gereklidir.';
                } else if (input.validity.typeMismatch) {
                    if (input.type === 'email') {
                        message = 'Geçerli bir e-posta adresi giriniz.';
                    } else {
                        message = fieldName + ' alanı geçersiz formatta.';
                    }
                } else if (input.validity.patternMismatch) {
                    message = fieldName + ' alanı geçersiz formatta.';
                } else if (input.validity.tooShort) {
                    message = fieldName + ' alanı çok kısa. En az ' + input.minLength + ' karakter olmalıdır.';
                } else if (input.validity.tooLong) {
                    message = fieldName + ' alanı çok uzun. En fazla ' + input.maxLength + ' karakter olabilir.';
                } else if (input.validity.rangeUnderflow) {
                    message = fieldName + ' alanı çok küçük. Minimum değer: ' + input.min;
                } else if (input.validity.rangeOverflow) {
                    message = fieldName + ' alanı çok büyük. Maksimum değer: ' + input.max;
                } else if (input.validity.stepMismatch) {
                    message = fieldName + ' alanı geçersiz adım değeri.';
                } else {
                    message = fieldName + ' alanı geçersiz.';
                }
                
                // Set custom message
                input.setCustomValidity(message);
                
                // Show the message
                if (!input.nextElementSibling || !input.nextElementSibling.classList.contains('invalid-feedback')) {
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    errorDiv.textContent = message;
                    input.parentNode.appendChild(errorDiv);
                } else {
                    input.nextElementSibling.textContent = message;
                }
                
                input.classList.add('is-invalid');
            });
            
            // Clear custom message on input
            input.addEventListener('input', function() {
                if (input.validity.valid) {
                    input.setCustomValidity('');
                    input.classList.remove('is-invalid');
                    const errorDiv = input.nextElementSibling;
                    if (errorDiv && errorDiv.classList.contains('invalid-feedback')) {
                        errorDiv.remove();
                    }
                }
            });
        });
    });
});
