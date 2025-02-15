<?php include '../../includes/header.php'; ?>

<title>Pregnancy Due Date Calculator - Free Online Due Date Estimator</title>
<meta name="description" content="Calculate your pregnancy due date online for free based on the last menstrual period. No registration required!">
<meta name="keywords" content="pregnancy due date calculator, online pregnancy tool, free due date estimation, pregnancy calculator">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Pregnancy Due Date Calculator",
  "description": "Calculate your pregnancy due date online for free based on the last menstrual period.",
  "applicationCategory": "Health Tool",
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
            <li class="breadcrumb-item"><a href="/tools/health-tools/">Health Tools</a></li>
            <li class="breadcrumb-item active">Pregnancy Due Date Calculator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-baby fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Pregnancy Due Date Calculator</h1>
                        <p class="text-muted">Calculate your estimated due date based on your last menstrual period</p>
                    </div>

                    <form id="dueDateForm">
                        <div class="mb-4">
                            <label class="form-label">First Day of Last Menstrual Period</label>
                            <input type="date" class="form-control" id="lmpDate" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Average Length of Cycles</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="cycleLength" value="28" min="20" max="45">
                                <span class="input-group-text">days</span>
                            </div>
                            <div class="form-text">Most women have cycles lasting 28 days</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-calculator me-2"></i>Calculate Due Date
                            </button>
                        </div>
                    </form>

                    <!-- Results -->
                    <div id="results" class="mt-4" style="display: none;">
                        <div class="alert alert-info">
                            <h4 class="alert-heading mb-3">Your Pregnancy Timeline</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <strong>Due Date:</strong>
                                    <p class="h5 mb-0" id="dueDate">-</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Conception Date:</strong>
                                    <p class="mb-0" id="conceptionDate">-</p>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-light mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Current Pregnancy Status</h5>
                                <p class="mb-2">Gestational Age: <strong id="gestationalAge">-</strong></p>
                                <p class="mb-2">Trimester: <strong id="trimester">-</strong></p>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-info" id="progressBar" role="progressbar" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Milestone Timeline -->
                        <div class="mt-4">
                            <h5>Key Milestones</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Week</th>
                                            <th>Date</th>
                                            <th>Milestone</th>
                                        </tr>
                                    </thead>
                                    <tbody id="milestonesTable"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use This Calculator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter the first day of your last menstrual period</li>
                        <li class="mb-2">Adjust your average cycle length if different from 28 days</li>
                        <li>Click "Calculate" to see your pregnancy timeline</li>
                    </ol>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">Important Notes</h2>
                    <ul class="mb-0">
                        <li class="mb-2">This calculator provides an estimate based on a standard pregnancy duration of 40 weeks</li>
                        <li class="mb-2">Only 5% of babies are born on their exact due date</li>
                        <li class="mb-2">A normal pregnancy can range from 37 to 42 weeks</li>
                        <li class="mb-2">Your healthcare provider may adjust your due date based on ultrasound results</li>
                        <li>Always consult with your healthcare provider for personalized medical advice</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.text-pink {
    color: #e83e8c;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('dueDateForm');
    const results = document.getElementById('results');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const lmpDate = new Date(document.getElementById('lmpDate').value);
        const cycleLength = parseInt(document.getElementById('cycleLength').value);

        // Calculate conception date (LMP + cycle length - 14 days)
        const conceptionDate = new Date(lmpDate);
        conceptionDate.setDate(conceptionDate.getDate() + cycleLength - 14);

        // Calculate due date (LMP + 280 days)
        const dueDate = new Date(lmpDate);
        dueDate.setDate(dueDate.getDate() + 280);

        // Calculate current gestational age
        const today = new Date();
        const gestationalAge = Math.floor((today - lmpDate) / (1000 * 60 * 60 * 24 * 7));
        const progress = (gestationalAge / 40) * 100;

        // Determine trimester
        let trimester = '';
        if (gestationalAge < 13) {
            trimester = 'First Trimester (Weeks 1-12)';
        } else if (gestationalAge < 27) {
            trimester = 'Second Trimester (Weeks 13-26)';
        } else {
            trimester = 'Third Trimester (Weeks 27-40)';
        }

        // Update results
        document.getElementById('dueDate').textContent = dueDate.toLocaleDateString('en-US', { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        document.getElementById('conceptionDate').textContent = conceptionDate.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        document.getElementById('gestationalAge').textContent = `Week ${gestationalAge}`;
        document.getElementById('trimester').textContent = trimester;
        document.getElementById('progressBar').style.width = `${Math.min(progress, 100)}%`;

        // Define key milestones
        const milestones = [
            { week: 4, description: "Implantation occurs" },
            { week: 6, description: "Heartbeat may be detected" },
            { week: 12, description: "End of first trimester" },
            { week: 20, description: "Halfway point, anatomy scan" },
            { week: 24, description: "Viability milestone" },
            { week: 26, description: "End of second trimester" },
            { week: 37, description: "Full term begins" },
            { week: 40, description: "Due date" }
        ];

        // Update milestones table
        const milestonesTable = document.getElementById('milestonesTable');
        milestonesTable.innerHTML = '';

        milestones.forEach(milestone => {
            const milestoneDate = new Date(lmpDate);
            milestoneDate.setDate(milestoneDate.getDate() + (milestone.week * 7));

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>Week ${milestone.week}</td>
                <td>${milestoneDate.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                })}</td>
                <td>${milestone.description}</td>
            `;
            milestonesTable.appendChild(tr);
        });

        results.style.display = 'block';
        results.scrollIntoView({ behavior: 'smooth' });
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
