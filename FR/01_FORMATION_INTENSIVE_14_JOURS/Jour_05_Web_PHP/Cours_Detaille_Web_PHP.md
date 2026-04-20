# MASTERCLASS WEB PHP ZÉRO À HÉROS : Architecture & Sécurité

## Scénario : Rendre la boutique vivante

La base de données MaillotPro est robuste, les requêtes sont prêtes. Mais pour l'instant, c'est invisible pour le client. Aujourd'hui, nous allons construire l'interface et le pont logique. Vous n'allez pas faire un simple "site web". Vous allez concevoir une **application web Client/Serveur** sécurisée, élégante grâce à Bootstrap 5, et blindée contre les attaques.

### 1. L'Architecture Client / Serveur

Il est vital de comprendre où s'exécute le code.
- **Le Client (Front-end)** : C'est le navigateur de l'utilisateur (Chrome, Safari). Il lit le HTML, applique le CSS (Bootstrap) et exécute le JavaScript. Le client est le domaine de l'interface utilisateur. **Règle absolue : Le client ne peut jamais être de confiance.**
- **Le Serveur (Back-end)** : C'est votre machine (Apache/Nginx) qui exécute PHP. C'est ici que la logique métier réside, que les mots de passe sont vérifiés, que la base de données est interrogée. Le serveur génère le HTML final qui est envoyé au client.

### 2. L'Interface avec Bootstrap 5

Oubliez le CSS inline ou les designs aléatoires. Pour un prototype rapide et professionnel, **Bootstrap 5** est l'arme de choix. Il repose sur un système de grille flexible (12 colonnes) et des classes utilitaires pré-faites.
- Responsive par défaut (`col-12 col-md-6 col-lg-4`).
- Composants natifs accessibles (a11y).
- Variables CSS pour un thème facilement personnalisable.

### 3. La Sécurité PHP : La Tolérance Zéro

Le web est un champ de bataille. Si votre formulaire PHP n'est pas sécurisé, vous vous ferez pirater en 24 heures.
1. **Injections SQL** : Un pirate tape `' OR 1=1 --` dans le champ email pour contourner l'authentification.
   - *La parade* : **Toujours** utiliser PDO avec des requêtes préparées (`prepare()` et `execute()`). Jamais de concaténation de variables dans une requête SQL.
2. **Faille XSS (Cross-Site Scripting)** : Un pirate injecte du code JavaScript `<script>alert('hack')</script>` dans un nom de produit qui sera affiché aux autres utilisateurs.
   - *La parade* : **Toujours** échapper les données à l'affichage avec `htmlspecialchars()`.
3. **Faille CSRF & Traitement des données** : Toujours vérifier la méthode HTTP (`$_SERVER['REQUEST_METHOD'] === 'POST'`) et assainir les entrées.

### 4. Le Code Masterpiece : La Page Boutique PHP

Voici le fichier `boutique.php` complet. Il combine l'UI (Bootstrap 5), la logique serveur (PHP PDO) et l'application stricte des règles de sécurité.

```php
<?php
// boutique.php - Niveau Production

// 1. GESTION DES ERREURS (Activer en dev, désactiver en prod)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. CONNEXION SÉCURISÉE À LA BDD VIA PDO
try {
    $dsn = "mysql:host=localhost;dbname=maillot_pro_db;charset=utf8mb4";
    $username = "root"; // En production, utilisez des variables d'environnement !
    $password = "";
    
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lance des exceptions en cas d'erreur SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retourne des tableaux associatifs propres
        PDO::ATTR_EMULATE_PREPARES => false, // Sécurité renforcée contre l'injection SQL
    ];
    
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Ne jamais afficher l'erreur brute à l'utilisateur en production !
    die("<div class='alert alert-danger'>Erreur de connexion à la base de données.</div>");
}

// 3. LOGIQUE MÉTIER : Récupération des produits
// Nous utilisons query() car il n'y a pas de variables utilisateur ici (pas de risque d'injection directe)
$sql = "SELECT p.id_produit, p.nom_produit, p.prix, c.nom_categorie 
        FROM produit p
        INNER JOIN categorie c ON p.id_categorie = c.id_categorie
        WHERE p.stock > 0 
        ORDER BY p.nom_produit ASC";
$stmt = $pdo->query($sql);
$produits = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - MaillotPro</title>
    <!-- Intégration de Bootstrap 5 via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Surcharge UI pour un look premium */
        body { background-color: #f8f9fa; }
        .card-produit { transition: transform 0.3s ease, box-shadow 0.3s ease; border: none; }
        .card-produit:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .prix-tag { font-weight: bold; color: #198754; font-size: 1.25rem; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MaillotPro</a>
            <div class="d-flex">
                <button class="btn btn-outline-light" id="btn-panier">
                    🛒 Panier <span class="badge bg-danger" id="compteur-panier">0</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="fw-bold">Notre Collection Officielle</h1>
                <p class="text-muted">Découvrez nos maillots authentiques. Stock limité.</p>
            </div>
        </div>

        <div class="row g-4">
            <?php if (empty($produits)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">Aucun produit disponible pour le moment.</div>
                </div>
            <?php else: ?>
                <?php foreach ($produits as $produit): ?>
                    <!-- Grille Responsive : 1 col sur mobile, 2 sur tablette, 3 sur desktop -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 card-produit shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-secondary mb-2 align-self-start">
                                    <!-- SÉCURITÉ : htmlspecialchars obligatoire pour toute donnée issue de la BDD -->
                                    <?= htmlspecialchars($produit['nom_categorie'], ENT_QUOTES, 'UTF-8') ?>
                                </span>
                                <h5 class="card-title fw-bold">
                                    <?= htmlspecialchars($produit['nom_produit'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text mt-auto mb-3 prix-tag">
                                    <?= number_format($produit['prix'], 0, ',', ' ') ?> FCFA
                                </p>
                                <!-- Bouton avec attributs data-* pour le JavaScript -->
                                <button class="btn btn-primary w-100 btn-add-cart" 
                                        data-id="<?= (int)$produit['id_produit'] ?>"
                                        data-nom="<?= htmlspecialchars($produit['nom_produit'], ENT_QUOTES, 'UTF-8') ?>"
                                        data-prix="<?= (float)$produit['prix'] ?>">
                                    Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">&copy; <?= date('Y') ?> MaillotPro. Qualité Garantie.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Le script du panier viendra dans la prochaine leçon -->
</body>
</html>
```

### Leçon du Senior
L'architecture est propre : on sépare la logique d'accès aux données (en haut) de l'affichage (en bas). Notez l'utilisation systématique de `htmlspecialchars` lors de l'affichage des variables PHP dans le HTML. C'est votre bouclier anti-XSS. Ce code est prêt pour la production.