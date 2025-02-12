<?php 
$pageTitle = "Free Online Tools - Text, File & Data Converters";
$pageDescription = "Collection of free online tools for text manipulation, file conversion, data processing and more. Simple and easy to use tools for everyday tasks.";
include '../includes/header.php'; 
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item active">Other Tools</li>
        </ol>
    </nav>
    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-tools fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Other Tools</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Free online tools for various everyday tasks.
        </p>
    </div>

    <!-- Tools Grid -->
    <div class="row g-4">
        <!-- Row 1 -->
        <div class="col-lg-4 col-md-6">
            <a href="text-tools/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-font fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Text Tools</h3>
                        <p class="text-muted mb-0">Case converter, counter & formatter.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="file-converter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-file-export fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">File Converter</h3>
                        <p class="text-muted mb-0">Convert between different file formats.</p>
                    </div>
                </div>
            </a>
        </div>

       
        <!-- Row 2 -->
        <div class="col-lg-4 col-md-6">
            <a href="unit-converter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-ruler fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Unit Converter</h3>
                        <p class="text-muted mb-0">Convert between different units.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="time-converter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-clock fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Time Converter</h3>
                        <p class="text-muted mb-0">Convert between time zones.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="qr-code-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-qrcode fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">QR Generator</h3>
                        <p class="text-muted mb-0">Generate QR codes for any data.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="7th-pay-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-calculator fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">7th Pay Calculator</h3>
                        <p class="text-muted mb-0">Calculate salary as per 7th CPC.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our Tools</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Use</h3>
                        <p class="text-muted small">All our tools are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Privacy Focused</h3>
                        <p class="text-muted small">Your data is processed locally and never stored on our servers.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick tasks.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Multiple Formats</h3>
                        <p class="text-muted small">Support for various file and data formats.</p>
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
