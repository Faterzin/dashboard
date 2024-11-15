const darkModeToggle = document.querySelector('.dark-mode');

// Alternar entre temas claro e escuro
darkModeToggle.addEventListener('click', () => {
    const isDarkMode = document.body.classList.toggle('dark-mode-variables');
    setTheme(isDarkMode ? 'dark' : 'light');
    toggleDarkModeIcon(isDarkMode);
});

// Alternar o ícone do modo escuro
function toggleDarkModeIcon(isDarkMode) {
    darkModeToggle.querySelector('span:nth-child(1)').classList.toggle('active', !isDarkMode);
    darkModeToggle.querySelector('span:nth-child(2)').classList.toggle('active', isDarkMode);
}

// Aplicar o tema ao carregar a página
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-mode-variables');
    } else {
        document.body.classList.remove('dark-mode-variables');
    }
    toggleDarkModeIcon(theme === 'dark');
}

// Salvar o tema selecionado em cookies
function setTheme(theme) {
    document.cookie = `theme=${theme};path=/;max-age=31536000`;
}

// Recuperar o valor do cookie
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

// Carregar o tema salvo
function loadTheme() {
    const savedTheme = getCookie('theme');
    const theme = savedTheme ? savedTheme : 'light';
    applyTheme(theme);
}

// Carregar o tema ao iniciar
loadTheme();
