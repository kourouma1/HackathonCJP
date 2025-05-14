<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - SignalGuinée</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="../assets/css/inscription.css">
</head>
<body class="min-h-screen flex items-center justify-center p-4">
  <div class="wave hidden md:block">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
  </div>

  <div class="register-container max-w-md w-full">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden register-form">
      <div class="p-8"><br>
        <div class="text-center mb-8">
          <h1 class="text-3xl font-bold text-gray-800 mb-2 animate__animated animate__fadeInDown">Créez votre compte</h1>
          <p class="text-gray-600 animate__animated animate__fadeInDown animate__delay-1s">Rejoignez notre communauté</p>
        </div>
        
        <form method="POST" action="../actions/user/inscriptions.php" class="space-y-6">
            <?php if (!empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <?php foreach($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <div class="animate__animated animate__fadeInLeft animate__delay-2s">
                <label for="full-name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input name="full_name" type="text" id="full-name" class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-200" placeholder="Votre nom complet" required>
            </div>
          
          <div class="animate__animated animate__fadeInLeft animate__delay-3s">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
            <input name="email" id="email" class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-200" placeholder="votre@email.com" required>
          </div>
          
          <div class="animate__animated animate__fadeInLeft animate__delay-4s">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Numéro de téléphone</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <select  id="country-code" class="text-sm text-gray-500 bg-transparent border-none focus:ring-0 h-full">
                  <option value="+224">GN +224</option>
                  <option value="+225">CI +225</option>
                  <option value="+221">SN +221</option>
                  <option value="+223">ML +223</option>
                </select>
              </div>
              <input name="phone_number" type="tel" id="phone" class="form-input w-full px-4 py-3 pl-20 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-200" placeholder="00 00 00 00" required>
            </div>
          </div>
          
          <div class="animate__animated animate__fadeInLeft animate__delay-4s">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
            <div class="relative">
              <input name="password" type="password" id="password" class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-200 pr-10" placeholder="••••••••" required>
              <button type="button" class="password-toggle absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </button>
            </div>
            <div class="mt-2 grid grid-cols-4 gap-1">
              <div class="password-strength bg-gray-200 rounded-full" id="strength-1"></div>
              <div class="password-strength bg-gray-200 rounded-full" id="strength-2"></div>
              <div class="password-strength bg-gray-200 rounded-full" id="strength-3"></div>
              <div class="password-strength bg-gray-200 rounded-full" id="strength-4"></div>
            </div>
          </div>
          
          <div class="animate__animated animate__fadeInLeft animate__delay-5s">
            <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirmez le mot de passe</label>
            <input name="confirm-password" type="password" id="confirm-password" class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition duration-200" placeholder="••••••••" required>
          </div>
          
          <div class="flex items-center animate__animated animate__fadeIn animate__delay-5s">
            <input name="terms" id="terms" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded" required>
            <label for="terms" class="ml-2 block text-sm text-gray-700">
              J'accepte les <a href="#" class="text-green-600 hover:underline">Conditions d'utilisation</a> et la <a href="#" class="text-green-600 hover:underline">Politique de confidentialité</a>
            </label>
          </div>
          
          <button type="submit" class="submit-btn w-full py-3 px-4 text-white font-semibold rounded-lg animate__animated animate__fadeInUp animate__delay-6s">
            S'inscrire
          </button>
        </form>
        
        <div class="relative my-6 animate__animated animate__fadeIn animate__delay-6s">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">Ou inscrivez-vous avec</span>
          </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4 animate__animated animate__fadeInUp animate__delay-7s">
          <a href="#" class="social-btn bg-white border border-gray-300 rounded-lg py-2 px-4 flex items-center justify-center hover:bg-gray-50">
            <img src="https://img.icons8.com/color/48/000000/google-logo.png" class="w-6 h-6 mr-2">
            <span>Google</span>
          </a>
          <a href="#" class="social-btn bg-[#1877F2] text-white rounded-lg py-2 px-4 flex items-center justify-center hover:bg-[#166fe5]">
            <img src="https://img.icons8.com/color/48/000000/facebook.png" class="w-6 h-6 mr-2 filter brightness-0 invert">
            <span>Facebook</span>
          </a>
        </div>
        
        <div class="text-center mt-8 text-sm text-gray-600 animate__animated animate__fadeIn animate__delay-7s">
          Vous avez déjà un compte? 
          <a href="login.php" class="text-green-600 font-medium hover:text-green-800 transition">Se connecter</a>
        </div>
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
    document.addEventListener('DOMContentLoaded', () => {
      // Animation des inputs
      const formInputs = document.querySelectorAll('.form-input');
      formInputs.forEach((input, index) => {
        input.addEventListener('focus', () => {
          input.classList.add('animate__animated', 'animate__pulse');
          setTimeout(() => {
            input.classList.remove('animate__animated', 'animate__pulse');
          }, 1000);
        });
      });

      // Formatage automatique du numéro de téléphone
      const phoneInput = document.getElementById('phone');
      phoneInput.addEventListener('input', function(e) {
        const x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,2})(\d{0,2})(\d{0,2})/);
        e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '') + (x[4] ? ' ' + x[4] : '');
      });
      
      // Animation du bouton submit
      const submitBtn = document.querySelector('.submit-btn');
      submitBtn.addEventListener('mouseenter', () => {
        submitBtn.classList.add('animate__animated', 'animate__pulse');
      });
      submitBtn.addEventListener('mouseleave', () => {
        submitBtn.classList.remove('animate__animated', 'animate__pulse');
      });
      
      // Toggle mot de passe visible/caché
      const passwordToggle = document.querySelector('.password-toggle');
      const passwordInput = document.getElementById('password');
      
      passwordToggle.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        passwordToggle.innerHTML = type === 'password' ? 
          '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>' :
          '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>';
      });
      
      // Indicateur de force du mot de passe
      passwordInput.addEventListener('input', () => {
        const strengthBars = [
          document.getElementById('strength-1'),
          document.getElementById('strength-2'),
          document.getElementById('strength-3'),
          document.getElementById('strength-4')
        ];
        
        const password = passwordInput.value;
        let strength = 0;
        
        // Longueur minimale
        if (password.length > 0) strength = 1;
        if (password.length >= 6) strength = 2;
        if (password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password)) strength = 3;
        if (password.length >= 10 && /[A-Z]/.test(password) && /[0-9]/.test(password) && /[^A-Za-z0-9]/.test(password)) strength = 4;
        
        strengthBars.forEach((bar, index) => {
          bar.classList.remove('bg-red-500', 'bg-yellow-400', 'bg-green-500', 'bg-green-600');
          
          if (index < strength) {
            if (strength <= 2) bar.classList.add('bg-red-500');
            else if (strength === 3) bar.classList.add('bg-yellow-400');
            else bar.classList.add('bg-green-600');
          } else {
            bar.classList.add('bg-gray-200');
          }
        });
      });
    });

    
  </script>
</body>
</html>