<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section bg-gradient position-relative overflow-hidden" style="background: linear-gradient(135deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">
    <div class="container py-2">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInUp">All-in-One Online Tools</h1>
                <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">Free online tools for image, PDF, SEO, YouTube, finance, and more. No registration required!</p>
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="#tools" class="btn btn-danger btn-md px-4 me-2">Explore Tools</a>
                    <a href="/about" class="btn btn-dark btn-md px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img src="/tools/assets/images/sapiens.svg" alt="Tools Illustration" class="img-fluid animate__animated animate__fadeInRight">
            </div>
        </div>
    </div>
</section>

<!-- Tools Categories -->
<section id="tools" class="py-4">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-lg-6 mx-auto">
                <h2 class="fw-bold mb-3 text-danger">Our Tools Collection</h2>
                <p class="text-muted">Discover our comprehensive suite of online tools designed to make your work easier</p>
            </div>
        </div>
        <div class="row g-4">
            <!-- Image Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-images fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">Image Tools</h3>
                        <p class="card-text text-muted mb-4">Compress, convert, resize, and edit images online with our powerful suite of image tools</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="image-tools/png-compressor/" class="list-group-item list-group-item-action"><i class="fas fa-compress me-2 text-danger"></i>PNG Compressor</a>
                            <a href="image-tools/jpg-compressor/" class="list-group-item list-group-item-action"><i class="fas fa-compress me-2 text-danger"></i>JPG Compressor</a>
                            <a href="image-tools/image-converter/" class="list-group-item list-group-item-action"><i class="fas fa-exchange-alt me-2 text-danger"></i>Image Converter</a>
                        </div>
                        <a href="image-tools/" class="btn btn-danger">View All Image Tools</a>
                    </div>
                </div>
            </div>

            <!-- PDF Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-file-pdf fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">PDF Tools</h3>
                        <p class="card-text text-muted mb-4">Convert, merge, and edit PDF files with our comprehensive PDF manipulation tools</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="pdf-tools/pdf-to-images-convertor/" class="list-group-item list-group-item-action"><i class="fas fa-image me-2 text-danger"></i>PDF to Images</a>
                            <a href="pdf-tools/image-to-pdf-convertor/" class="list-group-item list-group-item-action"><i class="fas fa-file-pdf me-2 text-danger"></i>Images to PDF</a>
                            <a href="pdf-tools/pdf-compressor/" class="list-group-item list-group-item-action"><i class="fas fa-compress me-2 text-danger"></i>PDF Compressor</a>
                        </div>
                        <a href="pdf-tools/" class="btn btn-danger">View All PDF Tools</a>
                    </div>
                </div>
            </div>

            <!-- Finance Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-calculator fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">Finance Tools</h3>
                        <p class="card-text text-muted mb-4">Calculate investments, plan budgets, and analyze financial metrics with our finance tools</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="finance-tools/investment-calculator" class="list-group-item list-group-item-action"><i class="fas fa-chart-line me-2 text-danger"></i>Investment Calculator</a>
                            <a href="finance-tools/budget-calculator" class="list-group-item list-group-item-action"><i class="fas fa-wallet me-2 text-danger"></i>Budget Planner</a>
                            <a href="finance-tools/roi-calculator" class="list-group-item list-group-item-action"><i class="fas fa-percentage me-2 text-danger"></i>ROI Calculator</a>
                        </div>
                        <a href="finance-tools/" class="btn btn-danger">View All Finance Tools</a>
                    </div>
                </div>
            </div>

            <!-- YouTube Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fab fa-youtube fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">YouTube Tools</h3>
                        <p class="card-text text-muted mb-4">Analyze, download, and optimize YouTube videos with our tools</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="youtube-tools/random-comment-picker" class="list-group-item list-group-item-action"><i class="fas fa-info me-2 text-danger"></i>Comment Picker</a>
                            <a href="youtube-tools/youtube-thumbnail-downloader" class="list-group-item list-group-item-action"><i class="fas fa-image me-2 text-danger"></i>Thumbnail Downloader</a>
                            <a href="youtube-tools/youtube-tag-generator" class="list-group-item list-group-item-action"><i class="fas fa-tags me-2 text-danger"></i>Tag Generator</a>
                        </div>
                        <a href="youtube-tools/" class="btn btn-danger">View All YouTube Tools</a>
                    </div>
                </div>
            </div>

            <!-- SEO Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-search fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">SEO Tools</h3>
                        <p class="card-text text-muted mb-4">Boost your website's performance with our SEO analysis tools</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="seo-tools/meta-tags-generator" class="list-group-item list-group-item-action"><i class="fas fa-link me-2 text-danger"></i>Meta Tags Generator</a>
                            <a href="seo-tools/robots-txt-generator" class="list-group-item list-group-item-action"><i class="fas fa-globe me-2 text-danger"></i>Robots.txt Generator</a>
                            <a href="seo-tools/schema-generator" class="list-group-item list-group-item-action"><i class="fas fa-key me-2 text-danger"></i>Schema Generator</a>
                        </div>
                        <a href="seo-tools/" class="btn btn-danger">View All SEO Tools</a>
                    </div>
                </div>
            </div>

            <!-- Developer Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-code fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">Developer Tools</h3>
                        <p class="card-text text-muted mb-4">Code formatters, encoders, and other developer utilities</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="developer-tools/code-formatter" class="list-group-item list-group-item-action"><i class="fas fa-code me-2 text-danger"></i>Code Formatter</a>
                            <a href="developer-tools/json-formatter" class="list-group-item list-group-item-action"><i class="fas fa-file-code me-2 text-danger"></i>JSON Formatter</a>
                            <a href="developer-tools/url-encoder" class="list-group-item list-group-item-action"><i class="fas fa-link me-2 text-danger"></i>URL Encoder</a>
                        </div>
                        <a href="developer-tools/" class="btn btn-danger">View All Developer Tools</a>
                    </div>
                </div>
            </div>

            <!-- Games Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-gamepad fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">Games Tools</h3>
                        <p class="card-text text-muted mb-4">Enjoy a variety of games to relax and have fun</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="games/typing-test-game" class="list-group-item list-group-item-action"><i class="fas fa-keyboard me-2 text-danger"></i>Typing Test Game</a>
                            <a href="games/rock-paper-scissors-game" class="list-group-item list-group-item-action"><i class="fas fa-hand-rock me-2 text-danger"></i>Rock-Paper-Scissors</a>
                            <a href="games/memory-game" class="list-group-item list-group-item-action"><i class="fas fa-memory me-2 text-danger"></i>Memory Game</a>
                            <!-- Add more games here -->
                        </div>
                        <a href="games/" class="btn btn-danger">View All Games</a>
                    </div>
                </div>
            </div>

            <!-- Health Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-heartbeat fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">Health Tools</h3>
                        <p class="card-text text-muted mb-4">Calculate and track your health metrics with our comprehensive health tools</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="health-tools/bmi-calculator" class="list-group-item list-group-item-action"><i class="fas fa-calculator me-2 text-danger"></i>BMI Calculator</a>
                            <a href="health-tools/calorie-calculator" class="list-group-item list-group-item-action"><i class="fas fa-utensils me-2 text-danger"></i>Calorie Calculator</a>
                            <a href="health-tools/water-intake-calculator" class="list-group-item list-group-item-action"><i class="fas fa-tint me-2 text-danger"></i>Water Intake Calculator</a>
                        </div>
                        <a href="health-tools/" class="btn btn-danger">View All Health Tools</a>
                    </div>
                </div>
            </div>

            <!-- Other Tools -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-tools fa-3x text-danger"></i>
                        </div>
                        <h3 class="h5 card-title">Other Tools</h3>
                        <p class="card-text text-muted mb-4">Miscellaneous online tools to simplify your daily tasks</p>
                        <div class="list-group list-group-flush mb-4">
                            <a href="other-tools/percentage-calculator" class="list-group-item list-group-item-action"><i class="fas fa-paypal me-2 text-danger"></i>Percentage Calculator</a>
                            <a href="other-tools/file-converter" class="list-group-item list-group-item-action"><i class="fas fa-file-export me-2 text-danger"></i>File Converter</a>
                            <a href="other-tools/unit-converter" class="list-group-item list-group-item-action"><i class="fas fa-text-height me-2 text-danger"></i>Unit Converter</a>
                        </div>
                        <a href="other-tools/" class="btn btn-danger">View All Other Tools</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-bolt fa-2x text-danger mb-3"></i>
                    <h4 class="h5">Fast & Efficient</h4>
                    <p class="text-muted">Process your files quickly with our optimized tools</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-lock fa-2x text-danger mb-3"></i>
                    <h4 class="h5">Secure</h4>
                    <p class="text-muted">Your files are processed securely and never stored</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-desktop fa-2x text-danger mb-3"></i>
                    <h4 class="h5">Easy to Use</h4>
                    <p class="text-muted">Simple interface designed for the best user experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <i class="fas fa-gift fa-2x text-danger mb-3"></i>
                    <h4 class="h5">Free to Use</h4>
                    <p class="text-muted">All tools are free with no registration required</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.py-6 { padding-top: 6rem; padding-bottom: 6rem; }
.min-vh-50 { min-height: 50vh; }
.text-white-75 { color: rgba(255, 255, 255, 0.75); }
.hover-shadow-lg { transition: all 0.3s ease-in-out; }
.hover-shadow-lg:hover { transform: translateY(-5px); }
.transition-all { transition: all 0.3s ease-in-out; }
.icon-box { 
    height: 80px; 
    width: 80px; 
    display: inline-flex; 
    align-items: center; 
    justify-content: center; 
    background: rgba(220, 53, 69, 0.1); 
    border-radius: 50%; 
    margin-bottom: 1rem; 
}
</style>
<?php include 'includes/footer.php'; ?>
