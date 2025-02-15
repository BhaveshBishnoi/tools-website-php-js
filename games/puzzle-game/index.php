<?php include '../../includes/header.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools/games/">Games</a></li>
        <li class="breadcrumb-item active" aria-current="page">Puzzle Game</li>
    </ol>
</nav>
<title>Puzzle Game - Solve Puzzles and Improve Your Skills</title>
<meta name="description" content="Solve puzzles and improve your problem-solving skills with our puzzle game. Rearrange pieces to complete the image!">
<meta name="keywords" content="puzzle game, problem-solving, logic, cognitive skills">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Puzzle Game",
  "description": "Solve puzzles and improve your problem-solving skills with our puzzle game. Rearrange pieces to complete the image!",
  "applicationCategory": "Games",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container-fluid py-5">
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-puzzle-piece fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Puzzle Game</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Solve puzzles and improve your problem-solving skills by rearranging pieces to complete the image.
        </p>
    </div>

    <!-- Difficulty Selection Section -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <h2 class="h4 mb-3">Select Difficulty</h2>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(3)">Easy (3x3)</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(4)">Medium (4x4)</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(5)">Hard (5x5)</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Puzzle Game Section -->
    <div class="row mt-5" id="puzzleGameSection" style="display: none;">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Puzzle Game</h2>
                    <p id="timer" class="text-danger fw-bold mb-3">Time: <span id="timeLeft">00:00</span></p>
                    <p id="score" class="text-success fw-bold mb-3">Score: <span id="currentScore">0</span></p>
                    <div id="puzzleGrid" class="puzzle-grid"></div>
                    <button type="button" class="btn btn-danger mt-3" onclick="restartGame()">Restart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaderboard Section -->
    <div class="row mt-5" id="leaderboardSection" style="display: none;">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Leaderboard</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Score</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody id="leaderboardBody">
                            <!-- Leaderboard rows will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- How to Play Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">How to Play</h2>
                    <p>Follow these steps to play the Puzzle Game:</p>
                    <ol>
                        <li><strong>Select Difficulty:</strong> Choose the difficulty level (Easy, Medium, or Hard).</li>
                        <li><strong>Rearrange Pieces:</strong> Click on a piece next to the empty space to move it.</li>
                        <li><strong>Solve the Puzzle:</strong> Arrange all the pieces in the correct order to complete the puzzle.</li>
                        <li><strong>Earn Points:</strong> The faster you solve the puzzle, the higher your score!</li>
                    </ol>
                    <p>Good luck and have fun!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Benefits of Playing Puzzle Games</h2>
                    <p>Playing puzzle games like this one offers several benefits:</p>
                    <ul>
                        <li><strong>Improves Problem-Solving Skills:</strong> Puzzles require logical thinking and strategy.</li>
                        <li><strong>Enhances Memory:</strong> Remembering the positions of pieces helps improve memory.</li>
                        <li><strong>Boosts Concentration:</strong> Focusing on solving the puzzle improves attention span.</li>
                        <li><strong>Reduces Stress:</strong> Solving puzzles can be a relaxing and enjoyable activity.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Tips Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Tips for Solving Puzzles Faster</h2>
                    <p>Here are some tips to help you solve puzzles more efficiently:</p>
                    <ul>
                        <li><strong>Start with the Corners:</strong> Place the corner pieces first to build the framework.</li>
                        <li><strong>Work on the Edges:</strong> After the corners, focus on the edge pieces.</li>
                        <li><strong>Look for Patterns:</strong> Identify patterns or sequences in the numbers or images.</li>
                        <li><strong>Stay Calm:</strong> Take your time and avoid rushing to make mistakes.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let gridSize = 0;
let puzzlePieces = [];
let emptyPiece = null;
let timerInterval;
let startTime;
let score = 0;
let leaderboard = [];

function startGame(size) {
    gridSize = size;
    document.getElementById('puzzleGameSection').style.display = 'block';
    document.getElementById('leaderboardSection').style.display = 'none';
    document.getElementById('puzzleGrid').innerHTML = '';
    puzzlePieces = [];
    score = 0;
    document.getElementById('currentScore').textContent = score;

    // Generate puzzle pieces
    const totalPieces = gridSize * gridSize;
    const numbers = Array.from({ length: totalPieces - 1 }, (_, i) => i + 1);
    numbers.sort(() => Math.random() - 0.5);
    numbers.push(null); // Empty piece

    // Create grid
    const grid = document.getElementById('puzzleGrid');
    grid.style.gridTemplateColumns = `repeat(${gridSize}, 1fr)`;
    grid.style.gridTemplateRows = `repeat(${gridSize}, 1fr)`;

    numbers.forEach((number, index) => {
        const piece = document.createElement('div');
        piece.classList.add('puzzle-piece');
        if (number !== null) {
            piece.textContent = number;
            piece.addEventListener('click', movePiece);
        } else {
            piece.classList.add('empty');
            emptyPiece = piece;
        }
        piece.dataset.index = index;
        grid.appendChild(piece);
        puzzlePieces.push(piece);
    });

    // Start timer
    startTime = new Date();
    timerInterval = setInterval(updateTimer, 1000);
}

function movePiece() {
    const clickedIndex = parseInt(this.dataset.index);
    const emptyIndex = parseInt(emptyPiece.dataset.index);

    const clickedRow = Math.floor(clickedIndex / gridSize);
    const clickedCol = clickedIndex % gridSize;
    const emptyRow = Math.floor(emptyIndex / gridSize);
    const emptyCol = emptyIndex % gridSize;

    if ((clickedRow === emptyRow && Math.abs(clickedCol - emptyCol) === 1) ||
        (clickedCol === emptyCol && Math.abs(clickedRow - emptyRow) === 1)) {
        // Swap pieces
        [puzzlePieces[clickedIndex], puzzlePieces[emptyIndex]] = [puzzlePieces[emptyIndex], puzzlePieces[clickedIndex]];
        [this.dataset.index, emptyPiece.dataset.index] = [emptyPiece.dataset.index, this.dataset.index];

        // Update grid
        this.remove();
        emptyPiece.remove();
        puzzlePieces[clickedIndex].parentNode.insertBefore(this, puzzlePieces[clickedIndex]);
        puzzlePieces[emptyIndex].parentNode.insertBefore(emptyPiece, puzzlePieces[emptyIndex]);

        // Check if puzzle is solved
        if (isPuzzleSolved()) {
            clearInterval(timerInterval);
            endGame();
        }
    }
}

function isPuzzleSolved() {
    for (let i = 0; i < puzzlePieces.length - 1; i++) {
        if (puzzlePieces[i].textContent !== (i + 1).toString()) {
            return false;
        }
    }
    return true;
}

function updateTimer() {
    const now = new Date();
    const timeElapsed = Math.floor((now - startTime) / 1000);
    const minutes = Math.floor(timeElapsed / 60);
    const seconds = timeElapsed % 60;
    document.getElementById('timeLeft').textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

function endGame() {
    document.getElementById('leaderboardSection').style.display = 'block';

    const timeElapsed = Math.floor((new Date() - startTime) / 1000);
    score = 1000 - timeElapsed; // Higher score for faster completion
    leaderboard.push({ score, time: timeElapsed });
    leaderboard.sort((a, b) => b.score - a.score || a.time - b.time);
    updateLeaderboard();
}

function updateLeaderboard() {
    const leaderboardBody = document.getElementById('leaderboardBody');
    leaderboardBody.innerHTML = '';
    leaderboard.slice(0, 10).forEach((entry, index) => {
        const row = `<tr>
            <td>${index + 1}</td>
            <td>${entry.score}</td>
            <td>${entry.time} seconds</td>
        </tr>`;
        leaderboardBody.innerHTML += row;
    });
}

function restartGame() {
    clearInterval(timerInterval);
    document.getElementById('puzzleGameSection').style.display = 'none';
    document.getElementById('leaderboardSection').style.display = 'none';
    document.getElementById('timeLeft').textContent = '00:00';
    document.getElementById('currentScore').textContent = '0';
}
</script>

<style>
.puzzle-grid {
    display: grid;
    gap: 10px;
    margin-bottom: 20px;
}

.puzzle-piece {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    cursor: pointer;
    aspect-ratio: 1;
}

.puzzle-piece.empty {
    background-color: transparent;
    border: none;
    cursor: default;
}
</style>
<?php include '../../includes/footer.php'; ?>