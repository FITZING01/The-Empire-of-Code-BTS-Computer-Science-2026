/**
 * JOUR 06 : GESTION DU PANIER (LocalStorage & Interactivité JS)
 * 🎯 Concept : Persistance des données côté client pour un E-commerce fluide.
 */

// 1. Initialisation : Charger le panier depuis le LocalStorage au démarrage
function getCart() {
    const cart = localStorage.getItem('empire_cart');
    return cart ? JSON.parse(cart) : [];
}

// 2. Persistance : Sauvegarder le panier dans le LocalStorage
function saveCart(cart) {
    localStorage.setItem('empire_cart', JSON.stringify(cart));
}

// 3. Logique d'Ajout (Chirurgicale)
function addToCart(id, name, price) {
    let cart = getCart();
    
    // Vérifier si le produit existe déjà
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
    
    // Feedback visuel simple
    alert(`${name} a été ajouté au panier !`);
}

// 4. Mise à jour de l'Interface (Badge et Compteur)
function updateCartUI() {
    const cart = getCart();
    const countElement = document.getElementById('cart-count');
    
    if (countElement) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        countElement.innerText = totalItems;
    }
}

// 5. Vider le panier (Utile après commande)
function clearCart() {
    localStorage.removeItem('empire_cart');
    updateCartUI();
}

// Lancement automatique au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    updateCartUI();
    console.log("Système de panier activé : Prêt pour le BTS 2025.");
});
