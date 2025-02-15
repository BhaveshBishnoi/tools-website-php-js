<?php include '../../includes/header.php'; ?>
<title>Unit Converter Tool - Convert Units Online for Free</title>
<meta name="description" content="Convert units online for free with our fast and easy-to-use unit converter tool. No registration required!">
<meta name="keywords" content="unit converter, online unit converter, free unit tool, unit conversion">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Unit Converter",
  "description": "Convert units online for free.",
  "applicationCategory": "Unit Converter",
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
            <li class="breadcrumb-item"><a href="/tools/other-tools/">Other Tools</a></li>
            <li class="breadcrumb-item active">Unit Converter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-balance-scale fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Unit Converter</h1>
                        <p class="text-muted">Convert between different units.</p>
                    </div>
                    <form id="unitConverterForm">
                        <div class="mb-3">
                            <label class="form-label">Enter Value</label>
                            <input type="number" class="form-control" id="unitValue" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Unit</label>
                            <select class="form-control" id="unitType">
                                <option value="cm-to-inch">Centimeters to Inches</option>
                                <option value="inch-to-cm">Inches to Centimeters</option>
                                <option value="kg-to-lb">Kilograms to Pounds</option>
                                <option value="lb-to-kg">Pounds to Kilograms</option>
                                <option value="km-to-miles">Kilometers to Miles</option>
                                <option value="miles-to-km">Miles to Kilometers</option>
                                <option value="c-to-f">Celsius to Fahrenheit</option>
                                <option value="f-to-c">Fahrenheit to Celsius</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">Convert</button>
                        </div>
                    </form>
                    <div id="unitResult" class="text-center mt-4" style="display: none;">
                        <h2 class="h5">Converted Value: <span id="convertedValue"></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('unitConverterForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const value = parseFloat(document.getElementById('unitValue').value);
    const unitType = document.getElementById('unitType').value;
    let convertedValue;
    
    switch (unitType) {
        case 'cm-to-inch': convertedValue = (value / 2.54).toFixed(2) + ' inches'; break;
        case 'inch-to-cm': convertedValue = (value * 2.54).toFixed(2) + ' cm'; break;
        case 'kg-to-lb': convertedValue = (value * 2.20462).toFixed(2) + ' lbs'; break;
        case 'lb-to-kg': convertedValue = (value / 2.20462).toFixed(2) + ' kg'; break;
        case 'km-to-miles': convertedValue = (value / 1.60934).toFixed(2) + ' miles'; break;
        case 'miles-to-km': convertedValue = (value * 1.60934).toFixed(2) + ' km'; break;
        case 'c-to-f': convertedValue = ((value * 9/5) + 32).toFixed(2) + ' °F'; break;
        case 'f-to-c': convertedValue = ((value - 32) * 5/9).toFixed(2) + ' °C'; break;
    }
    document.getElementById('convertedValue').textContent = convertedValue;
    document.getElementById('unitResult').style.display = 'block';
});
</script>

<?php include '../../includes/footer.php'; ?>
