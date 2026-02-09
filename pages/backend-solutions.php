<?php include 'includes/header.php'; ?>

<main>
    <!-- Service Hero -->
    <section class="service-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 60vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Expert PHP Development</span>
                    <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Elite <span class="text-primary-gradient">PHP & Laravel</span> Architecture</h1>
                    <p class="lead text-muted mb-5 reveal-up" style="max-width: 650px;">
                        Mvsoft is a specialized <strong>PHP development agency in Gujarat</strong>. We engineer robust, secure, and scalable server-side systems for enterprise applications across India and the globe.
                    </p>
                    <div class="reveal-up">
                        <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Architect Your System</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="assets/img/office/mvsoftoff16.jpg" class="img-fluid rounded-4 shadow-lg reveal-up" alt="Backend Infrastructure">
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
                        <h2 class="fw-bold text-dark mb-4">Scalable <br><span class="text-primary-gradient">PHP Foundations</span></h2>
                        <p class="text-muted">As a <strong>PHP-first engineering collective</strong>, we specialize in building high-performance Laravel systems that serve as the backbone for complex enterprise operations worldwide.</p>

                        <div class="service-stats mt-5">
                            <div class="stat-item mb-4 reveal-up">
                                <h4 class="fw-bold text-primary mb-0">100%</h4>
                                <p class="small text-muted">ACID Compliance</p>
                            </div>
                            <div class="stat-item mb-4 reveal-up" data-delay="0.1">
                                <h4 class="fw-bold text-primary mb-0">Infinite</h4>
                                <p class="small text-muted">Horizontal Scaling</p>
                            </div>
                        </div>

                        <!-- Systematic Comparison -->
                        <div class="glass-card p-4 mt-5 reveal-up">
                            <h5 class="fw-bold mb-3 small uppercase">Stack Comparison</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless mb-0" style="font-size: 0.8rem;">
                                    <thead>
                                        <tr class="border-bottom">
                                            <th class="text-muted">Feature</th>
                                            <th class="text-primary">PHP+Laravel</th>
                                            <th class="text-info">MERN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">Data</td>
                                            <td>Relational</td>
                                            <td>JSON Docs</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Scaling</td>
                                            <td>Vertical</td>
                                            <td>Horizontal</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Safety</td>
                                            <td>ACID (Max)</td>
                                            <td>High</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Speed</td>
                                            <td>Complex Logic</td>
                                            <td>Modern SPAs</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <!-- 1. Database Solutions -->
                    <div class="engineering-block mb-5 reveal-up">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="icon-box-primary bg-primary text-white">01</div>
                            <h3 class="fw-bold mb-0">Backend Database Solutions</h3>
                        </div>
                        <p class="text-muted mb-4">We don't believe in a one-size-fits-all approach. We select the database based on your specific business logic and data structure.</p>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="feature-pill-card p-4 h-100">
                                    <div class="pill-icon mb-3"><i class="fas fa-table"></i></div>
                                    <h5 class="fw-bold mb-2">MySQL (Relational / SQL)</h5>
                                    <p class="small text-muted mb-3">Best For: E-commerce, Financial Systems, and ERPs where data consistency is non-negotiable.</p>
                                    <ul class="list-unstyled small text-muted mb-0">
                                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> <strong>Laravel Integration:</strong> Optimized Eloquent ORM queries.</li>
                                        <li><i class="fas fa-check text-primary me-2"></i> <strong>ACID Compliance:</strong> 100% accurate transactions.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-pill-card p-4 h-100" data-delay="0.1">
                                    <div class="pill-icon mb-3"><i class="fas fa-file-code"></i></div>
                                    <h5 class="fw-bold mb-2">MongoDB (NoSQL)</h5>
                                    <p class="small text-muted mb-3">Best For: Real-time Analytics, Social Media, and Content Management Systems (CMS).</p>
                                    <ul class="list-unstyled small text-muted mb-0">
                                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> <strong>MERN Integration:</strong> Flexible, JSON-like document storage.</li>
                                        <li><i class="fas fa-check text-primary me-2"></i> <strong>Sharding:</strong> Boundless horizontal scalability.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Hybrid Approach -->
                        <div class="p-4 rounded-4 border-start border-primary border-5" style="background: rgba(26, 56, 127, 0.03);">
                            <h5 class="fw-bold mb-2">Hybrid Database Architecture</h5>
                            <p class="text-muted small mb-0">
                                For advanced projects, we use <strong>MySQL</strong> for core transactional data (Payments, Orders) and <strong>MongoDB</strong> for high-speed data (Chats, Logs). This provides absolute accuracy and massive speed simultaneously.
                            </p>
                        </div>
                    </div>

                    <!-- 4. The MVSoft Backend Promise -->
                    <div class="engineering-block reveal-up" style="background: linear-gradient(135deg, #ffffff 0%, #f0f4ff 100%);">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="icon-box-primary bg-primary text-white"><i class="fas fa-cogs"></i></div>
                            <h3 class="fw-bold mb-0">The "MVSoft Backend" Promise</h3>
                        </div>

                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex gap-3 mb-4">
                                    <div class="text-primary fs-5 mt-1"><i class="fas fa-tachometer-alt"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Performance Tuning</h6>
                                        <p class="text-muted small mb-0">We use <strong>Redis caching</strong> to reduce database load, ensuring your page loads in under 2 seconds.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex gap-3 mb-4">
                                    <div class="text-primary fs-5 mt-1"><i class="fas fa-shield-alt"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Security First</h6>
                                        <p class="text-muted small mb-0">All database interactions are protected against SQL Injection using Laravel's built-in security layers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3 bg-white rounded-3 shadow-sm border">
                                    <div class="d-flex gap-3">
                                        <div class="text-success fs-5 mt-1"><i class="fas fa-microchip"></i></div>
                                        <div>
                                            <h6 class="fw-bold mb-1">Continuous Systems Optimization</h6>
                                            <p class="text-muted small mb-0">Our backend architecture is built with enterprise observability in mind, making it effortless to monitor performance, optimize indexes, and scale infrastructure as your data grows.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5 position-relative" style="background: #1a387f !important; z-index: 10;">
        <div class="container py-5 text-center">
            <h2 class="display-4 fw-bold text-white mb-4">Need a Scalable Engine?</h2>
            <p class="lead text-white-50 mb-5">Let us architect your next enterprise-grade backend with absolute precision.</p>
            <div>
                <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">Talk to a Systems Architect</a>
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

    .icon-box-primary {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.2rem;
    }

    .engineering-block {
        background: white;
        padding: 2.5rem;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .feature-pill-card {
        background: white;
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 20px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        overflow: hidden;
    }

    .feature-pill-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(26, 56, 127, 0.08);
        border-color: rgba(26, 56, 127, 0.2);
    }

    .pill-icon {
        width: 45px;
        height: 45px;
        background: rgba(26, 56, 127, 0.05);
        color: #1a387f;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .feature-pill-card:hover .pill-icon {
        background: #1a387f;
        color: white;
        transform: rotate(10deg);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 20px;
    }

    .shadow-glow {
        box-shadow: 0 0 20px rgba(26, 56, 127, 0.2);
    }
</style>

<?php include 'includes/footer.php'; ?>