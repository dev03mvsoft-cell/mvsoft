<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Cloud Infrastructure</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Enterprise-Grade <br><span class="text-primary-gradient">Cloud Hosting</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        Zero downtime. Infinite scalability. We host your digital assets on the world's most reliable cloud networks.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Deploy My Site</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="assets/img/office/mvsoftoff22.jpg" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Cloud Hosting">
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
                        <h2 class="fw-bold text-dark mb-4">Scalable <br>Power</h2>
                        <p class="text-muted">Hosting is the heartbeat of your digital presence. We ensure yours is strong and steady.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">99.99%</h4>
                                <p class="small text-muted">SLA Guarantee</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">Global</h4>
                                <p class="small text-muted">CDN Delivery</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-server text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Managed AWS/Azure</h4>
                                <p class="text-muted small">Expert management of industry-leading cloud providers, optimized for your specific traffic patterns.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-expand-arrows-alt text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Auto-Scaling</h4>
                                <p class="text-muted small">Your infrastructure grows with your traffic, ensuring performance during peaks and cost-efficiency during lulls.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-hdd text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Daily Backups</h4>
                                <p class="text-muted small">Automated snapshots and off-site backups to ensure your data is always safe and recoverable.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-globe-americas text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Edge Computing</h4>
                                <p class="text-muted small">Delivery of content closer to your users for sub-millisecond load times anywhere in the world.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Seamless Reliability</h3>
                        <p class="text-muted">We leverage technologies like Docker, Kubernetes, and Terraform to build "infrastructure as code." This ensures that your environment is reproducible, secure, and ready for the future. From static sites to complex web applications, our hosting solutions are built for speed and reliability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Ready for a Better Host?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Move to a reliable cloud infrastructure today.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Request a Hosting Quote</a>
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