<?php
// Démarrage de la session
session_start();

// Destruction de toutes les données de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, supprimez également le cookie de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, destruction de la session
session_destroy();

// Redirection vers la page de connexion
header('Location: ../../pages/index.php');
exit();
?>