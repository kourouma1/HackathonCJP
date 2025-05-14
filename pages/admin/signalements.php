<?php
session_start();

// Vérification de l'authentification et du rôle admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

require_once '../../models/Report.php';
require_once '../../config/database.php';

$pdo = Database::getInstance()->getConnection();
$query = "SELECT * FROM Reports ORDER BY created_at DESC";
$stmt = $pdo->query($query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Signalements - SignalGuinée</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/signalement.css">
</head>
<body class="animate__animated animate__fadeIn">
    <div class="dashboard-grid">
        <?php include 'navbar.php' ?>

        <!-- Main Content -->
        <div class="main-content animate__animated animate__fadeInRight">
            <!-- Header -->
            <div class="bg-white border-b p-6 shadow-sm">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Gestion des Signalements</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Bienvenue, <?php echo $_SESSION['user']['full_name']; ?></span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="bg-white rounded-lg shadow overflow-hidden animate__animated animate__fadeInUp">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Urgence</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            while ($reportData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $report = new Report($reportData);
                                $statusColor = $report->getStatus() === 'resolved' ? 'green' : ($report->getStatus() === 'pending' ? 'yellow' : 'blue');
                            ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4"><?= htmlspecialchars($report->getTitle()) ?></td>
                                <td class="px-6 py-4"><?= htmlspecialchars($report->getType()) ?></td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-sm bg-<?= $statusColor ?>-100 text-<?= $statusColor ?>-800 rounded-full">
                                        <?= ucfirst($report->getStatus()) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4"><?= $report->getUrgencyLevel() ?></td>
                                <td class="px-6 py-4 space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">Voir</button>
                                    <button class="text-green-600 hover:text-green-800">Modifier</button>
                                    <button class="text-red-600 hover:text-red-800">Supprimer</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/signalement.js"></script>
</body>
</html>