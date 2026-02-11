/**
 * MVsoft Hero Animation Script
 * Full Antigravity Entrance System & Particle Ring
 */

// Ring Particles, using a CSS Houdinig PaintWorklet
if ('paintWorklet' in CSS) {
    CSS.paintWorklet.addModule(
        'https://unpkg.com/css-houdini-ringparticles/dist/ringparticles.js'
    ).catch(e => console.log('Houdini failed:', e));
}

function initHeroAnimation() {
    const $welcome = document.querySelector('#welcome');
    if (!$welcome) return;

    // Check if GSAP is available
    if (typeof gsap === 'undefined') {
        setTimeout(initHeroAnimation, 100);
        return;
    }

    // Register custom property for GSAP to animate (Fallback for browsers without @property support)
    // GSAP can animate objects, so we'll use a dummy object to update CSS variables
    const animationTarget = {
        tick: 0,
        radius: 120
    };

    // 1. Initialize Interaction
    let isInteractive = false;
    let lastPointerUpdate = 0;
    $welcome.addEventListener('pointermove', (e) => {
        const now = performance.now();
        if (now - lastPointerUpdate < 16) return; // Throttle to ~60fps
        lastPointerUpdate = now;

        if (!isInteractive) {
            $welcome.classList.add('interactive');
            isInteractive = true;
        }
        const x = (e.clientX / window.innerWidth) * 100;
        const y = (e.clientY / window.innerHeight) * 100;

        // Use GSAP for smooth tracking even for variables
        gsap.to($welcome, {
            '--ring-x': x,
            '--ring-y': y,
            '--ring-interactive': 1,
            duration: 1.5,
            ease: "power2.out",
            overwrite: "auto"
        });
    });

    $welcome.addEventListener('pointerleave', (e) => {
        $welcome.classList.remove('interactive');
        isInteractive = false;
        gsap.to($welcome, {
            '--ring-x': 50,
            '--ring-y': 50,
            '--ring-interactive': 0,
            duration: 2,
            ease: "power2.out",
            overwrite: "auto"
        });
    });

    // 2. Continuous Background Animation (Houdini Vars)
    // Optimization: Create tweens but control them via ScrollTrigger
    const particleTweens = [];

    // Tick Animation
    particleTweens.push(gsap.to(animationTarget, {
        tick: 1,
        duration: 8,
        repeat: -1,
        ease: "none",
        onUpdate: () => {
            $welcome.style.setProperty('--animation-tick', animationTarget.tick);
        },
        paused: true
    }));

    // Radius Animation
    particleTweens.push(gsap.to(animationTarget, {
        radius: 200,
        duration: 6,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut",
        onUpdate: () => {
            $welcome.style.setProperty('--ring-radius', animationTarget.radius);
        },
        paused: true
    }));

    // 3. GSAP Entrance Timeline (Optimized with ScrollTrigger)
    // 3. GSAP Entrance Timeline (Optimized)
    const tl = gsap.timeline({
        defaults: { ease: "expo.out", duration: 1.5 },
        scrollTrigger: {
            trigger: "#welcome",
            start: "top 95%", // More permissive for mobile/fast load
            toggleActions: "play none none none"
        }
    });

    // Ensure elements are invisible initially
    const entranceTargets = [".hero-logo-text", ".hero-tagline", ".cta-group"];
    if (document.querySelector(".icon-actor")) entranceTargets.push(".icon-actor");

    gsap.set(entranceTargets, { opacity: 0, y: 35 });

    tl.to(".hero-logo-text", { opacity: 1, y: 0, duration: 1.2 }, 0.2) // Shorter duration
        .to(".hero-tagline", { opacity: 1, y: 0, duration: 1.2 }, 0.4)
        .to(".cta-group", { opacity: 1, y: 0, duration: 1.2 }, 0.6);

    if (document.querySelector(".icon-actor")) {
        tl.to(".icon-actor", {
            opacity: 0.9,
            y: 0,
            stagger: 0.12,
            duration: 2.2,
            ease: "back.out(1.5)"
        }, 0.5);
    }

    // 4. Floating Motion for Actors & Optimization
    // Only animate when in viewport to save CPU
    ScrollTrigger.create({
        trigger: "#welcome",
        start: "top bottom",
        end: "bottom top",
        onEnter: () => {
            particleTweens.forEach(t => t.play());
            if (document.querySelector(".icon-actor")) gsap.to(".icon-actor", { timeScale: 1, duration: 1 });
        },
        onLeave: () => {
            particleTweens.forEach(t => t.pause());
            if (document.querySelector(".icon-actor")) gsap.to(".icon-actor", { timeScale: 0, duration: 1 });
        },
        onEnterBack: () => {
            particleTweens.forEach(t => t.play());
            if (document.querySelector(".icon-actor")) gsap.to(".icon-actor", { timeScale: 1, duration: 1 });
        },
        onLeaveBack: () => {
            particleTweens.forEach(t => t.pause());
            if (document.querySelector(".icon-actor")) gsap.to(".icon-actor", { timeScale: 0, duration: 1 });
        }
    });

    document.querySelectorAll('.icon-actor').forEach((icon, index) => {
        // Optimization: Add will-change hint
        icon.style.willChange = "transform";

        gsap.to(icon, {
            y: "random(-25, 25)",
            x: "random(-20, 20)",
            rotation: "random(-8, 8)",
            duration: "random(3, 5)",
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
            delay: index * 0.2
        });
    });

    // 5. Parallax Effect (Optimized with RequestAnimationFrame implicit in GSAP)
    let lastParallaxUpdate = 0;
    window.addEventListener('mousemove', (e) => {
        const now = performance.now();
        if (now - lastParallaxUpdate < 20) return; // Throttle parallax
        lastParallaxUpdate = now;

        if (!ScrollTrigger.isInViewport($welcome)) return; // Don't calc if not visible

        const { clientX, clientY } = e;
        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;

        const actors = document.querySelectorAll('.icon-actor');
        if (actors.length > 0) {
            actors.forEach(icon => {
                const depth = parseFloat(icon.getAttribute('data-depth')) || 0.15;
                const moveX = (clientX - centerX) * depth;
                const moveY = (clientY - centerY) * depth;

                gsap.to(icon, {
                    x: moveX,
                    y: moveY,
                    duration: 1.0, // Snappier follow
                    ease: "power2.out",
                    overwrite: "auto"
                });
            });
        }
    });

    // 6. Typewriter Effect
    const textElement = document.querySelector('.typewriter');
    if (textElement) {
        const fullText = textElement.textContent;
        textElement.textContent = '';
        let i = 0;

        function type() {
            if (i < fullText.length) {
                textElement.textContent += fullText.charAt(i);
                i++;
                setTimeout(type, 35);
            }
        }
        tl.call(type, null, 1.4);
    }
}

// Global execution
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHeroAnimation);
} else {
    initHeroAnimation();
}
