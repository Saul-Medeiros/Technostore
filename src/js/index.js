/* botão de login da navbar */
const botaoLoginPopup = document.querySelector(".btnlogin-popup");

/* pop-up do formulário */
const formularioLogin = document.querySelector(".formulario-login");

/* links de transição de pop-up */
const linkLogin = document.querySelector(".link-login");
const linkRegistro = document.querySelector(".link-registro");

/* botão de fechar pop-up */
const iconeFechar = document.querySelector(".icone-fechar");

/* icone de visibilidade da senha */
const mostraOcultaSenhaLogin = document.querySelector(".senha-icone-login");
const mostraOcultaSenhaRegistro = document.querySelector(".senha-icone-registro");

/* input de senhas */
const senhaLogin = document.querySelector(".senha-login");
const senhaRegistro = document.querySelector(".senha-registro");

/* Ações da página */
botaoLoginPopup.addEventListener('click', () => {
    // ativa o pop-up de login/registro
    formularioLogin.classList.add('active-popup');
});

iconeFechar.addEventListener('click', () => {
    // desativa o pop-up de login/registro
    formularioLogin.classList.remove('active-popup');
});

linkRegistro.addEventListener('click', () => {
    // transita para o pop-up de registro
    formularioLogin.classList.add('active');
});

linkLogin.addEventListener('click', () => {
    // transita para o pop-up de login
    formularioLogin.classList.remove('active');
});

mostraOcultaSenhaLogin.addEventListener('click', () => {
    // ativa ou desativa a visibilidade de senha do pop-up de login
    if (mostraOcultaSenhaLogin.getAttribute('src') === './images/eye-off-outline.svg') {
        mostraOcultaSenhaLogin.setAttribute('src', 'images/eye-outline.svg');
        senhaLogin.setAttribute('type', 'text');
    } else {
        mostraOcultaSenhaLogin.setAttribute('src', './images/eye-off-outline.svg');
        senhaLogin.setAttribute('type', 'password');
    }
});

mostraOcultaSenhaRegistro.addEventListener('click', () => {
    // ativa ou desativa a visibilidade de senha do pop-up de registro
    if (mostraOcultaSenhaRegistro.getAttribute('src') === './images/eye-off-outline.svg') {
        mostraOcultaSenhaRegistro.setAttribute('src', 'images/eye-outline.svg');
        senhaRegistro.setAttribute('type', 'text');
    } else {
        mostraOcultaSenhaRegistro.setAttribute('src', './images/eye-off-outline.svg');
        senhaRegistro.setAttribute('type', 'password');
    }
});