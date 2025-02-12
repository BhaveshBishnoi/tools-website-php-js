<?php 
$pageTitle = "URL Encoder/Decoder - Encode & Decode URLs";
$pageDescription = "Free online URL encoder and decoder. Convert special characters to URL-safe format and decode encoded URLs.";
include '../../includes/header.php';
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">URL Encoder/Decoder</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-link fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">URL Encoder/Decoder</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Convert special characters to URL-safe format and decode encoded URLs.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="input-url" class="form-label">Input URL or Text:</label>
                        <textarea class="form-control" id="input-url" rows="6" placeholder="Enter URL or text to encode/decode..."></textarea>
                    </div>
                    <div class="text-center mb-3">
                        <button class="btn btn-danger px-4 me-2" id="encode-btn">
                            <i class="fas fa-lock me-2"></i>Encode URL
                        </button>
                        <button class="btn btn-outline-danger px-4" id="decode-btn">
                            <i class="fas fa-unlock me-2"></i>Decode URL
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="output-url" class="form-label">Output:</label>
                        <textarea class="form-control" id="output-url" rows="6" readonly></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-danger px-4" id="copy-btn">
                            <i class="fas fa-copy me-2"></i>Copy Result
                        </button>
                        <button class="btn btn-outline-secondary px-4 ms-2" id="swap-btn">
                            <i class="fas fa-exchange-alt me-2"></i>Swap Input/Output
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>

<?php include '../../includes/footer.php'; ?>
