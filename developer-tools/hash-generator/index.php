<?php 
$pageTitle = "Hash Generator - Free Developer Tool";
$pageDescription = "Generate MD5, SHA-1, SHA-256 hashes online for free.";
$pageKeywords = "hash generator, MD5, SHA-1, SHA-256, developer tool, online hash tool";
include '../../includes/header.php';
?>

<title>Hash Generator - Free Developer Tool</title>
<meta name="description" content="Generate MD5, SHA-1, SHA-256 hashes online for free.">
<meta name="keywords" content="hash generator, MD5, SHA-1, SHA-256, developer tool, online hash tool">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Hash Generator",
  "description": "Generate MD5, SHA-1, SHA-256 hashes online for free.",
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
            <li class="breadcrumb-item active">Hash Generator</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-hashtag fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Hash Generator</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Generate secure hashes using various algorithms including MD5, SHA-1, and SHA-256.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="input-text" class="form-label">Input Text:</label>
                        <textarea class="form-control" id="input-text" rows="4" placeholder="Enter text to generate hash..."></textarea>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="md5-output" class="form-label">MD5:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="md5-output" readonly>
                                    <button class="btn btn-outline-secondary copy-btn" data-target="md5-output">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sha1-output" class="form-label">SHA-1:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="sha1-output" readonly>
                                    <button class="btn btn-outline-secondary copy-btn" data-target="sha1-output">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sha256-output" class="form-label">SHA-256:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="sha256-output" readonly>
                                    <button class="btn btn-outline-secondary copy-btn" data-target="sha256-output">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger px-4" id="generate-btn">
                            <i class="fas fa-cog me-2"></i>Generate Hashes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script src="script.js"></script>

<?php include '../../includes/footer.php'; ?>
