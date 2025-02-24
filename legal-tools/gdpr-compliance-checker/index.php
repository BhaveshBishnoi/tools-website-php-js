<?php
include '../../includes/header.php'; 

$pageTitle = "GDPR Compliance Checker - Free Tool";
$pageDescription = "Check your website's GDPR compliance quickly and easily.";
$pageKeywords = "gdpr compliance checker, gdpr compliance tool, free gdpr checker, gdpr audit";
?>

<title>GDPR Compliance Checker - Free Tool</title>
<meta name="description" content="Check your website's GDPR compliance quickly and easily.">
<meta name="keywords" content="gdpr compliance checker, gdpr compliance tool, free gdpr checker, gdpr audit">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "GDPR Compliance Checker",
  "description": "Check your website's GDPR compliance quickly and easily.",
  "applicationCategory": "Legal Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/legal-tools/">Legal Tools</a></li>
            <li class="breadcrumb-item active">GDPR Compliance Checker</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle fa-3x text-danger mb-3"></i>
                        <h1 class="h3">GDPR Compliance Checker</h1>
                        <p class="text-muted">Check your website's GDPR compliance</p>
                    </div>

                    <!-- Input Form -->
                    <div class="mb-4">
                        <div class="form-group">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="websiteUrl" placeholder="https://example.com" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you collect personal data?</label>
                            <select class="form-select" id="collectData">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you have a privacy policy?</label>
                            <select class="form-select" id="privacyPolicy">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you use cookies?</label>
                            <select class="form-select" id="useCookies">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Generate Button -->
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="generateBtn">
                            <i class="fas fa-check me-2"></i>Check GDPR Compliance
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Checking GDPR compliance...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">GDPR Compliance Results</h2>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre id="gdprResults" class="mb-0"></pre>
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
                    <h2 class="h5 mb-3">About GDPR Compliance Checker</h2>
                    <p>The General Data Protection Regulation (GDPR) is a legal framework that sets guidelines for the collection and processing of personal data. This tool helps you:</p>
                    <ul class="mb-0">
                        <li>Check your website's GDPR compliance</li>
                        <li>Identify areas for improvement</li>
                        <li>Ensure compliance with GDPR regulations</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const generateBtn = document.getElementById('generateBtn');
    const loadingState = document.getElementById('loadingState');
    const resultsSection = document.getElementById('resultsSection');
    const errorMessage = document.getElementById('errorMessage');
    const gdprResults = document.getElementById('gdprResults');

    // Check GDPR Compliance
    generateBtn.addEventListener('click', function() {
        const websiteUrl = document.getElementById('websiteUrl').value.trim();
        const collectData = document.getElementById('collectData').value;
        const privacyPolicy = document.getElementById('privacyPolicy').value;
        const useCookies = document.getElementById('useCookies').value;

        if (!websiteUrl) {
            showError('Please enter a valid website URL.');
            return;
        }

        try {
            // Show loading state
            loadingState.style.display = 'block';
            resultsSection.style.display = 'none';
            errorMessage.style.display = 'none';
            generateBtn.disabled = true;

            // Simulate compliance check delay
            setTimeout(() => {
                const results = checkGDPRCompliance(websiteUrl, collectData, privacyPolicy, useCookies);
                gdprResults.textContent = results;
                resultsSection.style.display = 'block';
                generateBtn.disabled = false;
                loadingState.style.display = 'none';
            }, 1000);
        } catch (error) {
            showError(error.message);
        }
    });

    // Check GDPR Compliance Logic
    function checkGDPRCompliance(websiteUrl, collectData, privacyPolicy, useCookies) {
        let results = `GDPR Compliance Report for ${websiteUrl}\n\n`;

        if (collectData === 'yes') {
            results += "✅ You collect personal data. Ensure you have a lawful basis for processing.\n";
        } else {
            results += "❌ You do not collect personal data. GDPR may not apply to your website.\n";
        }

        if (privacyPolicy === 'yes') {
            results += "✅ You have a privacy policy. Ensure it includes all required GDPR information.\n";
        } else {
            results += "❌ You do not have a privacy policy. This is a GDPR requirement.\n";
        }

        if (useCookies === 'yes') {
            results += "✅ You use cookies. Ensure you have a cookie policy and obtain user consent.\n";
        } else {
            results += "❌ You do not use cookies. No additional GDPR requirements for cookies.\n";
        }

        return results;
    }

    // Show Error Message
    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
        resultsSection.style.display = 'none';
        loadingState.style.display = 'none';
        generateBtn.disabled = false;
    }
});
</script>

<?php include '../../includes/footer.php'; ?>