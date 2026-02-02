<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Digital Visibility</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Mastering the <br><span class="text-primary-gradient">Search Ecosystem</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        Data-driven SEO strategies that dominate rankings and drive organic growth for your brand globally.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Audit My Site</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2426" class="img-fluid rounded-4 shadow-lg reveal-up" alt="SEO Optimization">
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
                        <h2 class="fw-bold text-dark mb-4">Search <br>Authority</h2>
                        <p class="text-muted">Rank higher, convert faster. We merge technical code optimization with high-impact content strategy.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">300%</h4>
                                <p class="small text-muted">Traffic Increase</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">#1</h4>
                                <p class="small text-muted">Page Ranking</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-search text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Technical SEO</h4>
                                <p class="text-muted small">Optimizing site architecture, Core Web Vitals, and XML sitemaps for maximum crawlability.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-keyboard text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Keyword Intelligence</h4>
                                <p class="text-muted small">Deep analysis of customer search intent to target high-conversion, low-competition terms.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-link text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Link Acquisition</h4>
                                <p class="text-muted small">Building high-authority backlink profiles that establish your domain as a leader in your industry.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-chart-line text-primary fs-3"></i></div>
                                <h4 class="fw-bold">ROI Analytics</h4>
                                <p class="text-muted small">Full-funnel tracking to ensure every search visitor translates into bottom-line growth.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Our SEO Ethos</h3>
                        <p class="text-muted">SEO is not about gaming the system; it's about providing the best possible result for the user's query. At Mvsoft, we combine this philosophy with deep technical expertise in SSR (Server Side Rendering) and Meta-tag optimization to ensure search engines love your site as much as your customers do.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Ready to Dominate Rankings?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Let's build a strategy that puts you at the top of the search results.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Get a SEO Analysis</a>
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