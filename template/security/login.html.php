<div class="min-h-screen flex items-center justify-center bg-[#101d0b]">
    <div class="bg-[#151f11] p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-lime-400 mb-6 text-center">Connexion</h2>
        <?php if (isset($error) && is_string($error)): ?>
            <div class="mb-4 text-red-400 text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (isset($error['login'])): ?>
            <div class="mb-4 text-red-400 text-center"><?= htmlspecialchars($error['login']) ?></div>
        <?php endif; ?>
        <?php if (isset($error['password'])): ?>
            <div class="mb-4 text-red-400 text-center"><?= htmlspecialchars($error['password']) ?></div>
        <?php endif; ?>
        <form method="post" action="/login">
            <div class="mb-4">
                <label class="block text-gray-200 mb-2">Login</label>
                <input type="text" name="login" class="w-full px-4 py-2 rounded bg-[#232d1a] text-white focus:outline-none" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-200 mb-2">Mot de passe</label>
                <input type="password" name="password" class="w-full px-4 py-2 rounded bg-[#232d1a] text-white focus:outline-none" required>
            </div>
            <button type="submit" class="w-full bg-lime-400 text-[#101d0b] font-semibold py-2 rounded hover:bg-lime-500 transition">Se connecter</button>
        </form>
    </div>
</div>