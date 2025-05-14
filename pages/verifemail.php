<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vérification Email</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md text-center animate-pop">
    <h1 class="text-3xl font-bold mb-4 text-blue-600">Vérifiez votre email</h1>
    <p class="text-gray-600 mb-6">Un lien de vérification a été envoyé à votre adresse. Cliquez sur le lien pour activer votre compte.</p>
    <button class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition">Renvoyer l’email</button>
  </div>
  <style>
    @keyframes pop {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
    .animate-pop {
      animation: pop 0.5s ease-out;
    }
  </style>
</body>
</html>
