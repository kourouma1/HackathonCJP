
        document.addEventListener('DOMContentLoaded', () => {
            // Graphique des signalements par mois
            const monthlyReportsCtx = document.getElementById('monthlyReportsChart').getContext('2d');
            new Chart(monthlyReportsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],
                    datasets: [{
                        label: 'Signalements',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        backgroundColor: 'rgba(99, 102, 241, 0.2)',
                        borderColor: 'rgba(99, 102, 241, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 2,
                    layout: {
                        padding: {
                            top: 20,
                            right: 20,
                            bottom: 20,
                            left: 20
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Graphique des utilisateurs actifs
            const activeUsersCtx = document.getElementById('activeUsersChart').getContext('2d');
            new Chart(activeUsersCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],
                    datasets: [{
                        label: 'Utilisateurs actifs',
                        data: [12, 19, 3, 5, 2, 3, 10],
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Graphique des signalements par catégorie
            const categoryReportsCtx = document.getElementById('categoryReportsChart').getContext('2d');
            new Chart(categoryReportsCtx, {
                type: 'pie',
                data: {
                    labels: ['Routes', 'Eau', 'Électricité', 'Déchets'],
                    datasets: [{
                        label: 'Signalements',
                        data: [300, 50, 100, 80],
                        backgroundColor: [
                            'rgba(34, 197, 94, 0.2)',
                            'rgba(59, 130, 246, 0.2)',
                            'rgba(245, 158, 11, 0.2)',
                            'rgba(239, 68, 68, 0.2)'
                        ],
                        borderColor: [
                            'rgba(34, 197, 94, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(245, 158, 11, 1)',
                            'rgba(239, 68, 68, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Graphique des signalements résolus
            const resolvedReportsCtx = document.getElementById('resolvedReportsChart').getContext('2d');
            new Chart(resolvedReportsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Résolus', 'En cours'],
                    datasets: [{
                        label: 'Signalements',
                        data: [75, 25],
                        backgroundColor: [
                            'rgba(239, 68, 68, 0.2)',
                            'rgba(99, 102, 241, 0.2)'
                        ],
                        borderColor: [
                            'rgba(239, 68, 68, 1)',
                            'rgba(99, 102, 241, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
 