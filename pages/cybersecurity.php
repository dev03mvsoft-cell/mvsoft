<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Digital Protection</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Bank-Grade <br><span class="text-primary-gradient">Cybersecurity</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        Protect your assets and data with military-grade encryption and 24/7 threat monitoring. We build digital fortresses.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Secure My Assets</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="assets/img/office/mvsoftoff23.jpg" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Cybersecurity">
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
                        <h2 class="fw-bold text-dark mb-4">Total <br>Safety</h2>
                        <p class="text-muted">In an era of rising threats, your security is non-negotiable. We provide peace of mind through technology.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">ZERO</h4>
                                <p class="small text-muted">Successful Breaches</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">24/7</h4>
                                <p class="small text-muted">Active Shield</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-shield-virus text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Vulnerability Audit</h4>
                                <p class="text-muted small">Comprehensive penetration testing to identify and patch security holes before they can be exploited.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-user-shield text-primary fs-3"></i></div>
                                <h4 class="fw-bold">EDR & MDR</h4>
                                <p class="text-muted small">Endpoint Detection and Response systems that monitor every device in your network for suspicious activity.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-file-invoice text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Compliance</h4>
                                <p class="text-muted small">Ensuring your systems meet ISO 27001, GDPR, and SOC2 standards for data handling and privacy.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-lock text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Encryption</h4>
                                <p class="text-muted small">AES-256 and SSL/TLS implementations to ensure your data is unreadable to anyone but authorized users.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Proactive Defense</h3>
                        <p class="text-muted">Security is a moving target. Our team stays ahead of the latest attack vectors and zero-day exploits to ensure your business remains resilient. We combine advanced AI-driven monitoring with human expertise to provide a layered defense strategy that covers your network, your applications, and your people.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Unsure About Your Security?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Get a free security audit and identify your risks today.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Free Security Audit</a>
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