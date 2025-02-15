<?php include '../../includes/header.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools/games/">Games</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tic-Tac-Toe</li>
    </ol>
</nav>
<title>Tic-Tac-Toe - Classic Two-Player Game</title>
<meta name="description" content="Play Tic-Tac-Toe, a classic two-player game where players take turns marking spaces in a 3x3 grid. The first to get three in a row wins!">
<meta name="keywords" content="tic-tac-toe, two-player game, logic game, grid game">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Tic-Tac-Toe",
  "description": "Play Tic-Tac-Toe, a classic two-player game where players take turns marking spaces in a 3x3 grid. The first to get three in a row wins!",
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
            <i class="fas fa-times-circle fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Tic-Tac-Toe</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Play Tic-Tac-Toe, a classic two-player game where players take turns marking spaces in a 3x3 grid. The first to get three in a row wins!
        </p>
    </div>

    <!-- Game Section -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <h2 class="h4 mb-3">Tic-Tac-Toe</h2>
                    <div id="ticTacToeGrid" class="tic-tac-toe-grid mb-3"></div>
                    <p id="gameStatus" class="fw-bold mb-3">Player X's Turn</p>
                    <button type="button" class="btn btn-danger" onclick="resetGame()">Reset Game</button>
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
                    <p>Follow these steps to play Tic-Tac-Toe:</p>
                    <ol>
                        <li><strong>Player X starts:</strong> Click on any empty cell to place an X.</li>
                        <li><strong>Player O's turn:</strong> The next player clicks on another empty cell to place an O.</li>
                        <li><strong>Win the game:</strong> The first player to get three of their marks in a row (horizontal, vertical, or diagonal) wins.</li>
                        <li><strong>Draw:</strong> If all cells are filled without a winner, the game is a draw.</li>
                    </ol>
                    <p>Good luck and have fun!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let currentPlayer = 'X';
let gameActive = true;
let gameState = ['', '', '', '', '', '', '', '', ''];

const winningConditions = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
    [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
    [0, 4, 8], [2, 4, 6]             // Diagonals
];

function initializeGame() {
    const grid = document.getElementById('ticTacToeGrid');
    grid.innerHTML = '';
    for (let i = 0; i < 9; i++) {
        const cell = document.createElement('div');
        cell.classList.add('tic-tac-toe-cell');
        cell.dataset.index = i;
        cell.addEventListener('click', handleCellClick);
        grid.appendChild(cell);
    }
}

function handleCellClick(event) {
    const clickedCell = event.target;
    const clickedCellIndex = parseInt(clickedCell.dataset.index);

    if (gameState[clickedCellIndex] !== '' || !gameActive) return;

    gameState[clickedCellIndex] = currentPlayer;
    clickedCell.textContent = currentPlayer;

    checkForWinner();
    if (gameActive) {
        currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
        document.getElementById('gameStatus').textContent = `Player ${currentPlayer}'s Turn`;
    }
}

function checkForWinner() {
    for (let condition of winningConditions) {
        const [a, b, c] = condition;
        if (gameState[a] !== '' && gameState[a] === gameState[b] && gameState[a] === gameState[c]) {
            document.getElementById('gameStatus').textContent = `Player ${currentPlayer} Wins!`;
            gameActive = false;
            return;
        }
    }

    if (!gameState.includes('')) {
        document.getElementById('gameStatus').textContent = 'Draw!';
        gameActive = false;
    }
}

function resetGame() {
    currentPlayer = 'X';
    gameActive = true;
    gameState = ['', '', '', '', '', '', '', '', ''];
    document.getElementById('gameStatus').textContent = `Player X's Turn`;
    initializeGame();
}

// Initialize the game on page load
initializeGame();
</script>

<style>
.tic-tac-toe-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 5px;
    margin-bottom: 20px;
}

.tic-tac-toe-cell {
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: bold;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    cursor: pointer;
}

.tic-tac-toe-cell:hover {
    background-color: #e9ecef;
}
</style>
<?php include '../../includes/footer.php'; ?>