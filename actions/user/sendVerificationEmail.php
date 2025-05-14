<?php
session_start();
require_once('../../models/User.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require '../../vendor/autoload.php';

// Configuration de la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=projethackathon", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur de connexion à la base de données";
    header('Location: ../../pages/renvoiEmail.php');
    exit();
}

function sendVerificationEmail($userEmail, $userName, $verificationToken) {
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'votre_email@gmail.com'; // Remplacez par votre email
        $mail->Password = 'votre_mot_de_passe_app'; // Remplacez par votre mot de passe d'application
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // Destinataires
        $mail->setFrom('votre_email@gmail.com', 'SignalGuinée');
        $mail->addAddress($userEmail, $userName);

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Vérification de votre compte SignalGuinée';
        
        $verificationLink = "http://localhost/hackthonOriginal/actions/user/verify.php?token=" . $verificationToken;
        
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                <h2 style='color: #059669;'>Bienvenue sur SignalGuinée !</h2>
                <p>Cher(e) {$userName},</p>
                <p>Merci de vous être inscrit(e) sur SignalGuinée. Pour activer votre compte, veuillez cliquer sur le bouton ci-dessous :</p>
                <div style='text-align: center; margin: 30px 0;'>
                    <a href='{$verificationLink}' style='background-color: #059669; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; display: inline-block;'>
                        Vérifier mon compte
                    </a>
                </div>
                <p>Si le bouton ne fonctionne pas, vous pouvez copier et coller ce lien dans votre navigateur :</p>
                <p style='word-break: break-all;'>{$verificationLink}</p>
                <p>Ce lien expirera dans 24 heures.</p>
                <hr style='margin: 30px 0; border: 1px solid #eee;'>
                <p style='color: #666; font-size: 12px;'>
                    Si vous n'avez pas créé de compte sur SignalGuinée, veuillez ignorer cet email.
                </p>
            </div>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Traitement de la demande de renvoi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['email'] ?? '';
    
    if (empty($email)) {
        $_SESSION['error'] = "Email non trouvé dans la session";
        header('Location: ../../pages/renvoiEmail.php');
        exit();
    }

    try {
        // Génération d'un nouveau token
        $newToken = bin2hex(random_bytes(32));
        
        // Mise à jour du token dans la base de données
        $query = "UPDATE Users SET verification_token = :token WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'token' => $newToken,
            'email' => $email
        ]);

        // Récupération du nom de l'utilisateur
        $query = "SELECT full_name FROM Users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (sendVerificationEmail($email, $user['full_name'], $newToken)) {
            $_SESSION['success'] = "Un nouveau lien de vérification a été envoyé à votre adresse email";
        } else {
            $_SESSION['error'] = "Erreur lors de l'envoi de l'email. Veuillez réessayer plus tard";
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Une erreur est survenue lors du traitement de votre demande";
    }

    header('Location: ../../pages/renvoiEmail.php');
    exit();
}
?>