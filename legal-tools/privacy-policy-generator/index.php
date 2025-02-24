<?php
include '../../includes/header.php'; 

$pageTitle = "Privacy Policy Generator - Free Tool";
$pageDescription = "Generate a custom privacy policy for your website quickly and easily.";
$pageKeywords = "privacy policy generator, privacy policy template, free privacy policy, GDPR compliance";
?>

<title>Privacy Policy Generator - Free Tool</title>
<meta name="description" content="Generate a custom privacy policy for your website quickly and easily.">
<meta name="keywords" content="privacy policy generator, privacy policy template, free privacy policy, GDPR compliance">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Privacy Policy Generator",
  "description": "Generate a custom privacy policy for your website quickly and easily.",
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
            <li class="breadcrumb-item active">Privacy Policy Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-shield-alt fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Privacy Policy Generator</h1>
                        <p class="text-muted">Create a custom privacy policy for your website</p>
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
                            <label class="form-label">Do you collect personal data?</label>
                            <select class="form-select" id="collectData">
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

                        <div class="form-group mt-3">
                            <label class="form-label">Do you share data with third parties?</label>
                            <select class="form-select" id="shareData">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Generate Button -->
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="generateBtn">
                            <i class="fas fa-file-alt me-2"></i>Generate Privacy Policy
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Generating privacy policy...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Your Privacy Policy</h2>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre id="privacyPolicyContent" class="mb-0"></pre>
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
                    <h2 class="h5 mb-3">About Privacy Policy Generator</h2>
                    <p>A privacy policy is essential for any website that collects user data. This tool helps you:</p>
                    <ul class="mb-0">
                        <li>Create a custom privacy policy tailored to your website</li>
                        <li>Ensure compliance with GDPR and other regulations</li>
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
    const privacyPolicyContent = document.getElementById('privacyPolicyContent');
    const copyBtn = document.getElementById('copyBtn');

    // Generate Privacy Policy
    generateBtn.addEventListener('click', function() {
        const websiteName = document.getElementById('websiteName').value.trim();
        const websiteUrl = document.getElementById('websiteUrl').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();
        const collectData = document.getElementById('collectData').value;
        const useCookies = document.getElementById('useCookies').value;
        const shareData = document.getElementById('shareData').value;

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
                const policy = generatePrivacyPolicy(websiteName, websiteUrl, emailAddress, collectData, useCookies, shareData);
                privacyPolicyContent.textContent = policy;
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
        const text = privacyPolicyContent.textContent;
        navigator.clipboard.writeText(text).then(() => {
            alert('Privacy policy copied to clipboard!');
        }).catch(() => {
            showError('Failed to copy text.');
        });
    });

    // Generate Privacy Policy Content
    function generatePrivacyPolicy(websiteName, websiteUrl, emailAddress, collectData, useCookies, shareData) {
        return `
Privacy Policy for ${websiteName}

Effective Date: ${new Date().toLocaleDateString()}

1. Introduction
Welcome to ${websiteName} ("we," "our," "us"). We are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website ${websiteUrl}.

2. Information We Collect
${collectData === 'yes' ? 'We may collect personal information such as your name, email address, and other details you provide.' : 'We do not collect any personal information.'}

3. Use of Cookies
${useCookies === 'yes' ? 'We use cookies to enhance your experience on our website. You can disable cookies in your browser settings.' : 'We do not use cookies.'}

4. Sharing of Information
${shareData === 'yes' ? 'We may share your information with third-party service providers for specific purposes.' : 'We do not share your information with third parties.'}

5. Contact Us
If you have any questions about this Privacy Policy, please contact us at ${emailAddress}.

6. Changes to This Policy
We may update this Privacy Policy from time to time. Any changes will be posted on this page.
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