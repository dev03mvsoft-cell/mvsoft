
/**
 * Snaky Roadmap Animation (GSAP + ScrollTrigger)
 */
document.addEventListener('DOMContentLoaded', () => {
    // Register GSAP Plugins
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined' || typeof MotionPathPlugin === 'undefined') {
        console.error('GSAP or required plugins are missing!');
        return;
    }

    gsap.registerPlugin(ScrollTrigger, MotionPathPlugin);

    const roadWrapper = document.querySelector('.roadmap-wrapper');
    const roadProgress = document.querySelector('#roadProgress');
    const roadGlow = document.querySelector('.road-glow');
    const car = document.querySelector('#snakyCar');
    const steps = document.querySelectorAll('.journey-step-v2');
    const greenery = document.querySelectorAll('.road-greenery');

    if (!roadWrapper || !roadProgress || !car) return;

    // 1. Prepare SVG Paths
    const pathLength = roadProgress.getTotalLength();

    gsap.set([roadProgress, roadGlow], {
        strokeDasharray: pathLength,
        strokeDashoffset: pathLength
    });

    // Set initial position of the car to the start of the path
    gsap.set(car, {
        motionPath: {
            path: "#mainRoadPath",
            align: "#mainRoadPath",
            alignOrigin: [0.5, 0.5],
            start: 0,
            end: 0
        }
    });

    // 2. Create the Master Timeline
    const mtl = gsap.timeline({
        scrollTrigger: {
            trigger: roadWrapper,
            start: "top 10%", // Give a bit more room at the start
            end: "bottom 90%",
            scrub: 1.2, // Faster scrub for snappier feel
            anticipatePin: 1,
            // invalidateOnRefresh: true, // Good for responsive adjustments
        }
    });

    // A. Animate Road Reveal
    mtl.to([roadProgress, roadGlow], {
        strokeDashoffset: 0,
        ease: "none"
    }, 0);

    // B. Animate Bus along path (Fixed Perspective to prevent overturning)
    mtl.to(car, {
        motionPath: {
            path: "#mainRoadPath",
            align: "#mainRoadPath",
            autoRotate: false, // Disabling auto-rotate to keep the 3D/Isometric perspective stable
            alignOrigin: [0.5, 0.5]
        },
        // We set a fixed rotation in CSS or here to ensure the "top" is always showing
        rotation: 0,
        ease: "none",
        force3D: true
    }, 0);

    // C. Trigger Step Card Animations
    steps.forEach((step, index) => {
        const stepProgress = parseFloat(step.getAttribute('data-progress'));

        mtl.to(step, {
            autoAlpha: 1,
            y: 0,
            duration: 0.5,
            ease: "power2.out",
            onStart: () => step.classList.add('active'),
            onReverseComplete: () => step.classList.remove('active'),
            force3D: true
        }, stepProgress - 0.30);
    });

    // D. Animate Greenery (Trees & Flowers) popping in
    greenery.forEach((item, index) => {
        const itemProgress = (index + 1) / (greenery.length + 1);
        mtl.to(item, {
            opacity: 1,
            scale: 1,
            duration: 0.2,
            ease: "back.out(1.7)",
            onStart: () => item.classList.add('active'),
            onReverseComplete: () => item.classList.remove('active'),
            force3D: true
        }, itemProgress);
    });

    // E. Animate Milestones
    const startMilestone = document.querySelector('.milestone-start');
    const endMilestone = document.querySelector('.milestone-end');

    if (startMilestone) {
        mtl.to(startMilestone, { autoAlpha: 1, scale: 1, duration: 0.1 }, 0);
    }
    if (endMilestone) {
        mtl.to(endMilestone, { autoAlpha: 1, scale: 1, duration: 0.2 }, 0.98);
    }

    // 3. Subtle continuous animations
    // Car vibrate effect
    gsap.to(car.querySelector('.car-3d-wrapper'), {
        y: -3,
        duration: 0.15,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });

    // Road pulse glow
    gsap.to(roadGlow, {
        opacity: 0.8,
        filter: "blur(15px)",
        duration: 2,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });
});
