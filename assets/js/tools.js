// Function to handle form submissions
function handleToolForm(form, successCallback) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
        submitBtn.disabled = true;

        // Create FormData object
        const formData = new FormData(form);

        // Send request
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                showAlert('success', data.message);
                if (successCallback) successCallback(data);
            } else {
                // Show error message
                showAlert('danger', data.message || 'An error occurred');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('danger', 'An error occurred while processing your request');
        })
        .finally(() => {
            // Reset button state
            submitBtn.innerHTML = originalBtnText;
            submitBtn.disabled = false;
        });
    });
}

// Function to show alerts
function showAlert(type, message) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    // Find the container and insert alert
    const container = document.querySelector('.container');
    container.insertBefore(alertDiv, container.firstChild);

    // Auto dismiss after 5 seconds
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}

// Function to format file size
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Function to create color swatch
function createColorSwatch(hex, percentage) {
    return `
        <div class="color-swatch mb-2 d-flex align-items-center">
            <div class="swatch me-2" style="width: 30px; height: 30px; background-color: ${hex}; border: 1px solid #dee2e6;"></div>
            <div>
                <div class="fw-bold">${hex}</div>
                <div class="small text-muted">${percentage}%</div>
            </div>
        </div>
    `;
}

// Initialize all tool forms
document.addEventListener('DOMContentLoaded', function() {
    // Image compression forms
    const compressForms = document.querySelectorAll('form[action^="process/compress-"]');
    compressForms.forEach(form => {
        handleToolForm(form, function(data) {
            // Create result div
            const resultDiv = document.createElement('div');
            resultDiv.className = 'mt-3 text-start';
            resultDiv.innerHTML = `
                <div class="mb-2">
                    <strong>Original Size:</strong> ${formatFileSize(data.data.original_size)}
                </div>
                <div class="mb-2">
                    <strong>Compressed Size:</strong> ${formatFileSize(data.data.compressed_size)}
                </div>
                <div class="mb-2">
                    <strong>Space Saved:</strong> ${formatFileSize(data.data.saved_size)} (${data.data.saved_percentage}%)
                </div>
                <a href="${data.data.download_url}" class="btn btn-success btn-sm" download>
                    <i class="fas fa-download me-1"></i> Download Compressed Image
                </a>
            `;
            
            // Find or create result container
            let resultContainer = form.querySelector('.result-container');
            if (!resultContainer) {
                resultContainer = document.createElement('div');
                resultContainer.className = 'result-container';
                form.appendChild(resultContainer);
            }
            
            // Clear previous results and add new one
            resultContainer.innerHTML = '';
            resultContainer.appendChild(resultDiv);
        });
    });

    // Image converter form
    const converterForm = document.querySelector('form[action="process/convert-image.php"]');
    if (converterForm) {
        handleToolForm(converterForm, function(data) {
            // Create result div
            const resultDiv = document.createElement('div');
            resultDiv.className = 'mt-3 text-start';
            resultDiv.innerHTML = `
                <a href="${data.data.download_url}" class="btn btn-success btn-sm" download>
                    <i class="fas fa-download me-1"></i> Download Converted Image
                </a>
            `;
            
            // Find or create result container
            let resultContainer = converterForm.querySelector('.result-container');
            if (!resultContainer) {
                resultContainer = document.createElement('div');
                resultContainer.className = 'result-container';
                converterForm.appendChild(resultContainer);
            }
            
            // Clear previous results and add new one
            resultContainer.innerHTML = '';
            resultContainer.appendChild(resultDiv);
        });
    }

    // Image resizer form
    const resizerForm = document.querySelector('form[action="process/resize-image.php"]');
    if (resizerForm) {
        handleToolForm(resizerForm, function(data) {
            // Create result div
            const resultDiv = document.createElement('div');
            resultDiv.className = 'mt-3 text-start';
            resultDiv.innerHTML = `
                <div class="mb-2">
                    <strong>Original Size:</strong> ${data.data.original_width}x${data.data.original_height}px
                </div>
                <div class="mb-2">
                    <strong>New Size:</strong> ${data.data.new_width}x${data.data.new_height}px
                </div>
                <a href="${data.data.download_url}" class="btn btn-success btn-sm" download>
                    <i class="fas fa-download me-1"></i> Download Resized Image
                </a>
            `;
            
            // Find or create result container
            let resultContainer = resizerForm.querySelector('.result-container');
            if (!resultContainer) {
                resultContainer = document.createElement('div');
                resultContainer.className = 'result-container';
                resizerForm.appendChild(resultContainer);
            }
            
            // Clear previous results and add new one
            resultContainer.innerHTML = '';
            resultContainer.appendChild(resultDiv);
        });
    }

    // Color picker form
    const colorPickerForm = document.querySelector('form[action="process/color-picker.php"]');
    if (colorPickerForm) {
        handleToolForm(colorPickerForm, function(data) {
            // Create result div
            const resultDiv = document.createElement('div');
            resultDiv.className = 'mt-3 text-start';
            
            let colorsHtml = '<div class="mb-3"><strong>Dominant Colors:</strong></div>';
            data.data.colors.forEach(color => {
                colorsHtml += createColorSwatch(color.hex, color.percentage);
            });
            
            resultDiv.innerHTML = colorsHtml;
            
            // Find or create result container
            let resultContainer = colorPickerForm.querySelector('.result-container');
            if (!resultContainer) {
                resultContainer = document.createElement('div');
                resultContainer.className = 'result-container';
                colorPickerForm.appendChild(resultContainer);
            }
            
            // Clear previous results and add new one
            resultContainer.innerHTML = '';
            resultContainer.appendChild(resultDiv);
        });
    }
});
