<?php
include '../../includes/header.php'; 

$pageTitle = "Disclaimer Generator - Free Tool";
$pageDescription = "Generate a custom disclaimer for your website quickly and easily.";
$pageKeywords = "disclaimer generator, disclaimer template, free disclaimer, legal agreement";
?>

<title>Disclaimer Generator - Free Tool</title>
<meta name="description" content="Generate a custom disclaimer for your website quickly and easily.">
<meta name="keywords" content="disclaimer generator, disclaimer template, free disclaimer, legal agreement">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Disclaimer Generator",
  "description": "Generate a custom disclaimer for your website quickly and easily.",
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
            <li class="breadcrumb-item active">Disclaimer Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-exclamation-circle fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Disclaimer Generator</h1>
                        <p class="text-muted">Create a custom disclaimer for your website</p>
                    </div>

                    <!-- Input Form -->
                    <div class="mb-4">
                        <div class="form-group">
                            <label class="form-label">Website Name</label>
                            <input type="text" class="form-control" id="websiteName" placeholder="My Website" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="websiteUrl" placeholder="https://example.com" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailAddress" placeholder="contact@example.com" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you provide professional advice?</label>
                            <select class="form-select" id="provideAdvice">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you display external links?</label>
                            <select class="form-select" id="externalLinks">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you host user-generated content?</label>
                            <select class="form-select" id="userContent">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Generate Button -->
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="generateBtn">
                            <i class="fas fa-file-alt me-2"></i>Generate Disclaimer
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Generating disclaimer...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Your Disclaimer</h2>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre id="disclaimerContent" class="mb-0"></pre>
                            </div>
                        </div>
                        <div class="d-grid mt-3">
                            <button type="button" class="btn btn-success" id="copyBtn">
                                <i class="fas fa-copy me-2"></i>Copy to Clipboard
                            </button>
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
                    <h2 class="h5 mb-3">About Disclaimer Generator</h2>
                    <p>A disclaimer is essential for any website to limit liability and clarify responsibilities. This tool helps you:</p>
                    <ul class="mb-0">
                        <li>Create a custom disclaimer tailored to your website</li>
                        <li>Protect your business from legal claims</li>
                        <li>Save time with an easy-to-use generator</li>
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
    const disclaimerContent = document.getElementById('disclaimerContent');
    const copyBtn = document.getElementById('copyBtn');

    // Generate Disclaimer
    generateBtn.addEventListener('click', function() {
        const websiteName = document.getElementById('websiteName').value.trim();
        const websiteUrl = document.getElementById('websiteUrl').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();
        const provideAdvice = document.getElementById('provideAdvice').value;
        const externalLinks = document.getElementById('externalLinks').value;
        const userContent = document.getElementById('userContent').value;

        if (!websiteName || !websiteUrl || !emailAddress) {
            showError('Please fill in all required fields.');
            return;
        }

        try {
            // Show loading state
            loadingState.style.display = 'block';
            resultsSection.style.display = 'none';
            errorMessage.style.display = 'none';
            generateBtn.disabled = true;

            // Simulate generation delay
            setTimeout(() => {
                const disclaimer = generateDisclaimer(websiteName, websiteUrl, emailAddress, provideAdvice, externalLinks, userContent);
                disclaimerContent.textContent = disclaimer;
                resultsSection.style.display = 'block';
                generateBtn.disabled = false;
                loadingState.style.display = 'none';
            }, 1000);
        } catch (error) {
            showError(error.message);
        }
    });

    // Copy to Clipboard
    copyBtn.addEventListener('click', function() {
        const text = disclaimerContent.textContent;
        navigator.clipboard.writeText(text).then(() => {
            alert('Disclaimer copied to clipboard!');
        }).catch(() => {
            showError('Failed to copy text.');
        });
    });

    // Generate Disclaimer Content
    function generateDisclaimer(websiteName, websiteUrl, emailAddress, provideAdvice, externalLinks, userContent) {
        return `
Disclaimer for ${websiteName}

Effective Date: ${new Date().toLocaleDateString()}

1. Introduction
Welcome to ${websiteName} ("we," "our," "us"). By accessing or using our website ${websiteUrl}, you agree to the terms outlined in this disclaimer.

2. No Professional Advice
${provideAdvice === 'yes' ? 'The information provided on this website is for general informational purposes only and does not constitute professional advice. You should consult a qualified professional for specific advice tailored to your situation.' : 'The information provided on this website is for general informational purposes only.'}

3. External Links
${externalLinks === 'yes' ? 'Our website may contain links to external websites. We are not responsible for the content or practices of these external sites.' : 'Our website does not contain links to external websites.'}

4. User-Generated Content
${userContent === 'yes' ? 'We may host user-generated content. The views expressed in such content are solely those of the users and do not reflect our opinions.' : 'We do not host user-generated content on this website.'}

5. Limitation of Liability
In no event shall ${websiteName} be liable for any damages arising out of or in connection with your use of this website.

6. Contact Us
If you have any questions about this disclaimer, please contact us at ${emailAddress}.

7. Changes to This Disclaimer
We may update this disclaimer from time to time. Any changes will be posted on this page.
`;
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