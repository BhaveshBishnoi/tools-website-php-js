<?php
include '../../includes/header.php'; 

$pageTitle = "Cookie Policy Generator - Free Tool";
$pageDescription = "Generate a custom cookie policy for your website quickly and easily.";
$pageKeywords = "cookie policy generator, cookie policy template, free cookie policy, GDPR compliance";
?>

<title>Cookie Policy Generator - Free Tool</title>
<meta name="description" content="Generate a custom cookie policy for your website quickly and easily.">
<meta name="keywords" content="cookie policy generator, cookie policy template, free cookie policy, GDPR compliance">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Cookie Policy Generator",
  "description": "Generate a custom cookie policy for your website quickly and easily.",
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
            <li class="breadcrumb-item active">Cookie Policy Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-cookie fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Cookie Policy Generator</h1>
                        <p class="text-muted">Create a custom cookie policy for your website</p>
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
                            <label class="form-label">Do you use cookies?</label>
                            <select class="form-select" id="useCookies">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you use third-party cookies?</label>
                            <select class="form-select" id="thirdPartyCookies">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you allow users to manage cookies?</label>
                            <select class="form-select" id="manageCookies">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Generate Button -->
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="generateBtn">
                            <i class="fas fa-file-alt me-2"></i>Generate Cookie Policy
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Generating cookie policy...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Your Cookie Policy</h2>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre id="cookiePolicyContent" class="mb-0"></pre>
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
                    <h2 class="h5 mb-3">About Cookie Policy Generator</h2>
                    <p>A cookie policy is essential for any website that uses cookies. This tool helps you:</p>
                    <ul class="mb-0">
                        <li>Create a custom cookie policy tailored to your website</li>
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
    const cookiePolicyContent = document.getElementById('cookiePolicyContent');
    const copyBtn = document.getElementById('copyBtn');

    // Generate Cookie Policy
    generateBtn.addEventListener('click', function() {
        const websiteName = document.getElementById('websiteName').value.trim();
        const websiteUrl = document.getElementById('websiteUrl').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();
        const useCookies = document.getElementById('useCookies').value;
        const thirdPartyCookies = document.getElementById('thirdPartyCookies').value;
        const manageCookies = document.getElementById('manageCookies').value;

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
                const policy = generateCookiePolicy(websiteName, websiteUrl, emailAddress, useCookies, thirdPartyCookies, manageCookies);
                cookiePolicyContent.textContent = policy;
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
        const text = cookiePolicyContent.textContent;
        navigator.clipboard.writeText(text).then(() => {
            alert('Cookie policy copied to clipboard!');
        }).catch(() => {
            showError('Failed to copy text.');
        });
    });

    // Generate Cookie Policy Content
    function generateCookiePolicy(websiteName, websiteUrl, emailAddress, useCookies, thirdPartyCookies, manageCookies) {
        return `
Cookie Policy for ${websiteName}

Effective Date: ${new Date().toLocaleDateString()}

1. Introduction
Welcome to ${websiteName} ("we," "our," "us"). This Cookie Policy explains how we use cookies and similar technologies on our website ${websiteUrl}.

2. What Are Cookies?
Cookies are small text files stored on your device when you visit a website. They help improve your browsing experience and provide us with insights into website usage.

3. Types of Cookies We Use
${useCookies === 'yes' ? 'We use the following types of cookies:' : 'We do not use cookies on our website.'}
${useCookies === 'yes' ? `
- Essential Cookies: Necessary for the website to function.
- Analytics Cookies: Help us understand how visitors interact with our website.
${thirdPartyCookies === 'yes' ? '- Third-Party Cookies: Used by third-party services integrated into our website.' : ''}
` : ''}

4. Managing Cookies
${manageCookies === 'yes' ? 'You can manage or disable cookies through your browser settings. Please note that disabling cookies may affect your experience on our website.' : 'We do not provide an option to manage cookies on our website.'}

5. Contact Us
If you have any questions about this Cookie Policy, please contact us at ${emailAddress}.

6. Changes to This Policy
We may update this Cookie Policy from time to time. Any changes will be posted on this page.
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