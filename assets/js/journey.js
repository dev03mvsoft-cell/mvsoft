/**
 * Project Journey Roadmap Animation
 * Handles the car movement and step activation as the user scrolls
 */
document.addEventListener('DOMContentLoaded', () => {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

    gsap.registerPlugin(ScrollTrigger);

    const roadmapContainer = document.querySelector('.roadmap-container');
    const roadmapLine = document.querySelector('.roadmap-line');
    const roadmapProgress = document.querySelector('.roadmap-progress');
    const carMarker = document.querySelector('.car-marker');
    const steps = document.querySelectorAll('.journey-step');

    if (!roadmapContainer || !carMarker) return;

    // Timeline for the entire journey section
    const journeyTl = gsap.timeline({
        scrollTrigger: {
            trigger: '.journey-section',
            start: "top 20%",
            end: "bottom 80%",
            scrub: 1,
            // markers: true, // For debugging
        }
    });

    // 1. Move the car and progress line
    journeyTl.to(roadmapProgress, {
        height: "100%",
        ease: "none"
    }, 0);

    journeyTl.to(carMarker, {
        top: "100%",
        ease: "none"
    }, 0);

    // 2. Individual step triggers
    steps.forEach((step, index) => {
        ScrollTrigger.create({
            trigger: step,
            start: "top 60%",
            end: "bottom 40%",
            onEnter: () => step.classList.add('active'),
            onLeave: () => step.classList.remove('active'),
            onEnterBack: () => step.classList.add('active'),
            onLeaveBack: () => step.classList.remove('active'),
        });
    });

    // 3. Subtle car wobble/rotation to look like driving
    gsap.to(carMarker, {
        rotation: 2,
        duration: 0.1,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });
});
