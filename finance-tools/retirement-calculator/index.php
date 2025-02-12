<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/tools/finance-tools/">Finance Tools</a></li>
            <li class="breadcrumb-item active">Retirement Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-clock fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Retirement Calculator</h1>
                        <p class="text-muted">Plan your retirement savings effectively</p>
                    </div>
                    <form id="retirementCalculatorForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Current Age</label>
                                <input type="number" class="form-control" id="currentAge" required min="18" max="100">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Retirement Age</label>
                                <input type="number" class="form-control" id="retirementAge" required min="30" max="100">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Monthly Savings</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="monthlySavings" required min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Annual Interest Rate (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="interestRate" required min="0" step="0.01">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Savings
                            </button>
                        </div>
                    </form>
                    <div class="mt-4 text-center">
                        <h2 class="h5">Estimated Retirement Savings:</h2>
                        <p id="retirementResult" class="fw-bold text-success"></p>
                    </div>
                </div>
            </div>
            
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the Retirement Calculator</h2>
                    <p>Enter your current age, retirement age, monthly savings, and interest rate to estimate your total retirement savings.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("retirementCalculatorForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    let currentAge = parseInt(document.getElementById("currentAge").value);
    let retirementAge = parseInt(document.getElementById("retirementAge").value);
    let monthlySavings = parseFloat(document.getElementById("monthlySavings").value);
    let interestRate = parseFloat(document.getElementById("interestRate").value) / 100;
    
    if (retirementAge <= currentAge) {
        alert("Retirement age must be greater than current age.");
        return;
    }
    
    let years = retirementAge - currentAge;
    let months = years * 12;
    let totalSavings = 0;
    
    for (let i = 0; i < months; i++) {
        totalSavings = (totalSavings + monthlySavings) * (1 + interestRate / 12);
    }
    
    document.getElementById("retirementResult").innerText = `Estimated Savings: $${totalSavings.toFixed(2)}`;
});
</script>

<?php include '../../includes/footer.php'; ?>
