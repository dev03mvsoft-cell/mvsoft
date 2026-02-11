<?php include 'includes/header.php'; ?>

<main>
    <!-- Nexus Services Hero -->
    <section class="section nexus-hero-section py-5 position-relative overflow-hidden d-flex align-items-center justify-content-center" style="min-height: 70vh;">
        <div class="container text-center position-relative z-3 mt-5">
            <div class="hero-content reveal-up">
                <div class="elastic-stage">
                    <div class="elastic-content">
                        <h1 class="elastic-txt">Services</h1>
                    </div>
                </div>

                <h2 class="hero-subheading reveal-up" data-delay="0.6">
                    Elite <strong>Website & App Development</strong> Hub <br>
                    for the <span class="text-primary-gradient">Global Digital Economy.</span>
                </h2>

                <script>
                    window.addEventListener('load', function() {
                        if (typeof SplitText === 'undefined' || typeof gsap === 'undefined') return;
                        const weightInit = 600,
                            weightTarget = 400,
                            weightDiff = weightInit - weightTarget;
                        const stretchInit = 150,
                            stretchTarget = 80,
                            stretchDiff = stretchInit - stretchTarget;
                        const maxYScale = 2.5;
                        let mySplitText = new SplitText('.elastic-txt', {
                            type: "chars",
                            charsClass: "elastic-char"
                        });
                        let chars = document.querySelectorAll('.elastic-char'),
                            txt = document.querySelector('.elastic-txt');
                        let charH = txt.offsetHeight,
                            numChars = chars.length,
                            isMouseDown = false;
                        let mouseInitialY = 0,
                            mouseFinalY = 0,
                            charIndexSelected = 0,
                            elasticDropOff = 0.8,
                            dragYScale = 0;
                        gsap.set(chars, {
                            transformOrigin: 'center bottom'
                        });
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
                        document.body.addEventListener('mousedown', function(e) {
                            if (e.target.classList.contains('elastic-char')) {
                                mouseInitialY = e.clientY;
                                isMouseDown = true;
                                chars.forEach((c, i) => {
                                    if (c === e.target) charIndexSelected = i;
                                });
                            }
                        });
                        document.body.addEventListener('mouseup', function() {
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
                        document.body.addEventListener('mousemove', function(e) {
                            if (isMouseDown) {
                                mouseFinalY = e.clientY;
                                let maxYDragDist = charH * (maxYScale - 1);
                                let distY = mouseInitialY - mouseFinalY;
                                dragYScale = distY / maxYDragDist;
                                if (dragYScale > (maxYScale - 1)) dragYScale = maxYScale - 1;
                                else if (dragYScale < -0.5) dragYScale = -0.5;
                                gsap.to(chars, {
                                    y: (index) => (1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale * -50,
                                    fontWeight: (index) => weightInit - ((1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale * weightDiff),
                                    fontStretch: (index) => stretchInit - ((1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale * stretchDiff),
                                    scaleY: (index) => {
                                        let sY = 1 + ((1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale);
                                        return sY < 0.5 ? 0.5 : sY;
                                    },
                                    ease: "power4",
                                    duration: 0.6
                                });
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </section>

    <!-- Detailed Services Section -->
    <section class="services-grid-section py-5">
        <div class="container py-5">
            <div class="text-center mb-5 reveal-up">
                <span class="section-tag">Our Ecosystem</span>
                <h2 class="display-4 fw-bold text-dark">Propelling <span class="text-primary-gradient">Digital Success</span></h2>
                <p class="lead text-muted">A comprehensive suite of engineering disciplines designed for impact.</p>
            </div>

            <div class="row g-4">
                <!-- Service 1: Web Development -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="nexus-service-card glass-card p-5 h-100 reveal-up shadow-sm">
                        <div class="service-head mb-4">
                            <div class="icon-sq shadow-glow">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h3 class="fw-bold mt-4">Web Systems</h3>
                        </div>
                        <p class="text-muted small mb-4">Building durable, high-performance engines for your digital presence using Next.js and Laravel.</p>
                        <ul class="service-list-minimal mb-4">
                            <li><i class="fas fa-circle-check"></i> Enterprise Architecture</li>
                            <li><i class="fas fa-circle-check"></i> Reactive User Interfaces</li>
                            <li><i class="fas fa-circle-check"></i> Headless CMS Solutions</li>
                        </ul>
                        <a href="web-design" class="nexus-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 2: Mobile Engineering -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="nexus-service-card glass-card p-5 h-100 reveal-up shadow-sm" data-delay="0.1">
                        <div class="service-head mb-4">
                            <div class="icon-sq icon-cyan shadow-glow">
                                <i class="fas fa-mobile-screen-button"></i>
                            </div>
                            <h3 class="fw-bold mt-4">Mobile Engineering</h3>
                        </div>
                        <p class="text-muted small mb-4">Native-performance experiences for iOS & Android built on React Native and Flutter.</p>
                        <ul class="service-list-minimal mb-4">
                            <li><i class="fas fa-circle-check"></i> Cross-Platform Efficiency</li>
                            <li><i class="fas fa-circle-check"></i> Real-time Edge Sync</li>
                            <li><i class="fas fa-circle-check"></i> Biometric Security</li>
                        </ul>
                        <a href="app-development" class="nexus-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 3: UI/UX & Identity -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="nexus-service-card glass-card p-5 h-100 reveal-up shadow-sm" data-delay="0.2">
                        <div class="service-head mb-4">
                            <div class="icon-sq icon-orange shadow-glow">
                                <i class="fas fa-bezier-curve"></i>
                            </div>
                            <h3 class="fw-bold mt-4">UI/UX Strategy</h3>
                        </div>
                        <p class="text-muted small mb-4">Emotional design that prioritizes human interaction and business conversion.</p>
                        <ul class="service-list-minimal mb-4">
                            <li><i class="fas fa-circle-check"></i> Kinetic Design Systems</li>
                            <li><i class="fas fa-circle-check"></i> User Journey Mapping</li>
                            <li><i class="fas fa-circle-check"></i> Accessibility Engineering</li>
                        </ul>
                        <a href="web-design" class="nexus-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 4: 3D Visualization -->
                <div class="col-lg-4 col-md-6">
                    <div class="nexus-service-card glass-card p-5 h-100 reveal-up shadow-sm">
                        <div class="service-head mb-4">
                            <div class="icon-sq icon-green shadow-glow">
                                <i class="fas fa-cube"></i>
                            </div>
                            <h3 class="fw-bold mt-4">3D Web / GLSL</h3>
                        </div>
                        <p class="text-muted small mb-4">Immersive WebGL environments that push the boundaries of browser-based 3D.</p>
                        <ul class="service-list-minimal mb-4">
                            <li><i class="fas fa-circle-check"></i> Custom WebGL Shaders</li>
                            <li><i class="fas fa-circle-check"></i> Interactive Modeling</li>
                            <li><i class="fas fa-circle-check"></i> GPU Optimized UI</li>
                        </ul>
                        <a href="web-design" class="nexus-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 5: Scaling & Cloud -->
                <div class="col-lg-4 col-md-6">
                    <div class="nexus-service-card glass-card p-5 h-100 reveal-up shadow-sm" data-delay="0.1">
                        <div class="service-head mb-4">
                            <div class="icon-sq icon-purple shadow-glow">
                                <i class="fas fa-cloud-bolt"></i>
                            </div>
                            <h3 class="fw-bold mt-4">Scaling & Cloud</h3>
                        </div>
                        <p class="text-muted small mb-4">Zero-downtime infrastructure and multi-region database architectures.</p>
                        <ul class="service-list-minimal mb-4">
                            <li><i class="fas fa-circle-check"></i> AWS / Azure Serverless</li>
                            <li><i class="fas fa-circle-check"></i> CI/CD Pipeline Automation</li>
                            <li><i class="fas fa-circle-check"></i> Data Sovereignty</li>
                        </ul>
                        <a href="backend-solutions" class="nexus-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 6: Digital Growth -->
                <div class="col-lg-4 col-md-6">
                    <div class="nexus-service-card glass-card p-5 h-100 reveal-up shadow-sm" data-delay="0.2">
                        <div class="service-head mb-4">
                            <div class="icon-sq icon-yellow shadow-glow">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h3 class="fw-bold mt-4">Digital Growth</h3>
                        </div>
                        <p class="text-muted small mb-4">Technical SEO and growth analytics built into the codebase from day one.</p>
                        <ul class="service-list-minimal mb-4">
                            <li><i class="fas fa-circle-check"></i> Cognitive SEO Strategies</li>
                            <li><i class="fas fa-circle-check"></i> Conversion Lifecycle</li>
                            <li><i class="fas fa-circle-check"></i> Logic-driven Marketing</li>
                        </ul>
                        <a href="seo-optimization" class="nexus-link">Explore Service <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us (Strategic Section) -->
    <section class="py-5 position-relative">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="reveal-up">
                        <span class="section-tag">Our Methodology</span>
                        <h2 class="display-5 fw-bold text-dark mb-4">Engineering for <span class="text-primary-gradient">Longevity.</span></h2>
                        <p class="text-muted lead mb-5">We bridge the gap between aesthetic brilliance and technical stability. Your vision deserves a foundation that won't break under pressure.</p>

                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div class="strategic-item reveal-up">
                                    <div class="icon-pill mb-3"><i class="fas fa-bolt"></i></div>
                                    <h5 class="fw-bold">Radical Velocity</h5>
                                    <p class="text-muted small">Accelerated development cycles without compromising on stability.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="strategic-item reveal-up" data-delay="0.1">
                                    <div class="icon-pill mb-3"><i class="fas fa-shield-halved"></i></div>
                                    <h5 class="fw-bold">Secured Logic</h5>
                                    <p class="text-muted small">Encryption and threat-modeling integrated at every stage.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="strategic-item reveal-up" data-delay="0.2">
                                    <div class="icon-pill mb-3"><i class="fas fa-shuffle"></i></div>
                                    <h5 class="fw-bold">Scalable Depth</h5>
                                    <p class="text-muted small">Decoupled architecture designed for 10x growth.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="strategic-item reveal-up" data-delay="0.3">
                                    <div class="icon-pill mb-3"><i class="fas fa-headset"></i></div>
                                    <h5 class="fw-bold">Elite Support</h5>
                                    <p class="text-muted small">Dedicated engineering collective at your disposal.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Image with decorative elements -->
                <div class="col-lg-6">
                    <div class="image-showcase reveal-up pl-lg-5 position-relative">
                        <div class="blob-bg"></div>
                        <img src="assets/img/office/mvsoftoff11.jpg" class="img-fluid rounded-5 shadow-lg position-relative z-2" alt="MVsoftStrategy Hub">
                        <div class="stat-floating-card glass-card p-3 shadow-glow reveal-up" data-delay="0.5">
                            <span class="d-block fw-bold text-primary fs-4">500+</span>
                            <span class="text-muted small uppercase fw-bold">Active Projects</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5 bg-dark position-relative overflow-hidden">
        <div class="container py-5 text-center position-relative z-2">
            <div class="reveal-up mb-5">
                <span class="section-tag text-white-50">Launch Strategy</span>
                <h2 class="display-4 fw-bold text-white mb-4">Ready to scale your <span class="text-primary-gradient">impact?</span></h2>
                <p class="lead text-white-50 mb-5 mx-auto" style="max-width: 700px;">Join 500+ successful partners and let's engineer something extraordinary together.</p>
                <div class="d-flex justify-content-center">
                    <a href="contact" class="btn btn-nexus-primary btn-magnetic px-5 py-3">
                        <span>Get Started <i class="fas fa-arrow-right ms-2"></i></span>
                        <div class="particles-field"></div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative bg effect -->
        <div class="bg-glow" style="opacity: 0.15; transform: scale(3);"></div>
    </section>
</main>

<style>
    /* Nexus Service Cards */
    .nexus-service-card {
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(26, 56, 127, 0.1) !important;
    }

    .nexus-service-card:hover {
        transform: translateY(-15px);
        border-color: #1a387f !important;
        background: white !important;
        box-shadow: 0 40px 80px rgba(26, 56, 127, 0.12) !important;
    }

    .icon-sq {
        width: 60px;
        height: 60px;
        background: #1a387f;
        color: white;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .icon-cyan {
        background: #00d2ff;
    }

    .icon-orange {
        background: #ff5e3a;
    }

    .icon-green {
        background: #88ce02;
    }

    .icon-purple {
        background: #777bb4;
    }

    .icon-yellow {
        background: #f7df1e;
        color: #333;
    }

    .service-list-minimal {
        list-style: none;
        padding: 0;
    }

    .service-list-minimal li {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .service-list-minimal li i {
        color: #1a387f;
        font-size: 0.75rem;
    }

    .nexus-link {
        color: #1a387f;
        font-weight: 700;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .nexus-link:hover {
        letter-spacing: 0.5px;
        color: #003aaf;
    }

    /* Strategic Items */
    .icon-pill {
        width: 45px;
        height: 45px;
        background: rgba(26, 56, 127, 0.05);
        color: #1a387f;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    /* Image Showcase & Decorative UI */
    .image-showcase .blob-bg {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 120%;
        height: 120%;
        background: radial-gradient(circle, rgba(26, 56, 127, 0.05) 0%, transparent 70%);
        z-index: 1;
    }

    .stat-floating-card {
        position: absolute;
        bottom: -30px;
        left: -30px;
        z-index: 3;
        min-width: 180px;
        text-align: center;
        border: 1px solid rgba(26, 56, 127, 0.1) !important;
    }

    .uppercase {
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .text-primary-gradient {
        background: linear-gradient(45deg, #1a387f, #003aaf);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .shadow-glow {
        box-shadow: 0 10px 30px rgba(26, 56, 127, 0.2);
    }
</style>

<?php include 'includes/footer.php'; ?>