<div class="max-w-6xl mx-auto mt-6 p-6 bg-[#151f11] rounded-lg shadow-lg">
      <!-- Header -->
    

      <!-- Titre -->
      <h1 class="text-3xl font-bold mb-8">Liste des commandes</h1>

      <!-- Filtres -->
      <div class="flex space-x-4 mb-8">
        <button
          class="bg-[#1a2b13] text-white px-6 py-2 rounded-lg flex items-center space-x-2 hover:bg-lime-700 transition"
        >
          <span>Filtrer par status</span>
          <svg
            class="w-4 h-4"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            viewBox="0 0 24 24"
          >
            <path d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <button
          class="bg-[#1a2b13] text-white px-6 py-2 rounded-lg flex items-center space-x-2 hover:bg-lime-700 transition"
        >
          <span>Filtrer par client</span>
          <svg
            class="w-4 h-4"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            viewBox="0 0 24 24"
          >
            <path d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <button
          class="bg-[#1a2b13] text-white px-6 py-2 rounded-lg flex items-center space-x-2 hover:bg-lime-700 transition"
        >
          <span>Filtrer par Etat</span>
          <svg
            class="w-4 h-4"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            viewBox="0 0 24 24"
          >
            <path d="M19 9l-7 7-7-7" />
          </svg>
        </button>

       <a href="/commande" class="
            bg-lime-400 text-[#101d0b] px-6 py-2 rounded-lg font-semibold hover:bg-lime-500 transition"
       ">Passer commande</a>
      </div>

      <!-- Tableau -->
      <div class="bg-[#1a2b13] rounded-xl overflow-hidden">
        <table class="min-w-full text-left">
          <thead>
            <tr class="text-lime-400">
              <th class="px-6 py-3">Numero Commande</th>
              <th class="px-6 py-3">Client</th>
              <th class="px-6 py-3">Status</th>
              <th class="px-6 py-3">Facture</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t border-[#263a1d]">
              <td class="px-6 py-4">#COM_001</td>
              <td class="px-6 py-4">Client1</td>
              <td class="px-6 py-4">
                <span class="bg-[#263a1d] text-lime-400 px-4 py-1 rounded-full"
                  >impayé</span
                >
              </td>
              <td class="px-6 py-4">
                <button
                  class="bg-lime-400 text-[#101d0b] px-6 py-1 rounded-full font-semibold hover:bg-lime-500 transition"
                >
                  voir
                </button>
              </td>
            </tr>
            <tr class="border-t border-[#263a1d]">
              <td class="px-6 py-4">#COM_002</td>
              <td class="px-6 py-4">ANONYME</td>
              <td class="px-6 py-4">
                <span class="bg-[#263a1d] text-lime-400 px-4 py-1 rounded-full"
                  >impayé</span
                >
              </td>
              <td class="px-6 py-4">
                <button
                  class="bg-lime-400 text-[#101d0b] px-6 py-1 rounded-full font-semibold hover:bg-lime-500 transition"
                >
                  voir
                </button>
              </td>
            </tr>
            <tr class="border-t border-[#263a1d]">
              <td class="px-6 py-4">#COM_003</td>
              <td class="px-6 py-4">Serigne Pathé</td>
              <td class="px-6 py-4">
                <span class="bg-[#263a1d] text-lime-400 px-4 py-1 rounded-full"
                  >imayé</span
                >
              </td>
              <td class="px-6 py-4">
                <button
                  class="bg-lime-400 text-[#101d0b] px-6 py-1 rounded-full font-semibold hover:bg-lime-500 transition"
                >
                  voir
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex justify-center items-center mt-8 space-x-3">
        <button
          class="text-lime-400 hover:bg-[#263a1d] rounded-full w-8 h-8 flex items-center justify-center"
        >
          &lt;
        </button>
        <button
          class="bg-lime-400 text-[#101d0b] rounded-full w-8 h-8 font-bold"
        >
          1
        </button>
        <button class="text-lime-400 hover:bg-[#263a1d] rounded-full w-8 h-8">
          2
        </button>
        <button class="text-lime-400 hover:bg-[#263a1d] rounded-full w-8 h-8">
          3
        </button>
        <button
          class="text-lime-400 hover:bg-[#263a1d] rounded-full w-8 h-8 flex items-center justify-center"
        >
          &gt;
        </button>
        
      </div>
    </div>


// <!-- filepath: /home/madie/Documents/newChallenge/challengePHP2/template/commande/list.html.php -->
// <h1>Liste des commandes</h1>
<?php if (!empty($commandes)): ?>
    <ul>
        <?php foreach ($commandes as $commande): ?>
            <li><?= htmlspecialchars($commande->getId()) ?> - <?= htmlspecialchars($commande->getDate()) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune commande trouvée.</p>
<?php endif; ?>
