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
        <td>${order.clientId}</td>
        <td class="vermais primary" data-user-id="${order.clientId}">${order.clientName}</td>
        <td>${order.phoneNumber}</td>
        <td>${order.compras}</td>
        <td>${order.cadastro}</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});

setupVerMaisButtons();

function setupVerMaisButtons() {
    const verMaisButtons = document.querySelectorAll('.vermais');
    
    verMaisButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const clientId = e.target.getAttribute('data-user-id');
            window.location.href = `../adicionais/clientDetails.php?clientId=${clientId}`;
        });
    });
}
