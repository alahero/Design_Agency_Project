<nav id="navbar"
    class="fixed top-4 left-4 right-4 z-50 transition-all duration-500 rounded-full bg-white/5 backdrop-blur-xl border border-white/10 px-6 py-4 flex justify-between items-center max-w-7xl mx-auto shadow-2xl">
    <div class="flex items-center gap-3">
        <!-- Innov8 Icon -->
        <div class="w-10 h-10 bg-brand-cyan rounded-full flex items-center justify-center p-2">
            <svg viewBox="0 0 160 160" class="w-full h-full fill-white">
                <rect x="20" y="20" width="120" height="120" rx="60" />
                <path d="M50 50h60v60H50z" fill="#0A1F44" />
            </svg>
        </div>
        <span class="text-2xl font-black uppercase tracking-tighter text-white">Innov8</span>
    </div>

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