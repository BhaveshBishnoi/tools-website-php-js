<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/tools/seo-tools/">SEO Tools</a></li>
            <li class="breadcrumb-item active">Long-Tail Keyword Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-keyboard fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Long-Tail Keyword Generator</h1>
                        <p class="text-muted">Generate long-tail keywords to enhance your SEO strategy.</p>
                    </div>

                    <form id="keywordGeneratorForm">
                        <div class="mb-4">
                            <label class="form-label">Enter Seed Keyword</label>
                            <input type="text" class="form-control" id="seedKeyword" placeholder="e.g., best SEO tools" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-search me-2"></i> Generate Keywords
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Generated Long-Tail Keywords</h2>
                        <ul class="list-group" id="keywordList"></ul>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use This Tool</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter a seed keyword related to your topic.</li>
                        <li class="mb-2">Click "Generate Keywords" to get a list of long-tail keyword suggestions.</li>
                        <li class="mb-2">Use these keywords for content optimization, SEO, and PPC campaigns.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('keywordGeneratorForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const seedKeyword = document.getElementById('seedKeyword').value;
    const results = document.getElementById('results');
    const keywordList = document.getElementById('keywordList');
    keywordList.innerHTML = '';

    if (seedKeyword.trim() === '') {
        alert('Please enter a seed keyword.');
        return;
    }

    const suggestions = [
        `${seedKeyword} for beginners`,
        `${seedKeyword} step-by-step guide`,
        `${seedKeyword} best practices`,
        `how to use ${seedKeyword} effectively`,
        `${seedKeyword} tips and tricks`,
        `${seedKeyword} 2025 trends`,
        `${seedKeyword} vs competitors`,
        `${seedKeyword} free tools`,
        `why use ${seedKeyword}?`,
        `common mistakes with ${seedKeyword}`
    ];

    suggestions.forEach(keyword => {
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.textContent = keyword;
        keywordList.appendChild(li);
    });

    results.style.display = 'block';
});
</script>

<?php include '../../includes/footer.php'; ?>
