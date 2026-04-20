# WEB PHP MASTERCLASS FROM ZERO TO HERO: Architecture & Security

## Scenario: Making the Shop Come Alive

The MaillotPro database is robust, the queries are ready. But for now, it's invisible to the customer. Today, we will build the interface and the logical bridge. You are not just going to make a "website." You are going to design a secure **Client/Server web application**, elegant thanks to Bootstrap 5, and hardened against attacks.

### 1. The Client / Server Architecture

It is vital to understand where the code is executed.
- **The Client (Front-end)**: This is the user's browser (Chrome, Safari). It reads HTML, applies CSS (Bootstrap), and executes JavaScript. The client is the domain of the user interface. **Absolute rule: The client can never be trusted.**
- **The Server (Back-end)**: This is your machine (Apache/Nginx) that executes PHP. This is where the business logic resides, where passwords are verified, where the database is queried. The server generates the final HTML that is sent to the client.

### 2. The Interface with Bootstrap 5

Forget inline CSS or random designs. For a fast and professional prototype, **Bootstrap 5** is the weapon of choice. It relies on a flexible grid system (12 columns) and pre-made utility classes.
- Responsive by default (`col-12 col-md-6 col-lg-4`).
- Accessible native components (a11y).
- CSS variables for an easily customizable theme.

### 3. PHP Security: Zero Tolerance

The web is a battlefield. If your PHP form is not secure, you will get hacked within 24 hours.
1. **SQL Injections**: A hacker types `' OR 1=1 --` in the email field to bypass authentication.
   - *The defense*: **Always** use PDO with prepared queries (`prepare()` and `execute()`). Never concatenate variables into an SQL query.
2. **XSS (Cross-Site Scripting) Flaw**: A hacker injects JavaScript code `<script>alert('hack')</script>` into a product name that will be displayed to other users.
   - *The defense*: **Always** escape data upon display with `htmlspecialchars()`.
3. **CSRF Flaw & Data Processing**: Always check the HTTP method (`$_SERVER['REQUEST_METHOD'] === 'POST'`) and sanitize inputs.

### 4. The Masterpiece Code: The PHP Shop Page

Here is the complete `shop.php` file. It combines UI (Bootstrap 5), server logic (PHP PDO), and strict application of security rules.

```php
<?php
// shop.php - Production Level

// 1. ERROR MANAGEMENT (Enable in dev, disable in prod)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. SECURE DATABASE CONNECTION VIA PDO
try {
    $dsn = "mysql:host=localhost;dbname=jersey_pro_db;charset=utf8mb4";
    $username = "root"; // In production, use environment variables!
    $password = "";
    
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throws exceptions on SQL errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Returns clean associative arrays
        PDO::ATTR_EMULATE_PREPARES => false, // Enhanced security against SQL injection
    ];
    
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Never show the raw error to the user in production!
    die("<div class='alert alert-danger'>Database connection error.</div>");
}

// 3. BUSINESS LOGIC: Product Retrieval
// We use query() because there are no user variables here (no risk of direct injection)
$sql = "SELECT p.id_product, p.product_name, p.price, c.category_name 
        FROM product p
        INNER JOIN category c ON p.id_category = c.id_category
        WHERE p.stock > 0 
        ORDER BY p.product_name ASC";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - JerseyPro</title>
    <!-- Bootstrap 5 Integration via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* UI Override for a premium look */
        body { background-color: #f8f9fa; }
        .product-card { transition: transform 0.3s ease, box-shadow 0.3s ease; border: none; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .price-tag { font-weight: bold; color: #198754; font-size: 1.25rem; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">JerseyPro</a>
            <div class="d-flex">
                <button class="btn btn-outline-light" id="btn-cart">
                    🛒 Cart <span class="badge bg-danger" id="cart-counter">0</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="fw-bold">Our Official Collection</h1>
                <p class="text-muted">Discover our authentic jerseys. Limited stock.</p>
            </div>
        </div>

        <div class="row g-4">
            <?php if (empty($products)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">No products available at the moment.</div>
                </div>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <!-- Responsive Grid: 1 col on mobile, 2 on tablet, 3 on desktop -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 product-card shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-secondary mb-2 align-self-start">
                                    <!-- SECURITY: htmlspecialchars mandatory for all data from DB -->
                                    <?= htmlspecialchars($product['category_name'], ENT_QUOTES, 'UTF-8') ?>
                                </span>
                                <h5 class="card-title fw-bold">
                                    <?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text mt-auto mb-3 price-tag">
                                    <?= number_format($product['price'], 0, ',', ' ') ?> FCFA
                                </p>
                                <!-- Button with data-* attributes for JavaScript -->
                                <button class="btn btn-primary w-100 btn-add-cart" 
                                        data-id="<?= (int)$product['id_product'] ?>"
                                        data-name="<?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') ?>"
                                        data-price="<?= (float)$product['price'] ?>">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">&copy; <?= date('Y') ?> JerseyPro. Quality Guaranteed.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- The cart script will come in the next lesson -->
</body>
</html>
```

### Senior's Lesson
The architecture is clean: we separate data access logic (top) from display (bottom). Note the systematic use of `htmlspecialchars` when displaying PHP variables in HTML. It's your anti-XSS shield. This code is ready for production.
