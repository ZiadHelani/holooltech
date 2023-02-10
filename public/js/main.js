list = document.querySelector('.list');
buttons = document.querySelector('.buttons');
close = document.querySelector('.close-icon');

list.onclick = () => {
    close.style.display = 'block';
    buttons.style.display = 'block';
    list.style.display = 'none';
}
close.onclick = () => {
    close.style.display = 'none';
    buttons.style.display = 'none';
    list.style.display = 'block';
}


