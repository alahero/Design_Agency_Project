<nav id="navbar"
    class="fixed top-4 left-4 right-4 z-50 transition-all duration-500 rounded-full bg-white/5 backdrop-blur-xl border border-white/10 px-6 py-4 flex justify-between items-center max-w-7xl mx-auto shadow-2xl">
    <a href="./" class="flex items-center">
        <!-- Desktop Logo -->
        <img src="./public/assets/svg/Innov8_Logo_FullColor.svg" alt="Innov8 Logo"
            class="hidden md:block h-8 w-auto brightness-0 invert">
        <!-- Mobile Logo -->
        <img src="./public/assets/svg/Innov8_Logo_Reduced.svg" alt="Innov8 Logo"
            class="block md:hidden h-8 w-auto brightness-0 invert">
    </a>

    <!-- Desktop Menu -->
    <div class="hidden md:flex items-center gap-10">
        <?php foreach (['Work', 'Services', 'Brand', 'Contact'] as $item): ?>
            <a href="#<?= strtolower($item) ?>"
                class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/60 hover:text-brand-cyan transition-colors duration-300">
                <?= $item ?>
            </a>
        <?php endforeach; ?>

        <a href="#contact"
            class="px-8 py-3 bg-white text-brand-navy text-[10px] font-black uppercase tracking-[0.2em] rounded-full hover:bg-brand-cyan hover:text-white transition-all duration-300 transform active:scale-95 shadow-xl">
            Start Project
        </a>
    </div>

    <!-- Mobile Button -->
    <button id="mobile-menu-btn" class="md:hidden text-white hover:text-brand-cyan transition-colors">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
</nav>

<!-- Mobile Overlay -->
<div id="mobile-menu"
    class="fixed inset-0 bg-brand-navy/95 backdrop-blur-2xl z-[60] flex flex-col items-center justify-center gap-8 translate-y-full transition-transform duration-700 pointer-events-none md:hidden">
    <!-- Mobile Menu logo -->
    <div class="absolute top-10 left-10">
        <img src="./public/assets/svg/Innov8_Logo_Reduced.svg" alt="Innov8 Logo" class="h-8 w-auto brightness-0 invert">
    </div>
    <?php foreach (['Work', 'Services', 'Brand', 'Contact'] as $item): ?>
        <a href="#<?= strtolower($item) ?>"
            class="mobile-link text-4xl font-black uppercase tracking-tighter text-white hover:text-brand-cyan transition-colors">
            <?= $item ?>
        </a>
    <?php endforeach; ?>
    <button id="close-menu-btn" class="absolute top-8 right-8 text-white p-2">
        <i data-lucide="x" class="w-10 h-10"></i>
    </button>
</div>