const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

// Abrir o menu lateral
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

// Fechar o menu lateral
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});