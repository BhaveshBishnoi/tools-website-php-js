<?php include '../../includes/header.php'; ?>

<title>Mortgage Calculator - Calculate Mortgage Payments</title>
<meta name="description" content="Calculate mortgage payments and amortization with our Mortgage Calculator. Free and easy-to-use.">
<meta name="keywords" content="mortgage calculator, mortgage payments, amortization, financial tool, online calculator">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Mortgage Calculator",
  "description": "Calculate mortgage payments and amortization.",
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
            <li class="breadcrumb-item active">Mortgage Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-home fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Mortgage Calculator</h1>
                        <p class="text-muted">Calculate your monthly mortgage payments and amortization schedule</p>
                    </div>

                    <form id="mortgageCalculatorForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Home Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="homePrice" required min="1" step="1000" value="300000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Down Payment</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="downPayment" required min="0" step="1000" value="60000">
                                    <select class="form-select" id="downPaymentType" style="max-width: 80px;">
                                        <option value="amount">$</option>
                                        <option value="percent">%</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Interest Rate (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="interestRate" required min="0.01" step="0.01" value="4.5">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Loan Term</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="loanTerm" required min="1" value="30">
                                    <span class="input-group-text">Years</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Property Tax (Annual)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="propertyTax" min="0" step="100" value="3600">
                                    <span class="input-group-text">$/yr</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Home Insurance (Annual)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="insurance" min="0" step="100" value="1200">
                                    <span class="input-group-text">$/yr</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">PMI (if down payment < 20%)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="pmi" min="0" step="0.01" value="0.5">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Mortgage
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Monthly Payment Breakdown</h2>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Principal & Interest</h6>
                                        <p class="card-text h4 mb-0 text-danger" id="principalInterest">$0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Property Tax</h6>
                                        <p class="card-text h4 mb-0 text-primary" id="monthlyTax">$0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Home Insurance</h6>
                                        <p class="card-text h4 mb-0 text-info" id="monthlyInsurance">$0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">PMI</h6>
                                        <p class="card-text h4 mb-0 text-warning" id="monthlyPMI">$0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card" style="background-color: #16a34a;">
                                    <div class="card-body">
                                        <h6 class="card-title text-white">Total Monthly Payment</h6>
                                        <p class="card-text h3 mb-0 text-white" id="totalPayment">$0</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Loan Summary -->
                        <div class="mt-4">
                            <h2 class="h5 mb-3">Loan Summary</h2>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="card-title">Loan Amount</h6>
                                            <p class="card-text h4 mb-0 text-primary" id="loanAmount">$0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="card-title">Total Interest Paid</h6>
                                            <p class="card-text h4 mb-0 text-danger" id="totalInterest">$0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Chart -->
                        <div class="mt-4">
                            <h2 class="h5 mb-3">Payment Distribution</h2>
                            <canvas id="paymentChart"></canvas>
                        </div>

                        <!-- Amortization Schedule -->
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">Amortization Schedule</h2>
                                <button class="btn btn-outline-danger btn-sm" onclick="downloadSchedule()">
                                    <i class="fas fa-download me-2"></i>Download
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Principal Paid</th>
                                            <th>Interest Paid</th>
                                            <th>Total Paid</th>
                                            <th>Remaining Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody id="amortizationTable"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the Mortgage Calculator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter the home price and down payment</li>
                        <li class="mb-2">Input the interest rate and loan term</li>
                        <li class="mb-2">Add property tax and insurance costs</li>
                        <li class="mb-2">Include PMI if down payment is less than 20%</li>
                        <li>Click "Calculate Mortgage" to see your payment breakdown</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Mortgage Tips</h2>
                    <ul class="mb-0">
                        <li class="mb-2">A larger down payment reduces your monthly payments</li>
                        <li class="mb-2">20% down payment helps avoid PMI costs</li>
                        <li class="mb-2">Consider property tax and insurance in your budget</li>
                        <li>Shop around for the best interest rates</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('mortgageCalculatorForm');
    const results = document.getElementById('results');
    let paymentChart = null;
    
    // Handle down payment type change
    document.getElementById('downPaymentType').addEventListener('change', function() {
        const homePrice = parseFloat(document.getElementById('homePrice').value);
        const downPayment = parseFloat(document.getElementById('downPayment').value);
        
        if (this.value === 'percent') {
            document.getElementById('downPayment').value = ((downPayment / homePrice) * 100).toFixed(2);
        } else {
            document.getElementById('downPayment').value = (homePrice * (downPayment / 100)).toFixed(2);
        }
    });
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const homePrice = parseFloat(document.getElementById('homePrice').value);
        let downPayment = parseFloat(document.getElementById('downPayment').value);
        const downPaymentType = document.getElementById('downPaymentType').value;
        const interestRate = parseFloat(document.getElementById('interestRate').value) / 100;
        const loanTerm = parseInt(document.getElementById('loanTerm').value);
        const propertyTax = parseFloat(document.getElementById('propertyTax').value);
        const insurance = parseFloat(document.getElementById('insurance').value);
        const pmiRate = parseFloat(document.getElementById('pmi').value) / 100;
        
        // Calculate down payment amount
        if (downPaymentType === 'percent') {
            downPayment = homePrice * (downPayment / 100);
        }
        
        // Calculate loan amount and monthly payments
        const loanAmount = homePrice - downPayment;
        const monthlyRate = interestRate / 12;
        const numberOfPayments = loanTerm * 12;
        
        // Calculate principal and interest payment
        const monthlyPI = (loanAmount * monthlyRate * Math.pow(1 + monthlyRate, numberOfPayments)) / 
                         (Math.pow(1 + monthlyRate, numberOfPayments) - 1);
        
        // Calculate other monthly costs
        const monthlyTax = propertyTax / 12;
        const monthlyInsurance = insurance / 12;
        const monthlyPMI = (downPayment / homePrice < 0.2) ? (loanAmount * pmiRate) / 12 : 0;
        
        // Calculate total monthly payment
        const totalMonthly = monthlyPI + monthlyTax + monthlyInsurance + monthlyPMI;
        
        // Calculate amortization schedule
        let balance = loanAmount;
        let totalInterest = 0;
        const yearlyData = [];
        
        for (let year = 1; year <= loanTerm; year++) {
            let yearPrincipal = 0;
            let yearInterest = 0;
            
            for (let month = 1; month <= 12; month++) {
                const interestPayment = balance * monthlyRate;
                const principalPayment = monthlyPI - interestPayment;
                
                yearPrincipal += principalPayment;
                yearInterest += interestPayment;
                balance -= principalPayment;
            }
            
            totalInterest += yearInterest;
            
            yearlyData.push({
                year: year,
                principalPaid: yearPrincipal,
                interestPaid: yearInterest,
                totalPaid: yearPrincipal + yearInterest,
                balance: Math.max(0, balance)
            });
        }
        
        // Update results
        document.getElementById('principalInterest').textContent = formatCurrency(monthlyPI);
        document.getElementById('monthlyTax').textContent = formatCurrency(monthlyTax);
        document.getElementById('monthlyInsurance').textContent = formatCurrency(monthlyInsurance);
        document.getElementById('monthlyPMI').textContent = formatCurrency(monthlyPMI);
        document.getElementById('totalPayment').textContent = formatCurrency(totalMonthly);
        document.getElementById('loanAmount').textContent = formatCurrency(loanAmount);
        document.getElementById('totalInterest').textContent = formatCurrency(totalInterest);
        
        // Update chart
        if (paymentChart) {
            paymentChart.destroy();
        }
        
        const ctx = document.getElementById('paymentChart').getContext('2d');
        paymentChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Principal', 'Interest', 'Property Tax', 'Insurance', 'PMI'],
                datasets: [{
                    data: [
                        monthlyPI - (balance * monthlyRate),
                        balance * monthlyRate,
                        monthlyTax,
                        monthlyInsurance,
                        monthlyPMI
                    ],
                    backgroundColor: [
                        '#16a34a',
                        '#dc2626',
                        '#2563eb',
                        '#0891b2',
                        '#d97706'
                    ]
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Payment Distribution'
                    }
                }
            }
        });
        
        // Update amortization table
        const tableBody = document.getElementById('amortizationTable');
        tableBody.innerHTML = '';
        
        yearlyData.forEach(data => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${data.year}</td>
                <td>${formatCurrency(data.principalPaid)}</td>
                <td>${formatCurrency(data.interestPaid)}</td>
                <td>${formatCurrency(data.totalPaid)}</td>
                <td>${formatCurrency(data.balance)}</td>
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

function downloadSchedule() {
    const table = document.querySelector('table');
    const rows = Array.from(table.querySelectorAll('tr'));
    
    let csv = 'Year,Principal Paid,Interest Paid,Total Paid,Remaining Balance\n';
    
    rows.slice(1).forEach(row => {
        const cells = Array.from(row.querySelectorAll('td'));
        csv += cells.map(cell => cell.textContent).join(',') + '\n';
    });
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('hidden', '');
    a.setAttribute('href', url);
    a.setAttribute('download', 'amortization_schedule.csv');
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

<?php include '../../includes/footer.php'; ?>
