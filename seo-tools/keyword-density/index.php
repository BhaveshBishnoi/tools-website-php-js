<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/seo-tools/">SEO Tools</a></li>
            <li class="breadcrumb-item active">Keyword Density Analyzer</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-percentage fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Keyword Density Analyzer</h1>
                        <p class="text-muted">Analyze your content's keyword distribution and density</p>
                    </div>

                    <div class="mb-4">
                        <div class="form-group">
                            <label class="form-label">Enter Your Content</label>
                            <textarea class="form-control" id="contentInput" rows="8" placeholder="Paste your content here (minimum 100 characters)"></textarea>
                            <div class="form-text mt-2">
                                <span id="charCount">0</span> characters | <span id="wordCount">0</span> words
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ignoreCaseCheck" checked>
                            <label class="form-check-label" for="ignoreCaseCheck">
                                Ignore case (treat "Word" and "word" as same)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ignoreStopWords" checked>
                            <label class="form-check-label" for="ignoreStopWords">
                                Ignore common stop words
                            </label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" id="analyzeBtn" disabled>
                            <i class="fas fa-chart-pie me-2"></i>Analyze Keywords
                        </button>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Keyword Analysis Results</h2>
                        
                        <!-- Word Stats -->
                        <div class="card bg-light mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 text-center mb-3 mb-sm-0">
                                        <h6 class="text-muted mb-1">Total Words</h6>
                                        <span class="h4" id="totalWords">0</span>
                                    </div>
                                    <div class="col-sm-4 text-center mb-3 mb-sm-0">
                                        <h6 class="text-muted mb-1">Unique Words</h6>
                                        <span class="h4" id="uniqueWords">0</span>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h6 class="text-muted mb-1">Keyword Ratio</h6>
                                        <span class="h4" id="keywordRatio">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Keyword Table -->
                        <div class="table-responsive">
                            <table class="table table-hover" id="keywordTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Keyword</th>
                                        <th>Count</th>
                                        <th>Density</th>
                                        <th>Distribution</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <!-- Distribution Chart -->
                        <div class="mt-4">
                            <h3 class="h6 mb-3">Top Keywords Distribution</h3>
                            <canvas id="keywordChart"></canvas>
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
                    <h2 class="h5 mb-3">About Keyword Density</h2>
                    <p>Keyword density is the percentage of times a keyword appears in your content compared to the total word count. A good keyword density is typically between 1-3%. Consider:</p>
                    <ul class="mb-0">
                        <li>Using your main keyword naturally throughout the content</li>
                        <li>Including relevant variations and LSI keywords</li>
                        <li>Avoiding keyword stuffing (overusing keywords)</li>
                        <li>Maintaining readability and natural flow</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contentInput = document.getElementById('contentInput');
    const charCount = document.getElementById('charCount');
    const wordCount = document.getElementById('wordCount');
    const analyzeBtn = document.getElementById('analyzeBtn');
    const resultsSection = document.getElementById('resultsSection');
    const errorMessage = document.getElementById('errorMessage');
    const ignoreCaseCheck = document.getElementById('ignoreCaseCheck');
    const ignoreStopWords = document.getElementById('ignoreStopWords');
    let keywordChart = null;

    // Common stop words
    const stopWords = new Set([
        'a', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'for', 'from', 'has', 'he',
        'in', 'is', 'it', 'its', 'of', 'on', 'that', 'the', 'to', 'was', 'were',
        'will', 'with', 'the', 'this', 'but', 'they', 'have', 'had', 'what', 'when',
        'where', 'who', 'which', 'why', 'how'
    ]);

    // Update counts
    contentInput.addEventListener('input', function() {
        const text = this.value;
        const chars = text.length;
        const words = text.trim() ? text.trim().split(/\s+/).length : 0;
        
        charCount.textContent = chars;
        wordCount.textContent = words;
        analyzeBtn.disabled = chars < 100;
    });

    // Analyze keywords
    analyzeBtn.addEventListener('click', function() {
        const content = contentInput.value.trim();
        
        if (content.length < 100) {
            showError('Please enter at least 100 characters');
            return;
        }

        try {
            const results = analyzeKeywords(content);
            displayResults(results);
            errorMessage.style.display = 'none';
            resultsSection.style.display = 'block';
        } catch (error) {
            showError(error.message);
        }
    });

    function analyzeKeywords(content) {
        // Split content into words
        let words = content.split(/[\s,.!?;:()"']+/).filter(word => word.length > 0);
        const totalWordCount = words.length;

        // Process words based on settings
        if (ignoreCaseCheck.checked) {
            words = words.map(word => word.toLowerCase());
        }

        if (ignoreStopWords.checked) {
            words = words.filter(word => !stopWords.has(word.toLowerCase()));
        }

        // Count word frequencies
        const wordFreq = {};
        words.forEach(word => {
            wordFreq[word] = (wordFreq[word] || 0) + 1;
        });

        // Sort by frequency
        const sortedWords = Object.entries(wordFreq)
            .sort(([,a], [,b]) => b - a)
            .slice(0, 20); // Top 20 keywords

        return {
            totalWords: totalWordCount,
            uniqueWords: Object.keys(wordFreq).length,
            keywordRatio: (Object.keys(wordFreq).length / totalWordCount * 100).toFixed(1),
            keywords: sortedWords.map(([word, count]) => ({
                word,
                count,
                density: (count / totalWordCount * 100).toFixed(2)
            }))
        };
    }

    function displayResults(results) {
        // Update stats
        document.getElementById('totalWords').textContent = results.totalWords;
        document.getElementById('uniqueWords').textContent = results.uniqueWords;
        document.getElementById('keywordRatio').textContent = results.keywordRatio + '%';

        // Update table
        const tbody = document.querySelector('#keywordTable tbody');
        tbody.innerHTML = results.keywords.map(kw => `
            <tr>
                <td>${kw.word}</td>
                <td>${kw.count}</td>
                <td>${kw.density}%</td>
                <td>
                    <div class="progress" style="height: 15px;">
                        <div class="progress-bar bg-danger" role="progressbar" 
                             style="width: ${kw.density}%;" 
                             aria-valuenow="${kw.density}" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                        </div>
                    </div>
                </td>
            </tr>
        `).join('');

        // Update chart
        updateChart(results.keywords.slice(0, 10));
    }

    function updateChart(keywords) {
        if (keywordChart) {
            keywordChart.destroy();
        }

        const ctx = document.getElementById('keywordChart').getContext('2d');
        keywordChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: keywords.map(kw => kw.word),
                datasets: [{
                    label: 'Keyword Frequency',
                    data: keywords.map(kw => kw.count),
                    backgroundColor: 'rgba(220, 53, 69, 0.8)',
                    borderColor: 'rgba(220, 53, 69, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
        resultsSection.style.display = 'none';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
