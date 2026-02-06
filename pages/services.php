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
                    Enterprise-grade solutions for the <br>
                    <span class="text-primary-gradient">modern digital economy.</span>
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
    <section class="services-grid-section py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="section-tag reveal-up">Our Expertise</span>
                <h2 class="display-4 fw-bold text-dark reveal-up">Core Technical Solutions</h2>
                <p class="lead text-muted reveal-up">Precision engineering meets creative digital design.</p>
            </div>

            <div class="row g-4">
                <!-- Service 1: Web Development -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-detail-card reveal-up h-100">
                        <div class="card-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3>Web Development</h3>
                        <p>High-performance websites built with modern stacks like TALL (Tailwind, Alpine, Laravel, Livewire) and MERN.</p>
                        <ul class="service-features list-unstyled mb-4">
                            <li><i class="fas fa-check text-primary"></i> Reactive UI components</li>
                            <li><i class="fas fa-check text-primary"></i> Server-side rendering (SSR)</li>
                            <li><i class="fas fa-check text-primary"></i> Technical SEO optimized</li>
                        </ul>
                        <a href="web-design" class="btn btn-outline-primary btn-sm rounded-pill px-3">Learn More</a>
                    </div>
                </div>

                <!-- Service 2: Mobile Apps -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-detail-card reveal-up h-100" data-delay="0.1">
                        <div class="card-icon" style="background: rgba(97, 218, 251, 0.1); color: #61DAFB;">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobile Applications</h3>
                        <p>Cross-platform mobile solutions using React Native and Flutter for native-level performance on iOS & Android.</p>
                        <ul class="service-features list-unstyled mb-4">
                            <li><i class="fas fa-check text-primary"></i> Single codebase efficiency</li>
                            <li><i class="fas fa-check text-primary"></i> Real-time sync features</li>
                            <li><i class="fas fa-check text-primary"></i> App Store Optimization (ASO)</li>
                        </ul>
                        <a href="app-development" class="btn btn-outline-primary btn-sm rounded-pill px-3">Learn More</a>
                    </div>
                </div>

                <!-- Service 3: UI/UX Design -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-detail-card reveal-up h-100" data-delay="0.2">
                        <div class="card-icon" style="background: rgba(255, 114, 94, 0.1); color: #ff725e;">
                            <i class="fas fa-bezier-curve"></i>
                        </div>
                        <h3>UI/UX Design</h3>
                        <p>User-centric design thinking that prioritizes accessibility, conversion, and emotional engagement.</p>
                        <ul class="service-features list-unstyled mb-4">
                            <li><i class="fas fa-check text-primary"></i> Interactive prototyping</li>
                            <li><i class="fas fa-check text-primary"></i> Brand identity systems</li>
                            <li><i class="fas fa-check text-primary"></i> Accessibility audits</li>
                        </ul>
                        <a href="web-design" class="btn btn-outline-primary btn-sm rounded-pill px-3">Learn More</a>
                    </div>
                </div>

                <!-- Service 4: 3D Web Experiences -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-detail-card reveal-up h-100">
                        <div class="card-icon" style="background: rgba(136, 206, 2, 0.1); color: #88ce02;">
                            <i class="fas fa-cube"></i>
                        </div>
                        <h3>3D Web & WebGL</h3>
                        <p>Immersive 3D environments and product configurators using Three.js and GSAP for the "WOW" factor.</p>
                        <ul class="service-features list-unstyled mb-4">
                            <li><i class="fas fa-check text-primary"></i> Custom WebGL shaders</li>
                            <li><i class="fas fa-check text-primary"></i> Interactive 3D models</li>
                            <li><i class="fas fa-check text-primary"></i> High-performance execution</li>
                        </ul>
                        <a href="web-design" class="btn btn-outline-primary btn-sm rounded-pill px-3">Learn More</a>
                    </div>
                </div>

                <!-- Service 5: Backend & Architecture -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-detail-card reveal-up h-100" data-delay="0.1">
                        <div class="card-icon" style="background: rgba(119, 123, 180, 0.1); color: #777bb4;">
                            <i class="fas fa-server"></i>
                        </div>
                        <h3>Backend Solutions</h3>
                        <p>Scalable API architectures and database management systems built for security and enterprise growth.</p>
                        <ul class="service-features list-unstyled mb-4">
                            <li><i class="fas fa-check text-primary"></i> Laravel / Node.js ecosystems</li>
                            <li><i class="fas fa-check text-primary"></i> Robust API development</li>
                            <li><i class="fas fa-check text-primary"></i> Cloud infrastructure setup</li>
                        </ul>
                        <a href="backend-solutions" class="btn btn-outline-primary btn-sm rounded-pill px-3">Learn More</a>
                    </div>
                </div>

                <!-- Service 6: SEO & Digital Marketing -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-detail-card reveal-up h-100" data-delay="0.2">
                        <div class="card-icon" style="background: rgba(247, 223, 30, 0.1); color: #f7df1e;">
                            <i class="fas fa-search-dollar"></i>
                        </div>
                        <h3>Digital Growth</h3>
                        <p>Merging technical excellence with marketing strategies to ensure your business ranks and converts.</p>
                        <ul class="service-features list-unstyled mb-4">
                            <li><i class="fas fa-check text-primary"></i> Global SEO strategies</li>
                            <li><i class="fas fa-check text-primary"></i> Growth analytics setup</li>
                            <li><i class="fas fa-check text-primary"></i> Performance monitoring</li>
                        </ul>
                        <a href="seo-optimization" class="btn btn-outline-primary btn-sm rounded-pill px-3">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why-us-section py-5 bg-white overflow-hidden">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="position-relative">
                        <div class="reveal-up">
                            <span class="section-tag">Methodology</span>
                            <h2 class="display-4 fw-bold text-dark mb-4">Why Businesses Trust <br>Mvsoft</h2>
                            <p class="text-muted lead mb-4">We don't just write code; we build business solutions that are designed to last and scale.</p>
                        </div>
                        <div class="row g-4 mt-2">
                            <div class="col-sm-6">
                                <div class="benefit-item reveal-up">
                                    <div class="benefit-icon"><i class="fas fa-bolt"></i></div>
                                    <h5>Extreme Speed</h5>
                                    <p class="small text-muted">Optimized for sub-second load times.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="benefit-item reveal-up" data-delay="0.1">
                                    <div class="benefit-icon"><i class="fas fa-shield-alt"></i></div>
                                    <h5>Military Security</h5>
                                    <p class="small text-muted">Bank-grade encryption by default.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="benefit-item reveal-up" data-delay="0.2">
                                    <div class="benefit-icon"><i class="fas fa-layer-group"></i></div>
                                    <h5>Modular Tech</h5>
                                    <p class="small text-muted">Scalable microservices architecture.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="benefit-item reveal-up" data-delay="0.3">
                                    <div class="benefit-icon"><i class="fas fa-headset"></i></div>
                                    <h5>24/7 Support</h5>
                                    <p class="small text-muted">Priority assistance for partners.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-stack position-relative pl-lg-5">
                        <img src="assets/img/office/mvsoftoff11.jpg" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Mvsoft Team and Workspace">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="services-cta py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Ready to Scale Your Digital Impact?</h2>
            <p class="lead text-white-50 mb-5 reveal-up" style="max-width: 700px; margin: 0 auto;">Join 500+ successful projects and let's build something extraordinary together.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold">Get Started Now</a>
            </div>
        </div>
    </section>
</main>

<style>
    /* Service Detail Cards Style */
    .service-detail-card {
        background: #fff;
        border-radius: 24px;
        padding: 45px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .service-detail-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(0, 58, 175, 0.1);
        border-color: rgba(26, 56, 127, 0.15);
    }

    .card-icon {
        width: 70px;
        height: 70px;
        background: rgba(26, 56, 127, 0.05);
        color: #1a387f;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 25px;
        transition: all 0.4s ease;
    }

    .service-detail-card:hover .card-icon {
        transform: rotateY(180deg);
    }

    .service-detail-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #111;
    }

    .service-detail-card p {
        color: #666;
        margin-bottom: 25px;
        line-height: 1.7;
    }

    .service-features li {
        margin-bottom: 10px;
        font-size: 0.95rem;
        color: #555;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Benefit Items */
    .benefit-item {
        margin-bottom: 20px;
    }

    .benefit-icon {
        width: 45px;
        height: 45px;
        background: rgba(26, 56, 127, 0.05);
        color: #1a387f;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        font-size: 1.2rem;
    }

    .benefit-item h5 {
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 1.1rem;
    }

    .text-primary-gradient {
        background: linear-gradient(45deg, #1a387f, #003aaf);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<?php include 'includes/footer.php'; ?>