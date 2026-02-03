/**
 * Animation Engine Module
 * Handles SplitType text reveals, ScrollTrigger reveals, and Experience Pinning
 */
const AnimationEngine = (() => {
    const init = () => {
        if (typeof gsap === 'undefined') return;

        prepareMagicalText();
        initGSAPSplitText();
        initScrollReveals();
    };

    const prepareMagicalText = () => {
        if (typeof SplitType === "undefined") return;

        // Global splits (.split-text)
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
                duration: 1.4, y: 100, rotationX: -90, rotationY: 30, scale: 0.6, filter: "blur(15px)", autoAlpha: 0,
                stagger: { amount: 1.5, from: "start" }, ease: "expo.out", transformOrigin: "50% 50% -100",
                scrollTrigger: {
                    trigger: el,
                    start: "top 90%",
                    onEnter: () => el.classList.add('is-revealed'),
                    toggleActions: "restart none none restart"
                }
            });
        });

        // Legacy specialized splits (.legacy-magic)
        const legacyMagic = document.querySelector(".legacy-magic");
        if (legacyMagic) {
            const legacySplit = new SplitType(legacyMagic, { types: 'lines,words,chars', lineClass: 'split-line', charClass: 'legacy-char' });
            gsap.from(legacySplit.chars, {
                yPercent: "random([-300, 300])", xPercent: "random([-100, 100])", rotationZ: "random(-60, 60)", rotationX: "random(-180, 180)",
                filter: "blur(20px)", autoAlpha: 0, scale: 0.2, stagger: { amount: 2.5, from: "random" },
                duration: 3, ease: "expo.out", scrollTrigger: { trigger: legacyMagic, start: "top 85%", toggleActions: "restart none none restart" },
                onComplete: () => {
                    gsap.to(legacySplit.chars, { yPercent: "random([-15, 15])", rotation: "random(-5, 5)", duration: "random(2, 5)", repeat: -1, yoyo: true, ease: "sine.inOut", stagger: { amount: 1.5, from: "random" } });
                }
            });
        }
    };

    const initGSAPSplitText = () => {
        if (typeof SplitText === "undefined") return;

        // Create SplitText as requested
        const splits = document.querySelectorAll(".split");
        splits.forEach(el => {
            let split = SplitText.create(el, {
                type: "words, lines",
                mask: "lines",
                linesClass: "line++",
            });

            // Add the reveal animation
            gsap.from(split.lines, {
                yPercent: 100,
                autoAlpha: 0,
                duration: 1.2,
                stagger: 0.1,
                ease: "expo.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%",
                    toggleActions: "restart none none restart"
                }
            });
        });
    };

    const initScrollReveals = () => {
        // Universal Reveal Handler for reveal-up, reveal-down, reveal-left, reveal-right, reveal-scale
        gsap.utils.toArray('[class*="reveal-"]').forEach((elem) => {
            const delay = elem.getAttribute('data-delay') || 0;
            const duration = elem.getAttribute('data-duration') || 1.2;

            // Animate from hidden state to visible state
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
                    start: "top 85%",
                    toggleActions: "restart none none restart"
                }
            });
        });
        gsap.from(".box", {
            scrollTrigger: { trigger: ".box", start: "top 70%", scrub: 1 },
            rotate: 360, scale: 0.5, borderRadius: "50%", duration: 2
        });

        // Culture Bento Reveal (Specific override for staggered effect)
        if (document.querySelector('.culture-grid')) {
            gsap.from(".culture-item", {
                scrollTrigger: {
                    trigger: ".culture-grid",
                    start: "top 90%",
                    toggleActions: "restart none none restart"
                },
                autoAlpha: 0,
                y: 50,
                scale: 0.95,
                rotationX: 10,
                duration: 1.2,
                stagger: 0.1,
                ease: "expo.out",
                clearProps: "all"
            });
        }
    };

    return { init };
})();
