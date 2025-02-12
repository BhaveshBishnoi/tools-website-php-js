<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/pdf-tools/">PDF Tools</a></li>
            <li class="breadcrumb-item active">PDF Merger</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-center">PDF Merger</h1>
                    
                    <div class="text-center mb-4">
                        <i class="fas fa-object-group fa-3x text-danger mb-3"></i>
                        <p class="text-muted">Combine multiple PDF files into a single document</p>
                    </div>

                    <div class="mb-4">
                        <div class="custom-file-drop-area" id="dropArea">
                            <input type="file" class="file-input" id="fileInput" accept=".pdf" multiple hidden>
                            <div class="text-center p-4">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-3"></i>
                                <p class="mb-0">Drag & drop PDF files here or</p>
                                <button type="button" class="btn btn-danger mt-3" id="selectFile">Select Files</button>
                            </div>
                        </div>
                    </div>

                    <div id="fileList" class="mb-4" style="display: none;">
                        <h6 class="mb-3">Selected Files</h6>
                        <div class="list-group" id="sortableFiles">
                            <!-- Files will be listed here -->
                        </div>
                        <div class="text-muted mt-2">
                            <small>Drag and drop files to reorder them</small>
                        </div>
                    </div>

                    <div class="text-center mb-4" id="mergeActions" style="display: none;">
                        <button type="button" class="btn btn-success" id="mergeBtn">
                            <i class="fas fa-object-group me-2"></i>Merge PDFs
                        </button>
                        <button type="button" class="btn btn-danger ms-2" id="clearBtn">
                            <i class="fas fa-trash me-2"></i>Clear All
                        </button>
                    </div>

                    <div class="progress mb-4" id="mergeProgress" style="display: none;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                    </div>

                    <!-- Information Section -->
                    <div class="mt-5">
                        <h2 class="h4 mb-4">About PDF Merger</h2>
                        
                        <h3 class="h5 mb-3">What is PDF Merger?</h3>
                        <p>PDF Merger is a powerful tool that allows you to combine multiple PDF files into a single document while maintaining the original quality and formatting. This tool is particularly useful for creating comprehensive reports, combining multiple chapters into a book, or organizing related documents into a single file.</p>

                        <h3 class="h5 mb-3">Key Features</h3>
                        <ul class="mb-4">
                            <li>Drag-and-drop interface for easy file selection</li>
                            <li>Reorder files before merging</li>
                            <li>Maintains original PDF quality</li>
                            <li>Processes files locally - no data uploaded to servers</li>
                            <li>Supports large PDF files</li>
                            <li>Cross-platform compatibility</li>
                        </ul>

                        <h3 class="h5 mb-3">Common Use Cases</h3>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Business</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Combining financial reports</li>
                                            <li>• Merging contracts and agreements</li>
                                            <li>• Creating comprehensive proposals</li>
                                            <li>• Organizing documentation</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="h6 mb-3">Education</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>• Combining lecture notes</li>
                                            <li>• Creating study guides</li>
                                            <li>• Organizing research papers</li>
                                            <li>• Compiling assignments</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 mb-3">Best Practices</h3>
                        <div class="alert alert-info">
                            <h4 class="h6 mb-3">For Best Results:</h4>
                            <ol class="mb-0">
                                <li>Ensure all PDFs are properly formatted before merging</li>
                                <li>Arrange files in the desired order using drag-and-drop</li>
                                <li>Keep file names descriptive and organized</li>
                                <li>Review the merged document to ensure all content is included</li>
                                <li>Save the merged file with a clear, descriptive name</li>
                            </ol>
                        </div>

                        <h3 class="h5 mb-3">Technical Specifications</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Maximum Files</th>
                                    <td>100 files per merge</td>
                                </tr>
                                <tr>
                                    <th scope="row">File Size Limit</th>
                                    <td>100 MB per file</td>
                                </tr>
                                <tr>
                                    <th scope="row">Supported Formats</th>
                                    <td>PDF files (.pdf)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Processing</th>
                                    <td>Client-side (browser-based)</td>
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

.list-group-item {
    cursor: move;
}

.list-group-item:hover {
    background-color: #f8f9fa;
}

.list-group-item .file-name {
    max-width: 80%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.list-group-item .remove-file {
    cursor: pointer;
}

.list-group-item .remove-file:hover {
    color: #dc3545;
}
</style>

<!-- Include PDF.js and pdf-lib libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const selectFile = document.getElementById('selectFile');
    const fileList = document.getElementById('fileList');
    const sortableFiles = document.getElementById('sortableFiles');
    const mergeActions = document.getElementById('mergeActions');
    const mergeBtn = document.getElementById('mergeBtn');
    const clearBtn = document.getElementById('clearBtn');
    const mergeProgress = document.getElementById('mergeProgress');
    const progressBar = mergeProgress.querySelector('.progress-bar');

    let files = [];

    // Initialize Sortable
    new Sortable(sortableFiles, {
        animation: 150,
        onEnd: function() {
            // Update files array based on new order
            const items = sortableFiles.querySelectorAll('.list-group-item');
            const newFiles = [];
            items.forEach(item => {
                const index = parseInt(item.dataset.index);
                newFiles.push(files[index]);
            });
            files = newFiles;
        }
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
    mergeBtn.addEventListener('click', mergePDFs);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const newFiles = [...dt.files];
        addFiles(newFiles);
    }

    function handleFiles(e) {
        const newFiles = [...e.target.files];
        addFiles(newFiles);
    }

    function addFiles(newFiles) {
        // Validate files
        const validFiles = newFiles.filter(file => {
            if (file.type !== 'application/pdf') {
                alert(`${file.name} is not a PDF file.`);
                return false;
            }
            if (file.size > 100 * 1024 * 1024) { // 100MB limit
                alert(`${file.name} is too large. Maximum file size is 100MB.`);
                return false;
            }
            return true;
        });

        // Add valid files
        files.push(...validFiles);
        updateFileList();
    }

    function updateFileList() {
        if (files.length === 0) {
            fileList.style.display = 'none';
            mergeActions.style.display = 'none';
            return;
        }

        sortableFiles.innerHTML = '';
        files.forEach((file, index) => {
            const item = document.createElement('div');
            item.className = 'list-group-item d-flex justify-content-between align-items-center';
            item.dataset.index = index;
            item.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-grip-vertical me-3 text-muted"></i>
                    <i class="fas fa-file-pdf text-danger me-2"></i>
                    <span class="file-name">${file.name}</span>
                </div>
                <div class="d-flex align-items-center">
                    <small class="text-muted me-3">${formatBytes(file.size)}</small>
                    <i class="fas fa-times remove-file" data-index="${index}"></i>
                </div>
            `;
            
            // Add remove button handler
            item.querySelector('.remove-file').addEventListener('click', () => {
                files.splice(index, 1);
                updateFileList();
            });

            sortableFiles.appendChild(item);
        });

        fileList.style.display = 'block';
        mergeActions.style.display = 'block';
    }

    function clearFiles() {
        files = [];
        updateFileList();
    }

    async function mergePDFs() {
        if (files.length === 0) return;

        try {
            mergeBtn.disabled = true;
            mergeProgress.style.display = 'block';
            progressBar.style.width = '0%';

            // Create a new PDF document
            const mergedPdf = await PDFLib.PDFDocument.create();
            
            // Process each file
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                // Read file as ArrayBuffer
                const arrayBuffer = await file.arrayBuffer();
                
                // Load PDF document
                const pdf = await PDFLib.PDFDocument.load(arrayBuffer);
                
                // Copy pages
                const pages = await mergedPdf.copyPages(pdf, pdf.getPageIndices());
                pages.forEach(page => mergedPdf.addPage(page));
                
                // Update progress
                progressBar.style.width = `${((i + 1) / files.length) * 100}%`;
            }

            // Save the merged PDF
            const mergedPdfFile = await mergedPdf.save();
            
            // Create download link
            const blob = new Blob([mergedPdfFile], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'merged.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);

            // Reset UI
            progressBar.style.width = '100%';
            setTimeout(() => {
                mergeProgress.style.display = 'none';
                mergeBtn.disabled = false;
            }, 1000);

        } catch (error) {
            console.error('Error merging PDFs:', error);
            alert('Error merging PDFs. Please try again.');
            mergeProgress.style.display = 'none';
            mergeBtn.disabled = false;
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
