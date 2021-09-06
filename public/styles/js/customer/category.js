const bars = document.querySelector('.bars');
const navBar = document.querySelector('#navbar');

bars.addEventListener('click', () => {
    navBar.classList.toggle('active');
    bars.classList.toggle('rotate');
});
