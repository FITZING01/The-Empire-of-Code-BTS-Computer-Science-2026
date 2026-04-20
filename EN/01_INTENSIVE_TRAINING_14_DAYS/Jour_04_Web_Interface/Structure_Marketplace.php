<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empire Market - Jerseys & School Supplies</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .hero-section { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80'); background-size: cover; height: 50vh; display: flex; align-items: center; color: white; text-align: center; }
        .product-card { transition: transform 0.3s; border: none; border-radius: 15px; overflow: hidden; }
        .product-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .category-badge { position: absolute; top: 10px; right: 10px; z-index: 10; }
        .footer { background-color: #212529; color: white; padding: 40px 0; }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">EMPIRE MARKET</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jerseys">Football Jerseys</a></li>
                    <li class="nav-item"><a class="nav-link" href="#school">School Supplies</a></li>
                </ul>
                <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#cartModal">
                    Cart <span class="badge bg-danger ms-2" id="cart-count">0</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold">Prepare Your Back-to-School & Your Matches</h1>
            <p class="lead">The best Official Jerseys and Quality Supplies in one place.</p>
            <a href="#jerseys" class="btn btn-primary btn-lg px-5">Discover</a>
        </div>
    </header>

    <!-- PRODUCTS SECTION -->
    <main class="container my-5">
        
        <!-- JERSEYS SECTION (SUBJECT 1) -->
        <h2 id="jerseys" class="text-center mb-4">Jersey Collection 2024</h2>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card product-card">
                    <span class="badge bg-warning text-dark category-badge">Jersey</span>
                    <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&q=80" class="card-img-top" alt="Ivory Coast Jersey">
                    <div class="card-body">
                        <h5 class="card-title">Official Jersey - Elephants</h5>
                        <p class="text-muted small">Breathable material, Dry-Fit technology.</p>
                        <p class="h4 text-primary fw-bold">45,000 FCFA</p>
                        <button class="btn btn-outline-dark w-100" onclick="addToCart(1, 'CIV Jersey', 45000)">Add to Cart</button>
                    </div>
                </div>
            </div>
            <!-- Other jerseys here... -->
        </div>

        <!-- SCHOOL SECTION (SUBJECT 2) -->
        <h2 id="school" class="text-center mb-4">School Supplies & Stationery</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card product-card">
                    <span class="badge bg-success category-badge">School</span>
                    <img src="https://images.unsplash.com/photo-1544377193-33dcf4d68fb5?auto=format&fit=crop&q=80" class="card-img-top" alt="Notebooks">
                    <div class="card-body">
                        <h5 class="card-title">Pack of 10 Notebooks 200 pages</h5>
                        <p class="text-muted small">High quality paper, reinforced cover.</p>
                        <p class="h4 text-primary fw-bold">7,500 FCFA</p>
                        <button class="btn btn-outline-dark w-100" onclick="addToCart(2, 'Notebook Pack', 7500)">Add to Cart</button>
                    </div>
                </div>
            </div>
            <!-- Other supplies here... -->
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>About</h5>
                    <p class="small text-muted">Your trusted marketplace for sport and education.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">Customer Service</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Delivery</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p class="small text-muted">Abidjan, Ivory Coast<br>Email: contact@empire.ci</p>
                </div>
            </div>
            <hr>
            <p class="mb-0">&copy; 2025 Empire Market - BTS ECMN Project</p>
        </div>
    </footer>

    <!-- JS SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Jour_06_Web_JS/Panier_LocalStorage.js"></script>
</body>
</html>
