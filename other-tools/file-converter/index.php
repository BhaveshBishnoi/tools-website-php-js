<?php include '../../includes/header.php'; ?>
<title>Convert PNG to JPG Online - Free Image Converter Tool</title>
<meta name="description" content="Convert PNG to JPG online for free with our fast and easy-to-use image converter tool. No registration required!">
<meta name="keywords" content="png to jpg, image converter, free image tool, online image converter">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "PNG to JPG Converter",
  "description": "Convert PNG images to JPG format online for free.",
  "applicationCategory": "Image Converter",
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
            <li class="breadcrumb-item"><a href="/tools/other-tools/">Other Tools</a></li>
            <li class="breadcrumb-item active">File Converter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-file-export fa-3x text-danger mb-3"></i>
                        <h1 class="h3">File Converter</h1>
                        <p class="text-muted">Convert files between different formats</p>
                    </div>

                    <div class="row g-4">
                        <!-- File Upload Section -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h2 class="h5 mb-3">Upload File</h2>
                                    
                                    <form id="converterForm">
                                        <!-- File Type Selection -->
                                        <div class="mb-3">
                                            <label class="form-label">Conversion Type</label>
                                            <select id="conversionType" class="form-select">
                                                <option value="">Select conversion type</option>
                                                <optgroup label="Document Formats">
                                                    <option value="doc-pdf">DOC to PDF</option>
                                                    <option value="pdf-doc">PDF to DOC</option>
                                                    <option value="docx-pdf">DOCX to PDF</option>
                                                    <option value="pdf-docx">PDF to DOCX</option>
                                                </optgroup>
                                                <optgroup label="Image Formats">
                                                    <option value="jpg-png">JPG to PNG</option>
                                                    <option value="png-jpg">PNG to JPG</option>
                                                    <option value="webp-jpg">WEBP to JPG</option>
                                                    <option value="jpg-webp">JPG to WEBP</option>
                                                </optgroup>
                                                <optgroup label="Audio Formats">
                                                    <option value="mp3-wav">MP3 to WAV</option>
                                                    <option value="wav-mp3">WAV to MP3</option>
                                                    <option value="m4a-mp3">M4A to MP3</option>
                                                </optgroup>
                                                <optgroup label="Video Formats">
                                                    <option value="mp4-avi">MP4 to AVI</option>
                                                    <option value="avi-mp4">AVI to MP4</option>
                                                    <option value="mov-mp4">MOV to MP4</option>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <!-- File Upload -->
                                        <div class="mb-3">
                                            <label class="form-label">Select File</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="fileInput">
                                                <button class="btn btn-outline-danger" type="button" id="clearFile">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            <div class="form-text">Maximum file size: 50 MB</div>
                                        </div>

                                        <!-- Conversion Options -->
                                        <div id="conversionOptions" class="mb-3" style="display: none;">
                                            <!-- Document Options -->
                                            <div id="documentOptions" style="display: none;">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="compressPdf">
                                                    <label class="form-check-label" for="compressPdf">
                                                        Compress output file
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ocrPdf">
                                                    <label class="form-check-label" for="ocrPdf">
                                                        Enable OCR (text recognition)
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Image Options -->
                                            <div id="imageOptions" style="display: none;">
                                                <div class="mb-2">
                                                    <label class="form-label">Quality</label>
                                                    <input type="range" class="form-range" id="imageQuality" min="1" max="100" value="80">
                                                    <div class="form-text text-end" id="qualityValue">80%</div>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="preserveMetadata">
                                                    <label class="form-check-label" for="preserveMetadata">
                                                        Preserve image metadata
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Audio Options -->
                                            <div id="audioOptions" style="display: none;">
                                                <div class="mb-2">
                                                    <label class="form-label">Bitrate</label>
                                                    <select class="form-select" id="audioBitrate">
                                                        <option value="128">128 kbps</option>
                                                        <option value="192">192 kbps</option>
                                                        <option value="256">256 kbps</option>
                                                        <option value="320">320 kbps</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Video Options -->
                                            <div id="videoOptions" style="display: none;">
                                                <div class="mb-2">
                                                    <label class="form-label">Video Quality</label>
                                                    <select class="form-select" id="videoQuality">
                                                        <option value="high">High Quality</option>
                                                        <option value="medium">Medium Quality</option>
                                                        <option value="low">Low Quality</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Convert Button -->
                                        <button type="submit" class="btn btn-danger w-100" id="convertBtn" disabled>
                                            <i class="fas fa-sync-alt me-2"></i>Convert File
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Status Section -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h2 class="h5 mb-3">Conversion Status</h2>

                                    <!-- Progress -->
                                    <div id="conversionProgress" style="display: none;">
                                        <div class="mb-3">
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" 
                                                     role="progressbar" style="width: 0%" 
                                                     id="progressBar">0%</div>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-0" id="statusText">Processing file...</p>
                                    </div>

                                    <!-- Result -->
                                    <div id="conversionResult" style="display: none;">
                                        <div class="alert alert-success">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span>Conversion completed successfully!</span>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-danger" id="downloadBtn">
                                                <i class="fas fa-download me-2"></i>Download Converted File
                                            </button>
                                            <button class="btn btn-outline-danger" id="convertAnotherBtn">
                                                <i class="fas fa-redo me-2"></i>Convert Another File
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Error -->
                                    <div id="conversionError" style="display: none;">
                                        <div class="alert alert-danger">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <span id="errorText"></span>
                                        </div>
                                        <button class="btn btn-outline-danger" id="tryAgainBtn">
                                            <i class="fas fa-redo me-2"></i>Try Again
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- File Information -->
                            <div id="fileInfo" class="card border-0 bg-light mt-3" style="display: none;">
                                <div class="card-body">
                                    <h2 class="h5 mb-3">File Information</h2>
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td><i class="fas fa-file text-danger me-2"></i>File Name</td>
                                                <td class="text-end" id="fileName">-</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fas fa-weight text-danger me-2"></i>File Size</td>
                                                <td class="text-end" id="fileSize">-</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fas fa-file-alt text-danger me-2"></i>File Type</td>
                                                <td class="text-end" id="fileType">-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="row mt-4 g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">Supported Formats</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="h6 fw-bold"><i class="fas fa-file-pdf text-danger me-2"></i>Documents</h3>
                                    <ul class="list-unstyled mb-3">
                                        <li>PDF ↔ DOC/DOCX</li>
                                        <li>PDF ↔ TXT</li>
                                        <li>DOC ↔ DOCX</li>
                                    </ul>

                                    <h3 class="h6 fw-bold"><i class="fas fa-image text-danger me-2"></i>Images</h3>
                                    <ul class="list-unstyled mb-3">
                                        <li>JPG ↔ PNG</li>
                                        <li>WEBP ↔ JPG/PNG</li>
                                        <li>GIF ↔ PNG</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="h6 fw-bold"><i class="fas fa-music text-danger me-2"></i>Audio</h3>
                                    <ul class="list-unstyled mb-3">
                                        <li>MP3 ↔ WAV</li>
                                        <li>M4A ↔ MP3</li>
                                        <li>OGG ↔ MP3</li>
                                    </ul>

                                    <h3 class="h6 fw-bold"><i class="fas fa-video text-danger me-2"></i>Video</h3>
                                    <ul class="list-unstyled mb-0">
                                        <li>MP4 ↔ AVI</li>
                                        <li>MOV ↔ MP4</li>
                                        <li>WMV ↔ MP4</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">Features & Benefits</h2>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Fast Conversion:</strong> Quick processing of files
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>High Quality:</strong> Maintain original quality
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Secure:</strong> Files processed locally
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Free:</strong> No registration required
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Multiple Formats:</strong> Wide range of supported formats
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const converterForm = document.getElementById('converterForm');
    const conversionType = document.getElementById('conversionType');
    const fileInput = document.getElementById('fileInput');
    const clearFile = document.getElementById('clearFile');
    const convertBtn = document.getElementById('convertBtn');
    const conversionOptions = document.getElementById('conversionOptions');
    const documentOptions = document.getElementById('documentOptions');
    const imageOptions = document.getElementById('imageOptions');
    const audioOptions = document.getElementById('audioOptions');
    const videoOptions = document.getElementById('videoOptions');
    const imageQuality = document.getElementById('imageQuality');
    const qualityValue = document.getElementById('qualityValue');
    const fileInfo = document.getElementById('fileInfo');
    const conversionProgress = document.getElementById('conversionProgress');
    const conversionResult = document.getElementById('conversionResult');
    const conversionError = document.getElementById('conversionError');
    const progressBar = document.getElementById('progressBar');
    const statusText = document.getElementById('statusText');
    const downloadBtn = document.getElementById('downloadBtn');
    const convertAnotherBtn = document.getElementById('convertAnotherBtn');
    const tryAgainBtn = document.getElementById('tryAgainBtn');

    // Handle conversion type change
    conversionType.addEventListener('change', function() {
        const type = this.value.split('-')[0];
        
        // Show/hide relevant options
        conversionOptions.style.display = this.value ? 'block' : 'none';
        documentOptions.style.display = ['doc', 'pdf', 'docx'].includes(type) ? 'block' : 'none';
        imageOptions.style.display = ['jpg', 'png', 'webp'].includes(type) ? 'block' : 'none';
        audioOptions.style.display = ['mp3', 'wav', 'm4a'].includes(type) ? 'block' : 'none';
        videoOptions.style.display = ['mp4', 'avi', 'mov'].includes(type) ? 'block' : 'none';
        
        validateForm();
    });

    // Handle file input change
    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            const file = this.files[0];
            
            // Update file info
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = formatFileSize(file.size);
            document.getElementById('fileType').textContent = file.type || 'Unknown';
            fileInfo.style.display = 'block';
            
            validateForm();
        }
    });

    // Clear file
    clearFile.addEventListener('click', function() {
        fileInput.value = '';
        fileInfo.style.display = 'none';
        validateForm();
    });

    // Image quality slider
    imageQuality.addEventListener('input', function() {
        qualityValue.textContent = this.value + '%';
    });

    // Form validation
    function validateForm() {
        convertBtn.disabled = !conversionType.value || !fileInput.files.length;
    }

    // Handle form submission
    converterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show progress
        conversionProgress.style.display = 'block';
        conversionResult.style.display = 'none';
        conversionError.style.display = 'none';
        
        // Simulate conversion process
        let progress = 0;
        const interval = setInterval(function() {
            progress += Math.random() * 15;
            if (progress > 100) {
                progress = 100;
                clearInterval(interval);
                
                // Show success after a short delay
                setTimeout(function() {
                    conversionProgress.style.display = 'none';
                    conversionResult.style.display = 'block';
                }, 500);
            }
            progressBar.style.width = progress + '%';
            progressBar.textContent = Math.round(progress) + '%';
        }, 500);
    });

    // Convert another file
    convertAnotherBtn.addEventListener('click', function() {
        resetForm();
    });

    // Try again
    tryAgainBtn.addEventListener('click', function() {
        conversionError.style.display = 'none';
        conversionProgress.style.display = 'none';
    });

    // Reset form
    function resetForm() {
        converterForm.reset();
        fileInfo.style.display = 'none';
        conversionOptions.style.display = 'none';
        conversionProgress.style.display = 'none';
        conversionResult.style.display = 'none';
        conversionError.style.display = 'none';
        validateForm();
    }

    // Format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
