<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/youtube-tools/">YouTube Tools</a></li>
            <li class="breadcrumb-item active">Thumbnail Downloader</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-image fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">YouTube Thumbnail Downloader</h1>
                        <p class="text-muted">Download high-quality thumbnails from YouTube videos</p>
                    </div>

                    <form id="thumbnailForm">
                        <div class="mb-4">
                            <label class="form-label">YouTube Video URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                <input type="url" class="form-control" id="videoUrl" required 
                                       placeholder="https://www.youtube.com/watch?v=...">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-search me-2"></i>Get Thumbnails
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Loading Spinner -->
                    <div id="loading" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Fetching thumbnails...</p>
                    </div>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Available Thumbnails</h2>
                        
                        <!-- Maxres Quality -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="h6 mb-0">Maximum Resolution (1280x720)</h3>
                            </div>
                            <div class="card-body">
                                <img id="maxresThumbnail" src="" alt="Maxres Thumbnail" class="img-fluid mb-3">
                                <div class="d-grid">
                                    <a id="maxresDownload" href="#" class="btn btn-danger" download>
                                        <i class="fas fa-download me-2"></i>Download Maxres Quality
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- High Quality -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="h6 mb-0">High Quality (480x360)</h3>
                            </div>
                            <div class="card-body">
                                <img id="highThumbnail" src="" alt="High Quality Thumbnail" class="img-fluid mb-3">
                                <div class="d-grid">
                                    <a id="highDownload" href="#" class="btn btn-success" download>
                                        <i class="fas fa-download me-2"></i>Download High Quality
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Medium Quality -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="h6 mb-0">Medium Quality (320x180)</h3>
                            </div>
                            <div class="card-body">
                                <img id="mediumThumbnail" src="" alt="Medium Quality Thumbnail" class="img-fluid mb-3">
                                <div class="d-grid">
                                    <a id="mediumDownload" href="#" class="btn btn-success" download>
                                        <i class="fas fa-download me-2"></i>Download Medium Quality
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Default Quality -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="h6 mb-0">Default Quality (120x90)</h3>
                            </div>
                            <div class="card-body">
                                <img id="defaultThumbnail" src="" alt="Default Quality Thumbnail" class="img-fluid mb-3">
                                <div class="d-grid">
                                    <a id="defaultDownload" href="#" class="btn btn-success" download>
                                        <i class="fas fa-download me-2"></i>Download Default Quality
                                    </a>
                                </div>
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
                    <h2 class="h5 mb-3">How to Download YouTube Thumbnails</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Copy the URL of any YouTube video</li>
                        <li class="mb-2">Paste the URL in the input field above</li>
                        <li class="mb-2">Click "Get Thumbnails" to see available qualities</li>
                        <li>Choose your preferred quality and click download</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tips for Using Thumbnails</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Use maxres quality for the best image resolution</li>
                        <li class="mb-2">Medium quality is good for social media sharing</li>
                        <li class="mb-2">Default quality is suitable for small previews</li>
                        <li>Always respect copyright and fair use guidelines</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('thumbnailForm');
    const loading = document.getElementById('loading');
    const results = document.getElementById('results');
    const error = document.getElementById('error');
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const videoUrl = document.getElementById('videoUrl').value;
        const videoId = extractVideoId(videoUrl);
        
        if (!videoId) {
            showError('Invalid YouTube URL. Please enter a valid video URL.');
            return;
        }
        
        // Show loading
        loading.style.display = 'block';
        results.style.display = 'none';
        error.style.display = 'none';
        
        try {
            // Generate thumbnail URLs
            const thumbnails = {
                maxres: `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`,
                high: `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`,
                medium: `https://img.youtube.com/vi/${videoId}/mqdefault.jpg`,
                default: `https://img.youtube.com/vi/${videoId}/default.jpg`
            };
            
            // Check if maxres thumbnail exists
            const maxresExists = await checkImageExists(thumbnails.maxres);
            
            // Update thumbnails and download links
            if (maxresExists) {
                document.getElementById('maxresThumbnail').src = thumbnails.maxres;
                document.getElementById('maxresDownload').href = thumbnails.maxres;
                document.getElementById('maxresDownload').download = `thumbnail-${videoId}-maxres.jpg`;
            } else {
                document.querySelector('.card:nth-child(1)').style.display = 'none';
            }
            
            document.getElementById('highThumbnail').src = thumbnails.high;
            document.getElementById('highDownload').href = thumbnails.high;
            document.getElementById('highDownload').download = `thumbnail-${videoId}-high.jpg`;
            
            document.getElementById('mediumThumbnail').src = thumbnails.medium;
            document.getElementById('mediumDownload').href = thumbnails.medium;
            document.getElementById('mediumDownload').download = `thumbnail-${videoId}-medium.jpg`;
            
            document.getElementById('defaultThumbnail').src = thumbnails.default;
            document.getElementById('defaultDownload').href = thumbnails.default;
            document.getElementById('defaultDownload').download = `thumbnail-${videoId}-default.jpg`;
            
            loading.style.display = 'none';
            results.style.display = 'block';
            
        } catch (err) {
            loading.style.display = 'none';
            showError('Failed to fetch thumbnails. Please try again.');
        }
    });
    
    function extractVideoId(url) {
        const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i;
        const match = url.match(regex);
        return match ? match[1] : null;
    }
    
    async function checkImageExists(url) {
        try {
            const response = await fetch(url, { method: 'HEAD' });
            return response.ok;
        } catch {
            return false;
        }
    }
    
    function showError(message) {
        const error = document.getElementById('error');
        error.querySelector('span').textContent = message;
        error.style.display = 'block';
        results.style.display = 'none';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
