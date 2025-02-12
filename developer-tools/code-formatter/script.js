document.addEventListener('DOMContentLoaded', function() {
    // Initialize CodeMirror editors
    const inputEditor = CodeMirror.fromTextArea(document.getElementById('input-code'), {
        lineNumbers: true,
        theme: 'monokai',
        mode: 'html',
        lineWrapping: true
    });

    const outputEditor = CodeMirror.fromTextArea(document.getElementById('output-code'), {
        lineNumbers: true,
        theme: 'monokai',
        mode: 'html',
        lineWrapping: true,
        readOnly: true
    });

    // Language selector
    const languageSelect = document.getElementById('language');
    languageSelect.addEventListener('change', function() {
        const mode = this.value;
        inputEditor.setOption('mode', mode);
        outputEditor.setOption('mode', mode);
    });

    // Format button
    document.getElementById('format-btn').addEventListener('click', function() {
        const code = inputEditor.getValue();
        const language = languageSelect.value;
        let formattedCode = '';

        const options = {
            indent_size: 4,
            indent_char: ' ',
            max_preserve_newlines: 2,
            preserve_newlines: true,
            keep_array_indentation: false,
            break_chained_methods: false,
            indent_scripts: 'normal',
            brace_style: 'collapse',
            space_before_conditional: true,
            unescape_strings: false,
            jslint_happy: false,
            end_with_newline: true,
            wrap_line_length: 0,
            indent_inner_html: false,
            comma_first: false,
            e4x: false,
            indent_empty_lines: false
        };

        try {
            switch(language) {
                case 'html':
                    formattedCode = html_beautify(code, options);
                    break;
                case 'css':
                    formattedCode = css_beautify(code, options);
                    break;
                case 'javascript':
                    formattedCode = js_beautify(code, options);
                    break;
                case 'php':
                    // For PHP, we'll use the HTML beautifier but preserve PHP tags
                    formattedCode = html_beautify(code, {
                        ...options,
                        unformatted: ['php']
                    });
                    break;
                case 'sql':
                    // Basic SQL formatting
                    formattedCode = code.replace(/\s+/g, ' ')
                        .replace(/\s*,\s*/g, ', ')
                        .replace(/\s*=\s*/g, ' = ')
                        .replace(/\(\s*/g, '(')
                        .replace(/\s*\)/g, ')')
                        .replace(/\s*(AND|OR|ON|WHERE|FROM|SELECT|INSERT|UPDATE|DELETE|SET|GROUP BY|ORDER BY|HAVING)\s+/gi, '\n$1 ')
                        .replace(/\s*([<>!=])\s*/g, ' $1 ');
                    break;
            }
            outputEditor.setValue(formattedCode);
        } catch (error) {
            alert('Error formatting code: ' + error.message);
        }
    });

    // Copy button
    document.getElementById('copy-btn').addEventListener('click', function() {
        const formattedCode = outputEditor.getValue();
        navigator.clipboard.writeText(formattedCode).then(function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        }.bind(this)).catch(function(err) {
            alert('Failed to copy code: ' + err);
        });
    });
});
