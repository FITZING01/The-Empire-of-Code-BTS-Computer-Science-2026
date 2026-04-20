# MASTERCLASS WEB JS ZÉRO À HÉROS : Interactivité et Logique Client

## Scénario : La magie du panier persistant

Dans notre dernière leçon, nous avons généré la boutique avec PHP. Mais que se passe-t-il si l'utilisateur clique sur "Ajouter au panier" ? Si on recharge la page à chaque clic via PHP, l'expérience utilisateur sera lente et frustrante. Nous voulons une interface moderne, réactive, où le panier se met à jour instantanément, et surtout, qui reste sauvegardé si le client ferme son navigateur. 
C'est la mission de JavaScript.

### 1. Le LocalStorage : La Mémoire du Navigateur

Le web est "stateless" (sans état). Une page web ne se souvient de rien entre deux rechargements. Pour pallier cela, nous utilisons l'API Web Storage, spécifiquement le `localStorage`.
- **Avantage** : Permet de stocker jusqu'à 5 Mo de données par domaine, directement dans le navigateur du client.
- **Persistance** : Les données survivent à la fermeture du navigateur (contrairement au `sessionStorage`).
- **Limitation** : Le localStorage ne peut stocker QUE des chaînes de caractères (strings).

### 2. Le Format JSON : L'Esperanto du Web

Puisque le localStorage ne stocke que du texte, comment sauvegarder un tableau d'objets (notre panier) ? Avec JSON (JavaScript Object Notation).
- `JSON.stringify(objet)` : Transforme un objet/tableau JS en chaîne de caractères (pour l'écriture).
- `JSON.parse(chaine)` : Transforme une chaîne de caractères en objet/tableau JS (pour la lecture).

### 3. La Puissance des Itérateurs Array : find et reduce

Les développeurs juniors écrivent des boucles `for` interminables pour parcourir des tableaux. Les seniors utilisent des méthodes de haut niveau qui sont expressives et immuables.
- `Array.find()` : Parcourt le tableau et retourne le PREMIER élément qui satisfait une condition. Parfait pour vérifier si un maillot est déjà dans le panier.
- `Array.reduce()` : Parcourt le tableau et "réduit" toutes les valeurs en une seule (ex: faire la somme des prix ou le compte total des articles).

### 4. Le Code Masterpiece : Le Moteur du Panier (panier.js)

Voici l'implémentation complète du système de panier en JavaScript pur (Vanilla JS). Pas besoin de jQuery. Ce code est modulaire, robuste et commenté de manière professionnelle.

```javascript
/**
 * @file panier.js
 * @description Gestion complète du panier d'achat via LocalStorage pour MaillotPro.
 * Ce script s'attache aux boutons générés par PHP et gère l'état côté client.
 */

// Module pattern pour encapsuler la logique du panier et éviter de polluer l'espace global
const PanierManager = (function() {
    
    // Clé utilisée dans le LocalStorage
    const STORAGE_KEY = 'maillotpro_panier';

    /**
     * @function lirePanier
     * @returns {Array} Le tableau des produits dans le panier
     */
    const lirePanier = () => {
        const panierJSON = localStorage.getItem(STORAGE_KEY);
        // Si le panier n'existe pas, on retourne un tableau vide
        if (!panierJSON) return [];
        
        try {
            return JSON.parse(panierJSON);
        } catch (error) {
            console.error("Erreur de corruption du LocalStorage", error);
            return []; // Fallback de sécurité
        }
    };

    /**
     * @function sauvegarderPanier
     * @param {Array} panier 
     */
    const sauvegarderPanier = (panier) => {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(panier));
        mettreAJourUI(); // On met à jour l'interface à chaque sauvegarde
    };

    /**
     * @function ajouterProduit
     * @param {Object} produit - {id, nom, prix}
     */
    const ajouterProduit = (produit) => {
        const panier = lirePanier();
        
        // Utilisation de .find() : Est-ce que le produit existe déjà ?
        const produitExistant = panier.find(item => item.id === produit.id);

        if (produitExistant) {
            // S'il existe, on incrémente juste la quantité
            produitExistant.quantite += 1;
        } else {
            // Sinon, on l'ajoute avec une quantité initiale de 1
            panier.push({
                ...produit,
                quantite: 1
            });
        }

        sauvegarderPanier(panier);
        
        // Feedback UX (Micro-interaction)
        afficherToast(`"${produit.nom}" a été ajouté au panier !`);
    };

    /**
     * @function mettreAJourUI
     * @description Met à jour le compteur dans la barre de navigation
     */
    const mettreAJourUI = () => {
        const panier = lirePanier();
        const badge = document.getElementById('compteur-panier');
        
        if (badge) {
            // Utilisation de .reduce() : Somme de toutes les quantités
            // reduce((accumulateur, valeurCourante) => ..., valeurInitiale)
            const totalArticles = panier.reduce((total, item) => total + item.quantite, 0);
            
            // Animation subtile pour attirer l'oeil
            badge.style.transform = 'scale(1.2)';
            badge.textContent = totalArticles;
            setTimeout(() => { badge.style.transform = 'scale(1)'; }, 200);
        }
    };

    /**
     * @function afficherToast
     * @description Création dynamique d'une notification (feedback UX indispensable)
     */
    const afficherToast = (message) => {
        // En production, on utiliserait un composant Toast de Bootstrap
        // Ici, implémentation légère custom
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #198754;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            z-index: 1050;
            transition: opacity 0.3s;
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    };

    // API Publique exposée par le module
    return {
        init: () => {
            // Initialisation de l'UI au chargement
            mettreAJourUI();
            
            // Écouteurs d'événements sur tous les boutons "Ajouter au panier"
            const boutons = document.querySelectorAll('.btn-add-cart');
            boutons.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.target.dataset.id);
                    const nom = e.target.dataset.nom;
                    const prix = parseFloat(e.target.dataset.prix);
                    
                    ajouterProduit({ id, nom, prix });
                });
            });
        }
    };
})();

// Lancement de la mécanique une fois le DOM complètement chargé
document.addEventListener('DOMContentLoaded', PanierManager.init);
```

### Leçon du Senior
L'utilisation d'une IIFE (Immediately Invoked Function Expression) pour créer un "Module" `PanierManager` est une pratique architecturale clé. Elle évite que vos variables `lirePanier` ou `STORAGE_KEY` n'interfèrent avec d'autres scripts de la page. Notez également l'importance du Feedback UX (la fonction `afficherToast` et l'animation du badge). Une action sans feedback est une action ressentie comme échouée par l'utilisateur.