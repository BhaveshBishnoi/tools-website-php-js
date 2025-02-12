<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/image-tools/">Image Tools</a></li>
            <li class="breadcrumb-item active">Favicon Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">Favicon Generator</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-star fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Create favicons for your website in multiple sizes</p>
                    </div>

                    <div class="mb-4">
                        <div class="custom-file-drop-area" id="dropArea">
                            <input type="file" class="file-input" id="fileInput" accept="image/*" hidden>
                            <div class="text-center p-4">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-3"></i>
                                <p class="mb-0">Drag & drop your image here or</p>
                                <button type="button" class="btn btn-danger mt-3" id="selectFile">Select File</button>
                            </div>
                        </div>
                    </div>

                    <div class="favicon-options mb-4" style="display: none;">
                        <div class="row g-3">
                            <div class="col-12">
                                <h6>Favicon Sizes to Generate</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="size16" checked>
                                    <label class="form-check-label" for="size16">16x16 (Classic Favicon)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="size32" checked>
                                    <label class="form-check-label" for="size32">32x32 (Modern Favicon)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="size48" checked>
                                    <label class="form-check-label" for="size48">48x48 (Windows Site Icon)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="size180" checked>
                                    <label class="form-check-label" for="size180">180x180 (Apple Touch Icon)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="size192" checked>
                                    <label class="form-check-label" for="size192">192x192 (Android Chrome)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="previewArea" style="display: none;">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="mb-3">Original Image</h6>
                                <img id="originalPreview" class="img-fluid rounded" alt="Original image preview">
                                <div class="mt-2">
                                    <small class="text-muted">Size: <span id="originalSize">0 KB</span></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Favicon Previews</h6>
                                <div id="faviconPreviews" class="d-flex flex-wrap gap-3">
                                    <!-- Favicon previews will be added here -->
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-success" id="downloadBtn">
                                <i class="fas fa-download me-2"></i>Download Favicon Package
                            </button>
                        </div>
                    </div>

                    <!-- How to Use Section -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-info-circle me-2"></i>How to Use</h5>
                            <ol class="mb-0">
                                <li class="mb-2">Upload a square image (preferably 512x512 or larger).</li>
                                <li class="mb-2">Select the favicon sizes you want to generate.</li>
                                <li class="mb-2">Preview the generated favicons.</li>
                                <li>Download the favicon package.</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Implementation Guide -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-code me-2"></i>Implementation Guide</h5>
                            <p>Add these lines to your HTML <code>&lt;head&gt;</code> section:</p>
                            <pre class="bg-light p-3 rounded"><code>&lt;link rel="icon" type="image/x-icon" href="/favicon.ico"&gt;
&lt;link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"&gt;
&lt;link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"&gt;
&lt;link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png"&gt;
&lt;link rel="manifest" href="/site.webmanifest"&gt;</code></pre>
                        </div>
                    </div>

                    <!-- Tips Section -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-lightbulb me-2"></i>Tips for Best Results</h5>
                            <ul class="mb-0">
                                <li class="mb-2">Use a square image with a simple design that's recognizable at small sizes.</li>
                                <li class="mb-2">Start with a large image (512x512 or larger) for best quality when scaling down.</li>
                                <li class="mb-2">Ensure good contrast in your design as details may be lost at smaller sizes.</li>
                                <li>Test your favicon against both light and dark browser themes.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.custom-file-drop-area {
    border: 2px dashed #ccc;
    border-radius: 8px;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

.custom-file-drop-area.dragover {
    border-color: #0d6efd;
    background-color: #e9ecef;
}

.file-input {
    display: none;
}

.favicon-preview {
    border: 1px solid #dee2e6;
    padding: 10px;
    border-radius: 4px;
    text-align: center;
    background: #fff;
}

.favicon-preview img {
    display: block;
    margin: 0 auto 5px;
}

.favicon-preview span {
    font-size: 12px;
    color: #6c757d;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const originalPreview = document.getElementById('originalPreview');
    const originalSize = document.getElementById('originalSize');
    const faviconPreviews = document.getElementById('faviconPreviews');
    const downloadBtn = document.getElementById('downloadBtn');
    const previewArea = document.getElementById('previewArea');
    const faviconOptions = document.querySelector('.favicon-options');

    const sizeCheckboxes = [
        document.getElementById('size16'),
        document.getElementById('size32'),
        document.getElementById('size48'),
        document.getElementById('size180'),
        document.getElementById('size192')
    ];

    let currentFile = null;
    let faviconBlobs = new Map();

    // Handle drag and drop events
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropArea.classList.add('dragover');
    }

    function unhighlight(e) {
        dropArea.classList.remove('dragover');
    }

    // Handle file selection
    dropArea.addEventListener('drop', handleDrop, false);
    fileInput.addEventListener('change', handleFiles, false);
    selectFile.addEventListener('click', () => fileInput.click());

    // Handle checkbox changes
    sizeCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', generateFavicons);
    });

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles({ target: { files: files } });
    }

    async function handleFiles(e) {
        const file = e.target.files[0];
        if (!file) return;

        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select a valid image file.');
            return;
        }

        currentFile = file;

        // Show favicon options
        faviconOptions.style.display = 'block';

        // Display original image
        const reader = new FileReader();
        reader.onload = function(e) {
            originalPreview.src = e.target.result;
            originalSize.textContent = formatBytes(file.size);
            previewArea.style.display = 'block';
        }
        reader.readAsDataURL(file);

        // Generate favicons
        await generateFavicons();
    }

    async function generateFavicons() {
        if (!currentFile) return;

        try {
            // Clear previous previews
            faviconPreviews.innerHTML = '';
            faviconBlobs.clear();

            const img = new Image();
            img.src = URL.createObjectURL(currentFile);
            
            await new Promise((resolve, reject) => {
                img.onload = resolve;
                img.onerror = reject;
            });

            // Generate favicons for each selected size
            const sizes = [
                { checkbox: 'size16', size: 16, name: 'favicon-16x16.png' },
                { checkbox: 'size32', size: 32, name: 'favicon-32x32.png' },
                { checkbox: 'size48', size: 48, name: 'favicon-48x48.png' },
                { checkbox: 'size180', size: 180, name: 'apple-touch-icon.png' },
                { checkbox: 'size192', size: 192, name: 'android-chrome-192x192.png' }
            ];

            for (const sizeConfig of sizes) {
                if (!document.getElementById(sizeConfig.checkbox).checked) continue;

                const canvas = document.createElement('canvas');
                canvas.width = sizeConfig.size;
                canvas.height = sizeConfig.size;
                
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, sizeConfig.size, sizeConfig.size);

                // Convert to PNG
                const dataUrl = canvas.toDataURL('image/png');
                const response = await fetch(dataUrl);
                const blob = await response.blob();
                faviconBlobs.set(sizeConfig.name, blob);

                // Create preview
                const previewDiv = document.createElement('div');
                previewDiv.className = 'favicon-preview';
                previewDiv.innerHTML = `
                    <img src="${dataUrl}" width="${sizeConfig.size}" height="${sizeConfig.size}" 
                         style="image-rendering: pixelated;">
                    <span>${sizeConfig.size}x${sizeConfig.size}</span>
                `;
                faviconPreviews.appendChild(previewDiv);
            }

            // Generate ICO file for size 16x16
            if (document.getElementById('size16').checked) {
                const canvas = document.createElement('canvas');
                canvas.width = 16;
                canvas.height = 16;
                
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, 16, 16);

                const dataUrl = canvas.toDataURL('image/png');
                const response = await fetch(dataUrl);
                const blob = await response.blob();
                faviconBlobs.set('favicon.ico', blob);
            }

            // Generate site.webmanifest
            const manifest = {
                name: '',
                short_name: '',
                icons: [
                    {
                        src: '/android-chrome-192x192.png',
                        sizes: '192x192',
                        type: 'image/png'
                    }
                ],
                theme_color: '#ffffff',
                background_color: '#ffffff',
                display: 'standalone'
            };

            const manifestBlob = new Blob(
                [JSON.stringify(manifest, null, 2)],
                { type: 'application/json' }
            );
            faviconBlobs.set('site.webmanifest', manifestBlob);

        } catch (error) {
            console.error('Error generating favicons:', error);
            alert('Error generating favicons. Please try again.');
        }
    }

    // Handle download
    downloadBtn.addEventListener('click', async () => {
        if (faviconBlobs.size === 0) return;

        try {
            // Create a zip file
            const zip = new JSZip();

            // Add all favicon files to the zip
            for (const [filename, blob] of faviconBlobs) {
                zip.file(filename, blob);
            }

            // Generate the zip file
            const content = await zip.generateAsync({ type: 'blob' });

            // Download the zip file
            const link = document.createElement('a');
            link.href = URL.createObjectURL(content);
            link.download = 'favicons.zip';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

        } catch (error) {
            console.error('Error creating zip file:', error);
            alert('Error creating zip file. Please try again.');
        }
    });

    function formatBytes(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
});
</script>

<!-- Include JSZip library for creating zip files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<?php include '../../includes/footer.php'; ?>
