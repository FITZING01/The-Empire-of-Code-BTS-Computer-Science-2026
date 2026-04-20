<?php
// categorie_gestion.php - COMPLETE CRUD (UPDATED 20/04/2026)
include 'db.php';

if(isset($_POST['ajouter'])){
    $pdo->prepare("INSERT INTO categorie (libelle) VALUES (?)")->execute([$_POST['libelle']]);
    header("Location: categorie_gestion.php");
}

if(isset($_GET['delete'])){
    $pdo->prepare("DELETE FROM categorie WHERE id_cat = ?")->execute([$_GET['delete']]);
    header("Location: categorie_gestion.php");
}

$categories = $pdo->query("SELECT * FROM categorie")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category Management - Level 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN LEVEL 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="produit_gestion.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link active" href="categorie_gestion.php">Categories</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Add a Category</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="d-flex gap-2">
                            <input type="text" name="libelle" class="form-control" placeholder="Category name" required>
                            <button type="submit" name="ajouter" class="btn btn-success">Add</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Label</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $c): ?>
                                <tr>
                                    <td><?= $c['id_cat'] ?></td>
                                    <td><?= $c['libelle'] ?></td>
                                    <td class="text-end">
                                        <a href="?delete=<?= $c['id_cat'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>