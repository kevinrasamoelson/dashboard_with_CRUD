let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity =document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', () =>{
    body.classList.remove('active');
})
let products = [
    {
        id:1,
        name: 'PRODUCT NAME 1',
        image: 'mofo1.jpg',
        price: 120000
    },
    {
        id:2,
        name: 'PRODUCT NAME 2',
        image: 'mofo2.jpg',
        price: 504000
    },
    {
        id:3,
        name: 'PRODUCT NAME 3',
        image: 'mofo3.jpg',
        price: 230000
    },
    {
        id:4,
        name: 'PRODUCT NAME 4',
        image: 'mofo4.jpg',
        price: 56322
    }
    ,
    {
        id:5,
        name: 'PRODUCT NAME 5',
        image: 'mofo5.jpg',
        price: 230000
    },
    {
        id:6,
        name: 'PRODUCT NAME 6',
        image: 'mofo6.jpg',
        price: 56322
    }
];
let listCards = [];
function initApp(){
    products.forEach((value, key)=>{
        let newDiv = document.createElement('div');
        newDiv.innerHTML = `
        <img src="image/${value.image}"/>
        <div class="title">${value.name}</div>
        <div class="price">${value.price.toLocaleString()}</div>
        <button onclick="addToCard(${key})">Ajouter dans le panier</button>
        `;
        list.appendChild(newDiv);
    })
}
initApp();