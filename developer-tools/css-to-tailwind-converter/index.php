<?php include '../../includes/header.php'; ?>
<div class="container-fluid py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active" aria-current="page">CSS to Tailwind Converter</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-exchange-alt fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">CSS to Tailwind Converter</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Easily transform your traditional CSS into Tailwind CSS utility classes.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <textarea id="cssInput" class="form-control mb-3" rows="10" placeholder="Paste your CSS here..."></textarea>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button type="button" class="btn btn-danger" onclick="convertToTailwind()">Convert</button>
                        <button type="button" class="btn btn-outline-danger" onclick="clearInput()">Clear</button>
                    </div>
                    <textarea id="tailwindOutput" class="form-control mt-3" rows="10" placeholder="Your Tailwind CSS will appear here..." readonly></textarea>
                    <button type="button" class="btn btn-success mt-3 w-100" onclick="copyToClipboard()">Copy to Clipboard</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Preview Section -->
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Live Preview</h2>
                    <div id="livePreview" class="p-3 border rounded bg-light">
                        <!-- Preview content will be injected here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How to Use and Benefits Section -->
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <h2 class="h4">How to Use</h2>
            <p>Paste your CSS code into the editor and click 'Convert' to transform it into Tailwind CSS utility classes. This tool helps streamline your workflow by adopting the Tailwind CSS framework.</p>
            <h2 class="h4">Benefits</h2>
            <ul>
                <li>Simplifies the transition to Tailwind CSS.</li>
                <li>Improves code maintainability and readability.</li>
                <li>Free to use with no registration required.</li>
            </ul>
        </div>
    </div>
</div>

<script>
function convertToTailwind() {
    const cssContent = document.getElementById('cssInput').value;
    const lines = cssContent.split('\n');
    const tailwindClasses = [];

    lines.forEach(line => {
        if (line.trim() === '') {
            tailwindClasses.push('');
            return;
        }

        // Match CSS properties and convert them to Tailwind classes
        if (line.includes('background-color:')) {
            const color = line.match(/background-color:\s*(#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}|[a-zA-Z]+);/);
            if (color) {
                tailwindClasses.push(`bg-[${color[1]}]`);
            }
        } else if (line.includes('color:')) {
            const color = line.match(/color:\s*(#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}|[a-zA-Z]+);/);
            if (color) {
                tailwindClasses.push(`text-[${color[1]}]`);
            }
        } else if (line.includes('margin:')) {
            const margin = line.match(/margin:\s*(\d+)px;/);
            if (margin) {
                tailwindClasses.push(`m-${margin[1]}`);
            }
        } else if (line.includes('padding:')) {
            const padding = line.match(/padding:\s*(\d+)px;/);
            if (padding) {
                tailwindClasses.push(`p-${padding[1]}`);
            }
        } else if (line.includes('font-size:')) {
            const fontSize = line.match(/font-size:\s*(\d+)px;/);
            if (fontSize) {
                tailwindClasses.push(`text-[${fontSize[1]}px]`);
            }
        } else if (line.includes('font-weight:')) {
            const fontWeight = line.match(/font-weight:\s*(bold|normal);/);
            if (fontWeight) {
                tailwindClasses.push(fontWeight[1] === 'bold' ? 'font-bold' : 'font-normal');
            }
        } else if (line.includes('text-align:')) {
            const textAlign = line.match(/text-align:\s*(left|center|right);/);
            if (textAlign) {
                tailwindClasses.push(`text-${textAlign[1]}`);
            }
        } else if (line.includes('border:')) {
            const border = line.match(/border:\s*(\d+)px\s+([a-zA-Z]+)\s+(#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}|[a-zA-Z]+);/);
            if (border) {
                tailwindClasses.push(`border-${border[1]} border-${border[2]} border-[${border[3]}]`);
            }
        } else if (line.includes('border-radius:')) {
            const borderRadius = line.match(/border-radius:\s*(\d+)px;/);
            if (borderRadius) {
                tailwindClasses.push(`rounded-[${borderRadius[1]}px]`);
            }
        } else if (line.includes('width:')) {
            const width = line.match(/width:\s*(\d+)px;/);
            if (width) {
                tailwindClasses.push(`w-[${width[1]}px]`);
            }
        } else if (line.includes('height:')) {
            const height = line.match(/height:\s*(\d+)px;/);
            if (height) {
                tailwindClasses.push(`h-[${height[1]}px]`);
            }
        } else if (line.includes('display:')) {
            const display = line.match(/display:\s*(flex|grid|block|inline-block|none);/);
            if (display) {
                tailwindClasses.push(display[1] === 'flex' ? 'flex' : display[1] === 'grid' ? 'grid' : display[1]);
            }
        } else if (line.includes('box-shadow:')) {
            const boxShadow = line.match(/box-shadow:\s*(.+);/);
            if (boxShadow) {
                tailwindClasses.push(`shadow-[${boxShadow[1]}]`);
            }
        } else if (line.includes('opacity:')) {
            const opacity = line.match(/opacity:\s*(\d+);/);
            if (opacity) {
                tailwindClasses.push(`opacity-${opacity[1]}`);
            }
        } else {
            // If no match, keep the original line
            tailwindClasses.push(line);
        }
    });

    // Display the converted Tailwind CSS
    const output = tailwindClasses.join('\n');
    document.getElementById('tailwindOutput').value = output;

    // Update Live Preview
    updateLivePreview(output);
}

function updateLivePreview(tailwindCSS) {
    const previewDiv = document.getElementById('livePreview');
    previewDiv.innerHTML = `<div class="${tailwindCSS.replace(/\n/g, ' ')}">Live Preview</div>`;
}

function clearInput() {
    document.getElementById('cssInput').value = '';
    document.getElementById('tailwindOutput').value = '';
    document.getElementById('livePreview').innerHTML = '';
}

function copyToClipboard() {
    const output = document.getElementById('tailwindOutput');
    output.select();
    document.execCommand('copy');
    alert('Copied to clipboard!');
}
</script>
<?php include '../../includes/footer.php'; ?>