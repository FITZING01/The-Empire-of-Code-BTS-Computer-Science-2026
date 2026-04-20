<?php
// ligne_commande_gestion.php - ULTRA-ROBUST VERSION (UPDATED 20/04/2026)
include 'db.php';
$id_cmd = $_GET['id_cmd'] ?? die("Missing Order ID");

if(isset($_POST['ajouter'])){
    $id_prod = $_POST['id_prod'];
    $qte_ajoutee = $_POST['qte'];

    // 1. VERIFICATION: Is the product already in this order?
    $check = $pdo->prepare("SELECT qte FROM ligne_commande WHERE id_cmd = ? AND id_prod = ?");
    $check->execute([$id_cmd, $id_prod]);
    $existe = $check->fetch();

    if($existe){
        // 2. IF YES: Add quantities (UPDATE)
        $nouvelle_qte = $existe['qte'] + $qte_ajoutee;
        $stmt = $pdo->prepare("UPDATE ligne_commande SET qte = ? WHERE id_cmd = ? AND id_prod = ?");
        $stmt->execute([$nouvelle_qte, $id_cmd, $id_prod]);
    } else {
        // 3. IF NO: Insert normally (INSERT)
        $stmt = $pdo->prepare("INSERT INTO ligne_commande (id_cmd, id_prod, qte) VALUES (?, ?, ?)");
        $stmt->execute([$id_cmd, $id_prod, $qte_ajoutee]);
    }
    header("Location: ligne_commande_gestion.php?id_cmd=$id_cmd&success=1");
    exit();
}

if(isset($_GET['del_prod'])){
    $pdo->prepare("DELETE FROM ligne_commande WHERE id_cmd = ? AND id_prod = ?")
        ->execute([$id_cmd, $_GET['del_prod']]);
    header("Location: ligne_commande_gestion.php?id_cmd=$id_cmd");
    exit();
}

// Data recovery
$lignes = $pdo->prepare("SELECT lc.*, p.nom_prod, p.prix FROM ligne_commande lc JOIN produit p ON lc.id_prod = p.id_prod WHERE lc.id_cmd = ?");
$lignes->execute([$id_cmd]);
$lignes = $lignes->fetchAll();

$produits = $pdo->query("SELECT * FROM produit")->fetchAll();
$cmd_info = $pdo->prepare("SELECT c.*, cl.nom_cli FROM commande c JOIN client cl ON c.id_cli = cl.id_cli WHERE c.id_cmd = ?");
$cmd_info->execute([$id_cmd]);
$cmd_info = $cmd_info->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
    <div class="container"><a class="navbar-brand" href="index.php">ADMIN LEVEL 4</a></div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="commande_gestion.php" class="btn btn-secondary btn-sm">← Back to Orders</a>
            <h2 class="mt-3">Order Items #<?= $id_cmd ?> (Client: <?= $cmd_info['nom_cli'] ?>)</h2>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white"><h5>Add an Item</h5></div>
                <div class="card-body">
                    <form method="POST">
                        <label>Product</label>
                        <select name="id_prod" class="form-select mb-3">
                            <?php foreach($produits as $p): ?><option value="<?= $p['id_prod'] ?>"><?= $p['nom_prod'] ?> (<?= $p['prix'] ?> €)</option><?php endforeach; ?>
                        </select>
                        <label>Quantity</label>
                        <input type="number" name="qte" class="form-control mb-3" value="1" min="1" required>
                        <button type="submit" name="ajouter" class="btn btn-success w-100">Add / Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow border-0 p-3">
                <table class="table">
                    <thead><tr><th>Product</th><th>UP</th><th>Qty</th><th>Total</th><th>Action</th></tr></thead>
                    <tbody>
                        <?php $total = 0; foreach($lignes as $l): ?>
                        <tr>
                            <td><?= $l['nom_prod'] ?></td>
                            <td><?= $l['prix'] ?> €</td>
                            <td><?= $l['qte'] ?></td>
                            <td><?= $l['prix'] * $l['qte'] ?> €</td>
                            <td><a href="?id_cmd=<?= $id_cmd ?>&del_prod=<?= $l['id_prod'] ?>" class="btn btn-danger btn-sm">X</a></td>
                        </tr>
                        <?php $total += ($l['prix'] * $l['qte']); endforeach; ?>
                    </tbody>
                    <tfoot><tr class="table-light"><th colspan="3" class="text-end">TOTAL:</th><th colspan="2" class="text-danger h5"><?= $total ?> €</th></tr></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>