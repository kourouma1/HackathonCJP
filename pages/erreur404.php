<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Introuvable | SignalGuinée</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
      overflow-x: hidden;
    }
    
    .lost-astronaut {
      animation: float 6s ease-in-out infinite;
    }
    
    .floating-star {
      position: absolute;
      animation: twinkle 3s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0) rotate(-2deg); }
      50% { transform: translateY(-20px) rotate(2deg); }
    }
    
    @keyframes twinkle {
      0%, 100% { opacity: 0.3; transform: scale(0.9); }
      50% { opacity: 1; transform: scale(1.1); }
    }
    
    @keyframes slideIn {
      from { transform: translateX(100%); }
      to { transform: translateX(0); }
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
    
    .glow-text {
      text-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
    }
    
    .meteor {
      position: absolute;
      width: 300px;
      height: 1px;
      background: linear-gradient(90deg, rgba(255,255,255,0), #10b981);
      animation: meteor 3s linear infinite;
      top: 50%;
      left: -300px;
      transform: rotate(-45deg);
    }
    
    @keyframes meteor {
      0% { transform: rotate(-45deg) translateX(0); opacity: 1; }
      70% { opacity: 1; }
      100% { transform: rotate(-45deg) translateX(1000px); opacity: 0; }
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
  <!-- Étoiles flottantes -->
  <div class="floating-star top-1/4 left-1/6 text-yellow-300 text-2xl" style="animation-delay: 0.5s;">✦</div>
  <div class="floating-star top-1/3 right-1/5 text-blue-300 text-xl" style="animation-delay: 1s;">✧</div>
  <div class="floating-star bottom-1/4 left-1/3 text-white text-3xl" style="animation-delay: 1.5s;">★</div>
  <div class="floating-star bottom-1/3 right-1/4 text-purple-200 text-xl" style="animation-delay: 2s;">✶</div>
  
  <!-- Météore occasionnel -->
  <div class="meteor" style="animation-delay: 5s; top: 20%;"></div>

  <div class="max-w-4xl w-full relative z-10">
    <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden animate__animated animate__fadeIn">
      <div class="p-10 text-center">
        <div class="flex justify-center mb-8">
          <div class="lost-astronaut animate__animated animate__fadeInUp">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
          </div>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold text-gray-800 mb-4 glow-text animate__animated animate__fadeIn">404</h1>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 animate__animated animate__fadeIn animate__delay-1s">Oups ! Page perdue dans l'espace</h2>
        
        <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto animate__animated animate__fadeIn animate__delay-2s">
          La page que vous cherchez a été déplacée, supprimée ou n'existe peut-être jamais.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate__animated animate__fadeInUp animate__delay-3s">
          <a href="/" class="btn-hover bg-green-600 text-white font-semibold px-8 py-3 rounded-lg shadow-lg transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Retour à l'accueil
          </a>
          <a href="#" class="btn-hover border-2 border-green-600 text-green-600 font-semibold px-8 py-3 rounded-lg hover:bg-green-50 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
            Aide
          </a>
        </div>
        
        <div class="mt-10 pt-6 border-t border-gray-200 animate__animated animate__fadeIn animate__delay-4s">
          <p class="text-sm text-gray-500">
            Essayez de <a href="#" class="text-green-600 hover:underline" onclick="window.location.reload()">rafraîchir la page</a> ou de vérifier l'URL
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Créer des étoiles supplémentaires dynamiquement
      const space = document.body;
      for (let i = 0; i < 15; i++) {
        const star = document.createElement('div');
        star.className = 'floating-star text-white text-xs';
        star.style.position = 'absolute';
        star.style.top = `${Math.random() * 100}%`;
        star.style.left = `${Math.random() * 100}%`;
        star.style.animationDelay = `${Math.random() * 3}s`;
        star.innerHTML = Math.random() > 0.5 ? '•' : '⋅';
        space.appendChild(star);
      }
      
      // Animation aléatoire des météores
      function createMeteor() {
        const meteor = document.createElement('div');
        meteor.className = 'meteor';
        meteor.style.top = `${10 + Math.random() * 60}%`;
        meteor.style.animationDelay = `${Math.random() * 2}s`;
        meteor.style.opacity = '0';
        
        setTimeout(() => {
          meteor.style.opacity = '1';
        }, 10);
        
        space.appendChild(meteor);
        
        // Supprimer après l'animation
        setTimeout(() => {
          meteor.remove();
        }, 3000);
      }
      
      // Météores aléatoires
      setInterval(createMeteor, 5000);
      setTimeout(createMeteor, 2000);
      
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