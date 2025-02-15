<?php include '../../includes/header.php'; ?>

<title>Intermittent Fasting Timer - Free Online Fasting Period Tracker</title>
<meta name="description" content="Track your intermittent fasting periods online for free and get notifications. No registration required!">
<meta name="keywords" content="intermittent fasting timer, online fasting tool, free fasting tracker, fasting period calculator">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Intermittent Fasting Timer",
  "description": "Track your intermittent fasting periods online for free and get notifications.",
  "applicationCategory": "Health Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/health-tools/">Health Tools</a></li>
            <li class="breadcrumb-item active">Intermittent Fasting Timer</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-clock fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Intermittent Fasting Timer</h1>
                        <p class="text-muted">Track your fasting and eating windows</p>
                    </div>

                    <div class="mb-4">
                        <h5>Select Fasting Protocol</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="card h-100 protocol-card" data-fast="16" data-eat="8">
                                    <div class="card-body text-center">
                                        <h6>16:8</h6>
                                        <p class="mb-0 small">16h fast, 8h eat</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 protocol-card" data-fast="18" data-eat="6">
                                    <div class="card-body text-center">
                                        <h6>18:6</h6>
                                        <p class="mb-0 small">18h fast, 6h eat</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 protocol-card" data-fast="20" data-eat="4">
                                    <div class="card-body text-center">
                                        <h6>20:4</h6>
                                        <p class="mb-0 small">20h fast, 4h eat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="fastingForm" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Start Time</label>
                                <input type="datetime-local" class="form-control" id="startTime" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Time</label>
                                <input type="datetime-local" class="form-control" id="endTime" readonly>
                            </div>
                        </div>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-play me-2"></i>Start Fast
                            </button>
                        </div>
                    </form>

                    <!-- Timer Display -->
                    <div id="timerDisplay" style="display: none;">
                        <div class="text-center mb-4">
                            <div class="display-4 mb-2" id="countdown">00:00:00</div>
                            <p class="mb-0">Current Phase: <span id="currentPhase">Fasting</span></p>
                        </div>

                        <div class="progress mb-3" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBar" role="progressbar" style="width: 0%"></div>
                        </div>

                        <div class="row text-center g-3">
                            <div class="col-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6>Start Time</h6>
                                        <p class="mb-0" id="displayStartTime">-</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6>End Time</h6>
                                        <p class="mb-0" id="displayEndTime">-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fasting Benefits Timeline -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Fasting Benefits Timeline</h2>
                    <div class="timeline">
                        <div class="timeline-item">
                            <h6>12 Hours</h6>
                            <p>Your body enters the fasted state. Fat burning begins.</p>
                        </div>
                        <div class="timeline-item">
                            <h6>14-16 Hours</h6>
                            <p>Autophagy (cellular repair) begins to ramp up.</p>
                        </div>
                        <div class="timeline-item">
                            <h6>16-18 Hours</h6>
                            <p>Fat burning increases. Ketone production rises.</p>
                        </div>
                        <div class="timeline-item">
                            <h6>18-20 Hours</h6>
                            <p>Human Growth Hormone (HGH) increases significantly.</p>
                        </div>
                        <div class="timeline-item">
                            <h6>20-24 Hours</h6>
                            <p>Maximum autophagy benefits. Peak fat burning.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips and Guidelines -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tips for Successful Fasting</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Stay hydrated with water, black coffee, or unsweetened tea</li>
                        <li class="mb-2">Start with shorter fasting windows and gradually increase</li>
                        <li class="mb-2">Break your fast with easily digestible foods</li>
                        <li class="mb-2">Listen to your body and stop if you feel unwell</li>
                        <li>Consult your healthcare provider before starting any fasting protocol</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.protocol-card {
    cursor: pointer;
    transition: all 0.3s ease;
}
.protocol-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
}
.protocol-card.selected {
    border-color: var(--bs-danger);
    background-color: var(--bs-danger);
    color: white;
}
.timeline {
    position: relative;
    padding: 0;
}
.timeline-item {
    position: relative;
    padding-left: 30px;
    margin-bottom: 20px;
}
.timeline-item:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--bs-danger);
}
.timeline-item:after {
    content: '';
    position: absolute;
    left: 5px;
    top: 12px;
    width: 2px;
    height: calc(100% + 8px);
    background: var(--bs-danger);
}
.timeline-item:last-child:after {
    display: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const protocolCards = document.querySelectorAll('.protocol-card');
    const startTimeInput = document.getElementById('startTime');
    const endTimeInput = document.getElementById('endTime');
    const form = document.getElementById('fastingForm');
    const timerDisplay = document.getElementById('timerDisplay');
    let selectedProtocol = { fast: 16, eat: 8 }; // Default to 16:8
    let timer;

    // Set default protocol
    protocolCards[0].classList.add('selected');

    // Protocol selection
    protocolCards.forEach(card => {
        card.addEventListener('click', function() {
            protocolCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            selectedProtocol = {
                fast: parseInt(this.dataset.fast),
                eat: parseInt(this.dataset.eat)
            };
            updateEndTime();
        });
    });

    // Set min datetime to now
    const now = new Date();
    startTimeInput.min = now.toISOString().slice(0, 16);
    startTimeInput.value = now.toISOString().slice(0, 16);

    // Update end time when start time changes
    startTimeInput.addEventListener('change', updateEndTime);

    function updateEndTime() {
        if (startTimeInput.value) {
            const startDate = new Date(startTimeInput.value);
            const endDate = new Date(startDate.getTime() + selectedProtocol.fast * 60 * 60 * 1000);
            endTimeInput.value = endDate.toISOString().slice(0, 16);
        }
    }

    // Initialize timer
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const startTime = new Date(startTimeInput.value).getTime();
        const endTime = new Date(endTimeInput.value).getTime();
        
        // Display times
        document.getElementById('displayStartTime').textContent = new Date(startTime).toLocaleString();
        document.getElementById('displayEndTime').textContent = new Date(endTime).toLocaleString();
        
        // Show timer display
        timerDisplay.style.display = 'block';
        
        // Start countdown
        if (timer) clearInterval(timer);
        updateTimer(startTime, endTime);
        timer = setInterval(() => updateTimer(startTime, endTime), 1000);
        
        // Scroll to timer
        timerDisplay.scrollIntoView({ behavior: 'smooth' });
    });

    function updateTimer(startTime, endTime) {
        const now = Date.now();
        const totalDuration = endTime - startTime;
        const timeElapsed = now - startTime;
        const timeRemaining = endTime - now;
        
        // Calculate progress
        const progress = Math.min(100, (timeElapsed / totalDuration) * 100);
        document.getElementById('progressBar').style.width = `${progress}%`;
        
        if (now >= endTime) {
            clearInterval(timer);
            document.getElementById('countdown').textContent = 'Fast Complete!';
            document.getElementById('currentPhase').textContent = 'Eating Window';
            return;
        }
        
        // Update countdown
        const hours = Math.floor(timeRemaining / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
        
        document.getElementById('countdown').textContent = 
            `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
