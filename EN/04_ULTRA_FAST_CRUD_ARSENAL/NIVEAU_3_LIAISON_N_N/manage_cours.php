<?php
include 'db.php';
// Delete treatment
if(isset($_GET['del'])){
    $pdo->prepare("DELETE FROM Cours WHERE id_cours = ?")->execute([$_GET['del']]);
    header('Location: manage_cours.php');
}
// Add treatment
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pdo->prepare("INSERT INTO Cours (titre_cours) VALUES (?)")->execute([$_POST['titre']]);
}
$cours = $pdo->query("SELECT * FROM Cours")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Courses - Level 3</title>
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
                    <li class="nav-item"><a class="nav-link active" href="cours_gestion.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription_gestion.php">Enrollments</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm mb-4 border-0">
                    <h4 class="mb-3">Add a Course</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="titre" class="form-control" placeholder="Course title" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light"><tr><th>ID</th><th>Title</th><th class="text-end">Action</th></tr></thead>
                            <tbody>
                                <?php foreach($cours as $c): ?>
                                <tr>
                                    <td><?= $c['id_cours'] ?></td>
                                    <td class="fw-bold"><?= $c['titre_cours'] ?></td>
                                    <td class="text-end"><a href="?del=<?= $c['id_cours'] ?>" class="btn btn-outline-danger btn-sm">Delete</a></td>
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