<?php
// index.php - UPDATED 20/04/2026
include 'db.php';
$sql = "SELECT e.nom_etu, c.titre_cours FROM inscription i 
        INNER JOIN etudiant e ON i.id_etu = e.id_etu 
        INNER JOIN cours c ON i.id_cours = c.id_cours";
$data = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level 3 - School Admin</title>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Enrollments (Triple Join)</h2>
            <div>
                <a href="inscrire.php" class="btn btn-primary">New Enrollment</a>
                <a href="manage_etudiants.php" class="btn btn-outline-dark">Manage Students</a>
                <a href="manage_cours.php" class="btn btn-outline-dark">Manage Courses</a>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Student</th>
                            <th>Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $d): ?>
                        <tr>
                            <td><?= $d['nom_etu'] ?></td>
                            <td><span class="badge bg-secondary"><?= $d['titre_cours'] ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>