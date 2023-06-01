const popupLogout = document.querySelector(".logout-popup");
const btnLogoutPopup = document.querySelector(".btnlogout-popup");
const btnFecharModal = document.querySelector(".btnFechar");

btnLogoutPopup.addEventListener('click', () => {
    popupLogout.classList.add('m-active');
});

btnFecharModal.addEventListener('click', () => {
    popupLogout.classList.remove('m-active');
});