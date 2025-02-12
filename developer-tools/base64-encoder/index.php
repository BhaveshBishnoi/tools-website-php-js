<?php 
$pageTitle = "Base64 Encoder/Decoder - Convert Text to Base64";
$pageDescription = "Free online Base64 encoder and decoder. Convert text to Base64 and decode Base64 strings back to text.";
include '../../includes/header.php';
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Base64 Encoder/Decoder</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-exchange-alt fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Base64 Encoder/Decoder</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Easily encode and decode Base64 strings with our free online tool.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="input-text" class="form-label">Input Text:</label>
                        <textarea class="form-control" id="input-text" rows="6" placeholder="Enter text to encode/decode..."></textarea>
                    </div>
                    <div class="text-center mb-3">
                        <button class="btn btn-danger px-4 me-2" id="encode-btn">
                            <i class="fas fa-lock me-2"></i>Encode to Base64
                        </button>
                        <button class="btn btn-outline-danger px-4" id="decode-btn">
                            <i class="fas fa-unlock me-2"></i>Decode from Base64
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="output-text" class="form-label">Output:</label>
                        <textarea class="form-control" id="output-text" rows="6" readonly></textarea>
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
