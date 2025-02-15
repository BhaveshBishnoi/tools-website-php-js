<?php
$pageTitle = "HTML Viewer - Free Developer Tool";
$pageDescription = "Live HTML editor with preview and formatting online for free.";
$pageKeywords = "HTML viewer, live HTML editor, developer tool, online HTML tool, HTML formatting";
include '../../includes/header.php';
?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">HTML Viewer</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-code fa-3x text-danger mb-3"></i>
                        <h1 class="h3">HTML Viewer</h1>
                        <p class="text-muted">Live HTML editor and preview with syntax highlighting</p>
                    </div>

                    <!-- Loading Spinner -->
                    <div id="loadingSpinner" class="text-center mb-3" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Editor Section -->
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="h5 mb-0">HTML Editor</h2>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-danger" id="formatBtn">
                                            <i class="fas fa-align-left me-2"></i>Format
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" id="clearBtn">
                                            <i class="fas fa-trash-alt me-2"></i>Clear
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-grow-1 position-relative">
                                    <textarea id="htmlEditor" class="form-control font-monospace" style="height: 500px; resize: none;" spellcheck="false" placeholder="Enter your HTML code here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Section -->
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="h5 mb-0">Live Preview</h2>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-danger" id="refreshBtn">
                                            <i class="fas fa-sync-alt me-2"></i>Refresh
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" id="downloadBtn">
                                            <i class="fas fa-download me-2"></i>Download
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-grow-1 bg-light rounded border p-3" style="height: 500px;">
                                    <iframe id="previewFrame" class="w-100 h-100 bg-white" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="alert alert-danger mt-4" style="display: none;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span></span>
                        <button type="button" class="btn-close float-end" onclick="hideError()"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <!-- FAQs Section -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">Frequently Asked Questions</h2>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                    What is an HTML Viewer?
                                </button>
                            </h2>
                            <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    An HTML Viewer is a tool that allows you to write, edit, and preview HTML code in real-time. It is useful for developers to test and debug their HTML code.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                    Can I download the HTML code?
                                </button>
                            </h2>
                            <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, you can download the HTML code by clicking the "Download" button in the Live Preview section. This will save your code as an HTML file.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                    Is this tool free to use?
                                </button>
                            </h2>
                            <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, this HTML Viewer is completely free to use. There are no hidden fees or subscriptions.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Tools Section -->
            <div class="card">
                <div class="card-body">
                    <h2 class="h5 mb-3">Related Tools</h2>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <a href="/tools/developer-tools/css-editor/" class="btn btn-outline-danger w-100">
                                <i class="fas fa-paint-brush me-2"></i>CSS Editor
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="/tools/developer-tools/javascript-compiler/" class="btn btn-outline-danger w-100">
                                <i class="fab fa-js-square me-2"></i>JavaScript Compiler
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="/tools/developer-tools/json-formatter/" class="btn btn-outline-danger w-100">
                                <i class="fas fa-code me-2"></i>JSON Formatter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Links -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/monokai.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/standalone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/parser-html.js"></script>

<style>
.CodeMirror {
    height: 500px;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out;
}

.CodeMirror-focused {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editor = CodeMirror.fromTextArea(document.getElementById('htmlEditor'), {
        mode: 'htmlmixed',
        theme: 'monokai',
        lineNumbers: true,
        autoCloseTags: true,
        matchTags: {bothTags: true},
        foldGutter: true,
        gutters: ['CodeMirror-linenumbers', 'CodeMirror-foldgutter'],
        extraKeys: {
            'Ctrl-S': function(cm) { formatCode(); },
            'Cmd-S': function(cm) { formatCode(); }
        }
    });

    const previewFrame = document.getElementById('previewFrame');
    const errorMessage = document.getElementById('errorMessage');
    const loadingSpinner = document.getElementById('loadingSpinner');

    // Improved preview update with loading indicator
    let updateDebounce;
    editor.on('change', () => {
        clearTimeout(updateDebounce);
        loadingSpinner.style.display = 'block';
        updateDebounce = setTimeout(() => {
            updatePreview();
            loadingSpinner.style.display = 'none';
        }, 500);
    });

    // Enhanced format function
    function formatCode() {
        try {
            loadingSpinner.style.display = 'block';
            const formatted = prettier.format(editor.getValue(), {
                parser: 'html',
                plugins: [window.prettierPlugins.html],
                printWidth: 100,
                tabWidth: 4,
                useTabs: false
            });
            editor.setValue(formatted);
            hideError();
        } catch (error) {
            showError(`Formatting error: ${error.message}`);
        } finally {
            loadingSpinner.style.display = 'none';
        }
    }

    // Enhanced preview update
    function updatePreview() {
        try {
            const content = editor.getValue();
            const iframeDoc = previewFrame.contentDocument || previewFrame.contentWindow.document;
            
            iframeDoc.open();
            iframeDoc.write(content);
            iframeDoc.close();
            
            // Add error handling for iframe content
            previewFrame.contentWindow.addEventListener('error', (e) => {
                showError(`Preview error: ${e.message}`);
            });
            
            hideError();
        } catch (error) {
            showError(`Preview update failed: ${error.message}`);
        }
    }

    // Enhanced error handling
    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'flex';
        errorMessage.scrollIntoView({ behavior: 'smooth' });
    }

    function hideError() {
        errorMessage.style.display = 'none';
    }

    // Event listeners for buttons
    document.getElementById('formatBtn').addEventListener('click', formatCode);
    document.getElementById('clearBtn').addEventListener('click', () => {
        if (confirm('Are you sure you want to clear the editor?')) {
            editor.setValue('');
            hideError();
        }
    });
    document.getElementById('refreshBtn').addEventListener('click', updatePreview);
    document.getElementById('downloadBtn').addEventListener('click', () => {
        const content = editor.getValue();
        const blob = new Blob([content], { type: 'text/html' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'index.html';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Keyboard shortcut for formatting
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            formatCode();
        }
    });
});
</script>

<?php include '../../includes/footer.php'; ?>