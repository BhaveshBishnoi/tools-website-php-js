<?php include '../../includes/header.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
        <li class="breadcrumb-item active" aria-current="page">CSS Editor</li>
    </ol>
</nav>
<title>CSS Editor - Live Preview and Syntax Highlighting</title>
<meta name="description" content="Edit CSS code with live preview and syntax highlighting. Perfect for web developers.">
<meta name="keywords" content="CSS editor, live preview, syntax highlighting, web development tool">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "CSS Editor",
  "description": "Edit CSS code with live preview and syntax highlighting.",
  "applicationCategory": "Developer Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container-fluid py-5">
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-paint-brush fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">CSS Editor</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Edit your CSS code with real-time preview and syntax highlighting.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <!-- CodeMirror Editor -->
                    <div id="codeEditor" class="mb-3" style="height: 300px;"></div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button type="button" class="btn btn-danger" onclick="updatePreview()">Update Preview</button>
                        <button type="button" class="btn btn-outline-danger" onclick="clearEditor()">Clear</button>
                        <button type="button" class="btn btn-success" onclick="copyToClipboard()">Copy to Clipboard</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Preview Section -->
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <h2 class="h4">Live Preview</h2>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <iframe id="livePreview" class="w-100" style="height: 300px;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Preview Section -->
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <h2 class="h4">Responsive Preview</h2>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="btn-group mb-3" role="group">
                        <button type="button" class="btn btn-outline-danger" onclick="setPreviewSize('320px')">Mobile</button>
                        <button type="button" class="btn btn-outline-danger" onclick="setPreviewSize('768px')">Tablet</button>
                        <button type="button" class="btn btn-outline-danger" onclick="setPreviewSize('1024px')">Desktop</button>
                        <button type="button" class="btn btn-outline-danger" onclick="setPreviewSize('100%')">Full Width</button>
                    </div>
                    <iframe id="responsivePreview" class="w-100" style="height: 300px; border: 1px solid #ddd;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits and How to Use Section -->
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <h2 class="h4">Benefits of Using CSS Editor</h2>
            <ul>
                <li>Instant feedback with live preview.</li>
                <li>Enhance productivity with syntax highlighting.</li>
                <li>Free to use for all your web development needs.</li>
            </ul>
            <h2 class="h4">How to Use</h2>
            <p>To use the CSS Editor, simply enter your CSS code in the provided editor. The live preview will update automatically as you type. You can also test your CSS on different screen sizes using the responsive preview feature.</p>
            <h2 class="h4">Additional Features</h2>
            <ul>
                <li>Supports all standard CSS properties.</li>
                <li>Responsive design for easy use on any device.</li>
                <li>Integrated with other developer tools for seamless workflow.</li>
            </ul>
        </div>
    </div>
</div>

<!-- Include CodeMirror -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/monokai.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/css/css.min.js"></script>

<script>
// Initialize CodeMirror
const editor = CodeMirror(document.getElementById('codeEditor'), {
    mode: 'css',
    theme: 'monokai',
    lineNumbers: true,
    autoCloseBrackets: true,
    matchBrackets: true,
    lineWrapping: true,
    viewportMargin: Infinity
});

// Update preview on editor change
let updateTimeout;
editor.on('change', () => {
    clearTimeout(updateTimeout);
    updateTimeout = setTimeout(updatePreview, 500);
});

function updatePreview() {
    const cssContent = editor.getValue();
    const iframe = document.getElementById('livePreview');
    const responsiveIframe = document.getElementById('responsivePreview');
    const doc = iframe.contentDocument || iframe.contentWindow.document;
    const responsiveDoc = responsiveIframe.contentDocument || responsiveIframe.contentWindow.document;

    doc.open();
    doc.write('<style>' + cssContent + '</style>');
    doc.close();

    responsiveDoc.open();
    responsiveDoc.write('<style>' + cssContent + '</style>');
    responsiveDoc.close();
}

function clearEditor() {
    editor.setValue('');
    updatePreview();
}

function copyToClipboard() {
    const cssContent = editor.getValue();
    navigator.clipboard.writeText(cssContent).then(() => {
        alert('CSS copied to clipboard!');
    });
}

function setPreviewSize(size) {
    const responsivePreview = document.getElementById('responsivePreview');
    responsivePreview.style.width = size;
}
</script>
<?php include '../../includes/footer.php'; ?>