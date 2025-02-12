document.addEventListener('DOMContentLoaded', function() {
    const colorPicker = document.getElementById('color-picker');
    const colorPreview = document.getElementById('color-preview');
    const hexValue = document.getElementById('hex-value');
    const rgbValue = document.getElementById('rgb-value');
    const hslValue = document.getElementById('hsl-value');
    const redValue = document.getElementById('red-value');
    const greenValue = document.getElementById('green-value');
    const blueValue = document.getElementById('blue-value');
    const copyBtns = document.querySelectorAll('.copy-btn');

    // Convert RGB to HSL
    function rgbToHsl(r, g, b) {
        r /= 255;
        g /= 255;
        b /= 255;

        const max = Math.max(r, g, b);
        const min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;

        if (max === min) {
            h = s = 0;
        } else {
            const d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);

            switch (max) {
                case r:
                    h = (g - b) / d + (g < b ? 6 : 0);
                    break;
                case g:
                    h = (b - r) / d + 2;
                    break;
                case b:
                    h = (r - g) / d + 4;
                    break;
            }

            h /= 6;
        }

        return [
            Math.round(h * 360),
            Math.round(s * 100),
            Math.round(l * 100)
        ];
    }

    // Update all color values
    function updateColorValues(hex) {
        // Update color picker and preview
        colorPicker.value = hex;
        colorPreview.style.backgroundColor = hex;
        hexValue.value = hex;

        // Convert hex to RGB
        const r = parseInt(hex.slice(1, 3), 16);
        const g = parseInt(hex.slice(3, 5), 16);
        const b = parseInt(hex.slice(5, 7), 16);

        // Update RGB values
        redValue.value = r;
        greenValue.value = g;
        blueValue.value = b;
        rgbValue.value = `rgb(${r}, ${g}, ${b})`;

        // Convert to HSL and update
        const [h, s, l] = rgbToHsl(r, g, b);
        hslValue.value = `hsl(${h}, ${s}%, ${l}%)`;
    }

    // Handle color picker change
    colorPicker.addEventListener('input', function() {
        updateColorValues(this.value);
    });

    // Handle hex input change
    hexValue.addEventListener('input', function() {
        let hex = this.value;
        if (hex.match(/^#[0-9A-Fa-f]{6}$/)) {
            updateColorValues(hex);
        }
    });

    // Handle RGB component changes
    [redValue, greenValue, blueValue].forEach(input => {
        input.addEventListener('input', function() {
            const r = Math.min(255, Math.max(0, parseInt(redValue.value) || 0));
            const g = Math.min(255, Math.max(0, parseInt(greenValue.value) || 0));
            const b = Math.min(255, Math.max(0, parseInt(blueValue.value) || 0));

            const hex = '#' + 
                r.toString(16).padStart(2, '0') +
                g.toString(16).padStart(2, '0') +
                b.toString(16).padStart(2, '0');

            updateColorValues(hex);
        });
    });

    // Handle copy buttons
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
                alert('Failed to copy value: ' + err);
            });
        });
    });

    // Initialize with default color
    updateColorValues(colorPicker.value);
});
