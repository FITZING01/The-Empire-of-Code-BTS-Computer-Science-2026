<?php
include 'db.php';
// Deletion
if(isset($_GET['del'])){
    $pdo->prepare("DELETE FROM client WHERE id_cli = ?")->execute([$_GET['del']]);
    header('Location: manage_clients.php');
}
// Addition
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pdo->prepare("INSERT INTO client (nom_cli) VALUES (?)")->execute([$_POST['nom']]);
}
$clients = $pdo->query("SELECT * FROM client")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Clients - Level 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN LEVEL 4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="client_gestion.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="produit_gestion.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="commande_gestion.php">Orders</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4 shadow-sm mb-4 border-0">
                    <h4 class="mb-3">New Client</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" name="nom" class="form-control" placeholder="Company Name" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Create</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-dark"><tr><th>ID</th><th>Name</th><th class="text-end">Action</th></tr></thead>
                            <tbody>
                                <?php foreach($clients as $c): ?>
                                <tr>
                                    <td><?= $c['id_cli'] ?></td>
                                    <td class="fw-bold"><?= $c['nom_cli'] ?></td>
                                    <td class="text-end"><a href="?del=<?= $c['id_cli'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete?')">Delete</a></td>
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