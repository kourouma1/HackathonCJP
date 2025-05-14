<?php
session_start();
require_once('../../models/User.php');

// Configuration de la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=projethackathon", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur de connexion à la base de données";
    header('Location: ../../pages/connexion.php');
    exit();
}

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];

    // Validation des identifiants
    $loginResult = User::verifyLoginCredentials($pdo, $email, $password);
    
    exit();

    if ($loginResult['status']) {
        // Connexion réussie
        $_SESSION['user'] = [
            'user_id' => $loginResult['user']->getUserId(),
            'full_name' => $loginResult['user']->getFullName(),
            'email' => $loginResult['user']->getEmail(),
            'role' => $loginResult['user']->getRole()
        ];

        // Redirection selon le rôle
        if ($loginResult['user']->getRole() === 'admin') {
            header('Location: ../../admin/dashboard.php');
        } else {
            header('Location: ../../pages/index.php');
        }
        exit();
    } else {
        // Erreur de connexion
        $_SESSION['error'] = $loginResult['message'];
        $_SESSION['old_input'] = [
            'email' => $email
        ];
        header('Location: ../../pages/login.php');
        exit();
    }
} else {
    // Si quelqu'un essaie d'accéder directement au fichier
    header('Location: ../../pages/connexion.php');
    exit();
}
?>