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

