<?php
include '../../includes/header.php'; 
$pageTitle = "Plagiarism Checker - Free SEO Tool";
$pageDescription = "Check your content for plagiarism and duplicate content to ensure originality and SEO compliance.";
$pageKeywords = "plagiarism checker, SEO tool, content originality, duplicate content, search engine optimization";
?>
<title>Plagiarism Checker - Free SEO Tool</title>
<meta name="description" content="Check your content for plagiarism and duplicate content to ensure originality and SEO compliance.">
<meta name="keywords" content="plagiarism checker, SEO tool, content originality, duplicate content, search engine optimization">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Plagiarism Checker",
  "description": "Check your content for plagiarism and duplicate content to ensure originality and SEO compliance.",
  "applicationCategory": "SEO Tool",
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
            <li class="breadcrumb-item"><a href="/tools/seo-tools/">SEO Tools</a></li>
            <li class="breadcrumb-item active">Plagiarism Checker</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-search fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Plagiarism Checker</h1>
                        <p class="text-muted">Check your content for plagiarism and duplicate content</p>
                    </div>

                    <div class="mb-4">
                        <div class="form-group">
                            <label class="form-label">Enter Text to Check</label>
                            <textarea class="form-control" id="contentInput" rows="8" placeholder="Paste your content here (minimum 100 characters)"></textarea>
                            <div class="form-text mt-2">
                                <span id="charCount">0</span> characters | Minimum 100 characters required
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="excludeQuotes" checked>
                            <label class="form-check-label" for="excludeQuotes">
                                Exclude quoted text
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkSources" checked>
                            <label class="form-check-label" for="checkSources">
                                Show source URLs
                            </label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="checkBtn">
                            <i class="fas fa-search me-2"></i>Check for Plagiarism
                        </button>
                    </div>

                    <!-- Loading State -->
                    <div id="loadingState" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Analyzing content...</p>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Plagiarism Check Results</h2>
                        
                        <!-- Overall Score -->
                        <div class="card bg-light mb-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="progress-circle" id="uniquenessScore">
                                            <!-- Score will be inserted here -->
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h3 class="h6 mb-2">Content Uniqueness Score</h3>
                                        <p class="mb-0 text-muted" id="scoreDescription"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detailed Results -->
                        <div id="matchedContent"></div>
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
                    <h2 class="h5 mb-3">About Plagiarism Checker</h2>
                    <p>Our plagiarism checker helps you ensure your content is original and free from duplicate content. It's essential for:</p>
                    <ul class="mb-0">
                        <li>Content writers and bloggers</li>
                        <li>Students and academics</li>
                        <li>SEO professionals</li>
                        <li>Website owners</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.progress-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    color: white;
    position: relative;
}

.progress-circle::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: conic-gradient(var(--circle-color) var(--progress), #e9ecef 0deg);
}

.progress-circle::after {
    content: attr(data-progress) '%';
    position: relative;
    z-index: 1;
}

.matched-text {
    background-color: #ffeeba;
    padding: 2px 4px;
    border-radius: 2px;
}

.source-link {
    font-size: 0.875rem;
    color: #6c757d;
    text-decoration: none;
}

.source-link:hover {
    text-decoration: underline;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contentInput = document.getElementById('contentInput');
    const charCount = document.getElementById('charCount');
    const checkBtn = document.getElementById('checkBtn');
    const loadingState = document.getElementById('loadingState');
    const resultsSection = document.getElementById('resultsSection');
    const matchedContent = document.getElementById('matchedContent');
    const errorMessage = document.getElementById('errorMessage');
    const uniquenessScore = document.getElementById('uniquenessScore');
    const scoreDescription = document.getElementById('scoreDescription');
    const excludeQuotes = document.getElementById('excludeQuotes');
    const checkSources = document.getElementById('checkSources');

    // Update character count
    contentInput.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;
        checkBtn.disabled = count < 100;
    });

    // Check plagiarism
    checkBtn.addEventListener('click', async function() {
        const content = contentInput.value.trim();
        
        if (content.length < 100) {
            showError('Please enter at least 100 characters');
            return;
        }

        try {
            // Show loading state
            loadingState.style.display = 'block';
            resultsSection.style.display = 'none';
            errorMessage.style.display = 'none';
            checkBtn.disabled = true;

            // Simulate API call (replace with actual API call)
            const results = await checkPlagiarism(content);
            
            // Update UI with results
            displayResults(results);

        } catch (error) {
            showError(error.message);
        } finally {
            loadingState.style.display = 'none';
            checkBtn.disabled = false;
        }
    });

    // Simulate plagiarism check (replace with actual API integration)
    async function checkPlagiarism(content) {
        // Simulate API delay
        await new Promise(resolve => setTimeout(resolve, 2000));

        // Simulate results
        const words = content.split(/\s+/);
        const matches = [];
        let totalMatched = 0;

        // Simulate finding matches (replace with actual API results)
        for (let i = 0; i < words.length; i += 5) {
            if (Math.random() > 0.7) {
                const matchLength = Math.floor(Math.random() * 3) + 2;
                const matchedText = words.slice(i, i + matchLength).join(' ');
                if (matchedText) {
                    matches.push({
                        text: matchedText,
                        source: `https://example.com/source${matches.length + 1}`,
                        similarity: Math.floor(Math.random() * 30) + 70
                    });
                    totalMatched += matchedText.length;
                }
            }
        }

        const uniqueness = 100 - (totalMatched / content.length * 100);
        return {
            uniqueness: Math.max(0, Math.min(100, uniqueness)),
            matches
        };
    }

    // Display results
    function displayResults(results) {
        resultsSection.style.display = 'block';

        // Update uniqueness score
        const score = Math.round(results.uniqueness);
        uniquenessScore.style.setProperty('--progress', `${score * 3.6}deg`);
        uniquenessScore.style.setProperty('--circle-color', getScoreColor(score));
        uniquenessScore.setAttribute('data-progress', score);

        // Update score description
        scoreDescription.textContent = getScoreDescription(score);

        // Display matches
        matchedContent.innerHTML = '';
        if (results.matches.length > 0) {
            const matchesHtml = results.matches.map(match => `
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="mb-2"><span class="matched-text">${match.text}</span></p>
                        ${checkSources.checked ? `
                            <div class="d-flex align-items-center">
                                <i class="fas fa-link me-2 text-muted"></i>
                                <a href="${match.source}" class="source-link" target="_blank">${match.source}</a>
                                <span class="ms-2 badge bg-warning">${match.similarity}% similar</span>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `).join('');
            matchedContent.innerHTML = `
                <h3 class="h6 mb-3">Matched Content</h3>
                ${matchesHtml}
            `;
        } else {
            matchedContent.innerHTML = `
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>No matching content found!
                </div>
            `;
        }
    }

    // Helper functions
    function getScoreColor(score) {
        if (score >= 90) return '#28a745';
        if (score >= 70) return '#ffc107';
        return '#dc3545';
    }

    function getScoreDescription(score) {
        if (score >= 90) return 'Excellent! Your content appears to be highly original.';
        if (score >= 70) return 'Good, but there might be some similar content online.';
        return 'Warning: Significant amount of matching content found.';
    }

    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
        loadingState.style.display = 'none';
        resultsSection.style.display = 'none';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>