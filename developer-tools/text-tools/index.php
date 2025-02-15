<?php include '../../includes/header.php'; ?>
<title>Text Tools - Convert Case, Count Characters, and Format Text</title>
<meta name="description" content="Use our free text tools to convert case, count characters, and format text online. No registration required!">
<meta name="keywords" content="text tools, convert case, count characters, format text, online text tool">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Text Tools",
  "description": "Use our free text tools to convert case, count characters, and format text online.",
  "applicationCategory": "Text Tool",
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
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Text Tools</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-font fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Text Tools</h1>
                        <p class="text-muted">Convert case, count characters, and format text</p>
                    </div>

                    <div class="row g-4">
                        <!-- Input Section -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h2 class="h5 mb-3">Input Text</h2>
                                    <textarea id="inputText" class="form-control" rows="10" placeholder="Enter or paste your text here..."></textarea>
                                    
                                    <div class="mt-3">
                                        <div class="row g-2">
                                            <div class="col">
                                                <select id="caseOperation" class="form-select">
                                                    <option value="upper">UPPERCASE</option>
                                                    <option value="lower">lowercase</option>
                                                    <option value="title">Title Case</option>
                                                    <option value="sentence">Sentence case</option>
                                                    <option value="alternate">aLtErNaTe CaSe</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <button id="convertCase" class="btn btn-danger">
                                                    <i class="fas fa-sync-alt me-2"></i>Convert
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <div class="row g-2">
                                            <div class="col">
                                                <select id="formatOperation" class="form-select">
                                                    <option value="trim">Remove Extra Spaces</option>
                                                    <option value="lines">Remove Empty Lines</option>
                                                    <option value="spaces">Single Line Spacing</option>
                                                    <option value="paragraphs">Format Paragraphs</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <button id="formatText" class="btn btn-danger">
                                                    <i class="fas fa-align-left me-2"></i>Format
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Section -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h2 class="h5 mb-3">Text Statistics</h2>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fas fa-text-width text-danger me-2"></i>Characters</td>
                                                    <td class="text-end" id="charCount">0</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-text-width text-danger me-2"></i>Characters (no spaces)</td>
                                                    <td class="text-end" id="charNoSpaceCount">0</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-font text-danger me-2"></i>Words</td>
                                                    <td class="text-end" id="wordCount">0</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-paragraph text-danger me-2"></i>Paragraphs</td>
                                                    <td class="text-end" id="paragraphCount">0</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-align-left text-danger me-2"></i>Lines</td>
                                                    <td class="text-end" id="lineCount">0</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-clock text-danger me-2"></i>Reading Time</td>
                                                    <td class="text-end" id="readingTime">0 min</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-4">
                                        <h3 class="h6 mb-3">Actions</h3>
                                        <div class="d-grid gap-2">
                                            <button id="copyText" class="btn btn-outline-danger">
                                                <i class="fas fa-copy me-2"></i>Copy to Clipboard
                                            </button>
                                            <button id="clearText" class="btn btn-outline-danger">
                                                <i class="fas fa-trash-alt me-2"></i>Clear Text
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="row mt-4 g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">Text Case Options</h2>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>UPPERCASE - Convert text to all capitals</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>lowercase - Convert text to all small letters</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Title Case - Capitalize First Letter Of Each Word</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Sentence case - First letter of each sentence</li>
                                <li><i class="fas fa-check-circle text-danger me-2"></i>aLtErNaTe CaSe - Alternate between upper and lower</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">Formatting Options</h2>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Remove extra spaces between words</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Remove empty lines from text</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Convert multiple spaces to single space</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Format paragraphs with proper spacing</li>
                                <li><i class="fas fa-check-circle text-danger me-2"></i>Real-time text statistics</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputText = document.getElementById('inputText');
    const convertCase = document.getElementById('convertCase');
    const formatText = document.getElementById('formatText');
    const copyText = document.getElementById('copyText');
    const clearText = document.getElementById('clearText');

    // Update statistics in real-time
    inputText.addEventListener('input', updateStatistics);

    // Case conversion
    convertCase.addEventListener('click', function() {
        const operation = document.getElementById('caseOperation').value;
        const text = inputText.value;
        
        switch(operation) {
            case 'upper':
                inputText.value = text.toUpperCase();
                break;
            case 'lower':
                inputText.value = text.toLowerCase();
                break;
            case 'title':
                inputText.value = text.toLowerCase().replace(/(?:^|\s)\w/g, letter => letter.toUpperCase());
                break;
            case 'sentence':
                inputText.value = text.toLowerCase().replace(/(^\w|\.\s+\w)/g, letter => letter.toUpperCase());
                break;
            case 'alternate':
                inputText.value = text.split('').map((char, i) => 
                    i % 2 === 0 ? char.toLowerCase() : char.toUpperCase()
                ).join('');
                break;
        }
        
        updateStatistics();
    });

    // Text formatting
    formatText.addEventListener('click', function() {
        const operation = document.getElementById('formatOperation').value;
        let text = inputText.value;
        
        switch(operation) {
            case 'trim':
                text = text.replace(/\s+/g, ' ').trim();
                break;
            case 'lines':
                text = text.replace(/^\s*[\r\n]/gm, '');
                break;
            case 'spaces':
                text = text.replace(/\n\s*\n/g, '\n');
                break;
            case 'paragraphs':
                text = text.replace(/[\r\n]{2,}/g, '\n\n').trim();
                break;
        }
        
        inputText.value = text;
        updateStatistics();
    });

    // Copy to clipboard
    copyText.addEventListener('click', function() {
        inputText.select();
        document.execCommand('copy');
        
        // Visual feedback
        copyText.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
        setTimeout(() => {
            copyText.innerHTML = '<i class="fas fa-copy me-2"></i>Copy to Clipboard';
        }, 2000);
    });

    // Clear text
    clearText.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear the text?')) {
            inputText.value = '';
            updateStatistics();
        }
    });

    // Update statistics
    function updateStatistics() {
        const text = inputText.value;
        
        // Character counts
        document.getElementById('charCount').textContent = text.length;
        document.getElementById('charNoSpaceCount').textContent = text.replace(/\s/g, '').length;
        
        // Word count
        document.getElementById('wordCount').textContent = text.trim() ? text.trim().split(/\s+/).length : 0;
        
        // Paragraph count
        document.getElementById('paragraphCount').textContent = text.trim() ? text.trim().split(/\n\s*\n/).length : 0;
        
        // Line count
        document.getElementById('lineCount').textContent = text.trim() ? text.trim().split(/\n/).length : 0;
        
        // Reading time (assuming 200 words per minute)
        const words = text.trim() ? text.trim().split(/\s+/).length : 0;
        const minutes = Math.ceil(words / 200);
        document.getElementById('readingTime').textContent = `${minutes} min`;
    }

    // Initialize statistics
    updateStatistics();
});
</script>

<?php include '../../includes/footer.php'; ?>
