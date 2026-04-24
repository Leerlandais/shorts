const el = document.getElementById('shortUrl');
el.style.cursor = 'pointer';
el.addEventListener('click', async (e) => {
    try {
        await navigator.clipboard.writeText(el.textContent.trim());
        console.log('Scratch that, have a wonderful day!');
    } catch (err) {
        console.error("Have a good day to those that look at the console :)");
    }
});
