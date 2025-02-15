<?php include '../../includes/header.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools/games/">Games</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sudoku</li>
    </ol>
</nav>
<title>Sudoku - Sharpen Your Logical Thinking Skills</title>
<meta name="description" content="Play Sudoku and improve your logical thinking skills. Solve puzzles and track your progress!">
<meta name="keywords" content="sudoku, puzzle game, logic, cognitive skills">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Sudoku",
  "description": "Play Sudoku and improve your logical thinking skills. Solve puzzles and track your progress!",
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
            <i class="fas fa-table fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Sudoku</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Play Sudoku and sharpen your logical thinking skills. Solve puzzles and track your progress!
        </p>
    </div>

    <!-- Difficulty Selection Section -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <h2 class="h4 mb-3">Select Difficulty</h2>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-danger" onclick="startGame('easy')">Easy</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame('medium')">Medium</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame('hard')">Hard</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sudoku Game Section -->
    <div class="row mt-5" id="sudokuGameSection" style="display: none;">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Sudoku</h2>
                    <p id="timer" class="text-danger fw-bold mb-3">Time: <span id="timeLeft">00:00</span></p>
                    <p id="score" class="text-success fw-bold mb-3">Score: <span id="currentScore">0</span></p>
                    <div id="sudokuGrid" class="sudoku-grid"></div>
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
                    <p>Follow these steps to play Sudoku:</p>
                    <ol>
                        <li><strong>Select Difficulty:</strong> Choose the difficulty level (Easy, Medium, or Hard).</li>
                        <li><strong>Fill the Grid:</strong> Fill the grid so that every row, column, and 3x3 box contains the numbers 1 to 9 without repeating.</li>
                        <li><strong>Use Logic:</strong> Use logic and deduction to determine the correct numbers.</li>
                        <li><strong>Complete the Puzzle:</strong> Finish the puzzle as quickly as possible to earn a high score!</li>
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
                    <h2 class="h4 mb-3">Benefits of Playing Sudoku</h2>
                    <p>Playing Sudoku offers several benefits:</p>
                    <ul>
                        <li><strong>Improves Logical Thinking:</strong> Sudoku requires logical reasoning and problem-solving skills.</li>
                        <li><strong>Enhances Concentration:</strong> Focusing on the grid improves attention span.</li>
                        <li><strong>Boosts Memory:</strong> Remembering numbers and patterns helps improve memory.</li>
                        <li><strong>Reduces Stress:</strong> Solving Sudoku puzzles can be a relaxing and enjoyable activity.</li>
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
                    <h2 class="h4 mb-3">Tips for Solving Sudoku Faster</h2>
                    <p>Here are some tips to help you solve Sudoku puzzles more efficiently:</p>
                    <ul>
                        <li><strong>Start with Easy Numbers:</strong> Look for rows, columns, or boxes with the most filled numbers.</li>
                        <li><strong>Use Elimination:</strong> Eliminate possibilities by checking rows, columns, and boxes.</li>
                        <li><strong>Look for Patterns:</strong> Identify patterns or sequences in the numbers.</li>
                        <li><strong>Stay Calm:</strong> Take your time and avoid rushing to make mistakes.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let timerInterval;
let startTime;
let score = 0;
let leaderboard = [];

// Sample Sudoku puzzles
const sudokuPuzzles = {
    easy: [
        [5, 3, 0, 0, 7, 0, 0, 0, 0],
        [6, 0, 0, 1, 9, 5, 0, 0, 0],
        [0, 9, 8, 0, 0, 0, 0, 6, 0],
        [8, 0, 0, 0, 6, 0, 0, 0, 3],
        [4, 0, 0, 8, 0, 3, 0, 0, 1],
        [7, 0, 0, 0, 2, 0, 0, 0, 6],
        [0, 6, 0, 0, 0, 0, 2, 8, 0],
        [0, 0, 0, 4, 1, 9, 0, 0, 5],
        [0, 0, 0, 0, 8, 0, 0, 7, 9]
    ],
    medium: [
        [0, 0, 0, 0, 0, 0, 6, 8, 0],
        [0, 0, 0, 0, 7, 3, 0, 0, 9],
        [3, 0, 9, 0, 0, 0, 0, 4, 5],
        [4, 9, 0, 0, 0, 0, 0, 0, 0],
        [8, 0, 3, 0, 5, 0, 9, 0, 2],
        [0, 0, 0, 0, 0, 0, 0, 3, 6],
        [9, 6, 0, 0, 0, 0, 3, 0, 8],
        [7, 0, 0, 6, 8, 0, 0, 0, 0],
        [0, 2, 8, 0, 0, 0, 0, 0, 0]
    ],
    hard: [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 3, 0, 8, 5],
        [0, 0, 1, 0, 2, 0, 0, 0, 0],
        [0, 0, 0, 5, 0, 7, 0, 0, 0],
        [0, 0, 4, 0, 0, 0, 1, 0, 0],
        [0, 9, 0, 0, 0, 0, 0, 0, 0],
        [5, 0, 0, 0, 0, 0, 0, 7, 3],
        [0, 0, 2, 0, 1, 0, 0, 0, 0],
        [0, 0, 0, 0, 4, 0, 0, 0, 9]
    ]
};

function startGame(difficulty) {
    document.getElementById('sudokuGameSection').style.display = 'block';
    document.getElementById('leaderboardSection').style.display = 'none';
    document.getElementById('sudokuGrid').innerHTML = '';
    score = 0;
    document.getElementById('currentScore').textContent = score;

    // Generate Sudoku grid
    const grid = document.getElementById('sudokuGrid');
    const puzzle = sudokuPuzzles[difficulty];

    for (let i = 0; i < 9; i++) {
        for (let j = 0; j < 9; j++) {
            const cell = document.createElement('input');
            cell.type = 'text';
            cell.maxLength = 1;
            cell.classList.add('sudoku-cell');
            if (puzzle[i][j] !== 0) {
                cell.value = puzzle[i][j];
                cell.disabled = true;
            } else {
                cell.addEventListener('input', validateInput);
            }
            grid.appendChild(cell);
        }
    }

    // Start timer
    startTime = new Date();
    timerInterval = setInterval(updateTimer, 1000);
}

function validateInput(event) {
    const value = event.target.value;
    if (value < 1 || value > 9 || isNaN(value)) {
        event.target.value = '';
    } else {
        checkForCompletion();
    }
}

function checkForCompletion() {
    const cells = document.querySelectorAll('.sudoku-cell');
    let isComplete = true;

    cells.forEach(cell => {
        if (cell.value === '') {
            isComplete = false;
        }
    });

    if (isComplete) {
        clearInterval(timerInterval);
        endGame();
    }
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
    document.getElementById('sudokuGameSection').style.display = 'none';
    document.getElementById('leaderboardSection').style.display = 'none';
    document.getElementById('timeLeft').textContent = '00:00';
    document.getElementById('currentScore').textContent = '0';
}
</script>

<style>
.sudoku-grid {
    display: grid;
    grid-template-columns: repeat(9, 1fr);
    gap: 2px;
    margin-bottom: 20px;
}

.sudoku-cell {
    width: 40px;
    height: 40px;
    text-align: center;
    font-size: 18px;
    border: 1px solid #dee2e6;
    border-radius: 5px;
}

.sudoku-cell:disabled {
    background-color: #f8f9fa;
    cursor: default;
}
</style>
<?php include '../../includes/footer.php'; ?>