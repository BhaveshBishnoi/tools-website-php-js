<?php
include '../../includes/header.php'; 

$pageTitle = "Refund Policy Generator - Free Tool";
$pageDescription = "Generate a custom refund policy for your website quickly and easily.";
$pageKeywords = "refund policy generator, refund policy template, free refund policy, legal agreement";
?>

<title>Refund Policy Generator - Free Tool</title>
<meta name="description" content="Generate a custom refund policy for your website quickly and easily.">
<meta name="keywords" content="refund policy generator, refund policy template, free refund policy, legal agreement">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Refund Policy Generator",
  "description": "Generate a custom refund policy for your website quickly and easily.",
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
            <li class="breadcrumb-item active">Refund Policy Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-undo fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Refund Policy Generator</h1>
                        <p class="text-muted">Create a custom refund policy for your website</p>
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
                            <label class="form-label">Do you offer refunds?</label>
                            <select class="form-select" id="offerRefunds">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Refund Timeframe (in days)</label>
                            <input type="number" class="form-control" id="refundTimeframe" placeholder="e.g., 30" required>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Do you offer partial refunds?</label>
                            <select class="form-select" id="partialRefunds">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Generate Button -->
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="generateBtn">
                            <i class="fas fa-file-alt me-2"></i>Generate Refund Policy
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Generating refund policy...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Your Refund Policy</h2>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre id="refundPolicyContent" class="mb-0"></pre>
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
                    <h2 class="h5 mb-3">About Refund Policy Generator</h2>
                    <p>A refund policy is essential for any business that sells products or services. This tool helps you:</p>
                    <ul class="mb-0">
                        <li>Create a custom refund policy tailored to your business</li>
                        <li>Ensure transparency and customer satisfaction</li>
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
    const refundPolicyContent = document.getElementById('refundPolicyContent');
    const copyBtn = document.getElementById('copyBtn');

    // Generate Refund Policy
    generateBtn.addEventListener('click', function() {
        const websiteName = document.getElementById('websiteName').value.trim();
        const websiteUrl = document.getElementById('websiteUrl').value.trim();
        const emailAddress = document.getElementById('emailAddress').value.trim();
        const offerRefunds = document.getElementById('offerRefunds').value;
        const refundTimeframe = document.getElementById('refundTimeframe').value.trim();
        const partialRefunds = document.getElementById('partialRefunds').value;

        if (!websiteName || !websiteUrl || !emailAddress || !refundTimeframe) {
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
                const policy = generateRefundPolicy(websiteName, websiteUrl, emailAddress, offerRefunds, refundTimeframe, partialRefunds);
                refundPolicyContent.textContent = policy;
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
        const text = refundPolicyContent.textContent;
        navigator.clipboard.writeText(text).then(() => {
            alert('Refund policy copied to clipboard!');
        }).catch(() => {
            showError('Failed to copy text.');
        });
    });

    // Generate Refund Policy Content
    function generateRefundPolicy(websiteName, websiteUrl, emailAddress, offerRefunds, refundTimeframe, partialRefunds) {
        return `
Refund Policy for ${websiteName}

Effective Date: ${new Date().toLocaleDateString()}

1. Introduction
Welcome to ${websiteName} ("we," "our," "us"). This Refund Policy outlines our guidelines for refunds on purchases made through our website ${websiteUrl}.

2. Refund Eligibility
${offerRefunds === 'yes' ? `We offer refunds within ${refundTimeframe} days of purchase. To be eligible for a refund, your item must be unused and in its original condition.` : 'We do not offer refunds for any purchases.'}

3. ${partialRefunds === 'yes' ? 'Partial Refunds' : 'Full Refunds'}
${partialRefunds === 'yes' ? 'In some cases, partial refunds may be granted at our discretion.' : 'All refunds, if applicable, will be issued in full.'}

4. Contact Us
If you have any questions about this Refund Policy, please contact us at ${emailAddress}.

5. Changes to This Policy
We may update this Refund Policy from time to time. Any changes will be posted on this page.
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