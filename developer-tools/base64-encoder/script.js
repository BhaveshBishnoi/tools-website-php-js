document.addEventListener('DOMContentLoaded', function() {
    const inputText = document.getElementById('input-text');
    const outputText = document.getElementById('output-text');
    const encodeBtn = document.getElementById('encode-btn');
    const decodeBtn = document.getElementById('decode-btn');
    const copyBtn = document.getElementById('copy-btn');
    const swapBtn = document.getElementById('swap-btn');

    // Encode function
    encodeBtn.addEventListener('click', function() {
        try {
            const text = inputText.value;
            const encoded = btoa(unescape(encodeURIComponent(text)));
            outputText.value = encoded;
        } catch (error) {
            alert('Error encoding text: ' + error.message);
        }
    });

    // Decode function
    decodeBtn.addEventListener('click', function() {
        try {
            const text = inputText.value;
            const decoded = decodeURIComponent(escape(atob(text)));
            outputText.value = decoded;
        } catch (error) {
            alert('Error decoding text: Invalid Base64 string');
        }
    });

    // Copy button
    copyBtn.addEventListener('click', function() {
        const result = outputText.value;
        navigator.clipboard.writeText(result).then(function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        }.bind(this)).catch(function(err) {
            alert('Failed to copy text: ' + err);
        });
    });

    // Swap button
    swapBtn.addEventListener('click', function() {
        const temp = inputText.value;
        inputText.value = outputText.value;
        outputText.value = temp;
    });
});
