<?php
// demarage de la session
session_start();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vérification Requise | SignalGuinée</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
    }
    
    .verification-card {
      transform-style: preserve-3d;
      animation: fadeInUp 0.8s ease-out;
    }
    
    .envelope-icon {
      animation: float 3s ease-in-out infinite, shake 1s ease-in-out infinite 3s;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }
    
    @keyframes shake {
      0%, 100% { transform: rotate(0deg); }
      25% { transform: rotate(-5deg); }
      75% { transform: rotate(5deg); }
    }
    
    .pulse-btn {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
      0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
      50% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
    }
    
    .countdown {
      animation: bounce 1s infinite alternate;
    }
    
    @keyframes bounce {
      from { transform: translateY(0); }
      to { transform: translateY(-5px); }
    }
    
    .btn-hover {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .btn-hover:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.4);
    }
    
    .btn-hover::after {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: all 0.5s ease;
    }
    
    .btn-hover:hover::after {
      left: 100%;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
  <div class="max-w-md w-full">
    <div class="verification-card bg-white rounded-2xl shadow-xl overflow-hidden animate__animated animate__fadeInUp">
      <div class="p-8 text-center">
        <div class="mx-auto w-32 h-32 bg-green-50 rounded-full flex items-center justify-center mb-6 envelope-icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </div>
        
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 animate__animated animate__fadeIn">Vérification Requise</h1>
        <p class="text-gray-600 mb-6 animate__animated animate__fadeIn animate__delay-1s">
          Nous avons envoyé un lien de vérification à <span class="font-semibold text-green-600"><?php echo $_SESSION['email'] ?></span>
        </p>
        
        <div class="bg-green-50 border border-green-100 rounded-lg p-4 mb-6 animate__animated animate__fadeIn animate__delay-2s">
          <p class="text-green-800 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            Vérifiez votre boîte mail et cliquez sur le lien reçu
          </p>
        </div>
        
        <button class="btn-hover pulse-btn bg-green-600 text-white font-semibold w-full py-3 px-4 rounded-lg mb-6 transition-all duration-300 animate__animated animate__fadeInUp animate__delay-3s">
          Renvoyer le lien de vérification
          <span class="countdown ml-2 inline-block">(60s)</span>
        </button>
        
        <div class="text-sm text-gray-500 animate__animated animate__fadeIn animate__delay-4s">
          Vous n'avez pas reçu l'email? 
          <a href="#" class="text-green-600 font-medium hover:text-green-800 transition">Vérifiez votre dossier spam</a> ou 
          <a href="#" class="text-green-600 font-medium hover:text-green-800 transition">modifiez votre adresse email</a>
        </div>
      </div>
      
      <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-200">
        <a href="/logout" class="text-sm text-gray-500 hover:text-gray-700 transition">Se déconnecter</a>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Compte à rebours
      let seconds = 60;
      const countdownElement = document.querySelector('.countdown');
      
      const countdown = setInterval(() => {
        seconds--;
        countdownElement.textContent = `(${seconds}s)`;
        
        if (seconds <= 0) {
          clearInterval(countdown);
          countdownElement.textContent = '';
          document.querySelector('.pulse-btn').classList.remove('pulse-btn');
        }
      }, 1000);
      
      // Animation au survol des boutons
      const buttons = document.querySelectorAll('.btn-hover');
      buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
          button.classList.add('animate__animated', 'animate__pulse');
        });
        button.addEventListener('mouseleave', () => {
          button.classList.remove('animate__animated', 'animate__pulse');
        });
      });
      
      // Secouer l'enveloppe périodiquement
      const envelope = document.querySelector('.envelope-icon');
      setInterval(() => {
        envelope.classList.add('animate__animated', 'animate__headShake');
        setTimeout(() => {
          envelope.classList.remove('animate__animated', 'animate__headShake');
        }, 1000);
      }, 8000);
    });
  </script>
</body>
</html>