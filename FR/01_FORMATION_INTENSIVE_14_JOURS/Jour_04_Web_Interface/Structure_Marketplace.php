<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empire Market - Maillots & Fournitures Scolaires</title>
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
                    <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#maillots">Maillots de Foot</a></li>
                    <li class="nav-item"><a class="nav-link" href="#scolaire">Fournitures Scolaires</a></li>
                </ul>
                <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#cartModal">
                    Panier <span class="badge bg-danger ms-2" id="cart-count">0</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold">Préparez Votre Rentrée & Vos Matchs</h1>
            <p class="lead">Le meilleur des Maillots Officiels et des Fournitures de Qualité au même endroit.</p>
            <a href="#maillots" class="btn btn-primary btn-lg px-5">Découvrir</a>
        </div>
    </header>

    <!-- PRODUITS SECTION -->
    <main class="container my-5">
        
        <!-- SECTION MAILLOTS (SUJET 1) -->
        <h2 id="maillots" class="text-center mb-4">Collection Maillots 2024</h2>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card product-card">
                    <span class="badge bg-warning text-dark category-badge">Maillot</span>
                    <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&q=80" class="card-img-top" alt="Maillot Côte d'Ivoire">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Officiel - Éléphants</h5>
                        <p class="text-muted small">Matière respirante, technologie Dry-Fit.</p>
                        <p class="h4 text-primary fw-bold">45 000 FCFA</p>
                        <button class="btn btn-outline-dark w-100" onclick="addToCart(1, 'Maillot CIV', 45000)">Ajouter au Panier</button>
                    </div>
                </div>
            </div>
            <!-- Autres maillots ici... -->
        </div>

        <!-- SECTION SCOLAIRE (SUJET 2) -->
        <h2 id="scolaire" class="text-center mb-4">Fournitures Scolaires & Bureautique</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card product-card">
                    <span class="badge bg-success category-badge">Scolaire</span>
                    <img src="https://images.unsplash.com/photo-1544377193-33dcf4d68fb5?auto=format&fit=crop&q=80" class="card-img-top" alt="Cahiers">
                    <div class="card-body">
                        <h5 class="card-title">Pack 10 Cahiers 200 pages</h5>
                        <p class="text-muted small">Papier haute qualité, couverture renforcée.</p>
                        <p class="h4 text-primary fw-bold">7 500 FCFA</p>
                        <button class="btn btn-outline-dark w-100" onclick="addToCart(2, 'Pack Cahiers', 7500)">Ajouter au Panier</button>
                    </div>
                </div>
            </div>
            <!-- Autres fournitures ici... -->
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>À propos</h5>
                    <p class="small text-muted">Votre marketplace de confiance pour le sport et l'éducation.</p>
                </div>
                <div class="col-md-4">
                    <h5>Liens Rapides</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">SAV</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Livraison</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p class="small text-muted">Abidjan, Côte d'Ivoire<br>Email: contact@empire.ci</p>
                </div>
            </div>
            <hr>
            <p class="mb-0">&copy; 2025 Empire Market - Projet Génie Logiciel & Informatique de Gestion (IGL, GSI...)</p>
        </div>
    </footer>

    <!-- JS SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Jour_06_Web_JS/Panier_LocalStorage.js"></script>
</body>
</html>
