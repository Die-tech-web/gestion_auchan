<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Commande #12345</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[#101d0b] min-h-screen text-white">
    <!-- Navbar -->
    <?php if (!isset($showNavbar) || $showNavbar): ?>
      <!-- Ici le code HTML de la navbar -->
    <?php endif; ?>
    <main class="max-w-5xl mx-auto mt-8 p-8">
        <?php
            echo $contentForLayout
        ?>
    </main>
  </body>
</html>

