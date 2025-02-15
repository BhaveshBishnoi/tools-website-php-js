<?php include '../../includes/header.php'; ?>

<title>Budget Calculator - Manage Your Budget</title>
<meta name="description" content="Create and manage your personal budget with our Budget Calculator. Free and easy-to-use.">
<meta name="keywords" content="budget calculator, personal budget, financial tool, online calculator">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Budget Calculator",
  "description": "Create and manage your personal budget.",
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
            <li class="breadcrumb-item active">Advanced Budget Planner</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-wallet fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Advanced Budget Planner</h1>
                        <p class="text-muted">Plan your monthly budget effectively</p>
                    </div>
                    <form id="budgetPlannerForm">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Monthly Income</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="monthlyIncome" required min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Savings Goal</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="savingsGoal" required min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Rent / Mortgage</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="rentMortgage" required min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Utilities</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="utilities" required min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Groceries</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="groceries" required min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Transportation</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="transportation" required min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Other Expenses</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="otherExpenses" required min="0" step="0.01">
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Budget
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- How to Use -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the Budget Planner</h2>
                    <p>Enter your income and expenses to calculate your monthly budget and savings potential.</p>
                </div>
            </div>
            
            <!-- Budgeting Tips -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Budgeting Tips</h2>
                    <p>Ensure you allocate your income wisely by prioritizing essentials and savings before discretionary spending.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../../includes/footer.php'; ?>
