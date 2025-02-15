<?php 
$pageTitle = "Games - Free Online Games for Fun and Learning";
$pageDescription = "Play free online games for fun and learning. Enjoy a variety of games including typing tests, puzzles, and more!";
include '../includes/header.php'; 
?>

<div class="container-fluid py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item active">Games</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-gamepad fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Games</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Play free online games for fun, learning, and improving your skills.
        </p>
    </div>

    <!-- Games Grid -->
    <div class="row g-4">
        <!-- Typing Test Game -->
        <div class="col-lg-4 col-md-6">
            <a href="typing-test-game" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-keyboard fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Typing Test</h3>
                        <p class="text-muted mb-0">Test and improve your typing speed and accuracy with our typing test game.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Memory Game -->
        <div class="col-lg-4 col-md-6">
            <a href="memory-game" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-brain fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Memory Game</h3>
                        <p class="text-muted mb-0">Challenge your memory skills with this fun and interactive memory card game.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Puzzle Game -->
        <div class="col-lg-4 col-md-6">
            <a href="puzzle-game" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-puzzle-piece fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Puzzle Game</h3>
                        <p class="text-muted mb-0">Solve puzzles and improve your problem-solving skills with this engaging game.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Trivia Quiz -->
        <div class="col-lg-4 col-md-6">
            <a href="rock-paper-scissors-game" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-hand-rock fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Rock Paper Scissors</h3>
                        <p class="text-muted mb-0">Play Rock Paper Scissors and test your skills.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Word Search -->
        <div class="col-lg-4 col-md-6">
            <a href="tic-tac-toe-game" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-times fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Tic-Tac-Toe</h3>
                        <p class="text-muted mb-0">Play Tic-Tac-Toe and challenge your friends.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sudoku -->
        <div class="col-lg-4 col-md-6">
            <a href="sudoku-game-online" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-table fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Sudoku</h3>
                        <p class="text-muted mb-0">Play Sudoku and sharpen your logical thinking skills.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our Games</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Play</h3>
                        <p class="text-muted small">All our games are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Fun & Learning</h3>
                        <p class="text-muted small">Enjoy games that are both fun and educational.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Skill Improvement</h3>
                        <p class="text-muted small">Improve your typing, memory, and problem-solving skills.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick and enjoyable gameplay.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-shadow-lg {
    transition: all 0.3s ease-in-out;
}
.hover-shadow-lg:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}
</style>

<?php include '../includes/footer.php'; ?>