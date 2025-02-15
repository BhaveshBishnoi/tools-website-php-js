<?php include '../../includes/header.php'; ?>
<title>Advanced Percentage Calculator - High Quality Inputs</title>
<meta name="description" content="Use our advanced percentage calculator with high-quality inputs for precise calculations. No registration required!">
<meta name="keywords" content="advanced percentage calculator, high-quality inputs, online percentage tool">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Advanced Percentage Calculator",
  "description": "Use our advanced percentage calculator with high-quality inputs for precise calculations.",
  "applicationCategory": "Calculator",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-3">Advanced Percentage Calculator</h1>
                    <p class="text-muted">Easily calculate percentages with our advanced tool. Suitable for financial analysis, academic purposes, and everyday calculations.</p>
                    <form id="percentageCalculatorForm">
                        <div class="mb-3">
                            <label for="baseValue" class="form-label">Base Value</label>
                            <input type="number" class="form-control" id="baseValue" placeholder="Enter base value">
                        </div>
                        <div class="mb-3">
                            <label for="percentage" class="form-label">Percentage</label>
                            <input type="number" class="form-control" id="percentage" placeholder="Enter percentage">
                        </div>
                        <button type="button" class="btn btn-danger" onclick="calculatePercentage()">Calculate</button>
                    </form>
                    <div id="result" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto">
            <h2 class="h4">How to Use</h2>
            <p>Enter the base value and the percentage you wish to calculate. Click 'Calculate' to see the result.</p>
            <h2 class="h4">Where to Use</h2>
            <p>This tool is perfect for calculating discounts, interest rates, and percentage increases or decreases in various contexts.</p>
            <h2 class="h4">Benefits</h2>
            <ul>
                <li>Quick and accurate percentage calculations.</li>
                <li>Intuitive interface for ease of use.</li>
                <li>Free to use without any registration.</li>
            </ul>
        </div>
    </div>
</div>

<script>
function calculatePercentage() {
    const baseValue = parseFloat(document.getElementById('baseValue').value);
    const percentage = parseFloat(document.getElementById('percentage').value);
    if (!isNaN(baseValue) && !isNaN(percentage)) {
        const result = (baseValue * percentage) / 100;
        document.getElementById('result').innerText = `Result: ${result}`;
    } else {
        document.getElementById('result').innerText = 'Please enter valid numbers';
    }
}
</script>