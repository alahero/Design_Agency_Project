<section id="services" class="py-32 px-8 bg-brand-surface relative overflow-hidden">
    <div class="container mx-auto max-w-7xl relative z-20">

        <!-- Section Header -->
        <div class="max-w-4xl mb-24" data-animate="slide-up">
            <h2 class="text-[10px] font-black uppercase tracking-[0.5em] text-brand-cyan mb-4">OUR EXPERTISE</h2>
            <h3 class="text-5xl md:text-8xl font-black uppercase tracking-tighter mb-8 leading-[0.9]">SURGICALLY SHARP
                SOLUTIONS</h3>
            <p class="text-xl text-white/50 font-medium leading-relaxed">
                We abandon static grids for a bold, narrative-driven approach where oversized typography and technical
                mastery define every pixel.
            </p>
        </div>

        <!-- Pillars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $services = [
                ['icon' => 'layers', 'title' => 'UI/UX Design', 'desc' => 'Crafting intuitive digital experiences that are as beautiful as they are functional.'],
                ['icon' => 'globe', 'title' => 'Web Development', 'desc' => 'High-performance, scalable websites built with the latest technologies.'],
                ['icon' => 'zap', 'title' => 'Branding', 'desc' => 'Building visual identities that resonate and endure, from startups to global giants.'],
                ['icon' => 'smartphone', 'title' => 'Mobile Apps', 'desc' => 'Native and cross-platform mobile solutions that keep your brand in the palm of your hand.'],
            ];
            foreach ($services as $i => $s):
                ?>
                <div class="group p-10 glass rounded-[3rem] hover:bg-white/10 transition-all duration-700 hover:shadow-2xl border-white/5"
                    data-animate="service-card">
                    <div
                        class="mb-10 p-5 bg-brand-cyan/10 rounded-3xl inline-block group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-500">
                        <i data-lucide="<?= $s['icon'] ?>" class="w-8 h-8"></i>
                    </div>
                    <h4
                        class="text-2xl font-black uppercase tracking-tighter mb-4 text-white group-hover:text-brand-cyan transition-colors">
                        <?= $s['title'] ?>
                    </h4>
                    <p class="text-white/40 leading-relaxed font-medium transition-colors group-hover:text-white/70">
                        <?= $s['desc'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Background Decoration -->
    <div
        class="absolute top-1/2 left-0 -translate-y-1/2 text-[40vw] font-black text-white/[0.02] whitespace-nowrap pointer-events-none select-none -translate-x-1/2">
        DOMINANCE
    </div>
</section>