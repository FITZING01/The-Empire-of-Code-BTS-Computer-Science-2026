<?php
include 'db.php';
// Traitement suppression
if(isset($_GET['del'])){
    $pdo->prepare("DELETE FROM Etudiant WHERE id_etu = ?")->execute([$_GET['del']]);
    header('Location: manage_etudiants.php');
}
// Traitement Ajout
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pdo->prepare("INSERT INTO Etudiant (nom_etu) VALUES (?)")->execute([$_POST['nom']]);
}
$etudiants = $pdo->query("SELECT * FROM Etudiant")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer Étudiants - Niveau 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN NIVEAU 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="etudiant_gestion.php">Étudiants</a></li>
                    <li class="nav-item"><a class="nav-link" href="cours_gestion.php">Cours</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription_gestion.php">Inscriptions</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm mb-4 border-0">
                    <h4 class="mb-3">Ajouter un Étudiant</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="nom" class="form-control" placeholder="Nom de l'étudiant" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light"><tr><th>ID</th><th>Nom</th><th class="text-end">Action</th></tr></thead>
                            <tbody>
                                <?php foreach($etudiants as $e): ?>
                                <tr>
                                    <td><?= $e['id_etu'] ?></td>
                                    <td class="fw-bold"><?= $e['nom_etu'] ?></td>
                                    <td class="text-end"><a href="?del=<?= $e['id_etu'] ?>" class="btn btn-outline-danger btn-sm">Supprimer</a></td>
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