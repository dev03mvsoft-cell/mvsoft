document.addEventListener('DOMContentLoaded', () => {
    // 1. Register ScrollTrigger Plugin
    gsap.registerPlugin(ScrollTrigger);

    console.log('GSAP ScrollTrigger Initialized');

    // 2. Reveal text animation on scroll
    const reveals = document.querySelectorAll('.scroll-reveal');
    reveals.forEach((el) => {
        gsap.from(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 80%", // When top of element hits 80% scroll height
                toggleActions: "play none none reverse", // Play on enter, reverse on leave back
            },
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power2.out"
        });
    });

    // 3. Specific element animation (The primary box)
    gsap.from(".box", {
        scrollTrigger: {
            trigger: ".box",
            start: "top 70%",
            scrub: 1, // Smoothly link animation to scrollbar position
        },
        rotate: 360,
        scale: 0.5,
        borderRadius: "50%",
        duration: 2
    });
});
