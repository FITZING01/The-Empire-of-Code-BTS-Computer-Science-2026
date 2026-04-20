<?php
// inscription_gestion.php - EXHAUSTIVE BUSINESS VERSION (UPDATED 20/04/2026)
include 'db.php';
$error = "";

if(isset($_POST['inscrire'])){
    try {
        $stmt = $pdo->prepare("INSERT INTO inscription (id_etu, id_cours, annee_scolaire, date_inscription, montant_frais) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['id_etu'], 
            $_POST['id_cours'], 
            $_POST['annee'], 
            date('Y-m-d'), 
            $_POST['frais']
        ]);
        header("Location: inscription_gestion.php?success=1");
        exit();
    } catch (PDOException $e) {
        $error = ($e->getCode() == 23000) ? "This student is already enrolled in this course for this year." : $e->getMessage();
    }
}

// Data recovery with rich join
$sql = "SELECT e.matricule, e.nom, e.prenom, c.libelle, i.annee_scolaire, i.montant_frais 
        FROM inscription i 
        JOIN etudiant e ON i.id_etu = e.id_etu 
        JOIN cours c ON i.id_cours = c.id_cours 
        ORDER BY i.annee_scolaire DESC";
$inscriptions = $pdo->query($sql)->fetchAll();

$etudiants = $pdo->query("SELECT * FROM etudiant")->fetchAll();
$cours = $pdo->query("SELECT * FROM cours")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrollment Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-warning mb-4">
    <div class="container"><a class="navbar-brand text-dark fw-bold" href="index.php">SCHOOL ADMIN</a></div>
</nav>

<div class="container">
    <?php if($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>

    <div class="row">
        <!-- ADAPTED FORM -->
        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white"><h5>New Enrollment</h5></div>
                <div class="card-body">
                    <form method="POST">
                        <label class="form-label">Select Student</label>
                        <select name="id_etu" class="form-select mb-3" required>
                            <?php foreach($etudiants as $e): ?>
                                <option value="<?= $e['id_etu'] ?>">[<?= $e['matricule'] ?>] <?= $e['nom'] ?> <?= $e['prenom'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label class="form-label">Select Course</label>
                        <select name="id_cours" class="form-select mb-3" required>
                            <?php foreach($cours as $c): ?>
                                <option value="<?= $c['id_cours'] ?>"><?= $c['libelle'] ?> (Coeff: <?= $c['coefficient'] ?>)</option>
                            <?php endforeach; ?>
                        </select>

                        <label class="form-label">School Year</label>
                        <input type="text" name="annee" class="form-control mb-3" value="2025-2026" required>

                        <label class="form-label">Enrollment Fees (FCFA)</label>
                        <input type="number" name="frais" class="form-control mb-4" placeholder="Ex: 25000" required>

                        <button type="submit" name="inscrire" class="btn btn-warning w-100 fw-bold">CONFIRM ENROLLMENT</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- RICH LIST -->
        <div class="col-md-8">
            <div class="card shadow border-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($inscriptions as $i): ?>
                        <tr>
                            <td><strong><?= $i['matricule'] ?></strong><br><small><?= $i['nom'] ?> <?= $i['prenom'] ?></small></td>
                            <td><?= $i['libelle'] ?></td>
                            <td><?= $i['annee_scolaire'] ?></td>
                            <td class="text-success fw-bold"><?= number_format($i['montant_frais'], 0, ',', ' ') ?> FCFA</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>