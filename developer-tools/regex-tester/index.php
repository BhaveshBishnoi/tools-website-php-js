<?php 
$pageTitle = "Regex Tester - Free Developer Tool";
$pageDescription = "Test and validate regular expressions online for free.";
$pageKeywords = "regex tester, regular expression validator, developer tool, online regex tool, regex validation";
include '../../includes/header.php';
?>

<title>Regex Tester - Free Developer Tool</title>
<meta name="description" content="Test and validate regular expressions online for free.">
<meta name="keywords" content="regex tester, regular expression validator, developer tool, online regex tool, regex validation">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Regex Tester",
  "description": "Test and validate regular expressions online for free.",
  "applicationCategory": "Developer Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Regex Tester</li>
        </ol>
    </nav>
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-asterisk fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Regex Tester</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Test and validate your regular expressions with real-time matching.
        </p>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="regex-pattern" class="form-label">Regular Expression:</label>
                                <div class="input-group">
                                    <span class="input-group-text">/</span>
                                    <input type="text" class="form-control" id="regex-pattern" placeholder="Enter regex pattern">
                                    <span class="input-group-text">/</span>
                                    <input type="text" class="form-control" id="regex-flags" placeholder="flags" style="max-width: 80px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="test-string" class="form-label">Test String:</label>
                                <textarea class="form-control" id="test-string" rows="8" placeholder="Enter text to test against the regular expression"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Results:</label>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <strong>Matches:</strong> <span id="match-count">0</span>
                                        </div>
                                        <div id="matches-list" class="mb-3">
                                            <!-- Matches will be displayed here -->
                                        </div>
                                        <div id="error-message" class="text-danger"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quick Reference:</label>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <small><code>.</code> - Any character</small>
                                            </div>
                                            <div class="col-6">
                                                <small><code>*</code> - 0 or more</small>
                                            </div>
                                            <div class="col-6">
                                                <small><code>+</code> - 1 or more</small>
                                            </div>
                                            <div class="col-6">
                                                <small><code>?</code> - 0 or 1</small>
                                            </div>
                                            <div class="col-6">
                                                <small><code>\w</code> - Word character</small>
                                            </div>
                                            <div class="col-6">
                                                <small><code>\d</code> - Digit</small>
                                            </div>
                                            <div class="col-6">
                                                <small><code>\s</code> - Whitespace</small>
                                            </div>
                                            <div class="col-6">
                                                <small><code>[abc]</code> - Character set</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>

<style>
.match-item {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    padding: 8px;
    margin-bottom: 8px;
}
.match-index {
    color: #6c757d;
    font-size: 0.875rem;
}
.match-value {
    font-family: monospace;
    word-break: break-all;
}
</style>

<?php include '../../includes/footer.php'; ?>
