<?php include '../../includes/header.php'; ?>

<title>Tax Calculator - Estimate Tax Liability</title>
<meta name="description" content="Estimate your tax liability and returns with our Tax Calculator. Free and easy-to-use.">
<meta name="keywords" content="tax calculator, tax liability, returns, financial tool, online calculator">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Tax Calculator",
  "description": "Estimate your tax liability and returns.",
  "applicationCategory": "Financial Tool",
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
            <li class="breadcrumb-item"><a href="/tools/tools/finance-tools/">Finance Tools</a></li>
            <li class="breadcrumb-item active">Tax Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-receipt fa-3x mb-3" style="color: #dc2626;"></i>
                        <h1 class="h3">Income Tax Calculator</h1>
                        <p class="text-muted">Calculate your income tax and take-home pay</p>
                    </div>

                    <form id="taxCalculatorForm">
                        <!-- Income Details -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Income Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Annual Salary</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="salary" required min="0" step="1000">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Additional Income</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="additionalIncome" min="0" step="100" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Filing Status</label>
                                        <select class="form-select" id="filingStatus">
                                            <option value="single">Single</option>
                                            <option value="married">Married Filing Jointly</option>
                                            <option value="head">Head of Household</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tax Year</label>
                                        <select class="form-select" id="taxYear">
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Deductions and Credits -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Deductions and Credits</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="deductionType" id="standardDeduction" checked>
                                        <label class="form-check-label" for="standardDeduction">
                                            Standard Deduction
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="deductionType" id="itemizedDeduction">
                                        <label class="form-check-label" for="itemizedDeduction">
                                            Itemized Deduction
                                        </label>
                                    </div>
                                </div>
                                <div id="itemizedDeductions" style="display: none;">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mortgage Interest</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="mortgageInterest" min="0" step="100" value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Property Taxes</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="propertyTaxes" min="0" step="100" value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Charitable Donations</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="charitableDonations" min="0" step="100" value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Medical Expenses</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="medicalExpenses" min="0" step="100" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tax Credits -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Tax Credits</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Child Tax Credit</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="childCount" min="0" max="10" value="0">
                                            <span class="input-group-text">Children</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Other Credits</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="otherCredits" min="0" step="100" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Tax
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Tax Summary</h2>
                        
                        <!-- Tax Breakdown -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Gross Income</h6>
                                        <p class="card-text h4 mb-0 text-danger" id="grossIncome">$0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Taxable Income</h6>
                                        <p class="card-text h4 mb-0 text-info" id="taxableIncome">$0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Tax</h6>
                                        <p class="card-text h4 mb-0 text-danger" id="totalTax">$0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Effective Tax Rate</h6>
                                        <p class="card-text h4 mb-0 text-warning" id="effectiveRate">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Take Home Pay -->
                        <div class="card mb-4" style="background-color: #dc2626;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="card-title text-white">Annual Take-Home Pay</h6>
                                        <p class="card-text h3 mb-0 text-white" id="annualTakeHome">$0</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="card-title text-white">Monthly Take-Home Pay</h6>
                                        <p class="card-text h3 mb-0 text-white" id="monthlyTakeHome">$0</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tax Bracket Chart -->
                        <div class="mt-4">
                            <h2 class="h5 mb-3">Tax Bracket Breakdown</h2>
                            <canvas id="taxBracketChart"></canvas>
                        </div>

                        <!-- Detailed Breakdown -->
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">Detailed Tax Breakdown</h2>
                                <button class="btn btn-outline-danger btn-sm" onclick="downloadBreakdown()">
                                    <i class="fas fa-download me-2"></i>Download
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="breakdownTable"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the Tax Calculator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter your annual salary and additional income</li>
                        <li class="mb-2">Select your filing status and tax year</li>
                        <li class="mb-2">Choose between standard or itemized deductions</li>
                        <li class="mb-2">Add any applicable tax credits</li>
                        <li>Click "Calculate Tax" to see your tax breakdown</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tax Tips</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Compare standard vs. itemized deductions</li>
                        <li class="mb-2">Keep records of all deductible expenses</li>
                        <li class="mb-2">Consider tax-advantaged retirement accounts</li>
                        <li>Consult a tax professional for complex situations</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('taxCalculatorForm');
    const results = document.getElementById('results');
    let taxBracketChart = null;
    
    // Toggle itemized deductions section
    document.querySelectorAll('input[name="deductionType"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.getElementById('itemizedDeductions').style.display = 
                document.getElementById('itemizedDeduction').checked ? 'block' : 'none';
        });
    });
    
    // 2024 Tax Brackets
    const taxBrackets = {
        single: [
            { rate: 0.10, limit: 11600 },
            { rate: 0.12, limit: 47150 },
            { rate: 0.22, limit: 100525 },
            { rate: 0.24, limit: 191950 },
            { rate: 0.32, limit: 243725 },
            { rate: 0.35, limit: 609350 },
            { rate: 0.37, limit: Infinity }
        ],
        married: [
            { rate: 0.10, limit: 23200 },
            { rate: 0.12, limit: 94300 },
            { rate: 0.22, limit: 201050 },
            { rate: 0.24, limit: 383900 },
            { rate: 0.32, limit: 487450 },
            { rate: 0.35, limit: 731200 },
            { rate: 0.37, limit: Infinity }
        ],
        head: [
            { rate: 0.10, limit: 16550 },
            { rate: 0.12, limit: 63100 },
            { rate: 0.22, limit: 100500 },
            { rate: 0.24, limit: 191950 },
            { rate: 0.32, limit: 243700 },
            { rate: 0.35, limit: 609350 },
            { rate: 0.37, limit: Infinity }
        ]
    };
    
    // Standard Deductions for 2024
    const standardDeductions = {
        single: 14600,
        married: 29200,
        head: 21900
    };
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const salary = parseFloat(document.getElementById('salary').value) || 0;
        const additionalIncome = parseFloat(document.getElementById('additionalIncome').value) || 0;
        const filingStatus = document.getElementById('filingStatus').value;
        const isStandardDeduction = document.getElementById('standardDeduction').checked;
        
        // Calculate gross income
        const grossIncome = salary + additionalIncome;
        
        // Calculate deductions
        let totalDeductions = 0;
        if (isStandardDeduction) {
            totalDeductions = standardDeductions[filingStatus];
        } else {
            const mortgageInterest = parseFloat(document.getElementById('mortgageInterest').value) || 0;
            const propertyTaxes = parseFloat(document.getElementById('propertyTaxes').value) || 0;
            const charitableDonations = parseFloat(document.getElementById('charitableDonations').value) || 0;
            const medicalExpenses = parseFloat(document.getElementById('medicalExpenses').value) || 0;
            totalDeductions = mortgageInterest + propertyTaxes + charitableDonations + medicalExpenses;
        }
        
        // Calculate taxable income
        const taxableIncome = Math.max(0, grossIncome - totalDeductions);
        
        // Calculate tax
        let totalTax = 0;
        let previousLimit = 0;
        const brackets = taxBrackets[filingStatus];
        const bracketAmounts = [];
        
        for (let i = 0; i < brackets.length; i++) {
            const bracket = brackets[i];
            const bracketIncome = Math.min(Math.max(0, taxableIncome - previousLimit), bracket.limit - previousLimit);
            const bracketTax = bracketIncome * bracket.rate;
            totalTax += bracketTax;
            
            bracketAmounts.push({
                rate: (bracket.rate * 100).toFixed(0) + '%',
                amount: bracketTax,
                income: bracketIncome
            });
            
            previousLimit = bracket.limit;
            if (taxableIncome <= bracket.limit) break;
        }
        
        // Calculate credits
        const childCount = parseInt(document.getElementById('childCount').value) || 0;
        const otherCredits = parseFloat(document.getElementById('otherCredits').value) || 0;
        const totalCredits = (childCount * 2000) + otherCredits;
        
        // Final tax calculation
        totalTax = Math.max(0, totalTax - totalCredits);
        const effectiveRate = (totalTax / grossIncome * 100);
        const annualTakeHome = grossIncome - totalTax;
        const monthlyTakeHome = annualTakeHome / 12;
        
        // Update results
        document.getElementById('grossIncome').textContent = formatCurrency(grossIncome);
        document.getElementById('taxableIncome').textContent = formatCurrency(taxableIncome);
        document.getElementById('totalTax').textContent = formatCurrency(totalTax);
        document.getElementById('effectiveRate').textContent = effectiveRate.toFixed(1) + '%';
        document.getElementById('annualTakeHome').textContent = formatCurrency(annualTakeHome);
        document.getElementById('monthlyTakeHome').textContent = formatCurrency(monthlyTakeHome);
        
        // Update chart
        if (taxBracketChart) {
            taxBracketChart.destroy();
        }
        
        const ctx = document.getElementById('taxBracketChart').getContext('2d');
        taxBracketChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bracketAmounts.filter(b => b.income > 0).map(b => b.rate),
                datasets: [{
                    label: 'Tax Paid',
                    data: bracketAmounts.filter(b => b.income > 0).map(b => b.amount),
                    backgroundColor: '#dc2626'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => '₹' + value.toLocaleString()
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Tax Paid by Bracket'
                    }
                }
            }
        });
        
        // Update breakdown table
        const tableBody = document.getElementById('breakdownTable');
        tableBody.innerHTML = `
            <tr>
                <td>Gross Income</td>
                <td>${formatCurrency(grossIncome)}</td>
            </tr>
            <tr>
                <td>Total Deductions</td>
                <td>${formatCurrency(totalDeductions)}</td>
            </tr>
            <tr>
                <td>Taxable Income</td>
                <td>${formatCurrency(taxableIncome)}</td>
            </tr>
            <tr>
                <td>Tax Credits</td>
                <td>${formatCurrency(totalCredits)}</td>
            </tr>
            <tr>
                <td>Total Tax</td>
                <td>${formatCurrency(totalTax)}</td>
            </tr>
            <tr>
                <td>Take-Home Pay (Annual)</td>
                <td>${formatCurrency(annualTakeHome)}</td>
            </tr>
            <tr>
                <td>Take-Home Pay (Monthly)</td>
                <td>${formatCurrency(monthlyTakeHome)}</td>
            </tr>
        `;
        
        results.style.display = 'block';
        results.scrollIntoView({ behavior: 'smooth' });
    });
});

function formatCurrency(amount) {
    return new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR'
    }).format(amount);
}

function downloadBreakdown() {
    const table = document.querySelector('table');
    const rows = Array.from(table.querySelectorAll('tr'));
    
    let csv = 'Category,Amount\n';
    rows.slice(1).forEach(row => {
        const cells = Array.from(row.querySelectorAll('td'));
        csv += cells.map(cell => cell.textContent).join(',') + '\n';
    });
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('hidden', '');
    a.setAttribute('href', url);
    a.setAttribute('download', 'tax_breakdown.csv');
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

<?php include '../includes/footer.php'; ?>
