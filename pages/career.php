<?php include 'includes/header.php'; ?>

<main>
    <!-- Career Hero -->
    <section class="section nexus-hero-section py-5 position-relative overflow-hidden d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container text-center position-relative z-3 mt-5">
            <div class="hero-content reveal-up">
                <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">Join Our Collective</span>
                <div class="elastic-stage">
                    <div class="elastic-content">
                        <h1 class="elastic-txt">Career</h1>
                    </div>
                </div>

                <h2 class="hero-subheading reveal-up" data-delay="0.6">
                    Join an elite collective of creators <br>
                    <span class="text-primary-gradient">defining the future.</span>
                </h2>

                <script>
                    window.addEventListener('load', function() {
                        if (typeof SplitText === 'undefined' || typeof gsap === 'undefined') return;
                        const weightInit = 600,
                            weightTarget = 400,
                            weightDiff = weightInit - weightTarget;
                        const stretchInit = 150,
                            stretchTarget = 80,
                            stretchDiff = stretchInit - stretchTarget;
                        const maxYScale = 2.5;
                        let mySplitText = new SplitText('.elastic-txt', {
                            type: "chars",
                            charsClass: "elastic-char"
                        });
                        let chars = document.querySelectorAll('.elastic-char'),
                            txt = document.querySelector('.elastic-txt');
                        let charH = txt.offsetHeight,
                            numChars = chars.length,
                            isMouseDown = false;
                        let mouseInitialY = 0,
                            mouseFinalY = 0,
                            charIndexSelected = 0,
                            elasticDropOff = 0.8,
                            dragYScale = 0;
                        gsap.set(chars, {
                            transformOrigin: 'center bottom'
                        });
                        gsap.from(chars, {
                            y: -500,
                            fontWeight: weightTarget,
                            fontStretch: stretchTarget,
                            scaleY: 2,
                            ease: "elastic(0.2, 0.1)",
                            duration: 1.5,
                            stagger: {
                                each: 0.05,
                                from: 'random'
                            },
                            scrollTrigger: {
                                trigger: ".elastic-stage",
                                start: "top bottom",
                                toggleActions: "restart none none restart"
                            }
                        });
                        document.body.addEventListener('mousedown', function(e) {
                            if (e.target.classList.contains('elastic-char')) {
                                mouseInitialY = e.clientY;
                                isMouseDown = true;
                                chars.forEach((c, i) => {
                                    if (c === e.target) charIndexSelected = i;
                                });
                            }
                        });
                        document.body.addEventListener('mouseup', function() {
                            if (isMouseDown) {
                                isMouseDown = false;
                                gsap.to(chars, {
                                    y: 0,
                                    fontWeight: weightInit,
                                    fontStretch: stretchInit,
                                    scale: 1,
                                    ease: "elastic(0.35, 0.1)",
                                    duration: 1,
                                    stagger: {
                                        each: 0.02,
                                        from: charIndexSelected
                                    }
                                });
                            }
                        });
                        document.body.addEventListener('mousemove', function(e) {
                            if (isMouseDown) {
                                mouseFinalY = e.clientY;
                                let maxYDragDist = charH * (maxYScale - 1);
                                let distY = mouseInitialY - mouseFinalY;
                                dragYScale = distY / maxYDragDist;
                                if (dragYScale > (maxYScale - 1)) dragYScale = maxYScale - 1;
                                else if (dragYScale < -0.5) dragYScale = -0.5;
                                gsap.to(chars, {
                                    y: (index) => (1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale * -50,
                                    fontWeight: (index) => weightInit - ((1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale * weightDiff),
                                    fontStretch: (index) => stretchInit - ((1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale * stretchDiff),
                                    scaleY: (index) => {
                                        let sY = 1 + ((1 - (Math.abs(index - charIndexSelected) / (numChars * elasticDropOff))) * dragYScale);
                                        return sY < 0.5 ? 0.5 : sY;
                                    },
                                    ease: "power4",
                                    duration: 0.6
                                });
                            }
                        });
                    });
                </script>
            </div>
            <div class="reveal-up mt-4">
                <a href="#positions" class="btn btn-dark btn-lg rounded-pill px-5 py-3">View Openings</a>
            </div>
        </div>
    </section>

    <!-- Cultural Pillars (Bento Grid) -->
    <section class="py-5 position-relative overflow-hidden">
        <div class="container py-5">
            <div class="row mb-5 text-center reveal-up">
                <div class="col-12">
                    <span class="section-tag">Our Ecosystem</span>
                    <h2 class="display-5 fw-bold text-dark">Engineered for <span class="text-primary-gradient">Growth</span></h2>
                </div>
            </div>

            <div class="culture-bento-grid">
                <div class="bento-item bento-tall glass-card p-5 reveal-up shadow-sm">
                    <div class="bento-content">
                        <div class="icon-pill mb-4"><i class="fas fa-microchip"></i></div>
                        <h4 class="fw-bold">High-Tier Stack</h4>
                        <p class="text-muted">We don't do legacy. Work with Next.js, Three.js, and high-performance Laravel architectures.</p>
                        <div class="bento-tags mt-4">
                            <span class="badge rounded-pill bg-light text-dark">AI-First</span>
                            <span class="badge rounded-pill bg-light text-dark">Modern UI</span>
                        </div>
                    </div>
                </div>

                <div class="bento-item bento-wide glass-card p-5 reveal-up shadow-sm" data-delay="0.1">
                    <div class="row align-items-center h-100">
                        <div class="col-md-7">
                            <h4 class="fw-bold">Global Collective</h4>
                            <p class="text-muted mb-0">Join a distributed team of engineers across 3 continents. Zero boundaries, maximum impact.</p>
                        </div>
                        <div class="col-md-5 text-end d-none d-md-block">
                            <div class="global-icon"><i class="fas fa-earth-americas text-primary"></i></div>
                        </div>
                    </div>
                </div>

                <div class="bento-item glass-card p-5 reveal-up shadow-sm" data-delay="0.2">
                    <div class="icon-pill mb-3"><i class="fas fa-bolt"></i></div>
                    <h5 class="fw-bold">Radical Velocity</h5>
                    <p class="text-muted small mb-0">We build fast, test hard, and deploy daily.</p>
                </div>

                <div class="bento-item glass-card p-5 reveal-up shadow-sm" data-delay="0.3">
                    <div class="icon-pill mb-3"><i class="fas fa-brain"></i></div>
                    <h5 class="fw-bold">Mental Sovereignty</h5>
                    <p class="text-muted small mb-0">Continuous learning budget and weekly R&D sessions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions -->
    <section id="positions" class="py-5 bg-light position-relative">
        <div class="container py-5">
            <div class="text-center mb-5 reveal-up">
                <span class="section-tag">Active Roles</span>
                <h2 class="display-4 fw-bold text-dark">The Collective is <span class="text-primary-gradient">Expanding</span></h2>
                <p class="text-muted">Current engineering and creative opportunities.</p>
            </div>

            <div class="row g-4">
                <!-- Job Card 1 -->
                <div class="col-lg-6">
                    <div class="nexus-job-card h-100 glass-card p-5 reveal-up shadow-sm">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h4 class="fw-bold mb-1">Senior Systems Architect</h4>
                                <span class="badge bg-primary-soft text-primary rounded-pill px-3">Full-time</span>
                                <span class="badge bg-dark-soft text-dark rounded-pill px-3">Remote</span>
                            </div>
                            <div class="job-rate text-primary fw-bold">Project Based</div>
                        </div>
                        <p class="text-muted small mb-4">Designing complex database schemas and high-concurrency API architectures for global logistics platforms.</p>
                        <div class="job-meta d-flex gap-4 mb-4 text-muted small">
                            <span><i class="fas fa-code me-2"></i> PHP/Laravel</span>
                            <span><i class="fas fa-database me-2"></i> Postgres</span>
                        </div>
                        <a href="#applyForm" class="btn btn-nexus-outline w-100">Apply to Collective</a>
                    </div>
                </div>

                <!-- Job Card 2 -->
                <div class="col-lg-6">
                    <div class="nexus-job-card h-100 glass-card p-5 reveal-up shadow-sm" data-delay="0.1">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h4 class="fw-bold mb-1">Creative Technologist</h4>
                                <span class="badge bg-primary-soft text-primary rounded-pill px-3">Contract</span>
                                <span class="badge bg-dark-soft text-dark rounded-pill px-3">Hybrid</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-4">Bridging the gap between UI design and WebGL implementation. You are a visual storyteller with code.</p>
                        <div class="job-meta d-flex gap-4 mb-4 text-muted small">
                            <span><i class="fas fa-cube me-2"></i> Three.js</span>
                            <span><i class="fas fa-wand-magic-sparkles me-2"></i> GSAP</span>
                        </div>
                        <a href="#applyForm" class="btn btn-nexus-outline w-100">Apply to Collective</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form -->
    <section id="applyForm" class="py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="application-form-card p-5 bg-white rounded-5 shadow-sm reveal-up">
                        <div class="text-center mb-5">
                            <span class="badge bg-primary-soft text-primary rounded-pill px-3 py-2 mb-3">Application Form</span>
                            <h2 class="fw-bold text-dark">Join the Collective</h2>
                            <p class="text-muted">Fill out the form below and our recruitment team will reach out.</p>
                        </div>

                        <form id="careerForm" action="mail-handler.php" method="POST" enctype="multipart/form-data">
                            <!-- Anti-Spam Honeypot -->
                            <div style="display:none;">
                                <input type="text" name="honeypot" value="">
                            </div>
                            <input type="hidden" name="form_type" value="career">

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="name" class="form-control bg-light border-0" placeholder="John Doe" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" class="form-control bg-light border-0" placeholder="john@example.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-phone text-muted"></i></span>
                                        <input type="tel" name="phone" class="form-control bg-light border-0" placeholder="+91 00000 00000" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Applying For</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-briefcase text-muted"></i></span>
                                        <input type="text" name="position" class="form-control bg-light border-0" placeholder="e.g. Senior Full Stack Developer" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Upload Resume (PDF only)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-file-pdf text-muted"></i></span>
                                        <input type="file" name="resume" class="form-control bg-light border-0" accept=".pdf" required>
                                    </div>
                                    <div class="form-text small">Max size 5MB. Your file will be emailed safely without being stored on our server.</div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Tell us about your superpower</label>
                                    <textarea name="message" class="form-control bg-light border-0" rows="4" placeholder="Briefly describe your core expertise..." required></textarea>
                                </div>

                                <!-- Google reCAPTCHA v3 -->
                                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                                <div class="col-md-12 text-center mt-4">
                                    <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 py-3 shadow-glow w-100 btn-magnetic">
                                        <span>Submit Application <i class="fas fa-paper-plane ms-2"></i></span>
                                        <div class="particles-field"></div>
                                    </button>
                                    <p class="small text-muted mt-3 mb-0">By submitting, you agree to our recruitment privacy guidelines.</p>
                                </div>
                            </div>
                        </form>
                        <script>
                            document.getElementById('careerForm').addEventListener('submit', function(e) {
                                e.preventDefault();
                                const form = this;
                                const submitBtn = form.querySelector('button[type="submit"]');
                                const originalBtnText = submitBtn.innerHTML;

                                // Disable button and show loading state
                                submitBtn.disabled = true;
                                submitBtn.innerHTML = '<span>Sending... <i class="fas fa-spinner fa-spin ms-2"></i></span>';

                                grecaptcha.ready(function() {
                                    grecaptcha.execute('6LcNmGUsAAAAAFqQA9y7Fqi_8yRQF7QvsnHpS4Qu', {
                                        action: 'career'
                                    }).then(function(token) {
                                        document.getElementById('g-recaptcha-response').value = token;

                                        const formData = new FormData(form);

                                        fetch('mail-handler.php', {
                                                method: 'POST',
                                                body: formData,
                                                headers: {
                                                    'X-Requested-With': 'XMLHttpRequest'
                                                }
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    Toaster.show(data.message, 'success');
                                                    form.reset();
                                                } else {
                                                    Toaster.show(data.message, 'error');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                Toaster.show('An error occurred. Please try again later.', 'error');
                                            })
                                            .finally(() => {
                                                submitBtn.disabled = false;
                                                submitBtn.innerHTML = originalBtnText;
                                            });
                                    });
                                });
                            });
                        </script>
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

    /* Culture Bento Grid */
    .culture-bento-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: minmax(180px, auto);
        gap: 1.5rem;
    }

    .bento-item {
        position: relative;
        overflow: hidden;
    }

    .bento-tall {
        grid-row: span 2;
    }

    .bento-wide {
        grid-column: span 2;
    }

    .icon-pill {
        width: 50px;
        height: 50px;
        background: #1a387f;
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .global-icon {
        font-size: 6rem;
        opacity: 0.1;
        transform: rotate(15deg);
    }

    /* Job Cards */
    .nexus-job-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(26, 56, 127, 0.1) !important;
    }

    .nexus-job-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: #1a387f !important;
        background: white !important;
        box-shadow: 0 30px 60px rgba(26, 56, 127, 0.1) !important;
    }

    .bg-primary-soft {
        background: rgba(26, 56, 127, 0.08);
    }

    .bg-dark-soft {
        background: rgba(0, 0, 0, 0.05);
    }

    .btn-nexus-outline {
        border: 1px solid #1a387f;
        color: #1a387f;
        border-radius: 50px;
        padding: 0.8rem;
        font-weight: 700;
        transition: all 0.3s ease;
        background: transparent;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-nexus-outline:hover {
        background: #1a387f;
        color: white;
    }

    /* Forms */
    .application-form-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.4s ease;
    }

    .form-control:focus {
        background: white !important;
        border-color: #1a387f !important;
        box-shadow: 0 10px 20px rgba(26, 56, 127, 0.1) !important;
    }

    @media (max-width: 991px) {
        .culture-bento-grid {
            grid-template-columns: 1fr;
        }

        .bento-tall,
        .bento-wide {
            grid-row: auto;
            grid-column: auto;
        }
    }
</style>

<?php include 'includes/footer.php'; ?>