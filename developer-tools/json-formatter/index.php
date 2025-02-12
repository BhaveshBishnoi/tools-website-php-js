<?php 
$pageTitle = "JSON Formatter - Format & Validate JSON";
$pageDescription = "Free online JSON formatter and validator. Format, validate and beautify your JSON data with our easy to use tool.";
include '../../includes/header.php';
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">JSON Formatter</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4 flex justify-content-center align-items-center">
        <p class="text-danger h1 ">{&nbsp;}</p>
        </div>
        <h1 class="display-5 fw-bold mb-3">JSON Formatter</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Format, validate and beautify your JSON data instantly.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="input-json" class="form-label">Input JSON:</label>
                        <textarea class="form-control code-editor" id="input-json" rows="10" placeholder="Paste your JSON here..."></textarea>
                    </div>
                    <div class="text-center mb-3">
                        <button class="btn btn-danger px-4 me-2" id="format-btn">
                            <i class="fas fa-magic me-2"></i>Format JSON
                        </button>
                        <button class="btn btn-outline-danger px-4" id="minify-btn">
                            <i class="fas fa-compress-alt me-2"></i>Minify
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="output-json" class="form-label">Formatted JSON:</label>
                        <textarea class="form-control code-editor" id="output-json" rows="10" readonly></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-danger px-4" id="copy-btn">
                            <i class="fas fa-copy me-2"></i>Copy Formatted JSON
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/monokai.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
<script src="script.js"></script>

<style>
.CodeMirror {
    height: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
}
</style>

<?php include '../../includes/footer.php'; ?>
