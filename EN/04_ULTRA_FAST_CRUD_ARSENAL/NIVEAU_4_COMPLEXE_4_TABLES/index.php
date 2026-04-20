<?php
// index.php - ERP DASHBOARD (UPDATED 20/04/2026)
include 'db.php';
// Rich query: Invoice + Client + City + Global total
$sql = "SELECT c.id_cmd, c.num_facture, c.date_cmd, cl.nom_cli, cl.ville_cli, 
               SUM(lc.qte * p.prix_u) as total_fcfa 
        FROM commande c 
        JOIN client cl ON c.id_cli = cl.id_cli 
        JOIN ligne_commande lc ON c.id_cmd = lc.id_cmd 
        JOIN produit p ON lc.id_prod = p.id_prod 
        GROUP BY c.id_cmd";
$commandes = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ERP Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
    <div class="container"><a class="navbar-brand text-info fw-bold" href="index.php">EMPIRE ERP 4.0</a>
    <div class="navbar-nav">
        <a class="nav-link" href="client_gestion.php">Clients</a>
        <a class="nav-link" href="produit_gestion.php">Stock</a>
        <a class="nav-link" href="commande_gestion.php">Billing</a>
    </div></div>
</nav>

<div class="container">
    <h2 class="mb-4 text-secondary">Sales Dashboard</h2>
    <div class="card shadow border-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Invoice No.</th>
                    <th>Client</th>
                    <th>City</th>
                    <th>Date</th>
                    <th class="text-end">Total (FCFA)</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($commandes as $cmd): ?>
                <tr>
                    <td><span class="badge bg-secondary"><?= $cmd['num_facture'] ?></span></td>
                    <td><strong><?= $cmd['nom_cli'] ?></strong></td>
                    <td><?= $cmd['ville_cli'] ?></td>
                    <td><?= date('d/m/Y', strtotime($cmd['date_cmd'])) ?></td>
                    <td class="text-end text-primary fw-bold"><?= number_format($cmd['total_fcfa'], 0, ',', ' ') ?></td>
                    <td class="text-center">
                        <a href="details_commande.php?id=<?= $cmd['id_cmd'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>