<?php
$pageTitle = "Free Legal Tools - Privacy Policy Generator, Terms & Conditions & More";
$pageDescription = "Free online legal tools to help you create essential legal documents for your website. Generate privacy policies, terms and conditions, and more.";
include '../includes/header.php'; 
?>

<div class="container-fluid py-5">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item active">Legal Tools</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-balance-scale fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Legal Tools</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Free online tools to create essential legal documents for your website.
        </p>
    </div>

    <!-- Tools Grid -->
    <div class="row g-4">
        <!-- Row 1 -->
        <div class="col-lg-4 col-md-6">
            <a href="privacy-policy-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-shield-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Privacy Policy Generator</h3>
                        <p class="text-muted mb-0">Generate a custom privacy policy for your website.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="terms-and-conditions-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-file-contract fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Terms & Conditions Generator</h3>
                        <p class="text-muted mb-0">Create a terms and conditions page for your website.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="disclaimer-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Disclaimer Generator</h3>
                        <p class="text-muted mb-0">Generate a disclaimer for your website.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Row 2 -->
        <div class="col-lg-4 col-md-6">
            <a href="cookie-policy-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-cookie fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Cookie Policy Generator</h3>
                        <p class="text-muted mb-0">Create a cookie policy for your website.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="refund-policy-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-undo fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Refund Policy Generator</h3>
                        <p class="text-muted mb-0">Generate a refund policy for your business.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="gdpr-compliance-checker/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-check-circle fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">GDPR Compliance Checker</h3>
                        <p class="text-muted mb-0">Check your website's GDPR compliance.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our Legal Tools</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Use</h3>
                        <p class="text-muted small">All our legal tools are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Privacy Focused</h3>
                        <p class="text-muted small">Your data is processed locally and never stored on our servers.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Legal Best Practices</h3>
                        <p class="text-muted small">Tools follow the latest legal guidelines and regulations.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick legal document generation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-shadow-lg {
    transition: all 0.3s ease-in-out;
}
.hover-shadow-lg:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}
</style>

<?php include '../includes/footer.php'; ?>