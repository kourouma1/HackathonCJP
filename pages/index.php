<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signalement Urbain Guinée</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-green-600 animate__animated animate__fadeInLeft">SignalGuinée</h1>
      <nav class="space-x-6 text-sm font-medium hidden md:flex">
        <a href="#features" class="nav-link hover:text-green-600 animate__animated animate__fadeInDown" style="animation-delay: 0.1s">Fonctionnalités</a>
        <a href="#map" class="nav-link hover:text-green-600 animate__animated animate__fadeInDown" style="animation-delay: 0.2s">Carte</a>
        <a href="#contact" class="nav-link hover:text-green-600 animate__animated animate__fadeInDown" style="animation-delay: 0.3s">Contact</a>
        <a href="login.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInDown" style="animation-delay: 0.4s">Connexion</a>
      </nav>
      <button class="md:hidden text-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </header>

  <!-- Hero -->
  <section class="relative text-center py-20 bg-gradient-to-r from-green-500 to-teal-500 text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/asfalt-light.png')] opacity-10"></div>
    <div class="max-w-4xl mx-auto px-4 relative z-10 hero-content">
      <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Signalez. Naviguez. Transformez la ville.</h2>
      <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto">Une plateforme citoyenne pour améliorer les infrastructures urbaines en Guinée.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="inscription.php" class="btn-hover inline-block bg-white text-green-600 font-semibold px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
          Créer un compte
        </a>
        <a href="#features" class="btn-hover inline-block border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-green-600 transition-all duration-300 transform hover:scale-105">
          Découvrir
        </a>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-20 bg-white"></div>
  </section>

  <!-- Fonctionnalités -->
  <section id="features" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
      <h3 class="text-3xl md:text-4xl font-bold text-center mb-12 animate__animated animate__fadeIn">Fonctionnalités principales</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="feature-card bg-gray-50 text-center p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 animate__animated animate__fadeInUp" style="animation-delay: 0.2s">
          <div class="bg-green-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 animate-float">
            <img src="https://img.icons8.com/fluency/48/road.png" class="w-10 h-10" />
          </div>
          <h4 class="text-xl font-semibold mb-3">Signalement en temps réel</h4>
          <p class="text-gray-600">Routes abîmées, déchets, pannes... signalez tout depuis votre téléphone ou navigateur.</p>
        </div>
        <div class="feature-card bg-gray-50 text-center p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 animate__animated animate__fadeInUp" style="animation-delay: 0.4s">
          <div class="bg-green-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 animate-float" style="animation-delay: 0.2s">
            <img src="https://img.icons8.com/color/48/map.png" class="w-10 h-10" />
          </div>
          <h4 class="text-xl font-semibold mb-3">Cartographie interactive</h4>
          <p class="text-gray-600">Consultez les zones problématiques en temps réel et planifiez vos déplacements facilement.</p>
        </div>
        <div class="feature-card bg-gray-50 text-center p-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 animate__animated animate__fadeInUp" style="animation-delay: 0.6s">
          <div class="bg-green-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 animate-float" style="animation-delay: 0.4s">
            <img src="https://img.icons8.com/fluency/48/dashboard.png" class="w-10 h-10" />
          </div>
          <h4 class="text-xl font-semibold mb-3">Tableau de bord</h4>
          <p class="text-gray-600">Les autorités suivent les signalements, analysent les statistiques et interviennent plus vite.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Carte interactive (placeholder) -->
  <section id="map" class="py-16 bg-gray-100 relative">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="max-w-6xl mx-auto px-4 text-center relative z-10">
      <h3 class="text-3xl md:text-4xl font-bold mb-6 animate__animated animate__fadeIn">Explorez la carte</h3>
      <p class="mb-8 text-lg text-gray-600 max-w-2xl mx-auto animate__animated animate__fadeIn" style="animation-delay: 0.2s">Visualisez les signalements et les conditions urbaines à travers la Guinée.</p>
      <div class="h-96 w-full bg-gradient-to-br from-green-400 to-teal-500 rounded-xl shadow-xl overflow-hidden flex items-center justify-center animate__animated animate__fadeInUp" style="animation-delay: 0.4s">
        <div class="text-white text-center p-6">
          <div class="text-5xl mb-4 animate-pulse">🗺️</div>
          <p class="text-xl font-medium">Carte interactive à intégrer ici</p>
          <p class="text-sm opacity-80 mt-2">Avec des marqueurs dynamiques pour les signalements</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Statistiques -->
  <section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
      <div class="grid md:grid-cols-3 gap-8 text-center">
        <div class="animate__animated animate__fadeIn" style="animation-delay: 0.2s">
          <div class="text-5xl font-bold text-green-600 mb-2 count-up" data-target="2500">0</div>
          <p class="text-gray-600 font-medium">Signalements traités</p>
        </div>
        <div class="animate__animated animate__fadeIn" style="animation-delay: 0.4s">
          <div class="text-5xl font-bold text-green-600 mb-2 count-up" data-target="120">0</div>
          <p class="text-gray-600 font-medium">Communes couvertes</p>
        </div>
        <div class="animate__animated animate__fadeIn" style="animation-delay: 0.6s">
          <div class="text-5xl font-bold text-green-600 mb-2 count-up" data-target="85">0</div>
          <p class="text-gray-600 font-medium">% de résolution</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Témoignages -->
  <section class="py-16 bg-gray-100">
    <div class="max-w-4xl mx-auto px-4">
      <h3 class="text-3xl md:text-4xl font-bold text-center mb-12 animate__animated animate__fadeIn">Ce qu'ils disent de nous</h3>
      <div class="bg-white p-8 rounded-xl shadow-md relative animate__animated animate__fadeInUp">
        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-green-400 to-teal-500 rounded-t-xl"></div>
        <div class="flex items-center mb-6">
          <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mr-4">
            <span class="text-2xl">👤</span>
          </div>
          <div>
            <h4 class="font-bold">Mamadou Diallo</h4>
            <p class="text-gray-600 text-sm">Habitant de Conakry</p>
          </div>
        </div>
        <p class="text-gray-700 italic">"Grâce à SignalGuinée, notre rue a enfin été réparée après des mois d'attente. La plateforme est simple et efficace !"</p>
        <div class="flex justify-center mt-6 space-x-2">
          <button class="w-3 h-3 rounded-full bg-green-300"></button>
          <button class="w-3 h-3 rounded-full bg-gray-300"></button>
          <button class="w-3 h-3 rounded-full bg-gray-300"></button>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="py-16 bg-white wave">
    <div class="max-w-xl mx-auto px-4 text-center">
      <h3 class="text-3xl md:text-4xl font-bold mb-6 animate__animated animate__fadeIn">Contactez-nous</h3>
      <p class="mb-8 text-lg text-gray-600 animate__animated animate__fadeIn" style="animation-delay: 0.2s">Une idée ? Une suggestion ? Une collaboration ? Envoyez-nous un message !</p>
      <a href="mailto:support@signalguinee.gn" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold shadow-md hover:bg-green-700 transition-all duration-300 transform hover:scale-105 animate__animated animate__fadeInUp" style="animation-delay: 0.4s">
        support@signalguinee.gn
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-600 text-white py-8 text-center">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0">
          <h2 class="text-2xl font-bold">SignalGuinée</h2>
          <p class="text-green-200 mt-1">Ensemble pour une ville meilleure</p>
        </div>
        <div class="flex space-x-6">
          <a href="#" class="text-white hover:text-green-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
            </svg>
          </a>
          <a href="#" class="text-white hover:text-green-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
          <a href="#" class="text-white hover:text-green-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
            </svg>
          </a>
        </div>
      </div>
      <div class="border-t border-green-700 mt-6 pt-6">
        <p>&copy; 2025 SignalGuinée — Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
  <script src="../assets/js/index.js"></script>
</body>
</html>