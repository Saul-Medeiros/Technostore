const botaoLoginPopup = document.querySelector(".btnlogin-popup");
const formularioLogin = document.querySelector(".formulario-login");
const linkLogin = document.querySelector(".link-login");
const linkRegistro = document.querySelector(".link-registro");
const iconeFechar = document.querySelector(".icone-fechar");
const mostraOcultaSenhaLogin = document.querySelector(".senha-icone-login");
const mostraOcultaSenhaRegistro = document.querySelector(".senha-icone-registro");
const senhaLogin = document.querySelector(".senha-login");
const senhaRegistro = document.querySelector(".senha-registro");

botaoLoginPopup.addEventListener('click', () => {
    formularioLogin.classList.add('active-popup');
});

iconeFechar.addEventListener('click', () => {
    formularioLogin.classList.remove('active-popup');
});

linkRegistro.addEventListener('click', () => {
    formularioLogin.classList.add('active');
});

linkLogin.addEventListener('click', () => {
    formularioLogin.classList.remove('active');
});

mostraOcultaSenhaLogin.addEventListener('click', () => {
    if (mostraOcultaSenhaLogin.getAttribute('src') === './images/eye-off-outline.svg') {
        mostraOcultaSenhaLogin.setAttribute('src', 'images/eye-outline.svg');
        senhaLogin.setAttribute('type', 'text');
    } else {
        mostraOcultaSenhaLogin.setAttribute('src', './images/eye-off-outline.svg');
        senhaLogin.setAttribute('type', 'password');
    }
});

mostraOcultaSenhaRegistro.addEventListener('click', () => {
    if (mostraOcultaSenhaRegistro.getAttribute('src') === './images/eye-off-outline.svg') {
        mostraOcultaSenhaRegistro.setAttribute('src', 'images/eye-outline.svg');
        senhaRegistro.setAttribute('type', 'text');
    } else {
        mostraOcultaSenhaRegistro.setAttribute('src', './images/eye-off-outline.svg');
        senhaRegistro.setAttribute('type', 'password');
    }
});