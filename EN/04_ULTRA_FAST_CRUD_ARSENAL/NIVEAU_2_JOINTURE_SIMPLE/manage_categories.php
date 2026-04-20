<?php
// manage_categories.php - UPDATED 20/04/2026
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pdo->prepare("INSERT INTO categorie (libelle) VALUES (?)")->execute([$_POST['libelle']]);
}
$categories = $pdo->query("SELECT * FROM categorie")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories - Level 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN LEVEL 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="produit_gestion.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="categorie_gestion.php">Categories</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">Quick Add</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <input type="text" name="libelle" class="form-control" placeholder="New category" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">Category List</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach($categories as $c): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $c['libelle'] ?>
                            <span class="badge bg-secondary rounded-pill">ID: <?= $c['id_cat'] ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>