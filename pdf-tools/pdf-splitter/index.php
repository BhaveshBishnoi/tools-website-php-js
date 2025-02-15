<?php include '../../includes/header.php'; ?>

<title>PDF Splitter - Free Online PDF Splitting Tool</title>
<meta name="description" content="Split large PDF files into smaller documents by page ranges online for free. No registration required!">
<meta name="keywords" content="pdf splitter, online pdf tool, free pdf splitting, split pdf files">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "PDF Splitter",
  "description": "Split large PDF files into smaller documents by page ranges online for free.",
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
            <li class="breadcrumb-item active">PDF Splitter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">PDF Splitter</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-cut fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Split PDF files into individual pages or custom ranges</p>
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

                    <div id="splitOptions" class="mb-4" style="display: none;">
                        <h6 class="mb-3">Split Options</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Split Method</label>
                                    <select class="form-select" id="splitMethod">
                                        <option value="all">Split All Pages</option>
                                        <option value="range">Split by Page Range</option>
                                        <option value="extract">Extract Specific Pages</option>
                                    </select>
                                </div>

                                <div id="rangeOptions" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Page Range</label>
                                        <input type="text" class="form-control" id="pageRange" placeholder="e.g., 1-3, 5-7">
                                        <div class="form-text">Enter page ranges separated by commas (e.g., 1-3, 5-7)</div>
                                    </div>
                                </div>

                                <div id="extractOptions" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Pages to Extract</label>
                                        <input type="text" class="form-control" id="extractPages" placeholder="e.g., 1, 3, 5">
                                        <div class="form-text">Enter page numbers separated by commas (e.g., 1, 3, 5)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-4" id="splitActions" style="display: none;">
                        <button type="button" class="btn btn-success" id="splitBtn">
                            <i class="fas fa-cut me-2"></i>Split PDF
                        </button>
                        <button type="button" class="btn btn-danger ms-2" id="clearBtn">
                            <i class="fas fa-trash me-2"></i>Clear
                        </button>
                    </div>

                    <div class="progress mb-4" id="splitProgress" style="display: none;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                    </div>

                    <!-- Information Section -->
                    <div class="mt-5">
                        <h2 class="h4 mb-4">About PDF Splitter</h2>
                        
                        <h3 class="h5 mb-3">What is PDF Splitter?</h3>
                        <p>PDF Splitter is a versatile tool that allows you to divide PDF documents into smaller files based on your specific needs. Whether you need to extract specific pages, split a document into individual pages, or create custom page ranges, this tool provides an efficient solution while maintaining the original quality of your PDF content.</p>

                        <h3 class="h5 mb-3">Key Features</h3>
                        <ul class="mb-4">
                            <li>Multiple splitting options (all pages, ranges, specific pages)</li>
                            <li>Preview PDF information before splitting</li>
                            <li>Maintains original PDF quality</li>
                            <li>Client-side processing for privacy</li>
                            <li>Support for large PDF files</li>
                            <li>Fast and efficient processing</li>
                        </ul>

                        <h3 class="h5 mb-3">Common Use Cases</h3>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Document Management</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Extracting specific chapters</li>
                                            <li>• Separating scanned documents</li>
                                            <li>• Creating smaller PDF files</li>
                                            <li>• Organizing digital archives</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Professional Use</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Splitting financial reports</li>
                                            <li>• Extracting contract sections</li>
                                            <li>• Sharing specific pages</li>
                                            <li>• Creating presentation handouts</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 mb-3">Best Practices</h3>
                        <div class="alert alert-info">
                            <h4 class="h6 mb-3">For Best Results:</h4>
                            <ol class="mb-0">
                                <li>Ensure your PDF is not password-protected</li>
                                <li>Verify page numbers before splitting</li>
                                <li>Use appropriate page ranges for your needs</li>
                                <li>Download and verify split files</li>
                                <li>Keep original files as backups</li>
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
                                    <td>Individual PDF files or ZIP archive</td>
                                </tr>
                            </tbody>
                        </table>
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
<script src="https://unpkg.com/@pdf-lib/upng@1.0.1/dist/upng.min.js"></script>
<script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
<script src="../../assets/js/pdf-tools.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    // Initialize PDF Tools
    await PDFTools.loadPdfJs();
    
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const splitBtn = document.getElementById('splitBtn');
    const clearBtn = document.getElementById('clearBtn');
    const progressBar = document.querySelector('.progress-bar');
    const splitMethod = document.getElementById('splitMethod');
    
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

    // Split method change handler
    splitMethod.addEventListener('change', () => {
        document.getElementById('rangeOptions').style.display = 
            splitMethod.value === 'range' ? 'block' : 'none';
        document.getElementById('extractOptions').style.display = 
            splitMethod.value === 'extract' ? 'block' : 'none';
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
            document.getElementById('splitOptions').style.display = 'block';
            document.getElementById('splitActions').style.display = 'block';
            
        } catch (error) {
            showError('Error loading PDF: ' + error.message);
        }
    }

    // Split PDF
    splitBtn.addEventListener('click', async () => {
        if (!currentFile) return;
        
        try {
            splitBtn.disabled = true;
            document.getElementById('splitProgress').style.display = 'block';
            progressBar.style.width = '0%';
            
            // Get split options
            const method = splitMethod.value;
            let ranges = [];
            
            if (method === 'all') {
                const pageCount = parseInt(document.getElementById('pageCount').textContent);
                ranges = Array.from({length: pageCount}, (_, i) => [i]);
            } else if (method === 'range') {
                const rangeText = document.getElementById('pageRange').value;
                ranges = parsePageRanges(rangeText);
            } else if (method === 'extract') {
                const pageText = document.getElementById('extractPages').value;
                ranges = pageText.split(',').map(p => [parseInt(p.trim()) - 1]);
            }
            
            // Update progress
            let progress = 0;
            const updateProgress = () => {
                progress += 5;
                if (progress > 90) return;
                progressBar.style.width = progress + '%';
                setTimeout(updateProgress, 200);
            };
            updateProgress();
            
            // Split PDF
            const results = await PDFTools.splitPdf(currentFile, ranges);
            
            // Complete progress
            progressBar.style.width = '100%';
            
            // Download split files
            results.forEach((pdfBytes, i) => {
                const fileName = currentFile.name.replace('.pdf', `_part${i + 1}.pdf`);
                const blob = new Blob([pdfBytes], { type: 'application/pdf' });
                PDFTools.downloadBlob(blob, fileName);
            });
            
        } catch (error) {
            showError('Split failed: ' + error.message);
        } finally {
            splitBtn.disabled = false;
            setTimeout(() => {
                document.getElementById('splitProgress').style.display = 'none';
            }, 1000);
        }
    });

    // Clear button handler
    clearBtn.addEventListener('click', () => {
        currentFile = null;
        fileInput.value = '';
        document.getElementById('pdfInfo').style.display = 'none';
        document.getElementById('splitOptions').style.display = 'none';
        document.getElementById('splitActions').style.display = 'none';
        document.getElementById('splitProgress').style.display = 'none';
    });

    // Parse page ranges (e.g., "1-3, 5-7" to [[0,1,2], [4,5,6]])
    function parsePageRanges(text) {
        return text.split(',').map(range => {
            const [start, end] = range.trim().split('-').map(n => parseInt(n.trim()));
            if (end === undefined) return [start - 1];
            return Array.from({length: end - start + 1}, (_, i) => start + i - 1);
        });
    }

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
