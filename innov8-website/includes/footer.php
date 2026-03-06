<footer id="contact" class="bg-brand-dark pt-48 pb-16 px-8 border-t border-white/5 relative overflow-hidden">
    <div class="container mx-auto max-w-7xl relative z-20">

        <!-- Main Footer Core -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-32 mb-40">
            <div data-animate="slide-up">
                <h2
                    class="text-[14vw] lg:text-[10vw] font-black tracking-tighter uppercase leading-[0.75] mb-16 text-white group cursor-default">
                    Let's <br /> <span class="text-brand-cyan hover:italic transition-all duration-700">Talk</span>
                </h2>
                <div class="flex flex-col gap-8">
                    <a href="mailto:hello@innov8.creations"
                        class="text-3xl md:text-6xl font-black text-white hover:text-brand-red transition-colors duration-500 uppercase tracking-tighter">hello@innov8.creations</a>
                    <a href="tel:+14157966262"
                        class="text-xl text-white/40 hover:text-white transition-colors duration-500 uppercase tracking-[0.4em] font-black">+1
                        (415) 796-6262</a>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-20" data-animate="slide-up">
                <div class="flex flex-col gap-10">
                    <p class="text-[10px] uppercase tracking-[0.5em] text-white/30 font-black">NAVIGATION</p>
                    <?php foreach (['Home', 'Work', 'Services', 'Brand', 'Contact'] as $item): ?>
                        <a href="#<?= strtolower($item) ?>"
                            class="text-lg md:text-xl font-black uppercase text-white hover:text-brand-cyan transition-all duration-300 tracking-tighter">
                            <?= $item ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="flex flex-col gap-10">
                    <p class="text-[10px] uppercase tracking-[0.5em] text-white/30 font-black">FOLLOW US</p>
                    <?php foreach (['Instagram', 'Dribbble', 'LinkedIn', 'Twitter'] as $item): ?>
                        <a href="#"
                            class="text-lg md:text-xl font-black uppercase text-white hover:text-brand-red transition-all duration-300 tracking-tighter">
                            <?= $item ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="flex flex-col md:flex-row justify-between items-center pt-16 border-t border-white/5 gap-12">
            <a href="./" class="flex items-center">
                <img src="./public/assets/svg/Innov8_Logo_Reduced.svg" alt="Innov8 Logo"
                    class="h-8 w-auto brightness-0 invert">
            </a>
            <p class="text-[10px] text-white/20 uppercase tracking-[0.4em] font-black">© 2026 Innov8 Creations, LLC. ALL
                RIGHTS RESERVED.</p>
            <div class="flex gap-12">
                <a href="#"
                    class="text-[10px] text-white/20 hover:text-brand-cyan uppercase tracking-[0.4em] font-black">Privacy</a>
                <a href="#"
                    class="text-[10px] text-white/20 hover:text-brand-cyan uppercase tracking-[0.4em] font-black">Terms</a>
            </div>
        </div>
    </div>

    <!-- Decorative Blob -->
    <div class="absolute -bottom-1/4 -left-1/4 w-[60vw] h-[60vw] bg-brand-cyan/10 blur-[150px] rounded-full opacity-30">
    </div>
</footer>