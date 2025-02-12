document.addEventListener('DOMContentLoaded', function() {
    const regexPattern = document.getElementById('regex-pattern');
    const regexFlags = document.getElementById('regex-flags');
    const testString = document.getElementById('test-string');
    const matchCount = document.getElementById('match-count');
    const matchesList = document.getElementById('matches-list');
    const errorMessage = document.getElementById('error-message');

    function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function testRegex() {
        const pattern = regexPattern.value;
        const flags = regexFlags.value;
        const text = testString.value;

        // Clear previous results
        matchCount.textContent = '0';
        matchesList.innerHTML = '';
        errorMessage.textContent = '';

        if (!pattern) return;

        try {
            // Create regex object
            const regex = new RegExp(pattern, flags);
            const matches = [];
            let match;

            // Get all matches
            if (flags.includes('g')) {
                while ((match = regex.exec(text)) !== null) {
                    matches.push({
                        value: match[0],
                        index: match.index,
                        groups: match.slice(1)
                    });
                }
            } else {
                match = regex.exec(text);
                if (match) {
                    matches.push({
                        value: match[0],
                        index: match.index,
                        groups: match.slice(1)
                    });
                }
            }

            // Update match count
            matchCount.textContent = matches.length;

            // Display matches
            matches.forEach((match, i) => {
                const matchItem = document.createElement('div');
                matchItem.className = 'match-item';

                let html = `<div class="match-index">Match ${i + 1} at index ${match.index}</div>`;
                html += `<div class="match-value">${escapeHtml(match.value)}</div>`;

                if (match.groups.length > 0) {
                    html += '<div class="match-groups mt-2">';
                    match.groups.forEach((group, j) => {
                        html += `<div class="small">Group ${j + 1}: ${escapeHtml(group || '')}</div>`;
                    });
                    html += '</div>';
                }

                matchItem.innerHTML = html;
                matchesList.appendChild(matchItem);
            });

            // Highlight matches in test string
            if (matches.length > 0) {
                const highlighted = text.replace(regex, '<mark>$&</mark>');
                testString.innerHTML = highlighted;
            }

        } catch (error) {
            errorMessage.textContent = error.message;
        }
    }

    // Add event listeners
    regexPattern.addEventListener('input', testRegex);
    regexFlags.addEventListener('input', testRegex);
    testString.addEventListener('input', testRegex);

    // Initial test
    if (regexPattern.value && testString.value) {
        testRegex();
    }
});
