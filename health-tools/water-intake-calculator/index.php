<?php include '../../includes/header.php'; ?>

<title>Water Intake Calculator - Free Online Daily Water Needs Calculator</title>
<meta name="description" content="Calculate your daily water needs online for free based on weight and activity level. No registration required!">
<meta name="keywords" content="water intake calculator, online water intake tool, free water needs calculation, daily water intake">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Water Intake Calculator",
  "description": "Calculate your daily water needs online for free based on weight and activity level.",
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
            <li class="breadcrumb-item active">Water Intake Calculator</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Tool Introduction -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h1 class="text-center mb-4">Water Intake Calculator</h1>
                    <div class="text-center mb-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-tint fa-3x text-danger"></i>
                        </div>
                        <p class="lead">Calculate your recommended daily water intake based on your weight and activity level</p>
                    </div>

                    <div class="mb-4">
                        <h5>Why is Water Important?</h5>
                        <p>Water is essential for life and proper bodily functions. It helps regulate body temperature, transport nutrients, remove waste, and maintain organ functions. Proper hydration can improve energy levels, brain function, and physical performance.</p>
                    </div>

                    <div class="mb-4">
                        <h5>How to Use This Calculator</h5>
                        <ol class="mb-0">
                            <li>Enter your weight</li>
                            <li>Select your activity level</li>
                            <li>Click "Calculate" to see your recommended water intake</li>
                            <li>Adjust intake based on climate and personal needs</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Calculator -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h2 class="h4 mb-4">Calculate Your Water Intake</h2>
                    <form id="waterForm" onsubmit="calculateWater(event)">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="weight" required min="20" max="300">
                                <select class="form-select" id="weightUnit" style="max-width: 100px;">
                                    <option value="kg">kg</option>
                                    <option value="lbs">lbs</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="activity" class="form-label">Activity Level</label>
                            <select class="form-select" id="activity" required>
                                <option value="30">Sedentary (little or no exercise)</option>
                                <option value="35">Light activity (light exercise/sports 1-3 days/week)</option>
                                <option value="40">Moderate activity (moderate exercise/sports 3-5 days/week)</option>
                                <option value="45">Very active (hard exercise/sports 6-7 days/week)</option>
                                <option value="50">Extra active (very hard exercise & physical job)</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger text-white w-100">Calculate Water Intake</button>
                    </form>

                    <div id="result" class="mt-4" style="display: none;">
                        <div class="alert alert-info">
                            <h4 class="alert-heading mb-2">Your Daily Water Needs</h4>
                            <p class="mb-2">Recommended intake: <strong id="waterML">0</strong> ml (<strong id="waterL">0</strong> liters)</p>
                            <p class="mb-0">In cups: approximately <strong id="waterCups">0</strong> cups</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h4 mb-4">Understanding Hydration</h2>

                    <div class="mb-4">
                        <h5>Signs of Dehydration</h5>
                        <ul class="mb-4">
                            <li>Thirst and dry mouth</li>
                            <li>Dark yellow urine</li>
                            <li>Fatigue and dizziness</li>
                            <li>Headache</li>
                            <li>Decreased urine output</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h5>When to Drink More Water</h5>
                        <ul class="mb-4">
                            <li>During hot weather</li>
                            <li>When exercising</li>
                            <li>If you're ill with fever</li>
                            <li>During pregnancy or breastfeeding</li>
                            <li>When consuming alcohol</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h5>Tips for Staying Hydrated</h5>
                        <ul class="mb-0">
                            <li>Carry a reusable water bottle</li>
                            <li>Set reminders to drink water</li>
                            <li>Drink a glass of water with each meal</li>
                            <li>Eat water-rich foods (fruits and vegetables)</li>
                            <li>Monitor your urine color (should be light yellow)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculateWater(event) {
    event.preventDefault();
    
    let weight = parseFloat(document.getElementById('weight').value);
    const weightUnit = document.getElementById('weightUnit').value;
    const activityFactor = parseFloat(document.getElementById('activity').value);

    // Convert to kg if needed
    if (weightUnit === 'lbs') {
        weight = weight * 0.453592;
    }

    // Calculate water needs (ml)
    const waterML = Math.round(weight * activityFactor);
    const waterL = (waterML / 1000).toFixed(1);
    const waterCups = Math.round(waterML / 237); // 1 cup = 237 ml

    // Display results
    document.getElementById('waterML').textContent = waterML;
    document.getElementById('waterL').textContent = waterL;
    document.getElementById('waterCups').textContent = waterCups;
    document.getElementById('result').style.display = 'block';
}
</script>

<?php include '../../includes/footer.php'; ?>
