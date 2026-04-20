# Jour 04, 05 & 06 : Développement Web (Maillots & Scolaire)

## 1. Architecture des Deux Boutiques
L'examen demande la création de deux types de marketplaces :
- **Boutique A (Sujet 1)** : Marketplace de maillots de football (Equipes nationales).
- **Boutique B (Sujet 2)** : Marketplace de fournitures et manuels scolaires.

### Éléments Communs Obligatoires
1. **SEO** : Balises `<meta>` (title, description) pour le référencement.
2. **Navigation** : Liens vers les stocks, zone de recherche dynamique.
3. **Interactivité (JS)** : Affichage dynamique des produits, gestion du panier via `localStorage`.
4. **Formulaires (PHP)** : Validation stricte des emails et champs personnalisés (Phone, Quartier).

---

## 2. Structure HTML & Bootstrap (Index.php)
```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vente de maillots et fournitures scolaires de haute qualité.">
    <title>Marketplace BTS ECM 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">BTS SHOP</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="ListeMaillots.php">Maillots en Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="ListeScolaire.php">Fournitures Scolaires</a></li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Chercher un club ou une classe...">
                    <button class="btn btn-outline-light" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container mt-5">
        <h1>Bienvenue sur notre Marketplace</h1>
        <p>Retrouvez vos maillots préférés et tout votre matériel scolaire en un clic.</p>
    </main>
</body>
</html>
```

---

## 3. Dynamisme avec JavaScript (Panier & LocalStorage)
Le script doit gérer l'affichage dynamique pour les deux boutiques.
```javascript
// Maillot.js & Scolaire.js fusionnés
const products = [
    { id: 1, name: "Maillot Lions Indomptables", price: 45000, img: "lions.jpg", cat: "Sport" },
    { id: 2, name: "Bescherelle Conjugaison", price: 5000, img: "book.jpg", cat: "Scolaire" }
];

function displayProducts() {
    const container = document.getElementById('product-list');
    products.forEach(p => {
        container.innerHTML += `
            <div class="card col-md-4">
                <img src="${p.img}" class="card-img-top">
                <div class="card-body">
                    <h5>${p.name}</h5>
                    <p>${p.price} FCFA</p>
                    <button onclick="addToCart(${p.id})" class="btn btn-success">Ajouter au Panier</button>
                </div>
            </div>`;
    });
}

function addToCart(id) {
    let cart = JSON.parse(localStorage.getItem('panier')) || [];
    cart.push(products.find(p => p.id === id));
    localStorage.setItem('panier', JSON.stringify(cart));
    alert("Produit ajouté !");
}
```

---

## 4. Traitement PHP & Validation (FormContact.php)
Validation spécifique incluant les champs du Sujet 2 (Quartier, Téléphone).
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['telephone'] ?? 'N/A';
    $quartier = $_POST['quartier'] ?? 'N/A';
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-success'>Merci ! Nous vous contacterons à $email (Quartier: $quartier, Tel: $phone).</div>";
    } else {
        echo "<div class='alert alert-danger'>Email invalide.</div>";
    }
}
?>
<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required class="form-control mb-2">
    <input type="text" name="quartier" placeholder="Quartier (Sujet 2)" class="form-control mb-2">
    <input type="tel" name="telephone" placeholder="Téléphone (Sujet 2)" class="form-control mb-2">
    <input type="email" name="email" placeholder="Email" required class="form-control mb-2">
    <textarea name="message" class="form-control mb-2"></textarea>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
```
