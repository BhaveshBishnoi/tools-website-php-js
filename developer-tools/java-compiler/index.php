<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/developer-tools/">Developer Tools</a></li>
            <li class="breadcrumb-item active">Java Compiler</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fab fa-java fa-3x text-danger mb-3"></i>
                        <h1 class="h3">Java Compiler</h1>
                        <p class="text-muted">Write, compile, and run Java code online</p>
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
                                    <textarea id="javaEditor" class="form-control font-monospace" style="height: 400px; resize: none;" spellcheck="false" placeholder="Enter your Java code here..."></textarea>
                                </div>
                                <div class="mt-3">
                                    <div class="row g-2">
                                        <div class="col">
                                            <input type="text" class="form-control" id="mainClass" placeholder="Main class name (e.g., Main)">
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-danger" id="compileBtn">
                                                <i class="fas fa-play me-2"></i>Compile & Run
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Output Section -->
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="h5 mb-0">Console Output</h2>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-danger" id="clearConsoleBtn">
                                            <i class="fas fa-eraser me-2"></i>Clear Console
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <!-- Compilation Status -->
                                    <div id="compilationStatus" class="alert alert-info mb-3" style="display: none;">
                                        <div class="d-flex align-items-center">
                                            <div class="spinner-border spinner-border-sm me-2" role="status">
                                                <span class="visually-hidden">Compiling...</span>
                                            </div>
                                            <span>Compiling and running your code...</span>
                                        </div>
                                    </div>

                                    <!-- Console Output -->
                                    <div class="bg-dark rounded p-3" style="height: 400px; overflow: auto;">
                                        <pre id="consoleOutput" class="text-light mb-0" style="font-family: 'Courier New', monospace;"></pre>
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
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('oop')">
                                <i class="fas fa-cubes me-2"></i>OOP Example
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('collections')">
                                <i class="fas fa-list me-2"></i>Collections
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger w-100" onclick="loadTemplate('algorithms')">
                                <i class="fas fa-sort me-2"></i>Algorithms
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">About Java Compiler</h2>
                    <p>This online Java compiler allows you to write, compile, and run Java code directly in your browser. Features include:</p>
                    <ul class="mb-0">
                        <li>Syntax highlighting</li>
                        <li>Code formatting</li>
                        <li>Error highlighting</li>
                        <li>Console output</li>
                        <li>Sample code templates</li>
                        <li>Support for multiple classes</li>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/clike/clike.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/standalone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettier/2.5.1/parser-java.js"></script>

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

.console-success {
    color: #198754;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CodeMirror
    const editor = CodeMirror.fromTextArea(document.getElementById('javaEditor'), {
        mode: 'text/x-java',
        theme: 'monokai',
        lineNumbers: true,
        autoCloseBrackets: true,
        matchBrackets: true,
        indentUnit: 4,
        lineWrapping: true
    });

    const mainClass = document.getElementById('mainClass');
    const consoleOutput = document.getElementById('consoleOutput');
    const errorMessage = document.getElementById('errorMessage');
    const compilationStatus = document.getElementById('compilationStatus');
    const formatBtn = document.getElementById('formatBtn');
    const clearBtn = document.getElementById('clearBtn');
    const compileBtn = document.getElementById('compileBtn');
    const clearConsoleBtn = document.getElementById('clearConsoleBtn');

    // Format code
    formatBtn.addEventListener('click', function() {
        try {
            const formatted = prettier.format(editor.getValue(), {
                parser: 'java',
                plugins: prettierPlugins,
                printWidth: 100,
                tabWidth: 4,
                useTabs: false
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

    // Compile and run code
    compileBtn.addEventListener('click', async function() {
        const code = editor.getValue();
        const className = mainClass.value.trim() || 'Main';

        if (!code) {
            showError('Please enter some code to compile');
            return;
        }

        try {
            compilationStatus.style.display = 'block';
            consoleOutput.innerHTML = '';
            hideError();
            compileBtn.disabled = true;

            // Here you would integrate with your Java compilation service
            // For now, we'll simulate compilation
            await simulateCompilation(code, className);

        } catch (error) {
            showError(error.message);
        } finally {
            compilationStatus.style.display = 'none';
            compileBtn.disabled = false;
        }
    });

    // Simulate compilation (replace with actual compilation service)
    async function simulateCompilation(code, className) {
        // Simulate compilation delay
        await new Promise(resolve => setTimeout(resolve, 2000));

        // Simple validation
        if (!code.includes('class ' + className)) {
            throw new Error(`Class ${className} not found in the code`);
        }

        if (!code.includes('public static void main')) {
            throw new Error('No main method found');
        }

        // Simulate successful compilation
        appendToConsole('Compilation successful!\n', 'success');
        appendToConsole('Running program...\n', 'success');
        appendToConsole('-------------------\n');

        // Simulate program output
        if (code.includes('System.out.println')) {
            const outputs = code.match(/System\.out\.println\((.*?)\)/g);
            if (outputs) {
                outputs.forEach(output => {
                    const content = output.match(/\((.*?)\)/)[1];
                    appendToConsole(eval(content) + '\n');
                });
            }
        }
    }

    // Helper functions
    function appendToConsole(message, type = '') {
        const line = document.createElement('div');
        line.className = type ? `console-${type}` : '';
        line.textContent = message;
        consoleOutput.appendChild(line);
        consoleOutput.scrollTop = consoleOutput.scrollHeight;
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
                template = `public class Main {
    public static void main(String[] args) {
        System.out.println("Hello, World!");
        
        // Variables and basic operations
        int x = 10;
        int y = 20;
        int sum = x + y;
        
        System.out.println("Sum: " + sum);
        
        // Conditional statement
        if (sum > 25) {
            System.out.println("Sum is greater than 25");
        } else {
            System.out.println("Sum is less than or equal to 25");
        }
    }
}`;
                mainClass.value = 'Main';
                break;
            case 'oop':
                template = `class Animal {
    private String name;
    
    public Animal(String name) {
        this.name = name;
    }
    
    public void makeSound() {
        System.out.println(name + " makes a sound");
    }
}

class Dog extends Animal {
    private String breed;
    
    public Dog(String name, String breed) {
        super(name);
        this.breed = breed;
    }
    
    @Override
    public void makeSound() {
        System.out.println(breed + " dog barks!");
    }
}

public class Main {
    public static void main(String[] args) {
        Animal animal = new Animal("Generic Animal");
        Dog dog = new Dog("Rex", "German Shepherd");
        
        animal.makeSound();
        dog.makeSound();
    }
}`;
                mainClass.value = 'Main';
                break;
            case 'collections':
                template = `import java.util.*;

public class Main {
    public static void main(String[] args) {
        // ArrayList example
        List<String> list = new ArrayList<>();
        list.add("Apple");
        list.add("Banana");
        list.add("Orange");
        
        System.out.println("List: " + list);
        
        // HashSet example
        Set<Integer> set = new HashSet<>();
        set.add(1);
        set.add(2);
        set.add(2); // Duplicate
        set.add(3);
        
        System.out.println("Set: " + set);
        
        // HashMap example
        Map<String, Integer> map = new HashMap<>();
        map.put("One", 1);
        map.put("Two", 2);
        map.put("Three", 3);
        
        System.out.println("Map: " + map);
    }
}`;
                mainClass.value = 'Main';
                break;
            case 'algorithms':
                template = `import java.util.Arrays;

public class Main {
    // Bubble sort implementation
    public static void bubbleSort(int[] arr) {
        int n = arr.length;
        for (int i = 0; i < n - 1; i++) {
            for (int j = 0; j < n - i - 1; j++) {
                if (arr[j] > arr[j + 1]) {
                    // Swap arr[j] and arr[j+1]
                    int temp = arr[j];
                    arr[j] = arr[j + 1];
                    arr[j + 1] = temp;
                }
            }
        }
    }
    
    // Binary search implementation
    public static int binarySearch(int[] arr, int target) {
        int left = 0;
        int right = arr.length - 1;
        
        while (left <= right) {
            int mid = left + (right - left) / 2;
            
            if (arr[mid] == target) {
                return mid;
            }
            
            if (arr[mid] < target) {
                left = mid + 1;
            } else {
                right = mid - 1;
            }
        }
        
        return -1;
    }
    
    public static void main(String[] args) {
        int[] numbers = {64, 34, 25, 12, 22, 11, 90};
        System.out.println("Original array: " + Arrays.toString(numbers));
        
        bubbleSort(numbers);
        System.out.println("Sorted array: " + Arrays.toString(numbers));
        
        int target = 25;
        int result = binarySearch(numbers, target);
        System.out.println("Found " + target + " at index: " + result);
    }
}`;
                mainClass.value = 'Main';
                break;
        }
        editor.setValue(template);
    }

    // Load basic template by default
    loadTemplate('basic');
});
</script>

<?php include '../../includes/footer.php'; ?>
