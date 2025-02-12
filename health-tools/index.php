<?php 
$pageTitle = "Health Tools - Free Online Health & Fitness Calculators";
$pageDescription = "Free online health calculators for BMI, body fat, calories, heart rate, and more. Easy to use with no registration required.";
include '../includes/header.php'; 
?>

<div class="container-fluid py-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item active">Health Tools</li>
        </ol>
    </nav>
    <!-- Header -->
    <div class="text-center mb-5">
        <div class="icon-box mb-4">
            <i class="fas fa-heartbeat fa-3x text-danger"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Health Tools</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Free online calculators and tools to track and improve your health.
        </p>
    </div>

    <!-- Tools Grid -->
    <div class="row g-4">
        <!-- BMI Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="bmi-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-weight fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">BMI Calculator</h3>
                        <p class="text-muted mb-0">Calculate your Body Mass Index and understand what it means for your health.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Body Fat Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="body-fat-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-percentage fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Body Fat Calculator</h3>
                        <p class="text-muted mb-0">Estimate your body fat percentage using various measurement methods.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Calorie Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="calorie-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-utensils fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Calorie Calculator</h3>
                        <p class="text-muted mb-0">Find out your daily caloric needs based on your activity level and goals.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Heart Rate Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="heart-rate-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-heartbeat fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Heart Rate Calculator</h3>
                        <p class="text-muted mb-0">Calculate your target heart rate zones for optimal exercise intensity.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Ideal Weight Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="ideal-weight-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-balance-scale fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Ideal Weight Calculator</h3>
                        <p class="text-muted mb-0">Find your ideal weight range based on height, age, and body frame.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Water Intake Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="water-intake-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-tint fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Water Intake Calculator</h3>
                        <p class="text-muted mb-0">Calculate your daily water needs based on weight and activity level.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sleep Cycle Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="sleep-cycle-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-moon fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Sleep Cycle Calculator</h3>
                        <p class="text-muted mb-0">Calculate optimal bedtime and wake times based on sleep cycles.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- BAC Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="bac-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-wine-glass fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">BAC Calculator</h3>
                        <p class="text-muted mb-0">Estimate blood alcohol content based on drinks consumed and personal factors.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pregnancy Due Date Calculator -->
        <div class="col-lg-4 col-md-6">
            <a href="pregnancy-due-date-calculator" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-baby fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Due Date Calculator</h3>
                        <p class="text-muted mb-0">Calculate your pregnancy due date based on last menstrual period.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Intermittent Fasting Timer -->
        <div class="col-lg-4 col-md-6">
            <a href="intermittent-fasting-timer" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow-lg">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box mb-4">
                            <i class="fas fa-clock fa-2x text-danger"></i>
                        </div>
                        <h3 class="h5 mb-3 text-dark">Fasting Timer</h3>
                        <p class="text-muted mb-0">Track your intermittent fasting periods and get notifications.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="h4 mb-4 text-center">About Our Health Tools</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Free to Use</h3>
                        <p class="text-muted small">All our health calculators are completely free with no registration required.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Privacy Focused</h3>
                        <p class="text-muted small">Your health data stays private and is never stored on our servers.</p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Evidence Based</h3>
                        <p class="text-muted small">Our calculators use scientifically validated formulas and methods.</p>
                        
                        <h3 class="h6 fw-bold"><i class="fas fa-check-circle text-danger me-2"></i>Easy to Use</h3>
                        <p class="text-muted small">Simple interface designed for quick and accurate health calculations.</p>
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
