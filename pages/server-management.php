<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Systems Operations</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Proactive <br><span class="text-primary-gradient">Server Management</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        Focus on your business while we handle your infrastructure. Expert Linux/Windows server management with 24/7 oversight.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Manage My Servers</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="assets/img/office/mvsoftoff24.jpg" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Server Management">
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5 bg-light position-relative" style="z-index: 11;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 position-relative" style="z-index: 11;">
                    <div class="sticky-top" style="top: 100px;">
                        <h2 class="fw-bold text-dark mb-4">Total <br>Oversight</h2>
                        <p class="text-muted">Managed infrastructure means optimized performance and lower operational costs. We be your Devops team.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">24/7</h4>
                                <p class="small text-muted">Active Monitoring</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">
                                    <15min< /h4>
                                        <p class="small text-muted">Response Time</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-tools text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Patch Management</h4>
                                <p class="text-muted small">Regular software updates and security patches to ensure your OS and applications are stable and secure.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-chart-bar text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Performance Tuning</h4>
                                <p class="text-muted small">Deep optimization of web servers (Nginx/Apache), databases, and PHP to squeeze every bit of speed out of your hardware.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-terminal text-primary fs-3"></i></div>
                                <h4 class="fw-bold">SSH & Resource Control</h4>
                                <p class="text-muted small">Expert Linux administration including user management, firewall configuration, and resource monitoring.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-heartbeat text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Proactive Monitoring</h4>
                                <p class="text-muted small">Instant alerts on resource spikes or service failures, with automated remediation where possible.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Managed DevOps</h3>
                        <p class="text-muted">We handle the complexity of the command line so you don't have to. From initial server hardening to setting up CI/CD pipelines, our team ensures that your hosting environment is always in top shape. We specialize in Ubuntu, CentOS, and Debian environments, as well as Windows Server management for specific enterprise needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Ready to Offload Your DevOps?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Let us manage your servers while you manage your business.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Get a Managed Service Plan</a>
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