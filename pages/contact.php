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

    <!-- Contact Form & Info -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="contact-info-card p-5 bg-white rounded-4 shadow-sm reveal-up">
                        <h2 class="fw-bold mb-4">Contact Information</h2>
                        <div class="info-item d-flex mb-4">
                            <div class="icon me-3 text-primary"><i class="fas fa-map-marker-alt fs-4"></i></div>
                            <div>
                                <h5 class="fw-bold mb-1">Our Office</h5>
                                <p class="text-muted small mb-0">Plot no 300, Ward: 12/b, Shree Ambika Arcade, Office no 106, 1st Floor,Gandhidham 370201</p>
                            </div>
                        </div>
                        <div class="info-item d-flex mb-4">
                            <div class="icon me-3 text-primary"><i class="fas fa-envelope fs-4"></i></div>
                            <div>
                                <h5 class="fw-bold mb-1">Email Us</h5>
                                <p class="text-muted small mb-0">admin@mvsoftsolutions.com</p>
                            </div>
                        </div>
                        <div class="info-item d-flex mb-4">
                            <div class="icon me-3 text-primary"><i class="fas fa-phone-alt fs-4"></i></div>
                            <div>
                                <h5 class="fw-bold mb-1">Call Us</h5>
                                <p class="text-muted small mb-0">02836-465134</p>
                            </div>
                        </div>

                        <div class="social-links mt-5">
                            <h6 class="fw-bold text-dark mb-3">Follow Us</h6>
                            <div class="d-flex gap-3">
                                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form-wrapper p-5 bg-white rounded-4 shadow-sm reveal-up" data-delay="0.1">
                        <h2 class="fw-bold mb-4">Send us a Message</h2>
                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Full Name</label>
                                    <input type="text" class="form-control rounded-pill px-4" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <input type="email" class="form-control rounded-pill px-4" placeholder="name@company.com" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Subject</label>
                                    <select class="form-select rounded-pill px-4">
                                        <option selected>Web Development</option>
                                        <option>Mobile App Development</option>
                                        <option>UI/UX Design</option>
                                        <option>Digital Marketing</option>
                                        <option>Other / Inquiry</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Message</label>
                                    <textarea class="form-control rounded-4 px-4 py-3" rows="5" placeholder="Tell us about your project..." required></textarea>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 w-100 shadow-glow">Send Message</button>
                                </div>
                            </div>
                        </form>
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

    .social-icon {
        width: 40px;
        height: 40px;
        background: #f8f9fa;
        color: #1a387f;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-icon:hover {
        background: #1a387f;
        color: #fff;
        transform: translateY(-3px);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #1a387f;
        box-shadow: 0 0 0 0.25rem rgba(26, 56, 127, 0.1);
    }
</style>

<?php include 'includes/footer.php'; ?>