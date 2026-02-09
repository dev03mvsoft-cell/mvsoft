// GSAP Logic for Profile Page
document.addEventListener('DOMContentLoaded', () => {
    // Register ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);


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

    const magicTl = gsap.timeline({
        scrollTrigger: {
            trigger: '.magic-pin-section',
            start: 'top top',
            end: '+=450%',
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
                width: "min(400px, 30vw)",
                height: "min(550px, 45vh)",
                borderRadius: "20px",
                duration: 2.2,
                force3D: true, // Fixes sub-pixel border artifacts
                ease: "expo.inOut"
            }, "<");
        } else if (i === 2) {
            magicTl.to(bossImg, {
                left: "10%",
                xPercent: 0,
                width: "min(480px, 35vw)",
                height: "min(650px, 55vh)",
                duration: 2.2,
                force3D: true,
                ease: "expo.inOut"
            }, "<");
        } else if (i === 3) {
            // Slide 4: Full Image (Contain - No Cut)
            magicTl.to(bossImg, {
                top: "50%",
                left: "50%",
                xPercent: -50,
                yPercent: -50,
                width: "min(1200px, 95vw)",
                height: "min(800px, 85vh)",
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

