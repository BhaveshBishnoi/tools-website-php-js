<?php include '../../includes/header.php'; ?>

<title>Timestamp Generator - Create Video Chapters</title>
<meta name="description" content="Create video chapters and timestamps easily with our Timestamp Generator. Free and easy-to-use.">
<meta name="keywords" content="timestamp generator, YouTube timestamps, video chapters, video timestamps">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Timestamp Generator",
  "description": "Create video chapters and timestamps easily.",
  "applicationCategory": "YouTube Tool",
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
            <li class="breadcrumb-item"><a href="/tools/youtube-tools/">YouTube Tools</a></li>
            <li class="breadcrumb-item active">Timestamp Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-clock fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">YouTube Timestamp Generator</h1>
                        <p class="text-muted">Create video chapters and timestamps for your YouTube videos</p>
                    </div>

                    <form id="timestampForm">
                        <div class="mb-4">
                            <label class="form-label">YouTube Video URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                <input type="url" class="form-control" id="videoUrl" required 
                                       placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                        </div>

                        <div id="timestampEntries">
                            <div class="timestamp-entry mb-3">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control time-input" placeholder="00" min="0" max="59" data-type="minutes">
                                            <span class="input-group-text">:</span>
                                            <input type="number" class="form-control time-input" placeholder="00" min="0" max="59" data-type="seconds">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Chapter title" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-danger remove-timestamp" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <button type="button" class="btn btn-outline-danger" id="addTimestamp">
                                <i class="fas fa-plus me-2"></i>Add Timestamp
                            </button>
                            <button type="button" class="btn btn-outline-danger" id="autoDetect">
                                <i class="fas fa-magic me-2"></i>Auto-Detect Chapters
                            </button>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-clock me-2"></i>Generate Timestamps
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h5 mb-0">Generated Timestamps</h2>
                            <button class="btn btn-outline-danger btn-sm" onclick="copyTimestamps()">
                                <i class="fas fa-copy me-2"></i>Copy to Clipboard
                            </button>
                        </div>
                        
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre class="mb-0"><code id="timestampOutput"></code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="error" class="alert alert-danger mt-4" style="display: none;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tips for Creating Timestamps</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Use descriptive chapter titles that accurately reflect the content</li>
                        <li class="mb-2">Keep titles concise but informative</li>
                        <li class="mb-2">Space chapters evenly throughout the video</li>
                        <li>First timestamp must start at 00:00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.time-input {
    text-align: center;
    padding-right: 0.25rem;
    padding-left: 0.25rem;
}
pre {
    max-height: 300px;
    overflow-y: auto;
    white-space: pre-wrap;
}
.timestamp-entry:hover .remove-timestamp {
    display: block !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('timestampForm');
    const timestampEntries = document.getElementById('timestampEntries');
    const addButton = document.getElementById('addTimestamp');
    const autoDetectButton = document.getElementById('autoDetect');
    const results = document.getElementById('results');
    const error = document.getElementById('error');

    // Add new timestamp entry
    addButton.addEventListener('click', function() {
        const entry = document.querySelector('.timestamp-entry').cloneNode(true);
        entry.querySelector('.remove-timestamp').style.display = '';
        resetInputs(entry);
        timestampEntries.appendChild(entry);
        setupRemoveButton(entry.querySelector('.remove-timestamp'));
    });

    // Remove timestamp entry
    function setupRemoveButton(button) {
        button.addEventListener('click', function() {
            if (timestampEntries.children.length > 1) {
                button.closest('.timestamp-entry').remove();
            }
        });
    }

    // Reset inputs in cloned entry
    function resetInputs(entry) {
        entry.querySelectorAll('input').forEach(input => {
            input.value = '';
        });
    }

    // Auto-detect chapters
    autoDetectButton.addEventListener('click', async function() {
        const videoUrl = document.getElementById('videoUrl').value;
        if (!videoUrl) {
            showError('Please enter a video URL first');
            return;
        }

        // Simulate auto-detection (in real implementation, this would analyze the video description)
        const demoChapters = [
            { time: '0:00', title: 'Introduction' },
            { time: '2:30', title: 'Main Topic' },
            { time: '5:45', title: 'Key Points' },
            { time: '8:15', title: 'Summary' }
        ];

        // Clear existing entries except the first one
        while (timestampEntries.children.length > 1) {
            timestampEntries.lastChild.remove();
        }

        // Add detected chapters
        demoChapters.forEach((chapter, index) => {
            if (index === 0) {
                fillEntry(timestampEntries.firstChild, chapter);
            } else {
                const entry = document.querySelector('.timestamp-entry').cloneNode(true);
                fillEntry(entry, chapter);
                entry.querySelector('.remove-timestamp').style.display = '';
                timestampEntries.appendChild(entry);
                setupRemoveButton(entry.querySelector('.remove-timestamp'));
            }
        });
    });

    function fillEntry(entry, chapter) {
        const [minutes, seconds] = chapter.time.split(':');
        entry.querySelector('[data-type="minutes"]').value = minutes;
        entry.querySelector('[data-type="seconds"]').value = seconds;
        entry.querySelector('input[type="text"]').value = chapter.title;
    }

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const entries = document.querySelectorAll('.timestamp-entry');
        let timestamps = [];
        
        entries.forEach(entry => {
            const minutes = entry.querySelector('[data-type="minutes"]').value.padStart(2, '0');
            const seconds = entry.querySelector('[data-type="seconds"]').value.padStart(2, '0');
            const title = entry.querySelector('input[type="text"]').value;
            
            timestamps.push(`${minutes}:${seconds} ${title}`);
        });

        const output = timestamps.join('\n');
        document.getElementById('timestampOutput').textContent = output;
        results.style.display = 'block';
        error.style.display = 'none';
    });

    // Input validation for time fields
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('time-input')) {
            const max = parseInt(e.target.getAttribute('max'));
            let value = parseInt(e.target.value) || 0;
            if (value > max) value = max;
            if (value < 0) value = 0;
            e.target.value = value;
        }
    });
});

function copyTimestamps() {
    const output = document.getElementById('timestampOutput').textContent;
    navigator.clipboard.writeText(output).then(() => {
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
        setTimeout(() => {
            btn.innerHTML = originalText;
        }, 2000);
    });
}

function showError(message) {
    const error = document.getElementById('error');
    error.style.display = 'block';
    error.querySelector('span').textContent = message;
}
</script>

<?php include '../../includes/footer.php'; ?>
