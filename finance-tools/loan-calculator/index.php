<?php include '../../includes/header.php'; ?>

<title>Loan Calculator - Calculate Loan Payments</title>
<meta name="description" content="Calculate loan payments and interest rates with our Loan Calculator. Free and easy-to-use.">
<meta name="keywords" content="loan calculator, loan payments, interest rates, financial tool, online calculator">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Loan Calculator",
  "description": "Calculate loan payments and interest rates.",
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
            <li class="breadcrumb-item active">Loan Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-calculator fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Loan Calculator</h1>
                        <p class="text-muted">Calculate loan payments and generate amortization schedule</p>
                    </div>

                    <form id="loanCalculatorForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Loan Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="loanAmount" required min="1" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Annual Interest Rate (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="interestRate" required min="0.01" step="0.01">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Loan Term</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="loanTerm" required min="1">
                                    <select class="form-select" id="termUnit" style="max-width: 120px;">
                                        <option value="years">Years</option>
                                        <option value="months">Months</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Payment Frequency</label>
                                <select class="form-select" id="paymentFrequency">
                                    <option value="monthly">Monthly</option>
                                    <option value="biweekly">Bi-weekly</option>
                                    <option value="weekly">Weekly</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Extra Payments (Optional)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="extraPayment" value="0" min="0" step="0.01">
                                <select class="form-select" id="extraPaymentFrequency" style="max-width: 120px;">
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="once">One-time</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <h2 class="h5 mb-3">Loan Summary</h2>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Regular Payment</h6>
                                        <p class="card-text h4 mb-0 text-primary" id="regularPayment">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Interest</h6>
                                        <p class="card-text h4 mb-0 text-danger" id="totalInterest">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Cost</h6>
                                        <p class="card-text h4 mb-0 text-success" id="totalCost">$0.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Loan Payoff Date</h6>
                                        <p class="card-text h4 mb-0 text-info" id="payoffDate">-</p>
                                    </div>
                                </div>
                            </div>
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
                                            <th>Payment #</th>
                                            <th>Payment Date</th>
                                            <th>Payment</th>
                                            <th>Principal</th>
                                            <th>Interest</th>
                                            <th>Extra Payment</th>
                                            <th>Balance</th>
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
                    <h2 class="h5 mb-3">How to Use the Loan Calculator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter the loan amount you wish to borrow</li>
                        <li class="mb-2">Input the annual interest rate</li>
                        <li class="mb-2">Specify the loan term in years or months</li>
                        <li class="mb-2">Choose your preferred payment frequency</li>
                        <li class="mb-2">Add any extra payments (optional)</li>
                        <li>Click "Calculate" to see your loan details</li>
                    </ol>
                </div>
            </div>

            <!-- Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Tips for Managing Your Loan</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Making extra payments can significantly reduce your total interest</li>
                        <li class="mb-2">Consider bi-weekly payments to make an extra payment each year</li>
                        <li class="mb-2">Keep your loan term as short as you can afford</li>
                        <li>Compare different scenarios to find the best option for you</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loanCalculatorForm');
    const results = document.getElementById('results');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const loanAmount = parseFloat(document.getElementById('loanAmount').value);
        const annualRate = parseFloat(document.getElementById('interestRate').value) / 100;
        let loanTerm = parseInt(document.getElementById('loanTerm').value);
        const termUnit = document.getElementById('termUnit').value;
        const paymentFrequency = document.getElementById('paymentFrequency').value;
        const extraPayment = parseFloat(document.getElementById('extraPayment').value) || 0;
        const extraPaymentFrequency = document.getElementById('extraPaymentFrequency').value;
        
        // Convert term to months if necessary
        const totalMonths = termUnit === 'years' ? loanTerm * 12 : loanTerm;
        
        // Calculate payment frequency
        let paymentsPerYear;
        switch(paymentFrequency) {
            case 'weekly': paymentsPerYear = 52; break;
            case 'biweekly': paymentsPerYear = 26; break;
            default: paymentsPerYear = 12;
        }
        
        // Calculate periodic interest rate
        const periodicRate = annualRate / paymentsPerYear;
        
        // Calculate total number of payments
        const totalPayments = Math.ceil(totalMonths * (paymentsPerYear / 12));
        
        // Calculate regular payment amount
        const payment = (loanAmount * periodicRate * Math.pow(1 + periodicRate, totalPayments)) / 
                       (Math.pow(1 + periodicRate, totalPayments) - 1);
        
        // Generate amortization schedule
        let balance = loanAmount;
        let totalInterestPaid = 0;
        const schedule = [];
        const startDate = new Date();
        
        for (let i = 1; i <= totalPayments && balance > 0; i++) {
            const interestPayment = balance * periodicRate;
            let principalPayment = payment - interestPayment;
            let extraPaymentAmount = 0;
            
            // Add extra payment if applicable
            if (extraPayment > 0) {
                if (extraPaymentFrequency === 'monthly' && i % (paymentsPerYear / 12) === 0) {
                    extraPaymentAmount = extraPayment;
                } else if (extraPaymentFrequency === 'yearly' && i % paymentsPerYear === 0) {
                    extraPaymentAmount = extraPayment;
                } else if (extraPaymentFrequency === 'once' && i === 1) {
                    extraPaymentAmount = extraPayment;
                }
            }
            
            // Adjust final payment if necessary
            if (balance < payment + extraPaymentAmount) {
                principalPayment = balance;
                extraPaymentAmount = 0;
            }
            
            balance = Math.max(0, balance - principalPayment - extraPaymentAmount);
            totalInterestPaid += interestPayment;
            
            // Calculate payment date
            const paymentDate = new Date(startDate);
            switch(paymentFrequency) {
                case 'weekly':
                    paymentDate.setDate(paymentDate.getDate() + (i * 7));
                    break;
                case 'biweekly':
                    paymentDate.setDate(paymentDate.getDate() + (i * 14));
                    break;
                default:
                    paymentDate.setMonth(paymentDate.getMonth() + i);
            }
            
            schedule.push({
                number: i,
                date: paymentDate,
                payment: payment,
                principal: principalPayment,
                interest: interestPayment,
                extraPayment: extraPaymentAmount,
                balance: balance
            });
            
            if (balance === 0) break;
        }
        
        // Update results
        document.getElementById('regularPayment').textContent = formatCurrency(payment);
        document.getElementById('totalInterest').textContent = formatCurrency(totalInterestPaid);
        document.getElementById('totalCost').textContent = formatCurrency(loanAmount + totalInterestPaid);
        document.getElementById('payoffDate').textContent = schedule[schedule.length - 1].date.toLocaleDateString();
        
        // Update amortization table
        const tableBody = document.getElementById('amortizationTable');
        tableBody.innerHTML = '';
        
        schedule.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${row.number}</td>
                <td>${row.date.toLocaleDateString()}</td>
                <td>${formatCurrency(row.payment)}</td>
                <td>${formatCurrency(row.principal)}</td>
                <td>${formatCurrency(row.interest)}</td>
                <td>${formatCurrency(row.extraPayment)}</td>
                <td>${formatCurrency(row.balance)}</td>
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
    
    let csv = 'Payment #,Payment Date,Payment,Principal,Interest,Extra Payment,Balance\n';
    
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
