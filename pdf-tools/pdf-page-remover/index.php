<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/pdf-tools/">PDF Tools</a></li>
            <li class="breadcrumb-item active">PDF Page Remover</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">PDF Page Remover</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-file-pdf fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Remove pages from your PDF document</p>
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
                                        <p class="mb-1"><strong>File Size:</strong> <span id="fileSize"></span></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-1"><strong>Total Pages:</strong> <span id="pageCount"></span></p>
                                        <p class="mb-1"><strong>PDF Version:</strong> <span id="pdfVersion"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="removalOptions" class="mb-4" style="display: none;">
                        <h6 class="mb-3">Page Removal Options</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Selection Method</label>
                                    <select class="form-select" id="selectionMethod">
                                        <option value="specific">Remove Specific Pages</option>
                                        <option value="range">Remove Page Range</option>
                                        <option value="keep">Keep Selected Pages</option>
                                    </select>
                                </div>

                                <div id="specificPagesInput" class="mb-3">
                                    <label class="form-label">Pages to Remove</label>
                                    <input type="text" class="form-control" id="specificPages" placeholder="e.g., 1, 3, 5">
                                    <small class="text-muted">Enter page numbers separated by commas</small>
                                </div>

                                <div id="rangeInput" class="mb-3" style="display: none;">
                                    <label class="form-label">Page Range</label>
                                    <input type="text" class="form-control" id="pageRange" placeholder="e.g., 1-3, 5-7">
                                    <small class="text-muted">Enter page ranges separated by commas</small>
                                </div>

                                <div id="keepPagesInput" class="mb-3" style="display: none;">
                                    <label class="form-label">Pages to Keep</label>
                                    <input type="text" class="form-control" id="keepPages" placeholder="e.g., 1, 3, 5">
                                    <small class="text-muted">Enter page numbers to keep, all others will be removed</small>
                                </div>

                                <div class="alert alert-warning mb-0">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <small>Page removal cannot be undone. Please verify your selection before proceeding.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-4" id="removeActions" style="display: none;">
                        <button type="button" class="btn btn-danger" id="removeBtn">
                            <i class="fas fa-trash me-2"></i>Remove Pages
                        </button>
                        <button type="button" class="btn btn-secondary ms-2" id="clearBtn">
                            <i class="fas fa-times me-2"></i>Clear
                        </button>
                    </div>

                    <div class="progress mb-4" id="removeProgress" style="display: none;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                    </div>

                    <!-- Information Section -->
                    <div class="mt-5">
                        <h2 class="h4 mb-4">About PDF Page Remover</h2>
                        
                        <h3 class="h5 mb-3">What is PDF Page Remover?</h3>
                        <p>PDF Page Remover is a tool that allows you to remove specific pages from your PDF documents. Whether you need to delete a single page or multiple pages, this tool provides flexible options to modify your PDF files according to your needs.</p>

                        <h3 class="h5 mb-3">Key Features</h3>
                        <ul class="mb-4">
                            <li>Multiple selection methods</li>
                            <li>Page range support</li>
                            <li>Keep/remove option</li>
                            <li>Preview capability</li>
                            <li>Client-side processing</li>
                            <li>Original file preservation</li>
                        </ul>

                        <h3 class="h5 mb-3">Common Use Cases</h3>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Document Cleanup</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Remove cover pages</li>
                                            <li>• Delete blank pages</li>
                                            <li>• Remove advertisements</li>
                                            <li>• Clean up scanned documents</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Content Management</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Extract specific sections</li>
                                            <li>• Remove confidential pages</li>
                                            <li>• Update documentation</li>
                                            <li>• Prepare presentations</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 mb-3">Best Practices</h3>
                        <div class="alert alert-info">
                            <h4 class="h6 mb-3">For Best Results:</h4>
                            <ol class="mb-0">
                                <li>Always verify page numbers before removal</li>
                                <li>Keep a backup of original files</li>
                                <li>Use page preview when available</li>
                                <li>Double-check page ranges</li>
                                <li>Consider using 'Keep Pages' for complex selections</li>
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
                                    <th scope="row">Output Format</th>
                                    <td>PDF (same as input)</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="alert alert-warning mt-4">
                            <h4 class="h6 mb-3">Important Notes:</h4>
                            <ul class="mb-0">
                                <li>Page removal is permanent and cannot be undone</li>
                                <li>Page numbers start from 1, not 0</li>
                                <li>Original file remains unchanged</li>
                                <li>Some PDF features may be affected by page removal</li>
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
    const removeBtn = document.getElementById('removeBtn');
    const clearBtn = document.getElementById('clearBtn');
    const progressBar = document.querySelector('.progress-bar');
    const pagesToRemove = document.getElementById('pagesToRemove');
    
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
            document.getElementById('removeOptions').style.display = 'block';
            document.getElementById('removeActions').style.display = 'block';
            
            // Update max page number in helper text
            document.getElementById('maxPages').textContent = info.numPages;
            
        } catch (error) {
            showError('Error loading PDF: ' + error.message);
        }
    }

    // Remove pages
    removeBtn.addEventListener('click', async () => {
        if (!currentFile) return;
        
        try {
            // Validate page numbers
            const pageNumbers = pagesToRemove.value
                .split(',')
                .map(p => parseInt(p.trim()))
                .filter(p => !isNaN(p));
                
            if (pageNumbers.length === 0) {
                showError('Please enter valid page numbers');
                return;
            }
            
            const totalPages = parseInt(document.getElementById('pageCount').textContent);
            if (pageNumbers.some(p => p < 1 || p > totalPages)) {
                showError(`Page numbers must be between 1 and ${totalPages}`);
                return;
            }
            
            removeBtn.disabled = true;
            document.getElementById('removeProgress').style.display = 'block';
            progressBar.style.width = '0%';
            
            // Update progress
            let progress = 0;
            const updateProgress = () => {
                progress += 5;
                if (progress > 90) return;
                progressBar.style.width = progress + '%';
                setTimeout(updateProgress, 200);
            };
            updateProgress();
            
            // Remove pages
            const result = await PDFTools.removePages(currentFile, pageNumbers);
            
            // Complete progress
            progressBar.style.width = '100%';
            
            // Download modified PDF
            const fileName = currentFile.name.replace('.pdf', '_modified.pdf');
            const blob = new Blob([result], { type: 'application/pdf' });
            PDFTools.downloadBlob(blob, fileName);
            
        } catch (error) {
            showError('Page removal failed: ' + error.message);
        } finally {
            removeBtn.disabled = false;
            setTimeout(() => {
                document.getElementById('removeProgress').style.display = 'none';
            }, 1000);
        }
    });

    // Clear button handler
    clearBtn.addEventListener('click', () => {
        currentFile = null;
        fileInput.value = '';
        pagesToRemove.value = '';
        document.getElementById('pdfInfo').style.display = 'none';
        document.getElementById('removeOptions').style.display = 'none';
        document.getElementById('removeActions').style.display = 'none';
        document.getElementById('removeProgress').style.display = 'none';
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
