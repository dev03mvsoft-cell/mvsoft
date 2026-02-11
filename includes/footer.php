<footer class="footer-premium">
    <div class="container footer-top py-5">
        <div class="row g-4">
            <!-- Company column -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <div class="footer-brand mb-4">
                    <img src="assets/img/logo1.png" alt="Mvsoft Logo" class="footer-logo mb-3">
                    <p class="text-muted footer-pitch">
                        Mvsoft Tech Solutions is the leading <strong>Website & App Development company in Gujarat, India</strong>. Our elite collective delivers high-performance digital engineering and innovative 3D web experiences to a global clientele.
                    </p>
                </div>
                <div class="footer-social">
                    <a href="#" class="social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/mvsoft-solutions/" class="social-link" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Services column -->
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-title">Our Services</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="web-design">Web Development</a></li>
                    <li><a href="app-development">Mobile App Development</a></li>
                    <li><a href="web-design">UI/UX Design</a></li>
                    <li><a href="seo-optimization">Global SEO</a></li>
                    <li><a href="backend-solutions">Backend Solutions</a></li>
                    <li><a href="web-design">3D Web Experiences</a></li>
                </ul>
            </div>

            <!-- Industries column -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-title">Industries We Serve</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Transport & Logistics</a></li>
                    <li><a href="#">E-Commerce</a></li>
                    <li><a href="#">Healthcare</a></li>
                    <li><a href="#">Finance & Insurance</a></li>
                    <li><a href="#">Real Estate</a></li>
                    <li><a href="#">Media & Education</a></li>
                </ul>
            </div>

            <!-- Contact column -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">Contact Us</h5>
                <ul class="list-unstyled footer-contact">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Plot no 300, Ward: 12/b, Shree Ambika Arcade, Office no 106, 1st Floor,Gandhidham 370201</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span>admin@mvsoftsolutions.com</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span>02836-465134</span>
                    </li>
                    <li class="mt-4">
                        <a href="contact" class="btn btn-primary rounded-pill px-4 btn-footer-cta">Get a Quote</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom py-3 border-top">
        <!-- Service Locations For SEO -->
        <!-- Service Locations For SEO (Hidden) -->
        <div style="display:none;">
            <ul>
                <li>Ahmedabad</li>
                <li>Surat</li>
                <li>Vadodara</li>
                <li>Rajkot</li>
                <li>Indore</li>
                <li>Jamnagar</li>
                <li>Gandhidham</li>
                <li>Kutch</li>
                <li>Dahod</li>
                <li>Global Remote Engineering</li>
            </ul>
        </div>

        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="mb-0 small text-muted">&copy; <?= date('Y') ?> Mvsoft Tech Solutions. All rights reserved.</p>
            <div class="footer-legal d-flex gap-3 small">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js"></script>
<!-- Anime.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<!-- Typed.js -->
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<!-- SplitType -->
<script src="https://unpkg.com/split-type"></script>
<!-- GSAP Observer Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Observer.min.js"></script>
<!-- GSAP SplitText Plugin -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/SplitText.min.js"></script>
<!-- Lenis Smooth Scroll -->
<script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>
<!-- Custom JS Modules -->
<script src="assets/js/core-ui.js"></script>
<script src="assets/js/animation-engine.js"></script>
<script src="assets/js/three-engine.js"></script>
<script src="assets/js/horizontal-scroll.js"></script>
<script src="assets/js/smooth-scroll.js"></script>
<script src="assets/js/journey-v2.js"></script>
<script src="assets/js/hero-story.js"></script>
<script src="assets/js/script.js"></script>

<?php if (isset($is_nexus) && $is_nexus): ?>
    <script type="module" src="assets/js/nexus-engine.js"></script>
<?php endif; ?>
</body>

</html>