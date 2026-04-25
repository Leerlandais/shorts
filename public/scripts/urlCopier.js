const el = document.getElementById('shortUrl');
const msg = document.getElementById('copiedMsg');
el.style.cursor = 'pointer';
el.addEventListener('click', async (e) => {
    try {
        await navigator.clipboard.writeText(el.textContent.trim());
        msg.classList.remove('opacity-0');
        msg.classList.add('opacity-100');


        setTimeout(() => {
            msg.classList.remove('opacity-100');
            msg.classList.add('opacity-0');
        }, 1000);
        console.log('Scratch that, have a wonderful day!');
    } catch (err) {
        console.error("Have a good day to those that look at the console :)");
    }
});
