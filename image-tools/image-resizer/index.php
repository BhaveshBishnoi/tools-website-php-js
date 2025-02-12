<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/image-tools/">Image Tools</a></li>
            <li class="breadcrumb-item active">Image Resizer</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">Image Resizer</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-expand-arrows-alt fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Resize your images while maintaining aspect ratio</p>
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

                    <div class="resize-options mb-4" style="display: none;">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Width (pixels)</label>
                                <input type="number" class="form-control" id="widthInput" min="1" max="10000">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Height (pixels)</label>
                                <input type="number" class="form-control" id="heightInput" min="1" max="10000">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="maintainAspectRatio" checked>
                                    <label class="form-check-label" for="maintainAspectRatio">
                                        Maintain aspect ratio
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Output Format</label>
                                <select class="form-select" id="outputFormat">
                                    <option value="image/jpeg">JPG</option>
                                    <option value="image/png">PNG</option>
                                    <option value="image/webp">WebP</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Quality</label>
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
                                    <small class="text-muted">Size: <span id="originalSize">0 KB</span></small><br>
                                    <small class="text-muted">Dimensions: <span id="originalDimensions">0 x 0</span></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Resized</h6>
                                <img id="resizedPreview" class="img-fluid rounded" alt="Resized image preview">
                                <div class="mt-2">
                                    <small class="text-muted">Size: <span id="resizedSize">0 KB</span></small><br>
                                    <small class="text-muted">Dimensions: <span id="resizedDimensions">0 x 0</span></small>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-success" id="downloadBtn">
                                <i class="fas fa-download me-2"></i>Download Resized Image
                            </button>
                        </div>
                    </div>

                    <!-- How to Use Section -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-info-circle me-2"></i>How to Use</h5>
                            <ol class="mb-0">
                                <li class="mb-2">Upload your image using drag & drop or the select button.</li>
                                <li class="mb-2">Enter your desired width and/or height in pixels.</li>
                                <li class="mb-2">Choose to maintain aspect ratio if needed.</li>
                                <li class="mb-2">Select your preferred output format and quality.</li>
                                <li>Click download to save your resized image.</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Tips Section -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-lightbulb me-2"></i>Tips for Best Results</h5>
                            <ul class="mb-0">
                                <li class="mb-2">Keep aspect ratio enabled to prevent image distortion.</li>
                                <li class="mb-2">For web images, consider using WebP format for better compression.</li>
                                <li class="mb-2">Avoid upscaling images as it may result in quality loss.</li>
                                <li>Use PNG for images with text or sharp edges.</li>
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const widthInput = document.getElementById('widthInput');
    const heightInput = document.getElementById('heightInput');
    const maintainAspectRatio = document.getElementById('maintainAspectRatio');
    const outputFormat = document.getElementById('outputFormat');
    const qualityLevel = document.getElementById('qualityLevel');
    const originalPreview = document.getElementById('originalPreview');
    const resizedPreview = document.getElementById('resizedPreview');
    const originalSize = document.getElementById('originalSize');
    const resizedSize = document.getElementById('resizedSize');
    const originalDimensions = document.getElementById('originalDimensions');
    const resizedDimensions = document.getElementById('resizedDimensions');
    const downloadBtn = document.getElementById('downloadBtn');
    const previewArea = document.getElementById('previewArea');
    const resizeOptions = document.querySelector('.resize-options');

    let resizedBlob = null;
    let currentFile = null;
    let originalWidth = 0;
    let originalHeight = 0;
    let aspectRatio = 1;

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

    // Handle dimension inputs
    widthInput.addEventListener('input', handleDimensionChange);
    heightInput.addEventListener('input', handleDimensionChange);
    maintainAspectRatio.addEventListener('change', handleDimensionChange);
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

        // Show resize options
        resizeOptions.style.display = 'block';

        // Get original dimensions and set up aspect ratio
        const img = new Image();
        img.src = URL.createObjectURL(file);
        
        img.onload = function() {
            originalWidth = img.width;
            originalHeight = img.height;
            aspectRatio = originalWidth / originalHeight;

            // Set initial dimensions
            widthInput.value = originalWidth;
            heightInput.value = originalHeight;

            // Display original image and info
            originalPreview.src = img.src;
            originalSize.textContent = formatBytes(file.size);
            originalDimensions.textContent = `${originalWidth} x ${originalHeight}`;
            previewArea.style.display = 'block';

            // Initial resize
            resizeImage();
        };
    }

    function handleDimensionChange(e) {
        const input = e.target;
        
        if (maintainAspectRatio.checked) {
            if (input === widthInput) {
                const width = parseInt(widthInput.value) || 0;
                heightInput.value = Math.round(width / aspectRatio);
            } else if (input === heightInput) {
                const height = parseInt(heightInput.value) || 0;
                widthInput.value = Math.round(height * aspectRatio);
            }
        }

        resizeImage();
    }

    async function resizeImage() {
        if (!currentFile) return;

        try {
            const img = new Image();
            img.src = URL.createObjectURL(currentFile);
            
            await new Promise((resolve, reject) => {
                img.onload = resolve;
                img.onerror = reject;
            });

            const canvas = document.createElement('canvas');
            const width = parseInt(widthInput.value) || originalWidth;
            const height = parseInt(heightInput.value) || originalHeight;
            
            canvas.width = width;
            canvas.height = height;
            
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0, width, height);

            // Convert to selected format
            const format = outputFormat.value;
            const quality = parseFloat(qualityLevel.value);
            const dataUrl = canvas.toDataURL(format, quality);

            // Convert data URL to Blob
            const response = await fetch(dataUrl);
            resizedBlob = await response.blob();

            // Display resized image and info
            resizedPreview.src = dataUrl;
            resizedSize.textContent = formatBytes(resizedBlob.size);
            resizedDimensions.textContent = `${width} x ${height}`;

        } catch (error) {
            console.error('Error resizing image:', error);
            alert('Error resizing image. Please try again.');
        }
    }

    function handleFormatChange() {
        resizeImage();
    }

    function handleQualityChange() {
        resizeImage();
    }

    // Handle download
    downloadBtn.addEventListener('click', () => {
        if (!resizedBlob) return;

        const link = document.createElement('a');
        link.href = URL.createObjectURL(resizedBlob);
        const originalName = currentFile.name;
        const extension = outputFormat.value.split('/')[1];
        const newName = originalName.substring(0, originalName.lastIndexOf('.')) + '_resized.' + extension;
        link.download = newName;
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
