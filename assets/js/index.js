
    // Animation de comptage pour les statistiques
    function animateCounters() {
      const counters = document.querySelectorAll('.count-up');
      const speed = 200;
      
      counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / speed;
        
        if(count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(animateCounters, 1);
        } else {
          counter.innerText = target;
        }
      });
    }
    
    // Détection du scroll pour les animations
    function checkScroll() {
      const elements = document.querySelectorAll('.animate__animated');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.2;
        
        if(elementPosition < screenPosition) {
          element.classList.add(element.getAttribute('class').split(' ')[1]);
        }
      });
    }
    
    // Lancement des animations au chargement
    window.addEventListener('load', () => {
      animateCounters();
      checkScroll();
    });
    
    // Lancement des animations au scroll
    window.addEventListener('scroll', checkScroll);
    
    // Effet de hover sur les boutons
    const buttons = document.querySelectorAll('.btn-hover');
    buttons.forEach(button => {
      button.addEventListener('mouseenter', () => {
        button.classList.add('animate__pulse');
      });
      button.addEventListener('mouseleave', () => {
        button.classList.remove('animate__pulse');
      });
    });
 