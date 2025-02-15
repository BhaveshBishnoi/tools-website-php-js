<?php
include '../../includes/header.php'; 
$pageTitle = "Robots.txt Generator - Free SEO Tool";
$pageDescription = "Create and customize robots.txt files to control search engine crawling and indexing of your website.";
$pageKeywords = "robots.txt generator, SEO tool, search engine crawling, website indexing, robots.txt file";
?>
<title>Robots.txt Generator - Free SEO Tool</title>
<meta name="description" content="Create and customize robots.txt files to control search engine crawling and indexing of your website.">
<meta name="keywords" content="robots.txt generator, SEO tool, search engine crawling, website indexing, robots.txt file">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Robots.txt Generator",
  "description": "Create and customize robots.txt files to control search engine crawling and indexing of your website.",
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
            <li class="breadcrumb-item active">Robots.txt Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-robot fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Robots.txt Generator</h1>
                        <p class="text-muted">Easily create and customize your robots.txt file</p>
                    </div>

                    <form id="robotsTxtForm">
                        <div class="mb-4">
                            <label class="form-label">User-Agent</label>
                            <input type="text" class="form-control" id="userAgent" placeholder="*" value="*">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Allow</label>
                            <input type="text" class="form-control" id="allow" placeholder="/">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Disallow</label>
                            <input type="text" class="form-control" id="disallow" placeholder="/private/">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Sitemap URL</label>
                            <input type="text" class="form-control" id="sitemap" placeholder="https://example.com/sitemap.xml">
                        </div>

                        <div class="d-grid">
                            <button type="button" class="btn btn-danger" onclick="generateRobotsTxt()">
                                <i class="fas fa-file-code me-2"></i>Generate Robots.txt
                            </button>
                        </div>
                    </form>

                    <div id="outputSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Generated Robots.txt</h2>
                        <pre class="bg-light p-3 border" id="robotsTxtOutput"></pre>
                        <button class="btn btn-success mt-3" onclick="copyToClipboard()">
                            <i class="fas fa-copy me-2"></i>Copy to Clipboard
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function generateRobotsTxt() {
    const userAgent = document.getElementById('userAgent').value;
    const allow = document.getElementById('allow').value;
    const disallow = document.getElementById('disallow').value;
    const sitemap = document.getElementById('sitemap').value;
    
    let robotsTxt = `User-agent: ${userAgent}\n`;
    if (allow) robotsTxt += `Allow: ${allow}\n`;
    if (disallow) robotsTxt += `Disallow: ${disallow}\n`;
    if (sitemap) robotsTxt += `Sitemap: ${sitemap}\n`;
    
    document.getElementById('robotsTxtOutput').textContent = robotsTxt;
    document.getElementById('outputSection').style.display = 'block';
}

function copyToClipboard() {
    const text = document.getElementById('robotsTxtOutput').textContent;
    navigator.clipboard.writeText(text).then(() => {
        alert('Copied to clipboard!');
    });
}
</script>
<?php include '../../includes/footer.php'; ?>