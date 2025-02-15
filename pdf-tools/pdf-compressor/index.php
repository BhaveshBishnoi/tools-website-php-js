<?php include '../../includes/header.php'; ?>

<title>PDF Compressor - Free Online PDF Compression Tool</title>
<meta name="description" content="Reduce PDF file size online for free while maintaining reasonable quality. No registration required!">
<meta name="keywords" content="pdf compressor, online pdf tool, free pdf compression, compress pdf files">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "PDF Compressor",
  "description": "Reduce PDF file size online for free while maintaining reasonable quality.",
  "applicationCategory": "PDF Tool",
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
            <li class="breadcrumb-item"><a href="/tools/pdf-tools/">PDF Tools</a></li>
            <li class="breadcrumb-item active">PDF Compressor</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">PDF Compressor</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-compress-arrows-alt fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Reduce PDF file size while maintaining quality</p>
                    </div>

                    <div class="mb-4">
                        <div class="custom-file-drop-area" id="dropArea">
                            <input type="file" class="file-input" id="fileInput" accept=".pdf" hidden>
                            <div class="text-center p-4">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-3"></i>
                                <p class="mb-0">Drag & drop a PDF file here or</p>
                                <button type="button" class="btn btn-danger mt-3" id="selectFile">Select File</button>
                            </div>
                        </div>
                    </div>

                    <div id="pdfInfo" class="mb-4" style="display: none;">
                        <h6 class="mb-3">PDF Information</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="mb-1"><strong>File Name:</strong> <span id="fileName"></span></p>
                                        <p class="mb-1"><strong>Original Size:</strong> <span id="fileSize"></span></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-1"><strong>Total Pages:</strong> <span id="pageCount"></span></p>
                                        <p class="mb-1"><strong>PDF Version:</strong> <span id="pdfVersion"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="compressionOptions" class="mb-4" style="display: none;">
                        <h6 class="mb-3">Compression Options</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Compression Level</label>
                                    <select class="form-select" id="compressionLevel">
                                        <option value="low">Low (Minimal Quality Loss)</option>
                                        <option value="medium" selected>Medium (Balanced)</option>
                                        <option value="high">High (Maximum Compression)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image Quality</label>
                                    <input type="range" class="form-range" id="imageQuality" min="30" max="100" value="75">
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">Lower Quality</small>
                                        <small class="text-muted" id="qualityValue">75%</small>
                                        <small class="text-muted">Higher Quality</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Optimization Options</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="compressImages" checked>
                                        <label class="form-check-label" for="compressImages">
                                            Compress Images
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="removeMetadata" checked>
                                        <label class="form-check-label" for="removeMetadata">
                                            Remove Metadata
                                        </label>
                                    </div>
                                </div>

                                <div class="alert alert-info mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <small>Higher compression may affect image quality. For documents with important images, use lower compression settings.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-4" id="compressActions" style="display: none;">
                        <button type="button" class="btn btn-success" id="compressBtn">
                            <i class="fas fa-compress me-2"></i>Compress PDF
                        </button>
                        <button type="button" class="btn btn-danger ms-2" id="clearBtn">
                            <i class="fas fa-trash me-2"></i>Clear
                        </button>
                    </div>

                    <div class="progress mb-4" id="compressProgress" style="display: none;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                    </div>

                    <div id="resultCard" class="mb-4" style="display: none;">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="mb-3">Compression Results</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="mb-1"><strong>Original Size:</strong> <span id="originalSize"></span></p>
                                        <p class="mb-1"><strong>Compressed Size:</strong> <span id="compressedSize"></span></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-1"><strong>Space Saved:</strong> <span id="spaceSaved"></span></p>
                                        <p class="mb-1"><strong>Reduction:</strong> <span id="reductionPercent"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Information Section -->
                    <div class="mt-5">
                        <h2 class="h4 mb-4">About PDF Compressor</h2>
                        
                        <h3 class="h5 mb-3">What is PDF Compressor?</h3>
                        <p>PDF Compressor is an advanced tool that reduces the file size of PDF documents while maintaining readability and quality. It uses smart compression algorithms to optimize images, remove redundant data, and clean up unnecessary elements, making your PDFs more manageable for sharing and storage.</p>

                        <h3 class="h5 mb-3">Key Features</h3>
                        <ul class="mb-4">
                            <li>Multiple compression levels for different needs</li>
                            <li>Smart image optimization</li>
                            <li>Metadata removal option</li>
                            <li>Client-side processing for privacy</li>
                            <li>Batch processing support</li>
                            <li>Preview compression results</li>
                        </ul>

                        <h3 class="h5 mb-3">Common Use Cases</h3>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">File Sharing</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Email attachments</li>
                                            <li>• Cloud storage optimization</li>
                                            <li>• Website uploads</li>
                                            <li>• Mobile sharing</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Document Management</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Archive optimization</li>
                                            <li>• Digital library management</li>
                                            <li>• Storage space reduction</li>
                                            <li>• Backup optimization</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 mb-3">Best Practices</h3>
                        <div class="alert alert-info">
                            <h4 class="h6 mb-3">For Best Results:</h4>
                            <ol class="mb-0">
                                <li>Choose appropriate compression level based on content</li>
                                <li>Test compressed files before deleting originals</li>
                                <li>Keep originals of important documents</li>
                                <li>Use lower compression for image-heavy documents</li>
                                <li>Consider file usage when selecting options</li>
                            </ol>
                        </div>

                        <h3 class="h5 mb-3">Technical Specifications</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Maximum File Size</th>
                                    <td>100 MB</td>
                                </tr>
                                <tr>
                                    <th scope="row">Supported Format</th>
                                    <td>PDF files (.pdf)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Processing</th>
                                    <td>Client-side (browser-based)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Compression Ratio</th>
                                    <td>Up to 90% (depends on content)</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="alert alert-warning mt-4">
                            <h4 class="h6 mb-3">Important Notes:</h4>
                            <ul class="mb-0">
                                <li>Compression results vary based on file content</li>
                                <li>Some PDFs may already be optimally compressed</li>
                                <li>Text-based PDFs typically compress better than image-heavy ones</li>
                                <li>Digital signatures may be affected by compression</li>
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

<!-- Add required libraries -->
<script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
<script src="../../assets/js/pdf-tools.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    // Initialize PDF Tools
    await PDFTools.loadPdfJs();
    
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const compressBtn = document.getElementById('compressBtn');
    const clearBtn = document.getElementById('clearBtn');
    const progressBar = document.querySelector('.progress-bar');
    const compressionLevel = document.getElementById('compressionLevel');
    
    let currentFile = null;
    let pdfDoc = null;

    // File selection and drag & drop handlers
    selectFile.addEventListener('click', () => fileInput.click());
    
    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('dragover');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('dragover');
    });

    dropArea.addEventListener('drop', async (e) => {
        e.preventDefault();
        dropArea.classList.remove('dragover');
        const file = e.dataTransfer.files[0];
        if (file && file.type === 'application/pdf') {
            await handleFile(file);
        }
    });

    fileInput.addEventListener('change', async () => {
        if (fileInput.files.length > 0) {
            await handleFile(fileInput.files[0]);
        }
    });

    // Handle file selection
    async function handleFile(file) {
        try {
            currentFile = file;
            const info = await PDFTools.getPdfInfo(file);
            
            // Update UI with file info
            document.getElementById('fileName').textContent = info.fileName;
            document.getElementById('fileSize').textContent = info.fileSize;
            document.getElementById('pageCount').textContent = info.numPages;
            
            // Show options and buttons
            document.getElementById('pdfInfo').style.display = 'block';
            document.getElementById('compressionOptions').style.display = 'block';
            document.getElementById('compressActions').style.display = 'block';
            
        } catch (error) {
            showError('Error loading PDF: ' + error.message);
        }
    }

    // Compress PDF
    compressBtn.addEventListener('click', async () => {
        if (!currentFile) return;
        
        try {
            compressBtn.disabled = true;
            document.getElementById('compressProgress').style.display = 'block';
            progressBar.style.width = '0%';
            
            // Get compression level
            const quality = compressionLevel.value;
            
            // Update progress
            let progress = 0;
            const updateProgress = () => {
                progress += 5;
                if (progress > 90) return;
                progressBar.style.width = progress + '%';
                setTimeout(updateProgress, 200);
            };
            updateProgress();
            
            // Compress PDF
            const result = await PDFTools.compressPdf(currentFile, quality);
            
            // Complete progress
            progressBar.style.width = '100%';
            
            // Download compressed PDF
            const fileName = currentFile.name.replace('.pdf', '_compressed.pdf');
            const blob = new Blob([result], { type: 'application/pdf' });
            PDFTools.downloadBlob(blob, fileName);
            
            // Show compression results
            const originalSize = currentFile.size;
            const compressedSize = blob.size;
            const reduction = ((originalSize - compressedSize) / originalSize * 100).toFixed(1);
            
            document.getElementById('compressionResults').style.display = 'block';
            document.getElementById('originalSize').textContent = PDFTools.formatFileSize(originalSize);
            document.getElementById('compressedSize').textContent = PDFTools.formatFileSize(compressedSize);
            document.getElementById('reduction').textContent = reduction;
            
        } catch (error) {
            showError('Compression failed: ' + error.message);
        } finally {
            compressBtn.disabled = false;
            setTimeout(() => {
                document.getElementById('compressProgress').style.display = 'none';
            }, 1000);
        }
    });

    // Clear button handler
    clearBtn.addEventListener('click', () => {
        currentFile = null;
        fileInput.value = '';
        document.getElementById('pdfInfo').style.display = 'none';
        document.getElementById('compressionOptions').style.display = 'none';
        document.getElementById('compressActions').style.display = 'none';
        document.getElementById('compressProgress').style.display = 'none';
        document.getElementById('compressionResults').style.display = 'none';
    });

    function showError(message) {
        const error = document.getElementById('error');
        error.querySelector('span').textContent = message;
        error.style.display = 'block';
        setTimeout(() => {
            error.style.display = 'none';
        }, 5000);
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
