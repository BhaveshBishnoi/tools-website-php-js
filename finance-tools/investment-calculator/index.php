<?php include '../../includes/header.php'; ?>

<title>Investment Calculator - Calculate Returns</title>
<meta name="description" content="Use our Investment Calculator to calculate returns on your investments over time. Free and easy-to-use.">
<meta name="keywords" content="investment calculator, returns calculator, financial tool, online calculator">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Investment Calculator",
  "description": "Calculate returns on your investments over time.",
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
            <li class="breadcrumb-item active">Investment Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-chart-line fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Investment Calculator</h1>
                        <p class="text-muted">Calculate investment growth and returns</p>
                    </div>

                    <form id="investmentCalculatorForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Initial Investment</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="initialInvestment" required min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Monthly Contribution</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="monthlyContribution" required min="0" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Annual Return Rate (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="returnRate" required min="0" step="0.01">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Investment Period</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="years" required min="1">
                                    <span class="input-group-text">Years</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Compound Frequency</label>
                            <select class="form-select" id="compoundFrequency">
                                <option value="12">Monthly</option>
                                <option value="4">Quarterly</option>
                                <option value="2">Semi-annually</option>
                                <option value="1">Annually</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Returns
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Investment Summary</h2>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Investment</h6>
                                        <p class="card-text h4 mb-0 text-primary" id="totalInvestment">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Interest Earned</h6>
                                        <p class="card-text h4 mb-0 text-success" id="totalInterest">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Final Balance</h6>
                                        <p class="card-text h4 mb-0 text-info" id="finalBalance">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Return on Investment</h6>
                                        <p class="card-text h4 mb-0 text-warning" id="roi">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Growth Chart -->
                        <div class="mt-4">
                            <h2 class="h5 mb-3">Investment Growth Chart</h2>
                            <canvas id="growthChart"></canvas>
                        </div>

                        <!-- Year by Year Breakdown -->
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">Year by Year Breakdown</h2>
                                <button class="btn btn-outline-success btn-sm" onclick="downloadBreakdown()">
                                    <i class="fas fa-download me-2"></i>Download
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Starting Balance</th>
                                            <th>Contributions</th>
                                            <th>Interest Earned</th>
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
                    <h2 class="h5 mb-3">How to Use the Investment Calculator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter your initial investment amount</li>
                        <li class="mb-2">Specify your monthly contribution</li>
                        <li class="mb-2">Input the expected annual return rate</li>
                        <li class="mb-2">Choose the investment period in years</li>
                        <li class="mb-2">Select your preferred compound frequency</li>
                        <li>Click "Calculate Returns" to see your investment growth</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Investment Tips</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Start investing early to benefit from compound interest</li>
                        <li class="mb-2">Regular contributions can significantly boost your returns</li>
                        <li class="mb-2">Diversify your investments to manage risk</li>
                        <li>Consider inflation when planning long-term investments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('investmentCalculatorForm');
    const results = document.getElementById('results');
    let growthChart = null;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const initialInvestment = parseFloat(document.getElementById('initialInvestment').value);
        const monthlyContribution = parseFloat(document.getElementById('monthlyContribution').value);
        const returnRate = parseFloat(document.getElementById('returnRate').value) / 100;
        const years = parseInt(document.getElementById('years').value);
        const compoundFrequency = parseInt(document.getElementById('compoundFrequency').value);
        
        // Calculate investment growth
        const periodicRate = returnRate / compoundFrequency;
        const periodsPerYear = compoundFrequency;
        const totalPeriods = years * periodsPerYear;
        
        let balance = initialInvestment;
        let totalContributions = initialInvestment;
        const yearlyData = [];
        const labels = [];
        const balanceData = [];
        const contributionData = [];
        
        for (let year = 0; year <= years; year++) {
            labels.push('Year ' + year);
            balanceData.push(balance);
            contributionData.push(totalContributions);
            
            if (year < years) {
                const yearStartBalance = balance;
                for (let period = 0; period < periodsPerYear; period++) {
                    balance *= (1 + periodicRate);
                    balance += monthlyContribution * (12 / periodsPerYear);
                    totalContributions += monthlyContribution * (12 / periodsPerYear);
                }
                
                yearlyData.push({
                    year: year + 1,
                    startBalance: yearStartBalance,
                    contributions: monthlyContribution * 12,
                    interest: balance - yearStartBalance - (monthlyContribution * 12),
                    endBalance: balance
                });
            }
        }
        
        // Update results
        document.getElementById('totalInvestment').textContent = formatCurrency(totalContributions);
        document.getElementById('totalInterest').textContent = formatCurrency(balance - totalContributions);
        document.getElementById('finalBalance').textContent = formatCurrency(balance);
        document.getElementById('roi').textContent = 
            (((balance - totalContributions) / totalContributions) * 100).toFixed(2) + '%';
        
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
                    borderColor: 'rgb(40, 167, 69)',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    fill: true
                }, {
                    label: 'Total Contributions',
                    data: contributionData,
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
                        text: 'Investment Growth Over Time'
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
                <td>${formatCurrency(data.contributions)}</td>
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
    
    let csv = 'Year,Starting Balance,Contributions,Interest Earned,Ending Balance\n';
    
    rows.slice(1).forEach(row => {
        const cells = Array.from(row.querySelectorAll('td'));
        csv += cells.map(cell => cell.textContent).join(',') + '\n';
    });
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('hidden', '');
    a.setAttribute('href', url);
    a.setAttribute('download', 'investment_breakdown.csv');
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

<?php include '../../includes/footer.php'; ?>
