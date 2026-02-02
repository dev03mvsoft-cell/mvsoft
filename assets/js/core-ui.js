/**
 * UI Core Module
 * Handles Navbar, navigation, and basic interactive elements
 */
const UICore = (() => {
    const init = () => {
        const isMobile = window.innerWidth <= 991;
        const navbar = document.querySelector('.navbar');
        const expertiseContainer = document.querySelector('.expertise-container');

        // Mega Menu Dropdown Animation
        const dropdown = document.querySelector('.dropdown');
        if (dropdown) {
            dropdown.addEventListener('show.bs.dropdown', () => {
                gsap.fromTo(".mega-menu",
                    { opacity: 0, y: 20 },
                    { opacity: 1, y: 0, duration: 0.4, ease: "power2.out" }
                );
                gsap.from(".mega-link", {
                    opacity: 0,
                    x: -10,
                    stagger: 0.05,
                    duration: 0.3,
                    delay: 0.1
                });
            });
        }

        // Navbar Entrance Animation
        if (navbar) {
            const tl = gsap.timeline({ defaults: { ease: "power4.inOut" } });
            tl.set(navbar, {
                opacity: 1, width: "100px", height: "100px", borderRadius: "50%",
                padding: 0, xPercent: -50, left: "50%", top: "50vh", yPercent: -50,
                overflow: "hidden", display: "flex", alignItems: "center", justifyContent: "center"
            });

            if (expertiseContainer && !isMobile) {
                tl.set(expertiseContainer, {
                    opacity: 1, display: "flex", position: "absolute",
                    left: "50%", top: "50%", xPercent: -50, yPercent: -50,
                    margin: 0, whiteSpace: "nowrap", zIndex: 100
                });
                tl.set(".expertise-container span", { display: "none" });
            }

            tl.from(navbar, {
                scale: 0, duration: 1.2, ease: "elastic.out(1, 0.7)",
                onStart: () => { if (!isMobile) startTechCycle(); }
            })
                .to(navbar, { top: "20px", yPercent: 0, duration: 1, height: "66px", borderRadius: "50px", ease: "power3.inOut" })
                .to(navbar, { width: "95%", duration: 1.2, ease: "expo.inOut" });

            if (expertiseContainer && !isMobile) {
                tl.to(expertiseContainer, { position: "relative", left: "auto", top: "auto", xPercent: 0, yPercent: 0, duration: 0.8, ease: "power2.inOut" }, "-=0.8");
                tl.set(".expertise-container span", { display: "inline-block" });
            }

            tl.to([".navbar-brand", ".navbar-nav", ".expertise-container span"], { opacity: 1, duration: 0.6, stagger: 0.1 }, "-=0.2");
            tl.set(navbar, { overflow: "visible", height: "66px", padding: "0 30px" });
        }

        // Magic Hover Effects
        const navLinks = document.querySelectorAll('.nav-link, .navbar-brand');
        navLinks.forEach(link => {
            link.addEventListener('mousemove', (e) => {
                const rect = link.getBoundingClientRect();
                const x = (e.clientX - rect.left - rect.width / 2) * 0.3;
                const y = (e.clientY - rect.top - rect.height / 2) * 0.3;
                gsap.to(link, { x, y, duration: 0.4, ease: "power2.out" });
            });
            link.addEventListener('mouseleave', () => {
                gsap.to(link, { x: 0, y: 0, duration: 0.6, ease: "elastic.out(1, 0.3)" });
            });
        });

        // Typing Logic
        if (typeof Typed !== 'undefined' && document.querySelector(".info-section .text")) {
            new Typed(".info-section .text", {
                strings: ["", "custom AI.", "web apps.", "mobile apps.", "databases."],
                typeSpeed: 100, backSpeed: 40, loop: true
            });
        }
    };

    function startTechCycle() {
        const expertiseIcons = document.querySelectorAll('.expertise-carousel i');
        if (expertiseIcons.length > 0) {
            const expertiseTl = gsap.timeline({ repeat: -1 });
            expertiseIcons.forEach((icon) => {
                expertiseTl.to(icon, { opacity: 1, scale: 1, y: 0, display: "block", duration: 0.4, ease: "back.out(1.7)" })
                    .to(icon, { opacity: 0, scale: 0.5, y: -30, display: "none", duration: 0.4, ease: "back.in(1.7)", delay: 1.2 });
            });
        }
    }

    return { init };
})();
