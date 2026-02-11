<?php include 'includes/header.php'; ?>

<main>
    <!-- Nexus Contact Hero -->
    <section class="section nexus-hero-section py-5 position-relative overflow-hidden d-flex align-items-center justify-content-center" style="min-height: 70vh;">
        <div class="container text-center position-relative z-3 mt-5">
            <div class="hero-content reveal-up">
                <div class="elastic-stage">
                    <div class="elastic-content">
                        <h1 class="elastic-txt">Contact</h1>
                    </div>
                </div>

                <h2 class="hero-subheading reveal-up" data-delay="0.6">
                    Connect with our elite digital engineering <br>
                    <span class="text-primary-gradient">collective today.</span>
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
        </div>
    </section>

    <!-- Contact Interaction Section -->
    <section class="py-5 position-relative">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Info Column -->
                <div class="col-lg-5">
                    <div class="reveal-up">
                        <span class="section-tag">Get in Touch</span>
                        <h2 class="display-5 fw-bold text-dark mb-4">Let's build something <span class="text-primary-gradient">legendary.</span></h2>
                        <p class="text-muted mb-5 lead">Whether you have a specific project inquiry or just want to explore the possibilities of digital engineering, our team is ready.</p>

                        <div class="contact-details">
                            <div class="detail-card glass-card p-4 mb-4 reveal-up shadow-sm">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="icon-circle shadow-glow">
                                        <i class="fas fa-map-location-dot"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Corporate HQ</h5>
                                        <p class="text-muted small mb-0">No 106, 1st Floor, Shree Ambika Arcade, Plot no 300, Ward: 12/b, Gandhidham(Kutch) Gujarat, India</p>
                                    </div>
                                </div>
                            </div>

                            <div class="detail-card glass-card p-4 mb-4 reveal-up shadow-sm" data-delay="0.1">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="icon-circle shadow-glow">
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Direct Communication</h5>
                                        <p class="text-muted small mb-0">admin@mvsoftsolutions.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="detail-card glass-card p-4 reveal-up shadow-sm" data-delay="0.2">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="icon-circle shadow-glow">
                                        <i class="fas fa-headset"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Client Support</h5>
                                        <p class="text-muted small mb-0">02836-465134<br>Available 10:00 - 18:00 IST</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="social-wrapper mt-5 reveal-up">
                            <h6 class="fw-bold text-dark mb-3">Connect Professionally</h6>
                            <div class="d-flex gap-3">
                                <a href="https://www.linkedin.com/company/mvsoft-solutions/" class="nexus-social-icon" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.facebook.com/people/mvSoft-Solutions/61588057437483/" class="nexus-social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/mvsoftsolutions?utm_source=qr&igsh=MTFoNjcxNjhhZXA2Mg%3D%3D" class="nexus-social-icon" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="col-lg-7">
                    <div class="nexus-form-container p-5 glass-card reveal-up shadow-lg" data-delay="0.2">
                        <div class="mb-4">
                            <h3 class="fw-bold mb-2">Project Brief</h3>
                            <p class="text-muted small">Share your vision and we'll handle the engineering.</p>
                        </div>
                        <form id="contactForm" action="mail-handler.php" method="POST" class="row g-4">
                            <!-- Anti-Spam Honeypot -->
                            <div style="display:none;">
                                <input type="text" name="honeypot" value="">
                            </div>
                            <input type="hidden" name="form_type" value="contact">

                            <div class="col-md-6">
                                <label class="form-label-custom">Identity</label>
                                <input type="text" name="name" class="form-control-nexus" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-custom">Communication</label>
                                <input type="email" name="email" class="form-control-nexus" placeholder="Email@work.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Requirement Focus</label>
                                <select name="service" class="form-select-nexus" required>
                                    <option selected disabled value="">Select Core Service</option>
                                    <option>Enterprise Web Systems</option>
                                    <option>Mobile Engineering</option>
                                    <option>UI/UX & Identity</option>
                                    <option>Cloud & Architecture</option>
                                    <option>Digital Strategy</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Context & Vision</label>
                                <textarea name="message" class="form-control-nexus" rows="4" placeholder="Describe the problem we are solving together..." required></textarea>
                            </div>

                            <!-- Google reCAPTCHA v3 -->
                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-nexus-primary btn-magnetic px-5 py-3 shadow-glow">
                                    <span>Initiate Strategy <i class="fas fa-arrow-right ms-2"></i></span>
                                    <div class="particles-field"></div>
                                </button>
                            </div>
                        </form>
                        <script>
                            document.getElementById('contactForm').addEventListener('submit', function(e) {
                                e.preventDefault();
                                const form = this;
                                grecaptcha.ready(function() {
                                    grecaptcha.execute('6LcNmGUsAAAAAFqQA9y7Fqi_8yRQF7QvsnHpS4Qu', {
                                        action: 'contact'
                                    }).then(function(token) {
                                        document.getElementById('g-recaptcha-response').value = token;
                                        form.submit();
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Presence Section -->
    <section class="py-5" style="background: rgba(26, 56, 127, 0.02);">
        <div class="container py-5 text-center">
            <div class="reveal-up mb-5">
                <span class="section-tag">Global Strategy</span>
                <h2 class="display-6 fw-bold">Distributed Talent, <span class="text-primary-gradient">Unified Results.</span></h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="presence-card p-4 glass-card reveal-up h-100">
                        <h4 class="fw-bold mb-2">Asia-Pacific</h4>
                        <p class="text-muted small mb-0">Our primary engineering hub delivering complex logic and architecture.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="presence-card p-4 glass-card reveal-up h-100" data-delay="0.1">
                        <h4 class="fw-bold mb-2">Remote-First</h4>
                        <p class="text-muted small mb-0">Connecting elite developers globally to bring diverse perspectives to your UI.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="presence-card p-4 glass-card reveal-up h-100" data-delay="0.2">
                        <h4 class="fw-bold mb-2">24/7 Ops</h4>
                        <p class="text-muted small mb-0">Ensuring zero-downtime development and continuous deployment cycles.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation CTA -->
    <section class="py-5">
        <div class="container pb-5">
            <div class="consultation-cta-card glass-card p-5 reveal-up shadow-lg text-center position-relative overflow-hidden">
                <div class="cta-inner position-relative z-2">
                    <h2 class="fw-bold mb-3">Prefer a Direct Strategy Session?</h2>
                    <p class="text-muted mb-4 lead">Skip the forms. Book a 15-minute introductory call with our technical architects.</p>
                    <a href="mailto:admin@mvsoftsolutions.com" class="btn btn-nexus-primary px-5 py-3 shadow-glow">
                        <i class="fas fa-calendar-check me-2"></i> Schedule Discovery Call
                    </a>
                </div>
                <div class="bg-glow"></div>
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

    .nexus-social-icon {
        width: 45px;
        height: 45px;
        background: rgba(26, 56, 127, 0.05);
        color: #1a387f;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
        border: 1px solid rgba(26, 56, 127, 0.1);
    }

    .nexus-social-icon:hover {
        background: #1a387f;
        color: #fff;
        transform: translateY(-5px) rotate(8deg);
        box-shadow: 0 10px 20px rgba(26, 56, 127, 0.2);
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        background: #1a387f;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .form-label-custom {
        display: block;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #1a387f;
        margin-bottom: 0.5rem;
    }

    .form-control-nexus,
    .form-select-nexus {
        width: 100%;
        background: rgba(26, 56, 127, 0.03);
        border: 1px solid rgba(26, 56, 127, 0.1);
        border-radius: 12px;
        padding: 0.8rem 1.2rem;
        color: #1a387f;
        transition: all 0.3s ease;
    }

    .form-control-nexus:focus,
    .form-select-nexus:focus {
        background: white;
        border-color: #1a387f;
        box-shadow: 0 10px 25px rgba(26, 56, 127, 0.1);
        outline: none;
    }

    .btn-nexus-primary {
        background: #1a387f;
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-nexus-primary:hover {
        background: #003aaf;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 58, 175, 0.3);
    }

    .presence-card {
        transition: all 0.4s ease;
    }

    .presence-card:hover {
        border-color: #1a387f !important;
        transform: translateY(-10px);
        background: white !important;
    }

    .consultation-cta-card {
        border-radius: 30px;
    }

    .bg-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, rgba(26, 56, 127, 0.05), transparent 70%);
        z-index: 1;
    }

    .lead {
        font-size: 1.15rem;
    }
</style>

<?php include 'includes/footer.php'; ?>