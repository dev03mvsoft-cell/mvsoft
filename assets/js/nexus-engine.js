
class NexusEngine {
    constructor() {
        this.container = null;
        this.scene = null;
        this.camera = null;
        this.renderer = null;
        this.material = null;
        this.clock = new THREE.Clock();
        this.mouse = { x: 0.5, y: 0.5 };
        this.targetMouse = { x: 0.5, y: 0.5 };
        this.cursorSphere3D = new THREE.Vector3(0, 0, 0);
        this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        this.isPaused = true;
        this.lastMouseMove = 0;

        this.settings = {
            sphereCount: this.isMobile ? 6 : 12,
            ambientIntensity: 0.1,
            diffuseIntensity: 0.4,
            specularIntensity: 1.0,
            specularPower: 12,
            fresnelPower: 2.5,
            backgroundColor: new THREE.Color(0xffffff),
            sphereColor: new THREE.Color(0xf0f0f0),
            lightColor: new THREE.Color(0x1a387f), // MVsoft Blue
            lightPosition: new THREE.Vector3(1, 1, 1),
            smoothness: 0.6,
            contrast: 1.2,
            fogDensity: 0.05,
            cursorGlowIntensity: 0.2,
            cursorGlowRadius: 1.5,
            cursorGlowColor: new THREE.Color(0x1a387f),
            cursorRadiusMin: 0.1,
            cursorRadiusMax: 0.2,
            animationSpeed: 0.4,
            movementScale: 1.0,
            mouseSmoothness: 0.05,
            mergeDistance: 2.0
        };
    }

    init() {
        this.container = document.createElement('div');
        this.container.id = 'nexus-container';
        document.body.prepend(this.container);

        this.scene = new THREE.Scene();
        this.camera = new THREE.OrthographicCamera(-1, 1, 1, -1, 0.1, 10);
        this.camera.position.z = 1;

        this.renderer = new THREE.WebGLRenderer({
            antialias: true,
            alpha: true,
            powerPreference: "high-performance"
        });

        const dpr = Math.min(window.devicePixelRatio, 1.5); // Capped at 1.5 for better performance
        this.renderer.setPixelRatio(dpr);
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        this.container.appendChild(this.renderer.domElement);

        this.createMaterial(dpr);

        const geometry = new THREE.PlaneGeometry(2, 2);
        const mesh = new THREE.Mesh(geometry, this.material);
        this.scene.add(mesh);

        window.addEventListener('mousemove', (e) => this.onMouseMove(e));
        window.addEventListener('resize', () => this.onResize());

        this.setupVisibility();
    }

    setupVisibility() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.isPaused = false;
                    this.animate();
                } else {
                    this.isPaused = true;
                }
            });
        }, { threshold: 0.1 });
        observer.observe(this.container);
    }

    createMaterial(dpr) {
        this.material = new THREE.ShaderMaterial({
            uniforms: {
                uTime: { value: 0 },
                uResolution: { value: new THREE.Vector2(window.innerWidth, window.innerHeight) },
                uActualResolution: { value: new THREE.Vector2(window.innerWidth * dpr, window.innerHeight * dpr) },
                uPixelRatio: { value: dpr },
                uMousePosition: { value: new THREE.Vector2(0.5, 0.5) },
                uCursorSphere: { value: new THREE.Vector3(0, 0, 0) },
                uCursorRadius: { value: this.settings.cursorRadiusMin },
                uSphereCount: { value: this.isMobile ? 4 : 8 }, // Controlled directly for speed
                uMergeDistance: { value: this.settings.mergeDistance },
                uSmoothness: { value: this.settings.smoothness },
                uAmbientIntensity: { value: this.settings.ambientIntensity },
                uDiffuseIntensity: { value: this.settings.diffuseIntensity },
                uSpecularIntensity: { value: this.settings.specularIntensity },
                uSpecularPower: { value: this.settings.specularPower },
                uFresnelPower: { value: this.settings.fresnelPower },
                uBackgroundColor: { value: this.settings.backgroundColor },
                uSphereColor: { value: this.settings.sphereColor },
                uLightColor: { value: this.settings.lightColor },
                uLightPosition: { value: this.settings.lightPosition },
                uContrast: { value: this.settings.contrast },
                uFogDensity: { value: this.settings.fogDensity },
                uAnimationSpeed: { value: this.settings.animationSpeed },
                uMovementScale: { value: this.settings.movementScale },
                uCursorGlowIntensity: { value: this.settings.cursorGlowIntensity },
                uCursorGlowRadius: { value: this.settings.cursorGlowRadius },
                uCursorGlowColor: { value: this.settings.cursorGlowColor }
            },
            vertexShader: `
                varying vec2 vUv;
                void main() {
                    vUv = uv;
                    gl_Position = vec4(position, 1.0);
                }
            `,
            fragmentShader: `
                precision highp float;
                uniform float uTime;
                uniform vec2 uResolution;
                uniform vec2 uActualResolution;
                uniform vec2 uMousePosition;
                uniform vec3 uCursorSphere;
                uniform float uCursorRadius;
                uniform int uSphereCount;
                uniform float uMergeDistance;
                uniform float uSmoothness;
                uniform float uAmbientIntensity;
                uniform float uDiffuseIntensity;
                uniform float uSpecularIntensity;
                uniform float uSpecularPower;
                uniform float uFresnelPower;
                vec3 uBackgroundColor = vec3(1.0);
                vec3 uSphereColor = vec3(0.94);
                vec3 uLightColor = vec3(0.1, 0.22, 0.5);
                uniform vec3 uLightPosition;
                uniform float uContrast;
                uniform float uFogDensity;
                uniform float uAnimationSpeed;
                uniform float uMovementScale;
                uniform float uCursorGlowIntensity;
                uniform float uCursorGlowRadius;
                vec3 gColor = vec3(0.1, 0.22, 0.69);

                varying vec2 vUv;
                const float MAX_DIST = 8.0;
                const float EPSILON = 0.002; // Increased for performance

                float smin(float a, float b, float k) {
                    float h = max(k - abs(a - b), 0.0) / k;
                    return min(a, b) - h * h * k * 0.25;
                }

                float sdSphere(vec3 p, float r) {
                    return length(p) - r;
                }

                float sceneSDF(vec3 pos) {
                    float result = MAX_DIST;
                    float t = uTime * uAnimationSpeed;
                    float aspect = uResolution.x / uResolution.y;
                    
                    for (int i = 0; i < 8; i++) {
                        if (i >= uSphereCount) break;
                        float fi = float(i);
                        
                        vec3 anchor = vec3(
                            sin(fi * 1.5) * aspect * 1.2,
                            cos(fi * 0.7) * 1.2,
                            sin(fi * 2.0) * 0.1
                        );

                        float speed = 0.4 + fi * 0.05;
                        float radius = 0.2 + mod(fi, 3.0) * 0.05;
                        float orbitSize = (0.5 + mod(fi, 2.0) * 0.4) * uMovementScale;
                        float phase = fi * 1.2;
                        
                        vec3 movement = vec3(
                            sin(t * speed + phase) * orbitSize,
                            cos(t * speed * 0.8 + phase) * orbitSize,
                            0.0
                        );
                        
                        vec3 bubblePos = anchor + movement;
                        result = smin(result, sdSphere(pos - bubblePos, radius), uSmoothness);
                    }
                    
                    result = smin(result, sdSphere(pos - uCursorSphere, uCursorRadius), uSmoothness * 1.1);
                    return result;
                }

                vec3 calcNormal(vec3 p) {
                    vec2 e = vec2(0.001, 0.0);
                    return normalize(vec3(
                        sceneSDF(p + e.xyy) - sceneSDF(p - e.xyy),
                        sceneSDF(p + e.yxy) - sceneSDF(p - e.yxy),
                        sceneSDF(p + e.yyx) - sceneSDF(p - e.yyx)
                    ));
                }

                void main() {
                    vec2 uv = (gl_FragCoord.xy * 2.0 - uActualResolution.xy) / uActualResolution.xy;
                    uv.x *= uResolution.x / uResolution.y;
                    
                    vec3 ro = vec3(uv * 2.0, -2.0);
                    vec3 rd = vec3(0.0, 0.0, 1.0);
                    
                    float t = 0.0;
                    float d;
                    // Significantly reduced steps for performance
                    int steps = ${this.isMobile ? '12' : '20'};
                    for(int i=0; i<20; i++) {
                        if(i >= steps) break;
                        d = sceneSDF(ro + rd * t);
                        if(d < EPSILON || t > MAX_DIST) break;
                        t += d;
                    }
                    
                    vec3 color = uBackgroundColor;
                    
                    if(t < MAX_DIST) {
                        vec3 p = ro + rd * t;
                        vec3 n = calcNormal(p);
                        vec3 l = normalize(uLightPosition);
                        
                        float diff = max(dot(n, l), 0.0);
                        float fresnel = pow(1.0 - max(dot(n, -rd), 0.0), uFresnelPower);
                        vec3 spec = uLightColor * pow(max(dot(reflect(-l, n), -rd), 0.0), uSpecularPower);
                        
                        color = uSphereColor + diff * uDiffuseIntensity * uLightColor + fresnel * 0.2 * uLightColor + spec * uSpecularIntensity;
                    }
                    
                    // Optimized Glow
                    float glowDist = length(ro.xy - uCursorSphere.xy);
                    if (glowDist < uCursorGlowRadius) {
                        float glow = 1.0 - (glowDist / uCursorGlowRadius);
                        color += gColor * pow(glow, 3.0) * uCursorGlowIntensity;
                    }
                    
                    gl_FragColor = vec4(color, 1.0);
                }
            `,
            transparent: true
        });
    }

    onMouseMove(e) {
        const now = performance.now();
        if (now - this.lastMouseMove < 16) return; // Throttle to ~60fps
        this.lastMouseMove = now;
        this.targetMouse.x = e.clientX / window.innerWidth;
        this.targetMouse.y = 1.0 - (e.clientY / window.innerHeight);
    }

    onResize() {
        const w = window.innerWidth;
        const h = window.innerHeight;
        const dpr = Math.min(window.devicePixelRatio, 2);

        this.renderer.setSize(w, h);
        this.renderer.setPixelRatio(dpr);
        this.material.uniforms.uResolution.value.set(w, h);
        this.material.uniforms.uActualResolution.value.set(w * dpr, h * dpr);
    }

    animate() {
        if (this.isPaused) return;
        requestAnimationFrame(() => this.animate());

        const dt = this.clock.getDelta();
        this.mouse.x += (this.targetMouse.x - this.mouse.x) * this.settings.mouseSmoothness;
        this.mouse.y += (this.targetMouse.y - this.mouse.y) * this.settings.mouseSmoothness;

        this.cursorSphere3D.copy(this.screenToWorldSpace(this.mouse.x, this.mouse.y));

        this.material.uniforms.uTime.value = this.clock.getElapsedTime();
        this.material.uniforms.uMousePosition.value.set(this.mouse.x, this.mouse.y);
        this.material.uniforms.uCursorSphere.value.copy(this.cursorSphere3D);

        this.renderer.render(this.scene, this.camera);
    }

    screenToWorldSpace(nx, ny) {
        const uvx = nx * 2.0 - 1.0;
        const uvy = ny * 2.0 - 1.0;
        const aspect = window.innerWidth / window.innerHeight;
        return new THREE.Vector3(uvx * aspect * 2.0, uvy * 2.0, 0.0);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const engine = new NexusEngine();
    engine.init();
});
