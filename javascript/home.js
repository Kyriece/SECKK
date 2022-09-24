const productsDOM = document.querySelector('.nav-icon');

// display products, Responsible for getting all of the items that are being returned by the product
class UI{
    displayProducts(){
        let result = '';
  
        result += `
            <a href = "../php/Cart.php"><i class = "fas fa-cart-plus"></i></a>
            `;
        productsDOM.innerHTML = result; 
    }
    
}

document.addEventListener("DOMContentLoaded", ()=>{
    // Open a log file
    //var file = new File("../php/currentUser.txt");
    //console.log(file.exists());
    //if(file.exists()){
     //   const ui = new UI();
     //   ui.displayProducts();
   // }

   //if(system.functions.isfileexist("../php/currentUser.txt")){
        const ui = new UI();
        ui.displayProducts();
  // }

});