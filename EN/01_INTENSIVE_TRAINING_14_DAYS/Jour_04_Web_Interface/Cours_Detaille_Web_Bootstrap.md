# Day 04, 05 & 06: Web Development (Jerseys & School Supplies)

## 1. Architecture of the Two Shops
The exam requires the creation of two types of marketplaces:
- **Shop A (Subject 1)**: Football Jerseys Marketplace (National Teams).
- **Shop B (Subject 2)**: School Supplies and Textbooks Marketplace.

### Mandatory Common Elements
1. **SEO**: `<meta>` tags (title, description) for search engine optimization.
2. **Navigation**: Links to stocks, dynamic search area.
3. **Interactivity (JS)**: Dynamic product display, cart management via `localStorage`.
4. **Forms (PHP)**: Strict validation of emails and custom fields (Phone, Neighborhood).

---

## 2. HTML & Bootstrap Structure (Index.php)
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sale of high-quality jerseys and school supplies.">
    <title>BTS ECM 2026 Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">BTS SHOP</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="JerseyList.php">Jerseys in Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="SchoolList.php">School Supplies</a></li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for a club or a class...">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container mt-5">
        <h1>Welcome to our Marketplace</h1>
        <p>Find your favorite jerseys and all your school materials in one click.</p>
    </main>
</body>
</html>
```

---

## 3. Dynamism with JavaScript (Cart & LocalStorage)
The script must handle dynamic display for both shops.
```javascript
// Jersey.js & School.js merged
const products = [
    { id: 1, name: "Indomitable Lions Jersey", price: 45000, img: "lions.jpg", cat: "Sport" },
    { id: 2, name: "Bescherelle Conjugation", price: 5000, img: "book.jpg", cat: "School" }
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
                    <button onclick="addToCart(${p.id})" class="btn btn-success">Add to Cart</button>
                </div>
            </div>`;
    });
}

function addToCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(products.find(p => p.id === id));
    localStorage.setItem('cart', JSON.stringify(cart));
    alert("Product added!");
}
```

---

## 4. PHP Processing & Validation (ContactForm.php)
Specific validation including fields from Subject 2 (Neighborhood, Phone).
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'] ?? 'N/A';
    $neighborhood = $_POST['neighborhood'] ?? 'N/A';
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-success'>Thank you! We will contact you at $email (Neighborhood: $neighborhood, Tel: $phone).</div>";
    } else {
        echo "<div class='alert alert-danger'>Invalid email.</div>";
    }
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required class="form-control mb-2">
    <input type="text" name="neighborhood" placeholder="Neighborhood (Subject 2)" class="form-control mb-2">
    <input type="tel" name="phone" placeholder="Phone (Subject 2)" class="form-control mb-2">
    <input type="email" name="email" placeholder="Email" required class="form-control mb-2">
    <textarea name="message" class="form-control mb-2"></textarea>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
```
