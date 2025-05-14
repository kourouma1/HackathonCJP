<?php
session_start();
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Récupération des informations de l'utilisateur depuis la session
$userEmail = $_SESSION['email'] ?? null;
$userName = $_SESSION['full_name'] ?? null;
$verificationToken = $_SESSION['verification_token'] ?? null;

// Vérification des variables requises
if (!$userEmail || !$userName || !$verificationToken) {
    die("Informations d'utilisateur manquantes dans la session");
}

// Configuration de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramètres du serveur
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'martinkourouma@gmail.com';
    $mail->Password = 'lsws gjfd gvja ugqe';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    // Configuration de l'expéditeur et du destinataire
    $mail->setFrom('martinkourouma@gmail.com', 'SignalGuinée');
    $mail->addAddress($userEmail, $userName);

    // Contenu personnalisé de l'email
    $mail->isHTML(true);
    $mail->Subject = '🌟 Bienvenue sur SignalGuinée - Vérification de votre compte';
    
    // Corps de l'email avec un design moderne
    $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #f8f9fa; padding: 20px;'>
            <div style='text-align: center; margin-bottom: 30px;'>
                <h1 style='color: #059669; margin: 0;'>SignalGuinée</h1>
                <p style='color: #666; font-size: 16px;'>Ensemble pour une Guinée meilleure</p>
            </div>

            <div style='background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);'>
                <h2 style='color: #059669; margin-top: 0;'>Bonjour {$userName} 👋</h2>
                
                <p style='color: #444; line-height: 1.6;'>
                    Merci d'avoir rejoint SignalGuinée, la plateforme citoyenne qui permet d'améliorer notre cadre de vie. 
                    Pour commencer à signaler des problèmes et contribuer à l'amélioration de nos infrastructures, 
                    veuillez vérifier votre compte en cliquant sur le bouton ci-dessous :
                </p>

                <div style='text-align: center; margin: 30px 0;'>
                    <a href='{$verificationLink}' 
                       style='background-color: #059669; 
                              color: white; 
                              padding: 15px 30px; 
                              text-decoration: none; 
                              border-radius: 5px; 
                              font-weight: bold;
                              display: inline-block;'>
                        Activer mon compte
                    </a>
                </div>

                <p style='color: #666; font-size: 14px;'>
                    Si le bouton ne fonctionne pas, vous pouvez copier et coller ce lien dans votre navigateur :
                    <br>
                    <span style='color: #059669; word-break: break-all;'>{$verificationLink}</span>
                </p>

                <div style='margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;'>
                    <p style='color: #666; font-size: 14px;'>
                        Avec SignalGuinée, vous pourrez :
                        <ul style='color: #666;'>
                            <li>Signaler des problèmes d'infrastructure</li>
                            <li>Suivre l'évolution des signalements</li>
                            <li>Contribuer à l'amélioration de votre communauté</li>
                        </ul>
                    </p>
                </div>
            </div>

            <div style='text-align: center; margin-top: 30px; color: #666; font-size: 12px;'>
                <p>Ce message a été envoyé automatiquement. Merci de ne pas y répondre.</p>
                <p>Si vous n'avez pas créé de compte sur SignalGuinée, veuillez ignorer cet email.</p>
            </div>
        </div>
    ";

    // Version texte pour les clients mail qui ne supportent pas l'HTML
    $mail->AltBody = "
        Bienvenue sur SignalGuinée !

        Bonjour {$userName},

        Merci d'avoir rejoint SignalGuinée. Pour activer votre compte, veuillez cliquer sur le lien suivant :
        {$verificationLink}

        Si vous n'avez pas créé de compte sur SignalGuinée, veuillez ignorer cet email.

        L'équipe SignalGuinée
    ";

    $mail->send();
    $_SESSION['success'] = "Email de vérification envoyé avec succès !";
    header('Location: ../../pages/renvoiEmail.php');
    exit();
} catch (Exception $e) {
    $_SESSION['error'] = "Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo;
    header('Location: ../../pages/renvoiEmail.php');
    exit();
}
?>