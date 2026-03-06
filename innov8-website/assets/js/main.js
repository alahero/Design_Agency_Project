document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide Icons
    lucide.createIcons();

    // Intersection Observer for Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Initial GSAP Setup
    gsap.registerPlugin(ScrollTrigger);

    // Check for Reduced Motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // --- Hero Animations ---
    if (!prefersReducedMotion) {
        gsap.to('#hero-badge', { opacity: 1, y: 0, duration: 1, delay: 0.5, ease: 'power4.out' });
        gsap.to('#hero-headline span', {
            y: 0,
            opacity: 1,
            duration: 1.2,
            stagger: 0.2,
            ease: 'power4.out',
            delay: 0.7
        });
        gsap.to('#hero-subtext', { opacity: 1, y: 0, duration: 1, delay: 1.5 });
        gsap.to('#hero-ctas', { opacity: 1, y: 0, duration: 1, delay: 1.8, ease: 'power4.out' });
    } else {
        // Fallback for reduced motion
        gsap.set(['#hero-badge', '#hero-headline span', '#hero-subtext', '#hero-ctas'], { opacity: 1, y: 0 });
    }

    // --- General Scroll Animations ---
    if (!prefersReducedMotion) {
        // Slide up animation
        gsap.utils.toArray('[data-animate="slide-up"]').forEach((el) => {
            gsap.set(el, { opacity: 0, y: 30 }); // Preparation
            gsap.to(el, {
                scrollTrigger: {
                    trigger: el,
                    start: 'top 90%',
                    toggleActions: 'play none none none'
                },
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power3.out'
            });
        });

        // Bento & Process Cards
        gsap.utils.toArray('[data-animate="card"]').forEach((card, i) => {
            gsap.set(card, { opacity: 0, y: 50 }); // Preparation
            gsap.to(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                },
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power3.out'
            });
        });

        // Services Section Grid
        gsap.set('[data-animate="service-card"]', { opacity: 0, y: 30 }); // Preparation
        gsap.to('[data-animate="service-card"]', {
            scrollTrigger: {
                trigger: '#services',
                start: 'top 60%',
                toggleActions: 'play none none none'
            },
            opacity: 1,
            y: 0,
            stagger: 0.1,
            duration: 0.8,
            ease: 'power2.out'
        });

        // Narrative Section
        gsap.set(['#narrative-headline', '#narrative-subtext', '#narrative-cta'], { opacity: 0, y: 30 });
        gsap.set('#narrative-line', { opacity: 0, width: 0 });

        const narrativeTimeline = gsap.timeline({
            scrollTrigger: {
                trigger: '#narrative-headline',
                start: 'top 80%'
            }
        });

        narrativeTimeline
            .to('#narrative-headline', { opacity: 1, scale: 1, y: 0, duration: 1, ease: 'power4.out' })
            .to('#narrative-line', { opacity: 1, width: 200, duration: 0.8 }, '-=0.5')
            .to('#narrative-subtext', { opacity: 1, y: 0, duration: 1 }, '-=0.5')
            .to('#narrative-cta', { opacity: 1, y: 0, duration: 1 }, '-=0.8');

        // Force a refresh to ensure all positions are calculated correctly
        ScrollTrigger.refresh();
    } else {
        // Fallback for reduced motion
        gsap.set(['#hero-badge', '#hero-headline span', '#hero-subtext', '#hero-ctas', '[data-animate]', '#narrative-headline', '#narrative-subtext', '#narrative-cta'], {
            opacity: 1,
            y: 0,
            scale: 1,
            width: 'auto'
        });
    }

    // --- Navbar Scroll Effect ---
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('nav-blur', 'py-2');
            navbar.classList.remove('py-4');
        } else {
            navbar.classList.remove('nav-blur', 'py-2');
            navbar.classList.add('py-4');
        }
    });

    // --- Mobile Menu Toggle ---
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('close-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const links = document.querySelectorAll('.mobile-link');

    const toggleMenu = (open) => {
        menu.classList.toggle('translate-y-full', !open);
        menu.classList.toggle('pointer-events-none', !open);
        if (open && !prefersReducedMotion) {
            gsap.from('.mobile-link', { y: 20, opacity: 0, stagger: 0.1, duration: 0.5 });
        }
    };

    // --- Show All Services (Mobile) ---
    const showAllBtn = document.getElementById('show-all-services');
    const servicesGrid = document.getElementById('services-grid');
    const servicesMask = document.getElementById('services-mask');

    if (showAllBtn && servicesGrid) {
        showAllBtn.addEventListener('click', () => {
            // Get the actual height of the content
            const fullHeight = servicesGrid.scrollHeight;

            gsap.to(servicesGrid, {
                maxHeight: fullHeight,
                duration: 1,
                ease: 'power4.inOut'
            });

            gsap.to([showAllBtn, servicesMask], {
                opacity: 0,
                duration: 0.5,
                pointerEvents: 'none',
                onComplete: () => {
                    showAllBtn.style.display = 'none';
                    servicesMask.style.display = 'none';
                }
            });
        });
    }

    mobileBtn.addEventListener('click', () => toggleMenu(true));
    closeBtn.addEventListener('click', () => toggleMenu(false));
    links.forEach(link => link.addEventListener('click', () => toggleMenu(false)));
});
