<?php include '../../includes/header.php'; ?>
<title>7th Pay Commission Calculator - Calculate Salary Components Online</title>
<meta name="description" content="Calculate salary components as per 7th CPC for Central Government Employees with our online calculator tool.">
<meta name="keywords" content="7th pay commission, salary calculator, 7th cpc calculator, central government employees">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "7th Pay Commission Calculator",
  "description": "Calculate salary components as per 7th CPC for Central Government Employees online.",
  "applicationCategory": "Salary Calculator",
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
            <li class="breadcrumb-item"><a href="/tools/finance-tools/">Finance Tools</a></li>
            <li class="breadcrumb-item active">7th Pay Commission Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-calculator fa-3x text-danger mb-3"></i>
                        <h1 class="h3">7th Pay Commission Calculator</h1>
                        <p class="text-muted">Calculate salary components as per 7th CPC for Central Government Employees</p>
                    </div>

                    <div class="row">
                        <!-- Input Form -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h2 class="h5 mb-4">Enter Details</h2>
                                    <form id="payCalculatorForm">
                                        <!-- Pay Level Selection -->
                                        <div class="mb-3">
                                            <label class="form-label">Pay Level</label>
                                            <select class="form-select" id="payLevel" required>
                                                <option value="">Select Pay Level</option>
                                                <option value="1">Level 1 (18000-56900)</option>
                                                <option value="2">Level 2 (19900-63200)</option>
                                                <option value="3">Level 3 (21700-69100)</option>
                                                <option value="4">Level 4 (25500-81100)</option>
                                                <option value="5">Level 5 (29200-92300)</option>
                                                <option value="6">Level 6 (35400-112400)</option>
                                                <option value="7">Level 7 (44900-142400)</option>
                                                <option value="8">Level 8 (47600-151100)</option>
                                                <option value="9">Level 9 (53100-167800)</option>
                                                <option value="10">Level 10 (56100-177500)</option>
                                                <option value="11">Level 11 (67700-208700)</option>
                                                <option value="12">Level 12 (78800-209200)</option>
                                                <option value="13">Level 13 (123100-215900)</option>
                                                <option value="14">Level 14 (144200-218200)</option>
                                                <option value="15">Level 15 (182200-224100)</option>
                                            </select>
                                        </div>

                                        <!-- Basic Pay -->
                                        <div class="mb-3">
                                            <label class="form-label">Basic Pay</label>
                                            <input type="number" class="form-control" id="basicPay" required>
                                            <div class="form-text">Enter your current basic pay</div>
                                        </div>

                                        <!-- City Type -->
                                        <div class="mb-3">
                                            <label class="form-label">City Type</label>
                                            <select class="form-select" id="cityType" required>
                                                <option value="">Select City Type</option>
                                                <option value="X">X (HRA 24%)</option>
                                                <option value="Y">Y (HRA 16%)</option>
                                                <option value="Z">Z (HRA 8%)</option>
                                            </select>
                                        </div>

                                        <!-- Additional Allowances -->
                                        <div class="mb-3">
                                            <label class="form-label">Transport Allowance</label>
                                            <select class="form-select" id="transportAllowance">
                                                <option value="standard">Standard Rate</option>
                                                <option value="disabled">Higher Rate (For PWD)</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-danger w-100">
                                            <i class="fas fa-calculator me-2"></i>Calculate Salary
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Results Section -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h2 class="h5 mb-4">Salary Breakdown</h2>
                                    <div id="resultSection" style="display: none;">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>Basic Pay</td>
                                                        <td class="text-end" id="resultBasicPay">₹0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dearness Allowance (DA)</td>
                                                        <td class="text-end" id="resultDA">₹0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>House Rent Allowance (HRA)</td>
                                                        <td class="text-end" id="resultHRA">₹0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transport Allowance</td>
                                                        <td class="text-end" id="resultTA">₹0</td>
                                                    </tr>
                                                    <tr class="border-top">
                                                        <td class="fw-bold">Gross Salary</td>
                                                        <td class="text-end fw-bold" id="resultGross">₹0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Deductions -->
                                        <h3 class="h6 mt-4 mb-3">Standard Deductions</h3>
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>NPS (10%)</td>
                                                        <td class="text-end" id="resultNPS">₹0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Income Tax (Estimated)</td>
                                                        <td class="text-end" id="resultTax">₹0</td>
                                                    </tr>
                                                    <tr class="border-top">
                                                        <td class="fw-bold">Net Salary (Estimated)</td>
                                                        <td class="text-end fw-bold" id="resultNet">₹0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="row mt-4 g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">About 7th Pay Commission</h2>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Implemented from January 1, 2016</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Revised pay matrix with 18 levels</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-danger me-2"></i>Rationalized allowances and benefits</li>
                                <li><i class="fas fa-check-circle text-danger me-2"></i>Enhanced minimum pay structure</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">Important Notes</h2>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-info-circle text-danger me-2"></i>DA rates are updated periodically</li>
                                <li class="mb-2"><i class="fas fa-info-circle text-danger me-2"></i>HRA varies based on city classification</li>
                                <li class="mb-2"><i class="fas fa-info-circle text-danger me-2"></i>Tax calculation is approximate</li>
                                <li><i class="fas fa-info-circle text-danger me-2"></i>Additional allowances may apply</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('payCalculatorForm');
    const resultSection = document.getElementById('resultSection');

    // Current DA rate (update this as per latest rates)
    const DA_RATE = 42; // 42%

    // Transport Allowance rates
    const TA_RATES = {
        standard: 3600,
        disabled: 7200
    };

    // HRA rates
    const HRA_RATES = {
        'X': 0.24,
        'Y': 0.16,
        'Z': 0.08
    };

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get input values
        const basicPay = parseFloat(document.getElementById('basicPay').value);
        const cityType = document.getElementById('cityType').value;
        const transportType = document.getElementById('transportAllowance').value;

        // Calculate components
        const da = (basicPay * DA_RATE) / 100;
        const hra = basicPay * HRA_RATES[cityType];
        const ta = TA_RATES[transportType];
        const gross = basicPay + da + hra + ta;

        // Calculate deductions
        const nps = basicPay * 0.10;
        const tax = estimateIncomeTax(gross * 12) / 12;
        const net = gross - nps - tax;

        // Display results
        document.getElementById('resultBasicPay').textContent = formatCurrency(basicPay);
        document.getElementById('resultDA').textContent = formatCurrency(da);
        document.getElementById('resultHRA').textContent = formatCurrency(hra);
        document.getElementById('resultTA').textContent = formatCurrency(ta);
        document.getElementById('resultGross').textContent = formatCurrency(gross);
        document.getElementById('resultNPS').textContent = formatCurrency(nps);
        document.getElementById('resultTax').textContent = formatCurrency(tax);
        document.getElementById('resultNet').textContent = formatCurrency(net);

        resultSection.style.display = 'block';
    });

    // Simple tax estimation function (FY 2023-24)
    function estimateIncomeTax(annualIncome) {
        let tax = 0;
        const taxableIncome = Math.max(0, annualIncome - 250000); // Basic exemption

        if (taxableIncome <= 250000) {
            tax = 0;
        } else if (taxableIncome <= 500000) {
            tax = taxableIncome * 0.05;
        } else if (taxableIncome <= 750000) {
            tax = 12500 + (taxableIncome - 500000) * 0.10;
        } else if (taxableIncome <= 1000000) {
            tax = 37500 + (taxableIncome - 750000) * 0.15;
        } else if (taxableIncome <= 1250000) {
            tax = 75000 + (taxableIncome - 1000000) * 0.20;
        } else if (taxableIncome <= 1500000) {
            tax = 125000 + (taxableIncome - 1250000) * 0.25;
        } else {
            tax = 187500 + (taxableIncome - 1500000) * 0.30;
        }

        // Add 4% Health & Education Cess
        tax = tax + (tax * 0.04);

        return tax;
    }

    // Format currency in Indian Rupees
    function formatCurrency(amount) {
        return '₹' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
