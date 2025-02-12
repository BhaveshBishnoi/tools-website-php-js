<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/pdf-tools/">PDF Tools</a></li>
            <li class="breadcrumb-item active">Image to PDF Converter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">Image to PDF Converter</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-images fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Convert images to PDF format</p>
                    </div>

                    <div class="mb-4">
                        <div class="custom-file-drop-area" id="dropArea">
                            <input type="file" class="file-input" id="fileInput" accept="image/*" multiple hidden>
                            <div class="text-center p-4">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-3"></i>
                                <p class="mb-0">Drag & drop images here or</p>
                                <button type="button" class="btn btn-danger mt-3" id="selectFile">Select Images</button>
                            </div>
                        </div>
                    </div>

                    <div id="imageList" class="mb-4" style="display: none;">
                        <h6 class="mb-3">Selected Images</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div id="imagePreviewList" class="row g-3">
                                    <!-- Image previews will be added here -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="conversionOptions" class="mb-4" style="display: none;">
                        <h6 class="mb-3">Conversion Options</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Page Size</label>
                                    <select class="form-select" id="pageSize">
                                        <option value="fit">Fit to Image</option>
                                        <option value="A4">A4</option>
                                        <option value="letter">Letter</option>
                                        <option value="legal">Legal</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Page Orientation</label>
                                    <select class="form-select" id="orientation">
                                        <option value="auto">Auto (Based on Image)</option>
                                        <option value="portrait">Portrait</option>
                                        <option value="landscape">Landscape</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image Quality</label>
                                    <input type="range" class="form-range" id="imageQuality" min="1" max="100" value="90">
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">Lower Quality</small>
                                        <small class="text-muted" id="qualityValue">90%</small>
                                        <small class="text-muted">Higher Quality</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image Layout</label>
                                    <select class="form-select" id="imageLayout">
                                        <option value="1">1 Image per Page</option>
                                        <option value="2">2 Images per Page</option>
                                        <option value="4">4 Images per Page</option>
                                    </select>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="maintainAspectRatio" checked>
                                    <label class="form-check-label" for="maintainAspectRatio">
                                        Maintain Aspect Ratio
                                    </label>
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
                            <i class="fas fa-file-pdf me-2"></i>Convert to PDF
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
                        <h2 class="h4 mb-4">About Image to PDF Converter</h2>
                        
                        <h3 class="h5 mb-3">What is Image to PDF Converter?</h3>
                        <p>Image to PDF Converter is a tool that allows you to convert one or multiple images into a PDF document. You can customize the output with various options like page size, orientation, and image quality to create professional-looking PDFs from your images.</p>

                        <h3 class="h5 mb-3">Key Features</h3>
                        <ul class="mb-4">
                            <li>Multiple image support</li>
                            <li>Drag and drop interface</li>
                            <li>Custom page sizes</li>
                            <li>Quality control</li>
                            <li>Multiple layout options</li>
                            <li>Preview capability</li>
                        </ul>

                        <h3 class="h5 mb-3">Supported Image Formats</h3>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Common Formats</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• JPEG/JPG</li>
                                            <li>• PNG</li>
                                            <li>• GIF</li>
                                            <li>• BMP</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Additional Formats</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• WEBP</li>
                                            <li>• TIFF</li>
                                            <li>• SVG</li>
                                            <li>• ICO</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 mb-3">Best Practices</h3>
                        <div class="alert alert-info">
                            <h4 class="h6 mb-3">For Best Results:</h4>
                            <ol class="mb-0">
                                <li>Use high-quality source images</li>
                                <li>Choose appropriate page size</li>
                                <li>Consider file size requirements</li>
                                <li>Test with sample images first</li>
                                <li>Check preview before downloading</li>
                            </ol>
                        </div>

                        <h3 class="h5 mb-3">Technical Specifications</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Maximum File Size</th>
                                    <td>20 MB per image</td>
                                </tr>
                                <tr>
                                    <th scope="row">Max Images</th>
                                    <td>50 images per conversion</td>
                                </tr>
                                <tr>
                                    <th scope="row">Processing</th>
                                    <td>Client-side (browser-based)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Output Format</th>
                                    <td>PDF (Standard)</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="alert alert-warning mt-4">
                            <h4 class="h6 mb-3">Important Notes:</h4>
                            <ul class="mb-0">
                                <li>Large images may take longer to process</li>
                                <li>Output quality depends on input image quality</li>
                                <li>Some image formats may not preserve transparency</li>
                                <li>Browser limitations may affect large batches</li>
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

.image-preview-container {
    position: relative;
    width: 100%;
    padding-bottom: 100%;
}

.image-preview {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 4px;
}

.remove-image {
    position: absolute;
    top: 5px;
    right: 5px;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #dc3545;
}

.remove-image:hover {
    background: #fff;
    color: #bb2d3b;
}
</style>

<!-- Include PDF-LIB library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const imageList = document.getElementById('imageList');
    const imagePreviewList = document.getElementById('imagePreviewList');
    const conversionOptions = document.getElementById('conversionOptions');
    const convertActions = document.getElementById('convertActions');
    const convertBtn = document.getElementById('convertBtn');
    const clearBtn = document.getElementById('clearBtn');
    const convertProgress = document.getElementById('convertProgress');
    const progressBar = convertProgress.querySelector('.progress-bar');
    const imageQuality = document.getElementById('imageQuality');
    const qualityValue = document.getElementById('qualityValue');

    let selectedFiles = [];

    // Update quality value display
    imageQuality.addEventListener('input', function() {
        qualityValue.textContent = this.value + '%';
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
    clearBtn.addEventListener('click', clearFiles);
    convertBtn.addEventListener('click', convertToPDF);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = [...dt.files];
        handleImageFiles(files);
    }

    function handleFiles(e) {
        const files = [...e.target.files];
        handleImageFiles(files);
    }

    function handleImageFiles(files) {
        const imageFiles = files.filter(file => file.type.startsWith('image/'));
        
        if (imageFiles.length === 0) {
            alert('Please select image files only.');
            return;
        }

        if (selectedFiles.length + imageFiles.length > 50) {
            alert('Maximum 50 images allowed.');
            return;
        }

        imageFiles.forEach(file => {
            if (file.size > 20 * 1024 * 1024) { // 20MB limit
                alert(`File ${file.name} is too large. Maximum size is 20MB.`);
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const imageUrl = e.target.result;
                addImagePreview(imageUrl, file);
                selectedFiles.push(file);
            };
            reader.readAsDataURL(file);
        });

        updateUI();
    }

    function addImagePreview(imageUrl, file) {
        const col = document.createElement('div');
        col.className = 'col-4 col-md-3';
        
        const container = document.createElement('div');
        container.className = 'image-preview-container';
        
        const img = document.createElement('img');
        img.src = imageUrl;
        img.className = 'image-preview';
        img.title = file.name;
        
        const removeBtn = document.createElement('button');
        removeBtn.className = 'remove-image';
        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
        removeBtn.onclick = function() {
            const index = selectedFiles.indexOf(file);
            if (index > -1) {
                selectedFiles.splice(index, 1);
                col.remove();
                updateUI();
            }
        };
        
        container.appendChild(img);
        container.appendChild(removeBtn);
        col.appendChild(container);
        imagePreviewList.appendChild(col);
    }

    function updateUI() {
        if (selectedFiles.length > 0) {
            imageList.style.display = 'block';
            conversionOptions.style.display = 'block';
            convertActions.style.display = 'block';
        } else {
            imageList.style.display = 'none';
            conversionOptions.style.display = 'none';
            convertActions.style.display = 'none';
        }
    }

    function clearFiles() {
        selectedFiles = [];
        imagePreviewList.innerHTML = '';
        fileInput.value = '';
        updateUI();
        convertProgress.style.display = 'none';
    }

    async function convertToPDF() {
        if (selectedFiles.length === 0) return;

        try {
            convertBtn.disabled = true;
            convertProgress.style.display = 'block';
            progressBar.style.width = '0%';

            const pageSize = document.getElementById('pageSize').value;
            const orientation = document.getElementById('orientation').value;
            const quality = parseInt(imageQuality.value) / 100;
            const layout = parseInt(document.getElementById('imageLayout').value);
            const maintainAspectRatio = document.getElementById('maintainAspectRatio').checked;

            // Create PDF document
            const pdfDoc = await PDFLib.PDFDocument.create();
            
            // Define page dimensions
            let pageWidth = 595.28; // A4 width in points
            let pageHeight = 841.89; // A4 height in points
            
            if (pageSize === 'letter') {
                pageWidth = 612;
                pageHeight = 792;
            } else if (pageSize === 'legal') {
                pageWidth = 612;
                pageHeight = 1008;
            }

            // Process images
            for (let i = 0; i < selectedFiles.length; i++) {
                const file = selectedFiles[i];
                const arrayBuffer = await file.arrayBuffer();
                
                // Embed image
                let image;
                if (file.type === 'image/jpeg') {
                    image = await pdfDoc.embedJpg(arrayBuffer);
                } else {
                    image = await pdfDoc.embedPng(arrayBuffer);
                }

                // Calculate dimensions
                const imgWidth = image.width;
                const imgHeight = image.height;
                
                // Create page
                const page = pdfDoc.addPage([pageWidth, pageHeight]);
                
                // Calculate scaling
                let scale = 1;
                if (maintainAspectRatio) {
                    const pageRatio = pageWidth / pageHeight;
                    const imageRatio = imgWidth / imgHeight;
                    
                    if (imageRatio > pageRatio) {
                        scale = (pageWidth * 0.9) / imgWidth;
                    } else {
                        scale = (pageHeight * 0.9) / imgHeight;
                    }
                }

                // Draw image
                page.drawImage(image, {
                    x: (pageWidth - imgWidth * scale) / 2,
                    y: (pageHeight - imgHeight * scale) / 2,
                    width: imgWidth * scale,
                    height: imgHeight * scale,
                    opacity: quality
                });

                // Update progress
                progressBar.style.width = `${((i + 1) / selectedFiles.length) * 100}%`;
            }

            // Save the PDF
            const pdfBytes = await pdfDoc.save();
            
            // Create download link
            const blob = new Blob([pdfBytes], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'converted_images.pdf';
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
            console.error('Error converting images:', error);
            alert('Error converting images to PDF. Please try again.');
            convertProgress.style.display = 'none';
            convertBtn.disabled = false;
        }
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
