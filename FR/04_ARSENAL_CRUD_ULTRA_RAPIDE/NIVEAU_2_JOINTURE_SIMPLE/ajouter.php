<?php
include 'db.php';

// 1. Récupérer les catégories pour la liste déroulante
$cats = $pdo->query("SELECT * FROM Categorie")->fetchAll();

// 2. Traitement de l'ajout
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $pdo->prepare("INSERT INTO Produit (nom_prod, prix, id_cat) VALUES (?,?,?)");
    $stmt->execute([$_POST['nom'], $_POST['prix'], $_POST['id_cat']]);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Produit - Niveau 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN NIVEAU 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="produit_gestion.php">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="categorie_gestion.php">Catégories</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Ajouter un Produit</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nom du produit</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Prix</label>
                                <input type="number" step="0.01" name="prix" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Catégorie</label>
                                <select name="id_cat" class="form-select">
                                    <?php foreach($cats as $c): ?>
                                        <option value="<?= $c['id_cat'] ?>"><?= $c['libelle'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success flex-grow-1">Enregistrer le produit</button>
                                <a href="index.php" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>