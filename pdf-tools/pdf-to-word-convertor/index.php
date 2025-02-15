<?php include '../../includes/header.php'; ?>

<title>PDF to Word Converter - Free Online PDF to Word Tool</title>
<meta name="description" content="Convert PDF files to editable Word documents online for free while maintaining formatting. No registration required!">
<meta name="keywords" content="pdf to word converter, online pdf tool, free pdf to word conversion, convert pdf to word">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "PDF to Word Converter",
  "description": "Convert PDF files to editable Word documents online for free while maintaining formatting.",
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
            <li class="breadcrumb-item active">PDF to Word</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">PDF to Word Converter</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-file-word fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Convert PDF files to Word documents</p>
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

                    <div id="conversionOptions" class="mb-4" style="display: none;">
                        <h6 class="mb-3">Conversion Options</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Output Format</label>
                                    <select class="form-select" id="outputFormat">
                                        <option value="docx">Word Document (.docx)</option>
                                        <option value="txt">Plain Text (.txt)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Layout Options</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="preserveFormatting" checked>
                                        <label class="form-check-label" for="preserveFormatting">
                                            Preserve text formatting
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="extractImages" checked>
                                        <label class="form-check-label" for="extractImages">
                                            Extract images (when possible)
                                        </label>
                                    </div>
                                </div>

                                <div class="alert alert-info mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <small>The quality of conversion depends on the PDF structure. Best results are achieved with PDFs containing selectable text.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-4" id="convertActions" style="display: none;">
                        <button type="button" class="btn btn-success" id="convertBtn">
                            <i class="fas fa-sync me-2"></i>Convert to Word
                        </button>
                        <button type="button" class="btn btn-danger ms-2" id="clearBtn">
                            <i class="fas fa-trash me-2"></i>Clear
                        </button>
                    </div>

                    <div class="progress mb-4" id="convertProgress" style="display: none;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                    </div>

                    <!-- Information Section -->
                    <div class="mt-5">
                        <h2 class="h4 mb-4">About PDF to Word Converter</h2>
                        
                        <h3 class="h5 mb-3">What is PDF to Word Converter?</h3>
                        <p>PDF to Word Converter is a powerful tool that transforms PDF documents into editable Word files while preserving the original formatting as much as possible. This tool is particularly useful when you need to edit or modify content that is currently locked in a PDF format.</p>

                        <h3 class="h5 mb-3">Key Features</h3>
                        <ul class="mb-4">
                            <li>Convert PDFs to Word (.docx) or plain text (.txt)</li>
                            <li>Preserve text formatting (fonts, styles, colors)</li>
                            <li>Extract and convert images when possible</li>
                            <li>Process files locally for privacy</li>
                            <li>Support for multi-page documents</li>
                            <li>Fast and efficient conversion</li>
                        </ul>

                        <h3 class="h5 mb-3">Common Use Cases</h3>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Business</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Editing contracts and agreements</li>
                                            <li>• Updating business documents</li>
                                            <li>• Modifying reports</li>
                                            <li>• Converting presentations</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Academic</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Editing research papers</li>
                                            <li>• Updating course materials</li>
                                            <li>• Converting study guides</li>
                                            <li>• Modifying assignments</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 mb-3">Best Practices</h3>
                        <div class="alert alert-info">
                            <h4 class="h6 mb-3">For Best Results:</h4>
                            <ol class="mb-0">
                                <li>Use PDFs with selectable text for best conversion quality</li>
                                <li>Check the converted document for accuracy</li>
                                <li>Keep original PDF as backup</li>
                                <li>Review formatting after conversion</li>
                                <li>Use appropriate output format for your needs</li>
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
                                    <th scope="row">Input Format</th>
                                    <td>PDF files (.pdf)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Output Formats</th>
                                    <td>Word (.docx), Text (.txt)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Processing</th>
                                    <td>Client-side (browser-based)</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="alert alert-warning mt-4">
                            <h4 class="h6 mb-3">Important Notes:</h4>
                            <ul class="mb-0">
                                <li>Conversion quality depends on the original PDF structure</li>
                                <li>Scanned PDFs may require OCR for text extraction</li>
                                <li>Complex layouts may not convert perfectly</li>
                                <li>Some fonts may be substituted with similar alternatives</li>
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
<script src="https://unpkg.com/docx@8.2.3/build/index.js"></script>
<script src="../../assets/js/pdf-tools.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    // Initialize PDF Tools
    await PDFTools.loadPdfJs();
    
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const convertBtn = document.getElementById('convertBtn');
    const clearBtn = document.getElementById('clearBtn');
    const progressBar = document.querySelector('.progress-bar');
    
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
            document.getElementById('conversionOptions').style.display = 'block';
            document.getElementById('convertActions').style.display = 'block';
            
        } catch (error) {
            showError('Error loading PDF: ' + error.message);
        }
    }

    // Convert PDF to Word
    convertBtn.addEventListener('click', async () => {
        if (!currentFile) return;
        
        try {
            convertBtn.disabled = true;
            document.getElementById('convertProgress').style.display = 'block';
            progressBar.style.width = '0%';
            
            // Get conversion options
            const format = document.getElementById('outputFormat').value;
            const preserveFormatting = document.getElementById('preserveFormatting').checked;
            const extractImages = document.getElementById('extractImages').checked;
            
            // Update progress
            let progress = 0;
            const updateProgress = () => {
                progress += 5;
                if (progress > 90) return;
                progressBar.style.width = progress + '%';
                setTimeout(updateProgress, 200);
            };
            updateProgress();
            
            // Convert file
            const result = await PDFTools.pdfToWord(currentFile, {
                preserveFormatting,
                extractImages
            });
            
            // Complete progress
            progressBar.style.width = '100%';
            
            // Download the converted file
            const fileName = currentFile.name.replace('.pdf', format === 'docx' ? '.docx' : '.txt');
            PDFTools.downloadBlob(result, fileName);
            
        } catch (error) {
            showError('Conversion failed: ' + error.message);
        } finally {
            convertBtn.disabled = false;
            setTimeout(() => {
                document.getElementById('convertProgress').style.display = 'none';
            }, 1000);
        }
    });

    // Clear button handler
    clearBtn.addEventListener('click', () => {
        currentFile = null;
        fileInput.value = '';
        document.getElementById('pdfInfo').style.display = 'none';
        document.getElementById('conversionOptions').style.display = 'none';
        document.getElementById('convertActions').style.display = 'none';
        document.getElementById('convertProgress').style.display = 'none';
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
