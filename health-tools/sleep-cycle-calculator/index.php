<?php include '../../includes/header.php'; ?>

<title>Sleep Cycle Calculator - Free Online Optimal Sleep Times Calculator</title>
<meta name="description" content="Calculate optimal bedtime and wake times online for free based on sleep cycles. No registration required!">
<meta name="keywords" content="sleep cycle calculator, online sleep tool, free sleep calculation, optimal sleep times">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Sleep Cycle Calculator",
  "description": "Calculate optimal bedtime and wake times online for free based on sleep cycles.",
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
            <li class="breadcrumb-item active">Heart Rate Calculator</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Tool Introduction -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h1 class="text-center mb-4">Sleep Cycle Calculator</h1>
                    <div class="text-center mb-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-moon fa-3x text-danger"></i>
                        </div>
                        <p class="lead">Find the ideal bedtime based on your desired wake-up time and sleep cycles</p>
                    </div>

                    <div class="mb-4">
                        <h5>What are Sleep Cycles?</h5>
                        <p>Sleep cycles typically last about 90 minutes, during which your body moves through different stages of sleep. Waking up at the end of a cycle, rather than in the middle, helps you feel more refreshed.</p>
                    </div>

                    <div class="mb-4">
                        <h5>How to Use This Calculator</h5>
                        <ol class="mb-0">
                            <li>Enter your desired wake-up time</li>
                            <li>Click "Calculate" to see recommended bedtimes</li>
                            <li>Choose a bedtime that works with your schedule</li>
                            <li>Allow about 15 minutes to fall asleep</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Calculator -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h2 class="h4 mb-4">Calculate Your Sleep Schedule</h2>
                    <form id="sleepForm" onsubmit="calculateSleep(event)">
                        <div class="mb-4">
                            <label for="wakeTime" class="form-label">Desired Wake-up Time</label>
                            <input type="time" class="form-control" id="wakeTime" required>
                        </div>

                        <button type="submit" class="btn text-white w-100 btn-danger">Calculate Bedtimes</button>
                    </form>

                    <div id="result" class="mt-4" style="display: none;">
                        <div class="alert alert-info">
                            <h4 class="alert-heading mb-3">Recommended Bedtimes</h4>
                            <p class="mb-2">For optimal rest, try to fall asleep at one of these times:</p>
                            <div id="sleepTimes" class="d-flex flex-wrap gap-2">
                                <!-- Sleep times will be inserted here -->
                            </div>
                        </div>
                        <p class="text-muted small mt-2">* Times include 15 minutes to fall asleep</p>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h4 mb-4">Understanding Sleep Cycles</h2>

                    <div class="mb-4">
                        <h5>Sleep Cycle Stages</h5>
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Stage</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Stage 1</td>
                                        <td>Light sleep, easily awakened</td>
                                        <td>5-10 minutes</td>
                                    </tr>
                                    <tr>
                                        <td>Stage 2</td>
                                        <td>Deeper sleep, body temperature drops</td>
                                        <td>20-30 minutes</td>
                                    </tr>
                                    <tr>
                                        <td>Stage 3</td>
                                        <td>Deep sleep, body repairs and regenerates</td>
                                        <td>20-40 minutes</td>
                                    </tr>
                                    <tr>
                                        <td>REM</td>
                                        <td>Dream sleep, brain is active</td>
                                        <td>10-20 minutes</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Tips for Better Sleep</h5>
                        <ul class="mb-4">
                            <li>Stick to a consistent sleep schedule</li>
                            <li>Create a relaxing bedtime routine</li>
                            <li>Keep your bedroom cool, dark, and quiet</li>
                            <li>Avoid screens before bedtime</li>
                            <li>Limit caffeine and alcohol intake</li>
                        </ul>
                    </div>

                    <div>
                        <h5>Signs of Poor Sleep Quality</h5>
                        <ul class="mb-0">
                            <li>Difficulty waking up</li>
                            <li>Feeling tired during the day</li>
                            <li>Trouble concentrating</li>
                            <li>Irritability</li>
                            <li>Requiring caffeine to function</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculateSleep(event) {
    event.preventDefault();
    
    const wakeTime = document.getElementById('wakeTime').value;
    const [wakeHours, wakeMinutes] = wakeTime.split(':').map(Number);
    
    // Calculate bedtimes for 4-6 sleep cycles (6-9 hours)
    const sleepCycles = [6, 5, 4]; // Number of cycles
    const cycleLength = 90; // minutes
    const fallAsleepTime = 15; // minutes to fall asleep

    const sleepTimes = sleepCycles.map(cycles => {
        const totalSleepMinutes = (cycles * cycleLength) + fallAsleepTime;
        
        let bedtimeMinutes = wakeMinutes - totalSleepMinutes;
        let bedtimeHours = wakeHours;
        
        while (bedtimeMinutes < 0) {
            bedtimeMinutes += 60;
            bedtimeHours--;
        }
        while (bedtimeHours < 0) {
            bedtimeHours += 24;
        }
        
        const formattedHours = bedtimeHours.toString().padStart(2, '0');
        const formattedMinutes = bedtimeMinutes.toString().padStart(2, '0');
        
        return {
            time: `${formattedHours}:${formattedMinutes}`,
            cycles: cycles,
            hours: Math.round((cycles * cycleLength) / 60)
        };
    });

    // Display results
    const sleepTimesContainer = document.getElementById('sleepTimes');
    sleepTimesContainer.innerHTML = sleepTimes.map(time => `
        <div class="bg-light rounded p-2 text-center">
            <strong class="d-block">${time.time}</strong>
            <small class="text-muted">${time.hours} hours</small>
        </div>
    `).join('');
    
    document.getElementById('result').style.display = 'block';
}
</script>

<?php include '../../includes/footer.php'; ?>
