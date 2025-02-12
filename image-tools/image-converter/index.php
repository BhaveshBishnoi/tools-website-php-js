<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/image-tools/">Image Tools</a></li>
            <li class="breadcrumb-item active">Image Converter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">Image Format Converter</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-exchange-alt fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Convert images between different formats (PNG, JPG, WebP)</p>
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

                    <div class="conversion-options mb-4" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Output Format</label>
                                <select class="form-select" id="outputFormat">
                                    <option value="image/png">PNG</option>
                                    <option value="image/jpeg">JPG</option>
                                    <option value="image/webp">WebP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Quality (for JPG/WebP)</label>
                                <input type="range" class="form-range" id="qualityLevel" min="0" max="1" step="0.1" value="0.8">
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">Lower</small>
                                    <small class="text-muted">Higher</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="previewArea" style="display: none;">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="mb-3">Original</h6>
                                <img id="originalPreview" class="img-fluid rounded" alt="Original image preview">
                                <div class="mt-2">
                                    <small class="text-muted">Format: <span id="originalFormat">Unknown</span></small><br>
                                    <small class="text-muted">Size: <span id="originalSize">0 KB</span></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Converted</h6>
                                <img id="convertedPreview" class="img-fluid rounded" alt="Converted image preview">
                                <div class="mt-2">
                                    <small class="text-muted">Format: <span id="convertedFormat">Unknown</span></small><br>
                                    <small class="text-muted">Size: <span id="convertedSize">0 KB</span></small>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-success" id="downloadBtn">
                                <i class="fas fa-download me-2"></i>Download Converted Image
                            </button>
                        </div>
                    </div>

                    <!-- How to Use Section -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-info-circle me-2"></i>How to Use</h5>
                            <ol class="mb-0">
                                <li class="mb-2">Upload your image by dragging and dropping or clicking the select button.</li>
                                <li class="mb-2">Choose your desired output format (PNG, JPG, or WebP).</li>
                                <li class="mb-2">Adjust the quality slider if converting to JPG or WebP.</li>
                                <li>Click the download button to save your converted image.</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Format Comparison -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-chart-bar me-2"></i>Format Comparison</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Format</th>
                                            <th>Best For</th>
                                            <th>Pros</th>
                                            <th>Cons</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>PNG</td>
                                            <td>Graphics, logos, text</td>
                                            <td>Lossless, transparency</td>
                                            <td>Larger file size</td>
                                        </tr>
                                        <tr>
                                            <td>JPG</td>
                                            <td>Photos, complex images</td>
                                            <td>Small file size</td>
                                            <td>Lossy, no transparency</td>
                                        </tr>
                                        <tr>
                                            <td>WebP</td>
                                            <td>Web images</td>
                                            <td>Small size, transparency</td>
                                            <td>Limited browser support</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const outputFormat = document.getElementById('outputFormat');
    const qualityLevel = document.getElementById('qualityLevel');
    const originalPreview = document.getElementById('originalPreview');
    const convertedPreview = document.getElementById('convertedPreview');
    const originalSize = document.getElementById('originalSize');
    const convertedSize = document.getElementById('convertedSize');
    const originalFormat = document.getElementById('originalFormat');
    const convertedFormat = document.getElementById('convertedFormat');
    const downloadBtn = document.getElementById('downloadBtn');
    const previewArea = document.getElementById('previewArea');
    const conversionOptions = document.querySelector('.conversion-options');

    let convertedBlob = null;
    let currentFile = null;

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
    outputFormat.addEventListener('change', handleFormatChange);
    qualityLevel.addEventListener('input', handleQualityChange);

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

        // Show conversion options
        conversionOptions.style.display = 'block';

        // Display original image and info
        const reader = new FileReader();
        reader.onload = function(e) {
            originalPreview.src = e.target.result;
            originalSize.textContent = formatBytes(file.size);
            originalFormat.textContent = file.type.split('/')[1].toUpperCase();
            previewArea.style.display = 'block';
        }
        reader.readAsDataURL(file);

        // Convert image
        await convertImage(file);
    }

    async function convertImage(file) {
        try {
            // Create a canvas element
            const img = new Image();
            img.src = URL.createObjectURL(file);
            
            await new Promise((resolve, reject) => {
                img.onload = resolve;
                img.onerror = reject;
            });

            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);

            // Convert to selected format
            const format = outputFormat.value;
            const quality = parseFloat(qualityLevel.value);
            const dataUrl = canvas.toDataURL(format, quality);

            // Convert data URL to Blob
            const response = await fetch(dataUrl);
            convertedBlob = await response.blob();

            // Display converted image and info
            convertedPreview.src = dataUrl;
            convertedSize.textContent = formatBytes(convertedBlob.size);
            convertedFormat.textContent = format.split('/')[1].toUpperCase();

        } catch (error) {
            console.error('Error converting image:', error);
            alert('Error converting image. Please try again.');
        }
    }

    async function handleFormatChange() {
        if (currentFile) {
            await convertImage(currentFile);
        }
    }

    async function handleQualityChange() {
        if (currentFile) {
            await convertImage(currentFile);
        }
    }

    // Handle download
    downloadBtn.addEventListener('click', () => {
        if (!convertedBlob) return;

        const link = document.createElement('a');
        link.href = URL.createObjectURL(convertedBlob);
        const originalName = currentFile.name;
        const extension = outputFormat.value.split('/')[1];
        const newName = originalName.substring(0, originalName.lastIndexOf('.')) + '.' + extension;
        link.download = 'converted_' + newName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
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

<?php include '../../includes/footer.php'; ?>
