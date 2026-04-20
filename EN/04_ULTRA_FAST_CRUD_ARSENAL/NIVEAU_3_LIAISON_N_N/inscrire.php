<?php
// inscrire.php - UPDATED 20/04/2026
include 'db.php';
$etudiants = $pdo->query("SELECT * FROM etudiant")->fetchAll();
$cours = $pdo->query("SELECT * FROM cours")->fetchAll();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pdo->prepare("INSERT INTO inscription VALUES (?,?,?)")->execute([$_POST['id_etu'], $_POST['id_cours'], date('Y-m-d')]);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enroll - Level 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN LEVEL 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="etudiant_gestion.php">Students</a></li>
                    <li class="nav-item"><a class="nav-link" href="cours_gestion.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription_gestion.php">Enrollments</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0">M-M Enrollment</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Select a Student</label>
                                <select name="id_etu" class="form-select">
                                    <?php foreach($etudiants as $e): ?> <option value="<?= $e['id_etu'] ?>"><?= $e['nom_etu'] ?></option> <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select a Course</label>
                                <select name="id_cours" class="form-select">
                                    <?php foreach($cours as $c): ?> <option value="<?= $c['id_cours'] ?>"><?= $c['titre_cours'] ?></option> <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-grow-1">Confirm Enrollment</button>
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
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