<?php
session_start();
require_once('../../models/User.php');

// Configuration de la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=projethackathon", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur de connexion à la base de données";
    header('Location: ../../pages/erreurServeur.php');
    exit();
}

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données
    $fullName = htmlspecialchars(trim($_POST['full_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone_number']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validation des données
    $errors = [];

    // Vérification du mot de passe
    if ($password !== $confirmPassword) {
        $errors[] = "Les mots de passe ne correspondent pas";
    }

    if (strlen($password) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères";
    }

    // Création d'une instance de User
    $user = new User([
        'full_name' => $fullName,
        'email' => $email,
        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        'phone_number' => $phone
    ]);

    // Validation avec les méthodes du modèle
    if (!$user->isValidEmail()) {
        $errors[] = "L'adresse email n'est pas valide";
    }

    if (!$user->isValidPhoneNumber()) {
        $errors[] = "Le numéro de téléphone n'est pas valide";
    }

    // Si pas d'erreurs, on procède à l'inscription
    if (empty($errors)) {
        try {
            if ($user->create($pdo)) {
                $_SESSION['success'] = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";
                header('Location: ../../pages/login.php');
                exit();
            } else {
                $_SESSION['error'] = "Erreur lors de la création du compte";
                header('Location: ../../pages/inscription.php');
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue lors de l'inscription";
            //header('Location: ../../pages/inscription.php');
            exit();
        }
    } else {
        // Stockage des erreurs dans la session
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = [
            'nomcomplet' => $_POST['full_name'],
            'email' => $email,
            'tel' => $phone
        ];
        header('Location: ../../pages/inscription.php');
        exit();
    }
} else {
    // Si quelqu'un essaie d'accéder directement au fichier
    header('Location: ../../pages/inscription.php');
    exit();
}
?>