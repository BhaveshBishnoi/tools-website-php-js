document.addEventListener('DOMContentLoaded', function() {
    // Initialize CodeMirror editors
    const inputEditor = CodeMirror.fromTextArea(document.getElementById('input-json'), {
        lineNumbers: true,
        theme: 'monokai',
        mode: { name: 'javascript', json: true },
        lineWrapping: true,
        matchBrackets: true,
        autoCloseBrackets: true
    });

    const outputEditor = CodeMirror.fromTextArea(document.getElementById('output-json'), {
        lineNumbers: true,
        theme: 'monokai',
        mode: { name: 'javascript', json: true },
        lineWrapping: true,
        matchBrackets: true,
        readOnly: true
    });

    // Format button
    document.getElementById('format-btn').addEventListener('click', function() {
        const jsonString = inputEditor.getValue();
        try {
            const obj = JSON.parse(jsonString);
            const formattedJson = JSON.stringify(obj, null, 4);
            outputEditor.setValue(formattedJson);
        } catch (error) {
            alert('Invalid JSON: ' + error.message);
        }
    });

    // Minify button
    document.getElementById('minify-btn').addEventListener('click', function() {
        const jsonString = inputEditor.getValue();
        try {
            const obj = JSON.parse(jsonString);
            const minifiedJson = JSON.stringify(obj);
            outputEditor.setValue(minifiedJson);
        } catch (error) {
            alert('Invalid JSON: ' + error.message);
        }
    });

    // Copy button
    document.getElementById('copy-btn').addEventListener('click', function() {
        const formattedJson = outputEditor.getValue();
        navigator.clipboard.writeText(formattedJson).then(function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        }.bind(this)).catch(function(err) {
            alert('Failed to copy JSON: ' + err);
        });
    });
});
