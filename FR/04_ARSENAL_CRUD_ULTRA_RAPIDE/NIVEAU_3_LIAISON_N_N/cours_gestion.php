<?php
// cours_gestion.php - CRUD COMPLET (MAJ 20/04/2026)
include 'db.php';

if(isset($_POST['ajouter'])){
    $pdo->prepare("INSERT INTO cours (titre_cours) VALUES (?)")->execute([$_POST['titre']]);
    header("Location: cours_gestion.php");
}

if(isset($_GET['delete'])){
    $pdo->prepare("DELETE FROM cours WHERE id_cours = ?")->execute([$_GET['delete']]);
    header("Location: cours_gestion.php");
}

$cours = $pdo->query("SELECT * FROM cours")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Cours - Niveau 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN NIVEAU 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="etudiant_gestion.php">Étudiants</a></li>
                    <li class="nav-item"><a class="nav-link active" href="cours_gestion.php">Cours</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription_gestion.php">Inscriptions</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-warning py-3"><h5 class="mb-0">Ajouter un Cours</h5></div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Titre du cours</label>
                                <input type="text" name="titre" class="form-control" placeholder="Ex: Informatique" required>
                            </div>
                            <button type="submit" name="ajouter" class="btn btn-dark w-100">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cours as $c): ?>
                                <tr>
                                    <td><?= $c['id_cours'] ?></td>
                                    <td class="fw-bold"><?= $c['titre_cours'] ?></td>
                                    <td class="text-end">
                                        <a href="?delete=<?= $c['id_cours'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Supprimer ce cours ?')">Supprimer</a>
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