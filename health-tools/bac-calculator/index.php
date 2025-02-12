<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/health-tools/">Health Tools</a></li>
            <li class="breadcrumb-item active">BAC Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-wine-glass fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Blood Alcohol Content (BAC) Calculator</h1>
                        <p class="text-muted">Estimate your blood alcohol content based on drinks consumed</p>
                    </div>

                    <form id="bacForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <label class="form-label">Weight</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="weight" min="1" step="1" required>
                                    <select class="form-select" id="weightUnit" style="max-width: 100px;">
                                        <option value="lbs">lbs</option>
                                        <option value="kg">kg</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="drinksContainer">
                            <h5 class="mb-3">Drinks Consumed</h5>
                            <div class="drink-entry mb-3">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <select class="form-select drink-type">
                                            <option value="">Select drink...</option>
                                            <option value="beer">Beer (12 oz, 5%)</option>
                                            <option value="wine">Wine (5 oz, 12%)</option>
                                            <option value="shot">Shot (1.5 oz, 40%)</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 custom-fields" style="display: none;">
                                        <div class="input-group">
                                            <input type="number" class="form-control drink-volume" placeholder="oz" min="0" step="0.1">
                                            <span class="input-group-text">oz</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 custom-fields" style="display: none;">
                                        <div class="input-group">
                                            <input type="number" class="form-control drink-alcohol" placeholder="%" min="0" max="100" step="0.1">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control drink-quantity" placeholder="Quantity" min="1" value="1">
                                            <button type="button" class="btn btn-outline-danger remove-drink">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <button type="button" id="addDrink" class="btn btn-outline-danger">
                                <i class="fas fa-plus me-2"></i>Add Another Drink
                            </button>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Hours Since First Drink</label>
                            <input type="number" class="form-control" id="hours" min="0" step="0.5" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate BAC
                            </button>
                        </div>
                    </form>

                    <div id="results" class="mt-4" style="display: none;">
                        <div class="alert alert-info">
                            <h4 class="alert-heading mb-3">Your Estimated BAC</h4>
                            <p class="display-4 mb-2" id="bacLevel">0.00%</p>
                            <p class="mb-0" id="bacCategory"></p>
                        </div>

                        <div class="progress mb-3" style="height: 25px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%">Safe</div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 20%">Impaired</div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%">Dangerous</div>
                        </div>

                        <div id="warningMessage" class="alert alert-warning mt-3" style="display: none;">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Warning:</strong> Your estimated BAC is above the legal driving limit (0.08%).
                            Do not operate any vehicles or machinery.
                        </div>
                    </div>
                </div>
            </div>

            <!-- BAC Effects -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">BAC Levels and Effects</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>BAC Level</th>
                                    <th>Effects</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0.02-0.03%</td>
                                    <td>Slight mood changes, relaxation, minor judgment impairment</td>
                                </tr>
                                <tr>
                                    <td>0.04-0.06%</td>
                                    <td>Lowered inhibitions, minor memory impairment, mood intensification</td>
                                </tr>
                                <tr>
                                    <td>0.07-0.09%</td>
                                    <td>Slight speech impairment, loss of balance, vision problems</td>
                                </tr>
                                <tr>
                                    <td>0.10-0.12%</td>
                                    <td>Significant impairment of motor coordination and judgment</td>
                                </tr>
                                <tr>
                                    <td>0.13-0.15%</td>
                                    <td>Major motor impairment, blackouts, anxiety and restlessness</td>
                                </tr>
                                <tr>
                                    <td>0.16-0.20%</td>
                                    <td>Nausea, dysphoria, disorientation, need for assistance walking</td>
                                </tr>
                                <tr>
                                    <td>0.25%+</td>
                                    <td>Severe mental and physical impairment, risk of alcohol poisoning</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Important Notes</h2>
                    <ul class="mb-0">
                        <li class="mb-2">This calculator provides only an estimate of blood alcohol content</li>
                        <li class="mb-2">Actual BAC can vary based on many factors not included in this calculation</li>
                        <li class="mb-2">Never drink and drive, regardless of estimated BAC</li>
                        <li class="mb-2">The legal driving limit in most states is 0.08%</li>
                        <li>If you're concerned about your drinking, please seek professional help</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bacForm');
    const drinksContainer = document.getElementById('drinksContainer');
    const addDrinkBtn = document.getElementById('addDrink');
    const results = document.getElementById('results');
    
    // Standard drink values
    const standardDrinks = {
        beer: { volume: 12, alcohol: 5 },
        wine: { volume: 5, alcohol: 12 },
        shot: { volume: 1.5, alcohol: 40 }
    };

    // Add drink entry
    addDrinkBtn.addEventListener('click', function() {
        const drinkEntry = document.querySelector('.drink-entry').cloneNode(true);
        drinkEntry.querySelector('.drink-type').value = '';
        drinkEntry.querySelector('.drink-quantity').value = '1';
        setupDrinkEntry(drinkEntry);
        drinksContainer.appendChild(drinkEntry);
    });

    // Setup drink entry events
    function setupDrinkEntry(entry) {
        const typeSelect = entry.querySelector('.drink-type');
        const customFields = entry.querySelectorAll('.custom-fields');
        const removeBtn = entry.querySelector('.remove-drink');

        typeSelect.addEventListener('change', function() {
            customFields.forEach(field => {
                field.style.display = this.value === 'custom' ? 'block' : 'none';
            });
        });

        removeBtn.addEventListener('click', function() {
            if (document.querySelectorAll('.drink-entry').length > 1) {
                entry.remove();
            }
        });
    }

    // Setup initial drink entry
    setupDrinkEntry(document.querySelector('.drink-entry'));

    // Calculate BAC
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const gender = document.querySelector('input[name="gender"]:checked').value;
        let weight = parseFloat(document.getElementById('weight').value);
        const weightUnit = document.getElementById('weightUnit').value;
        const hours = parseFloat(document.getElementById('hours').value);

        // Convert weight to pounds if needed
        if (weightUnit === 'kg') {
            weight = weight * 2.20462;
        }

        // Calculate total alcohol content
        let totalAlcohol = 0;
        document.querySelectorAll('.drink-entry').forEach(entry => {
            const type = entry.querySelector('.drink-type').value;
            const quantity = parseFloat(entry.querySelector('.drink-quantity').value) || 0;

            let volume, alcoholPercent;
            if (type === 'custom') {
                volume = parseFloat(entry.querySelector('.drink-volume').value) || 0;
                alcoholPercent = parseFloat(entry.querySelector('.drink-alcohol').value) || 0;
            } else if (type) {
                volume = standardDrinks[type].volume;
                alcoholPercent = standardDrinks[type].alcohol;
            } else {
                return;
            }

            totalAlcohol += (volume * (alcoholPercent / 100) * quantity);
        });

        // Calculate BAC
        // BAC = (alcohol consumed in grams * 5.14) / (weight in pounds * gender constant) - (0.015 * hours)
        const genderConstant = gender === 'male' ? 0.73 : 0.66;
        const alcoholGrams = totalAlcohol * 0.789; // Convert fluid ounces of alcohol to grams
        let bac = (alcoholGrams * 5.14) / (weight * genderConstant) - (0.015 * hours);
        bac = Math.max(0, bac); // BAC cannot be negative

        // Display results
        const bacLevel = document.getElementById('bacLevel');
        const bacCategory = document.getElementById('bacCategory');
        const warningMessage = document.getElementById('warningMessage');

        bacLevel.textContent = bac.toFixed(3) + '%';

        // Determine BAC category
        let category;
        if (bac === 0) {
            category = 'Sober';
        } else if (bac < 0.04) {
            category = 'Minimal impairment';
        } else if (bac < 0.08) {
            category = 'Increasing impairment';
        } else if (bac < 0.15) {
            category = 'Significant impairment';
        } else if (bac < 0.30) {
            category = 'Severe impairment';
        } else {
            category = 'Life-threatening';
        }
        bacCategory.textContent = category;

        // Show warning if above legal limit
        warningMessage.style.display = bac >= 0.08 ? 'block' : 'none';

        results.style.display = 'block';
        results.scrollIntoView({ behavior: 'smooth' });
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
