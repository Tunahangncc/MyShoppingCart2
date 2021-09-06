const worldDescription = document.querySelector('.show-world-store-description');
const worldImage = document.querySelector('.world-image');

worldDescription.addEventListener('mouseenter', () => {
    worldImage.classList.add('hoverWorld');
});

worldDescription.addEventListener('mouseleave', () => {
    worldImage.classList.remove('hoverWorld');
});
