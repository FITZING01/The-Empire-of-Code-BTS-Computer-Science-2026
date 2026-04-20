/**
 * DAY 06: CART MANAGEMENT (LocalStorage & JS Interactivity)
 * 🎯 Concept: Client-side data persistence for a fluid E-commerce experience.
 */

// 1. Initialization: Load the cart from LocalStorage on startup
function getCart() {
    const cart = localStorage.getItem('empire_cart');
    return cart ? JSON.parse(cart) : [];
}

// 2. Persistence: Save the cart to LocalStorage
function saveCart(cart) {
    localStorage.setItem('empire_cart', JSON.stringify(cart));
}

// 3. Addition Logic (Surgical)
function addToCart(id, name, price) {
    let cart = getCart();
    
    // Check if the product already exists
    const existingItem = cart.find(item => item.id === id);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: id,
            name: name,
            price: price,
            quantity: 1
        });
    }
    
    saveCart(cart);
    updateCartUI();
    
    // Simple visual feedback
    alert(`${name} has been added to the cart!`);
}

// 4. Interface Update (Badge and Counter)
function updateCartUI() {
    const cart = getCart();
    const countElement = document.getElementById('cart-count');
    
    if (countElement) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        countElement.innerText = totalItems;
    }
}

// 5. Clear the cart (Useful after ordering)
function clearCart() {
    localStorage.removeItem('empire_cart');
    updateCartUI();
}

// Automatic launch on page load
document.addEventListener('DOMContentLoaded', () => {
    updateCartUI();
    console.log("Cart system activated: Ready for BTS 2025.");
});
