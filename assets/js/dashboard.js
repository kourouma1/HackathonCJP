
        document.addEventListener('DOMContentLoaded', () => {
            // Animation des cartes de statistiques
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animate__animated', 'animate__fadeInUp');
                }, index * 200);
            });

            // Animation des éléments d'activité
            const activityItems = document.querySelectorAll('.activity-item');
            activityItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('animate__animated', 'animate__fadeIn');
                }, index * 100);
            });
        });
   