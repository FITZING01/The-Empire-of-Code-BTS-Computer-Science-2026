<?php
/**
 * JOUR 05 : FORMULAIRE DE CONTACT PROFESSIONNEL (Syllabus BTS 2025)
 * 🎯 Objectifs : Validation PHP stricte, Sécurité (XSS), Feedback Utilisateur.
 */

$success_msg = "";
$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Récupération et Assainissement des données (Protection XSS)
    $nom       = htmlspecialchars(trim($_POST['nom']));
    $quartier  = htmlspecialchars(trim($_POST['quartier']));
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $email     = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message   = htmlspecialchars(trim($_POST['message']));

    // 2. Validation Stricte (Sujet 2)
    if (empty($nom) || empty($quartier) || empty($telephone) || empty($email) || empty($message)) {
        $error_msg = "Veuillez remplir tous les champs obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Format d'email invalide (ex: nom@domaine.com).";
    } elseif (!preg_match("/^[0-9]{10}$/", $telephone)) { // Validation format téléphone ivoirien (10 chiffres)
        $error_msg = "Le numéro de téléphone doit contenir 10 chiffres.";
    } else {
        // 3. Succès (Simulation d'envoi de mail ou insertion DB)
        $success_msg = "Merci $nom ! Votre demande concernant le quartier $quartier a été enregistrée. Nous vous contacterons au $telephone.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - Empire Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .contact-container { max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        .btn-submit { background-color: #0d6efd; color: white; font-weight: bold; border-radius: 8px; padding: 12px; }
    </style>
</head>
<body class="bg-light">

    <div class="container">
        <div class="contact-container">
            <h2 class="text-center mb-4">Contactez-nous</h2>
            
            <!-- Affichage des messages d'erreur ou de succès -->
            <?php if ($success_msg): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $success_msg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($error_msg): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $error_msg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Nom Complet</label>
                    <input type="text" name="nom" class="form-control" placeholder="Ex: Jean Kouassi" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Quartier</label>
                    <input type="text" name="quartier" class="form-control" placeholder="Ex: Cocody Angré" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" name="telephone" class="form-control" placeholder="Ex: 0102030405" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Adresse Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nom@exemple.com" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Votre Message</label>
                    <textarea name="message" class="form-control" rows="4" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-submit w-100">Envoyer ma Demande</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
