<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Réinitialiser le mot de passe</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-tl from-purple-100 to-purple-50 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-lg p-8 rounded-xl max-w-md w-full animate-fade-in">
    <h2 class="text-2xl font-semibold mb-6 text-center">Réinitialisation</h2>
    <form class="space-y-4">
      <input type="email" placeholder="Votre email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
      <button class="w-full bg-purple-500 text-white p-3 rounded-lg hover:bg-purple-600 transition">Envoyer le lien</button>
    </form>
  </div>
  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fade-in 0.5s ease-out;
    }
  </style>
</body>
</html>
