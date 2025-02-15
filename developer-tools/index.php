<?php 
$pageTitle = "Free Developer Tools - Code Formatters, Encoders & Generators";
$pageDescription = "Free online developer tools including code formatters, encoders/decoders, sample data generators, and more. No registration required.";
include '../includes/header.php'; 
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item active">Developer Tools</li>
        </ol>
    </nav>
    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-code fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Developer Tools</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Free online tools to help developers code faster and more efficiently.
        </p>
    </div>

    <!-- Tools Grid -->
    <div class="row g-4">
        <!-- Row 1 -->
        <div class="col-lg-4 col-md-6">
            <a href="code-formatter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-indent fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Code Formatter</h3>
                        <p class="text-muted mb-0">Format and beautify code in various languages.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="json-formatter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                    <div class="icon-box mb-4 flex justify-content-center align-items-center">
        <p class="text-danger h1 ">{&nbsp;}</p>
        </div>
                        <h3 class="h5 mb-3 text-dark">JSON Formatter</h3>
                        <p class="text-muted mb-0">Format, validate and beautify JSON data.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="base64-encoder/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-exchange-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Base64 Encoder</h3>
                        <p class="text-muted mb-0">Encode and decode Base64 strings.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Row 2 -->
        <div class="col-lg-4 col-md-6">
            <a href="url-encoder/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-link fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">URL Encoder</h3>
                        <p class="text-muted mb-0">Encode and decode URL strings.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="hash-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-hashtag fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Hash Generator</h3>
                        <p class="text-muted mb-0">Generate MD5, SHA-1, SHA-256 hashes.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="password-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-key fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Password Generator</h3>
                        <p class="text-muted mb-0">Generate secure random passwords.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Row 3 -->
        <div class="col-lg-4 col-md-6">
            <a href="html-viewer/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-code fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">HTML Viewer</h3>
                        <p class="text-muted mb-0">Live HTML editor with preview and formatting.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="javascript-compiler/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fab fa-js fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">JavaScript Compiler</h3>
                        <p class="text-muted mb-0">Write and run JavaScript code online.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="java-compiler/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fab fa-java fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Java Compiler</h3>
                        <p class="text-muted mb-0">Compile and run Java code online.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="lorem-ipsum-generator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-align-left fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Lorem Ipsum</h3>
                        <p class="text-muted mb-0">Generate placeholder text for designs.</p>
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
            <a href="data-converter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-exchange-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Data Converter</h3>
                        <p class="text-muted mb-0">Convert between data formats.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="css-editor/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-paint-brush fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">CSS Editor</h3>
                        <p class="text-muted mb-0">Edit CSS with live preview and syntax highlighting.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="regex-tester/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-asterisk fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Regex Tester</h3>
                        <p class="text-muted mb-0">Test and validate regular expressions.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="color-picker/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-palette fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Color Picker</h3>
                        <p class="text-muted mb-0">Pick and convert color codes.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="css-to-tailwind-converter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-exchange-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">CSS to Tailwind Converter</h3>
                        <p class="text-muted mb-0">Convert CSS to Tailwind utility classes easily.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our Developer Tools</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Use</h3>
                        <p class="text-muted small">All our developer tools are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Privacy Focused</h3>
                        <p class="text-muted small">Your code and data are processed locally and never stored on our servers.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Developer Friendly</h3>
                        <p class="text-muted small">Tools designed by developers for developers.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick development tasks.</p>
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
