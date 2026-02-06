// GSAP Logic for Profile Page
document.addEventListener('DOMContentLoaded', () => {
    // Register ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // --- Three.js 3D Model Integration ---
    let scene, camera, renderer, model;
    function init3D() {
        const container = document.getElementById('magic-3d-canvas');
        if (!container) return;

        scene = new THREE.Scene();
        camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        container.appendChild(renderer.domElement);

        // Create a tech-looking geometry
        const geometry = new THREE.IcosahedronGeometry(2, 1);
        const material = new THREE.MeshBasicMaterial({
            color: 0x00ffff,
            wireframe: true,
            transparent: true,
            opacity: 0.5
        });
        model = new THREE.Mesh(geometry, material);
        scene.add(model);

        camera.position.z = 5;

        function animate() {
            requestAnimationFrame(animate);
            model.rotation.y += 0.005;
            model.rotation.x += 0.003;
            renderer.render(scene, camera);
        }
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    }

    // Initialize 3D if Three.js is available (assuming it might be loaded globally)
    if (window.THREE) {
        init3D();
    } else {
        // Dynamic Load if needed
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/three.js/0.155.0/three.min.js';
        script.onload = init3D;
        document.head.appendChild(script);
    }

    // Initial Animations
    const tl = gsap.timeline();
    tl.from('.profile-nav', {
        y: -50,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out'
    })
        .from('.search-bar', {
            y: -30,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out'
        }, '-=0.4')
        // Cosmos Hero Reveal
        .from('.hero-title', {
            y: 100,
            opacity: 0,
            duration: 1.2,
            ease: 'power4.out',
        })
        .from('.hero-tagline', {
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out'
        }, '-=0.8')
        .from('.main-cta', {
            scale: 0.8,
            opacity: 0,
            duration: 0.5,
            ease: 'back.out(1.7)'
        }, '-=0.5')
        .from('.asset', {
            opacity: 0,
            scale: 0.2,
            duration: 1.5,
            stagger: {
                amount: 0.8,
                from: "random"
            },
            ease: 'expo.out'
        }, '-=1');

    // Floating Animation for Assets
    const assets = document.querySelectorAll('.asset');
    assets.forEach((asset, i) => {
        gsap.to(asset, {
            y: "random(-25, 25)",
            x: "random(-20, 20)",
            rotation: "random(-8, 8)",
            duration: "random(3, 5)",
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
            delay: i * 0.1
        });
    });

    // Slide Section Animations
    document.querySelectorAll('.slide-section').forEach((section, i) => {
        if (i === 0) return; // Skip hero since it has its own timeline

        const content = section.querySelector('.slide-content');
        const visual = section.querySelector('.slide-visual');

        const slideTl = gsap.timeline({
            scrollTrigger: {
                trigger: section,
                start: 'top 70%',
                toggleActions: 'play none none reverse'
            }
        });

        slideTl.from(content.querySelector('.slide-label'), {
            y: 20,
            opacity: 0,
            duration: 0.6
        })
            .from(content.querySelector('.slide-title'), {
                y: 40,
                opacity: 0,
                duration: 0.8
            }, '-=0.4')
            .from(content.querySelector('.slide-text, .slide-list'), {
                y: 30,
                opacity: 0,
                duration: 0.8
            }, '-=0.4')
            .from(visual, {
                scale: 0.8,
                opacity: 0,
                rotation: i % 2 === 0 ? 10 : -10,
                duration: 1.2,
                ease: "expo.out"
            }, '-=1');

        if (content.querySelector('.slide-stats')) {
            slideTl.from(content.querySelectorAll('.stat'), {
                y: 20,
                opacity: 0,
                stagger: 0.2,
                duration: 0.6
            }, '-=0.8');
        }
    });

    // Parallax background for visual cards
    gsap.utils.toArray('.visual-card img').forEach(img => {
        gsap.to(img, {
            y: -50,
            scrollTrigger: {
                trigger: img,
                scrub: true
            }
        });
    });

    // --- Magic Text Pin Animation ---
    const slides = gsap.utils.toArray('.magic-slide');

    const magicTl = gsap.timeline({
        scrollTrigger: {
            trigger: '.magic-pin-section',
            start: 'top top',
            end: '+=400%',
            pin: true,
            scrub: 1.2,
            anticipatePin: 1,
            invalidateOnRefresh: true
        }
    });

    // Ensure all cards start with clear properties
    gsap.set('.arc-card', { force3D: true });

    // Animate each slide
    slides.forEach((slide, i) => {
        const colorAttr = slide.getAttribute('data-color') || '#00ffff';

        // Reveal Slide
        magicTl.to(slide, {
            autoAlpha: 1,
            x: 0,
            scale: 1,
            duration: 1,
            ease: 'power2.inOut',
            onStart: () => {
                // Safety check for Three.js model
                if (typeof THREE !== 'undefined' && model) {
                    try {
                        const targetColor = new THREE.Color(colorAttr);
                        gsap.to(model.material.color, {
                            r: targetColor.r,
                            g: targetColor.g,
                            b: targetColor.b,
                            duration: 1
                        });
                        gsap.to(model.rotation, { z: i * Math.PI / 2, duration: 1.5 });
                        gsap.to(model.scale, { x: 1.2, y: 1.2, z: 1.2, duration: 0.5, yoyo: true, repeat: 1 });
                    } catch (e) {
                        console.warn("Three.js color transition failed", e);
                    }
                }
            }
        });

        // Hide Slide (except last)
        if (i < slides.length - 1) {
            magicTl.to(slide, {
                autoAlpha: 0,
                x: -50,
                scale: 1.1,
                duration: 1,
                ease: 'power2.inOut',
                delay: 0.5
            });
        }
    });

    // --- Horizontal Client Showcase ---
    const track = document.querySelector('.client-track');
    const showcaseSection = document.querySelector('.clients-showcase');

    if (track && showcaseSection) {
        gsap.to(track, {
            x: () => -(track.scrollWidth - window.innerWidth + 200),
            ease: "none",
            scrollTrigger: {
                trigger: showcaseSection,
                start: "top top",
                end: () => `+=${track.scrollWidth}`,
                pin: true,
                scrub: 1,
                invalidateOnRefresh: true,
                anticipatePin: 1, // Helps with layout shifts
            }
        });

        // Simplified entrance
        gsap.from('.client-card', {
            scrollTrigger: {
                trigger: showcaseSection,
                start: 'top 85%',
            },
            y: 40,
            opacity: 0,
            stagger: 0.1,
            duration: 1,
            ease: 'power2.out',
            clearProps: "all"
        });
    }

    // --- Trusted Section Animations ---
    if (document.querySelector('.trusted-section')) {
        const trustedTl = gsap.timeline({
            scrollTrigger: {
                trigger: '.trusted-section',
                start: 'top 80%',
            }
        });

        trustedTl.from('.trusted-title', { y: 30, opacity: 0, duration: 0.8 })
            .from('.trust-card', {
                y: 40,
                opacity: 0,
                stagger: 0.15,
                duration: 1,
                ease: 'power3.out',
                clearProps: "all"
            }, '-=0.4')
            .from('.trust-stats-bar', {
                scale: 0.9,
                opacity: 0,
                duration: 1.2,
                ease: 'expo.out'
            }, '-=0.6');
    }

    // Final CTA reveal
    gsap.from('.final-title', {
        scrollTrigger: {
            trigger: '.final-cta-section',
            start: 'top 80%',
        },
        y: 100,
        opacity: 0,
        duration: 1.5,
        ease: 'power4.out'
    });

    // --- Unified Mouse Tracking & Parallax ---
    const blob = document.createElement('div');
    blob.style.cssText = `
        position: fixed;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(0, 102, 255, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%);
        mix-blend-mode: screen;
        will-change: transform;
    `;
    document.body.appendChild(blob);

    let mouseX = 0, mouseY = 0;
    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    function updateParallax() {
        // Update Mouse Glow
        gsap.to(blob, {
            left: mouseX,
            top: mouseY,
            duration: 0.1,
            ease: "power2.out"
        });

        const xPercent = (mouseX / window.innerWidth - 0.5) * 2;
        const yPercent = (mouseY / window.innerHeight - 0.5) * 2;

        // Hero Assets Parallax
        if (assets.length > 0) {
            assets.forEach((asset, i) => {
                const factorX = (i % 2 === 0 ? 1 : -1) * (15 + (i * 5));
                const factorY = (i % 3 === 0 ? 1 : -0.5) * (15 + (i * 3));
                gsap.to(asset, {
                    x: xPercent * factorX,
                    y: yPercent * factorY,
                    duration: 1.5,
                    force3D: true,
                    ease: "power2.out"
                });
            });
        }

        // Arc Cards Parallax
        if (arcCards.length > 0) {
            arcCards.forEach((card, i) => {
                gsap.to(card, {
                    x: xPercent * (20 + i * 2),
                    y: yPercent * (20 + i * 2),
                    duration: 1.5,
                    force3D: true,
                    ease: "power2.out"
                });
            });
            gsap.to('.exceptional-content', {
                x: xPercent * -25,
                y: yPercent * -20,
                duration: 1.5,
                force3D: true,
                ease: "power2.out"
            });
        }

        requestAnimationFrame(updateParallax);
    }
    requestAnimationFrame(updateParallax);

    // --- Exceptional Section Full Circle Animation (Scrubbed Expansion) ---
    gsap.set('.cards-arc', { xPercent: -50, yPercent: -50, force3D: true });

    // --- Exceptional Section Text Reveal (Instant) ---
    gsap.from('.exceptional-content', {
        scrollTrigger: {
            trigger: '.exceptional-section',
            start: 'top 80%',
        },
        autoAlpha: 0,
        y: 50,
        duration: 1,
        ease: 'power3.out'
    });

    const exceptionalTl = gsap.timeline({
        scrollTrigger: {
            trigger: '.exceptional-section',
            start: 'top bottom',
            end: 'center center',
            scrub: 1.5,
            invalidateOnRefresh: true,
        }
    });

    // Cards fan out from the center bundle into the 360 ring as you scroll
    exceptionalTl.from('.arc-card', {
        scale: 0.1,
        autoAlpha: 0,
        y: 0, // Starts at center (translateY(0))
        stagger: {
            each: 0.05,
            from: "center"
        },
        ease: 'power2.inOut',
        force3D: true,
        clearProps: "all"
    });

    // 3. Keep the Ring Rotating Infinitely (Independent of Scroll)
    gsap.to('.cards-arc', {
        rotation: 360,
        duration: 50,
        repeat: -1,
        ease: "none",
        force3D: true
    });

    // --- Final Initialization ---
    function finalize() {
        ScrollTrigger.sort();
        ScrollTrigger.refresh();
        // Force images to render
        const imgs = document.querySelectorAll('img');
        imgs.forEach(img => {
            if (img.complete) {
                gsap.to(img, { opacity: 1, duration: 0.3 });
            } else {
                img.onload = () => gsap.to(img, { opacity: 1, duration: 0.3 });
            }
        });
    }
    const refreshAll = () => {
        ScrollTrigger.refresh();
        ScrollTrigger.sort();
    };

    window.addEventListener('load', () => {
        finalize();
        setTimeout(finalize, 500);
        setTimeout(finalize, 2000);
    });

    window.addEventListener('resize', () => {
        ScrollTrigger.refresh();
    });
});
