const AnimationEngine = (() => {
    let mm = gsap.matchMedia();

    const init = () => {
        if (typeof gsap === 'undefined') return;

        // Global ScrollTrigger Configuration for Performance
        ScrollTrigger.config({
            autoRefreshEvents: "visibilitychange,DOMContentLoaded,load,resize",
            ignoreMobileResize: true // Prevents jumping on mobile address bar hide/show
        });

        mm.add({
            // Desktop/Large Screens
            isDesktop: "(min-width: 992px)",
            // Mobile/Tablets
            isMobile: "(max-width: 991px)",
            // Reduced Motion Preference
            reduceMotion: "(prefers-reduced-motion: reduce)"
        }, (context) => {
            let { isDesktop, isMobile, reduceMotion } = context.conditions;

            if (reduceMotion) return; // Respect user settings

            prepareMagicalText(isMobile);
            initGSAPSplitText(isMobile);
            initScrollReveals(isMobile);

            return () => {
                // Optional cleanup if needed
            };
        });
    };

    const prepareMagicalText = (isMobile) => {
        if (typeof SplitType === "undefined") return;

        document.querySelectorAll(".split-text").forEach((el) => {
            const textSplit = new SplitType(el, { types: 'lines,words,chars', lineClass: 'split-line', wordClass: 'split-word', charClass: 'split-char' });

            textSplit.lines.forEach(line => {
                const wrapper = document.createElement('div');
                wrapper.className = 'split-line-wrapper';
                Object.assign(wrapper.style, { overflow: 'hidden', perspective: '1000px' });
                line.parentNode.insertBefore(wrapper, line);
                wrapper.appendChild(line);
            });

            gsap.from(textSplit.chars, {
                duration: isMobile ? 1.0 : 1.4,
                y: 50, // Reduced from 100 for snappier feel
                rotationX: -60,
                rotationY: 20,
                scale: 0.8,
                filter: "blur(10px)",
                autoAlpha: 0,
                stagger: { amount: isMobile ? 0.8 : 1.5, from: "start" },
                ease: "expo.out",
                transformOrigin: "50% 50% -100",
                scrollTrigger: {
                    trigger: el,
                    start: "top 95%",
                    onEnter: () => el.classList.add('is-revealed'),
                    toggleActions: "play none none none" // Changed from restart for performance
                }
            });
        });

        const legacyMagic = document.querySelector(".legacy-magic");
        if (legacyMagic && !isMobile) { // Disable complex legacy effect on mobile
            const legacySplit = new SplitType(legacyMagic, { types: 'lines,words,chars', lineClass: 'split-line', charClass: 'legacy-char' });
            gsap.from(legacySplit.chars, {
                yPercent: "random([-300, 300])", xPercent: "random([-100, 100])", rotationZ: "random(-60, 60)", rotationX: "random(-180, 180)",
                filter: "blur(20px)", autoAlpha: 0, scale: 0.2, stagger: { amount: 2.5, from: "random" },
                duration: 3, ease: "expo.out", scrollTrigger: { trigger: legacyMagic, start: "top 85%", toggleActions: "play none none none" },
                onComplete: () => {
                    gsap.to(legacySplit.chars, { yPercent: "random([-15, 15])", rotation: "random(-5, 5)", duration: "random(2, 5)", repeat: -1, yoyo: true, ease: "sine.inOut", stagger: { amount: 1.5, from: "random" } });
                }
            });
        }
    };

    const initGSAPSplitText = (isMobile) => {
        if (typeof SplitText === "undefined") return;

        const splits = document.querySelectorAll(".split");
        splits.forEach(el => {
            let split = SplitText.create(el, {
                type: "words, lines",
                mask: "lines",
                linesClass: "line++",
            });

            gsap.from(split.lines, {
                yPercent: 100,
                autoAlpha: 0,
                duration: 1.0,
                stagger: 0.08,
                ease: "expo.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 90%",
                    toggleActions: "play none none none"
                }
            });
        });
    };

    const initScrollReveals = (isMobile) => {
        gsap.utils.toArray('[class*="reveal-"]').forEach((elem) => {
            const delay = elem.getAttribute('data-delay') || 0;
            const duration = elem.getAttribute('data-duration') || 1.0;

            elem.style.willChange = "transform, opacity";

            gsap.to(elem, {
                opacity: 1,
                x: 0,
                y: 0,
                scale: 1,
                duration: duration,
                delay: delay,
                ease: "expo.out",
                scrollTrigger: {
                    trigger: elem,
                    start: isMobile ? "top 95%" : "top 85%",
                    toggleActions: "play none none none",
                    onEnter: () => elem.style.willChange = "auto",
                    fastScrollEnd: true // Improves performance on quick scrolls
                }
            });
        });

        // Box optimization
        const box = document.querySelector(".box");
        if (box) {
            gsap.from(".box", {
                scrollTrigger: {
                    trigger: ".box",
                    start: "top bottom",
                    end: "top 30%",
                    scrub: 0.5 // Faster scrub for direct response
                },
                rotate: 360, scale: 0.5, borderRadius: "50%", ease: "none"
            });
        }

        if (document.querySelector('.culture-grid')) {
            gsap.from(".culture-item", {
                scrollTrigger: {
                    trigger: ".culture-grid",
                    start: "top 90%",
                    toggleActions: "play none none none"
                },
                autoAlpha: 0,
                y: 30,
                scale: 0.98,
                duration: 1.0,
                stagger: 0.05,
                ease: "expo.out",
                clearProps: "all"
            });
        }
    };

    return { init };
})();
