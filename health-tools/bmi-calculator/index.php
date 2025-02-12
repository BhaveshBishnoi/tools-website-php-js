<?php include '../../includes/header.php'; ?>

<div class="container py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/tools/health-tools/">Health Tools</a></li>
            <li class="breadcrumb-item active">BMI Calculator</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Tool Introduction -->
            <div class="card custom-card mb-4">
                <div class="card-body">
                    <h1 class="text-center mb-4">BMI Calculator</h1>
                    <div class="text-center mb-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-calculator fa-3x text-danger"></i>
                        </div>
                        <p class="lead">Calculate your Body Mass Index (BMI) to assess if you're at a healthy weight</p>
                    </div>

                    <div class="mb-4">
                        <h5>What is BMI?</h5>
                        <p>Body Mass Index (BMI) is a simple measure that uses your height and weight to work out if your weight is healthy. It's used by healthcare professionals as a screening tool to identify potential weight problems in adults.</p>
                    </div>

                    <div class="mb-4">
                        <h5>How to Use This Calculator</h5>
                        <ol class="mb-0">
                            <li>Enter your height (in centimeters or feet)</li>
                            <li>Enter your weight (in kilograms or pounds)</li>
                            <li>Click "Calculate BMI" to see your results</li>
                            <li>Review your BMI category and recommendations</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Calculator -->
            <div class="card custom-card mb-4">
                <div class="card-body p-4">
                    <h2 class="h4 mb-4">Calculate Your BMI</h2>
                    <form id="bmiForm" onsubmit="calculateBMI(event)">
                        <div class="mb-3">
                            <label for="height" class="form-label">Height</label>
                            <div class="input-group">
                                <input type="number" class="form-control custom-input" id="height" step="0.01" required min="1">
                                <select class="form-select custom-select" id="heightUnit">
                                    <option value="cm">cm</option>
                                    <option value="feet">feet</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="weight" class="form-label">Weight</label>
                            <div class="input-group">
                                <input type="number" class="form-control custom-input" id="weight" step="0.01" required min="1">
                                <select class="form-select custom-select" id="weightUnit">
                                    <option value="kg">kg</option>
                                    <option value="lbs">lbs</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Calculate BMI</button>
                    </form>

                    <div id="result" class="mt-4" style="display: none;">
                        <div class="alert alert-primary">
                            <h4 class="alert-heading mb-2">Your BMI Result</h4>
                            <p class="mb-2">Your BMI: <strong id="bmiValue">0</strong></p>
                            <p class="mb-0">Category: <strong id="bmiCategory">Normal</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BMI Information -->
            <div class="card custom-card">
                <div class="card-body">
                    <h2 class="h4 mb-4">Understanding BMI Categories</h2>
                    
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered custom-table">
                            <thead class="table-light">
                                <tr>
                                    <th>BMI Range</th>
                                    <th>Category</th>
                                    <th>Health Risk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Below 18.5</td>
                                    <td>Underweight</td>
                                    <td>Higher risk of nutritional deficiencies and osteoporosis</td>
                                </tr>
                                <tr>
                                    <td>18.5 - 24.9</td>
                                    <td>Normal Weight</td>
                                    <td>Lower risk of health problems</td>
                                </tr>
                                <tr>
                                    <td>25.0 - 29.9</td>
                                    <td>Overweight</td>
                                    <td>Increased risk of heart disease and diabetes</td>
                                </tr>
                                <tr>
                                    <td>30.0 or higher</td>
                                    <td>Obesity</td>
                                    <td>High risk of heart disease, diabetes, and other health issues</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-4">
                        <h5>BMI Limitations</h5>
                        <p>While BMI is a useful screening tool, it has some limitations:</p>
                        <ul>
                            <li>It may overestimate body fat in athletes and muscular individuals</li>
                            <li>It may underestimate body fat in older persons and those who have lost muscle mass</li>
                            <li>It doesn't account for factors like age, gender, ethnicity, and muscle mass</li>
                            <li>It's not suitable for pregnant women or children</li>
                        </ul>
                    </div>

                    <div>
                        <h5>Next Steps</h5>
                        <p>If you're concerned about your BMI result, consider:</p>
                        <ul>
                            <li>Consulting with a healthcare provider</li>
                            <li>Using our Calorie Calculator to determine your daily caloric needs</li>
                            <li>Checking our Ideal Weight Calculator for a more comprehensive assessment</li>
                            <li>Maintaining a balanced diet and regular exercise routine</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculateBMI(event) {
    event.preventDefault();
    
    let height = parseFloat(document.getElementById('height').value);
    let weight = parseFloat(document.getElementById('weight').value);
    let heightUnit = document.getElementById('heightUnit').value;
    let weightUnit = document.getElementById('weightUnit').value;

    if (heightUnit === 'feet') {
        height *= 30.48;
    }
    if (weightUnit === 'lbs') {
        weight *= 0.453592;
    }

    height /= 100;
    let bmi = weight / (height * height);
    let category = bmi < 18.5 ? 'Underweight' : bmi < 25 ? 'Normal weight' : bmi < 30 ? 'Overweight' : 'Obesity';

    document.getElementById('bmiValue').textContent = bmi.toFixed(1);
    document.getElementById('bmiCategory').textContent = category;
    document.getElementById('result').style.display = 'block';
}
</script>

<?php include '../../includes/footer.php'; ?>
