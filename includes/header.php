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
    <title>Mvsoft | Best React, PHP, Flutter & Web Development Hub</title>
    <meta name="description" content="Mvsoft Tech Solutions is the premier hub for React, PHP, Next.js, Laravel, Flutter, and Express development. Leading the digital landscape with elite engineering solutions.">
    <meta name="keywords" content="React development, PHP developers, Next.js, Laravel development, Flutter app development, Express JS, Website development, Best IT company, Mvsoft Tech Solutions, Top software agency">
    <meta name="author" content="Mvsoft Tech Solutions">

    <!-- Global Targeting -->
    <meta name="geo.region" content="IN" />

    <!-- Open Graph / Social Media Meta -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mvsoftsolutions.com/">
    <meta property="og:title" content="Mvsoft | Top Development Hub (React, PHP, Laravel)">
    <meta property="og:description" content="The ultimate destination for React, PHP, Next.js, Laravel, Flutter, and Express engineering. Dominating the tech space globally.">
    <meta property="og:image" content="assets/img/logo1.png">

    <!-- Schema.js (JSON-LD) for SEO -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Mvsoft Tech Solutions",
            "url": "https://mvsoftsolutions.com/",
            "logo": "https://mvsoftsolutions.com/assets/img/logo1.png",
            "sameAs": [
                "https://www.linkedin.com/company/mvsoft-solutions/",
                "https://www.instagram.com/mvsoftsolutions/"
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
            "name": "Mvsoft Tech Solutions",
            "image": "https://mvsoftsolutions.com/assets/img/logo1.png",
            "@id": "",
            "url": "https://mvsoftsolutions.com/",
            "telephone": "02836-465134",
            "priceRange": "$$",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Plot no 300, Ward: 12/b, Shree Ambika Arcade, Office no 106, 1st Floor",
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Raleway -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/mvsoftfav.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Devicons for Tech Stack -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <!-- reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LcNmGUsAAAAAFqQA9y7Fqi_8yRQF7QvsnHpS4Qu"></script>
    <!-- Three.js and lil-gui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lil-gui@0.17.0/dist/lil-gui.umd.min.js"></script>
    <!-- Stats.js -->
    <script src="https://cdn.jsdelivr.net/npm/stats.js@0.17.0/build/stats.min.js"></script>
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
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
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