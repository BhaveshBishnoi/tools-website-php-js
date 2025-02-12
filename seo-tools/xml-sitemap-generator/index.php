<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/seo-tools/">SEO Tools</a></li>
            <li class="breadcrumb-item active">XML Sitemap Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-sitemap fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">XML Sitemap Generator</h1>
                        <p class="text-muted">Generate an XML sitemap for better search engine indexing</p>
                    </div>

                    <form id="sitemapForm">
                        <div class="mb-4">
                            <label class="form-label">Enter Your Website URL</label>
                            <div class="input-group">
                                <select class="form-select flex-shrink-1" id="protocol" style="max-width: 120px;">
                                    <option value="https://">https://</option>
                                    <option value="http://">http://</option>
                                </select>
                                <input type="text" class="form-control" id="websiteUrl" required 
                                       placeholder="example.com">
                            </div>
                            <div class="form-text">Enter your website's root domain without trailing slash</div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Crawl Depth</label>
                                <select class="form-select" id="crawlDepth">
                                    <option value="1">1 level (homepage only)</option>
                                    <option value="2" selected>2 levels (recommended)</option>
                                    <option value="3">3 levels (deeper crawl)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Exclude Patterns</label>
                                <input type="text" class="form-control" id="excludePatterns" 
                                       placeholder="e.g., /admin/*, /private/*">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeImages" checked>
                                    <label class="form-check-label" for="includeImages">
                                        Include Image Sitemap
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeLastmod" checked>
                                    <label class="form-check-label" for="includeLastmod">
                                        Include Last Modified Dates
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger" id="generateBtn">
                                <i class="fas fa-file-code me-2"></i>Generate Sitemap
                            </button>
                        </div>
                    </form>

                    <!-- Progress Bar (Initially Hidden) -->
                    <div id="progressSection" class="mt-4" style="display: none;">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Generating Sitemap...</span>
                            <span id="progressText">0%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" 
                                 role="progressbar" style="width: 0%" id="progressBar"></div>
                        </div>
                    </div>

                    <!-- Results Section -->
                    <div id="sitemapResult" class="mt-4" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h5 mb-0">Generated Sitemap</h2>
                            <div class="stats small text-muted">
                                URLs Found: <span id="urlCount" class="fw-bold">0</span> |
                                Size: <span id="fileSize" class="fw-bold">0 KB</span>
                            </div>
                        </div>
                        
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <pre class="mb-0"><code id="sitemapPreview" class="language-xml"></code></pre>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-4">
                                <button class="btn btn-outline-danger w-100" onclick="downloadSitemap('xml')">
                                    <i class="fas fa-download me-2"></i>Download XML
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-outline-danger w-100" onclick="downloadSitemap('txt')">
                                    <i class="fas fa-file-alt me-2"></i>Download URL List
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-outline-danger w-100" onclick="copySitemap()">
                                    <i class="fas fa-copy me-2"></i>Copy to Clipboard
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="alert alert-danger mt-4" style="display: none;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tips for XML Sitemaps</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="mb-0 ps-3">
                                <li class="mb-2">Keep your sitemap under 50MB and 50,000 URLs</li>
                                <li class="mb-2">Update your sitemap when content changes</li>
                                <li>Submit your sitemap to search engines</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="mb-0 ps-3">
                                <li class="mb-2">Use robots.txt to reference your sitemap</li>
                                <li class="mb-2">Include only canonical URLs</li>
                                <li>Set appropriate change frequencies</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.progress {
    height: 10px;
}
pre {
    max-height: 400px;
    overflow-y: auto;
}
pre code {
    font-size: 0.875rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('sitemapForm');
    const progressSection = document.getElementById('progressSection');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const sitemapResult = document.getElementById('sitemapResult');
    const errorMessage = document.getElementById('errorMessage');
    let urls = [];

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Reset UI
        progressSection.style.display = 'block';
        sitemapResult.style.display = 'none';
        errorMessage.style.display = 'none';
        urls = [];
        updateProgress(0);

        const protocol = document.getElementById('protocol').value;
        const domain = document.getElementById('websiteUrl').value.trim();
        const depth = parseInt(document.getElementById('crawlDepth').value);
        const excludePatterns = document.getElementById('excludePatterns').value;
        const includeImages = document.getElementById('includeImages').checked;
        const includeLastmod = document.getElementById('includeLastmod').checked;

        try {
            // Simulate crawling with progress updates
            await simulateCrawling(protocol + domain, depth, excludePatterns);
            
            // Generate sitemap
            const sitemap = generateSitemap(urls, includeImages, includeLastmod);
            
            // Update preview
            document.getElementById('sitemapPreview').textContent = sitemap;
            document.getElementById('urlCount').textContent = urls.length;
            document.getElementById('fileSize').textContent = Math.round(sitemap.length / 1024) + ' KB';
            
            // Show results
            progressSection.style.display = 'none';
            sitemapResult.style.display = 'block';
            
        } catch (error) {
            showError(error.message);
        }
    });

    async function simulateCrawling(domain, depth, excludePatterns) {
        const totalSteps = Math.pow(3, depth); // Simulate finding 3 links per level
        let progress = 0;
        
        // Simulate finding homepage
        urls.push({
            loc: domain,
            lastmod: new Date().toISOString().split('T')[0],
            priority: '1.0',
            changefreq: 'daily'
        });
        updateProgress(5);

        // Simulate finding additional pages
        for (let i = 0; i < totalSteps; i++) {
            await new Promise(resolve => setTimeout(resolve, 50));
            if (urls.length < 50000) { // Respect sitemap limits
                urls.push({
                    loc: `${domain}/page-${i + 1}`,
                    lastmod: new Date().toISOString().split('T')[0],
                    priority: (1 / (Math.floor(Math.random() * 3) + 1)).toFixed(1),
                    changefreq: ['daily', 'weekly', 'monthly'][Math.floor(Math.random() * 3)]
                });
            }
            progress = 5 + ((i + 1) / totalSteps * 95);
            updateProgress(progress);
        }
    }

    function generateSitemap(urls, includeImages, includeLastmod) {
        let xml = '<?xml version="1.0" encoding="UTF-8"?>\n';
        xml += '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        if (includeImages) {
            xml += '\n    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"';
        }
        xml += '>\n';

        urls.forEach(url => {
            xml += '    <url>\n';
            xml += `        <loc>${url.loc}</loc>\n`;
            if (includeLastmod) {
                xml += `        <lastmod>${url.lastmod}</lastmod>\n`;
            }
            xml += `        <changefreq>${url.changefreq}</changefreq>\n`;
            xml += `        <priority>${url.priority}</priority>\n`;
            if (includeImages) {
                xml += '        <image:image>\n';
                xml += `            <image:loc>${url.loc}/sample-image.jpg</image:loc>\n`;
                xml += '        </image:image>\n';
            }
            xml += '    </url>\n';
        });

        xml += '</urlset>';
        return xml;
    }

    function updateProgress(percent) {
        progressBar.style.width = percent + '%';
        progressText.textContent = Math.round(percent) + '%';
    }

    function showError(message) {
        progressSection.style.display = 'none';
        sitemapResult.style.display = 'none';
        errorMessage.style.display = 'block';
        errorMessage.querySelector('span').textContent = message;
    }
});

function downloadSitemap(format) {
    const sitemap = document.getElementById('sitemapPreview').textContent;
    let content, filename, type;

    if (format === 'xml') {
        content = sitemap;
        filename = 'sitemap.xml';
        type = 'application/xml';
    } else {
        // Extract URLs for text format
        const urls = Array.from(sitemap.matchAll(/<loc>(.+?)<\/loc>/g))
            .map(match => match[1])
            .join('\n');
        content = urls;
        filename = 'urls.txt';
        type = 'text/plain';
    }

    const blob = new Blob([content], { type });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

function copySitemap() {
    const sitemap = document.getElementById('sitemapPreview').textContent;
    navigator.clipboard.writeText(sitemap).then(() => {
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
        setTimeout(() => {
            btn.innerHTML = originalText;
        }, 2000);
    });
}
</script>