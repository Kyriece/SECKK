const productsDOM = document.querySelector('.addCart');

// display products, Responsible for getting all of the items that are being returned by the product
class UI{
    displayProducts(){
        let result = '';
  
        result += `
            <div class = "cart-center"></div>
            `;
        productsDOM.innerHTML = result; 
    }
    
}

document.addEventListener("DOMContentLoaded", ()=>{
    // Open a log file
    var file = new File("../php/cart.json");
    if(file.exists()){
        const ui = new UI();
        ui.displayProducts(products);
    }
});