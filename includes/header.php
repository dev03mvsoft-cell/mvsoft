<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mvsoft Tech Solutions - Leading provider of innovative 3D web experiences, high-performance scalable apps, and elite digital engineering.">
    <meta name="keywords" content="web development, 3D web design, React JS, Next.js, Laravel, PHP, AI solutions, digital transformation, Mvsoft">
    <meta name="author" content="Mvsoft Tech Solutions">
    <title>Mvsoft | Elite Web Development & 3D Digital Solutions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Raleway -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Devicons for Tech Stack -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <!-- Three.js and lil-gui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lil-gui@0.17.0/dist/lil-gui.umd.min.js"></script>
    <!-- Stats.js -->
    <script src="https://cdn.jsdelivr.net/npm/stats.js@0.17.0/build/stats.min.js"></script>
    <!-- Lenis Smooth Scroll CSS -->
    <style>
        html.lenis {
            height: auto;
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
    <link rel="stylesheet" href="assets/css/style.css">

    <?php
    // Determine current page for conditional assets
    $current_uri = $_SERVER['REQUEST_URI'];
    $nexus_pages = ['about', 'contact', 'career', 'services', 'web-design', 'app-development', 'backend-solutions', 'seo-optimization', 'digital-marketing', 'email-campaigns', 'cloud-hosting', 'cybersecurity', 'server-management'];
    $is_nexus = false;
    foreach ($nexus_pages as $np) {
        if (strpos($current_uri, $np) !== false) {
            $is_nexus = true;
            break;
        }
    }
    if ($is_nexus): ?>
        <link rel="stylesheet" href="assets/css/nexus.css">
    <?php endif; ?>
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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
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
                                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
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
                                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
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
                                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                                    <h6 class="fw-bold mb-3 d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#cloudCollapse" role="button">
                                        Cloud <i class="fas fa-cloud"></i> <i class="fas fa-chevron-down d-lg-none"></i>
                                    </h6>
                                    <div class="collapse d-lg-block" id="cloudCollapse">
                                        <a class="mega-link" href="cloud-hosting"><i class="fas fa-cloud"></i> Cloud Hosting</a>
                                        <a class="mega-link" href="cybersecurity"><i class="fas fa-shield-alt"></i> Cybersecurity</a>
                                        <a class="mega-link" href="server-management"><i class="fas fa-server"></i> Server Management</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-0">
                                    <h6 class="fw-bold mb-3 d-flex justify-content-between align-items-center"
                                        data-bs-toggle="collapse" data-bs-target="#companyCollapse" role="button">
                                        Company <i class="fas fa-chevron-down d-lg-none"></i>
                                    </h6>
                                    <div class="collapse d-lg-block" id="companyCollapse">
                                        <a class="mega-link" href="about"><i class="fas fa-info-circle"></i> About Us</a>
                                        <a class="mega-link" href="home#team"><i class="fas fa-users"></i> Our Team</a>
                                        <a class="mega-link" href="contact"><i class="fas fa-phone-alt"></i> Contact Sales</a>
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