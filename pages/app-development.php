<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 50vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Mobile Engineering</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Enterprise-Grade <br><span class="text-primary-gradient">App Development</span></h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 600px;">
                        Scalable mobile solutions for iOS and Android built with Flutter and React Native for native-level performance.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Build Your App</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=2070" class="img-fluid rounded-4 shadow-lg reveal-up" alt="App Development">
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
                        <h2 class="fw-bold text-dark mb-4">Mobile <br>Innovation</h2>
                        <p class="text-muted">We don't just build apps; we build business tools that live in your customers' pockets.</p>
                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">60FPS</h4>
                                <p class="small text-muted">Smooth Performance</p>
                            </div>
                            <div class="stat-item mb-4">
                                <h4 class="fw-bold text-primary mb-0">Offline</h4>
                                <p class="small text-muted">Always Available</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up">
                                <div class="icon mb-3"><i class="fas fa-layer-group text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Cross-Platform</h4>
                                <p class="text-muted small">Single codebase for iOS and Android, reducing development costs by 50% without quality loss.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.1">
                                <div class="icon mb-3"><i class="fas fa-tachometer-alt text-primary fs-3"></i></div>
                                <h4 class="fw-bold">High Performance</h4>
                                <p class="text-muted small">C++ and Rust powered bridges ensure near-native speeds and fluid animations.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.2">
                                <div class="icon mb-3"><i class="fas fa-lock text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Biometric Security</h4>
                                <p class="text-muted small">FaceID and Fingerprint integration for banking-grade security on your platform.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box p-4 bg-white rounded-4 shadow-sm h-100 reveal-up" data-delay="0.3">
                                <div class="icon mb-3"><i class="fas fa-sync text-primary fs-3"></i></div>
                                <h4 class="fw-bold">Real-time Sync</h4>
                                <p class="text-muted small">Instant data synchronization across devices using Firebase and custom WebSockets.</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-text mt-5 reveal-up">
                        <h3 class="fw-bold mb-4">Technical Stack</h3>
                        <p class="text-muted">Our mobile team specializes in React Native, Flutter, and Swift/Kotlin. We follow Clean Architecture principles to ensure that your app is maintainable and scalable as your user base grows. Every build undergoes rigorous automated testing and CI/CD pipelines before reaching the App Store or Play Store.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5" style="background: #1a387f;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4 reveal-up">Ready to Go Mobile?</h2>
            <p class="lead text-white-50 mb-5 reveal-up">Let's discuss your app idea and build a prototype.</p>
            <div class="reveal-up">
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Get a Quote</a>
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