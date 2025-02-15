<?php 
$pageTitle = "Color Picker - Free Developer Tool";
$pageDescription = "Pick and convert color codes online for free.";
$pageKeywords = "color picker, color converter, developer tool, online color tool, color codes";
include '../../includes/header.php';
?>

<title>Color Picker - Free Developer Tool</title>
<meta name="description" content="Pick and convert color codes online for free.">
<meta name="keywords" content="color picker, color converter, developer tool, online color tool, color codes">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Color Picker",
  "description": "Pick and convert color codes online for free.",
  "applicationCategory": "Developer Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container-fluid py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Color Picker</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-palette fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Color Picker</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Pick colors and convert between different color formats.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label">Enter Color Code:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="color-code-input" placeholder="#ff0000">
                            <button class="btn btn-danger" id="apply-color-code">Apply</button>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label">Color Picker:</label>
                                <div class="input-group">
                                    <input type="color" class="form-control form-control-color w-100" id="color-picker" value="#ff0000">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Color Preview:</label>
                                <div class="card">
                                    <div id="color-preview" class="card-body" style="height: 100px; background-color: #ff0000;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Color Values:</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">HEX</span>
                                    <input type="text" class="form-control" id="hex-value" value="#ff0000">
                                    <button class="btn btn-outline-secondary copy-btn" data-target="hex-value">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">RGB</span>
                                    <input type="text" class="form-control" id="rgb-value" readonly>
                                    <button class="btn btn-outline-secondary copy-btn" data-target="rgb-value">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">HSL</span>
                                    <input type="text" class="form-control" id="hsl-value" readonly>
                                    <button class="btn btn-outline-secondary copy-btn" data-target="hsl-value">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Color Components:</label>
                                <div class="row g-2">
                                    <div class="col-4">
                                        <label class="form-label small">Red:</label>
                                        <input type="number" class="form-control" id="red-value" min="0" max="255" value="255">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label small">Green:</label>
                                        <input type="number" class="form-control" id="green-value" min="0" max="255" value="0">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label small">Blue:</label>
                                        <input type="number" class="form-control" id="blue-value" min="0" max="255" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Matching Colors:</label>
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="card">
                                    <div id="complementary-color" class="card-body" style="height: 100px;"></div>
                                </div>
                                <p class="text-center mt-2">Complementary</p>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div id="analogous-color-1" class="card-body" style="height: 100px;"></div>
                                </div>
                                <p class="text-center mt-2">Analogous 1</p>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div id="analogous-color-2" class="card-body" style="height: 100px;"></div>
                                </div>
                                <p class="text-center mt-2">Analogous 2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const colorPicker = document.getElementById('color-picker');
        const colorPreview = document.getElementById('color-preview');
        const hexValue = document.getElementById('hex-value');
        const rgbValue = document.getElementById('rgb-value');
        const hslValue = document.getElementById('hsl-value');
        const redValue = document.getElementById('red-value');
        const greenValue = document.getElementById('green-value');
        const blueValue = document.getElementById('blue-value');
        const complementaryColor = document.getElementById('complementary-color');
        const analogousColor1 = document.getElementById('analogous-color-1');
        const analogousColor2 = document.getElementById('analogous-color-2');
        const colorCodeInput = document.getElementById('color-code-input');
        const applyColorCodeBtn = document.getElementById('apply-color-code');
    
        function updateColorValues() {
            const color = colorPicker.value;
            colorPreview.style.backgroundColor = color;
            hexValue.value = color;
    
            const rgb = hexToRgb(color);
            rgbValue.value = `rgb(${rgb.r}, ${rgb.g}, ${rgb.b})`;
    
            const hsl = rgbToHsl(rgb.r, rgb.g, rgb.b);
            hslValue.value = `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;
    
            redValue.value = rgb.r;
            greenValue.value = rgb.g;
            blueValue.value = rgb.b;
    
            // Update matching colors
            complementaryColor.style.backgroundColor = `hsl(${(hsl.h + 180) % 360}, ${hsl.s}%, ${hsl.l}%)`;
            analogousColor1.style.backgroundColor = `hsl(${(hsl.h + 30) % 360}, ${hsl.s}%, ${hsl.l}%)`;
            analogousColor2.style.backgroundColor = `hsl(${(hsl.h - 30 + 360) % 360}, ${hsl.s}%, ${hsl.l}%)`;
        }
    
        function hexToRgb(hex) {
            const bigint = parseInt(hex.slice(1), 16);
            const r = (bigint >> 16) & 255;
            const g = (bigint >> 8) & 255;
            const b = bigint & 255;
            return { r, g, b };
        }
    
        function rgbToHsl(r, g, b) {
            r /= 255, g /= 255, b /= 255;
            const max = Math.max(r, g, b), min = Math.min(r, g, b);
            let h, s, l = (max + min) / 2;
    
            if (max === min) {
                h = s = 0; // achromatic
            } else {
                const d = max - min;
                s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                switch (max) {
                    case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                    case g: h = (b - r) / d + 2; break;
                    case b: h = (r - g) / d + 4; break;
                }
                h /= 6;
            }
    
            return { h: Math.round(h * 360), s: Math.round(s * 100), l: Math.round(l * 100) };
        }
    
        function isValidHex(hex) {
            return /^#([0-9A-F]{3}){1,2}$/i.test(hex);
        }
    
        function isValidRgb(rgb) {
            return /^rgb\\((\\d{1,3}),\\s*(\\d{1,3}),\\s*(\\d{1,3})\\)$/.test(rgb);
        }
    
        applyColorCodeBtn.addEventListener('click', function() {
            const colorCode = colorCodeInput.value.trim();
            if (isValidHex(colorCode)) {
                colorPicker.value = colorCode;
                updateColorValues();
            } else if (isValidRgb(colorCode)) {
                const rgbMatch = colorCode.match(/^rgb\\((\\d{1,3}),\\s*(\\d{1,3}),\\s*(\\d{1,3})\\)$/);
                const r = parseInt(rgbMatch[1]);
                const g = parseInt(rgbMatch[2]);
                const b = parseInt(rgbMatch[3]);
                const hex = `#${((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1)}`;
                colorPicker.value = hex;
                updateColorValues();
            } else {
                alert('Please enter a valid HEX or RGB color code.');
            }
        });
    
        colorPicker.addEventListener('input', updateColorValues);
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                copyToClipboard(this.dataset.target);
            });
        });
    
        updateColorValues(); // Initial update
    });
    document.addEventListener('DOMContentLoaded', function() {
        const colorPicker = document.getElementById('color-picker');
        const colorPreview = document.getElementById('color-preview');
        const hexValue = document.getElementById('hex-value');
        const rgbValue = document.getElementById('rgb-value');
        const hslValue = document.getElementById('hsl-value');
        const redValue = document.getElementById('red-value');
        const greenValue = document.getElementById('green-value');
        const blueValue = document.getElementById('blue-value');
        const complementaryColor = document.getElementById('complementary-color');
        const analogousColor1 = document.getElementById('analogous-color-1');
        const analogousColor2 = document.getElementById('analogous-color-2');
    
        function updateColorValues() {
            const color = colorPicker.value;
            colorPreview.style.backgroundColor = color;
            hexValue.value = color;
    
            const rgb = hexToRgb(color);
            rgbValue.value = `rgb(${rgb.r}, ${rgb.g}, ${rgb.b})`;
    
            const hsl = rgbToHsl(rgb.r, rgb.g, rgb.b);
            hslValue.value = `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;
    
            redValue.value = rgb.r;
            greenValue.value = rgb.g;
            blueValue.value = rgb.b;
    
            // Update matching colors
            complementaryColor.style.backgroundColor = `hsl(${(hsl.h + 180) % 360}, ${hsl.s}%, ${hsl.l}%)`;
            analogousColor1.style.backgroundColor = `hsl(${(hsl.h + 30) % 360}, ${hsl.s}%, ${hsl.l}%)`;
            analogousColor2.style.backgroundColor = `hsl(${(hsl.h - 30 + 360) % 360}, ${hsl.s}%, ${hsl.l}%)`;
        }
    
        function hexToRgb(hex) {
            const bigint = parseInt(hex.slice(1), 16);
            const r = (bigint >> 16) & 255;
            const g = (bigint >> 8) & 255;
            const b = bigint & 255;
            return { r, g, b };
        }
    
        function rgbToHsl(r, g, b) {
            r /= 255, g /= 255, b /= 255;
            const max = Math.max(r, g, b), min = Math.min(r, g, b);
            let h, s, l = (max + min) / 2;
    
            if (max === min) {
                h = s = 0; // achromatic
            } else {
                const d = max - min;
                s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                switch (max) {
                    case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                    case g: h = (b - r) / d + 2; break;
                    case b: h = (r - g) / d + 4; break;
                }
                h /= 6;
            }
    
            return { h: Math.round(h * 360), s: Math.round(s * 100), l: Math.round(l * 100) };
        }
    
        function copyToClipboard(targetId) {
            const input = document.getElementById(targetId);
            input.select();
            document.execCommand('copy');
            alert(`Copied ${input.value} to clipboard`);
        }
    
        colorPicker.addEventListener('input', updateColorValues);
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                copyToClipboard(this.dataset.target);
            });
        });
    
        updateColorValues(); // Initial update
    });
document.addEventListener('DOMContentLoaded', function() {
    const colorPicker = document.getElementById('color-picker');
    const colorPreview = document.getElementById('color-preview');
    const hexValue = document.getElementById('hex-value');
    const rgbValue = document.getElementById('rgb-value');
    const hslValue = document.getElementById('hsl-value');
    const redValue = document.getElementById('red-value');
    const greenValue = document.getElementById('green-value');
    const blueValue = document.getElementById('blue-value');

    function updateColorValues() {
        const color = colorPicker.value;
        colorPreview.style.backgroundColor = color;
        hexValue.value = color;

        const rgb = hexToRgb(color);
        rgbValue.value = `rgb(${rgb.r}, ${rgb.g}, ${rgb.b})`;

        const hsl = rgbToHsl(rgb.r, rgb.g, rgb.b);
        hslValue.value = `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;

        redValue.value = rgb.r;
        greenValue.value = rgb.g;
        blueValue.value = rgb.b;
    }

    function hexToRgb(hex) {
        const bigint = parseInt(hex.slice(1), 16);
        const r = (bigint >> 16) & 255;
        const g = (bigint >> 8) & 255;
        const b = bigint & 255;
        return { r, g, b };
    }

    function rgbToHsl(r, g, b) {
        r /= 255, g /= 255, b /= 255;
        const max = Math.max(r, g, b), min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;

        if (max === min) {
            h = s = 0; // achromatic
        } else {
            const d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
            switch (max) {
                case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                case g: h = (b - r) / d + 2; break;
                case b: h = (r - g) / d + 4; break;
            }
            h /= 6;
        }

        return { h: Math.round(h * 360), s: Math.round(s * 100), l: Math.round(l * 100) };
    }

    function copyToClipboard(targetId) {
        const input = document.getElementById(targetId);
        input.select();
        document.execCommand('copy');
        alert(`Copied ${input.value} to clipboard`);
    }

    colorPicker.addEventListener('input', updateColorValues);
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            copyToClipboard(this.dataset.target);
        });
    });

    updateColorValues(); // Initial update
});
</script>

<style>
input[type="color"] {
    height: 40px;
    padding: 2px;
}
.copy-btn i {
    width: 16px;
}
</style>

<?php include '../../includes/footer.php'; ?>
