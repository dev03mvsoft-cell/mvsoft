<?php include 'includes/header.php'; ?>

<main>
    <!-- Career Hero -->
    <section class="section nexus-hero-section py-5 position-relative overflow-hidden d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container text-center position-relative z-3 mt-5">
            <div class="hero-content reveal-up">
                <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">Join Our Collective</span>
                <div class="elastic-stage">
                    <div class="elastic-content">
                        <h1 class="elastic-txt">Careers</h1>
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

    <!-- Open Positions -->
    <section id="positions" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold text-dark reveal-up">Current Openings</h2>
                <p class="text-muted reveal-up">Join the elite engineering team at Mvsoft.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="job-card p-4 rounded-4 border mb-4 reveal-up d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                        <div>
                            <h4 class="fw-bold mb-1">Senior Full Stack Developer</h4>
                            <p class="text-muted mb-0">Remote / Full-time • React, Node, AWS</p>
                        </div>
                        <a href="#applyForm" class="btn btn-outline-primary rounded-pill px-4">Apply Now</a>
                    </div>
                    <div class="job-card p-4 rounded-4 border mb-4 reveal-up d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                        <div>
                            <h4 class="fw-bold mb-1">3D Web Developer (Three.js)</h4>
                            <p class="text-muted mb-0">Hybrid / Full-time • WebGL, GLSL, GSAP</p>
                        </div>
                        <a href="#applyForm" class="btn btn-outline-primary rounded-pill px-4">Apply Now</a>
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

                        <form id="careerForm">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" class="form-control bg-light border-0" placeholder="John Doe" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" class="form-control bg-light border-0" placeholder="john@example.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-phone text-muted"></i></span>
                                        <input type="tel" class="form-control bg-light border-0" placeholder="+91 00000 00000" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Applying For</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-briefcase text-muted"></i></span>
                                        <input type="text" class="form-control bg-light border-0" placeholder="e.g. Senior Full Stack Developer" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Portfolio / LinkedIn / Resume Link</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-link text-muted"></i></span>
                                        <input type="url" class="form-control bg-light border-0" placeholder="https://..." required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Tell us about your superpower</label>
                                    <textarea class="form-control bg-light border-0" rows="4" placeholder="Briefly describe your core expertise..."></textarea>
                                </div>
                                <div class="col-md-12 text-center mt-5">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-glow w-100">
                                        Submit Application <i class="fas fa-paper-plane ms-2"></i>
                                    </button>
                                    <p class="small text-muted mt-3 mb-0">By submitting, you agree to our recruitment privacy guidelines.</p>
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
    .job-card {
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(0, 0, 0, 0.08) !important;
    }

    .job-card:hover {
        background: #fff;
        border-color: #1a387f !important;
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(26, 56, 127, 0.1);
    }

    .application-form-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.4s ease;
    }

    .bg-primary-soft {
        background-color: rgba(26, 56, 127, 0.1);
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 10px 20px rgba(26, 56, 127, 0.05);
        border: 1px solid rgba(26, 56, 127, 0.2) !important;
    }

    .input-group-text {
        border-right: none !important;
    }

    .shadow-glow {
        box-shadow: 0 10px 30px rgba(26, 56, 127, 0.2);
    }
</style>

<?php include 'includes/footer.php'; ?>