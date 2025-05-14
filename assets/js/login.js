
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
 