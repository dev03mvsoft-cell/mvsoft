/**
 * Smooth Scroll & Reveal Module
 * Initializes Lenis and synchronizes with GSAP ScrollTrigger
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Lenis
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: 'vertical',
        gestureDirection: 'vertical',
        smoothHover: true,
        smoothTouch: false,
        touchMultiplier: 2,
    });

    // Sync Lenis with GSAP ScrollTrigger
    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });

    gsap.ticker.lagSmoothing(0);

    // 2. Global Reveal Logic
    const revealElements = document.querySelectorAll('[class*="reveal-"]');

    revealElements.forEach(el => {
        gsap.to(el, {
            opacity: 1,
            x: 0,
            y: 0,
            scale: 1,
            duration: 1.2,
            ease: "power3.out",
            scrollTrigger: {
                trigger: el,
                start: "top 85%",
                toggleActions: "play none none none",
                markers: false
            }
        });
    });

    // Optional: Add anchor link support for Lenis
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                lenis.scrollTo(target);
            }
        });
    });

    window.lenis = lenis;
});
