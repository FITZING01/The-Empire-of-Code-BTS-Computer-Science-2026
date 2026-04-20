<?php
// commande_gestion.php - HEADER MANAGEMENT (UPDATED 20/04/2026)
include 'db.php';

if(isset($_POST['creer'])){
    $pdo->prepare("INSERT INTO commande (date_cmd, id_cli) VALUES (?, ?)")->execute([$_POST['date'], $_POST['id_cli']]);
    header("Location: commande_gestion.php");
}

if(isset($_GET['delete'])){
    $pdo->prepare("DELETE FROM commande WHERE id_cmd = ?")->execute([$_GET['delete']]);
    header("Location: commande_gestion.php");
}

$commandes = $pdo->query("SELECT c.*, cl.nom_cli FROM commande c JOIN client cl ON c.id_cli = cl.id_cli")->fetchAll();
$clients = $pdo->query("SELECT * FROM client")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Management - Level 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">ADMIN LEVEL 4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="client_gestion.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="produit_gestion.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link active" href="commande_gestion.php">Orders</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white py-3"><h5 class="mb-0">Create an Order</h5></div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <select name="id_cli" class="form-select">
                                    <?php foreach($clients as $cl): ?><option value="<?= $cl['id_cli'] ?>"><?= $cl['nom_cli'] ?></option><?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                            </div>
                            <button type="submit" name="creer" class="btn btn-primary w-100 fw-bold">Create Header</button>
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
                                    <th>Order No.</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($commandes as $c): ?>
                                <tr>
                                    <td><strong>#<?= $c['id_cmd'] ?></strong></td>
                                    <td class="fw-bold text-primary"><?= $c['nom_cli'] ?></td>
                                    <td><?= $c['date_cmd'] ?></td>
                                    <td class="text-end">
                                        <a href="ligne_commande_gestion.php?id_cmd=<?= $c['id_cmd'] ?>" class="btn btn-success btn-sm">Items</a>
                                        <a href="?delete=<?= $c['id_cmd'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete?')">X</a>
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