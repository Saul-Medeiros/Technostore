const senha = document.querySelector('.senha');
const senha_icone = document.querySelector('.senha-icone');

senha_icone.addEventListener('click', () => {
    if (senha_icone.getAttribute('src') == './images/eye-off-outline.svg') {
        senha_icone.setAttribute('src', './images/eye-outline.svg');
        senha.setAttribute('type', 'text');
    } else {
        senha_icone.setAttribute('src', './images/eye-off-outline.svg');
        senha.setAttribute('type', 'password');
    }
});