<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    // Cache busting helper
    if (!function_exists('asset_v')) {
        function asset_v($path)
        {
            $fullPath = __DIR__ . '/../' . $path;
            $v = file_exists($fullPath) ? filemtime($fullPath) : time();
            return $path . '?v=' . $v;
        }
    }
    ?>

    <!-- SEO Optimization -->
    <title>MVsoft| Best React, PHP, Laravel & Web Development Hub</title>
    <meta name="description" content="MVsoft Solutions  is the premier hub for React, PHP, Next.js, Laravel, React Native, and Express development. Leading the digital landscape with elite engineering solutions.">
    <meta name="keywords" content="React development, PHP developers, Next.js, Laravel development, React Native app development, Express JS, Website development, Best IT company, MVsoft Solutions , Top software agency">
    <meta name="author" content="MVsoft Solutions ">

    <!-- Global Targeting -->
    <meta name="geo.region" content="IN" />

    <!-- Open Graph / Social Media Meta -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://MVsoft Solutions .com/">
    <meta property="og:title" content="MVsoft| Top Development Hub (React, PHP, Laravel)">
    <meta property="og:description" content="The ultimate destination for React, PHP, Next.js, Laravel, React Native, and Express engineering. Dominating the tech space globally.">
    <meta property="og:image" content="assets/img/logo1.png">

    <!-- Schema.js (JSON-LD) for SEO -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "MVsoft Solutions ",
            "url": "https://MVsoft Solutions .com/",
            "logo": "https://MVsoft Solutions .com/assets/img/logo1.png",
            "sameAs": [
                "https://www.linkedin.com/company/mvsoft-solutions/",
                "https://www.instagram.com/MVsoft Solutions ?utm_source=qr&igsh=MTFoNjcxNjhhZXA2Mg%3D%3D"
            ],
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+91-02836-465134",
                "contactType": "customer service",
                "areaServed": ["IN", "US", "AE"],
                "availableLanguage": ["English", "Hindi", "Gujarati"]
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "MVsoft Solutions ",
            "image": "https://MVsoft Solutions .com/assets/img/logo1.png",
            "@id": "",
            "url": "https://MVsoft Solutions .com/",
            "telephone": "02836-465134",
            "priceRange": "$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "No 106, 1st Floor, Shree Ambika Arcade, Plot no 300, Ward: 12/b, Gandhidham(Kutch) Gujarat, India",
                "addressLocality": "Online/Global",
                "addressRegion": "International",
                "postalCode": "370201",
                "addressCountry": "IN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 23.0763,
                "longitude": 70.1270
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ],
                "opens": "10:00",
                "closes": "18:00"
            }
        }
    </script>
    <!-- Bootstrap CSS -->
    <link href="<?= asset_v('assets/vendor/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Google Fonts: Raleway -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/mvsoftfav.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= asset_v('assets/vendor/css/all.min.css') ?>">
    <!-- Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Devicons for Tech Stack -->
    <link rel="stylesheet" href="<?= asset_v('assets/vendor/css/devicon.min.css') ?>">
    <!-- reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LcNmGUsAAAAAFqQA9y7Fqi_8yRQF7QvsnHpS4Qu"></script>
    <!-- Three.js and lil-gui -->
    <script src="<?= asset_v('assets/vendor/js/three.min.js') ?>"></script>
    <script src="<?= asset_v('assets/vendor/js/lil-gui.umd.min.js') ?>"></script>
    <!-- Stats.js -->
    <script src="<?= asset_v('assets/vendor/js/stats.min.js') ?>"></script>
    <!-- Lenis Smooth Scroll CSS -->
    <style>
        html.lenis {
            height: auto;
            overflow-x: hidden;
        }

        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }

        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }

        .lenis.lenis-stopped {
            overflow: hidden;
        }

        .lenis.lenis-scrolling iframe {
            pointer-events: none;
        }

        /* Custom Reveal Animations */
        [class*="reveal-"] {
            opacity: 0;
            transition: none;
        }

        .reveal-up {
            transform: translateY(50px);
        }

        .reveal-down {
            transform: translateY(-50px);
        }

        .reveal-left {
            transform: translateX(50px);
        }

        .reveal-right {
            transform: translateX(-50px);
        }

        .reveal-scale {
            transform: scale(0.9);
        }

        /* --- Professional Preloader Styles --- */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            transition: opacity 0.6s cubic-bezier(0.65, 0, 0.35, 1), visibility 0.6s;
        }

        #preloader.loaded {
            opacity: 0;
            visibility: hidden;
        }

        .loader-logo {
            width: 120px;
            margin-bottom: 30px;
            animation: pulse-logo 2s infinite ease-in-out;
        }

        .loader-bar-container {
            width: 200px;
            height: 2px;
            background: rgba(26, 56, 127, 0.1);
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }

        .loader-bar {
            width: 100%;
            height: 100%;
            background: #1a387f;
            position: absolute;
            left: -100%;
            animation: load-animation 2s infinite cubic-bezier(0.65, 0, 0.35, 1);
        }

        .loader-text {
            margin-top: 15px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #1a387f;
            font-weight: 700;
            opacity: 0.8;
        }

        @keyframes load-animation {
            0% {
                left: -100%;
            }

            50% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes pulse-logo {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(0.95);
                opacity: 0.8;
            }
        }
    </style>
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= asset_v('assets/css/style.css') ?>">

    <?php
    // Determine current page for conditional assets
    $current_uri = $_SERVER['REQUEST_URI'];
    $nexus_pages = ['about', 'contact', 'career', 'services', 'web-design', 'app-development', 'backend-solutions', 'seo-optimization', 'digital-marketing', 'email-campaigns'];
    $is_nexus = false;
    foreach ($nexus_pages as $np) {
        if (strpos($current_uri, $np) !== false) {
            $is_nexus = true;
            break;
        }
    }
    if ($is_nexus): ?>
        <link rel="stylesheet" href="<?= asset_v('assets/css/nexus.css') ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?= asset_v('assets/css/magnetic-btn.css') ?>">
    <link rel="stylesheet" href="<?= asset_v('assets/css/toaster.css') ?>">

</head>

<body>
    <!-- Professional Preloader -->
    <div id="preloader">
        <script>
            // Instant session check to prevent flash
            if (sessionStorage.getItem('preloaderSeen')) {
                document.getElementById('preloader').style.display = 'none';
            }
        </script>
        <img src="assets/img/mvsoftfav.png" alt="Mvsoft" class="loader-logo">
        <div class="loader-bar-container">
            <div class="loader-bar"></div>
        </div>
        <div class="loader-text">Loading Excellence</div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <img src="assets/img/logo1.png" alt="">
            </a>

            <!-- Hot Expertise Animation Container (Moved out of collapse for animation visibility) -->
            <div class="align-items-center expertise-container">
                <span class="small fw-bold text-muted me-2">WE WORK ON</span>
                <div class="expertise-carousel">
                    <i class="devicon-bootstrap-plain colored"></i>
                    <i class="devicon-javascript-plain colored"></i>
                    <i class="devicon-php-plain colored"></i>
                    <i class="devicon-react-original colored"></i>
                    <i class="devicon-nextjs-original-wordmark colored"></i>
                    <i class="devicon-laravel-original colored"></i>
                    <i class="devicon-vuejs-plain colored"></i>
                    <i class="devicon-mysql-original colored"></i>
                </div>
            </div>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About</a>
                    </li>
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle" href="services" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu mega-menu p-4 shadow-lg border-0" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <!-- Mobile Accordion Logic -->
                                <div class="col-lg-4 col-md-6 mb-3 mb-lg-0">
                                    <h6 class="fw-bold mb-3 d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#devCollapse" role="button">
                                        Development <i class="fas fa-chevron-down d-lg-none"></i>
                                    </h6>
                                    <div class="collapse d-lg-block" id="devCollapse">
                                        <a class="mega-link" href="web-design"><i class="fas fa-code"></i> Web Design</a>
                                        <a class="mega-link" href="app-development"><i class="fas fa-mobile-alt"></i> App Development</a>
                                        <a class="mega-link" href="backend-solutions"><i class="fas fa-database"></i> Backend Solutions</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3 mb-lg-0">
                                    <h6 class="fw-bold mb-3 d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#marketingCollapse" role="button">
                                        Marketing <i class="fas fa-chevron-down d-lg-none"></i>
                                    </h6>
                                    <div class="collapse d-lg-block" id="marketingCollapse">
                                        <a class="mega-link" href="seo-optimization"><i class="fas fa-bullhorn"></i> SEO Optimization</a>
                                        <a class="mega-link" href="digital-marketing"><i class="fas fa-chart-line"></i> Digital Marketing</a>
                                        <a class="mega-link" href="email-campaigns"><i class="fas fa-envelope"></i> Email Campaigns</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-0">
                                    <h6 class="fw-bold mb-3 d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#companyCollapse" role="button">
                                        Company <i class="fas fa-chevron-down d-lg-none"></i>
                                    </h6>
                                    <div class="collapse d-lg-block" id="companyCollapse">
                                        <a class="mega-link" href="about"><i class="fas fa-info-circle"></i> About Us</a>
                                        <a class="mega-link" href="home#team"><i class="fas fa-users"></i> Our Team</a>
                                        <a class="mega-link" href="contact"><i class="fas fa-phone"></i> Contact Sales</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="career">Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>