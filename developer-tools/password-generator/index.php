<?php 
$pageTitle = "Password Generator - Generate Secure Passwords";
$pageDescription = "Free online password generator. Create strong, secure, and random passwords with customizable options.";
include '../../includes/header.php';
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Password Generator</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-key fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Password Generator</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Generate strong, secure, and random passwords with customizable options.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label for="password-output" class="form-label">Generated Password:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" id="password-output" readonly>
                            <button class="btn btn-outline-danger" id="copy-btn">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="length" class="form-label">Password Length:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="length" value="16" min="4" max="64">
                                <span class="input-group-text">characters</span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="uppercase" checked>
                                <label class="form-check-label" for="uppercase">
                                    Include Uppercase Letters (A-Z)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lowercase" checked>
                                <label class="form-check-label" for="lowercase">
                                    Include Lowercase Letters (a-z)
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="numbers" checked>
                                <label class="form-check-label" for="numbers">
                                    Include Numbers (0-9)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="symbols" checked>
                                <label class="form-check-label" for="symbols">
                                    Include Symbols (!@#$%^&*)
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-danger px-4" id="generate-btn">
                            <i class="fas fa-sync-alt me-2"></i>Generate Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>

<?php include '../../includes/footer.php'; ?>
