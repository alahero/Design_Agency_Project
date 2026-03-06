<section id="services" class="py-32 px-8 bg-brand-surface relative overflow-hidden">
    <div class="container mx-auto max-w-7xl relative z-20">

        <!-- Services Header -->
        <div class="max-w-4xl mb-12 md:mb-24" data-animate="slide-up">
            <h2 class="text-[10px] font-black uppercase tracking-[0.5em] text-brand-cyan mb-4">OUR EXPERTISE</h2>
            <h3 class="text-4xl md:text-8xl font-black uppercase tracking-tighter mb-4 md:mb-8 leading-[0.9]">SURGICALLY
                SHARP
                SOLUTIONS</h3>
            <p class="text-lg md:text-xl text-white/50 font-medium leading-relaxed">
                We abandon static grids for a bold, narrative-driven approach where expertise meets cinematic execution.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="relative">
            <div id="services-grid"
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-32 max-h-[460px] md:max-h-none overflow-hidden transition-all duration-700 ease-in-out relative">
                <?php
                $services = [
                    ['icon' => 'brush', 'title' => 'LOGO & BRANDING', 'desc' => 'Visual identities that command attention.'],
                    ['icon' => 'briefcase', 'title' => 'CORPORATE STATIONERY', 'desc' => 'Tangible brand presence with surgical precision.'],
                    ['icon' => 'monitor', 'title' => 'WEBSITE', 'desc' => 'High-end digital experiences with liquid fluidity.'],
                    ['icon' => 'share-2', 'title' => 'SOCIAL MEDIA', 'desc' => 'Strategic narratives for global digital impact.'],
                    ['icon' => 'megaphone', 'title' => 'PROMOTIONAL MATERIALS', 'desc' => 'Communication that drives result-oriented action.'],
                    ['icon' => 'cpu', 'title' => 'DIGITAL TOOLS', 'desc' => 'Technical mastery in custom digital solutions.'],
                    ['icon' => 'book-open', 'title' => 'EDITORIAL DESIGN', 'desc' => 'Cinematic storytelling through premium layout.'],
                ];
                foreach ($services as $i => $s):
                    ?>
                    <div class="group p-5 md:p-8 glass rounded-2xl md:rounded-3xl hover:bg-white/10 transition-all duration-700 border-white/5"
                        data-animate="service-card">
                        <div class="flex items-center md:items-start gap-4 md:gap-6">
                            <div
                                class="p-3 md:p-4 bg-brand-cyan/10 rounded-xl md:rounded-2xl group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-500 shrink-0">
                                <i data-lucide="<?= $s['icon'] ?>" class="w-5 h-5 md:w-6 md:h-6"></i>
                            </div>
                            <div>
                                <h4
                                    class="text-xs md:text-lg font-black uppercase tracking-widest text-white group-hover:text-brand-cyan transition-colors">
                                    <?= $s['title'] ?>
                                </h4>
                                <p
                                    class="hidden md:block text-sm text-white/40 leading-relaxed font-medium transition-colors group-hover:text-white/70 mt-2">
                                    <?= $s['desc'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Mobile Mask -->
                <div id="services-mask"
                    class="absolute inset-0 bg-gradient-to-t from-brand-surface via-transparent to-transparent pointer-events-none md:hidden transition-opacity duration-500">
                </div>
            </div>

            <!-- Show All Button -->
            <button id="show-all-services"
                class="md:hidden absolute bottom-12 left-1/2 -translate-x-1/2 z-30 flex items-center gap-2 text-brand-cyan font-black uppercase tracking-[0.3em] text-[10px] group transition-all duration-300 hover:scale-105 active:scale-95">
                SHOW ALL <i data-lucide="chevron-down"
                    class="w-4 h-4 group-hover:translate-y-1 transition-transform"></i>
            </button>
        </div>

        <!-- Process Header -->
        <div class="max-w-4xl mb-12 md:mb-24" data-animate="slide-up">
            <h2 class="text-[10px] font-black uppercase tracking-[0.5em] text-brand-red mb-4">OUR PROCESS</h2>
            <h3 class="text-4xl md:text-8xl font-black uppercase tracking-tighter mb-4 md:mb-8 leading-[0.9]">HOW WE
                <br /><span class="italic text-brand-red">INNOV8</span>
            </h3>
        </div>

        <!-- Process Steps -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-12 relative">
            <!-- Decorative line -->
            <div
                class="hidden lg:block absolute top-1/2 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-y-1/2 z-0">
            </div>

            <?php
            $steps = [
                ['title' => 'Contact', 'desc' => 'We start by learning about your project through a contact form or a call, allowing us to understand your needs, goals, and expectations.'],
                ['title' => 'Analysis & Proposal', 'desc' => 'We evaluate your objectives and prepare a clear proposal outlining the scope, approach, and next steps for the development of your project.'],
                ['title' => 'Delivery & Follow-Up', 'desc' => 'We develop the project, apply the necessary adjustments, and provide continued support after delivery to ensure everything works as expected.'],
            ];
            foreach ($steps as $i => $step):
                ?>
                <div class="relative z-10 p-6 md:p-10 glass rounded-[2rem] md:rounded-[3rem] border-white/5 group hover:border-brand-red/30 transition-all duration-700"
                    data-animate="card">
                    <div
                        class="text-4xl md:text-6xl font-black text-white/5 mb-4 md:mb-8 group-hover:text-brand-red/20 transition-colors">
                        0<?= $i + 1 ?></div>
                    <h4
                        class="text-xl md:text-2xl font-black uppercase tracking-tighter mb-4 md:mb-6 text-white leading-tight">
                        <?= $step['title'] ?>
                    </h4>
                    <p class="text-sm md:text-lg text-white/50 leading-relaxed font-medium italic">
                        <?= $step['desc'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Background Decoration -->
    <div
        class="absolute top-1/2 left-0 -translate-y-1/2 text-[40vw] font-black text-white/[0.01] whitespace-nowrap pointer-events-none select-none -translate-x-1/2 scale-150">
        EXPERTISE
    </div>
</section>