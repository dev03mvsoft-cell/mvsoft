<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Enterprise Architecture</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Robust & Scalable <br><span class="text-primary-gradient">Backend Solutions</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        The power behind your digital vision. We build secure, high-traffic API infrastructures that never compromise on speed.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Build My Infrastructure</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc51?q=80&w=2070" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Backend Solutions">
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
                        <h2 class="fw-bold text-dark mb-4">Core <br>Engineering</h2>
                        <p class="text-muted">Stability is our priority. We design backend systems that handle millions of requests without breaking a sweat.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">99.9%</h4>
                                <p class="small text-muted">Uptime Record</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">
                                    <100ms< /h4>
                                        <p class="small text-muted">API Latency</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-project-diagram text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Microservices</h4>
                                <p class="text-muted small">Modular architectures that allow independent scaling and deployment of services.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-shield-alt text-primary fs-3"></i></div>
                                <h4 class="fw-bold">High Security</h4>
                                <p class="text-muted small">Advanced encryption, JWT authentication, and SQL injection protection by default.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-database text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Relational & NoSQL</h4>
                                <p class="text-muted small">Optimized database design using MySQL, PostgreSQL, and Redis for high-speed caching.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-plug text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Third-party APIs</h4>
                                <p class="text-muted small">Seamless integration with payment gateways, CRMs, and logistics platforms.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Backend Mastery</h3>
                        <p class="text-muted">We specialize in PHP (Laravel), Node.js, and Python. Whether you need a simple REST API or a complex distributed system, we ensure that your backend is a solid foundation for your front-end and mobile applications. Our systems are built with performance monitoring and error logging out of the box.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Need a Scalable Engine?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Let us architect your next enterprise-grade backend.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Talk to an Architect</a>
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