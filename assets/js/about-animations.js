/**
 * About Page Specific Animations
 * Includes: Elastic Hero Text, Scramble Reveal, and Stat Counters
 */

window.addEventListener('load', function () {
    // --- 1. Elastic Hero Text Reveal ---
    const elasticInit = () => {
        if (typeof SplitText === 'undefined' || typeof gsap === 'undefined' || !document.querySelector('.elastic-txt')) return;

        const weightInit = 600;
        const weightTarget = 400;
        const weightDiff = weightInit - weightTarget;
        const stretchInit = 150;
        const stretchTarget = 80;
        const stretchDiff = stretchInit - stretchTarget;
        const maxYScale = 2.5;

        let mySplitText = new SplitText('.elastic-txt', {
            type: "chars",
            charsClass: "elastic-char"
        });
        let chars = document.querySelectorAll('.elastic-char');
        let txt = document.querySelector('.elastic-txt');
        let charH = txt.offsetHeight;
        let numChars = chars.length;
        let isMouseDown = false;
        let mouseInitialY = 0;
        let mouseFinalY = 0;
        let distY = 0;
        let charIndexSelected = 0;
        let elasticDropOff = 0.8;
        let dragYScale = 0;

        gsap.set(chars, {
            transformOrigin: 'center bottom'
        });

        // Anim In with ScrollTrigger
        gsap.from(chars, {
            y: -500,
            fontWeight: weightTarget,
            fontStretch: stretchTarget,
            scaleY: 2,
            ease: "elastic(0.2, 0.1)",
            duration: 1.5,
            stagger: {
                each: 0.05,
                from: 'random'
            },
            scrollTrigger: {
                trigger: ".elastic-stage",
                start: "top bottom",
                toggleActions: "restart none none restart"
            }
        });

        document.body.addEventListener('mousedown', function (e) {
            if (e.target.classList.contains('elastic-char')) {
                mouseInitialY = e.clientY;
                isMouseDown = true;
                chars.forEach((c, i) => {
                    if (c === e.target) charIndexSelected = i;
                });
            }
        });

        document.body.addEventListener('mouseup', function () {
            if (isMouseDown) {
                isMouseDown = false;
                gsap.to(chars, {
                    y: 0,
                    fontWeight: weightInit,
                    fontStretch: stretchInit,
                    scale: 1,
                    ease: "elastic(0.35, 0.1)",
                    duration: 1,
                    stagger: {
                        each: 0.02,
                        from: charIndexSelected
                    }
                });
            }
        });

        document.body.addEventListener('mousemove', function (e) {
            if (isMouseDown) {
                mouseFinalY = e.clientY;
                let maxYDragDist = charH * (maxYScale - 1);
                distY = mouseInitialY - mouseFinalY;
                dragYScale = distY / maxYDragDist;
                if (dragYScale > (maxYScale - 1)) dragYScale = maxYScale - 1;
                else if (dragYScale < -0.5) dragYScale = -0.5;

                gsap.to(chars, {
                    y: (index) => {
                        let dispersion = 1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff));
                        return (dispersion * dragYScale) * -50;
                    },
                    fontWeight: (index) => {
                        let dispersion = 1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff));
                        return (weightInit - ((dispersion * dragYScale) * weightDiff));
                    },
                    fontStretch: (index) => {
                        let dispersion = 1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff));
                        return (stretchInit - ((dispersion * dragYScale) * stretchDiff));
                    },
                    scaleY: (index) => {
                        let dispersion = 1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff));
                        let sY = 1 + (dispersion * dragYScale);
                        return sY < 0.5 ? 0.5 : sY;
                    },
                    ease: "power4",
                    duration: 0.6
                });
            }
        });
    };

    // --- 2. Advanced Scramble Reveal ---
    const scrambleInit = () => {
        const wrapper = document.querySelector('.text-scramble__content');
        if (!wrapper || typeof gsap === 'undefined') return;

        const segments = [{
            id: 'scramble-text-1',
            text: "MVSoft Solution is a modern software development company built for the post-2025 digital economy. "
        },
        {
            id: 'scramble-text-2',
            text: "Founded to bridge the gap between overpriced agencies and unreliable development vendors—"
        },
        {
            id: 'scramble-text-3',
            text: "we deliver enterprise-grade technology with a value-first approach."
        }
        ];

        const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$%^&*";
        let masterTl;

        const cursorTl = gsap.timeline({ repeat: -1 });
        cursorTl.to("#scramble-cursor", { opacity: 0, duration: 0.5, ease: "none", delay: 0.2 })
            .to("#scramble-cursor", { opacity: 1, duration: 0.5, ease: "none", delay: 0.2 });

        function startScramble() {
            if (masterTl) masterTl.kill();
            segments.forEach(s => {
                const el = document.getElementById(s.id);
                if (el) el.textContent = "";
            });
            masterTl = gsap.timeline({ defaults: { ease: "none" } });
            segments.forEach((s, index) => {
                const el = document.getElementById(s.id);
                if (!el) return;
                let obj = { i: 0 };
                masterTl.to(obj, {
                    i: s.text.length,
                    duration: index === 0 ? 1.5 : 1.2,
                    onUpdate: () => {
                        let iteration = Math.floor(obj.i);
                        el.textContent = s.text.split("").map((letter, i) => {
                            if (i < iteration) return s.text[i];
                            if (s.text[i] === " ") return " ";
                            return chars[Math.floor(Math.random() * chars.length)];
                        }).join("");
                    }
                }, index === 0 ? 0 : ">-0.1");
            });
            masterTl.add(cursorTl);
        }

        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.create({
                trigger: wrapper,
                start: "top 90%",
                onEnter: startScramble,
                onEnterBack: startScramble
            });
        } else {
            startScramble();
        }
    };

    // --- 3. Animated Stat Counters ---
    const countersInit = () => {
        const counters = document.querySelectorAll('.stat-number');
        if (!counters.length || typeof gsap === 'undefined') return;

        function startCounters() {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                let obj = { val: 0 };
                gsap.to(obj, {
                    val: target,
                    duration: 2,
                    ease: "power2.out",
                    onUpdate: () => {
                        counter.textContent = Math.ceil(obj.val) + (target === 24 ? "H" : "+");
                    }
                });
            });
        }

        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.create({
                trigger: ".stat-card",
                start: "top 90%",
                onEnter: startCounters,
                onEnterBack: startCounters
            });
        } else {
            startCounters();
        }
    };

    // --- 4. Mission & Vision Kinetic Parallax ---
    const kineticInit = () => {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        // Animate Ghost Labels (Uniform Left-to-Right drift)
        // Corrected direction for PURPOSE to match FUTURE
        gsap.fromTo(".ghost-label-left", {
            xPercent: 30
        }, {
            xPercent: -30,
            ease: "none",
            scrollTrigger: {
                trigger: ".kinetic-container",
                start: "top bottom",
                end: "bottom top",
                scrub: 1.5
            }
        });

        gsap.fromTo(".ghost-label-right", {
            xPercent: -30
        }, {
            xPercent: 30,
            ease: "none",
            scrollTrigger: {
                trigger: ".kinetic-container",
                start: "top bottom",
                end: "bottom top",
                scrub: 1.5
            }
        });

        // 3D Tilt Effect on Hover
        const cards = document.querySelectorAll('.kinetic-card');
        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const xc = rect.width / 2;
                const yc = rect.height / 2;
                const dx = x - xc;
                const dy = y - yc;

                gsap.to(card, {
                    rotationY: dx / 20,
                    rotationX: -dy / 20,
                    duration: 0.5,
                    ease: "power2.out"
                });
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    rotationY: 0,
                    rotationX: 0,
                    duration: 1,
                    ease: "elastic.out(1, 0.3)"
                });
            });
        });
    };

    // --- 5. Sister Concern SplitText Animation ---
    const sisterConcernInit = () => {
        if (typeof SplitText === 'undefined' || typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        // Animate Heading (Chars)
        const heading = document.querySelector('.split-text-reveal');
        if (heading) {
            const splitHeading = new SplitText(heading, { type: "chars, words" });
            gsap.from(splitHeading.chars, {
                opacity: 0,
                y: 50,
                rotateX: -90,
                stagger: 0.02,
                duration: 1,
                ease: "power4.out",
                scrollTrigger: {
                    trigger: heading,
                    start: "top 85%",
                    toggleActions: "play none none reverse"
                }
            });
        }

        // Animate Paragraphs (Lines)
        const paragraphs = document.querySelectorAll('.split-text-p');
        paragraphs.forEach(p => {
            const splitP = new SplitText(p, { type: "lines" });
            gsap.set(p, { opacity: 1 }); // Reveal container
            gsap.from(splitP.lines, {
                opacity: 0,
                y: 30,
                rotateX: -15,
                stagger: 0.1,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: p,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                }
            });
        });
    };

    // --- 6. Video Modal Logic ---
    const videoModalLogic = () => {
        const trigger = document.querySelector('.video-pop-trigger');
        const modal = document.getElementById('bcsVideoModal');
        const closeBtn = document.querySelector('.video-modal-close');
        const popupVideo = document.getElementById('popupVideo');

        if (!trigger || !modal || !popupVideo) return;

        trigger.addEventListener('click', () => {
            modal.classList.add('active');
            popupVideo.muted = false; // Explicitly unmute
            popupVideo.volume = 1; // Unmute for modal
            popupVideo.play();
            document.body.style.overflow = 'hidden'; // Prevent scroll
        });

        const closeModal = () => {
            modal.classList.remove('active');
            popupVideo.pause();
            popupVideo.currentTime = 0;
            document.body.style.overflow = ''; // Restore scroll
        };

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    };

    // Initialize all
    elasticInit();
    scrambleInit();
    countersInit();
    kineticInit();
    sisterConcernInit();
    videoModalLogic();
});
