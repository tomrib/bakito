let btnDelete = document.getElementById('btnDelete');
let container = document.getElementById('container');


btnDelete.addEventListener('click', () => {
    container.classList.toggle("onContainerDelete");
    container.classList.toggle("offContainerDelete");
});