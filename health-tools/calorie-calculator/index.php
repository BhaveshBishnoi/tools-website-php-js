<?php include '../../includes/header.php'; ?>

<title>Calorie Calculator - Free Online Daily Caloric Needs Calculator</title>
<meta name="description" content="Find out your daily caloric needs online for free based on your activity level and goals. No registration required!">
<meta name="keywords" content="calorie calculator, online calorie tool, free caloric needs calculation, daily calorie intake">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Calorie Calculator",
  "description": "Find out your daily caloric needs online for free based on your activity level and goals.",
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
            <li class="breadcrumb-item active">Calorie Calculator</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Tool Introduction -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h1 class="text-center mb-4">Calorie Calculator</h1>
                    <div class="text-center mb-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-utensils fa-3x text-danger"></i>
                        </div>
                        <p class="lead">Calculate your daily caloric needs based on your activity level</p>
                    </div>

                    <div class="mb-4">
                        <h5>What is BMR and TDEE?</h5>
                        <p>Basal Metabolic Rate (BMR) is the number of calories your body burns at rest. Total Daily Energy Expenditure (TDEE) is your total daily calorie burn including physical activity.</p>
                    </div>

                    <div class="mb-4">
                        <h5>How to Use This Calculator</h5>
                        <ol class="mb-0">
                            <li>Enter your personal details (age, gender, weight, height)</li>
                            <li>Select your activity level</li>
                            <li>Click "Calculate" to see your daily calorie needs</li>
                            <li>Review your BMR and recommended calorie intake</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Calculator -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h2 class="h4 mb-4">Calculate Your Daily Calories</h2>
                    <form id="calorieForm" onsubmit="calculateCalories(event)">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" required min="15" max="120">
                            </div>
                            <div class="col-md-6 mb-3">
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
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="weight" required min="20" max="300">
                                    <select class="form-select" id="weightUnit" style="max-width: 100px;">
                                        <option value="kg">kg</option>
                                        <option value="lbs">lbs</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="height" class="form-label">Height</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="height" required min="1">
                                    <select class="form-select" id="heightUnit" style="max-width: 100px;">
                                        <option value="cm">cm</option>
                                        <option value="feet">feet</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="activity" class="form-label">Activity Level</label>
                            <select class="form-select" id="activity" required>
                                <option value="1.2">Sedentary (little or no exercise)</option>
                                <option value="1.375">Lightly active (light exercise 1-3 days/week)</option>
                                <option value="1.55">Moderately active (moderate exercise 3-5 days/week)</option>
                                <option value="1.725">Very active (hard exercise 6-7 days/week)</option>
                                <option value="1.9">Extra active (very hard exercise & physical job)</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger text-white w-100">Calculate Calories</button>
                    </form>

                    <div id="result" class="mt-4" style="display: none;">
                        <div class="alert alert-info">
                            <h4 class="alert-heading mb-2">Your Daily Calorie Needs</h4>
                            <p class="mb-2">Your BMR: <strong id="bmrValue">0</strong> calories/day</p>
                            <p class="mb-0">Maintenance Calories: <strong id="tdeeValue">0</strong> calories/day</p>
                        </div>
                        <div class="mt-3">
                            <h5>Weight Goals:</h5>
                            <ul class="list-unstyled">
                                <li>Weight Loss: <strong id="weightLoss">0</strong> calories/day</li>
                                <li>Weight Maintenance: <strong id="maintenance">0</strong> calories/day</li>
                                <li>Weight Gain: <strong id="weightGain">0</strong> calories/day</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h4 mb-4">Understanding Your Results</h2>

                    <div class="mb-4">
                        <h5>Activity Levels Explained</h5>
                        <ul class="mb-4">
                            <li><strong>Sedentary:</strong> Office job with little to no exercise</li>
                            <li><strong>Lightly Active:</strong> Light exercise or sports 1-3 days a week</li>
                            <li><strong>Moderately Active:</strong> Moderate exercise or sports 3-5 days a week</li>
                            <li><strong>Very Active:</strong> Hard exercise or sports 6-7 days a week</li>
                            <li><strong>Extra Active:</strong> Very hard exercise/sports & physical job or training twice per day</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h5>Weight Goals</h5>
                        <ul class="mb-0">
                            <li><strong>Weight Loss:</strong> 20% calorie deficit from maintenance</li>
                            <li><strong>Maintenance:</strong> Maintain current weight</li>
                            <li><strong>Weight Gain:</strong> 20% calorie surplus from maintenance</li>
                        </ul>
                    </div>

                    <div>
                        <h5>Important Notes</h5>
                        <ul class="mb-0">
                            <li>These calculations provide estimates and may vary by individual</li>
                            <li>Consult a healthcare provider before starting any diet program</li>
                            <li>For weight loss, never go below 1200 calories for women or 1500 for men</li>
                            <li>Consider tracking your food intake to meet your calorie goals</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculateCalories(event) {
    event.preventDefault();
    
    // Get form values
    const age = parseInt(document.getElementById('age').value);
    const gender = document.querySelector('input[name="gender"]:checked').value;
    let weight = parseFloat(document.getElementById('weight').value);
    let height = parseFloat(document.getElementById('height').value);
    const activity = parseFloat(document.getElementById('activity').value);
    const weightUnit = document.getElementById('weightUnit').value;
    const heightUnit = document.getElementById('heightUnit').value;

    // Convert measurements if needed
    if (weightUnit === 'lbs') {
        weight = weight * 0.453592; // Convert to kg
    }
    if (heightUnit === 'feet') {
        height = height * 30.48; // Convert to cm
    }

    // Calculate BMR using Mifflin-St Jeor Equation
    let bmr;
    if (gender === 'male') {
        bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
    } else {
        bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
    }

    // Calculate TDEE
    const tdee = bmr * activity;

    // Calculate different calorie goals
    const weightLoss = Math.round(tdee * 0.8);
    const maintenance = Math.round(tdee);
    const weightGain = Math.round(tdee * 1.2);

    // Display results
    document.getElementById('bmrValue').textContent = Math.round(bmr);
    document.getElementById('tdeeValue').textContent = maintenance;
    document.getElementById('weightLoss').textContent = weightLoss;
    document.getElementById('maintenance').textContent = maintenance;
    document.getElementById('weightGain').textContent = weightGain;
    document.getElementById('result').style.display = 'block';
}
</script>

<?php include '../../includes/footer.php'; ?>
