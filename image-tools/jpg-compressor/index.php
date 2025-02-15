<?php include '../../includes/header.php'; ?>

<title>JPG Compressor - Free Online JPG Compression Tool</title>
<meta name="description" content="Compress JPG images online for free while maintaining good visual quality. No registration required!">
<meta name="keywords" content="jpg compressor, online jpg tool, free jpg compression, compress jpg images">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "JPG Compressor",
  "description": "Compress JPG images online for free while maintaining good visual quality.",
  "applicationCategory": "Image Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/image-tools/">Image Tools</a></li>
            <li class="breadcrumb-item active">JPG Compressor</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">JPG Image Compressor</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-file-image fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Compress your JPG/JPEG images with adjustable quality</p>
                    </div>

                    <div class="mb-4">
                        <div class="custom-file-drop-area" id="dropArea">
                            <input type="file" class="file-input" id="fileInput" accept=".jpg,.jpeg" hidden>
                            <div class="text-center p-4">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-3"></i>
                                <p class="mb-0">Drag & drop your JPG image here or</p>
                                <button type="button" class="btn btn-danger mt-3" id="selectFile">Select File</button>
                            </div>
                        </div>
                    </div>

                    <div class="compression-options mb-4" style="display: none;">
                        <label class="form-label">Quality Level</label>
                        <input type="range" class="form-range" id="qualityLevel" min="0" max="1" step="0.1" value="0.7">
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">High Compression</small>
                            <small class="text-muted">High Quality</small>
                        </div>
                    </div>

                    <div id="previewArea" style="display: none;">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="mb-3">Original</h6>
                                <img id="originalPreview" class="img-fluid rounded" alt="Original image preview">
                                <div class="mt-2">
                                    <small class="text-muted">Size: <span id="originalSize">0 KB</span></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Compressed</h6>
                                <img id="compressedPreview" class="img-fluid rounded" alt="Compressed image preview">
                                <div class="mt-2">
                                    <small class="text-muted">Size: <span id="compressedSize">0 KB</span></small>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="mb-3">
                                <i class="fas fa-chart-pie text-success"></i>
                                Size reduced by <span id="savingsPercent">0</span>%
                            </p>
                            <button type="button" class="btn btn-success" id="downloadBtn">
                                <i class="fas fa-download me-2"></i>Download Compressed Image
                            </button>
                        </div>
                    </div>

                    <div class="alert alert-info mt-4">
                        <h6 class="alert-heading"><i class="fas fa-info-circle me-2"></i>About JPG Compression</h6>
                        <p class="mb-0">This tool uses lossy compression to reduce JPG file size. You can adjust the quality level to find the perfect balance between file size and image quality. The compression is done entirely in your browser for instant results and privacy.</p>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/browser-image-compression/2.0.0/browser-image-compression.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const qualityLevel = document.getElementById('qualityLevel');
    const originalPreview = document.getElementById('originalPreview');
    const compressedPreview = document.getElementById('compressedPreview');
    const originalSize = document.getElementById('originalSize');
    const compressedSize = document.getElementById('compressedSize');
    const savingsPercent = document.getElementById('savingsPercent');
    const downloadBtn = document.getElementById('downloadBtn');
    const previewArea = document.getElementById('previewArea');
    const compressionOptions = document.querySelector('.compression-options');

    let compressedBlob = null;

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
        if (!file.type.startsWith('image/jpeg')) {
            alert('Please select a JPG/JPEG image file.');
            return;
        }

        // Show compression options
        compressionOptions.style.display = 'block';

        // Display original image and size
        const reader = new FileReader();
        reader.onload = function(e) {
            originalPreview.src = e.target.result;
            originalSize.textContent = formatBytes(file.size);
            previewArea.style.display = 'block';
        }
        reader.readAsDataURL(file);

        // Compress image
        await compressImage(file);
    }

    async function compressImage(file) {
        try {
            const options = {
                maxSizeMB: 1,
                maxWidthOrHeight: 1920,
                useWebWorker: true,
                initialQuality: parseFloat(qualityLevel.value)
            };

            const compressedFile = await imageCompression(file, options);
            compressedBlob = compressedFile;

            // Display compressed image and size
            const reader = new FileReader();
            reader.onload = function(e) {
                compressedPreview.src = e.target.result;
                compressedSize.textContent = formatBytes(compressedFile.size);
                
                // Calculate and display savings
                const savedBytes = file.size - compressedFile.size;
                const savedPercent = ((savedBytes / file.size) * 100).toFixed(1);
                savingsPercent.textContent = savedPercent;
            }
            reader.readAsDataURL(compressedFile);
        } catch (error) {
            console.error('Error compressing image:', error);
            alert('Error compressing image. Please try again.');
        }
    }

    async function handleQualityChange() {
        if (fileInput.files.length > 0) {
            await compressImage(fileInput.files[0]);
        }
    }

    // Handle download
    downloadBtn.addEventListener('click', () => {
        if (!compressedBlob) return;

        const link = document.createElement('a');
        link.href = URL.createObjectURL(compressedBlob);
        link.download = 'compressed_' + fileInput.files[0].name;
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
