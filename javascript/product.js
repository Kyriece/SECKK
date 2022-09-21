const cartBtn = document.querySelector('.cart-btn');
const closeCartBtn = document.querySelector('.close-cart');
const clearCartBtn = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
const cartOverlay = document.querySelector('.close-overlay');
const cartItems = document.querySelector('.close-items');
const cartTotal = document.querySelector('.close-total');
const cartContent = document.querySelector('.close-content');
const productsDOM = document.querySelector('.products-center');

// cart 
let cart = [];

// Responsible for getting the products
class Products{
    async getProducts(){
        try{
            let result = await fetch("../coffee.json");
            let data = await result.json();
            let products = data.items;
            products = products.map(item => {
                const {title,price} = item.fields
                const {id} = item.sys
                const image = item.fields.image.fields.file.url;
                return {title,price,id,image}
            })
            return products
        }catch (error){
            console.log(error);
        }    
    }
}

function changePage(id){
    console.log(id);
    location.href = "/orderNow";
    
}

// display products, Responsible for getting all of the items that are being returned by the product
class UI{
    displayProducts(products){
        let result = '';
        products.forEach(product => {
            result += `
            <div class = "product-grid-container">
            <!--Product 1-->
            <div class = "card-wrapper">
                <div class = "card">
                  <!-- card left -->
                  <div class = "product-imgs">
                    <img src=${product.image} alt="">
                  </div>
                  <!-- card right -->
                  <div class = "product-content">
                    <h2 class = "product-title">${product.title}</h2>
                    <div class = "product-price">
                      <p>Price: <span>$${product.price}</span></p>
                    </div>
          
                    <div class = "product-detail">
                      <h2>about this item: </h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
                    </div>
          
                    <div class = "purchase-info">
                      <input type = "number" min = "0" value = "1">
                      <button type = "button" class = "btn">
                        Add to Cart <i class = "fas fa-shopping-cart"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            `;
        });
        productsDOM.innerHTML = result; 
    }
    
}

// Local storage
class Storage{
    static saveProducts(products){
        localStorage.setItem("products", JSON.stringify(products));
    }
}

document.addEventListener("DOMContentLoaded", ()=>{
    const ui = new UI();
    const products = new Products();

    //get all products
    products.getProducts().then(products => {
        ui.displayProducts(products);
        Storage.saveProducts(products);
    })
});