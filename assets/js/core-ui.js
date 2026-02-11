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
                    { opacity: 0, y: 15 },
                    { opacity: 1, y: 0, duration: 0.5, ease: "power3.out" }
                );
                gsap.from(".mega-link", {
                    opacity: 0,
                    x: -12,
                    stagger: 0.04,
                    duration: 0.4,
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
                scale: 0, duration: 0.8, ease: "elastic.out(1, 0.7)",
                onStart: () => { if (!isMobile) startTechCycle(); }
            })
                .to(navbar, { top: "20px", yPercent: 0, duration: 0.6, height: "66px", borderRadius: "50px", ease: "power3.inOut" })
                .to(navbar, { width: "95%", duration: 0.8, ease: "expo.inOut" });

            if (expertiseContainer && !isMobile) {
                tl.to(expertiseContainer, { position: "relative", left: "auto", top: "auto", xPercent: 0, yPercent: 0, duration: 0.5, ease: "power2.inOut" }, "-=0.6");
                tl.set(".expertise-container span", { display: "inline-block" });
            }

            tl.to([".navbar-brand", ".navbar-nav", ".expertise-container span"], { opacity: 1, duration: 0.4, stagger: 0.05 }, "-=0.15");
            tl.set(navbar, { overflow: "visible", height: "66px", padding: "0 30px" });
        }

        // Magic Hover Effects
        if (!isMobile) {
            const navLinks = document.querySelectorAll('.nav-link, .navbar-brand');
            navLinks.forEach(link => {
                link.addEventListener('mousemove', (e) => {
                    const rect = link.getBoundingClientRect();
                    const x = (e.clientX - rect.left - rect.width / 2) * 0.3;
                    const y = (e.clientY - rect.top - rect.height / 2) * 0.3;
                    gsap.to(link, { x, y, duration: 0.4, ease: "power2.out" });
                });
                link.addEventListener('mouseleave', () => {
                    gsap.to(link, { x: 0, y: 0, duration: 0.7, ease: "elastic.out(1, 0.3)" });
                });
            });
        }

        // Typing Logic
        if (typeof Typed !== 'undefined' && document.querySelector(".info-section .text")) {
            new Typed(".info-section .text", {
                strings: ["", "custom AI.", "web apps.", "mobile apps.", "databases."],
                typeSpeed: 100, backSpeed: 40, loop: true
            });
        }

        // Premium Smooth Mobile Menu (User Sync: 600ms Bezier)
        const mainNav = document.getElementById('mainNavbar');
        const toggler = document.querySelector('.navbar-toggler');
        const spans = toggler ? toggler.querySelectorAll('span') : [];

        if (mainNav && spans.length) {
            mainNav.addEventListener('show.bs.collapse', () => {
                // Icon Animation synced to 600ms
                gsap.to(spans[0], { y: 8, rotate: 45, duration: 0.6, ease: "power4.out" });
                gsap.to(spans[1], { opacity: 0, duration: 0.4 });
                gsap.to(spans[2], { y: -8, rotate: -45, duration: 0.6, ease: "power4.out" });

                // Pure Fade-in (The "Push" is handled by the 600ms CSS height transition)
                gsap.fromTo(mainNav,
                    { opacity: 0 },
                    { opacity: 1, duration: 0.5, ease: "power2.out" }
                );
            });

            mainNav.addEventListener('hide.bs.collapse', () => {
                // Return icon to normal state slightly faster to feel snappier
                gsap.to(spans[0], { y: 0, rotate: 0, duration: 0.5, ease: "power2.inOut" });
                gsap.to(spans[1], { opacity: 1, duration: 0.3 });
                gsap.to(spans[2], { y: 0, rotate: 0, duration: 0.5, ease: "power2.inOut" });
            });
        }

        // Magnetic Button Particles
        const magneticButtons = document.querySelectorAll('.btn-magnetic');
        magneticButtons.forEach(btn => {
            const field = btn.querySelector('.particles-field');
            if (field) {
                for (let i = 0; i < 15; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.setProperty('--x', `${Math.random() * 200 - 100}px`);
                    particle.style.setProperty('--y', `${Math.random() * 200 - 100}px`);
                    particle.style.animation = `particleFloat ${1 + Math.random() * 2}s infinite`;
                    particle.style.left = `${Math.random() * 100}%`;
                    particle.style.top = `${Math.random() * 100}%`;
                    field.appendChild(particle);
                }
            }
        });
    };

    function startTechCycle() {
        const expertiseIcons = document.querySelectorAll('.expertise-carousel i');
        if (expertiseIcons.length > 0) {
            const expertiseTl = gsap.timeline({ repeat: -1 });
            expertiseIcons.forEach((icon) => {
                expertiseTl.to(icon, { opacity: 1, scale: 1, y: 0, display: "block", duration: 0.3, ease: "back.out(1.7)" })
                    .to(icon, { opacity: 0, scale: 0.5, y: -20, display: "none", duration: 0.3, ease: "back.in(1.7)", delay: 1.0 });
            });
        }
    }

    return { init };
})();
