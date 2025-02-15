<?php 
$pageTitle = "Code Formatter - Free Developer Tool";
$pageDescription = "Format and beautify code in various programming languages online for free.";
$pageKeywords = "code formatter, code beautifier, developer tool, online code formatter, programming languages";
include '../../includes/header.php';
?>

<title>Code Formatter - Free Developer Tool</title>
<meta name="description" content="Format and beautify code in various programming languages online for free.">
<meta name="keywords" content="code formatter, code beautifier, developer tool, online code formatter, programming languages">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Code Formatter",
  "description": "Format and beautify code in various programming languages online for free.",
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
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Code Formatter</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-indent fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Code Formatter</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Format and beautify your code in various programming languages with our free online tool.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="language" class="form-label">Select Language:</label>
                        <select class="form-select" id="language">
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="javascript">JavaScript</option>
                            <option value="php">PHP</option>
                            <option value="sql">SQL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input-code" class="form-label">Input Code:</label>
                        <textarea class="form-control code-editor" id="input-code" rows="10" placeholder="Paste your code here..."></textarea>
                    </div>
                    <div class="text-center mb-3">
                        <button class="btn btn-danger px-4" id="format-btn">
                            <i class="fas fa-magic me-2"></i>Format Code
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="output-code" class="form-label">Formatted Code:</label>
                        <textarea class="form-control code-editor" id="output-code" rows="10" readonly></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-danger px-4" id="copy-btn">
                            <i class="fas fa-copy me-2"></i>Copy Formatted Code
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/sql/sql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/php/php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify-css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify-html.min.js"></script>
<script src="script.js"></script>

<style>
.CodeMirror {
    height: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
}
</style>

<?php include '../../includes/footer.php'; ?>
