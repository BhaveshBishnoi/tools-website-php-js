<?php include '../../includes/header.php'; ?>

<title>Heart Rate Calculator - Free Online Target Heart Rate Zones Calculator</title>
<meta name="description" content="Calculate your target heart rate zones online for free for optimal exercise intensity. No registration required!">
<meta name="keywords" content="heart rate calculator, online heart rate tool, free heart rate calculation, target heart rate zones">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Heart Rate Calculator",
  "description": "Calculate your target heart rate zones online for free for optimal exercise intensity.",
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
            <li class="breadcrumb-item"><a href="/tools/tools/health-tools/">Health Tools</a></li>
            <li class="breadcrumb-item active">Heart Rate Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-heartbeat fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Heart Rate Zone Calculator</h1>
                        <p class="text-muted">Calculate your maximum heart rate and training zones</p>
                    </div>

                    <form id="heartRateForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Age</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="age" required min="1" max="120">
                                    <span class="input-group-text">years</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Resting Heart Rate (Optional)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="restingHR" min="40" max="120">
                                    <span class="input-group-text">bpm</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Heart Rate Zones
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Heart Rate Summary</h2>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Maximum Heart Rate</h6>
                                        <p class="card-text h4 mb-0 text-danger" id="maxHR">0 bpm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Heart Rate Reserve</h6>
                                        <p class="card-text h4 mb-0 text-info" id="hrReserve">0 bpm</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Heart Rate Zones -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Zone</th>
                                        <th>Intensity</th>
                                        <th>Heart Rate Range</th>
                                        <th>Training Benefit</th>
                                    </tr>
                                </thead>
                                <tbody id="zonesTable"></tbody>
                            </table>
                        </div>

                        <!-- Zone Chart -->
                        <div class="mt-4">
                            <h2 class="h5 mb-3">Heart Rate Zones Visualization</h2>
                            <canvas id="zoneChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the Heart Rate Calculator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter your age</li>
                        <li class="mb-2">Input your resting heart rate (optional)</li>
                        <li class="mb-2">Click "Calculate" to see your heart rate zones</li>
                        <li>Use the zones to plan your workout intensity</li>
                    </ol>
                </div>
            </div>

            <!-- Understanding Heart Rate Zones -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Understanding Heart Rate Training Zones</h2>
                    <div class="mb-4">
                        <h6>Zone 1: Very Light (50-60%)</h6>
                        <p class="small text-muted">Warm up and recovery. Improves overall health and helps with recovery.</p>
                    </div>
                    <div class="mb-4">
                        <h6>Zone 2: Light (60-70%)</h6>
                        <p class="small text-muted">Improves basic endurance and fat burning. Good for long workouts.</p>
                    </div>
                    <div class="mb-4">
                        <h6>Zone 3: Moderate (70-80%)</h6>
                        <p class="small text-muted">Improves aerobic fitness. Increases the body's ability to transport oxygen.</p>
                    </div>
                    <div class="mb-4">
                        <h6>Zone 4: Hard (80-90%)</h6>
                        <p class="small text-muted">Improves anaerobic fitness and speed. Increases lactate threshold.</p>
                    </div>
                    <div>
                        <h6>Zone 5: Maximum (90-100%)</h6>
                        <p class="small text-muted mb-0">Increases maximum performance capacity. Only for short intervals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('heartRateForm');
    const results = document.getElementById('results');
    let zoneChart = null;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const age = parseInt(document.getElementById('age').value);
        const restingHR = parseInt(document.getElementById('restingHR').value) || 60;
        
        // Calculate maximum heart rate (using Tanaka formula)
        const maxHR = 208 - (0.7 * age);
        const hrReserve = maxHR - restingHR;
        
        // Define zones
        const zones = [
            {
                name: 'Zone 1',
                intensity: 'Very Light (50-60%)',
                min: Math.round(restingHR + (hrReserve * 0.5)),
                max: Math.round(restingHR + (hrReserve * 0.6)),
                benefit: 'Warm up and recovery'
            },
            {
                name: 'Zone 2',
                intensity: 'Light (60-70%)',
                min: Math.round(restingHR + (hrReserve * 0.6)),
                max: Math.round(restingHR + (hrReserve * 0.7)),
                benefit: 'Fat burning and basic endurance'
            },
            {
                name: 'Zone 3',
                intensity: 'Moderate (70-80%)',
                min: Math.round(restingHR + (hrReserve * 0.7)),
                max: Math.round(restingHR + (hrReserve * 0.8)),
                benefit: 'Aerobic fitness and endurance'
            },
            {
                name: 'Zone 4',
                intensity: 'Hard (80-90%)',
                min: Math.round(restingHR + (hrReserve * 0.8)),
                max: Math.round(restingHR + (hrReserve * 0.9)),
                benefit: 'Anaerobic fitness and speed'
            },
            {
                name: 'Zone 5',
                intensity: 'Maximum (90-100%)',
                min: Math.round(restingHR + (hrReserve * 0.9)),
                max: Math.round(maxHR),
                benefit: 'Maximum performance'
            }
        ];
        
        // Update results
        document.getElementById('maxHR').textContent = Math.round(maxHR) + ' bpm';
        document.getElementById('hrReserve').textContent = Math.round(hrReserve) + ' bpm';
        
        // Update zones table
        const tableBody = document.getElementById('zonesTable');
        tableBody.innerHTML = '';
        
        zones.forEach(zone => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${zone.name}</td>
                <td>${zone.intensity}</td>
                <td>${zone.min} - ${zone.max} bpm</td>
                <td>${zone.benefit}</td>
            `;
            tableBody.appendChild(tr);
        });
        
        // Update chart
        if (zoneChart) {
            zoneChart.destroy();
        }
        
        const ctx = document.getElementById('zoneChart').getContext('2d');
        zoneChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: zones.map(zone => zone.name),
                datasets: [{
                    label: 'Heart Rate Range (bpm)',
                    data: zones.map(zone => ({
                        min: zone.min,
                        max: zone.max
                    })),
                    backgroundColor: [
                        'rgba(40, 167, 69, 0.5)',
                        'rgba(23, 162, 184, 0.5)',
                        'rgba(255, 193, 7, 0.5)',
                        'rgba(253, 126, 20, 0.5)',
                        'rgba(220, 53, 69, 0.5)'
                    ],
                    borderColor: [
                        'rgb(40, 167, 69)',
                        'rgb(23, 162, 184)',
                        'rgb(255, 193, 7)',
                        'rgb(253, 126, 20)',
                        'rgb(220, 53, 69)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Heart Rate Training Zones'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Heart Rate (bpm)'
                        }
                    }
                }
            }
        });
        
        results.style.display = 'block';
        results.scrollIntoView({ behavior: 'smooth' });
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
