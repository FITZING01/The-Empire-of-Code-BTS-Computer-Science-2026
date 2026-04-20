<?php
// index.php - GESTION DE STOCK (MAJ 20/04/2026)
include 'db.php';
$sql = "SELECT p.*, c.libelle FROM produit p JOIN categorie c ON p.id_cat = c.id_cat";
$produits = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow">
    <div class="container"><a class="navbar-brand fw-bold" href="index.php">STOCK MANAGER 2.0</a>
    <div class="navbar-nav">
        <a class="nav-link active" href="index.php">Inventaire</a>
        <a class="nav-link" href="categorie_gestion.php">Catégories</a>
        <a class="nav-link" href="produit_gestion.php">Nouveau Produit</a>
    </div></div>
</nav>

<div class="container">
    <h2 class="mb-4">État de l'Inventaire</h2>
    <div class="card shadow-sm border-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Réf.</th>
                    <th>Désignation</th>
                    <th>Catégorie</th>
                    <th class="text-center">Quantité</th>
                    <th class="text-end">Prix (FCFA)</th>
                    <th class="text-center">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produits as $p): 
                    $alerte = ($p['qte_stock'] <= $p['seuil_alerte']);
                ?>
                <tr>
                    <td><code><?= $p['ref_prod'] ?></code></td>
                    <td><strong><?= $p['nom_prod'] ?></strong></td>
                    <td><?= $p['libelle'] ?></td>
                    <td class="text-center"><?= $p['qte_stock'] ?></td>
                    <td class="text-end fw-bold"><?= number_format($p['prix_u'], 0, ',', ' ') ?></td>
                    <td class="text-center">
                        <?php if($alerte): ?>
                            <span class="badge bg-danger">Alerte Stock</span>
                        <?php else: ?>
                            <span class="badge bg-success">En Stock</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>