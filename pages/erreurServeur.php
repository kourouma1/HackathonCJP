<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erreur Serveur | SignalGuinée</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
    }
    
    .error-container {
      perspective: 1000px;
    }
    
    .error-card {
      transform-style: preserve-3d;
      animation: fadeInUp 0.8s ease-out;
    }
    
    .server-icon {
      animation: float 3s ease-in-out infinite;
    }
    
    .pulse {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0) rotate(-5deg); }
      50% { transform: translateY(-15px) rotate(5deg); }
    }
    
    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }
    
    .glow {
      text-shadow: 0 0 10px rgba(239, 68, 68, 0.5);
    }
    
    .btn-hover {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .btn-hover:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px -5px rgba(239, 68, 68, 0.4);
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
  <div class="error-container max-w-2xl w-full">
    <div class="error-card bg-white rounded-2xl shadow-2xl overflow-hidden animate__animated animate__fadeInUp">
      <div class="p-10 text-center">
        <div class="mx-auto w-40 h-40 bg-red-50 rounded-full flex items-center justify-center mb-8 server-icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
          </svg>
        </div>
        
        <h1 class="text-5xl md:text-6xl font-bold text-red-600 mb-4 glow animate__animated animate__fadeIn animate__delay-1s">500</h1>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 animate__animated animate__fadeIn animate__delay-1s">Erreur du Serveur</h2>
        
        <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto animate__animated animate__fadeIn animate__delay-2s">
          Oups! Quelque chose s'est mal passé de notre côté. Notre équipe technique a été notifiée et travaille à résoudre le problème.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate__animated animate__fadeInUp animate__delay-3s">
          <a href="/" class="btn-hover bg-red-600 text-white font-semibold px-8 py-3 rounded-lg shadow-lg transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Retour à l'accueil
          </a>
          <a href="mailto:support@signalguinee.gn" class="btn-hover border-2 border-red-600 text-red-600 font-semibold px-8 py-3 rounded-lg hover:bg-red-50 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
              <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>
            Contacter le support
          </a>
        </div>
        
        <div class="mt-10 pt-6 border-t border-gray-200 animate__animated animate__fadeIn animate__delay-4s">
          <p class="text-sm text-gray-500 pulse">
            Essayez de rafraîchir la page dans quelques instants...
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Ajout d'une animation aléatoire à l'icône du serveur
      const serverIcon = document.querySelector('.server-icon');
      
      setInterval(() => {
        serverIcon.classList.add('animate__animated', 'animate__shakeX');
        setTimeout(() => {
          serverIcon.classList.remove('animate__animated', 'animate__shakeX');
        }, 1000);
      }, 8000);
      
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
    });
  </script>
</body>
</html>