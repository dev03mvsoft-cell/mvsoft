<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Growth Engineering</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Full-Funnel <br><span class="text-primary-gradient">Digital Marketing</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        Beyond clicks and impressions. We build data-driven marketing ecosystems that deliver measurable business growth.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Start Growing</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1533750349088-cd871a92f312?q=80&w=2070" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Digital Marketing">
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
                        <h2 class="fw-bold text-dark mb-4">Growth <br>Focused</h2>
                        <p class="text-muted">Marketing is an investment, not an expense. We ensure every dollar spent brings a return.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">10X</h4>
                                <p class="small text-muted">Average ROI</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">24/7</h4>
                                <p class="small text-muted">Active Monitoring</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-bullhorn text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Performance Ads</h4>
                                <p class="text-muted small">High-converting Meta, Google, and LinkedIn ad campaigns optimized for CPA (Cost Per Acquisition).</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-users text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Social Strategy</h4>
                                <p class="text-muted small">Building community and authority through strategic content and engagement on key platforms.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-funnel-dollar text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Conversion Rate</h4>
                                <p class="text-muted small">A/B testing and landing page optimization (LPO) to turn more traffic into sales.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-chart-pie text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Data Attribution</h4>
                                <p class="text-muted small">Advanced tracking to understand the customer journey across all touchpoints.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Strategic Marketing</h3>
                        <p class="text-muted">In a crowded digital world, standing out requires more than just high bids. We focus on storytelling, audience segmentation, and personalized messaging to build a bridge between your brand and its ideal customers. Our approach is holistic, ensuring that marketing aligns perfectly with your product and sales goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Need More Leads?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Let's build a marketing engine that generates results while you sleep.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Get a Marketing Plan</a>
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