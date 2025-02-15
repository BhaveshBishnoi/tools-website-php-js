<?php
include '../../includes/header.php'; 

$pageTitle = "Backlink Checker - Free SEO Tool";
$pageDescription = "Analyze your website's backlink profile to improve SEO and search engine rankings.";
$pageKeywords = "backlink checker, SEO tool, backlink analysis, search engine optimization, website ranking";
?>

<title>Backlink Checker - Free SEO Tool</title>
<meta name="description" content="Analyze your website's backlink profile to improve SEO and search engine rankings.">
<meta name="keywords" content="backlink checker, SEO tool, backlink analysis, search engine optimization, website ranking">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Backlink Checker",
  "description": "Analyze your website's backlink profile to improve SEO and search engine rankings.",
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
            <li class="breadcrumb-item active">Backlink Checker</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-link fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Backlink Checker</h1>
                        <p class="text-muted">Analyze your website's backlink profile</p>
                    </div>

                    <div class="mb-4">
                        <div class="form-group">
                            <label class="form-label">Enter Website URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                <input type="url" class="form-control" id="urlInput" 
                                       placeholder="https://example.com" required>
                            </div>
                            <div class="form-text">
                                Enter the full URL including http:// or https://
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkSubdomains" checked>
                            <label class="form-check-label" for="checkSubdomains">
                                Include subdomains
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkDofollow">
                            <label class="form-check-label" for="checkDofollow">
                                Show only dofollow links
                            </label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="analyzeBtn">
                            <i class="fas fa-search me-2"></i>Check Backlinks
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Analyzing backlinks...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Backlink Analysis Results</h2>
                        
                        <!-- Overview Stats -->
                        <div class="row g-3 mb-4">
                            <div class="col-sm-6 col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6 class="text-muted mb-1">Total Backlinks</h6>
                                        <span class="h4" id="totalBacklinks">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6 class="text-muted mb-1">Referring Domains</h6>
                                        <span class="h4" id="referringDomains">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6 class="text-muted mb-1">Dofollow Links</h6>
                                        <span class="h4" id="dofollowLinks">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6 class="text-muted mb-1">Domain Rating</h6>
                                        <span class="h4" id="domainRating">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="h6 mb-3">Link Types Distribution</h3>
                                        <canvas id="linkTypesChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="h6 mb-3">Top Anchor Texts</h3>
                                        <canvas id="anchorTextsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Backlinks Table -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="h6 mb-3">Latest Backlinks</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="backlinksTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Linking Page</th>
                                                <th>Domain Rating</th>
                                                <th>Link Type</th>
                                                <th>Anchor Text</th>
                                                <th>First Seen</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
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

            <!-- Information Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">About Backlink Checker</h2>
                    <p>Backlinks are crucial for SEO success. This tool helps you:</p>
                    <ul class="mb-0">
                        <li>Monitor your backlink profile</li>
                        <li>Identify high-quality referring domains</li>
                        <li>Track dofollow vs nofollow links</li>
                        <li>Analyze anchor text distribution</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlInput = document.getElementById('urlInput');
    const analyzeBtn = document.getElementById('analyzeBtn');
    const loadingState = document.getElementById('loadingState');
    const resultsSection = document.getElementById('resultsSection');
    const errorMessage = document.getElementById('errorMessage');
    const checkSubdomains = document.getElementById('checkSubdomains');
    const checkDofollow = document.getElementById('checkDofollow');
    let linkTypesChart = null;
    let anchorTextsChart = null;

    // Validate URL input
    urlInput.addEventListener('input', function() {
        const url = this.value.trim();
        analyzeBtn.disabled = !isValidUrl(url);
    });

    // Analyze backlinks
    analyzeBtn.addEventListener('click', async function() {
        const url = urlInput.value.trim();
        
        if (!isValidUrl(url)) {
            showError('Please enter a valid URL');
            return;
        }

        try {
            // Show loading state
            loadingState.style.display = 'block';
            resultsSection.style.display = 'none';
            errorMessage.style.display = 'none';
            analyzeBtn.disabled = true;

            // Simulate API call
            const results = await checkBacklinks(url);
            
            // Display results
            displayResults(results);

        } catch (error) {
            showError(error.message);
        } finally {
            loadingState.style.display = 'none';
            analyzeBtn.disabled = false;
        }
    });

    // Simulate backlink checking (replace with actual API integration)
    async function checkBacklinks(url) {
        // Simulate API delay
        await new Promise(resolve => setTimeout(resolve, 2000));

        // Simulate backlink data
        const totalBacklinks = Math.floor(Math.random() * 1000) + 100;
        const dofollowCount = Math.floor(totalBacklinks * 0.7);
        const nofollowCount = totalBacklinks - dofollowCount;

        const domains = generateRandomDomains(Math.floor(totalBacklinks * 0.3));
        const anchors = generateRandomAnchors();
        const backlinks = generateRandomBacklinks(totalBacklinks, domains, anchors);

        return {
            totalBacklinks,
            referringDomains: domains.length,
            dofollowLinks: dofollowCount,
            domainRating: Math.floor(Math.random() * 50) + 30,
            linkTypes: {
                dofollow: dofollowCount,
                nofollow: nofollowCount
            },
            anchorTexts: anchors,
            backlinks
        };
    }

    function displayResults(results) {
        resultsSection.style.display = 'block';

        // Update overview stats
        document.getElementById('totalBacklinks').textContent = results.totalBacklinks;
        document.getElementById('referringDomains').textContent = results.referringDomains;
        document.getElementById('dofollowLinks').textContent = results.dofollowLinks;
        document.getElementById('domainRating').textContent = results.domainRating;

        // Update charts
        updateLinkTypesChart(results.linkTypes);
        updateAnchorTextsChart(results.anchorTexts);

        // Update backlinks table
        const tbody = document.querySelector('#backlinksTable tbody');
        tbody.innerHTML = results.backlinks
            .filter(link => !checkDofollow.checked || link.type === 'Dofollow')
            .slice(0, 10)
            .map(link => `
                <tr>
                    <td>
                        <a href="${link.url}" target="_blank" class="text-truncate d-inline-block" style="max-width: 200px;">
                            ${link.url}
                        </a>
                    </td>
                    <td>${link.domainRating}</td>
                    <td>
                        <span class="badge ${link.type === 'Dofollow' ? 'bg-success' : 'bg-secondary'}">
                            ${link.type}
                        </span>
                    </td>
                    <td>${link.anchorText}</td>
                    <td>${link.firstSeen}</td>
                </tr>
            `).join('');
    }

    function updateLinkTypesChart(data) {
        if (linkTypesChart) {
            linkTypesChart.destroy();
        }

        const ctx = document.getElementById('linkTypesChart').getContext('2d');
        linkTypesChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Dofollow', 'Nofollow'],
                datasets: [{
                    data: [data.dofollow, data.nofollow],
                    backgroundColor: ['#198754', '#6c757d']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    function updateAnchorTextsChart(data) {
        if (anchorTextsChart) {
            anchorTextsChart.destroy();
        }

        const ctx = document.getElementById('anchorTextsChart').getContext('2d');
        anchorTextsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Frequency',
                    data: Object.values(data),
                    backgroundColor: 'rgba(220, 53, 69, 0.8)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    }

    // Helper functions
    function isValidUrl(string) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;
        }
    }

    function generateRandomDomains(count) {
        const domains = [];
        const tlds = ['.com', '.org', '.net', '.edu', '.gov'];
        
        for (let i = 0; i < count; i++) {
            domains.push(`example${i}${tlds[Math.floor(Math.random() * tlds.length)]}`);
        }
        
        return domains;
    }

    function generateRandomAnchors() {
        return {
            'Brand Name': Math.floor(Math.random() * 20) + 10,
            'Click Here': Math.floor(Math.random() * 15) + 5,
            'Read More': Math.floor(Math.random() * 10) + 5,
            'Website': Math.floor(Math.random() * 8) + 3,
            'URL': Math.floor(Math.random() * 12) + 8
        };
    }

    function generateRandomBacklinks(count, domains, anchors) {
        const backlinks = [];
        const anchorTexts = Object.keys(anchors);
        
        for (let i = 0; i < count; i++) {
            const domain = domains[Math.floor(Math.random() * domains.length)];
            backlinks.push({
                url: `https://${domain}/page-${i}`,
                domainRating: Math.floor(Math.random() * 100),
                type: Math.random() > 0.3 ? 'Dofollow' : 'Nofollow',
                anchorText: anchorTexts[Math.floor(Math.random() * anchorTexts.length)],
                firstSeen: new Date(Date.now() - Math.random() * 90 * 24 * 60 * 60 * 1000)
                    .toLocaleDateString()
            });
        }
        
        return backlinks;
    }

    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
        resultsSection.style.display = 'none';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
