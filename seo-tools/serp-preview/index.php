<?php 
include '../../includes/header.php'; 
$pageTitle = "SERP Preview - Free SEO Tool";
$pageDescription = "Preview how your page appears in Google search results to improve click-through rates and SEO.";
$pageKeywords = "SERP preview, SEO tool, search engine results, Google preview, click-through rate optimization";
?>
<title>SERP Preview - Free SEO Tool</title>
<meta name="description" content="Preview how your page appears in Google search results to improve click-through rates and SEO.">
<meta name="keywords" content="SERP preview, SEO tool, search engine results, Google preview, click-through rate optimization">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "SERP Preview",
  "description": "Preview how your page appears in Google search results to improve click-through rates and SEO.",
  "applicationCategory": "SEO Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>
<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/seo-tools/">SEO Tools</a></li>
            <li class="breadcrumb-item active">SERP Preview</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-eye fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">SERP Preview Tool</h1>
                        <p class="text-muted">Preview how your page appears in Google search results</p>
                    </div>

                    <form id="serpForm" class="needs-validation" novalidate>
                        <!-- Page Title -->
                        <div class="mb-4">
                            <label class="form-label">Page Title</label>
                            <input type="text" class="form-control" id="pageTitle" required maxlength="60">
                            <div class="form-text">
                                <span id="titleCount">0</span>/60 characters
                                <div class="progress mt-1" style="height: 3px;">
                                    <div id="titleProgress" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- URL -->
                        <div class="mb-4">
                            <label class="form-label">Page URL</label>
                            <input type="url" class="form-control" id="pageUrl" required>
                            <div class="form-text">Enter the full URL of your page</div>
                        </div>

                        <!-- Meta Description -->
                        <div class="mb-4">
                            <label class="form-label">Meta Description</label>
                            <textarea class="form-control" id="metaDescription" rows="3" required maxlength="160"></textarea>
                            <div class="form-text">
                                <span id="descriptionCount">0</span>/160 characters
                                <div class="progress mt-1" style="height: 3px;">
                                    <div id="descriptionProgress" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Device Type -->
                        <div class="mb-4">
                            <label class="form-label">Preview Device</label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="deviceType" id="desktop" value="desktop" checked>
                                <label class="btn btn-outline-danger" for="desktop">
                                    <i class="fas fa-desktop me-2"></i>Desktop
                                </label>

                                <input type="radio" class="btn-check" name="deviceType" id="mobile" value="mobile">
                                <label class="btn btn-outline-danger" for="mobile">
                                    <i class="fas fa-mobile-alt me-2"></i>Mobile
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger text-white">
                                <i class="fas fa-eye me-2"></i>Generate Preview
                            </button>
                        </div>
                    </form>

                    <!-- Preview Section -->
                    <div id="preview" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Search Result Preview</h2>
                        
                        <!-- Desktop Preview -->
                        <div id="desktopPreview" class="preview-container border rounded p-3 bg-light">
                            <div class="preview-title text-danger mb-1" style="font-size: 1.2em;"></div>
                            <div class="preview-url text-success small mb-1"></div>
                            <div class="preview-description text-muted"></div>
                        </div>

                        <!-- Mobile Preview -->
                        <div id="mobilePreview" class="preview-container border rounded p-3 bg-light" style="display: none; max-width: 400px; margin: 0 auto;">
                            <div class="preview-title text-danger mb-1" style="font-size: 1.1em;"></div>
                            <div class="preview-url text-success small mb-1"></div>
                            <div class="preview-description text-muted" style="font-size: 0.9em;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use SERP Preview Tool</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter your page title (recommended: 50-60 characters)</li>
                        <li class="mb-2">Input your page URL</li>
                        <li class="mb-2">Write your meta description (recommended: 150-160 characters)</li>
                        <li class="mb-2">Select device type for preview (desktop/mobile)</li>
                        <li>Click "Generate Preview" to see how your page will appear in search results</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">SERP Optimization Tips</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Use your main keyword naturally in both title and description</li>
                        <li class="mb-2">Write compelling titles that encourage clicks</li>
                        <li class="mb-2">Include a clear call-to-action in your meta description</li>
                        <li>Keep your URLs clean, short, and descriptive</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('serpForm');
    const preview = document.getElementById('preview');
    const desktopPreview = document.getElementById('desktopPreview');
    const mobilePreview = document.getElementById('mobilePreview');
    
    // Character counters and progress bars
    const titleInput = document.getElementById('pageTitle');
    const descriptionInput = document.getElementById('metaDescription');
    
    titleInput.addEventListener('input', function() {
        const count = this.value.length;
        document.getElementById('titleCount').textContent = count;
        const progress = (count / 60) * 100;
        const progressBar = document.getElementById('titleProgress');
        progressBar.style.width = `${progress}%`;
        progressBar.className = `progress-bar ${progress > 100 ? 'bg-danger' : progress > 90 ? 'bg-warning' : 'bg-success'}`;
    });
    
    descriptionInput.addEventListener('input', function() {
        const count = this.value.length;
        document.getElementById('descriptionCount').textContent = count;
        const progress = (count / 160) * 100;
        const progressBar = document.getElementById('descriptionProgress');
        progressBar.style.width = `${progress}%`;
        progressBar.className = `progress-bar ${progress > 100 ? 'bg-danger' : progress > 90 ? 'bg-warning' : 'bg-success'}`;
    });
    
    // Device type switcher
    document.querySelectorAll('input[name="deviceType"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'desktop') {
                desktopPreview.style.display = 'block';
                mobilePreview.style.display = 'none';
            } else {
                desktopPreview.style.display = 'none';
                mobilePreview.style.display = 'block';
            }
        });
    });
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const title = titleInput.value;
        const url = document.getElementById('pageUrl').value;
        const description = descriptionInput.value;
        
        // Update both previews
        [desktopPreview, mobilePreview].forEach(container => {
            container.querySelector('.preview-title').textContent = title;
            container.querySelector('.preview-url').textContent = formatUrl(url);
            container.querySelector('.preview-description').textContent = description;
        });
        
        preview.style.display = 'block';
    });
});

function formatUrl(url) {
    try {
        const urlObj = new URL(url);
        return urlObj.hostname + urlObj.pathname;
    } catch (e) {
        return url;
    }
}
</script>

<?php include '../../includes/footer.php'; ?>
