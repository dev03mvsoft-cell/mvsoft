// GSAP Logic for Profile Page
document.addEventListener('DOMContentLoaded', () => {
    // Register ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // Initialize Lenis Smooth Scroll
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
        touchMultiplier: 2,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // Synchronize Lenis with ScrollTrigger
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);


    // Initial Animations
    const tl = gsap.timeline();
    tl.from('.profile-nav', {
        y: -50,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out'
    })
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

    // Hero "Bind Up" Reveal (Moving UP on scroll)
    gsap.to('.hero-center', {
        y: -200,
        opacity: 0,
        ease: "none",
        scrollTrigger: {
            trigger: '.cosmos-hero',
            start: 'top top',
            end: 'bottom top',
            scrub: true
        }
    });

    // Floating Animation for Assets (Original Layout)
    const assets = document.querySelectorAll('.asset');
    assets.forEach((asset, i) => {
        // Subtle floating movement
        gsap.to(asset, {
            y: "random(-25, 25)",
            x: "random(-20, 20)",
            duration: "random(3, 5)",
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
            delay: i * 0.1
        });

        // Parallax / Movement on scroll (Images stay visible)
        gsap.to(asset, {
            y: -250 - (i * 15), // Smooth move up
            scrollTrigger: {
                trigger: '.cosmos-hero',
                start: 'top top',
                end: 'bottom top',
                scrub: 1.5,
                invalidateOnRefresh: true
            }
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


    // --- Magic Text Pin Animation (Dynamic Layouts) ---
    const slides = gsap.utils.toArray('.magic-slide');
    const bossImg = document.querySelector('.magic-boss-image');

    // Initial State: Each slide on a layer above the boss image
    gsap.set(slides, {
        clipPath: (i) => i === 0 ? "inset(0% 0% 0% 0%)" : "inset(100% 0% 0% 0%)",
        zIndex: (i) => i + 20, // Start high enough to avoid overlap
        opacity: 1,
        visibility: 'visible'
    });

    const magicMM = gsap.matchMedia();

    magicMM.add({
        isDesktop: "(min-width: 1025px)",
        isMobile: "(max-width: 1024px)"
    }, (context) => {
        let { isDesktop } = context.conditions;

        const magicTl = gsap.timeline({
            scrollTrigger: {
                trigger: '.magic-pin-section',
                start: 'top top',
                end: isDesktop ? '+=450%' : '+=250%', // Much shorter on tablet/mobile
                pin: true,
                scrub: 1.2,
                anticipatePin: 1,
                invalidateOnRefresh: true
            }
        });


        // Animate each slide
        slides.forEach((slide, i) => {
            const content = slide.querySelector('.magic-content');

            if (i === 0) {
                // Slide 1 Initial Animation
                gsap.from([slide.querySelector('.magic-label'), slide.querySelector('.magic-title')], {
                    x: -50,
                    opacity: 0,
                    stagger: 0.2,
                    duration: 1.5,
                    delay: 0.5
                });
                return;
            }

            const prevSlide = slides[i - 1];

            // 1. Reveal Slide
            magicTl.to(slide, {
                clipPath: "inset(0% 0% 0% 0%)",
                duration: 2.5,
                ease: "power3.inOut"
            }, "+=0.3");

            // 2. Animate Boss Image (Responsive Scaling)
            if (i === 1) {
                magicTl.to(bossImg, {
                    top: "50%",
                    left: "50%",
                    xPercent: -50,
                    yPercent: -50,
                    width: "min(350px, 28vw)",
                    height: "min(500px, 42vh)",
                    borderRadius: "20px",
                    duration: 2.2,
                    force3D: true,
                    ease: "expo.inOut"
                }, "<");
            } else if (i === 2) {
                magicTl.to(bossImg, {
                    left: "min(12%, 100px)",
                    xPercent: 0,
                    width: "min(450px, 32vw)",
                    height: "min(600px, 52vh)",
                    duration: 2.2,
                    force3D: true,
                    ease: "expo.inOut"
                }, "<");
            } else if (i === 3) {
                magicTl.to(bossImg, {
                    top: "50%",
                    left: "50%",
                    xPercent: -50,
                    yPercent: -50,
                    width: "min(1100px, 92vw)",
                    height: "min(750px, 82vh)",
                    borderRadius: "20px",
                    opacity: 1,
                    duration: 2.5,
                    force3D: true,
                    ease: "expo.inOut"
                }, "<");
            }

            // 3. Fade Prev Slide
            magicTl.to(prevSlide, {
                scale: 0.8,
                opacity: 0,
                filter: "blur(20px)",
                duration: 2,
                ease: "power2.inOut"
            }, "<");

            // 4. Animate Text (Sequential)
            if (i === 1) {
                // Slide 2: Split Layout Reveal (L/R)
                gsap.set(content, { width: "100%", maxWidth: "1200px", left: 0, zIndex: 100 });
                const leftPart = content.querySelector('.split-left');
                const rightPart = content.querySelector('.split-right');

                magicTl.fromTo([leftPart, rightPart], {
                    x: (idx) => idx === 0 ? -100 : 100,
                    opacity: 0
                }, {
                    x: 0,
                    opacity: 1,
                    duration: 1.5,
                    ease: "power4.out"
                }, "-=1.5");
            } else if (i === 2) {
                // Slide 3: Right Layout (Image is on Left)
                // Use smaller width and safe absolute positioning to avoid overlap
                gsap.set(content, {
                    textAlign: "right",
                    width: "35%",
                    position: "absolute",
                    right: "10%",
                    left: "auto",
                    zIndex: 100
                });
                magicTl.fromTo([content.querySelector('.magic-label'), content.querySelector('.magic-title')], {
                    x: 50,
                    opacity: 0
                }, {
                    x: 0,
                    opacity: 1,
                    stagger: 0.2,
                    duration: 1.5,
                    ease: "back.out(1.4)"
                }, "-=1.5");
            } else if (i === 3) {
                // Slide 4: Full Centered Focus
                gsap.set(content, {
                    textAlign: "center",
                    width: "min(100%, 1000px)",
                    left: "50%",
                    top: "50%",
                    xPercent: -50,
                    yPercent: -50,
                    position: "absolute",
                    zIndex: 100
                });
                magicTl.fromTo([content.querySelector('.magic-label'), content.querySelector('.magic-title')], {
                    y: 50,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.2,
                    duration: 1.5,
                    ease: "power3.out"
                }, "-=1.5");

                // Ensure boss image is visible but behind text
                magicTl.set(bossImg, { zIndex: 10 }, "<");
            }
        });
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

    // Unified Mouse Tracking & Parallax (Cleaned up)
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

    const arcCards = document.querySelectorAll('.arc-card');
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

        // Just Parallax the Content Container (Not individual cards to avoid conflict)
        gsap.to('.exceptional-content', {
            x: xPercent * -25,
            y: yPercent * -20,
            duration: 1.5,
            force3D: true,
            ease: "power2.out"
        });

        requestAnimationFrame(updateParallax);
    }
    requestAnimationFrame(updateParallax);

    // --- Exceptional Section Full Circle Animation (Scrubbed Expansion) ---
    gsap.set('.cards-arc', { xPercent: -50, yPercent: -50, force3D: true });

    // --- Global Scroll Progress Bar ---
    gsap.to('.scroll-progress', {
        width: '100%',
        ease: 'none',
        scrollTrigger: {
            trigger: 'body',
            start: 'top top',
            end: 'bottom bottom',
            scrub: 0.3
        }
    });

    // --- Exceptional Section Text Reveal (Immediate) ---
    // Using a separate trigger to ensure text is visible exactly when needed
    // --- Exceptional Section Reveal Logic (Robust) ---
    gsap.from('.exceptional-content', {
        scrollTrigger: {
            trigger: '.exceptional-section',
            start: 'top 85%',
            toggleActions: 'play none none none', // Don't reverse hide to keep it visible
        },
        opacity: 0,
        y: 80,
        scale: 0.95,
        duration: 2,
        ease: 'power4.out',
        clearProps: "all"
    });

    // --- Exceptional Section Cards Expansion (4-Screen Explicit Control) ---
    const mm = gsap.matchMedia();
    const cards = gsap.utils.toArray('.arc-card');

    mm.add({
        isDesktop: "(min-width: 1441px)",
        isLaptop: "(min-width: 1025px) and (max-width: 1440px)",
        isTablet: "(min-width: 769px) and (max-width: 1024px)",
        isMobile: "(max-width: 768px)"
    }, (context) => {
        let { isDesktop, isLaptop, isTablet, isMobile } = context.conditions;

        let radius;
        if (isDesktop) radius = 420;
        else if (isLaptop) radius = 340;
        else if (isTablet) radius = 240;
        else radius = 145;

        cards.forEach((card, i) => {
            const degrees = i * 30;
            const angle = degrees * (Math.PI / 180);

            gsap.set(card, {
                x: 0,
                y: 0,
                xPercent: -50,
                yPercent: -50,
                scale: 0,
                opacity: 0,
                transformOrigin: "center center"
            });

            gsap.to(card, {
                x: Math.cos(angle - Math.PI / 2) * radius,
                y: Math.sin(angle - Math.PI / 2) * radius,
                xPercent: -50,
                yPercent: -50,
                scale: 1,
                opacity: 1,
                rotation: degrees,
                scrollTrigger: {
                    trigger: '.exceptional-section',
                    start: 'top 95%',
                    end: 'top 20%',
                    scrub: 1.2,
                    invalidateOnRefresh: true,
                }
            });
        });
    });

    // 3. Keep the Ring Rotating Infinitely (Centered Pivot)
    gsap.to('.cards-arc', {
        rotation: 360,
        xPercent: -50,
        yPercent: -50,
        duration: 80,
        repeat: -1,
        ease: "none",
        force3D: true
    });

    // --- Final Initialization ---
    function finalize() {
        ScrollTrigger.sort();
        ScrollTrigger.refresh();
    }

    window.addEventListener('resize', () => {
        ScrollTrigger.refresh();
    });

    // --- Professional Partners Diamond Collage GSAP ---
    const collageItems = document.querySelectorAll('.collage-item.diamond');

    if (collageItems.length > 0) {
        // Initial state for entrance
        gsap.set(collageItems, {
            scale: 0,
            opacity: 0,
            rotate: 15
        });

        // Professional Staggered Entrance
        ScrollTrigger.batch(collageItems, {
            onEnter: batch => gsap.to(batch, {
                scale: 1,
                opacity: 1,
                rotate: 45, // Target rotation for diamond
                duration: 1.2,
                stagger: 0.1,
                ease: "back.out(1.7)",
                overwrite: true
            }),
            start: "top 85%"
        });

        // Subtle Organic Floating (Premium Feel)
        collageItems.forEach((item, i) => {
            gsap.to(item, {
                y: "random(-10, 10)",
                x: "random(-5, 5)",
                duration: "random(4, 6)",
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: i * 0.3
            });
        });

        // Magnetic Tilt Hover logic via GSAP
        collageItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                gsap.to(item, {
                    scale: 1.15,
                    duration: 0.4,
                    ease: "power2.out",
                    overwrite: true
                });
            });
            item.addEventListener('mouseleave', () => {
                gsap.to(item, {
                    scale: 1,
                    duration: 0.6,
                    ease: "elastic.out(1, 0.5)",
                    overwrite: true
                });
            });
        });

        // --- Dynamic Random Image Swapping (Living Collage) ---
        const partnerImages = [
            "../assets/img/logo/BCS hiring .png",
            "../assets/img/logo/logo.webp",
            "../assets/img/logo/jodac-logo.png",
            "../assets/img/logo/jb-logo.webp",
            "../assets/img/logo/bengali-association-logo.webp",
            "../assets/img/logo/mohnish-logo.webp",
            "../assets/img/logo/skl-logo-1.webp",
            "../assets/img/logo/cropped-WSD-Logo-png.webp",
            "../assets/img/logo/logo.0bf6238f.jpg",
            "../assets/img/logo/Trident_Logo_Registered_489c31b1ff (1).svg",
            "../assets/img/logo/yugansh-logo.webp",
            "../assets/img/logo/trilink_export_logo.png",
            "../assets/img/logo/mahabali-logo.webp"
        ];

        function swapRandomImage() {
            const cards = Array.from(collageItems).filter(card => card.querySelector('img'));
            const randomCard = cards[Math.floor(Math.random() * cards.length)];
            const img = randomCard.querySelector('img');

            // Get all current image sources to avoid duplicates
            const currentSrcs = cards.map(c => c.querySelector('img').getAttribute('src'));

            // Filter pool to find images that are NOT currently showing
            const availablePool = partnerImages.filter(src => !currentSrcs.includes(src));

            if (availablePool.length === 0) return; // All logos showing (unlikely with pool of 13)

            const newSrc = availablePool[Math.floor(Math.random() * availablePool.length)];

            gsap.to(img, {
                opacity: 0,
                scale: 0.8,
                duration: 0.8,
                onComplete: () => {
                    img.src = newSrc;
                    // Also update the overlay text if applicable
                    const overlay = randomCard.querySelector('.diamond-overlay span');
                    if (overlay) {
                        // Extract name from path if possible, or mapping could be added
                        // For now, just swap image source as requested
                    }
                    gsap.to(img, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.8
                    });
                }
            });
        }
        setInterval(swapRandomImage, 4000);
    }
});

