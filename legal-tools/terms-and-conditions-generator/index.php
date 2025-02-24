<?php
include '../../includes/header.php'; 

$pageTitle = "Terms and Conditions Generator - Free Tool";
$pageDescription = "Generate a custom terms and conditions page for your website quickly and easily.";
$pageKeywords = "terms and conditions generator, terms and conditions template, free terms and conditions, legal agreement";
?>

<title>Terms and Conditions Generator - Free Tool</title>
<meta name="description" content="Generate a custom terms and conditions page for your website quickly and easily.">
<meta name="keywords" content="terms and conditions generator, terms and conditions template, free terms and conditions, legal agreement">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Terms and Conditions Generator",
  "description": "Generate a custom terms and conditions page for your website quickly and easily.",
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
            <li class="breadcrumb-item active">Terms and Conditions Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-file-contract fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Terms and Conditions Generator</h1>
                        <p class="text-muted">Create a custom terms and conditions page for your website</p>
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
                            <label class="form-label">Do you sell products or services?</label>
                            <select class="form-select" id="sellProducts">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you allow user-generated content?</label>
                            <select class="form-select" id="userContent">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you have a refund policy?</label>
                            <select class="form-select" id="refundPolicy">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Generate Button -->
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="generateBtn">
                            <i class="fas fa-file-alt me-2"></i>Generate Terms and Conditions
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Generating terms and conditions...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Your Terms and Conditions</h2>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre id="termsContent" class="mb-0"></pre>
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
                    <h2 class="h5 mb-3">About Terms and Conditions Generator</h2>
                    <p>A terms and conditions page is essential for any website to outline the rules and guidelines for users. This tool helps you:</p>
                    <ul class="mb-0">
                        <li>Create a custom terms and conditions page tailored to your website</li>
                        <li>Ensure legal compliance and protect your business</li>
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
    const termsContent = document.getElementById('termsContent');
    const copyBtn = document.getElementById('copyBtn');

    // Generate Terms and Conditions
    generateBtn.addEventListener('click', function() {
        const websiteName = document.getElementById('websiteName').value.trim();
        const websiteUrl = document.getElementById('websiteUrl').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();
        const sellProducts = document.getElementById('sellProducts').value;
        const userContent = document.getElementById('userContent').value;
        const refundPolicy = document.getElementById('refundPolicy').value;

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
                const terms = generateTermsAndConditions(websiteName, websiteUrl, emailAddress, sellProducts, userContent, refundPolicy);
                termsContent.textContent = terms;
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
        const text = termsContent.textContent;
        navigator.clipboard.writeText(text).then(() => {
            alert('Terms and conditions copied to clipboard!');
        }).catch(() => {
            showError('Failed to copy text.');
        });
    });

    // Generate Terms and Conditions Content
    function generateTermsAndConditions(websiteName, websiteUrl, emailAddress, sellProducts, userContent, refundPolicy) {
        return `
Terms and Conditions for ${websiteName}

Effective Date: ${new Date().toLocaleDateString()}

1. Introduction
Welcome to ${websiteName} ("we," "our," "us"). By accessing or using our website ${websiteUrl}, you agree to comply with and be bound by the following terms and conditions.

2. Use of the Website
You agree to use this website only for lawful purposes and in a way that does not infringe the rights of others.

3. ${sellProducts === 'yes' ? 'Products and Services' : 'Content'}
${sellProducts === 'yes' ? 'We offer products and services for purchase. All transactions are subject to our refund and return policies.' : 'This website provides informational content only.'}

4. ${userContent === 'yes' ? 'User-Generated Content' : 'Prohibited Activities'}
${userContent === 'yes' ? 'Users may submit content, provided it complies with our guidelines. We reserve the right to remove any inappropriate content.' : 'You are prohibited from uploading or sharing unauthorized content on this website.'}

5. ${refundPolicy === 'yes' ? 'Refund Policy' : 'No Refunds'}
${refundPolicy === 'yes' ? 'We offer a refund policy for eligible purchases. Please contact us for details.' : 'All sales are final, and no refunds will be issued.'}

6. Contact Us
If you have any questions about these terms, please contact us at ${emailAddress}.

7. Changes to These Terms
We may update these terms and conditions from time to time. Any changes will be posted on this page.
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