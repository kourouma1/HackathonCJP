<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - SignalGuinée</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
    }
    
    .login-container {
      perspective: 1000px;
    }
    
    .login-form {
      transform-style: preserve-3d;
      animation: fadeInRight 0.8s ease-out;
    }
    
    .form-input {
      transition: all 0.3s ease;
      transform-origin: left;
    }
    
    .form-input:focus {
      transform: scaleX(1.02);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .social-btn {
      transition: all 0.3s ease;
      transform: translateZ(0);
    }
    
    .social-btn:hover {
      transform: translateY(-3px) translateZ(10px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    .submit-btn {
      background: linear-gradient(135deg, #059669 0%, #10b981 100%);
      transition: all 0.3s ease;
      transform: translateZ(0);
      box-shadow: 0 4px 6px rgba(5, 150, 105, 0.3);
    }
    
    .submit-btn:hover {
      transform: translateY(-3px) translateZ(10px);
      box-shadow: 0 10px 15px rgba(5, 150, 105, 0.4);
    }
    
    .submit-btn:active {
      transform: translateY(1px);
    }
    
    .floating {
      animation: floating 3s ease-in-out infinite;
    }
    
    @keyframes floating {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    
    .wave {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
    }
    
    .wave svg {
      position: relative;
      display: block;
      width: calc(100% + 1.3px);
      height: 150px;
    }
    
    .wave .shape-fill {
      fill: #ffffff;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
  <div class="wave hidden md:block">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
  </div>

  <div class="login-container max-w-md w-full">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden login-form">
      <div class="p-8"><br>
        <div class="text-center mb-8">
          <h1 class="text-3xl font-bold text-gray-800 mb-2 animate__animated animate__fadeInDown">Content de vous revoir</h1>
          <p class="text-gray-600 animate__animated animate__fadeInDown animate__delay-1s">Connectez-vous pour accéder à votre compte</p>
        </div>
        
        <form class="space-y-6" method="post" action="../actions/user/login.php">
          <div class="animate__animated animate__fadeInLeft animate__delay-2s">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
            <input name="email" type="email" id="email" class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-200" placeholder="votre@email.com" required>
          </div>
          
          <div class="animate__animated animate__fadeInLeft animate__delay-3s">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
            <input name="password" type="password" id="password" class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-200" placeholder="••••••••" required>
            <div class="flex justify-end mt-2">
              <a href="reset.php" class="text-sm text-green-600 hover:text-green-800 transition">Mot de passe oublié?</a>
            </div>
          </div>
          
          <button type="submit" class="submit-btn w-full py-3 px-4 text-white font-semibold rounded-lg animate__animated animate__fadeInUp animate__delay-4s">
            Se connecter
          </button>
        </form>
        
        <div class="relative my-6 animate__animated animate__fadeIn animate__delay-4s">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">Ou continuez avec</span>
          </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4 animate__animated animate__fadeInUp animate__delay-5s">
          <a href="#" class="social-btn bg-white border border-gray-300 rounded-lg py-2 px-4 flex items-center justify-center hover:bg-gray-50">
            <img src="https://img.icons8.com/color/48/000000/google-logo.png" class="w-6 h-6 mr-2">
            <span>Google</span>
          </a>
          <a href="#" class="social-btn bg-[#1877F2] text-white rounded-lg py-2 px-4 flex items-center justify-center hover:bg-[#166fe5]">
            <img src="https://img.icons8.com/color/48/000000/facebook.png" class="w-6 h-6 mr-2 filter brightness-0 invert">
            <span>Facebook</span>
          </a>
        </div>
        
        <div class="text-center mt-8 text-sm text-gray-600 animate__animated animate__fadeIn animate__delay-5s">
          Vous n'avez pas de compte? 
          <a href="inscription.php" class="text-green-600 font-medium hover:text-green-800 transition">S'inscrire</a>
        </div>
      </div>
      
      <div class="bg-gray-50 px-8 py-6 text-center">
        <p class="text-xs text-gray-500">En vous connectant, vous acceptez nos <a href="#" class="text-green-600 hover:underline">Conditions d'utilisation</a> et notre <a href="#" class="text-green-600 hover:underline">Politique de confidentialité</a>.</p>
      </div>
    </div>
    
    <div class="absolute top-8 left-8 hidden md:block">
      <a href="/" class="flex items-center">
        <span class="text-2xl font-bold text-green-600">SignalGuinée</span>
      </a>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
  <script>
    // Ajout d'une animation au chargement
    document.addEventListener('DOMContentLoaded', () => {
      const formInputs = document.querySelectorAll('.form-input');
      
      formInputs.forEach((input, index) => {
        input.addEventListener('focus', () => {
          input.classList.add('animate__animated', 'animate__pulse');
          setTimeout(() => {
            input.classList.remove('animate__animated', 'animate__pulse');
          }, 1000);
        });
      });
      
      // Animation du bouton submit au survol
      const submitBtn = document.querySelector('.submit-btn');
      submitBtn.addEventListener('mouseenter', () => {
        submitBtn.classList.add('animate__animated', 'animate__pulse');
      });
      submitBtn.addEventListener('mouseleave', () => {
        submitBtn.classList.remove('animate__animated', 'animate__pulse');
      });
    });
  </script>
</body>
</html>