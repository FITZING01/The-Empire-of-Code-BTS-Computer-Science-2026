<?php
// index.php - UPDATED 20/04/2026
include 'db.php';
$clients = $pdo->query("SELECT * FROM client")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level 1 - Client Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN LEVEL 1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Client List</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Client Management</h2>
            <a href="ajouter.php" class="btn btn-success">Add Client</a>
        </div>
        
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($clients as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= $c['nom'] ?></td>
                            <td><?= $c['prenom'] ?? '' ?></td>
                            <td><?= $c['email'] ?? '' ?></td>
                            <td><?= $c['ville'] ?? '' ?></td>
                            <td class="text-end">
                                <a href="modifier.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="supprimer.php?id=<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this client?')">X</a>
                            </td>
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