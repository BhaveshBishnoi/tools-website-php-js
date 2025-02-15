<?php 
$pageTitle = "Free Online PDF Tools - Convert, Merge, Split & More";
$pageDescription = "Free online PDF tools to convert, merge, split, compress and manipulate PDF files. No registration required.";
include '../includes/header.php'; 
?>

<title>Free Online PDF Tools - Convert, Merge, Split & More</title>
<meta name="description" content="Free online PDF tools to convert, merge, split, compress and manipulate PDF files. No registration required.">
<meta name="keywords" content="pdf tools, online pdf tools, free pdf tools, convert pdf, merge pdf, split pdf">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "PDF Tools",
  "description": "Free online PDF tools to convert, merge, split, compress and manipulate PDF files.",
  "applicationCategory": "PDF Tool",
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
            <li class="breadcrumb-item active">PDF Tools</li>
        </ol>
    </nav>
    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-file-pdf fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">PDF Tools</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Free online tools to work with PDF files. Convert, merge, split, and compress with ease.
        </p>
    </div>

    <!-- Tools Grid -->
    <div class="row g-4">
        <!-- PDF to Word -->
        <div class="col-lg-4 col-md-6">
            <a href="pdf-to-word-convertor" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-file-word fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">PDF to Word</h3>
                        <p class="text-muted mb-0">Convert PDF files to editable Word documents while maintaining formatting.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- PDF to Image -->
        <div class="col-lg-4 col-md-6">
            <a href="pdf-to-image-convertor" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-image fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">PDF to Image</h3>
                        <p class="text-muted mb-0">Convert PDF pages to high-quality images in various formats (JPG, PNG).</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Image to PDF -->
        <div class="col-lg-4 col-md-6">
            <a href="image-to-pdf-convertor" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-file-image fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Image to PDF</h3>
                        <p class="text-muted mb-0">Convert single or multiple images into a PDF file with custom settings.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- PDF Merger -->
        <div class="col-lg-4 col-md-6">
            <a href="pdf-merger" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-object-group fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">PDF Merger</h3>
                        <p class="text-muted mb-0">Combine multiple PDF files into a single document. Arrange pages as needed.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- PDF Splitter -->
        <div class="col-lg-4 col-md-6">
            <a href="pdf-splitter" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-cut fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">PDF Splitter</h3>
                        <p class="text-muted mb-0">Split large PDF files into smaller documents by page ranges.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- PDF Page Remover -->
        <div class="col-lg-4 col-md-6">
            <a href="pdf-page-remover" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-trash-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">PDF Page Remover</h3>
                        <p class="text-muted mb-0">Remove specific pages from your PDF files quickly and easily.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- PDF Compressor -->
        <div class="col-lg-4 col-md-6">
            <a href="pdf-compressor" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-compress-arrows-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">PDF Compressor</h3>
                        <p class="text-muted mb-0">Reduce PDF file size while maintaining reasonable quality.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our PDF Tools</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Use</h3>
                        <p class="text-muted small">All our PDF tools are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Privacy Focused</h3>
                        <p class="text-muted small">Your files are processed locally and never stored on our servers.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>High Quality</h3>
                        <p class="text-muted small">Maintain document quality and formatting during conversion.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick and efficient PDF management.</p>
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
