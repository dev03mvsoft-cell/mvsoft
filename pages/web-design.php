<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">UI/UX & Creative</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Web Design & <br><span class="text-primary-gradient">Visual Storytelling</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        We create immersive, high-conversion web designs that blend aesthetic brilliance with technical precision.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Start Designing</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1586717791821-3f44a563eb4c?q=80&w=2070" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Web Design">
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px;">
                        <h2 class="fw-bold text-dark mb-4">Design for <br>Impact</h2>
                        <p class="text-muted">In the digital first world, your website is your strongest brand asset. We ensure it's unforgettable.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">99%</h4>
                                <p class="small text-muted">User Satisfaction</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">50%</h4>
                                <p class="small text-muted">Increase in Conversions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-pencil-ruler text-primary fs-3"></i></div>
                                <h4 class="fw-bold">User Centric UX</h4>
                                <p class="text-muted small">Deep research into user behavior to create intuitive navigation and seamless flows.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-mobile-alt text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Responsive First</h4>
                                <p class="text-muted small">Pixel perfect layouts that adapt beautifully to every screen size and device.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-bolt text-primary fs-3"></i></div>
                                <h4 class="fw-bold">High Performance</h4>
                                <p class="text-muted small">Optimized assets and clean design systems for lightning fast load times.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-palette text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Brand Identity</h4>
                                <p class="text-muted small">Integrating your brand DNA into every pixel for consistent digital presence.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Our Creative Process</h3>
                        <p class="text-muted">Our design philosophy is rooted in data and driven by creativity. We start by understanding your audience, then we craft wireframes that solve their problems. Once the foundation is solid, our designers bring it to life with high-fidelity mockups, custom illustrations, and smooth animations that guide the user's eye exactly where it needs to go.</p>
                        <p class="text-muted">We don't just build sites; we build experiences that convert visitors into loyal customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Have a Design Vision?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Let's turn your ideas into a stunning digital reality.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Free Design Consultation</a>
            </div>
        </div>
    </section>
</main>

<style>
    .text-primary-gradient {
        background: linear-gradient(45deg, #1a387f, #003aaf);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .feature-box {
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .feature-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05) !important;
    }
</style>

<?php include 'includes/footer.php'; ?>