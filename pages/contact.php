<?php include 'includes/header.php'; ?>

<main>
    <!-- Contact Hero -->
    <section class="contact-hero py-5 position-relative overflow-hidden" style="background: #fff; min-height: 40vh; display: flex; align-items: center;">
        <div class="container position-relative z-3 mt-5 text-center">
            <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Get in Touch</span>
            <h1 class="display-3 fw-bold text-dark mb-4 reveal-up">Let's Build Something <br><span class="text-primary-gradient">Extraordinary</span></h1>
            <p class="lead text-muted mb-0 reveal-up" style="max-width: 700px; margin: 0 auto;">
                Have a project in mind? Our team of elite engineers and designers is ready to bring your vision to life.
            </p>
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
                                <p class="text-muted small mb-0">Corporate Office, Tech Hub, India</p>
                            </div>
                        </div>
                        <div class="info-item d-flex mb-4">
                            <div class="icon me-3 text-primary"><i class="fas fa-envelope fs-4"></i></div>
                            <div>
                                <h5 class="fw-bold mb-1">Email Us</h5>
                                <p class="text-muted small mb-0">sales@mvsoftsolutions.com</p>
                            </div>
                        </div>
                        <div class="info-item d-flex mb-4">
                            <div class="icon me-3 text-primary"><i class="fas fa-phone-alt fs-4"></i></div>
                            <div>
                                <h5 class="fw-bold mb-1">Call Us</h5>
                                <p class="text-muted small mb-0">+91 XXX XXX XXXX</p>
                            </div>
                        </div>

                        <div class="social-links mt-5">
                            <h6 class="fw-bold text-dark mb-3">Follow Us</h6>
                            <div class="d-flex gap-3">
                                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-x-twitter"></i></a>
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