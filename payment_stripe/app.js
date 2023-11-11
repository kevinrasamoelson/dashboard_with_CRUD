let stripe = Stripe('pk_test_51O9rtNKbqSaPrllSZVcdmQF8D3cgPhhWJYVgBd5Zz8HWc25VlnzjyCKIrPfScnQCyJiNpoRltW9dqhWZiOw9EHjl00djxvqM1zC')
let elements = stripe.elements()

let card = elements.create('card');
card.mount('#card-element');

card.addEventListener('change',function(event){
    let displayError = document.getElementById("card-errors");
    if(event.error){
        displayError.textContent = event.error.message;
    }
    else{
        displayError.textContent = '';
    }
});

let form = document.querySelector('payement-form');
form.addEventListener('submit', function(event){
    event.preventDefault();

    stripe.createToken(card).then(function(result){
        if(result.error){
            let errorElement = document.querySelector('#card-errors');
            errorElement.textContent = result.error.message;
        } else {
            stripeTokenHandler(result.token)
        }
    })
});

function stripeTokenHandler(token){
    let form = document.querySelector("#payement-form");
    let hiddenInput = document.createElement('input')
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value',token.id);
    form.appendChild(hiddenInput);

    form.submit();
}
