<?php
// details_commande.php - FACTURE DÉTAILLÉE (MAJ 20/04/2026)
include 'db.php';
$id = $_GET['id'] ?? die("ID manquant");

$stmt = $pdo->prepare("SELECT c.*, cl.* FROM commande c JOIN client cl ON c.id_cli = cl.id_cli WHERE c.id_cmd = ?");
$stmt->execute([$id]);
$cmd = $stmt->fetch();

$lignes = $pdo->prepare("SELECT lc.*, p.ref_prod, p.nom_prod, p.prix_u FROM ligne_commande lc JOIN produit p ON lc.id_prod = p.id_prod WHERE lc.id_cmd = ?");
$lignes->execute([$id]);
$lignes = $lignes->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture <?= $cmd['num_facture'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white p-5">
    <div class="container border p-5 shadow-sm">
        <div class="row mb-5">
            <div class="col-6">
                <h1 class="text-info">FACTURE</h1>
                <p>N° <strong><?= $cmd['num_facture'] ?></strong><br>Date : <?= $cmd['date_cmd'] ?></p>
            </div>
            <div class="col-6 text-end">
                <h4>CLIENT</h4>
                <p><strong><?= $cmd['nom_cli'] ?></strong> (<?= $cmd['code_cli'] ?>)<br>Ville : <?= $cmd['ville_cli'] ?><br>Tél : <?= $cmd['tel_cli'] ?></p>
            </div>
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Réf.</th>
                    <th>Désignation</th>
                    <th class="text-end">Prix U. (FCFA)</th>
                    <th class="text-center">Qté</th>
                    <th class="text-end">Sous-total</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; foreach($lignes as $l): ?>
                <tr>
                    <td><?= $l['ref_prod'] ?></td>
                    <td><?= $l['nom_prod'] ?></td>
                    <td class="text-end"><?= number_format($l['prix_u'], 0, ',', ' ') ?></td>
                    <td class="text-center"><?= $l['qte'] ?></td>
                    <td class="text-end fw-bold"><?= number_format($l['prix_u'] * $l['qte'], 0, ',', ' ') ?></td>
                </tr>
                <?php $total += ($l['prix_u'] * $l['qte']); endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end h4">TOTAL GÉNÉRAL</th>
                    <th class="text-end text-danger h4"><?= number_format($total, 0, ',', ' ') ?> FCFA</th>
                </tr>
            </tfoot>
        </table>
        <a href="index.php" class="btn btn-secondary d-print-none mt-4">Retour au Dashboard</a>
    </div>
</body>
</html>