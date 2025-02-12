<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/tools/finance-tools/">Finance Tools</a></li>
            <li class="breadcrumb-item active">Compound Interest Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-piggy-bank fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Compound Interest Calculator</h1>
                        <p class="text-muted">Calculate how your money grows with compound interest</p>
                    </div>

                    <form id="compoundInterestForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Principal Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="principal" required min="0" step="0.01">
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

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Time Period</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="years" required min="1">
                                    <span class="input-group-text">Years</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Compound Frequency</label>
                                <select class="form-select" id="compoundFrequency">
                                    <option value="1">Annually</option>
                                    <option value="2">Semi-annually</option>
                                    <option value="4">Quarterly</option>
                                    <option value="12" selected>Monthly</option>
                                    <option value="365">Daily</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Regular Deposits (Optional)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="regularDeposit" value="0" min="0" step="0.01">
                                <select class="form-select" id="depositFrequency" style="max-width: 120px;">
                                    <option value="12">Monthly</option>
                                    <option value="4">Quarterly</option>
                                    <option value="1">Yearly</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger text-white">
                                <i class="fas fa-calculator me-2"></i>Calculate Interest
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Interest Summary</h2>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Principal</h6>
                                        <p class="card-text h4 mb-0 text-danger" id="totalPrincipal">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Interest</h6>
                                        <p class="card-text h4 mb-0 text-success" id="totalInterest">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Final Amount</h6>
                                        <p class="card-text h4 mb-0 text-info" id="finalAmount">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Effective Annual Rate</h6>
                                        <p class="card-text h4 mb-0 text-warning" id="effectiveRate">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Growth Chart -->
                        <div class="mt-4">
                            <h2 class="h5 mb-3">Growth Over Time</h2>
                            <canvas id="growthChart"></canvas>
                        </div>

                        <!-- Yearly Breakdown -->
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">Yearly Breakdown</h2>
                                <button class="btn btn-outline-info btn-sm" onclick="downloadBreakdown()">
                                    <i class="fas fa-download me-2"></i>Download
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Starting Balance</th>
                                            <th>Deposits</th>
                                            <th>Interest</th>
                                            <th>Ending Balance</th>
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
                    <h2 class="h5 mb-3">How to Use the Compound Interest Calculator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter your initial principal amount</li>
                        <li class="mb-2">Input the annual interest rate</li>
                        <li class="mb-2">Specify the time period in years</li>
                        <li class="mb-2">Choose how often interest is compounded</li>
                        <li class="mb-2">Add regular deposits if applicable</li>
                        <li>Click "Calculate Interest" to see your money grow</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Understanding Compound Interest</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Compound interest is interest earned on both principal and previously earned interest</li>
                        <li class="mb-2">More frequent compounding leads to faster growth</li>
                        <li class="mb-2">Regular deposits can significantly boost your returns</li>
                        <li>The earlier you start saving, the more time your money has to grow</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('compoundInterestForm');
    const results = document.getElementById('results');
    let growthChart = null;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const principal = parseFloat(document.getElementById('principal').value);
        const rate = parseFloat(document.getElementById('interestRate').value) / 100;
        const years = parseInt(document.getElementById('years').value);
        const compoundFrequency = parseInt(document.getElementById('compoundFrequency').value);
        const regularDeposit = parseFloat(document.getElementById('regularDeposit').value);
        const depositFrequency = parseInt(document.getElementById('depositFrequency').value);
        
        // Calculate effective annual rate
        const effectiveRate = (Math.pow(1 + rate/compoundFrequency, compoundFrequency) - 1) * 100;
        
        // Calculate growth
        let balance = principal;
        let totalDeposits = principal;
        const yearlyData = [];
        const labels = [];
        const balanceData = [];
        const depositData = [];
        
        for (let year = 0; year <= years; year++) {
            labels.push('Year ' + year);
            balanceData.push(balance);
            depositData.push(totalDeposits);
            
            if (year < years) {
                const yearStartBalance = balance;
                const yearlyDeposit = regularDeposit * depositFrequency;
                
                // Calculate compound interest with regular deposits
                for (let period = 0; period < compoundFrequency; period++) {
                    balance *= (1 + rate/compoundFrequency);
                    
                    // Add deposits proportionally throughout the year
                    if (period % (compoundFrequency/depositFrequency) === 0) {
                        balance += regularDeposit;
                        totalDeposits += regularDeposit;
                    }
                }
                
                yearlyData.push({
                    year: year + 1,
                    startBalance: yearStartBalance,
                    deposits: yearlyDeposit,
                    interest: balance - yearStartBalance - yearlyDeposit,
                    endBalance: balance
                });
            }
        }
        
        // Update results
        document.getElementById('totalPrincipal').textContent = formatCurrency(totalDeposits);
        document.getElementById('totalInterest').textContent = formatCurrency(balance - totalDeposits);
        document.getElementById('finalAmount').textContent = formatCurrency(balance);
        document.getElementById('effectiveRate').textContent = effectiveRate.toFixed(2) + '%';
        
        // Update chart
        if (growthChart) {
            growthChart.destroy();
        }
        
        const ctx = document.getElementById('growthChart').getContext('2d');
        growthChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Balance',
                    data: balanceData,
                    borderColor: 'rgb(23, 162, 184)',
                    backgroundColor: 'rgba(23, 162, 184, 0.1)',
                    fill: true
                }, {
                    label: 'Total Deposits',
                    data: depositData,
                    borderColor: 'rgb(0, 123, 255)',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Balance Growth Over Time'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₹' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
        
        // Update breakdown table
        const tableBody = document.getElementById('breakdownTable');
        tableBody.innerHTML = '';
        
        yearlyData.forEach(data => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${data.year}</td>
                <td>${formatCurrency(data.startBalance)}</td>
                <td>${formatCurrency(data.deposits)}</td>
                <td>${formatCurrency(data.interest)}</td>
                <td>${formatCurrency(data.endBalance)}</td>
            `;
            tableBody.appendChild(tr);
        });
        
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
    
    let csv = 'Year,Starting Balance,Deposits,Interest,Ending Balance\n';
    
    rows.slice(1).forEach(row => {
        const cells = Array.from(row.querySelectorAll('td'));
        csv += cells.map(cell => cell.textContent).join(',') + '\n';
    });
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('hidden', '');
    a.setAttribute('href', url);
    a.setAttribute('download', 'compound_interest_breakdown.csv');
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

<?php include '../../includes/footer.php'; ?>
