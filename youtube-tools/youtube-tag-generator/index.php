<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/youtube-tools/">YouTube Tools</a></li>
            <li class="breadcrumb-item active">Tags Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-tags fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">YouTube Tags Generator</h1>
                        <p class="text-muted">Generate optimized tags for your YouTube videos</p>
                    </div>

                    <form id="tagsForm">
                        <div class="mb-4">
                            <label class="form-label">Video Title</label>
                            <input type="text" class="form-control" id="videoTitle" required 
                                   placeholder="Enter your video title">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Video Description</label>
                            <textarea class="form-control" id="videoDescription" rows="4" 
                                    placeholder="Enter your video description"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select class="form-select" id="videoCategory">
                                <option value="">Select a category</option>
                                <option value="gaming">Gaming</option>
                                <option value="technology">Technology</option>
                                <option value="education">Education</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="music">Music</option>
                                <option value="sports">Sports</option>
                                <option value="howto">How-to & Style</option>
                                <option value="news">News & Politics</option>
                                <option value="science">Science & Technology</option>
                                <option value="travel">Travel & Events</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Additional Keywords (optional)</label>
                            <input type="text" class="form-control" id="additionalKeywords" 
                                   placeholder="Enter keywords separated by commas">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-magic me-2"></i>Generate Tags
                            </button>
                        </div>
                    </form>

                    <!-- Loading Spinner -->
                    <div id="loading" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Generating optimized tags...</p>
                    </div>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h5 mb-0">Generated Tags</h2>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger btn-sm" onclick="copyTags()">
                                    <i class="fas fa-copy me-2"></i>Copy All
                                </button>
                                <button class="btn btn-outline-danger btn-sm" onclick="downloadTags()">
                                    <i class="fas fa-download me-2"></i>Download
                                </button>
                            </div>
                        </div>

                        <!-- Tags Display -->
                        <div class="card bg-light">
                            <div class="card-body">
                                <div id="tagsContainer">
                                    <!-- Tags will be inserted here -->
                                </div>
                                <div class="mt-3 text-muted small">
                                    <span id="tagCount">0</span> tags | <span id="tagCharCount">0</span>/500 characters
                                </div>
                            </div>
                        </div>

                        <!-- Tag Groups -->
                        <div class="mt-4">
                            <h3 class="h6 mb-3">Tag Groups</h3>
                            <div class="row g-3" id="tagGroups">
                                <!-- Tag groups will be inserted here -->
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

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the Tags Generator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter your video title and description</li>
                        <li class="mb-2">Select the most relevant category</li>
                        <li class="mb-2">Add any specific keywords you want to include</li>
                        <li class="mb-2">Click "Generate Tags" to create optimized tags</li>
                        <li>Copy or download the generated tags for your video</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tag Optimization Tips</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Use a mix of broad and specific tags</li>
                        <li class="mb-2">Include variations of important keywords</li>
                        <li class="mb-2">Stay within YouTube's 500-character limit</li>
                        <li>Update tags periodically based on performance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('tagsForm');
    const loading = document.getElementById('loading');
    const results = document.getElementById('results');
    const error = document.getElementById('error');
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const title = document.getElementById('videoTitle').value;
        const description = document.getElementById('videoDescription').value;
        const category = document.getElementById('videoCategory').value;
        const additionalKeywords = document.getElementById('additionalKeywords').value;
        
        if (!title) {
            showError('Please enter a video title');
            return;
        }
        
        // Show loading
        loading.style.display = 'block';
        results.style.display = 'none';
        error.style.display = 'none';
        
        try {
            const response = await fetch('process/generate-tags.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `title=${encodeURIComponent(title)}&description=${encodeURIComponent(description)}&category=${encodeURIComponent(category)}&keywords=${encodeURIComponent(additionalKeywords)}`
            });
            
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(data.message);
            }
            
            // Display tags
            displayTags(data.tags);
            displayTagGroups(data.tagGroups);
            
            loading.style.display = 'none';
            results.style.display = 'block';
            results.scrollIntoView({ behavior: 'smooth' });
            
        } catch (err) {
            loading.style.display = 'none';
            showError(err.message || 'Failed to generate tags. Please try again.');
        }
    });
    
    function displayTags(tags) {
        const container = document.getElementById('tagsContainer');
        const tagCount = document.getElementById('tagCount');
        const tagCharCount = document.getElementById('tagCharCount');
        
        // Create tag elements
        container.innerHTML = tags.map(tag => 
            `<span class="badge bg-success me-2 mb-2">${tag}</span>`
        ).join('');
        
        // Update counts
        tagCount.textContent = tags.length;
        tagCharCount.textContent = tags.join(',').length;
    }
    
    function displayTagGroups(groups) {
        const container = document.getElementById('tagGroups');
        container.innerHTML = '';
        
        Object.entries(groups).forEach(([groupName, tags]) => {
            const col = document.createElement('div');
            col.className = 'col-md-6';
            col.innerHTML = `
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-title">${groupName}</h6>
                        <div>
                            ${tags.map(tag => 
                                `<span class="badge bg-light text-dark me-2 mb-2">${tag}</span>`
                            ).join('')}
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(col);
        });
    }
    
    function showError(message) {
        const error = document.getElementById('error');
        error.querySelector('span').textContent = message;
        error.style.display = 'block';
        results.style.display = 'none';
    }
});

function copyTags() {
    const tags = Array.from(document.getElementById('tagsContainer').querySelectorAll('.badge'))
        .map(badge => badge.textContent)
        .join(',');
    
    navigator.clipboard.writeText(tags).then(() => {
        alert('Tags copied to clipboard!');
    }).catch(() => {
        alert('Failed to copy tags. Please try again.');
    });
}

function downloadTags() {
    const tags = Array.from(document.getElementById('tagsContainer').querySelectorAll('.badge'))
        .map(badge => badge.textContent)
        .join('\n');
    
    const blob = new Blob([tags], { type: 'text/plain' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('hidden', '');
    a.setAttribute('href', url);
    a.setAttribute('download', 'youtube_tags.txt');
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

<style>
.badge {
    font-size: 0.85rem;
    font-weight: normal;
    padding: 0.5rem 0.75rem;
}
</style>

<?php include '../../includes/footer.php'; ?>
