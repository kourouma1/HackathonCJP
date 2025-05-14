<?php
session_start();

// Vérification de l'authentification et du rôle admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

require_once '../../models/User.php';
require_once '../../config/database.php';

$pdo = Database::getInstance()->getConnection();
$query = "SELECT * FROM Users ORDER BY created_at DESC";
$stmt = $pdo->query($query);
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
        <?php include 'navbar.php'  ?>

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
                    <button onclick="openUserModal()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        Ajouter un utilisateur
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden animate__animated animate__fadeInUp">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $user = new User($userData);
                                $status = $user->getIsVerified() ? 'Actif' : 'Inactif';
                                $statusColor = $user->getIsVerified() ? 'green' : 'red';
                            ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4"><?= htmlspecialchars($user->getFullName()) ?></td>
                                <td class="px-6 py-4"><?= htmlspecialchars($user->getEmail()) ?></td>
                                <td class="px-6 py-4"><?= htmlspecialchars($user->getRole()) ?></td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-sm bg-<?= $statusColor ?>-100 text-<?= $statusColor ?>-800 rounded-full">
                                        <?= $status ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <button onclick="openUserModal(<?= json_encode($userData) ?>)"
                                            class="text-blue-600 hover:text-blue-800">Modifier</button>
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

    <!-- Modal -->
    <div id="userModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg w-full max-w-md">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4" id="modalTitle">Ajouter un utilisateur</h3>
                <form id="userForm">
                    <div class="space-y-4">
                        <input type="hidden" id="userId" name="userId">
                        <div>
                            <label for="fullName" class="block text-sm font-medium text-gray-700">Nom complet</label>
                            <input type="text" id="fullName" name="fullName" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            <input type="password" id="password" name="password"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                            <input type="password" id="confirmPassword" name="confirmPassword"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700">Rôle</label>
                            <select id="role" name="role" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="citizen">Citoyen</option>
                                <option value="admin">Administrateur</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-4">
                        <button type="button" onclick="closeUserModal()"
                                class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                            Annuler
                        </button>
                        <button type="submit"
                                class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Gestion du modal
        const userModal = document.getElementById('userModal');
        
        function openUserModal(user = null) {
            if (user) {
                document.getElementById('modalTitle').textContent = 'Modifier l\'utilisateur';
                document.getElementById('userId').value = user.user_id;
                document.getElementById('fullName').value = user.full_name;
                document.getElementById('email').value = user.email;
                document.getElementById('role').value = user.role;
            } else {
                document.getElementById('modalTitle').textContent = 'Ajouter un utilisateur';
                document.getElementById('userForm').reset();
            }
            userModal.classList.remove('hidden');
        }

        function closeUserModal() {
            userModal.classList.add('hidden');
        }

        // Gestion du formulaire
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const userData = Object.fromEntries(formData.entries());
            
            // Ici, vous pouvez ajouter la logique pour envoyer les données au serveur
            console.log('Données utilisateur:', userData);
            
            closeUserModal();
        });

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