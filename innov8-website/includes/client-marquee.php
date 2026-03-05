<section id="marquee" class="py-16 bg-brand-dark/50 border-y border-white/5 overflow-hidden">
    <div class="marquee-content inline-flex gap-20 animate-scroll py-4 whitespace-nowrap">
        <?php
        $clients = ['ADOBE', 'STRIPE', 'FIGMA', 'SHOPIFY', 'NETFLIX', 'SLACK', 'ZENDESK', 'MITSUBISHI'];
        // Duplicate for infinite loop effect
        $all_clients = array_merge($clients, $clients, $clients);
        foreach ($all_clients as $client):
            ?>
            <span
                class="text-3xl md:text-5xl font-black text-white/5 uppercase tracking-[0.3em] hover:text-brand-cyan/20 transition-colors duration-500 cursor-default px-8">
                <?= $client ?>
            </span>
        <?php endforeach; ?>
    </div>
</section>

<style>
    @keyframes scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-33.33%);
        }
    }

    .animate-scroll {
        animation: scroll 40s linear infinite;
    }

    .marquee-content:hover {
        animation-play-state: paused;
    }
</style>