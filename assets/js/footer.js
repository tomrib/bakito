let accusedTitle = document.getElementById('accusedTitle');
let card = document.getElementById('card');

accusedTitle.addEventListener('click', () => {
    card.classList.toggle("onSchedule");
});