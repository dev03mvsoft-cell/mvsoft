<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Optimization -->
    <title>MVsoft Portal | Digital Innovation Hub - Next-Gen Tech Experiences</title>
    <meta name="description" content="Enter the MVsoft Solutions Portal. A gateway to next-gen digital experiences, immersive 3D technology, and elite software engineering.">
    <meta name="keywords" content="MVsoft Portal, 3D Web Experiences, Digital Innovation, Next-Gen Tech, MVsoft Solutions, Tech Gateway">
    <meta name="author" content="MVsoft Solutions">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="MVsoft Portal | Immersive Tech Gateway">
    <meta property="og:description" content="Experience the future of digital engineering. The official portal of MVsoft Solutions.">
    <meta property="og:image" content="../assets/img/logo1.png">

    <link rel="stylesheet" href="assets/css/portal.css">
</head>

<body>
    <div id="portal-container">
        <canvas id="portal-canvas"></canvas>
    </div>

    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.124.0/build/three.module.js",
                "three/examples/jsm/controls/OrbitControls": "https://unpkg.com/three@0.124.0/examples/jsm/controls/OrbitControls.js",
                "three/examples/jsm/postprocessing/EffectComposer": "https://unpkg.com/three@0.124.0/examples/jsm/postprocessing/EffectComposer.js",
                "three/examples/jsm/postprocessing/RenderPass": "https://unpkg.com/three@0.124.0/examples/jsm/postprocessing/RenderPass.js",
                "three/examples/jsm/postprocessing/UnrealBloomPass": "https://unpkg.com/three@0.124.0/examples/jsm/postprocessing/UnrealBloomPass.js",
                "three/examples/jsm/curves/CurveExtras": "https://unpkg.com/three@0.124.0/examples/jsm/curves/CurveExtras.js"
            }
        }
    </script>

    <script type="module" src="assets/js/portal.js"></script>
</body>

</html>