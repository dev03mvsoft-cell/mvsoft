<?php include 'includes/header.php'; ?>

<main>
    <?php include 'includes/hero-story.php'; ?>

    <!-- About Section -->
    <section id="about" class="about-section position-relative overflow-hidden py-5">
        <div class="container position-relative z-3">
            <div class="row align-items-center min-vh-75">
                <!-- Column 1: 3D Cube Canvas -->
                <div class="col-sm-6 order-2 order-sm-1">
                    <div id="about-canvas-container" class="w-100" style="height: 500px;"></div>
                </div>
                <!-- Column 2: About Text -->
                <div class="col-sm-6 order-1 order-sm-2 mb-5 mb-sm-0">
                    <div class="about-content ps-sm-5">
                        <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Elite Software Agency</span>
                        <h2 class="display-4 fw-bold text-dark mb-4 split-text reveal-up">Top <span class="text-drak-gradient">Website & App Development</span> Hub</h2>
                        <p class="lead text-muted mb-4 reveal-up">
                            MVsoft Solutions is a premier <strong>digital engineering powerhouse</strong>. We serve businesses across India and the globe with elite website development and high-performance mobile app solutions.
                        </p>
                        <ul class="list-unstyled text-muted mb-5 reveal-up">
                            <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Leading Web Development Agency</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Scalable App Development India</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Global Digital Engineering Model</li>
                        </ul>
                        <div class="reveal-up" style="display: flex; align-items: center; gap: 1rem;">
                            <label class="am">
                                <input id="am" class="am__input" type="checkbox" />
                                <span class="am__sr">Learn More</span>
                                <span class="am__plane">
                                    <span class="am__plane-engines"></span>
                                    <span class="am__plane-wings"></span>
                                    <span class="am__plane-fins"></span>
                                    <span class="am__plane-body"></span>
                                </span>
                            </label>
                            <!-- <span class="text-dark">Learn More</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Horizontal Scroll Section (Our Work) -->

    <!-- Tech Solutions Intro Section -->
    <section class="info-section">
        <div class="left-part">
            <h1 class="split-text"><span class="d-flex">premium</span> <span class="text"></span></h1>
            <p>MVsoft Solutions delivers cutting-edge <strong>website development</strong> and <strong>app development</strong> services to the world, ensuring innovation that scales internationally.</p>
            <a href="contact" class="book-link">
                <span class="linktext">Start Your Project</span>
                <span class="arrow">
                    <span></span>
                </span>
            </a>
        </div>
        <div class="right-part">
            <div class="bg-line">
                <img src="https://www.yudiz.com/codepen/photography-banner/wave.svg" alt="Line">
                <img src="https://www.yudiz.com/codepen/photography-banner/wave.svg" alt="Line">
            </div>

            <div class="main-grid d-flex">
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff34.png" alt="React"></div>
                    <span class="px-2">Advanced React Logic</span>
                </div>
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff35.png" alt="Next.js"></div>
                    <span class="px-2">Next-Gen Web Apps</span>
                </div>
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff36.png" alt="PHP"></div>
                    <span class="px-2">Secure Backend Systems</span>
                </div>
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff37.png" alt="Laravel"></div>
                    <span class="px-2">Enterprise Laravel</span>
                </div>
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff38.png" alt="MySQL"></div>
                    <span class="px-2">Smart Data Architecture</span>
                </div>
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff10.png" alt="Bootstrap"></div>
                    <span class="px-2">Rapid Component Design</span>
                </div>
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff11.png" alt="Tailwind"></div>
                    <span class="px-2">Modern Tailwind Styling</span>
                </div>
                <div class="box">
                    <div class="bg-img"><img src="assets/img/companyimages/mvsoftoff12.png" alt="AI Solutions"></div>
                    <span class="px-2">AI-Powered Engineering</span>
                </div>
            </div>

            <div class="bg-circle-h-line">
                <img src="https://www.yudiz.com/codepen/photography-banner/circle-ring.svg" alt="Horizontal-circle">
                <img src="https://www.yudiz.com/codepen/photography-banner/circle-ring.svg" alt="Horizontal-circle">
                <img src="https://www.yudiz.com/codepen/photography-banner/circle-ring.svg" alt="Horizontal-circle">
            </div>
            <div class="bg-dash-circle">
                <img src="https://www.yudiz.com/codepen/photography-banner/dash-circle.svg" alt="dash-circle">
            </div>
        </div>
    </section>



    <!-- Company Legacy Section -->
    <section class="legacy-section page01 position-relative overflow-hidden py-5" style="background: #fff; min-height: 80vh; display: flex; align-items: center;">
        <!-- 3D Legacy Canvas Background -->
        <div id="legacy-canvas-container" class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 1; opacity: 0.6; pointer-events: none;"></div>

        <div class="container position-relative z-3">
            <div class="row justify-content-center" style="
    background: #f1f1f19e;
    border-radius: 51px;
">
                <!-- Full Width Centered Column -->
                <div class="col-sm-12 col-lg-10 text-center">
                    <div class="legacy-content p-5">
                        <span class="badge bg-primary rounded-pill px-3 py-2 mb-3 reveal-up">Our Legacy</span>
                        <h2 class="display-4 fw-bold text-dark mb-4 reveal-up">Built on <br><span class="text-primary-gradient">Trust & Innovation</span></h2>
                        <p class="display-6 text-dark fw-light reveal-up mb-4" style="line-height: 1.6; letter-spacing: -0.02em; font-size: 1.8rem;">
                            Established in 2025, MVsoft Solutions was born from a realization that high-quality code shouldn't be a luxury. We've scaled to over 500 successful project completions.
                        </p>
                        <p class="lead text-muted mb-5 reveal-up">
                            We believe in clean code, transparent pricing, and rapid delivery.
                        </p>
                        <div class="reveal-up">
                            <a href="contact" class="btn btn-primary btn-lg rounded-pill px-5 shadow-glow">Join Our Journey</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="experience-section page02">
        <div id="laptop-canvas-container" class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 1;"></div>
        <div class="page-experience-pin position-relative z-2">
            <h1 class="experience-giant-text">Our Experience in Web Development </h1>
        </div>
    </section>

    <!-- New Offering Section -->
    <section class="offering-section bg-white">
        <div class="container">
            <span class="offer-badge reveal-up">
                what we're offering
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </span>
            <h1 class="offer-title text-dark split mt-3">Services Built Specifically for your Business</h1>

            <div class="grid-offer mt-3">
                <!-- Card 1: Web Development -->
                <div class="offering-card light-card reveal-up" data-delay="0.1">
                    <div class="circle"></div>
                    <div class="card-content">
                        <h2 class="split text-dark">Web <br /> Development</h2>
                        <p class="text-muted mb-3">We specialize in the <strong>TALL/MERN</strong> stacks, focusing on extreme speed and technical SEO.</p>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2"><i class="fas fa-code text-primary me-2"></i> <strong>Frontend:</strong> Next.js, React, Tailwind, GSAP & Three.js</li>
                            <li class="mb-2"><i class="fas fa-server text-primary me-2"></i> <strong>Backend:</strong> Laravel & PHP (Secure, Enterprise-grade)</li>
                            <li><i class="fas fa-shopping-cart text-primary me-2"></i> <strong>E-Commerce:</strong> Custom high-traffic stores</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 2: Mobile App Development -->
                <div class="offering-card light-card reveal-up" data-delay="0.2">
                    <div class="circle"></div>
                    <div class="card-content">
                        <h2 class="split text-dark">Mobile <br /> Development</h2>
                        <p class="text-muted mb-3">Reach your audience on iOS and Android with a high-performance single codebase.</p>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2"><i class="fas fa-mobile-alt text-primary me-2"></i> <strong>Android & IOS:</strong> Native performance at 50% cost</li>
                            <li><i class="fas fa-search-dollar text-primary me-2"></i> <strong>ASO:</strong> Ranking your apps on Global Stores</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 3: UI/UX Design -->
                <div class="offering-card light-card reveal-up" data-delay="0.3">
                    <div class="circle"></div>
                    <div class="card-content">
                        <h2 class="split text-dark">UI/UX <br /> Design</h2>
                        <p class="text-muted mb-3">User-centric design focusing on intuitive navigation and stunning visual aesthetics.</p>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2"><i class="fab fa-figma text-primary me-2"></i> <strong>Design:</strong> User-centric Figma interfaces</li>
                            <li class="mb-2"><i class="fas fa-palette text-primary me-2"></i> <strong>Branding:</strong> Corporate identity & design systems</li>
                            <li><i class="fas fa-mouse-pointer text-primary me-2"></i> <strong>Experience:</strong> Interactive prototypes & motion design</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 4: Global SEO -->
                <div class="offering-card light-card reveal-up" data-delay="0.4">
                    <div class="circle"></div>
                    <div class="card-content">
                        <h2 class="split text-dark">Global <br /> SEO</h2>
                        <p class="text-muted mb-3">Dominating search results with technical SEO excellence built directly into the codebase.</p>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2"><i class="fas fa-bolt text-primary me-2"></i> <strong>Technical:</strong> SSR, Meta-tags & Schema Markup</li>
                            <li class="mb-2"><i class="fas fa-chart-line text-primary me-2"></i> <strong>Growth:</strong> Keyword research & content strategy</li>
                            <li><i class="fas fa-globe text-primary me-2"></i> <strong>Reach:</strong> Local and international SEO optimization</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Regional Supremacy Section -->
    <!-- <section class="py-5" style="background: rgba(26, 56, 127, 0.02);">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-12 text-center reveal-up">
                    <span class="section-tag">Regional Hub</span>
                    <h2 class="display-5 fw-bold mb-4">Leading Tech Hub for <span class="text-primary-gradient">Global Excellence</span></h2>
                        <p class="lead text-muted mx-auto" style="max-width: 800px;">
                            MVsoftis the best destination for <strong>React, PHP, Next.js, Laravel, React Native, and Express</strong> engineering. We are the top-rated software company serving global clients with precision and speed.
                        </p>
                </div>
            </div>
            <div class="row g-4 mt-4 text-center">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="city-pill reveal-up"><strong>React</strong><br><span class="small opacity-75">Frontend Systems</span></div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-delay="0.1">
                    <div class="city-pill reveal-up"><strong>PHP</strong><br><span class="small opacity-75">Backend Logic</span></div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-delay="0.2">
                    <div class="city-pill reveal-up"><strong>Next.js</strong><br><span class="small opacity-75">Fullstack Apps</span></div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-delay="0.3">
                    <div class="city-pill reveal-up"><strong>React Native</strong><br><span class="small opacity-75">Mobile Solutions</span></div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-delay="0.4">
                    <div class="city-pill reveal-up"><strong>Laravel</strong><br><span class="small opacity-75">Enterprise Engines</span></div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-delay="0.5">
                    <div class="city-pill reveal-up"><strong>Node JS</strong><br><span class="small opacity-75">Real-time Data</span></div>
                </div>
            </div>
        </div>
    </section> -->

    <style>
        .city-pill {
            background: white;
            padding: 15px 10px;
            border-radius: 12px;
            text-align: center;
            font-weight: 700;
            color: #1a387f;
            border: 1px solid rgba(26, 56, 127, 0.1);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .city-pill:hover {
            background: #1a387f;
            color: white;
            transform: translateY(-5px);
        }
    </style>
    <section id="solutions" class="solutions-section">
        <div class="horizontal-solutions-container">
            <!-- Header Card -->
            <div class="solutions-header-card reveal-up">
                <span class="section-tag">Industry Expertise</span>
                <h2>Customized Digital Solutions</h2>
                <p class="lead text-muted">Empowering various sectors with high-performance, domain-specific technology.</p>
            </div>

            <!-- Transport & Logistics (FEATURED) -->
            <div class="industry-card featured reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork3.jpg" alt="Shipping">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-ship"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Transport & Logistics</h3>
                        <p>Enterprise-grade platforms for the shipping industry. Container tracking, fleet management, and automated booking systems.</p>
                    </div>
                </div>
            </div>

            <!-- E-Commerce -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork8.jpg" alt="Ecommerce">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="industry-content">
                        <h3>E-Commerce</h3>
                        <p>Powerful stores and mobile apps with secure payments, inventory control, and conversion-optimized UX.</p>
                    </div>
                </div>
            </div>

            <!-- Travel -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork11.avif" alt="Travel">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-plane-departure"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Travel</h3>
                        <p>Simplified booking platforms for hotels and agencies with real-time availability and itinerary management.</p>
                    </div>
                </div>
            </div>

            <!-- Health Care -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork6.avif" alt="Healthcare">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Health Care</h3>
                        <p>Secure patient portals, telemedicine solutions, and operational efficiency tools for clinics and hospitals.</p>
                    </div>
                </div>
            </div>

            <!-- Real Estate -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork1.jpg" alt="Real Estate">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Real Estate</h3>
                        <p>Modern platforms with property listings, virtual tours, and CRM integrations to close deals faster.</p>
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork0.jpg" alt="Education">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Education</h3>
                        <p>Learning Management Systems (LMS), student dashboards, and platforms for seamless digital education.</p>
                    </div>
                </div>
            </div>

            <!-- Utility & On-Demand -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork12.jpg" alt="On Demand">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="industry-content">
                        <h3>On-Demand</h3>
                        <p>Connecting users with service providers instantly via real-time tracking and automated dispatch systems.</p>
                    </div>
                </div>
            </div>

            <!-- Finance -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork10.jpg" alt="Finance">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Finance</h3>
                        <p>Secure digital wallets, transaction systems, and reporting tools with high-level encryption.</p>
                    </div>
                </div>
            </div>

            <!-- Insurance -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork11.jpg" alt="Insurance">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Insurance</h3>
                        <p>Simplified policy management, quote generation, and claims processing for modern agencies.</p>
                    </div>
                </div>
            </div>

            <!-- NGO -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork2.jpg" alt="NGO">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <div class="industry-content">
                        <h3>NGO</h3>
                        <p>Digital solutions for managing donations, campaigns, and storytelling to increase global impact.</p>
                    </div>
                </div>
            </div>

            <!-- Media & Entertainment -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork5.jpg" alt="Media">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-film"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Media</h3>
                        <p>Engaging platforms for content streaming, subscriptions, and high-performance user experiences.</p>
                    </div>
                </div>
            </div>

            <!-- Manufacturing -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork9.jpg" alt="Manufacturing">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-industry"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Manufacturing</h3>
                        <p>Supply chain management, order processing portals, and internal productivity dashboards.</p>
                    </div>
                </div>
            </div>

            <!-- Custom Demand -->
            <div class="industry-card reveal-up">
                <div class="industry-img">
                    <img src="/assets/img/work/mvsoftoffwork4.jpg" alt="Custom">
                </div>
                <div class="card-body">
                    <div class="industry-icon-overlay">
                        <i class="fas fa-magic"></i>
                    </div>
                    <div class="industry-content">
                        <h3>Custom Demand</h3>
                        <p>Tailored high-performance digital solutions that align perfectly with your unique business goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Strategic Roadmap Section -->
    <section class="journey-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-tag reveal-up">Our Process</span>
                <h2 class="display-4 fw-bold text-dark reveal-up">Strategic Roadmap to Success</h2>
                <p class="lead text-muted reveal-up">How we analyze your business problem and provide the best solution.</p>
            </div>

            <div class="roadmap-wrapper">
                <!-- Compact Snaky Road SVG (Height reduced from 1500 to 1000) -->
                <svg class="snaky-road-svg" viewBox="0 0 1000 950" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Outer Glow/Shadow Path -->
                    <path class="road-glow" d="M500 0C500 80 100 120 100 220C100 320 900 340 900 500C900 660 100 680 100 780C100 880 500 900 500 900" stroke="rgba(26, 56, 127, 0.1)" stroke-width="12" stroke-linecap="round" />

                    <!-- Main Road Path -->
                    <path id="mainRoadPath" d="M500 0C500 80 100 120 100 220C100 320 900 340 900 500C900 660 100 680 100 780C100 880 500 900 500 900" stroke="#f0f0f0" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" />

                    <!-- Progress Path -->
                    <path id="roadProgress" d="M500 0C500 80 100 120 100 220C100 320 900 340 900 500C900 660 100 680 100 780C100 880 500 900 500 900" stroke="url(#roadGradient)" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" />

                    <defs>
                        <linearGradient id="roadGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#1a387f" />
                            <stop offset="100%" stop-color="#003aaf" />
                        </linearGradient>
                    </defs>
                </svg>

                <!-- Decorative Environment (Lush Greenery) -->
                <div class="roadmap-environment">
                    <!-- Trees -->
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-1" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-2" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-3" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-4" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-5" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-6" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-7" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-8" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-9" alt="Tree">
                    <img src="assets/img/journey/tree.png" class="road-greenery road-tree tree-10" alt="Tree">
                </div>

                <!-- Floating 3D Bus Marker -->
                <div id="snakyCar" class="snaky-car snaky-bus">
                    <div class="car-3d-wrapper">
                        <img src="assets/img/journey/bus_3d.png" class="car-3d-icon" alt="Bus">
                        <div class="car-light-beams">
                            <div class="light-beam left"></div>
                            <div class="light-beam right"></div>
                        </div>
                    </div>
                </div>

                <!-- Journey Milestones -->
                <div class="journey-milestone milestone-start">
                    <div class="milestone-dot"></div>
                    <div class="milestone-label">Journey Starts Here</div>
                </div>

                <!-- Steps overlay -->
                <div class="steps-overlay">
                    <!-- Step 1 -->
                    <div class="journey-step-v2 step-1" data-progress="0.2">
                        <div class="step-card">
                            <div class="step-illustration">
                                <img src="assets/img/journey/strategy.png" alt="Strategy Icon">
                            </div>
                            <div class="step-badge">Strategy</div>
                            <h3>Consultation</h3>
                            <p>We analyze your needs with deep discovery sessions. <strong>Feature:</strong> Full digital audit.</p>
                            <div class="step-icon"><i class="fas fa-comments"></i></div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="journey-step-v2 step-2" data-progress="0.45">
                        <div class="step-card">
                            <div class="step-illustration">
                                <img src="assets/img/journey/design.png" alt="Design Icon">
                            </div>
                            <div class="step-badge">Creative</div>
                            <h3>UI & UX Design</h3>
                            <p>User-centric wireframing and interactive prototyping. <strong>Feature:</strong> Accessibility focus.</p>
                            <div class="step-icon"><i class="fas fa-bezier-curve"></i></div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="journey-step-v2 step-3" data-progress="0.7">
                        <div class="step-card">
                            <div class="step-illustration">
                                <img src="assets/img/journey/dev.png" alt="Development Icon">
                            </div>
                            <div class="step-badge">Build</div>
                            <h3>Development</h3>
                            <p>High-performance reality using cutting-edge stacks. <strong>Feature:</strong> Daily deployments.</p>
                            <div class="step-icon"><i class="fas fa-rocket"></i></div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="journey-step-v2 step-4" data-progress="0.95">
                        <div class="step-card">
                            <div class="step-illustration">
                                <img src="assets/img/journey/launch.png" alt="Launch Icon">
                            </div>
                            <div class="step-badge">Go-Live</div>
                            <h3>Launch & Success</h3>
                            <p>Seamless Go-Live with 24/7 monitoring. <strong>Feature:</strong> Growth analytics.</p>
                            <div class="step-icon"><i class="fas fa-chart-line"></i></div>
                        </div>
                    </div>

                    <!-- Journey End Milestone -->
                    <div class="journey-milestone milestone-end">
                        <div class="milestone-label">Project Complete</div>
                        <div class="milestone-dot"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies we work with -->
    <section class="tech-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-tag">Our Expertise</span>
                <h2 class="display-4 fw-bold text-dark">Technologies we work with</h2>
                <p class="lead text-muted">We use the latest tools to build cutting-edge digital solutions.</p>
            </div>

            <!-- Horizontal Tab Navigation -->
            <div class="tech-nav-wrapper mb-5">
                <div class="tech-nav-tabs">
                    <button class="tech-nav-btn active" data-tab="frontend">Front End</button>
                    <button class="tech-nav-btn" data-tab="mobile">Mobile</button>
                    <button class="tech-nav-btn" data-tab="backend">Backend</button>
                    <button class="tech-nav-btn" data-tab="frameworks">Frameworks</button>

                    <button class="tech-nav-btn" data-tab="database">Database</button>

                </div>
            </div>

            <!-- Tab Content Panes -->
            <div class="tech-panes-container">
                <!-- Mobile -->
                <div class="tech-content-pane" id="pane-mobile">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-react-original colored"></i>
                                <span>React Native</span>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-react-original colored"></i>
                                <span>React Native</span>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Front End -->
                <div class="tech-content-pane active" id="pane-frontend">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-html5-plain colored"></i>
                                <span>HTML5</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-css3-plain colored"></i>
                                <span>CSS3</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-bootstrap-plain colored"></i>
                                <span>Bootstrap</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-react-original colored"></i>
                                <span>React JS</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-nextjs-plain"></i>
                                <span>Next.js</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-tailwindcss-plain colored"></i>
                                <span>Tailwind</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-vuejs-plain colored"></i>
                                <span>Vue.js</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-javascript-plain colored"></i>
                                <span>ES6+</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backend -->
                <div class="tech-content-pane" id="pane-backend">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-laravel-original colored"></i>
                                <span>Laravel</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-nextjs-plain"></i>
                                <span>Node JS</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-php-plain colored"></i>
                                <span>Core PHP</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-express-original colored"></i>
                                <span>Express</span>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-python-plain colored"></i>
                            <span>Python</span>
                        </div>
                    </div> -->
                    </div>
                </div>

                <!-- Frameworks -->
                <div class="tech-content-pane" id="pane-frameworks">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-express-original colored"></i>
                                <span>Express</span>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-django-plain colored"></i>
                            <span>Django</span>
                        </div>
                    </div> -->
                        <!-- <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-spring-plain colored"></i>
                            <span>Spring Boot</span>
                        </div>
                    </div> -->
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-nextjs-plain"></i>
                                <span>Next.js</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CMS -->
                <!-- <div class="tech-content-pane" id="pane-cms">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-wordpress-plain colored"></i>
                            <span>WordPress</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-magento-original colored"></i>
                            <span>Magento</span>
                        </div>
                    </div>
                </div>
            </div> -->

                <!-- Database -->
                <div class="tech-content-pane" id="pane-database">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-mysql-plain colored"></i>
                                <span>MySQL</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="tech-card">
                                <i class="devicon-mongodb-plain colored"></i>
                                <span>MongoDB</span>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-postgresql-plain colored"></i>
                            <span>PostgreSQL</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-redis-plain colored"></i>
                            <span>Redis</span>
                        </div>
                    </div> -->
                    </div>
                </div>

                <!-- DevOps -->
                <!-- <div class="tech-content-pane" id="pane-devops">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-docker-plain colored"></i>
                            <span>Docker</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-amazonwebservices-original colored"></i>
                            <span>AWS</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-github-original colored"></i>
                            <span>GitHub Actions</span>
                        </div>
                    </div>
                </div>
            </div> -->

                <!-- Ecommerce -->
                <!-- <div class="tech-content-pane" id="pane-ecommerce">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-woocommerce-plain colored"></i>
                            <span>WooCommerce</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="tech-card">
                            <i class="devicon-shopify-plain colored"></i>
                            <span>Shopify Plus</span>
                        </div>
                    </div>
                </div>
            </div> -->
            </div>
        </div>
    </section>

    <!-- Working Culture Section -->
    <section class="culture-section">
        <div class="container">
            <div class="row align-items-end mb-5">
                <div class="col-lg-6">
                    <span class="section-tag reveal-up">Our Vibe</span>
                    <h2 class="display-4 fw-bold text-dark reveal-up">Behind the Code: Our Working Culture</h2>
                </div>
                <div class="col-lg-6">
                    <p class="lead text-muted reveal-up mb-4">We believe that great software is born in an environment of freedom, continuous learning, and shared passion.</p>
                </div>
            </div>

            <div class="culture-grid">
                <!-- Large Item -->
                <div class="culture-item large animate-float">
                    <span class="culture-tag">Deep Work</span>
                    <img src="assets/img/office/mvsoftoff8.jpg" class="img-fluid rounded-4 shadow-lg reveal-up" alt="MVsoftOffice Environment">
                    <div class="culture-overlay">
                        <h4>Flow State</h4>
                        <p>We dedicate hours to uninterrupted "Deep Work" to solve complex logistical challenges with elegant code.</p>
                    </div>
                </div>

                <!-- Tall Item -->
                <div class="culture-item tall">
                    <span class="culture-tag">Creativity</span>
                    <img src="assets/img/office/mvsoftoff10.jpeg" alt="Creative Office">
                    <div class="culture-overlay">
                        <h4>Creative Logic</h4>
                        <p>Thinking outside the box is our standard operating procedure.</p>
                    </div>
                </div>

                <!-- Wide Item -->
                <div class="culture-item wide animate-float">
                    <span class="culture-tag">Collaboration</span>
                    <img src="assets/img/office/mvsoftoff4.jpg" alt="Team Collaboration">
                    <div class="culture-overlay">
                        <h4>Shared Vision</h4>
                        <p>Weekly brainstorming sessions where every voice, from intern to CEO, shapes our product roadmap.</p>
                    </div>
                </div>

                <!-- Small Item -->
                <div class="culture-item">
                    <span class="culture-tag">R&D</span>
                    <img src="assets/img/office/mvsoftoff6.jpg" alt="R&D Lab">
                    <div class="culture-overlay">
                        <h4>Tech Innovation</h4>
                        <p>Exploring AI and Blockchain to revolutionize shipping.</p>
                    </div>
                </div>

                <!-- Small Item -->
                <div class="culture-item animate-float">
                    <span class="culture-tag">Energy</span>
                    <img src="assets/img/office/mvsoftoff1.jpg" alt="Gaming">
                    <div class="culture-overlay">
                        <h4>Work Hard, Play Harder</h4>
                        <p>Gaming breaks and team outings to keep the creative juices flowing.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>