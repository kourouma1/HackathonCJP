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
    <title>Tableau de bord Admin - SignalGuinée</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body class="animate__animated animate__fadeIn">
    <div class="dashboard-grid">
        <!-- Sidebar -->
        <?php include 'navbar.php'  ?>

        <!-- Main Content -->
        <div class="main-content animate__animated animate__fadeInRight">
            <!-- Header -->
            <div class="bg-white border-b p-6 shadow-sm">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Tableau de bord</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Bienvenue, <?php echo $_SESSION['user']['full_name']; ?></span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="stat-card p-6 hover:bg-green-50">
                        <h3 class="text-gray-500 text-sm font-medium">Signalements totaux</h3>
                        <p class="text-2xl font-bold text-green-600">1,234</p>
                    </div>
                    <div class="stat-card p-6 hover:bg-blue-50">
                        <h3 class="text-gray-500 text-sm font-medium">Signalements résolus</h3>
                        <p class="text-2xl font-bold text-blue-600">987</p>
                    </div>
                    <div class="stat-card p-6 hover:bg-purple-50">
                        <h3 class="text-gray-500 text-sm font-medium">Utilisateurs actifs</h3>
                        <p class="text-2xl font-bold text-purple-600">456</p>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white p-6 rounded-lg shadow animate__animated animate__fadeInUp">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Activité récente</h2>
                    <div class="space-y-4">
                        <div class="activity-item flex items-center justify-between p-4 rounded-lg">
                            <div>
                                <p class="text-gray-800">Nouveau signalement</p>
                                <p class="text-sm text-gray-500">Route endommagée à Conakry</p>
                            </div>
                            <span class="text-sm text-gray-500">2 min ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/"></script>
</body>
</html>
