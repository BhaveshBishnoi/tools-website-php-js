<?php 
$pageTitle = "Free Finance Tools - Investment, ROI & Budget Calculators";
$pageDescription = "Free online financial calculators for investments, ROI, loans, mortgages, retirement planning and budgeting. No registration required.";
?>

<?php 
include '../includes/header.php'; 
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item active">Finance Tools</li>
        </ol>
    </nav>
    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-chart-line fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Finance Tools</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Free online calculators to help you make better financial decisions.
        </p>
    </div>

    <!-- Tools Grid -->
    <div class="row g-4">
        <!-- Row 1 -->
        <div class="col-lg-4 col-md-6">
            <a href="investment-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-coins fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Investment Calculator</h3>
                        <p class="text-muted mb-0">Calculate returns on your investments over time.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="roi-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-percentage fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">ROI Calculator</h3>
                        <p class="text-muted mb-0">Calculate return on investment for your projects.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="7th-pay-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-calculator fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">7th Pay Calculator</h3>
                        <p class="text-muted mb-0">Calculate salary as per 7th CPC.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="loan-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-money-bill-wave fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Loan Calculator</h3>
                        <p class="text-muted mb-0">Calculate loan payments and interest rates.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Row 2 -->
        <div class="col-lg-4 col-md-6">
            <a href="mortgage-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-home fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Mortgage Calculator</h3>
                        <p class="text-muted mb-0">Calculate mortgage payments and amortization.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="retirement-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-umbrella-beach fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Retirement Calculator</h3>
                        <p class="text-muted mb-0">Plan your retirement savings and goals.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="budget-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-wallet fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Budget Calculator</h3>
                        <p class="text-muted mb-0">Create and manage your personal budget.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Row 3 -->
        <div class="col-lg-4 col-md-6">
            <a href="compound-interest-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-chart-area fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Compound Interest</h3>
                        <p class="text-muted mb-0">Calculate compound interest growth over time.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="tax-calculator/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-receipt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Tax Calculator</h3>
                        <p class="text-muted mb-0">Estimate your tax liability and returns.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6">
            <a href="currency-converter/" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-exchange-alt fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Currency Converter</h3>
                        <p class="text-muted mb-0">Convert between different currencies.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our Finance Tools</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Use</h3>
                        <p class="text-muted small">All our financial calculators are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Privacy Focused</h3>
                        <p class="text-muted small">Your financial data is processed locally and never stored on our servers.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Accurate Calculations</h3>
                        <p class="text-muted small">Based on standard financial formulas and practices.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick financial planning.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-shadow-lg {
    transition: all 0.3s ease-in-out;
}
.hover-shadow-lg:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}
</style>

<?php include '../includes/footer.php'; ?>
