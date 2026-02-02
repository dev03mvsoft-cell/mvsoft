/**
 * Smooth Scroll & Reveal Module
 * Initializes Lenis and synchronizes with GSAP ScrollTrigger
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Lenis with optimized settings
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
        wheelMultiplier: 1,
        className: 'lenis-smooth',
    });

    // 2. Sync Lenis with GSAP ScrollTrigger
    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });

    gsap.ticker.lagSmoothing(0);

    // 3. Auto-update height (Fixes "getting stuck" on long pages)
    const resizeObserver = new ResizeObserver(() => {
        lenis.resize();
    });
    resizeObserver.observe(document.body);

    // 4. Handle internal anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            if (href === "#") return;
            const target = document.querySelector(href);
            if (target) {
                lenis.scrollTo(target, {
                    offset: -50,
                    duration: 1.5
                });
            }
        });
    });

    window.lenis = lenis;
});
