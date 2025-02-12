<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/tools/finance-tools/">Finance Tools</a></li>
            <li class="breadcrumb-item active">ROI Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-percentage fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">ROI Calculator</h1>
                        <p class="text-muted">Calculate your Return on Investment</p>
                    </div>
                    <form id="roiCalculatorForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Initial Investment</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="initialInvestment" required min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Net Profit</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="netProfit" required min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate ROI
                            </button>
                        </div>
                    </form>
                    
                    <!-- Result -->
                    <div class="mt-4 text-center">
                        <h2 class="h5">ROI Result:</h2>
                        <p id="roiResult" class="fw-bold text-success"></p>
                    </div>
                </div>
            </div>
            
            <!-- How to Use -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the ROI Calculator</h2>
                    <p>Enter your initial investment and net profit to calculate your return on investment.</p>
                </div>
            </div>
            
            <!-- ROI Explanation -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">What is ROI?</h2>
                    <p>Return on Investment (ROI) measures the profitability of an investment and is expressed as a percentage.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("roiCalculatorForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    // Get values
    let initialInvestment = parseFloat(document.getElementById("initialInvestment").value);
    let netProfit = parseFloat(document.getElementById("netProfit").value);
    
    // Validate input
    if (initialInvestment <= 0) {
        alert("Initial Investment must be greater than 0.");
        return;
    }

    // Calculate ROI
    let roi = (netProfit / initialInvestment) * 100;
    
    // Display result
    document.getElementById("roiResult").innerText = `ROI: ${roi.toFixed(2)}%`;
});
</script>

<?php include '../../includes/footer.php'; ?>
