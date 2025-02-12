<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">JavaScript Compiler</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fab fa-js fa-3x text-danger mb-3"></i>
                        <h1 class="h3">JavaScript Compiler</h1>
                        <p class="text-muted">Write, compile, and test JavaScript code with real-time output</p>
                    </div>

                    <div class="row g-4">
                        <!-- Editor Section -->
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="h5 mb-0">Code Editor</h2>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-danger" id="formatBtn">
                                            <i class="fas fa-align-left me-2"></i>Format
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" id="clearBtn">
                                            <i class="fas fa-trash-alt me-2"></i>Clear
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-grow-1 position-relative">
                                    <textarea id="jsEditor" class="form-control font-monospace" style="height: 400px; resize: none;" spellcheck="false" placeholder="Enter your JavaScript code here..."></textarea>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-danger w-100" id="runBtn">
                                        <i class="fas fa-play me-2"></i>Run Code
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Output Section -->
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="h5 mb-0">Console Output</h2>
                                    <button class="btn btn-sm btn-outline-danger" id="clearConsoleBtn">
                                        <i class="fas fa-eraser me-2"></i>Clear Console
                                    </button>
                                </div>
                                <div class="flex-grow-1 bg-dark rounded p-3" style="height: 400px; overflow: auto;">
                                    <pre id="consoleOutput" class="text-light mb-0" style="font-family: 'Courier New', monospace;"></pre>
                                </div>
                                <div class="mt-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="liveExecutionToggle">
                                        <label class="form-check-label" for="liveExecutionToggle">
                                            Live Execution
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="alert alert-danger mt-4" style="display: none;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- Sample Code Templates -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">Sample Code</h2>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('basic')">
                                <i class="fas fa-code me-2"></i>Basic Example
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('dom')">
                                <i class="fas fa-sitemap me-2"></i>DOM Manipulation
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('async')">
                                <i class="fas fa-sync me-2"></i>Async/Await
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('classes')">
                                <i class="fas fa-cube me-2"></i>Classes
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">About JavaScript Compiler</h2>
                    <p>This tool provides a sandbox environment to write and test JavaScript code. Features include:</p>
                    <ul class="mb-0">
                        <li>Syntax highlighting</li>
                        <li>Code formatting</li>
                        <li>Real-time execution</li>
                        <li>Console output simulation</li>
                        <li>Error handling</li>
                        <li>Sample code templates</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include CodeMirror -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/monokai.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/standalone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/parser-babel.js"></script>

<style>
.CodeMirror {
    height: 400px;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
}

#consoleOutput {
    min-height: 100%;
    margin: 0;
    white-space: pre-wrap;
}

.console-error {
    color: #dc3545;
}

.console-warn {
    color: #ffc107;
}

.console-info {
    color: #0dcaf0;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CodeMirror
    const editor = CodeMirror.fromTextArea(document.getElementById('jsEditor'), {
        mode: 'javascript',
        theme: 'monokai',
        lineNumbers: true,
        autoCloseBrackets: true,
        matchBrackets: true,
        indentUnit: 4,
        lineWrapping: true
    });

    const consoleOutput = document.getElementById('consoleOutput');
    const errorMessage = document.getElementById('errorMessage');
    const formatBtn = document.getElementById('formatBtn');
    const clearBtn = document.getElementById('clearBtn');
    const runBtn = document.getElementById('runBtn');
    const clearConsoleBtn = document.getElementById('clearConsoleBtn');
    const liveExecutionToggle = document.getElementById('liveExecutionToggle');

    // Console simulation
    const consoleSimulator = {
        log: function(...args) {
            appendToConsole(args.map(arg => formatValue(arg)).join(' '));
        },
        error: function(...args) {
            appendToConsole(args.map(arg => formatValue(arg)).join(' '), 'error');
        },
        warn: function(...args) {
            appendToConsole(args.map(arg => formatValue(arg)).join(' '), 'warn');
        },
        info: function(...args) {
            appendToConsole(args.map(arg => formatValue(arg)).join(' '), 'info');
        },
        clear: function() {
            consoleOutput.innerHTML = '';
        }
    };

    // Format code
    formatBtn.addEventListener('click', function() {
        try {
            const formatted = prettier.format(editor.getValue(), {
                parser: 'babel',
                plugins: prettierPlugins,
                printWidth: 80,
                tabWidth: 4,
                useTabs: false,
                semi: true,
                singleQuote: true
            });
            editor.setValue(formatted);
            hideError();
        } catch (error) {
            showError(error.message);
        }
    });

    // Clear editor
    clearBtn.addEventListener('click', function() {
        if (confirm('Are you sure you want to clear the editor?')) {
            editor.setValue('');
            hideError();
        }
    });

    // Clear console
    clearConsoleBtn.addEventListener('click', function() {
        consoleOutput.innerHTML = '';
    });

    // Run code
    runBtn.addEventListener('click', executeCode);

    // Live execution
    let executeTimeout;
    editor.on('change', function() {
        if (liveExecutionToggle.checked) {
            clearTimeout(executeTimeout);
            executeTimeout = setTimeout(executeCode, 1000);
        }
    });

    // Execute code
    function executeCode() {
        const code = editor.getValue();
        consoleOutput.innerHTML = '';
        hideError();

        try {
            // Create sandbox
            const sandbox = {
                console: consoleSimulator,
                setTimeout: window.setTimeout,
                setInterval: window.setInterval,
                clearTimeout: window.clearTimeout,
                clearInterval: window.clearInterval
            };

            // Execute code
            const wrappedCode = `
                "use strict";
                (async function() {
                    try {
                        ${code}
                    } catch (error) {
                        console.error(error);
                    }
                })();
            `;

            const func = new Function(...Object.keys(sandbox), wrappedCode);
            func(...Object.values(sandbox));
        } catch (error) {
            showError(error.message);
        }
    }

    // Helper functions
    function appendToConsole(message, type = 'log') {
        const line = document.createElement('div');
        line.className = type ? `console-${type}` : '';
        line.textContent = message;
        consoleOutput.appendChild(line);
        consoleOutput.scrollTop = consoleOutput.scrollHeight;
    }

    function formatValue(value) {
        if (value === null) return 'null';
        if (value === undefined) return 'undefined';
        if (typeof value === 'object') {
            try {
                return JSON.stringify(value);
            } catch (e) {
                return value.toString();
            }
        }
        return String(value);
    }

    function showError(message) {
        errorMessage.querySelector('span').textContent = message;
        errorMessage.style.display = 'block';
    }

    function hideError() {
        errorMessage.style.display = 'none';
    }

    // Load template
    window.loadTemplate = function(type) {
        let template = '';
        switch (type) {
            case 'basic':
                template = `// Basic JavaScript Example
function greet(name) {
    return \`Hello, \${name}!\`;
}

console.log(greet('World'));

// Array operations
const numbers = [1, 2, 3, 4, 5];
const doubled = numbers.map(n => n * 2);
console.log('Doubled numbers:', doubled);

// Object manipulation
const person = {
    name: 'John',
    age: 30,
    hobbies: ['reading', 'music']
};

console.log('Person:', person);`;
                break;
            case 'dom':
                template = `// DOM Manipulation Example
// Note: This is just for demonstration
// Actual DOM manipulation requires a browser environment

class DOMElement {
    constructor(tag, attributes = {}) {
        this.tag = tag;
        this.attributes = attributes;
        this.children = [];
    }

    appendChild(child) {
        this.children.push(child);
    }

    toString() {
        const attrs = Object.entries(this.attributes)
            .map(([key, value]) => \`\${key}="\${value}"\`)
            .join(' ');
        
        return \`<\${this.tag} \${attrs}>\${this.children.join('')}</\${this.tag}>\`;
    }
}

// Create a simple DOM structure
const div = new DOMElement('div', { class: 'container' });
const h1 = new DOMElement('h1', { style: 'color: blue' });
h1.appendChild('Hello, DOM!');
div.appendChild(h1);

console.log(div.toString());`;
                break;
            case 'async':
                template = `// Async/Await Example
async function fetchUser(id) {
    // Simulate API call
    console.log(\`Fetching user \${id}...\`);
    await new Promise(resolve => setTimeout(resolve, 1000));
    
    return {
        id,
        name: 'John Doe',
        email: 'john@example.com'
    };
}

async function fetchUserPosts(userId) {
    // Simulate API call
    console.log(\`Fetching posts for user \${userId}...\`);
    await new Promise(resolve => setTimeout(resolve, 1000));
    
    return [
        { id: 1, title: 'Post 1' },
        { id: 2, title: 'Post 2' }
    ];
}

// Using async/await
async function getUserData(id) {
    try {
        const user = await fetchUser(id);
        console.log('User:', user);
        
        const posts = await fetchUserPosts(user.id);
        console.log('Posts:', posts);
    } catch (error) {
        console.error('Error:', error);
    }
}

getUserData(1);`;
                break;
            case 'classes':
                template = `// ES6 Classes Example
class Animal {
    constructor(name) {
        this.name = name;
    }
    
    speak() {
        console.log(\`\${this.name} makes a sound.\`);
    }
}

class Dog extends Animal {
    constructor(name, breed) {
        super(name);
        this.breed = breed;
    }
    
    speak() {
        console.log(\`\${this.name} barks!\`);
    }
    
    fetch() {
        console.log(\`\${this.name} fetches the ball.\`);
    }
}

// Create instances
const animal = new Animal('Generic Animal');
const dog = new Dog('Rex', 'German Shepherd');

// Test the classes
animal.speak();
console.log('---');

dog.speak();
dog.fetch();
console.log('Dog breed:', dog.breed);`;
                break;
        }
        editor.setValue(template);
    }

    // Load basic template by default
    loadTemplate('basic');
});
</script>

<?php include '../../includes/footer.php'; ?>
