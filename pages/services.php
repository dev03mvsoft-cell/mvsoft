<?php include 'includes/header.php'; ?>

<main>
    <!-- Services Hero Section -->
    <section class="services-hero position-relative overflow-hidden py-5 d-flex align-items-center bg-white" style="min-height: 60vh;">
        <!-- Background Decoration -->
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-05 pointer-events-none">
            <svg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" class="w-100 h-100">
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:rgba(26, 56, 127, 0.05);stop-opacity:1" />
                        <stop offset="100%" style="stop-color:rgba(0, 58, 175, 0.02);stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path fill="url(#grad1)" d="M0,1000 C300,800 400,900 700,600 C900,400 1000,500 1000,0 L1000,1000 Z" />
            </svg>
        </div>

        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">What We Do</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 split-text reveal-up">Empowering Businesses with <br><span class="text-primary-gradient">Digital Excellence</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        From immersive 3D web experiences to enterprise-grade backend solutions, we provide the technical muscle to scale your vision.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Start a Project</a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="services-hero-visual reveal-up" data-delay="0.3">
                        <div id="services-canvas-container" style="height: 400px; width: 100%;"></div>
                    </div>
                </div>
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
                        <ul class="service-features list-unstyled">
                            <li><i class="fas fa-check text-primary"></i> Reactive UI components</li>
                            <li><i class="fas fa-check text-primary"></i> Server-side rendering (SSR)</li>
                            <li><i class="fas fa-check text-primary"></i> Technical SEO optimized</li>
                        </ul>
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
                        <ul class="service-features list-unstyled">
                            <li><i class="fas fa-check text-primary"></i> Single codebase efficiency</li>
                            <li><i class="fas fa-check text-primary"></i> Real-time sync features</li>
                            <li><i class="fas fa-check text-primary"></i> App Store Optimization (ASO)</li>
                        </ul>
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
                        <ul class="service-features list-unstyled">
                            <li><i class="fas fa-check text-primary"></i> Interactive prototyping</li>
                            <li><i class="fas fa-check text-primary"></i> Brand identity systems</li>
                            <li><i class="fas fa-check text-primary"></i> Accessibility audits</li>
                        </ul>
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
                        <ul class="service-features list-unstyled">
                            <li><i class="fas fa-check text-primary"></i> Custom WebGL shaders</li>
                            <li><i class="fas fa-check text-primary"></i> Interactive 3D models</li>
                            <li><i class="fas fa-check text-primary"></i> High-performance execution</li>
                        </ul>
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
                        <ul class="service-features list-unstyled">
                            <li><i class="fas fa-check text-primary"></i> Laravel / Node.js ecosystems</li>
                            <li><i class="fas fa-check text-primary"></i> Robust API development</li>
                            <li><i class="fas fa-check text-primary"></i> Cloud infrastructure setup</li>
                        </ul>
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
                        <ul class="service-features list-unstyled">
                            <li><i class="fas fa-check text-primary"></i> Global SEO strategies</li>
                            <li><i class="fas fa-check text-primary"></i> Growth analytics setup</li>
                            <li><i class="fas fa-check text-primary"></i> Performance monitoring</li>
                        </ul>
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
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?q=80&w=2070" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Team Work">
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