<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau Citoyen | SignalGuinée</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .fade-in { animation: fadeIn 1s ease-in-out both; }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-green-600">SignalGuinée</h1>
    <div class="flex items-center space-x-4">
      <span class="text-sm font-medium">Bienvenue, <?php echo $_SESSION['user']['full_name'] ?></span>
      <a href="../actions/user/deconnexion.php" class="text-sm text-red-500 hover:underline">Déconnexion</a>
    </div>
  </header>

  <!-- Main -->
  <main class="max-w-6xl mx-auto px-4 py-10">

    <!-- Signalement rapide -->
    <section class="bg-white p-6 rounded-lg shadow-md fade-in mb-10">
      <h2 class="text-xl font-semibold mb-4 text-green-600">Faire un nouveau signalement</h2>
      <form class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="block mb-1 font-medium">Type de problème</label>
          <select class="w-full border rounded px-3 py-2">
            <option>Route endommagée</option>
            <option>Coupure électrique</option>
            <option>Décharge sauvage</option>
            <option>Autre</option>
          </select>
        </div>
        <div>
          <label class="block mb-1 font-medium">Adresse ou lieu</label>
          <input type="text" placeholder="Quartier, ville..." class="w-full border rounded px-3 py-2">
        </div>
        <div class="md:col-span-2">
          <label class="block mb-1 font-medium">Description</label>
          <textarea rows="3" class="w-full border rounded px-3 py-2" placeholder="Décrivez le problème ici..."></textarea>
        </div>
        <div>
          <label class="block mb-1 font-medium">Télécharger une photo</label>
          <input type="file" accept="image/*" class="w-full">
        </div>
        <div class="flex items-end">
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow transition">Envoyer</button>
        </div>
      </form>
    </section>

    <!-- Carte interactive -->
    <section class="bg-white p-6 rounded-lg shadow-md fade-in mb-10">
      <h2 class="text-xl font-semibold mb-4 text-green-600">Carte des signalements</h2>
      <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
        <p class="text-gray-600">[ Carte interactive ici – Leaflet ou Mapbox à intégrer ]</p>
      </div>
    </section>

    <!-- Signalements récents -->
    <section class="bg-white p-6 rounded-lg shadow-md fade-in">
      <h2 class="text-xl font-semibold mb-4 text-green-600">Mes signalements récents</h2>
      <ul class="space-y-4">
        <li class="border rounded p-4 flex justify-between items-start hover:bg-gray-50 transition">
          <div>
            <p class="font-semibold">Route dégradée à Kipé</p>
            <p class="text-sm text-gray-600">Signalé le 10 Mai 2025 à 14h22</p>
          </div>
          <span class="text-sm px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full">En attente</span>
        </li>
        <li class="border rounded p-4 flex justify-between items-start hover:bg-gray-50 transition">
          <div>
            <p class="font-semibold">Coupure d'électricité à Matoto</p>
            <p class="text-sm text-gray-600">Signalé le 7 Mai 2025 à 08h10</p>
          </div>
          <span class="text-sm px-3 py-1 bg-green-100 text-green-700 rounded-full">Résolu</span>
        </li>
      </ul>
    </section>

  </main>

  <!-- Footer -->
  <footer class="text-center py-6 text-sm text-gray-500">
    &copy; 2025 SignalGuinée - Tous droits réservés
  </footer>

</body>
</html>
