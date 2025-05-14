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
    <title>Gestion des Utilisateurs - SignalGuinée</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
        .user-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .user-card:hover {
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
                    <h1 class="text-2xl font-bold text-gray-800">Gestion des Utilisateurs</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Bienvenue, <?php echo $_SESSION['user']['full_name']; ?></span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="mb-6">
                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        Ajouter un utilisateur
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden animate__animated animate__fadeInUp">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4">John Doe</td>
                                <td class="px-6 py-4">john@example.com</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-sm bg-green-100 text-green-800 rounded-full">Actif</span>
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">Modifier</button>
                                    <button class="text-red-600 hover:text-red-800">Supprimer</button>
                                </td>
                            </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animation des cartes utilisateur
            const userCards = document.querySelectorAll('.user-card');
            userCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animate__animated', 'animate__fadeInUp');
                }, index * 200);
            });
        });
    </script>
</body>
</html>