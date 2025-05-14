<?php
session_start();

// Vérification de l'authentification et du rôle admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - SignalGuinée</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .dashboard-grid {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        }
        .sidebar {
            background: linear-gradient(145deg, #ffffff 0%, #f0fdf4 100%);
            border-right: 1px solid #e2e8f0;
            box-shadow: 4px 0 6px -1px rgba(0, 0, 0, 0.1);
        }
        .chart-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .chart-container:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px -1px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="animate__animated animate__fadeIn">
    <div class="dashboard-grid">
        <!-- Sidebar -->
        <div class="sidebar p-6 animate__animated animate__fadeInLeft">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800">SignalGuinée</h2>
                <p class="text-sm text-gray-600">Administration</p>
            </div>
            
            <nav class="space-y-2">
                <a href="dashbord.php" class="block p-2 text-gray-700 hover:bg-gray-100 rounded-lg">Tableau de bord</a>
                <a href="#" class="block p-2 text-gray-700 hover:bg-gray-100 rounded-lg">Signalements</a>
                <a href="utilisateurs.php" class="block p-2 text-gray-700 hover:bg-gray-100 rounded-lg">Utilisateurs</a>
                <a href="statistiques.php" class="block p-2 text-gray-700 hover:bg-gray-100 rounded-lg">Statistiques</a>
                <a href="../actions/user/deconnexion.php" class="block p-2 text-red-600 hover:bg-red-50 rounded-lg">Déconnexion</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content animate__animated animate__fadeInRight">
            <!-- Header -->
            <div class="bg-white border-b p-6 shadow-sm">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Statistiques</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Bienvenue, <?php echo $_SESSION['user']['full_name']; ?></span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="chart-container p-6 hover:bg-purple-50">
                        <h3 class="text-lg font-semibold text-purple-600 mb-4">Signalements par mois</h3>
                        <canvas id="monthlyReportsChart"></canvas>
                    </div>
                    <div class="chart-container p-6 hover:bg-blue-50">
                        <h3 class="text-lg font-semibold text-blue-600 mb-4">Utilisateurs actifs</h3>
                        <canvas id="activeUsersChart"></canvas>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="chart-container p-6 hover:bg-green-50">
                        <h3 class="text-lg font-semibold text-green-600 mb-4">Signalements par catégorie</h3>
                        <canvas id="categoryReportsChart"></canvas>
                    </div>
                    <div class="chart-container p-6 hover:bg-red-50">
                        <h3 class="text-lg font-semibold text-red-600 mb-4">Signalements résolus</h3>
                        <canvas id="resolvedReportsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>