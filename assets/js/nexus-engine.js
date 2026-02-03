
import * as THREE from "https://esm.sh/three@0.178.0";

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

        this.settings = {
            sphereCount: this.isMobile ? 6 : 12,
            ambientIntensity: 0.1,
            diffuseIntensity: 0.4,
            specularIntensity: 1.0,
            specularPower: 12,
            fresnelPower: 2.5,
            backgroundColor: new THREE.Color(0xffffff),
            sphereColor: new THREE.Color(0xf0f0f0),
            lightColor: new THREE.Color(0x1a387f), // Mvsoft Blue
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

        const dpr = Math.min(window.devicePixelRatio, 2);
        this.renderer.setPixelRatio(dpr);
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        this.container.appendChild(this.renderer.domElement);

        this.createMaterial(dpr);

        const geometry = new THREE.PlaneGeometry(2, 2);
        const mesh = new THREE.Mesh(geometry, this.material);
        this.scene.add(mesh);

        window.addEventListener('mousemove', (e) => this.onMouseMove(e));
        window.addEventListener('resize', () => this.onResize());

        this.animate();
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
                uSphereCount: { value: this.settings.sphereCount },
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
                uniform vec3 uBackgroundColor;
                uniform vec3 uSphereColor;
                uniform vec3 uLightColor;
                uniform vec3 uLightPosition;
                uniform float uContrast;
                uniform float uFogDensity;
                uniform float uAnimationSpeed;
                uniform float uMovementScale;
                uniform float uCursorGlowIntensity;
                uniform float uCursorGlowRadius;
                vec3 uCursorGlowColor = vec3(0.1, 0.22, 0.69); // Hardcoded Mvsoft blue for glow

                varying vec2 vUv;
                const float MAX_DIST = 100.0;
                const float EPSILON = 0.001;

                float smin(float a, float b, float k) {
                    float h = max(k - abs(a - b), 0.0) / k;
                    return min(a, b) - h * h * k * 0.25;
                }

                float sdSphere(vec3 p, float r) {
                    return length(p) - r;
                }

                vec3 screenToWorld(vec2 pos) {
                    vec2 uv = pos * 2.0 - 1.0;
                    uv.x *= uResolution.x / uResolution.y;
                    return vec3(uv * 2.0, 0.0);
                }

                float sceneSDF(vec3 pos) {
                    float result = MAX_DIST;
                    float t = uTime * uAnimationSpeed;
                    float aspect = uResolution.x / uResolution.y;
                    
                    for (int i = 0; i < 15; i++) {
                        if (i >= uSphereCount) break;
                        float fi = float(i);
                        
                        // Create unique anchors for bubbles to spread them out
                        // We use the index to scatter them in different quadrants
                        vec3 anchor = vec3(0.0);
                        if (i == 0) anchor = vec3(-aspect * 1.4, 1.2, 0.0); // Top Left
                        else if (i == 1) anchor = vec3(aspect * 1.4, -1.2, 0.0); // Bottom Right
                        else if (i == 2) anchor = vec3(-aspect * 1.2, -1.0, 0.0); // Bottom Left
                        else if (i == 3) anchor = vec3(aspect * 1.2, 1.0, 0.0); // Top Right
                        else if (i == 4) anchor = vec3(0.0, 1.5, 0.0); // Top Center
                        else if (i == 5) anchor = vec3(0.0, -1.5, 0.0); // Bottom Center
                        else if (i >= 6) {
                            // Scatter the rest randomly based on index
                            anchor = vec3(
                                sin(fi * 1.3) * aspect * 1.5,
                                cos(fi * 0.9) * 1.5,
                                sin(fi * 2.1) * 0.1
                            );
                        }

                        float speed = 0.3 + fi * 0.08;
                        float radius = 0.18 + mod(fi, 4.0) * 0.06;
                        float orbitSize = (0.6 + mod(fi, 3.0) * 0.3) * uMovementScale;
                        float phase = fi * 1.57;
                        
                        vec3 movement = vec3(
                            sin(t * speed + phase) * orbitSize,
                            cos(t * speed * 0.7 + phase * 1.3) * orbitSize * 0.8,
                            sin(t * speed * 0.4 + phase) * 0.3
                        );
                        
                        vec3 bubblePos = anchor + movement;
                        
                        // Attraction to cursor if close
                        vec3 toCursor = uCursorSphere - bubblePos;
                        float distToCursor = length(toCursor);
                        if(distToCursor < uMergeDistance) {
                            bubblePos += normalize(toCursor) * (1.0 - distToCursor/uMergeDistance) * 0.5;
                        }
                        
                        result = smin(result, sdSphere(pos - bubblePos, radius), uSmoothness);
                    }
                    
                    result = smin(result, sdSphere(pos - uCursorSphere, uCursorRadius), uSmoothness * 1.2);
                    return result;
                }

                vec3 calcNormal(vec3 p) {
                    vec2 e = vec2(1.0, -1.0) * 0.0005;
                    return normalize(
                        e.xyy * sceneSDF(p + e.xyy) +
                        e.yyx * sceneSDF(p + e.yyx) +
                        e.yxy * sceneSDF(p + e.yxy) +
                        e.xxx * sceneSDF(p + e.xxx)
                    );
                }

                void main() {
                    vec2 uv = (gl_FragCoord.xy * 2.0 - uActualResolution.xy) / uActualResolution.xy;
                    uv.x *= uResolution.x / uResolution.y;
                    
                    vec3 ro = vec3(uv * 2.0, -1.0);
                    vec3 rd = vec3(0.0, 0.0, 1.0);
                    
                    float t = 0.0;
                    float d;
                    for(int i=0; i<40; i++) {
                        d = sceneSDF(ro + rd * t);
                        if(d < EPSILON || t > 5.0) break;
                        t += d;
                    }
                    
                    vec3 color = uBackgroundColor;
                    
                    if(t < 5.0) {
                        vec3 p = ro + rd * t;
                        vec3 n = calcNormal(p);
                        vec3 v = -rd;
                        vec3 l = normalize(uLightPosition);
                        
                        float diff = max(dot(n, l), 0.0);
                        float fresnel = pow(1.0 - max(dot(n, v), 0.0), uFresnelPower);
                        
                        vec3 spec = uLightColor * pow(max(dot(reflect(-l, n), v), 0.0), uSpecularPower);
                        
                        color = uSphereColor + diff * uDiffuseIntensity * uLightColor + fresnel * 0.3 * uLightColor + spec * uSpecularIntensity;
                        color = mix(color, uBackgroundColor, smoothstep(0.0, 5.0, t) * uFogDensity);
                    }
                    
                    // Cursor Glow
                    float glow = 1.0 - smoothstep(0.0, uCursorGlowRadius, length(ro.xy - uCursorSphere.xy));
                    color += uCursorGlowColor * pow(glow, 3.0) * uCursorGlowIntensity;
                    
                    gl_FragColor = vec4(color, 1.0);
                }
            `,
            transparent: true
        });
    }

    onMouseMove(e) {
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
