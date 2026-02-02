<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Retention Marketing</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">High-Impact <br><span class="text-primary-gradient">Email Campaigns</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        Build direct relationships. Our automated email strategies nurture leads and turn one-time buyers into lifetime fans.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Start Campaigning</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1557200134-90327ee9fafa?q=80&w=2070" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Email Campaigns">
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
                        <h2 class="fw-bold text-dark mb-4">Direct <br>Channel</h2>
                        <p class="text-muted">Email remains the highest ROI channel in digital marketing. We help you unlock its full potential.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">40%</h4>
                                <p class="small text-muted">Open Rate Average</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">5X</h4>
                                <p class="small text-muted">Repeat Purchases</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-magic text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Marketing Automation</h4>
                                <p class="text-muted small">Welcome flows, abandoned cart sequences, and re-engagement campaigns that run on autopilot.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-vial text-primary fs-3"></i></div>
                                <h4 class="fw-bold">A/B Testing</h4>
                                <p class="text-muted small">Optimizing subject lines, body copy, and send times to maximize engagement and CTR.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-user-tag text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Segmentation</h4>
                                <p class="text-muted small">Personalizing content based on user behavior and demographics to deliver high relevance.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-shield-alt text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Deliverability</h4>
                                <p class="text-muted small">Expert management of sender reputation and technical setup to stay out of the spam folder.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Personalized Communication</h3>
                        <p class="text-muted">An email list is an asset you own. We focus on building high-quality lists and nurturing them with value-first content. Our email designs are fully responsive and optimized for darkness and accessibility, ensuring they look great in every inbox.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Ready to Connect with Your Audience?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Let's build an email strategy that drives real revenue.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Free Email Audit</a>
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