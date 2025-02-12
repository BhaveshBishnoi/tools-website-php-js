<?php 
$pageTitle = "Lorem Ipsum Generator - Generate Placeholder Text";
$pageDescription = "Free online Lorem Ipsum generator. Generate placeholder text for your designs, layouts, and mockups.";
include '../../includes/header.php';
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Lorem Ipsum Generator</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-align-left fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Lorem Ipsum Generator</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Generate placeholder text for your designs, layouts, and mockups.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="type" class="form-label">Type:</label>
                            <select class="form-select" id="type">
                                <option value="paragraphs">Paragraphs</option>
                                <option value="sentences">Sentences</option>
                                <option value="words">Words</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="count" class="form-label">Count:</label>
                            <input type="number" class="form-control" id="count" value="3" min="1" max="100">
                        </div>
                        <div class="col-md-4">
                            <label for="format" class="form-label">Format:</label>
                            <select class="form-select" id="format">
                                <option value="plain">Plain Text</option>
                                <option value="html">HTML</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <button class="btn btn-danger px-4" id="generate-btn">
                            <i class="fas fa-sync-alt me-2"></i>Generate Text
                        </button>
                    </div>

                    <div class="mb-3">
                        <label for="output" class="form-label">Generated Text:</label>
                        <textarea class="form-control" id="output" rows="10" readonly></textarea>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-outline-danger px-4" id="copy-btn">
                            <i class="fas fa-copy me-2"></i>Copy Text
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>

<?php include '../../includes/footer.php'; ?>
