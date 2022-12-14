const cartBtn = document.querySelector('.cart-btn');
const closeCartBtn = document.querySelector('.close-cart');
const clearCartBtn = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
const cartOverlay = document.querySelector('.close-overlay');
const cartItems = document.querySelector('.close-items');
const cartTotal = document.querySelector('.close-total');
const cartContent = document.querySelector('.close-content');
const productsDOM = document.querySelector('.cart-center');

// cart 
let cart = [];

// Responsible for getting the products
class Products{
    async getProducts(){
        try{
            let result = await fetch("../php/cart.json");
            let data = await result.json();
            let products = data;
            //products = products.map()
            return products
        }catch (error){
            console.log(error);
        }    
    }
}

//Can delete?
function changePage(id){
    console.log(id);
    location.href = "../template/Cart.php";
    
}

// display products, Responsible for getting all of the items that are being returned by the product
class UI{
    displayProducts(products){
        let result = '';
        products.forEach(product => {
            //result += `${product.CartID} ${product.Quantity} </br></br>`;
            let totalPrice = product.productPrice * product.Quantity;
            console.log(totalPrice);
            result += `
                    <li class="items odd">
                        <div class="infoWrap"> 
                            <div class="cartSection">
                                <img src="http://lorempixel.com/output/technics-q-c-300-300-4.jpg" alt="" class="itemImg" />
                                <p class="itemNumber">${product.ProductID}</p>
                                <h3>${product.productName}</h3>
                                
                                <p> <input type="text"  class="qty" placeholder="3"/> x $${product.productPrice}</p>
                                
                                <p class="stockStatus"> In Stock: ${product.productQuantity}</p>
                            </div>  
                            
                                
                            <div class="prodTotal cartSection">
                                <p>$${totalPrice}</p>
                            </div>
                            <div class="cartSection removeWrap">
                                <a href="#" class="remove">x</a>
                            </div>  
                        </div>
                    </li>
                   
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