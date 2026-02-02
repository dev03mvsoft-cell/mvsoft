<?php include 'includes/header.php'; ?>

<main>
    <!-- About Hero -->
    <section class="about-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Our Story</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Defining the Future of <br><span class="text-primary-gradient">Digital Engineering</span></h1>
                    <p class="lead text-muted mb-5 reveal-up">
                        Mvsoft Tech Solutions is more than a development agency. We are a collective of creators, engineers, and strategists dedicated to building the digital infrastructure of tomorrow.
                    </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="about-hero-img position-relative reveal-up">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070" class="img-fluid rounded-4 shadow-lg" alt="Team Work">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mission-card p-5 bg-white rounded-5 h-100 shadow-sm reveal-up">
                        <div class="icon mb-4"><i class="fas fa-rocket text-primary fs-1"></i></div>
                        <h2 class="fw-bold mb-3">Our Mission</h2>
                        <p class="text-muted">To empower businesses through high-performance technology that enhances human capability and drives sustainable growth.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission-card p-5 bg-white rounded-5 h-100 shadow-sm reveal-up" data-delay="0.1">
                        <div class="icon mb-4"><i class="fas fa-eye text-primary fs-1"></i></div>
                        <h2 class="fw-bold mb-3">Our Vision</h2>
                        <p class="text-muted">To be the global benchmark for digital excellence, where innovation meets integrity in every line of code we write.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="section-tag reveal-up">Our Values</span>
                <h2 class="display-4 fw-bold text-dark reveal-up">The Principles We Live By</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-item text-center p-4 reveal-up">
                        <div class="value-icon mb-3"><i class="fas fa-heart text-primary fs-2"></i></div>
                        <h4 class="fw-bold">Value First</h4>
                        <p class="text-muted small">We prioritize business outcomes over vanity metrics, ensuring every project delivers tangible ROI.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-item text-center p-4 reveal-up" data-delay="0.1">
                        <div class="value-icon mb-3"><i class="fas fa-shield-alt text-primary fs-2"></i></div>
                        <h4 class="fw-bold">Clean & Secure</h4>
                        <p class="text-muted small">Security and maintainability are built into our DNA, not added as afterthoughts.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-item text-center p-4 reveal-up" data-delay="0.2">
                        <div class="value-icon mb-3"><i class="fas fa-users text-primary fs-2"></i></div>
                        <h4 class="fw-bold">Human Centric</h4>
                        <p class="text-muted small">Technology should serve people. We focus on accessibility and emotional engagement in everything we build.</p>
                    </div>
                </div>
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

    .mission-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .mission-card:hover {
        transform: translateY(-10px);
    }

    .value-item:hover .value-icon i {
        transform: scale(1.2);
        transition: transform 0.3s ease;
    }
</style>

<?php include 'includes/footer.php'; ?>