<?php
/**
 * DAY 05: PROFESSIONAL CONTACT FORM (BTS 2025 Syllabus)
 * 🎯 Objectives: Strict PHP Validation, Security (XSS), User Feedback.
 */

$success_msg = "";
$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Data Retrieval and Sanitization (XSS Protection)
    $name         = htmlspecialchars(trim($_POST['name']));
    $neighborhood = htmlspecialchars(trim($_POST['neighborhood']));
    $phone        = htmlspecialchars(trim($_POST['phone']));
    $email        = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message      = htmlspecialchars(trim($_POST['message']));

    // 2. Strict Validation (Subject 2)
    if (empty($name) || empty($neighborhood) || empty($phone) || empty($email) || empty($message)) {
        $error_msg = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Invalid email format (ex: name@domain.com).";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) { // Validation for 10-digit phone format
        $error_msg = "The phone number must contain 10 digits.";
    } else {
        // 3. Success (Simulation of mail sending or DB insertion)
        $success_msg = "Thank you $name! Your request concerning the neighborhood $neighborhood has been recorded. We will contact you at $phone.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
            <h2 class="text-center mb-4">Contact Us</h2>
            
            <!-- Display error or success messages -->
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
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Ex: Jean Kouassi" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Neighborhood</label>
                    <input type="text" name="neighborhood" class="form-control" placeholder="Ex: Cocody Angré" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-control" placeholder="Ex: 0102030405" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Your Message</label>
                    <textarea name="message" class="form-control" rows="4" placeholder="How can we help you?" required></textarea>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-submit w-100">Send my Request</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
