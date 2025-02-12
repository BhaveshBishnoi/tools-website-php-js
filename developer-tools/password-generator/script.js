document.addEventListener('DOMContentLoaded', function() {
    const passwordOutput = document.getElementById('password-output');
    const lengthInput = document.getElementById('length');
    const uppercaseCheck = document.getElementById('uppercase');
    const lowercaseCheck = document.getElementById('lowercase');
    const numbersCheck = document.getElementById('numbers');
    const symbolsCheck = document.getElementById('symbols');
    const generateBtn = document.getElementById('generate-btn');
    const copyBtn = document.getElementById('copy-btn');

    const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const lowercase = 'abcdefghijklmnopqrstuvwxyz';
    const numbers = '0123456789';
    const symbols = '!@#$%^&*';

    function generatePassword() {
        let charset = '';
        let password = '';
        
        // Add selected character sets
        if (uppercaseCheck.checked) charset += uppercase;
        if (lowercaseCheck.checked) charset += lowercase;
        if (numbersCheck.checked) charset += numbers;
        if (symbolsCheck.checked) charset += symbols;

        // Validate at least one character set is selected
        if (!charset) {
            alert('Please select at least one character set');
            return;
        }

        // Get password length
        const length = parseInt(lengthInput.value);
        if (length < 4 || length > 64) {
            alert('Password length must be between 4 and 64 characters');
            return;
        }

        // Generate password
        for (let i = 0; i < length; i++) {
            password += charset.charAt(Math.floor(Math.random() * charset.length));
        }

        // Ensure password contains at least one character from each selected set
        let finalPassword = '';
        if (uppercaseCheck.checked) finalPassword += uppercase.charAt(Math.floor(Math.random() * uppercase.length));
        if (lowercaseCheck.checked) finalPassword += lowercase.charAt(Math.floor(Math.random() * lowercase.length));
        if (numbersCheck.checked) finalPassword += numbers.charAt(Math.floor(Math.random() * numbers.length));
        if (symbolsCheck.checked) finalPassword += symbols.charAt(Math.floor(Math.random() * symbols.length));

        // Fill remaining length with random characters
        while (finalPassword.length < length) {
            finalPassword += charset.charAt(Math.floor(Math.random() * charset.length));
        }

        // Shuffle the password
        finalPassword = finalPassword.split('').sort(() => Math.random() - 0.5).join('');

        passwordOutput.value = finalPassword;
    }

    // Generate initial password
    generatePassword();

    // Generate button click
    generateBtn.addEventListener('click', generatePassword);

    // Copy button click
    copyBtn.addEventListener('click', function() {
        navigator.clipboard.writeText(passwordOutput.value).then(() => {
            const icon = this.querySelector('i');
            icon.classList.remove('fa-copy');
            icon.classList.add('fa-check');
            
            setTimeout(() => {
                icon.classList.remove('fa-check');
                icon.classList.add('fa-copy');
            }, 2000);
        }).catch(err => {
            alert('Failed to copy password: ' + err);
        });
    });

    // Validate length input
    lengthInput.addEventListener('change', function() {
        const value = parseInt(this.value);
        if (value < 4) this.value = 4;
        if (value > 64) this.value = 64;
    });
});
