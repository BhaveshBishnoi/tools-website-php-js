<?php 
include '../../includes/header.php'; 
$pageTitle = "Meta Tags Generator - Free SEO Tool";
$pageDescription = "Generate optimized meta tags for your web pages to improve SEO and search engine rankings.";
$pageKeywords = "meta tags generator, SEO tool, search engine optimization, meta tags, web page optimization";
?>
<title>Meta Tags Generator - Free SEO Tool</title>
<meta name="description" content="Generate optimized meta tags for your web pages to improve SEO and search engine rankings.">
<meta name="keywords" content="meta tags generator, SEO tool, search engine optimization, meta tags, web page optimization">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Meta Tags Generator",
  "description": "Generate optimized meta tags for your web pages to improve SEO and search engine rankings.",
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
            <li class="breadcrumb-item active">Meta Tags Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-tags fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Meta Tags Generator</h1>
                        <p class="text-muted">Generate optimized meta tags for better SEO</p>
                    </div>

                    <form id="metaTagForm" class="needs-validation" novalidate>
                        <!-- Page Title -->
                        <div class="mb-4">
                            <label class="form-label">Page Title</label>
                            <input type="text" class="form-control" id="pageTitle" required maxlength="60">
                            <div class="form-text">
                                <span id="titleCount">0</span>/60 characters (Recommended: 50-60)
                            </div>
                        </div>

                        <!-- Meta Description -->
                        <div class="mb-4">
                            <label class="form-label">Meta Description</label>
                            <textarea class="form-control" id="metaDescription" rows="3" required maxlength="160"></textarea>
                            <div class="form-text">
                                <span id="descriptionCount">0</span>/160 characters (Recommended: 150-160)
                            </div>
                        </div>

                        <!-- Keywords -->
                        <div class="mb-4">
                            <label class="form-label">Keywords (comma separated)</label>
                            <input type="text" class="form-control" id="keywords">
                            <div class="form-text">Optional: Enter keywords separated by commas</div>
                        </div>

                        <!-- Author -->
                        <div class="mb-4">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control" id="author">
                        </div>

                        <!-- Robots -->
                        <div class="mb-4">
                            <label class="form-label">Robots</label>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="indexFollow" checked>
                                        <label class="form-check-label" for="indexFollow">
                                            Index, Follow
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="noArchive">
                                        <label class="form-check-label" for="noArchive">
                                            No Archive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Preview -->
                        <div class="mb-4">
                            <label class="form-label">Social Media Preview</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="generateOG" checked>
                                <label class="form-check-label" for="generateOG">
                                    Generate Open Graph tags (Facebook, LinkedIn)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="generateTwitter" checked>
                                <label class="form-check-label" for="generateTwitter">
                                    Generate Twitter Card tags
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-code me-2"></i>Generate Meta Tags
                            </button>
                        </div>
                    </form>

                    <!-- Results Section -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Generated Meta Tags</h2>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">HTML Code</label>
                                <button class="btn btn-sm btn-outline-danger" onclick="copyToClipboard('metaCode')">
                                    <i class="fas fa-copy me-1"></i>Copy
                                </button>
                            </div>
                            <pre class="bg-light p-3 rounded"><code id="metaCode"></code></pre>
                        </div>

                        <div class="mb-3">
                            <h3 class="h6 mb-3">Preview</h3>
                            <div class="border rounded p-3 bg-light">
                                <div id="previewTitle" class="text-danger mb-1" style="font-size: 1.1em;"></div>
                                <div id="previewUrl" class="text-success small mb-1"></div>
                                <div id="previewDescription" class="small text-muted"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use Meta Tags Generator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter your page title (keep it under 60 characters)</li>
                        <li class="mb-2">Write a compelling meta description (ideally 150-160 characters)</li>
                        <li class="mb-2">Add relevant keywords (optional)</li>
                        <li class="mb-2">Configure robots directives and social media options</li>
                        <li>Click "Generate Meta Tags" to create your meta tags</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Meta Tags Best Practices</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Use unique titles and descriptions for each page</li>
                        <li class="mb-2">Include your main keyword in both title and description</li>
                        <li class="mb-2">Make descriptions actionable and compelling</li>
                        <li>Keep titles and descriptions within recommended lengths</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('metaTagForm');
    const results = document.getElementById('results');
    
    // Character counters
    document.getElementById('pageTitle').addEventListener('input', function() {
        document.getElementById('titleCount').textContent = this.value.length;
    });
    
    document.getElementById('metaDescription').addEventListener('input', function() {
        document.getElementById('descriptionCount').textContent = this.value.length;
    });
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const title = document.getElementById('pageTitle').value;
        const description = document.getElementById('metaDescription').value;
        const keywords = document.getElementById('keywords').value;
        const author = document.getElementById('author').value;
        const indexFollow = document.getElementById('indexFollow').checked;
        const noArchive = document.getElementById('noArchive').checked;
        const generateOG = document.getElementById('generateOG').checked;
        const generateTwitter = document.getElementById('generateTwitter').checked;
        
        // Generate meta tags
        let metaTags = `<title>${escapeHtml(title)}</title>\n`;
        metaTags += `<meta name="description" content="${escapeHtml(description)}">\n`;
        
        if (keywords) {
            metaTags += `<meta name="keywords" content="${escapeHtml(keywords)}">\n`;
        }
        
        if (author) {
            metaTags += `<meta name="author" content="${escapeHtml(author)}">\n`;
        }
        
        // Robots
        let robotsContent = [];
        if (!indexFollow) robotsContent.push('noindex, nofollow');
        if (noArchive) robotsContent.push('noarchive');
        if (robotsContent.length > 0) {
            metaTags += `<meta name="robots" content="${robotsContent.join(', ')}">\n`;
        }
        
        // Open Graph
        if (generateOG) {
            metaTags += `<meta property="og:title" content="${escapeHtml(title)}">\n`;
            metaTags += `<meta property="og:description" content="${escapeHtml(description)}">\n`;
            metaTags += '<meta property="og:type" content="website">\n';
        }
        
        // Twitter Card
        if (generateTwitter) {
            metaTags += '<meta name="twitter:card" content="summary">\n';
            metaTags += `<meta name="twitter:title" content="${escapeHtml(title)}">\n`;
            metaTags += `<meta name="twitter:description" content="${escapeHtml(description)}">\n`;
        }
        
        // Update preview
        document.getElementById('metaCode').textContent = metaTags;
        document.getElementById('previewTitle').textContent = title;
        document.getElementById('previewUrl').textContent = 'https://example.com/page';
        document.getElementById('previewDescription').textContent = description;
        
        results.style.display = 'block';
    });
});

function escapeHtml(unsafe) {
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function copyToClipboard(elementId) {
    const element = document.getElementById(elementId);
    const textarea = document.createElement('textarea');
    textarea.value = element.textContent;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    
    showAlert('success', 'Meta tags copied to clipboard!');
}
</script>

<?php include '../../includes/footer.php'; ?>
