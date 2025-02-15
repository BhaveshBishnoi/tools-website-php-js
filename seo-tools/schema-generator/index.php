<?php
include '../../includes/header.php'; 
$pageTitle = "Schema Generator - Free SEO Tool";
$pageDescription = "Generate structured data markup to enhance search engine understanding and improve SEO.";
$pageKeywords = "schema generator, SEO tool, structured data, search engine optimization, rich snippets";
?>

<title>Schema Generator - Free SEO Tool</title>
<meta name="description" content="Generate structured data markup to enhance search engine understanding and improve SEO.">
<meta name="keywords" content="schema generator, SEO tool, structured data, search engine optimization, rich snippets">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Schema Generator",
  "description": "Generate structured data markup to enhance search engine understanding and improve SEO.",
  "applicationCategory": "SEO Tool",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}
</script>

<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/seo-tools/">SEO Tools</a></li>
            <li class="breadcrumb-item active">Schema Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-code fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Schema Generator</h1>
                        <p class="text-muted">Generate structured data markup for better SEO</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Select Schema Type</label>
                        <select class="form-select" id="schemaType">
                            <option value="">Choose a schema type...</option>
                            <optgroup label="Article Schemas">
                                <option value="NewsArticle">News Article</option>
                                <option value="BlogPosting">Blog Post</option>
                                <option value="TechArticle">Technical Article</option>
                            </optgroup>
                            <optgroup label="Business Schemas">
                                <option value="LocalBusiness">Local Business</option>
                                <option value="Restaurant">Restaurant</option>
                                <option value="Organization">Organization</option>
                            </optgroup>
                            <optgroup label="Product Schemas">
                                <option value="Product">Product</option>
                                <option value="Review">Product Review</option>
                                <option value="AggregateRating">Aggregate Rating</option>
                            </optgroup>
                            <optgroup label="Job Schemas">
                                <option value="JobPosting">Job Posting</option>
                                <option value="Occupation">Occupation</option>
                            </optgroup>
                            <optgroup label="Event Schemas">
                                <option value="Event">Event</option>
                                <option value="BusinessEvent">Business Event</option>
                                <option value="SportsEvent">Sports Event</option>
                            </optgroup>
                            <optgroup label="Other Schemas">
                                <option value="FAQPage">FAQ Page</option>
                                <option value="HowTo">How-To Guide</option>
                                <option value="Recipe">Recipe</option>
                                <option value="Course">Course</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Dynamic Form Fields -->
                    <div id="schemaFields" class="mb-4"></div>

                    <!-- Preview -->
                    <div class="mb-4" id="previewSection" style="display: none;">
                        <h3 class="h5 mb-3">Schema Preview</h3>
                        <div class="card bg-light">
                            <div class="card-body">
                                <pre class="mb-0"><code id="schemaPreview" class="language-json"></code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-danger flex-grow-1" id="generateBtn" disabled>
                            <i class="fas fa-code me-2"></i>Generate Schema
                        </button>
                        <button type="button" class="btn btn-outline-danger" id="copyBtn" style="display: none;">
                            <i class="fas fa-copy me-2"></i>Copy
                        </button>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="alert alert-danger mt-4" style="display: none;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">About Schema Generator</h2>
                    <p>Schema markup helps search engines understand your content better, potentially leading to rich snippets in search results. Common benefits include:</p>
                    <ul class="mb-4">
                        <li>Enhanced search result appearance</li>
                        <li>Better click-through rates</li>
                        <li>Improved search engine understanding</li>
                        <li>Potential for featured snippets</li>
                    </ul>

                    <h3 class="h6 mb-3">Implementation Instructions</h3>
                    <ol class="mb-0">
                        <li>Copy the generated schema markup</li>
                        <li>Add it to your HTML's <code>&lt;head&gt;</code> section</li>
                        <li>Validate using Google's Rich Results Test</li>
                        <li>Monitor performance in Search Console</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.field-group {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 0.375rem;
    margin-bottom: 1rem;
}

.field-group:last-child {
    margin-bottom: 0;
}

.nested-fields {
    margin-left: 1.5rem;
    padding-left: 1rem;
    border-left: 2px solid #dee2e6;
}

pre {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 0.375rem;
    max-height: 400px;
    overflow: auto;
}

code {
    font-family: Monaco, Consolas, "Courier New", monospace;
}
</style>

<script>
// Schema field definitions
const schemaFields = {
    NewsArticle: {
        headline: { type: 'text', label: 'Headline', required: true },
        description: { type: 'textarea', label: 'Description', required: true },
        articleBody: { type: 'textarea', label: 'Article Body', required: true },
        datePublished: { type: 'datetime-local', label: 'Date Published', required: true },
        author: { type: 'text', label: 'Author Name', required: true },
        publisher: {
            type: 'group',
            label: 'Publisher',
            fields: {
                name: { type: 'text', label: 'Name', required: true },
                logo: { type: 'url', label: 'Logo URL', required: true }
            }
        }
    },
    JobPosting: {
        title: { type: 'text', label: 'Job Title', required: true },
        description: { type: 'textarea', label: 'Job Description', required: true },
        datePosted: { type: 'datetime-local', label: 'Date Posted', required: true },
        validThrough: { type: 'datetime-local', label: 'Valid Through', required: true },
        employmentType: {
            type: 'select',
            label: 'Employment Type',
            options: [
                'FULL_TIME',
                'PART_TIME',
                'CONTRACTOR',
                'TEMPORARY',
                'INTERN',
                'VOLUNTEER',
                'PER_DIEM'
            ],
            required: true
        },
        hiringOrganization: {
            type: 'group',
            label: 'Hiring Organization',
            fields: {
                name: { type: 'text', label: 'Company Name', required: true },
                sameAs: { type: 'url', label: 'Company Website', required: true }
            }
        },
        jobLocation: {
            type: 'group',
            label: 'Job Location',
            fields: {
                streetAddress: { type: 'text', label: 'Street Address', required: true },
                addressLocality: { type: 'text', label: 'City', required: true },
                addressRegion: { type: 'text', label: 'State/Region', required: true },
                postalCode: { type: 'text', label: 'Postal Code', required: true },
                addressCountry: { type: 'text', label: 'Country', required: true }
            }
        },
        baseSalary: {
            type: 'group',
            label: 'Base Salary',
            fields: {
                currency: { type: 'text', label: 'Currency (e.g., USD)', required: true },
                value: { type: 'number', label: 'Amount', required: true },
                unitText: {
                    type: 'select',
                    label: 'Unit',
                    options: ['HOUR', 'DAY', 'WEEK', 'MONTH', 'YEAR'],
                    required: true
                }
            }
        }
    },
    Product: {
        name: { type: 'text', label: 'Product Name', required: true },
        description: { type: 'textarea', label: 'Description', required: true },
        image: { type: 'url', label: 'Product Image URL', required: true },
        brand: {
            type: 'group',
            label: 'Brand',
            fields: {
                name: { type: 'text', label: 'Brand Name', required: true }
            }
        },
        offers: {
            type: 'group',
            label: 'Offer',
            fields: {
                price: { type: 'number', label: 'Price', required: true },
                priceCurrency: { type: 'text', label: 'Currency (e.g., USD)', required: true },
                availability: {
                    type: 'select',
                    label: 'Availability',
                    options: [
                        'InStock',
                        'OutOfStock',
                        'PreOrder',
                        'BackOrder'
                    ],
                    required: true
                }
            }
        },
        aggregateRating: {
            type: 'group',
            label: 'Aggregate Rating',
            fields: {
                ratingValue: { type: 'number', label: 'Rating Value (1-5)', required: true },
                reviewCount: { type: 'number', label: 'Number of Reviews', required: true }
            }
        }
    },
    // Add more schema types as needed
};

document.addEventListener('DOMContentLoaded', function() {
    const schemaType = document.getElementById('schemaType');
    const schemaFieldsContainer = document.getElementById('schemaFields');
    const generateBtn = document.getElementById('generateBtn');
    const copyBtn = document.getElementById('copyBtn');
    const previewSection = document.getElementById('previewSection');
    const schemaPreview = document.getElementById('schemaPreview');
    const errorMessage = document.getElementById('errorMessage');

    // Handle schema type selection
    schemaType.addEventListener('change', function() {
        const type = this.value;
        if (!type) {
            schemaFieldsContainer.innerHTML = '';
            generateBtn.disabled = true;
            previewSection.style.display = 'none';
            copyBtn.style.display = 'none';
            return;
        }

        generateBtn.disabled = false;
        generateFields(type);
    });

    // Generate schema fields
    function generateFields(type) {
        const fields = schemaFields[type];
        if (!fields) {
            showError(`Schema type ${type} is not yet implemented`);
            return;
        }

        schemaFieldsContainer.innerHTML = '';
        Object.entries(fields).forEach(([key, field]) => {
            const fieldGroup = document.createElement('div');
            fieldGroup.className = 'field-group';
            
            if (field.type === 'group') {
                fieldGroup.innerHTML = 
                    `<h4 class="h6 mb-3">${field.label}</h4>
                    <div class="nested-fields" id="${key}">
                        ${generateGroupFields(field.fields)}
                    </div>`
                ;
            } else {
                fieldGroup.innerHTML = generateField(key, field);
            }
            
            schemaFieldsContainer.appendChild(fieldGroup);
        });
    }

    // Generate individual field
    function generateField(key, field) {
        const required = field.required ? 'required' : '';
        switch (field.type) {
            case 'textarea':
                return `
                    <div class="mb-3">
                        <label class="form-label">${field.label}</label>
                        <textarea class="form-control" id="${key}" rows="3" ${required}></textarea>
                    </div>`
                ;
            case 'select':
                const options = field.options.map(opt => 
                    `<option value="${opt}">${opt}</option>`
                ).join('');
                return `
                    <div class="mb-3">
                        <label class="form-label">${field.label}</label>
                        <select class="form-select" id="${key}" ${required}>
                            <option value="">Select...</option>
                            ${options}
                        </select>
                    </div>`
                ;
            default:
                return `
                    <div class="mb-3">
                        <label class="form-label">${field.label}</label>
                        <input type="${field.type}" class="form-control" id="${key}" ${required}>
                    </div>`
                ;
        }
    }

    // Generate group fields
    function generateGroupFields(fields) {
        return Object.entries(fields).map(([key, field]) => 
            generateField(key, field)
        ).join('');
    }

    // Generate schema
    generateBtn.addEventListener('click', function() {
        const type = schemaType.value;
        if (!type) return;

        try {
            const schema = {
                '@context': 'https://schema.org',
                '@type': type
            };

            // Collect field values
            const fields = schemaFields[type];
            Object.entries(fields).forEach(([key, field]) => {
                if (field.type === 'group') {
                    schema[key] = {
                        '@type': key.charAt(0).toUpperCase() + key.slice(1)
                    };
                    Object.keys(field.fields).forEach(subKey => {
                        const value = document.getElementById(subKey)?.value;
                        if (value) schema[key][subKey] = value;
                    });
                } else {
                    const value = document.getElementById(key)?.value;
                    if (value) schema[key] = value;
                }
            });

            // Display preview
            schemaPreview.textContent = JSON.stringify(schema, null, 2);
            previewSection.style.display = 'block';
            copyBtn.style.display = 'block';
            errorMessage.style.display = 'none';

        } catch (error) {
            showError(error.message);
        }
    });

    // Copy schema
    copyBtn.addEventListener('click', function() {
        const schema = schemaPreview.textContent;
        navigator.clipboard.writeText(schema).then(() => {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        });
    });

    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
    }
});
</script>

<?php include '../../includes/footer.php'; ?>