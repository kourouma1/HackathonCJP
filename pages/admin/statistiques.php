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
  <link rel="stylesheet" href="../../assets/css/statistique.css">
</head>
<body class="animate__animated animate__fadeIn">
    <div class="dashboard-grid">
    <?php include 'navbar.php'  ?>

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

    <script src="../../assets/js/statistique.js"></script>
</body>
</html>