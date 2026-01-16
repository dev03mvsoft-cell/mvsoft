/**
 * Horizontal Scroll Animation Module
 * Implements a simple GSAP pin and horizontal translation
 */
document.addEventListener('DOMContentLoaded', () => {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

    gsap.registerPlugin(ScrollTrigger);

    const experienceText = document.querySelector(".page02 h1");

    if (experienceText) {
        gsap.to(experienceText, {
            x: () => -(experienceText.scrollWidth - window.innerWidth + window.innerWidth * 0.1),
            ease: "none",
            scrollTrigger: {
                trigger: ".page02",
                start: "top 0%",
                end: () => "+=" + (experienceText.scrollWidth + window.innerHeight),
                scrub: 2,
                pin: true,
                anticipatePin: 1,
                invalidateOnRefresh: true,
                onUpdate: (self) => {
                    if (window.laptopEffect && window.laptopEffect.screenGroup) {
                        const progress = self.progress;
                        const openThreshold = 0.6;

                        if (progress <= openThreshold) {
                            const p1 = progress / openThreshold;
                            // Flip Style: Closed (Math.PI) -> Tent/Flip Mode (-Math.PI / 2)
                            // This goes 180deg (closed) down to -90deg (flipped past 180)
                            const startRot = 1.55;
                            const endRot = -Math.PI / 10;
                            window.laptopEffect.screenGroup.rotation.x = startRot - (p1 * (startRot - endRot));

                            window.laptopEffect.group.rotation.y = 4;
                            if (window.laptopEffect.screenGlow) window.laptopEffect.screenGlow.intensity = p1 * 5;
                        } else {
                            const p2 = (progress - openThreshold) / (1 - openThreshold);
                            window.laptopEffect.screenGroup.rotation.x = -Math.PI / 7.5;

                            // 360 Rotation in flip mode - Smoother interpolation
                            window.laptopEffect.group.rotation.y = 4 + (p2 * Math.PI * 2);
                            if (window.laptopEffect.screenGlow) window.laptopEffect.screenGlow.intensity = 5;
                        }

                        // Vertical tilt and lift for "floating" effect
                        // Use power2.inOut style math for weighting
                        const weightedProgress = progress < 0.5 ? 2 * progress * progress : 1 - Math.pow(-2 * progress + 2, 2) / 2;
                        window.laptopEffect.group.rotation.x = 0.4 - (weightedProgress * 0.15);
                        window.laptopEffect.group.position.y = -2 + (weightedProgress * 1.5);
                    }
                }
            }
        });
    }

    // 2. Industry Solutions Horizontal Scroll
    const solutionsSection = document.querySelector(".solutions-section");
    const solutionsWrapper = document.querySelector(".horizontal-solutions-container");

    if (solutionsSection && solutionsWrapper) {
        gsap.to(solutionsWrapper, {
            x: () => -(solutionsWrapper.scrollWidth - window.innerWidth),
            ease: "none",
            scrollTrigger: {
                trigger: solutionsSection,
                start: "top top",
                end: () => "+=" + (solutionsWrapper.scrollWidth - window.innerWidth),
                scrub: 1,
                pin: true,
                anticipatePin: 1,
                invalidateOnRefresh: true,
            }
        });
    }
});
