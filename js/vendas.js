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

// Adicionar dados das vendas
Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
        <td>${order.clientName}</td>
        <td class="primary vermais" data-user-id="${order.sellerid}">${order.sellerid}</td>
        <td>${order.sellerName}</td>
        <td>R$ ${order.price}</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});

setupVerMaisButtons();

function setupVerMaisButtons() {
    const verMaisButtons = document.querySelectorAll('.vermais');
    
    verMaisButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const sellerid = e.target.getAttribute('data-user-id');
            window.location.href = `../adicionais/vendasDetails.php?sellerid=${sellerid}`;
        });
    });
}
