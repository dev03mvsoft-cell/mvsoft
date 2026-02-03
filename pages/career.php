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
                    <div class="job-card p-4 rounded-4 border mb-4 reveal-up d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bold mb-1">Senior Full Stack Developer</h4>
                            <p class="text-muted mb-0">Remote / Full-time • React, Node, AWS</p>
                        </div>
                        <a href="contact" class="btn btn-outline-primary rounded-pill">Apply Now</a>
                    </div>
                    <div class="job-card p-4 rounded-4 border mb-4 reveal-up d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bold mb-1">3D Web Developer (Three.js)</h4>
                            <p class="text-muted mb-0">Hybrid / Full-time • WebGL, GLSL, GSAP</p>
                        </div>
                        <a href="contact" class="btn btn-outline-primary rounded-pill">Apply Now</a>
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
        transition: all 0.3s ease;
    }

    .job-card:hover {
        background: rgba(255, 255, 255, 0.8);
        border-color: #1a387f;
        transform: scale(1.02);
    }
</style>

<?php include 'includes/footer.php'; ?>