<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/youtube-tools/">YouTube Tools</a></li>
            <li class="breadcrumb-item active">Random Comment Picker</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-comments fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Random Comment Picker</h1>
                        <p class="text-muted">Pick random comments for giveaways and contests</p>
                    </div>

                    <form id="commentForm">
                        <div class="mb-4">
                            <label class="form-label">YouTube Video URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                <input type="url" class="form-control" id="videoUrl" required 
                                       placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Number of Winners</label>
                                <input type="number" class="form-control" id="winnerCount" 
                                       min="1" max="100" value="1">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Filter Comments</label>
                                <input type="text" class="form-control" id="filterKeyword" 
                                       placeholder="Required keyword (optional)">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-random me-2"></i>Pick Random Comments
                            </button>
                        </div>
                    </form>

                    <!-- Loading Spinner -->
                    <div id="loading" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Fetching comments...</p>
                    </div>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h5 mb-0">Winners</h2>
                            <div class="btn-group">
                                <button class="btn btn-outline-danger btn-sm" onclick="exportWinners('txt')">
                                    <i class="fas fa-download me-2"></i>Download List
                                </button>
                                <button class="btn btn-outline-danger btn-sm" onclick="pickAgain()">
                                    <i class="fas fa-redo me-2"></i>Pick Again
                                </button>
                            </div>
                        </div>

                        <div id="winnersList"></div>

                        <!-- Comment Stats -->
                        <div class="alert alert-light mt-3">
                            <div class="d-flex justify-content-between">
                                <span>Total Comments: <span id="totalComments">0</span></span>
                                <span>Eligible Comments: <span id="eligibleComments">0</span></span>
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
                    <h2 class="h5 mb-3">How to Use the Random Comment Picker</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter the URL of your YouTube video</li>
                        <li class="mb-2">Set the number of winners you want to pick</li>
                        <li class="mb-2">Optionally add a keyword filter (e.g., "#contest")</li>
                        <li class="mb-2">Click "Pick Random Comments" to select winners</li>
                        <li>Download the winners list or pick again if needed</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tips for Comment Picking</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Use keyword filters to ensure participants followed rules</li>
                        <li class="mb-2">Pick multiple winners as backup</li>
                        <li class="mb-2">Verify that winners meet your contest criteria</li>
                        <li>Consider time zones when announcing winners</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('commentForm');
    const loading = document.getElementById('loading');
    const results = document.getElementById('results');
    const error = document.getElementById('error');
    let allComments = [];
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const videoUrl = document.getElementById('videoUrl').value;
        const winnerCount = parseInt(document.getElementById('winnerCount').value);
        const filterKeyword = document.getElementById('filterKeyword').value.trim();
        
        const videoId = extractVideoId(videoUrl);
        
        if (!videoId) {
            showError('Invalid YouTube URL. Please enter a valid video URL.');
            return;
        }
        
        if (winnerCount < 1 || winnerCount > 100) {
            showError('Please enter a number between 1 and 100 for winners.');
            return;
        }
        
        // Show loading
        loading.style.display = 'block';
        results.style.display = 'none';
        error.style.display = 'none';
        
        try {
            const response = await fetch('process/fetch-comments.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `videoId=${videoId}`
            });
            
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(data.message);
            }
            
            allComments = data.comments;
            
            // Filter comments if keyword is provided
            let eligibleComments = allComments;
            if (filterKeyword) {
                eligibleComments = allComments.filter(comment => 
                    comment.text.toLowerCase().includes(filterKeyword.toLowerCase())
                );
            }
            
            if (eligibleComments.length === 0) {
                throw new Error('No eligible comments found with the given criteria.');
            }
            
            // Pick random winners
            const winners = pickRandomWinners(eligibleComments, winnerCount);
            displayWinners(winners);
            
            // Update stats
            document.getElementById('totalComments').textContent = allComments.length;
            document.getElementById('eligibleComments').textContent = eligibleComments.length;
            
            loading.style.display = 'none';
            results.style.display = 'block';
            
        } catch (err) {
            loading.style.display = 'none';
            showError(err.message || 'Failed to fetch comments. Please try again.');
        }
    });
    
    function pickRandomWinners(comments, count) {
        const shuffled = [...comments].sort(() => 0.5 - Math.random());
        return shuffled.slice(0, Math.min(count, comments.length));
    }
    
    function displayWinners(winners) {
        const container = document.getElementById('winnersList');
        container.innerHTML = winners.map((winner, index) => `
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="${winner.profileImage}" alt="Profile" 
                             class="rounded-circle me-3" style="width: 48px; height: 48px;">
                        <div>
                            <h3 class="h6 mb-1">
                                Winner #${index + 1}: ${winner.authorName}
                            </h3>
                            <p class="mb-1">${winner.text}</p>
                            <small class="text-muted">
                                Posted ${formatDate(winner.publishedAt)}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }
    
    function extractVideoId(url) {
        const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i;
        const match = url.match(regex);
        return match ? match[1] : null;
    }
    
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }
    
    function showError(message) {
        const error = document.getElementById('error');
        error.querySelector('span').textContent = message;
        error.style.display = 'block';
        results.style.display = 'none';
    }
});

function pickAgain() {
    document.getElementById('commentForm').dispatchEvent(new Event('submit'));
}

function exportWinners(format) {
    const winners = Array.from(document.getElementById('winnersList').querySelectorAll('.card'))
        .map(card => {
            const name = card.querySelector('.h6').textContent;
            const comment = card.querySelector('p').textContent;
            return `${name}\n${comment}\n`;
        }).join('\n');
    
    const blob = new Blob([winners], { type: 'text/plain' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('hidden', '');
    a.setAttribute('href', url);
    a.setAttribute('download', 'youtube_winners.txt');
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

<style>
.winner-card {
    transition: all 0.3s ease;
}
.winner-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
}
</style>

<?php include '../../includes/footer.php'; ?>
