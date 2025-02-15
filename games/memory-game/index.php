<?php include '../../includes/header.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools/games/">Games</a></li>
        <li class="breadcrumb-item active" aria-current="page">Memory Game</li>
    </ol>
</nav>
<title>Memory Game - Improve Your Memory and Concentration</title>
<meta name="description" content="Test and improve your memory with our memory game. Match pairs of cards and track your progress!">
<meta name="keywords" content="memory game, memory test, concentration, cognitive skills">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Memory Game",
  "description": "Test and improve your memory with our memory game. Match pairs of cards and track your progress!",
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
            <i class="fas fa-brain fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Memory Game</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Test and improve your memory and concentration by matching pairs of cards.
        </p>
    </div>

    <!-- Difficulty Selection Section -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <h2 class="h4 mb-3">Select Difficulty</h2>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(4)">Easy (4x4)</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(6)">Medium (6x6)</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(8)">Hard (8x8)</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memory Game Section -->
    <div class="row mt-5" id="memoryGameSection" style="display: none;">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Memory Game</h2>
                    <p id="timer" class="text-danger fw-bold mb-3">Time: <span id="timeLeft">00:00</span></p>
                    <p id="score" class="text-success fw-bold mb-3">Score: <span id="currentScore">0</span></p>
                    <div id="memoryGrid" class="memory-grid"></div>
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
</div>

<script>
let gridSize = 0;
let cards = [];
let flippedCards = [];
let matchedCards = [];
let timerInterval;
let startTime;
let score = 0;
let leaderboard = [];

function startGame(size) {
    gridSize = size;
    document.getElementById('memoryGameSection').style.display = 'block';
    document.getElementById('leaderboardSection').style.display = 'none';
    document.getElementById('memoryGrid').innerHTML = '';
    cards = [];
    flippedCards = [];
    matchedCards = [];
    score = 0;
    document.getElementById('currentScore').textContent = score;

    // Generate cards
    const totalCards = gridSize * gridSize;
    const symbols = ['🍎', '🍌', '🍒', '🍇', '🍓', '🍊', '🍋', '🍉', '🍍', '🥭', '🍑', '🥝','🍏','🍐','🍓','🥑'];
    const selectedSymbols = symbols.slice(0, totalCards / 2);
    const cardValues = [...selectedSymbols, ...selectedSymbols];
    cardValues.sort(() => Math.random() - 0.5);

    // Create grid
    const grid = document.getElementById('memoryGrid');
    grid.style.gridTemplateColumns = `repeat(${gridSize}, 1fr)`;
    grid.style.gridTemplateRows = `repeat(${gridSize}, 1fr)`;

    cardValues.forEach((value, index) => {
        const card = document.createElement('div');
        card.classList.add('memory-card');
        card.dataset.value = value;
        card.dataset.index = index;
        card.addEventListener('click', flipCard);
        grid.appendChild(card);
        cards.push(card);
    });

    // Start timer
    startTime = new Date();
    timerInterval = setInterval(updateTimer, 1000);
}

function flipCard() {
    if (flippedCards.length < 2 && !flippedCards.includes(this) && !matchedCards.includes(this)) {
        this.textContent = this.dataset.value;
        this.classList.add('flipped');
        flippedCards.push(this);

        if (flippedCards.length === 2) {
            checkForMatch();
        }
    }
}

function checkForMatch() {
    const [card1, card2] = flippedCards;

    if (card1.dataset.value === card2.dataset.value) {
        matchedCards.push(card1, card2);
        score += 10;
        document.getElementById('currentScore').textContent = score;

        if (matchedCards.length === cards.length) {
            clearInterval(timerInterval);
            endGame();
        }
    } else {
        setTimeout(() => {
            card1.textContent = '';
            card2.textContent = '';
            card1.classList.remove('flipped');
            card2.classList.remove('flipped');
        }, 1000);
    }

    flippedCards = [];
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
    document.getElementById('memoryGameSection').style.display = 'none';
    document.getElementById('leaderboardSection').style.display = 'none';
    document.getElementById('timeLeft').textContent = '00:00';
    document.getElementById('currentScore').textContent = '0';
}
</script>

<style>
.memory-grid {
    display: grid;
    gap: 10px;
    margin-bottom: 20px;
}

.memory-card {
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

.memory-card.flipped {
    background-color: #fff;
    cursor: default;
}
</style>
<?php include '../../includes/footer.php'; ?>