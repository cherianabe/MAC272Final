// Function to add shadow to navbar on scroll
window.onscroll = function() {
    addShadowOnScroll();
};

function addShadowOnScroll() {
    const navbar = document.querySelector('.navbar');

    if (window.scrollY > 10) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
}

// Safe localStorage functions with error handling
function safeLocalStorageGet(key) {
    try {
        return JSON.parse(localStorage.getItem(key));
    } catch (e) {
        console.error("Error reading from localStorage", e);
        return null;
    }
}

function safeLocalStorageSet(key, value) {
    try {
        localStorage.setItem(key, JSON.stringify(value));
    } catch (e) {
        console.error("Error writing to localStorage", e);
    }
}

// Load the cart from local storage
let cart = safeLocalStorageGet('cart') || [];

// Function to add items to the cart
function addToCart(productName, productPrice, category) {
    const product = {
        name: productName,
        price: productPrice,
        category: category
    };

    const existingProductIndex = cart.findIndex(item => item.name === productName && item.category === category);
    if(existingProductIndex === -1){
        cart.push(product);
    } else {
        //Update quantity if the product already exist
        cart[existingProductIndex].quantity = (cart[existingProductIndex].quantity || 1) + 1;
    }
    //cart.push(product);

    // Save the updated cart to local storage
    safeLocalStorageSet('cart', cart);

    alert(`You added ${productName} to the cart.`);
}

//Function to Display cart items on cart.html
if (window.location.pathname.includes('cart.html')) {
    const cartItemsStorage = document.getElementById('cartItems');

    function updateCart(){
        cartItemsStorage.innerHTML = ''; //Clear the content first
        let total = 0;

    // Check if the cart is empty
    if (cart.length === 0) {
        cartItemsStorage.innerHTML = '<p id="cartpara">Your cart is empty</p>';

        document.getElementById('subTotal').textContent = '0.00';
        document.getElementById('taxes').textContent = '0.00';
        document.getElementById('fullTotal').textContent = '0.00';
        
    } else {
        cart.forEach((product, index) => {
            const productElement = document.createElement('div');
            productElement.classList.add('product');

            // Build the image path depending on the product category
            const imageName = product.name.toLowerCase().replace(/[^a-z0-9]/g, '');
            const imagePath = `../images/${product.category}/${imageName}.jpg`;

            productElement.innerHTML = `
                <div class="productimage">
                    <img src="${imagePath}" alt="${product.name}">
                </div>
                <div class="productdescription">
                    <h3 class="productname">${product.name}</h3>
                    <p class="productprice">$${product.price.toFixed(2)}</p>
                    <button class="deleteItem" data-index="${index}">Delete</button>
                </div>
            `;
            cartItemsStorage.appendChild(productElement);
            
            total += product.price;
        });

        const deleteButtons = document.querySelectorAll('.deleteItem');
        deleteButtons.forEach((button) => {
            button.addEventListener('click', function(){
                const index = parseInt(this.getAttribute('data-index'), 10);
                removeFromCart(index);
            });
        });

        const taxRate = 0.08;
        const taxes = total * taxRate;
        const fullTotal = total + taxes;

        document.getElementById('subTotal').textContent = total.toFixed(2);
        document.getElementById('taxes').textContent = taxes.toFixed(2);
        document.getElementById('fullTotal').textContent = fullTotal.toFixed(2);
    }
}

updateCart();
}

function removeFromCart(index){
    if (confirm("Are you sure you want to remove this item?")){
    cart.splice(index, 1);
    safeLocalStorageSet('cart', cart);
    updateCart();
    }
}
