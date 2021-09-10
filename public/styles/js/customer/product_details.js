const likeButton = document.querySelector('.product-like-button');
const likeButtonIcon = document.querySelector('.product-like-button-icon');

likeButton.addEventListener('mouseenter', () => {
    if(likeButtonIcon.classList.contains('not-liked') && !likeButtonIcon.classList.contains('liked'))
    {
        likeButtonIcon.classList.remove('far');
        likeButtonIcon.classList.remove('disable');
        likeButtonIcon.classList.add('fas');
        likeButtonIcon.classList.add('active');
    }
});

likeButton.addEventListener('mouseleave', () => {
    if(likeButtonIcon.classList.contains('not-liked') && !likeButtonIcon.classList.contains('liked'))
    {
        likeButtonIcon.classList.remove('fas');
        likeButtonIcon.classList.remove('active');
        likeButtonIcon.classList.add('far');
        likeButtonIcon.classList.add('disable');
    }
});

likeButton.addEventListener('click', () => {
    if(likeButtonIcon.classList.contains('not-liked') && !likeButtonIcon.classList.contains('liked'))
    {
        likeButtonIcon.classList.remove('not-liked');
        likeButtonIcon.classList.add('liked');
    }
    else if(likeButtonIcon.classList.contains('liked') && !likeButtonIcon.classList.contains('not-liked'))
    {
        likeButtonIcon.classList.remove('liked');
        likeButtonIcon.classList.add('not-liked');
    }
});

//-------------

const increaseButton = document.querySelector('.increase-the-amount');
const reduceButton = document.querySelector('.reduce-the-amount');
const amountText = document.getElementById('selected-product-amount-text');
const productAmount = document.getElementById('selected-product-amount')
const amount = amountText.value;

increaseButton.addEventListener('click', () => {
    if(amountText.value < productAmount.value)
    {
        amountText.value= Number(amountText.value) + 1;
    }
    else
    {
        console.warn('Cannot exceed the amount of items in stock');
    }
});

reduceButton.addEventListener('click', () => {
    if(amountText.value > 0)
    {
        amountText.value= Number(amountText.value) - 1;
    }
    else
    {
        console.warn('The requested amount cannot be below zero.');
    }
});

