<?php 
$pageTitle = "Image Tools - Free Online Image Editing & Conversion Tools";
$pageDescription = "Free online image tools to compress, convert, resize images and generate favicons. Easy to use with no registration required.";
include '../includes/header.php'; 
?>

<div class="container-fluid py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item active">Image Tools</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-images fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Image Tools</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Free online tools to optimize, convert, and enhance your images.
        </p>
    </div>

    <!-- Tools Grid -->
    <div class="row g-4">
        <!-- Image Converter -->
        <div class="col-lg-4 col-md-6">
            <a href="image-converter" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-exchange-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Image Converter</h3>
                        <p class="text-muted mb-0">Convert images between different formats including JPG, PNG, WebP, and GIF.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Image Resizer -->
        <div class="col-lg-4 col-md-6">
            <a href="image-resizer" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-expand fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Image Resizer</h3>
                        <p class="text-muted mb-0">Resize images by dimensions or percentage while maintaining aspect ratio.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- JPG Compressor -->
        <div class="col-lg-4 col-md-6">
            <a href="jpg-compressor" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-compress fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">JPG Compressor</h3>
                        <p class="text-muted mb-0">Compress JPG images while maintaining good visual quality.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- PNG Compressor -->
        <div class="col-lg-4 col-md-6">
            <a href="png-compressor" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-compress-arrows-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">PNG Compressor</h3>
                        <p class="text-muted mb-0">Optimize PNG images with lossless compression.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- WebP Compressor -->
        <div class="col-lg-4 col-md-6">
            <a href="webp-compressor" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-file-image fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">WebP Compressor</h3>
                        <p class="text-muted mb-0">Compress WebP images for faster website loading.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Favicon Generator -->
        <div class="col-lg-4 col-md-6">
            <a href="favicon-generator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-star fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Favicon Generator</h3>
                        <p class="text-muted mb-0">Create favicons for your website in all required sizes and formats.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our Image Tools</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Use</h3>
                        <p class="text-muted small">All our image tools are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Privacy Focused</h3>
                        <p class="text-muted small">Your images are processed locally and never stored on our servers.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Multiple Formats</h3>
                        <p class="text-muted small">Support for all popular image formats including JPG, PNG, WebP.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick and efficient image processing.</p>
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
