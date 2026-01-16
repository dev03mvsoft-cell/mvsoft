/**
 * Mvsoft Main Script (Entry Point)
 * Initializes modular engines for UI, 3D, and Animations
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Register Plugins (Must be global)
    if (typeof gsap !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
    }

    // 2. Initialize UI (Navbar, Cursor, Common UI)
    if (typeof UICore !== 'undefined') {
        UICore.init();
    }

    // 3. Initialize Animations (SplitText, ScrollTrigger, Pins)
    if (typeof AnimationEngine !== 'undefined') {
        AnimationEngine.init();
    }

    // 4. Initialize 3D Visuals (Galaxy, Cube, Neural)
    if (typeof ThreeEngine !== 'undefined') {
        ThreeEngine.init();
    }

    // 5. Final Refresh for Smooth ScrollTriggers
    if (typeof ScrollTrigger !== 'undefined') {
        ScrollTrigger.refresh();
    }
});
