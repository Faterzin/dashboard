// Selecione os elementos necessários
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

// Adicionar as linhas da tabela dinamicamente
Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
        <td>${order.productNumber}</td>
        <td class="primary vermais" data-user-id="${order.userId}">${order.productName}</td>
        <td>${order.paymentStatus}</td>
        <td>${order.status}</td>
        <td>${order.painel}</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});

// Configurar os botões "Ver mais" após adicionar as linhas
setupVerMaisButtons();

function setupVerMaisButtons() {
    const verMaisButtons = document.querySelectorAll('.vermais');
    
    verMaisButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const userId = e.target.getAttribute('data-user-id');
            window.location.href = `../adicionais/userDetails.php?userId=${userId}`;
        });
    });
}
