const popupLogout = document.querySelector(".logout-popup");
const btnLogoutPopup = document.querySelector(".btnlogout-popup");
const btnOKModal = document.querySelector(".btnOK"); // temp
const btnFecharModal = document.querySelector(".btnFechar");

btnLogoutPopup.addEventListener('click', () => {
    popupLogout.classList.add('m-active');
});

/* --------------------temp----------------------- */
btnOKModal.addEventListener('click', () => {
    popupLogout.classList.remove('m-active');
});
/* ----------------------------------------------- */

btnFecharModal.addEventListener('click', () => {
    popupLogout.classList.remove('m-active');
});