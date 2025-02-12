<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Data Converter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-exchange-alt fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Data Converter</h1>
                        <p class="text-muted">Convert between different data formats</p>
                    </div>

                    <div class="row g-4">
                        <!-- Input Section -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2 class="h5 mb-0">Input Data</h2>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-danger" id="formatInput">
                                                <i class="fas fa-align-left me-2"></i>Format
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" id="clearInput">
                                                <i class="fas fa-trash-alt me-2"></i>Clear
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <select class="form-select" id="inputFormat">
                                            <option value="json">JSON</option>
                                            <option value="xml">XML</option>
                                            <option value="yaml">YAML</option>
                                            <option value="csv">CSV</option>
                                            <option value="toml">TOML</option>
                                        </select>
                                    </div>

                                    <div class="position-relative">
                                        <textarea id="inputData" class="form-control font-monospace" rows="15" placeholder="Enter your data here..."></textarea>
                                    </div>

                                    <div class="mt-3">
                                        <div class="row g-2">
                                            <div class="col">
                                                <select class="form-select" id="outputFormat">
                                                    <option value="json">JSON</option>
                                                    <option value="xml">XML</option>
                                                    <option value="yaml">YAML</option>
                                                    <option value="csv">CSV</option>
                                                    <option value="toml">TOML</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-danger" id="convertBtn">
                                                    <i class="fas fa-sync-alt me-2"></i>Convert
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Output Section -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2 class="h5 mb-0">Output Data</h2>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-danger" id="formatOutput">
                                                <i class="fas fa-align-left me-2"></i>Format
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" id="copyOutput">
                                                <i class="fas fa-copy me-2"></i>Copy
                                            </button>
                                        </div>
                                    </div>

                                    <div class="position-relative">
                                        <textarea id="outputData" class="form-control font-monospace" rows="15" readonly></textarea>
                                    </div>

                                    <!-- Error Message -->
                                    <div id="errorMessage" class="alert alert-danger mt-3" style="display: none;">
                                        <i class="fas fa-exclamation-circle me-2"></i>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sample Data Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">Sample Data</h2>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadSample('json')">
                                <i class="fas fa-code me-2"></i>JSON Example
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadSample('xml')">
                                <i class="fas fa-code me-2"></i>XML Example
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadSample('yaml')">
                                <i class="fas fa-file-code me-2"></i>YAML Example
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadSample('csv')">
                                <i class="fas fa-file-csv me-2"></i>CSV Example
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="row mt-4 g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">Supported Formats</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-danger me-2"></i>
                                            <strong>JSON</strong> - JavaScript Object Notation
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-danger me-2"></i>
                                            <strong>XML</strong> - Extensible Markup Language
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle text-danger me-2"></i>
                                            <strong>YAML</strong> - YAML Ain't Markup Language
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-danger me-2"></i>
                                            <strong>CSV</strong> - Comma Separated Values
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle text-danger me-2"></i>
                                            <strong>TOML</strong> - Tom's Obvious Minimal Language
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h5 mb-3">Features</h2>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Format Validation:</strong> Ensure input data is valid
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Pretty Printing:</strong> Format output for readability
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Sample Data:</strong> Example data for each format
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-danger me-2"></i>
                                    <strong>Error Handling:</strong> Clear error messages
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/4.1.0/js-yaml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fast-xml-parser/4.2.2/fxparser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@iarna/toml@3.0.0/dist/toml.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputData = document.getElementById('inputData');
    const outputData = document.getElementById('outputData');
    const inputFormat = document.getElementById('inputFormat');
    const outputFormat = document.getElementById('outputFormat');
    const convertBtn = document.getElementById('convertBtn');
    const formatInput = document.getElementById('formatInput');
    const formatOutput = document.getElementById('formatOutput');
    const clearInput = document.getElementById('clearInput');
    const copyOutput = document.getElementById('copyOutput');
    const errorMessage = document.getElementById('errorMessage');

    // Convert data
    convertBtn.addEventListener('click', function() {
        try {
            const input = inputData.value;
            if (!input.trim()) {
                throw new Error('Please enter some data to convert');
            }

            // Parse input
            let data = parseData(input, inputFormat.value);

            // Convert to output format
            let result = convertData(data, outputFormat.value);

            // Display result
            outputData.value = result;
            hideError();
        } catch (error) {
            showError(error.message);
        }
    });

    // Format input
    formatInput.addEventListener('click', function() {
        try {
            const input = inputData.value;
            if (!input.trim()) return;

            let data = parseData(input, inputFormat.value);
            inputData.value = convertData(data, inputFormat.value);
            hideError();
        } catch (error) {
            showError(error.message);
        }
    });

    // Format output
    formatOutput.addEventListener('click', function() {
        try {
            const output = outputData.value;
            if (!output.trim()) return;

            let data = parseData(output, outputFormat.value);
            outputData.value = convertData(data, outputFormat.value);
            hideError();
        } catch (error) {
            showError(error.message);
        }
    });

    // Clear input
    clearInput.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear the input?')) {
            inputData.value = '';
            outputData.value = '';
            hideError();
        }
    });

    // Copy output
    copyOutput.addEventListener('click', function() {
        outputData.select();
        document.execCommand('copy');
        
        const originalText = copyOutput.innerHTML;
        copyOutput.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
        setTimeout(() => {
            copyOutput.innerHTML = originalText;
        }, 2000);
    });

    // Parse data from string
    function parseData(input, format) {
        switch (format) {
            case 'json':
                return JSON.parse(input);
            case 'xml':
                const parser = new XMLParser({
                    ignoreAttributes: false,
                    attributeNamePrefix: "@_",
                    textNodeName: "#text"
                });
                return parser.parse(input);
            case 'yaml':
                return jsyaml.load(input);
            case 'csv':
                return Papa.parse(input, {header: true}).data;
            case 'toml':
                return TOML.parse(input);
            default:
                throw new Error('Unsupported input format');
        }
    }

    // Convert data to string
    function convertData(data, format) {
        switch (format) {
            case 'json':
                return JSON.stringify(data, null, 2);
            case 'xml':
                const builder = new XMLBuilder({
                    format: true,
                    ignoreAttributes: false,
                    attributeNamePrefix: "@_",
                    textNodeName: "#text"
                });
                return builder.build(data);
            case 'yaml':
                return jsyaml.dump(data);
            case 'csv':
                return Papa.unparse(data);
            case 'toml':
                return TOML.stringify(data);
            default:
                throw new Error('Unsupported output format');
        }
    }

    // Load sample data
    window.loadSample = function(format) {
        let sample = '';
        switch (format) {
            case 'json':
                sample = `{
  "name": "John Doe",
  "age": 30,
  "email": "john@example.com",
  "address": {
    "street": "123 Main St",
    "city": "New York",
    "country": "USA"
  },
  "hobbies": ["reading", "music", "sports"]
}`;
                break;
            case 'xml':
                sample = `<?xml version="1.0" encoding="UTF-8"?>
<person>
    <name>John Doe</name>
    <age>30</age>
    <email>john@example.com</email>
    <address>
        <street>123 Main St</street>
        <city>New York</city>
        <country>USA</country>
    </address>
    <hobbies>
        <hobby>reading</hobby>
        <hobby>music</hobby>
        <hobby>sports</hobby>
    </hobbies>
</person>`;
                break;
            case 'yaml':
                sample = `name: John Doe
age: 30
email: john@example.com
address:
  street: 123 Main St
  city: New York
  country: USA
hobbies:
  - reading
  - music
  - sports`;
                break;
            case 'csv':
                sample = `name,age,email,street,city,country
John Doe,30,john@example.com,123 Main St,New York,USA
Jane Smith,25,jane@example.com,456 Oak Ave,Los Angeles,USA
Bob Johnson,35,bob@example.com,789 Pine Rd,Chicago,USA`;
                break;
        }

        inputData.value = sample;
        inputFormat.value = format;
    };

    // Error handling
    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
    }

    function hideError() {
        errorMessage.style.display = 'none';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>
