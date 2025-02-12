<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/pdf-tools/">PDF Tools</a></li>
            <li class="breadcrumb-item active">PDF to Image Converter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">PDF to Image Converter</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-file-image fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Convert PDF pages to high-quality images</p>
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
                                        <option value="png">PNG (Best Quality)</option>
                                        <option value="jpeg">JPEG (Smaller Size)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image Quality</label>
                                    <input type="range" class="form-range" id="imageQuality" min="1" max="2" step="0.1" value="1.5">
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">Standard</small>
                                        <small class="text-muted" id="qualityValue">1.5x</small>
                                        <small class="text-muted">High Quality</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Page Selection</label>
                                    <select class="form-select" id="pageSelection">
                                        <option value="all">All Pages</option>
                                        <option value="range">Page Range</option>
                                        <option value="custom">Custom Pages</option>
                                    </select>
                                </div>

                                <div id="pageRangeInput" class="mb-3" style="display: none;">
                                    <label class="form-label">Page Range</label>
                                    <input type="text" class="form-control" id="pageRange" placeholder="e.g., 1-3, 5-7">
                                    <small class="text-muted">Enter page ranges separated by commas</small>
                                </div>

                                <div id="customPagesInput" class="mb-3" style="display: none;">
                                    <label class="form-label">Custom Pages</label>
                                    <input type="text" class="form-control" id="customPages" placeholder="e.g., 1, 3, 5">
                                    <small class="text-muted">Enter page numbers separated by commas</small>
                                </div>

                                <div class="alert alert-info mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <small>Higher quality settings will result in larger file sizes</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-4" id="convertActions" style="display: none;">
                        <button type="button" class="btn btn-success" id="convertBtn">
                            <i class="fas fa-images me-2"></i>Convert to Images
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
                        <h2 class="h4 mb-4">About PDF to Image Converter</h2>
                        
                        <h3 class="h5 mb-3">What is PDF to Image Converter?</h3>
                        <p>PDF to Image Converter is a powerful tool that converts PDF pages into high-quality images. Whether you need to extract specific pages or convert an entire document, this tool provides various options to customize the output according to your needs.</p>

                        <h3 class="h5 mb-3">Key Features</h3>
                        <ul class="mb-4">
                            <li>Multiple output formats (PNG, JPEG)</li>
                            <li>Adjustable image quality</li>
                            <li>Flexible page selection</li>
                            <li>Batch conversion support</li>
                            <li>Preview capability</li>
                            <li>Client-side processing</li>
                        </ul>

                        <h3 class="h5 mb-3">Common Use Cases</h3>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Content Creation</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Social media posts</li>
                                            <li>• Presentation slides</li>
                                            <li>• Educational materials</li>
                                            <li>• Marketing assets</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Document Processing</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Image extraction</li>
                                            <li>• Document archiving</li>
                                            <li>• Web content creation</li>
                                            <li>• Digital preservation</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 mb-3">Best Practices</h3>
                        <div class="alert alert-info">
                            <h4 class="h6 mb-3">For Best Results:</h4>
                            <ol class="mb-0">
                                <li>Choose PNG for text-heavy documents</li>
                                <li>Use JPEG for photo-rich content</li>
                                <li>Adjust quality based on intended use</li>
                                <li>Consider file size requirements</li>
                                <li>Test with sample pages first</li>
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
                                    <th scope="row">Supported Input</th>
                                    <td>PDF files (.pdf)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Output Formats</th>
                                    <td>PNG, JPEG</td>
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
                                <li>Image quality depends on the original PDF quality</li>
                                <li>Large PDFs may require more processing time</li>
                                <li>Some complex PDF elements may not convert perfectly</li>
                                <li>Browser memory limitations may affect large documents</li>
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

<!-- Include PDF.js and JSZip libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>

<script>
// Set worker path for PDF.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const pdfInfo = document.getElementById('pdfInfo');
    const conversionOptions = document.getElementById('conversionOptions');
    const convertActions = document.getElementById('convertActions');
    const convertBtn = document.getElementById('convertBtn');
    const clearBtn = document.getElementById('clearBtn');
    const convertProgress = document.getElementById('convertProgress');
    const progressBar = convertProgress.querySelector('.progress-bar');
    const pageSelection = document.getElementById('pageSelection');
    const pageRangeInput = document.getElementById('pageRangeInput');
    const customPagesInput = document.getElementById('customPagesInput');
    const imageQuality = document.getElementById('imageQuality');
    const qualityValue = document.getElementById('qualityValue');

    let currentFile = null;
    let pdfDoc = null;

    // Update quality value display
    imageQuality.addEventListener('input', function() {
        qualityValue.textContent = this.value + 'x';
    });

    // Handle page selection change
    pageSelection.addEventListener('change', function() {
        pageRangeInput.style.display = this.value === 'range' ? 'block' : 'none';
        customPagesInput.style.display = this.value === 'custom' ? 'block' : 'none';
    });

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
    clearBtn.addEventListener('click', clearFile);
    convertBtn.addEventListener('click', convertToImages);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const file = dt.files[0];
        handleFile(file);
    }

    function handleFiles(e) {
        const file = e.target.files[0];
        handleFile(file);
    }

    async function handleFile(file) {
        if (!file) return;
        
        if (file.type !== 'application/pdf') {
            alert('Please select a PDF file.');
            return;
        }

        if (file.size > 100 * 1024 * 1024) { // 100MB limit
            alert('File is too large. Maximum file size is 100MB.');
            return;
        }

        currentFile = file;
        
        try {
            const arrayBuffer = await file.arrayBuffer();
            const pdf = await pdfjsLib.getDocument(arrayBuffer).promise;
            pdfDoc = pdf;
            
            // Update PDF information
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = formatBytes(file.size);
            document.getElementById('pageCount').textContent = pdf.numPages;
            document.getElementById('pdfVersion').textContent = `PDF ${pdf.version}`;
            
            // Show options
            pdfInfo.style.display = 'block';
            conversionOptions.style.display = 'block';
            convertActions.style.display = 'block';
            
        } catch (error) {
            console.error('Error loading PDF:', error);
            alert('Error loading PDF. Please try another file.');
            clearFile();
        }
    }

    function clearFile() {
        currentFile = null;
        pdfDoc = null;
        fileInput.value = '';
        pdfInfo.style.display = 'none';
        conversionOptions.style.display = 'none';
        convertActions.style.display = 'none';
        convertProgress.style.display = 'none';
    }

    async function convertToImages() {
        if (!currentFile || !pdfDoc) return;

        try {
            convertBtn.disabled = true;
            convertProgress.style.display = 'block';
            progressBar.style.width = '0%';

            const format = document.getElementById('outputFormat').value;
            const quality = parseFloat(imageQuality.value);
            const selection = pageSelection.value;
            
            // Determine pages to convert
            let pagesToConvert = [];
            if (selection === 'all') {
                pagesToConvert = Array.from({length: pdfDoc.numPages}, (_, i) => i + 1);
            } else if (selection === 'range') {
                const rangeStr = document.getElementById('pageRange').value;
                const ranges = rangeStr.split(',').map(r => r.trim());
                
                for (const range of ranges) {
                    const [start, end] = range.split('-').map(n => parseInt(n));
                    if (isNaN(start) || isNaN(end)) continue;
                    for (let i = start; i <= end; i++) {
                        if (i >= 1 && i <= pdfDoc.numPages) {
                            pagesToConvert.push(i);
                        }
                    }
                }
            } else if (selection === 'custom') {
                const pagesStr = document.getElementById('customPages').value;
                pagesToConvert = pagesStr.split(',')
                    .map(p => parseInt(p.trim()))
                    .filter(p => p >= 1 && p <= pdfDoc.numPages);
            }

            if (pagesToConvert.length === 0) {
                alert('No valid pages selected for conversion.');
                return;
            }

            // Create ZIP file for multiple pages
            const zip = new JSZip();
            
            // Convert each page
            for (let i = 0; i < pagesToConvert.length; i++) {
                const pageNum = pagesToConvert[i];
                const page = await pdfDoc.getPage(pageNum);
                
                // Set viewport
                const viewport = page.getViewport({ scale: quality });
                
                // Prepare canvas
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                
                // Render page to canvas
                await page.render({
                    canvasContext: context,
                    viewport: viewport
                }).promise;
                
                // Convert canvas to image
                const imageData = canvas.toDataURL(`image/${format}`, format === 'jpeg' ? 0.9 : undefined);
                const base64Data = imageData.split(',')[1];
                
                // Add to ZIP
                zip.file(`page_${pageNum}.${format}`, base64Data, {base64: true});
                
                // Update progress
                progressBar.style.width = `${((i + 1) / pagesToConvert.length) * 100}%`;
            }

            // Generate and download ZIP
            const content = await zip.generateAsync({type: 'blob'});
            const url = URL.createObjectURL(content);
            const link = document.createElement('a');
            link.href = url;
            link.download = `${currentFile.name.replace('.pdf', '')}_images.zip`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);

            // Reset UI
            progressBar.style.width = '100%';
            setTimeout(() => {
                convertProgress.style.display = 'none';
                convertBtn.disabled = false;
            }, 1000);

        } catch (error) {
            console.error('Error converting PDF:', error);
            alert('Error converting PDF to images. Please try again.');
            convertProgress.style.display = 'none';
            convertBtn.disabled = false;
        }
    }

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
