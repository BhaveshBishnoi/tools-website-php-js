<?php include '../../includes/header.php'; ?>

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
                    </div>
                </div>
            </div>

            <!-- Sample Templates -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">Sample Templates</h2>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('basic')">
                                <i class="fas fa-file-code me-2"></i>Basic HTML
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('bootstrap')">
                                <i class="fab fa-bootstrap me-2"></i>Bootstrap Template
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('responsive')">
                                <i class="fas fa-mobile-alt me-2"></i>Responsive Layout
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">About HTML Viewer</h2>
                    <p>This tool provides a real-time HTML editor and preview environment. Features include:</p>
                    <ul class="mb-0">
                        <li>Live preview as you type</li>
                        <li>Syntax highlighting</li>
                        <li>Code formatting</li>
                        <li>Sample templates</li>
                        <li>Download functionality</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include CodeMirror -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/monokai.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/standalone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/parser-html.js"></script>

<style>
.CodeMirror {
    height: 500px;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CodeMirror
    const editor = CodeMirror.fromTextArea(document.getElementById('htmlEditor'), {
        mode: 'htmlmixed',
        theme: 'monokai',
        lineNumbers: true,
        autoCloseTags: true,
        autoCloseBrackets: true,
        matchBrackets: true,
        indentUnit: 4,
        lineWrapping: true,
        viewportMargin: Infinity
    });

    const previewFrame = document.getElementById('previewFrame');
    const errorMessage = document.getElementById('errorMessage');
    const formatBtn = document.getElementById('formatBtn');
    const clearBtn = document.getElementById('clearBtn');
    const refreshBtn = document.getElementById('refreshBtn');
    const downloadBtn = document.getElementById('downloadBtn');

    // Update preview on change
    let updateTimeout;
    editor.on('change', function() {
        clearTimeout(updateTimeout);
        updateTimeout = setTimeout(updatePreview, 500);
    });

    // Format code
    formatBtn.addEventListener('click', function() {
        try {
            let formatOptions = {
                parser: 'html',
                printWidth: 80,
                tabWidth: 4,
                useTabs: false,
                plugins: window.prettierPlugins || []
            };
            const formatted = prettier.format(editor.getValue(), formatOptions);
            editor.setValue(formatted);
            hideError();
        } catch (error) {
            showError(error.message);
        }
    });

    // Clear editor
    clearBtn.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear the editor?')) {
            editor.setValue('');
            hideError();
        }
    });

    // Refresh preview
    refreshBtn.addEventListener('click', updatePreview);

    // Download HTML
    downloadBtn.addEventListener('click', function() {
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

    // Update preview
    function updatePreview() {
        try {
            const content = editor.getValue();
            const doc = previewFrame.contentWindow.document;
            doc.open();
            doc.write(content);
            doc.close();
            hideError();
        } catch (error) {
            showError(error.message);
        }
    }

    // Error handling
    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
    }

    function hideError() {
        errorMessage.style.display = 'none';
    }

    // Load template
    window.loadTemplate = function(type) {
        let template = '';
        switch (type) {
            case 'basic':
                template = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic HTML Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Hello, World!</h1>
    <p>This is a basic HTML template with some simple styling.</p>
    <ul>
        <li>List item 1</li>
        <li>List item 2</li>
        <li>List item 3</li>
    </ul>
</body>
</html>`;
                break;
            case 'bootstrap':
                template = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <h1>Bootstrap Template</h1>
                <p class="lead">This is a starter template with Bootstrap 5.</p>
                <button class="btn btn-primary">Click Me</button>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text for the card.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>`;
                break;
            case 'responsive':
                template = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .card {
            background: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .card h2 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .card p {
            color: #666;
        }
        
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Responsive Layout</h1>
            <p>This template demonstrates a responsive grid layout using CSS Grid.</p>
        </header>

        <div class="grid">
            <div class="card">
                <h2>Card 1</h2>
                <p>This is a responsive card that will adjust its width based on screen size.</p>
            </div>
            <div class="card">
                <h2>Card 2</h2>
                <p>Try resizing your browser window to see how the layout adapts.</p>
            </div>
            <div class="card">
                <h2>Card 3</h2>
                <p>The cards will stack vertically on smaller screens.</p>
            </div>
            <div class="card">
                <h2>Card 4</h2>
                <p>CSS Grid makes it easy to create responsive layouts.</p>
            </div>
        </div>
    </div>
</body>
</html>`;
                break;
        }
        editor.setValue(template);
        updatePreview();
    }

    // Load basic template by default
    loadTemplate('basic');
});
</script>

<?php include '../../includes/footer.php'; ?>