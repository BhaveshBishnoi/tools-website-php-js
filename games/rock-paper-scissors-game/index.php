<?php include '../../includes/header.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools/games/">Games</a></li>
        <li class="breadcrumb-item active" aria-current="page">Rock-Paper-Scissors</li>
    </ol>
</nav>
<title>Rock-Paper-Scissors - Play Against the Computer</title>
<meta name="description" content="Play Rock-Paper-Scissors against the computer. Choose rock, paper, or scissors and see if you can beat the computer!">
<meta name="keywords" content="rock-paper-scissors, logic game, computer game">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Rock-Paper-Scissors",
  "description": "Play Rock-Paper-Scissors against the computer. Choose rock, paper, or scissors and see if you can beat the computer!",
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
            <i class="fas fa-hand-rock fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Rock-Paper-Scissors</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Play Rock-Paper-Scissors against the computer. Choose rock, paper, or scissors and see if you can beat the computer!
        </p>
    </div>

    <!-- Game Section -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <h2 class="h4 mb-3">Rock-Paper-Scissors</h2>
                    <div class="btn-group mb-3" role="group">
                        <button type="button" class="btn btn-outline-danger" onclick="playGame('rock')">Rock</button>
                        <button type="button" class="btn btn-outline-danger" onclick="playGame('paper')">Paper</button>
                        <button type="button" class="btn btn-outline-danger" onclick="playGame('scissors')">Scissors</button>
                    </div>
                    <p id="gameResult" class="fw-bold mb-3">Make your choice!</p>
                    <p id="gameScore" class="fw-bold mb-3">Score: You 0 - 0 Computer</p>
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
                    <p>Follow these steps to play Rock-Paper-Scissors:</p>
                    <ol>
                        <li><strong>Choose your move:</strong> Click on Rock, Paper, or Scissors.</li>
                        <li><strong>Computer's move:</strong> The computer will randomly select Rock, Paper, or Scissors.</li>
                        <li><strong>Determine the winner:</strong> Rock beats Scissors, Scissors beats Paper, and Paper beats Rock.</li>
                        <li><strong>Track your score:</strong> The game keeps track of your score against the computer.</li>
                    </ol>
                    <p>Good luck and have fun!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let userScore = 0;
let computerScore = 0;

function playGame(userChoice) {
    const choices = ['rock', 'paper', 'scissors'];
    const computerChoice = choices[Math.floor(Math.random() * 3)];

    let result = '';
    if (userChoice === computerChoice) {
        result = 'It\'s a draw!';
    } else if (
        (userChoice === 'rock' && computerChoice === 'scissors') ||
        (userChoice === 'paper' && computerChoice === 'rock') ||
        (userChoice === 'scissors' && computerChoice === 'paper')
    ) {
        result = 'You win!';
        userScore++;
    } else {
        result = 'Computer wins!';
        computerScore++;
    }

    document.getElementById('gameResult').textContent = `You chose ${userChoice}, computer chose ${computerChoice}. ${result}`;
    document.getElementById('gameScore').textContent = `Score: You ${userScore} - ${computerScore} Computer`;
}
</script>

<style>
.btn-group .btn {
    font-size: 18px;
    padding: 10px 20px;
}
</style>
<?php include '../../includes/footer.php'; ?>