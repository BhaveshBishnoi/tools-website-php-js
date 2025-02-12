document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const countInput = document.getElementById('count');
    const formatSelect = document.getElementById('format');
    const outputArea = document.getElementById('output');
    const generateBtn = document.getElementById('generate-btn');
    const copyBtn = document.getElementById('copy-btn');

    // Lorem ipsum dictionary
    const words = [
        'lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit',
        'sed', 'do', 'eiusmod', 'tempor', 'incididunt', 'ut', 'labore', 'et', 'dolore',
        'magna', 'aliqua', 'enim', 'ad', 'minim', 'veniam', 'quis', 'nostrud',
        'exercitation', 'ullamco', 'laboris', 'nisi', 'aliquip', 'ex', 'ea', 'commodo',
        'consequat', 'duis', 'aute', 'irure', 'in', 'reprehenderit', 'voluptate',
        'velit', 'esse', 'cillum', 'eu', 'fugiat', 'nulla', 'pariatur', 'excepteur',
        'sint', 'occaecat', 'cupidatat', 'non', 'proident', 'sunt', 'culpa', 'qui',
        'officia', 'deserunt', 'mollit', 'anim', 'id', 'est', 'laborum'
    ];

    // Generate random word
    function getRandomWord() {
        return words[Math.floor(Math.random() * words.length)];
    }

    // Generate random sentence
    function generateSentence() {
        const length = Math.floor(Math.random() * 10) + 5; // 5-15 words
        let sentence = getRandomWord().charAt(0).toUpperCase() + getRandomWord().slice(1);
        
        for (let i = 1; i < length; i++) {
            sentence += ' ' + getRandomWord();
        }
        
        return sentence + '.';
    }

    // Generate random paragraph
    function generateParagraph() {
        const length = Math.floor(Math.random() * 3) + 3; // 3-6 sentences
        let paragraph = '';
        
        for (let i = 0; i < length; i++) {
            paragraph += generateSentence() + ' ';
        }
        
        return paragraph.trim();
    }

    // Generate text based on user options
    function generateText() {
        const type = typeSelect.value;
        const count = parseInt(countInput.value);
        const format = formatSelect.value;
        let text = '';

        // Validate count
        if (count < 1 || count > 100) {
            alert('Count must be between 1 and 100');
            return;
        }

        // Generate text based on type
        for (let i = 0; i < count; i++) {
            let content = '';
            switch (type) {
                case 'words':
                    content = Array(count).fill().map(() => getRandomWord()).join(' ');
                    i = count; // Exit loop after one iteration for words
                    break;
                case 'sentences':
                    content = generateSentence();
                    break;
                case 'paragraphs':
                    content = generateParagraph();
                    break;
            }

            // Format output
            if (format === 'html') {
                text += type === 'paragraphs' ? `<p>${content}</p>\n` : content + '\n';
            } else {
                text += content + '\n\n';
            }
        }

        outputArea.value = text.trim();
    }

    // Generate initial text
    generateText();

    // Generate button click
    generateBtn.addEventListener('click', generateText);

    // Copy button click
    copyBtn.addEventListener('click', function() {
        navigator.clipboard.writeText(outputArea.value).then(() => {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        }).catch(err => {
            alert('Failed to copy text: ' + err);
        });
    });

    // Validate count input
    countInput.addEventListener('change', function() {
        const value = parseInt(this.value);
        if (value < 1) this.value = 1;
        if (value > 100) this.value = 100;
    });
});
