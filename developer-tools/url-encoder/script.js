document.addEventListener('DOMContentLoaded', function() {
    const inputUrl = document.getElementById('input-url');
    const outputUrl = document.getElementById('output-url');
    const encodeBtn = document.getElementById('encode-btn');
    const decodeBtn = document.getElementById('decode-btn');
    const copyBtn = document.getElementById('copy-btn');
    const swapBtn = document.getElementById('swap-btn');

    // Encode function
    encodeBtn.addEventListener('click', function() {
        try {
            const text = inputUrl.value;
            const encoded = encodeURIComponent(text);
            outputUrl.value = encoded;
        } catch (error) {
            alert('Error encoding URL: ' + error.message);
        }
    });

    // Decode function
    decodeBtn.addEventListener('click', function() {
        try {
            const text = inputUrl.value;
            const decoded = decodeURIComponent(text);
            outputUrl.value = decoded;
        } catch (error) {
            alert('Error decoding URL: Invalid encoded string');
        }
    });

    // Copy button
    copyBtn.addEventListener('click', function() {
        const result = outputUrl.value;
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
        const temp = inputUrl.value;
        inputUrl.value = outputUrl.value;
        outputUrl.value = temp;
    });
});
