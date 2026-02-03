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
        if (document.fonts) {
            document.fonts.ready.then(() => {
                AnimationEngine.init();
            });
        } else {
            // Fallback for older browsers
            AnimationEngine.init();
        }
    }

    // 4. Initialize 3D Visuals (Galaxy, Cube, Neural)
    if (typeof ThreeEngine !== 'undefined') {
        ThreeEngine.init();
    }

    // 5. Horizontal Tech Navigation
    const techNavBtns = document.querySelectorAll('.tech-nav-btn');
    const techPanes = document.querySelectorAll('.tech-content-pane');

    if (techNavBtns.length > 0) {
        techNavBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = btn.getAttribute('data-tab');
                const targetPane = document.getElementById(`pane-${targetId}`);

                if (!targetPane) return;

                // Update nav buttons
                techNavBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // Update content panes
                techPanes.forEach(pane => pane.classList.remove('active'));
                targetPane.classList.add('active');

                // Refresh ScrollTrigger as height might change
                if (typeof ScrollTrigger !== 'undefined') {
                    ScrollTrigger.refresh();
                }
            });
        });
    }

    // 7. Final Refresh for Smooth ScrollTriggers
    if (typeof ScrollTrigger !== 'undefined') {
        ScrollTrigger.refresh();
    }
});
