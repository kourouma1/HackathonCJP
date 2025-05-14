
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
  