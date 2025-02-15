<?php include '../../includes/header.php'; ?>

<title>Body Fat Calculator - Free Online Body Fat Percentage Calculator</title>
<meta name="description" content="Estimate your body fat percentage online for free using various measurement methods. No registration required!">
<meta name="keywords" content="body fat calculator, online body fat tool, free body fat calculation, body fat percentage">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Body Fat Calculator",
  "description": "Estimate your body fat percentage online for free using various measurement methods.",
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
            <li class="breadcrumb-item active">Body Fat Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-percentage fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Body Fat Percentage Calculator</h1>
                        <p class="text-muted">Estimate your body fat percentage using the U.S. Navy Method</p>
                    </div>

                    <form id="bodyFatForm">
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Height</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="height" required min="1" step="0.1">
                                    <select class="form-select" id="heightUnit" style="max-width: 100px;">
                                        <option value="cm">cm</option>
                                        <option value="inches">inches</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Weight</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="weight" required min="1" step="0.1">
                                    <select class="form-select" id="weightUnit" style="max-width: 100px;">
                                        <option value="kg">kg</option>
                                        <option value="lbs">lbs</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Waist</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="waist" required min="1" step="0.1">
                                    <select class="form-select" id="measurementUnit" style="max-width: 100px;">
                                        <option value="cm">cm</option>
                                        <option value="inches">inches</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Neck</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="neck" required min="1" step="0.1">
                                    <span class="input-group-text measurement-unit">cm</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" id="hipMeasurement" style="display: none;">
                            <label class="form-label">Hip (women only)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="hip" min="1" step="0.1">
                                <span class="input-group-text measurement-unit">cm</span>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn text-white btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Body Fat
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <div class="alert alert-info">
                            <h4 class="alert-heading mb-3">Your Body Fat Estimate</h4>
                            <p class="display-4 mb-2" id="bodyFatPercentage">0%</p>
                            <p class="mb-0">Category: <strong id="bodyFatCategory">-</strong></p>
                        </div>

                        <!-- Body Fat Chart -->
                        <div class="mt-4">
                            <h5>Body Fat Categories</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="categoryTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Category</th>
                                            <th>Men</th>
                                            <th>Women</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Essential Fat</td>
                                            <td>2-5%</td>
                                            <td>10-13%</td>
                                        </tr>
                                        <tr>
                                            <td>Athletes</td>
                                            <td>6-13%</td>
                                            <td>14-20%</td>
                                        </tr>
                                        <tr>
                                            <td>Fitness</td>
                                            <td>14-17%</td>
                                            <td>21-24%</td>
                                        </tr>
                                        <tr>
                                            <td>Average</td>
                                            <td>18-24%</td>
                                            <td>25-31%</td>
                                        </tr>
                                        <tr>
                                            <td>Obese</td>
                                            <td>25%+</td>
                                            <td>32%+</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Take Measurements</h2>
                    <div class="mb-4">
                        <h6>Waist Measurement</h6>
                        <ul class="mb-3">
                            <li>Measure at the narrowest part of your waist</li>
                            <li>Usually just above your belly button</li>
                            <li>Keep the tape parallel to the floor</li>
                            <li>Measure at the end of a normal exhale</li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h6>Neck Measurement</h6>
                        <ul class="mb-3">
                            <li>Measure just below your larynx (Adam's apple)</li>
                            <li>Keep the tape level and snug</li>
                            <li>Look straight ahead during measurement</li>
                        </ul>
                    </div>
                    <div>
                        <h6>Hip Measurement (Women)</h6>
                        <ul class="mb-0">
                            <li>Measure at the widest part of your hips</li>
                            <li>Usually around the buttocks</li>
                            <li>Keep the tape parallel to the floor</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Important Notes</h2>
                    <ul class="mb-0">
                        <li class="mb-2">This calculator uses the U.S. Navy Method formula</li>
                        <li class="mb-2">Results are estimates and may vary from actual body fat percentage</li>
                        <li class="mb-2">More accurate methods include hydrostatic weighing and DEXA scans</li>
                        <li class="mb-2">Body fat percentage is just one measure of health</li>
                        <li>Consult a healthcare provider for a complete health assessment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bodyFatForm');
    const results = document.getElementById('results');
    const hipMeasurement = document.getElementById('hipMeasurement');
    const measurementUnitSpans = document.querySelectorAll('.measurement-unit');
    
    // Show/hide hip measurement based on gender
    document.querySelectorAll('input[name="gender"]').forEach(radio => {
        radio.addEventListener('change', function() {
            hipMeasurement.style.display = this.value === 'female' ? 'block' : 'none';
            if (this.value === 'male') {
                document.getElementById('hip').removeAttribute('required');
            } else {
                document.getElementById('hip').setAttribute('required', 'required');
            }
        });
    });

    // Update measurement units
    document.getElementById('measurementUnit').addEventListener('change', function() {
        measurementUnitSpans.forEach(span => {
            span.textContent = this.value;
        });
    });
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const gender = document.querySelector('input[name="gender"]:checked').value;
        let height = parseFloat(document.getElementById('height').value);
        let weight = parseFloat(document.getElementById('weight').value);
        let waist = parseFloat(document.getElementById('waist').value);
        let neck = parseFloat(document.getElementById('neck').value);
        let hip = gender === 'female' ? parseFloat(document.getElementById('hip').value) : 0;

        // Convert measurements if needed
        const heightUnit = document.getElementById('heightUnit').value;
        const weightUnit = document.getElementById('weightUnit').value;
        const measurementUnit = document.getElementById('measurementUnit').value;

        if (heightUnit === 'inches') {
            height *= 2.54; // Convert to cm
        }
        if (weightUnit === 'lbs') {
            weight *= 0.453592; // Convert to kg
        }
        if (measurementUnit === 'inches') {
            waist *= 2.54;
            neck *= 2.54;
            if (gender === 'female') {
                hip *= 2.54;
            }
        }

        // Calculate body fat percentage using U.S. Navy Method
        let bodyFat;
        if (gender === 'male') {
            bodyFat = 495 / (1.0324 - 0.19077 * Math.log10(waist - neck) + 0.15456 * Math.log10(height)) - 450;
        } else {
            bodyFat = 495 / (1.29579 - 0.35004 * Math.log10(waist + hip - neck) + 0.22100 * Math.log10(height)) - 450;
        }

        // Determine category
        let category;
        if (gender === 'male') {
            if (bodyFat < 6) category = 'Essential Fat';
            else if (bodyFat < 14) category = 'Athletes';
            else if (bodyFat < 18) category = 'Fitness';
            else if (bodyFat < 25) category = 'Average';
            else category = 'Obese';
        } else {
            if (bodyFat < 14) category = 'Essential Fat';
            else if (bodyFat < 21) category = 'Athletes';
            else if (bodyFat < 25) category = 'Fitness';
            else if (bodyFat < 32) category = 'Average';
            else category = 'Obese';
        }

        // Display results
        document.getElementById('bodyFatPercentage').textContent = bodyFat.toFixed(1) + '%';
        document.getElementById('bodyFatCategory').textContent = category;
        
        results.style.display = 'block';
        results.scrollIntoView({ behavior: 'smooth' });
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
