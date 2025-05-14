
        document.addEventListener('DOMContentLoaded', () => {
            // Animation des cartes signalement
            const reportCards = document.querySelectorAll('.report-card');
            reportCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animate__animated', 'animate__fadeInUp');
                }, index * 200);
            });
        });
    