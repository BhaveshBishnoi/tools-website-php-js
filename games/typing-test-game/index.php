<?php include '../../includes/header.php'; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools/games/">Games</a></li>
        <li class="breadcrumb-item active" aria-current="page">Typing Test Game</li>
    </ol>
</nav>
<title>Typing Test Game - Improve Your Typing Speed</title>
<meta name="description" content="Test and improve your typing speed with our typing test game. Choose a time limit and start typing!">
<meta name="keywords" content="typing test, typing game, typing speed, typing accuracy">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Typing Test Game",
  "description": "Test and improve your typing speed with our typing test game.",
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
            <i class="fas fa-keyboard fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Typing Test Game</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Test and improve your typing speed with our typing test game. Choose a time limit and start typing!
        </p>
    </div>

    <!-- Time Selection Section -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <h2 class="h4 mb-3">Select Time Limit</h2>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(1)">1 Minute</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(2)">2 Minutes</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(5)">5 Minutes</button>
                        <button type="button" class="btn btn-outline-danger" onclick="startGame(10)">10 Minutes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Typing Test Section -->
    <div class="row mt-5" id="typingTestSection" style="display: none;">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Typing Test</h2>
                    <p id="timer" class="text-danger fw-bold mb-3">Time Left: <span id="timeLeft">00:00</span></p>
                    <div id="progressBar" class="progress mb-3" style="height: 10px;">
                        <div id="progress" class="progress-bar bg-danger" role="progressbar" style="width: 0%;"></div>
                    </div>
                    <p id="sampleText" class="mb-3"></p>
                    <textarea id="typingInput" class="form-control mb-3" rows="4" placeholder="Start typing here..." disabled></textarea>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="mb-0">WPM: <span id="liveWpm" class="fw-bold">0</span></p>
                        <p class="mb-0">Accuracy: <span id="liveAccuracy" class="fw-bold">100%</span></p>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="restartGame()">Restart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Section -->
    <div class="row mt-5" id="resultsSection" style="display: none;">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h4 mb-3">Results</h2>
                    <p class="mb-1">Words Per Minute (WPM): <span id="wpm" class="fw-bold">0</span></p>
                    <p class="mb-1">Accuracy: <span id="accuracy" class="fw-bold">0%</span></p>
                    <p class="mb-1">Rank: <span id="rank" class="fw-bold">-</span></p>
                    <p class="mb-1">Total Words: <span id="totalWords" class="fw-bold">0</span></p>
                    <p class="mb-1">Correct Words: <span id="correctWords" class="fw-bold">0</span></p>
                    <p class="mb-1">Incorrect Words: <span id="incorrectWords" class="fw-bold">0</span></p>
                    <button type="button" class="btn btn-danger mt-3" onclick="restartGame()">Try Again</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
// Sample text for typing test
const sampleTexts = [
    "The quick brown fox jumps over the lazy dog. Programming is the art of telling another human what one wants the computer to do. Practice makes perfect. Keep typing to improve your speed and accuracy. Coding is fun and challenging. Enjoy the process of learning and building. Typing is a skill that improves with practice. Start your journey today!",
    "Web development is an exciting field that combines creativity and logic. Whether you're building a simple website or a complex web application, the key is to keep learning and experimenting. Typing is an essential skill for developers, as it allows you to write code quickly and efficiently. The more you practice, the better you'll become. So, keep typing and keep improving!",
    "JavaScript is a powerful programming language that enables you to create dynamic and interactive web pages. It's used by millions of developers worldwide and is an essential skill for anyone interested in web development. Typing is a crucial part of coding, and improving your typing speed and accuracy will make you a more efficient developer. Keep practicing and have fun!",
    "Python is a versatile programming language that is widely used in web development, data analysis, artificial intelligence, and more. Its simple syntax and readability make it a great choice for beginners and experts alike. Typing is an important skill for Python developers, as it allows you to write code quickly and efficiently. Keep practicing and improving your typing skills!",
    "HTML and CSS are the building blocks of the web. HTML provides the structure of a webpage, while CSS is used to style and design it. Together, they allow you to create beautiful and functional websites. Typing is a key skill for web developers, as it enables you to write code quickly and accurately. Keep practicing and improving your typing speed!",
    "React is a popular JavaScript library for building user interfaces. It allows you to create reusable components and build complex UIs with ease. Typing is an essential skill for React developers, as it enables you to write code quickly and efficiently. The more you practice, the better you'll become. So, keep typing and keep improving!",
    "Node.js is a runtime environment that allows you to run JavaScript on the server. It's widely used for building scalable and efficient web applications. Typing is a crucial skill for Node.js developers, as it allows you to write code quickly and accurately. Keep practicing and improving your typing speed!",
    "Git is a version control system that allows you to track changes in your code and collaborate with other developers. It's an essential tool for modern software development. Typing is a key skill for developers, as it enables you to write code quickly and efficiently. Keep practicing and improving your typing speed!",
    "SQL is a programming language used to manage and manipulate databases. It's widely used in web development, data analysis, and more. Typing is an important skill for SQL developers, as it allows you to write queries quickly and accurately. Keep practicing and improving your typing speed!",
    "Linux is an open-source operating system that is widely used in web servers, cloud computing, and more. It's a powerful tool for developers and system administrators. Typing is a crucial skill for Linux users, as it allows you to execute commands quickly and efficiently. Keep practicing and improving your typing speed!"
];

let timeLimit = 0; // Time limit in minutes
let timerInterval;
let startTime;
let endTime;

function startGame(selectedTime) {
    timeLimit = selectedTime;
    document.getElementById('typingTestSection').style.display = 'block';
    document.getElementById('resultsSection').style.display = 'none';
    document.getElementById('typingInput').disabled = false;
    document.getElementById('typingInput').value = '';
    document.getElementById('typingInput').focus();

    // Display random sample text
    const randomIndex = Math.floor(Math.random() * sampleTexts.length);
    document.getElementById('sampleText').textContent = sampleTexts[randomIndex];

    // Start the timer
    startTime = new Date();
    endTime = new Date(startTime.getTime() + timeLimit * 60000);
    updateTimer();

    timerInterval = setInterval(updateTimer, 1000);

    // Enable live updates
    document.getElementById('typingInput').addEventListener('input', updateLiveStats);
}

function updateTimer() {
    const now = new Date();
    const timeLeft = Math.max(0, endTime - now);
    const minutes = Math.floor(timeLeft / 60000);
    const seconds = Math.floor((timeLeft % 60000) / 1000);

    document.getElementById('timeLeft').textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

    // Update progress bar
    const totalTime = timeLimit * 60000;
    const elapsedTime = totalTime - timeLeft;
    const progress = (elapsedTime / totalTime) * 100;
    document.getElementById('progress').style.width = `${progress}%`;

    if (timeLeft <= 0) {
        clearInterval(timerInterval);
        endGame();
    }
}

function updateLiveStats() {
    const typedText = document.getElementById('typingInput').value;
    const sampleText = document.getElementById('sampleText').textContent;

    // Highlight incorrect words
    const sampleWords = sampleText.split(' ');
    const typedWords = typedText.split(' ');
    let highlightedText = '';
    let correctWords = 0;

    sampleWords.forEach((word, index) => {
        if (typedWords[index] === word) {
            highlightedText += `<span class="text-success">${word}</span> `;
            correctWords++;
        } else if (typedWords[index]) {
            highlightedText += `<span class="text-danger">${word}</span> `;
        } else {
            highlightedText += `${word} `;
        }
    });

    document.getElementById('sampleText').innerHTML = highlightedText;

    // Calculate live WPM and accuracy
    const totalWords = typedWords.filter(word => word.length > 0).length;
    const elapsedTime = (new Date() - startTime) / 60000; // in minutes
    const wpm = Math.round((correctWords / elapsedTime) * 60);
    const accuracy = ((correctWords / totalWords) * 100).toFixed(2);

    document.getElementById('liveWpm').textContent = wpm;
    document.getElementById('liveAccuracy').textContent = `${isNaN(accuracy) ? 100 : accuracy}%`;
}

function endGame() {
    document.getElementById('typingInput').disabled = true;
    document.getElementById('resultsSection').style.display = 'block';

    const typedText = document.getElementById('typingInput').value;
    const sampleText = document.getElementById('sampleText').textContent;

    const totalWords = typedText.split(/\s+/).filter(word => word.length > 0).length;
    const correctWords = typedText.split(/\s+/).filter((word, index) => word === sampleText.split(/\s+/)[index]).length;
    const incorrectWords = totalWords - correctWords;
    const accuracy = ((correctWords / totalWords) * 100).toFixed(2);
    const wpm = Math.round((correctWords / timeLimit) * 60);

    // Calculate rank
    const rank = calculateRank(wpm);

    // Update results
    document.getElementById('wpm').textContent = wpm;
    document.getElementById('accuracy').textContent = `${accuracy}%`;
    document.getElementById('rank').textContent = rank;
    document.getElementById('totalWords').textContent = totalWords;
    document.getElementById('correctWords').textContent = correctWords;
    document.getElementById('incorrectWords').textContent = incorrectWords;
}

function calculateRank(wpm) {
    if (wpm >= 100) return 1;
    if (wpm >= 90) return 2;
    if (wpm >= 80) return 3;
    if (wpm >= 70) return 4;
    if (wpm >= 60) return 5;
    if (wpm >= 50) return 6;
    if (wpm >= 40) return 7;
    if (wpm >= 30) return 8;
    if (wpm >= 20) return 9;
    return 10;
}

function restartGame() {
    clearInterval(timerInterval);
    document.getElementById('typingTestSection').style.display = 'none';
    document.getElementById('resultsSection').style.display = 'none';
    document.getElementById('timeLeft').textContent = '00:00';
    document.getElementById('typingInput').value = '';
    document.getElementById('progress').style.width = '0%';
}
</script>

<?php include '../../includes/footer.php'; ?>