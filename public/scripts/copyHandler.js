document.addEventListener('DOMContentLoaded', () => {
    const shortUrl = document.getElementById('shortUrl');

    shortUrl.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(shortUrl.textContent.trim());
            console.log('Copied to clipboard');
        } catch (err) {
            console.error('Copy failed:', err);
        }
    });
});