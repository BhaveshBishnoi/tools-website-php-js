document.addEventListener('DOMContentLoaded', function() {
    const inputText = document.getElementById('input-text');
    const md5Output = document.getElementById('md5-output');
    const sha1Output = document.getElementById('sha1-output');
    const sha256Output = document.getElementById('sha256-output');
    const generateBtn = document.getElementById('generate-btn');
    const copyBtns = document.querySelectorAll('.copy-btn');

    // Generate hashes
    function generateHashes() {
        const text = inputText.value;
        
        // Generate MD5
        md5Output.value = CryptoJS.MD5(text).toString();
        
        // Generate SHA-1
        sha1Output.value = CryptoJS.SHA1(text).toString();
        
        // Generate SHA-256
        sha256Output.value = CryptoJS.SHA256(text).toString();
    }

    // Auto-generate hashes on input
    inputText.addEventListener('input', generateHashes);

    // Generate button click
    generateBtn.addEventListener('click', generateHashes);

    // Copy buttons
    copyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);
            
            navigator.clipboard.writeText(targetInput.value).then(() => {
                const icon = this.querySelector('i');
                icon.classList.remove('fa-copy');
                icon.classList.add('fa-check');
                
                setTimeout(() => {
                    icon.classList.remove('fa-check');
                    icon.classList.add('fa-copy');
                }, 2000);
            }).catch(err => {
                alert('Failed to copy text: ' + err);
            });
        });
    });

    // Generate initial hashes if there's any text
    if (inputText.value) {
        generateHashes();
    }
});
