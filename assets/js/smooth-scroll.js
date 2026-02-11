document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Lenis with snappy lerp settings
    const lenis = new Lenis({
        lerp: 0.1, // More direct control than duration
        wheelMultiplier: 1.0,
        touchMultiplier: 1.5,
        smoothWheel: true,
        className: 'lenis-smooth',
    });

    // 2. Sync Lenis with GSAP ScrollTrigger
    lenis.on('scroll', ScrollTrigger.update);

    // Optimized RAF loop
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });

    // Lag smoothing - Important for complex Three.js scenes
    gsap.ticker.lagSmoothing(500, 33);

    // 3. Auto-update height
    const resizeObserver = new ResizeObserver(() => {
        lenis.resize();
        ScrollTrigger.refresh(); // Refresh ST when layout height changes
    });
    resizeObserver.observe(document.body);

    // 4. Handle internal anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            if (href === "#" || href === "") return;
            const target = document.querySelector(href);
            if (target) {
                lenis.scrollTo(target, {
                    offset: -50,
                    immediate: false,
                    duration: 1.2
                });
            }
        });
    });

    window.lenis = lenis;
});
