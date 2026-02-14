import * as THREE from 'three';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';
import { EffectComposer } from 'three/examples/jsm/postprocessing/EffectComposer';
import { RenderPass } from 'three/examples/jsm/postprocessing/RenderPass';
import { UnrealBloomPass } from 'three/examples/jsm/postprocessing/UnrealBloomPass';
import { Curves } from 'three/examples/jsm/curves/CurveExtras';

// ---- setup renderer ----
const canvas = document.getElementById('portal-canvas');
const renderer = new THREE.WebGLRenderer({ canvas, antialias: true });
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.01, 5000);

renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setClearColor(0x000000, 1);
renderer.autoClear = false;

console.log("Renderer initialized:", renderer);

// ---- transition logic ----
console.log("Transition Logic Initialized");
const urlParams = new URLSearchParams(window.location.search);
let nextPath = urlParams.get('next') || 'profile/';
const transitionDelay = 7000; // 7 seconds

console.log("Target Path:", nextPath);

// Create overlay element
const overlay = document.createElement('div');
overlay.className = 'transition-overlay';
overlay.innerText = 'Redirecting to Studio...';
const container = document.getElementById('portal-container');
if (container) {
    container.appendChild(overlay);
    console.log("Overlay added to container");
} else {
    console.warn("portal-container not found!");
}

// Redirection timer
console.log(`Setting timer for ${transitionDelay}ms`);
setTimeout(() => {
    console.log("Timer expired, redirecting to:", nextPath);
    // Ensure relative path works
    window.location.href = nextPath;
}, transitionDelay);


// ---- resize handler ----
window.addEventListener('resize', () => {
    const w = window.innerWidth;
    const h = window.innerHeight;
    renderer.setSize(w, h);
    camera.aspect = w / h;
    camera.updateProjectionMatrix();
    composer.setSize(w, h);
});

// ---- torus knot tunnel setup ----
scene.background = new THREE.Color('black');
scene.fog = new THREE.FogExp2('black', 0.05);
scene.add(new THREE.HemisphereLight('cyan', 'orange', 2));

const mpms = 20 / 1e3;
const steps = 2000;

// Correct shape for the road
const shape = new THREE.Shape();
shape.moveTo(-5, -1);
shape.quadraticCurveTo(0, -4, 5, -1);
shape.lineTo(6, -1);
shape.quadraticCurveTo(0, -5, -6, -1);

const extrudePath = new Curves.TorusKnot();

// UV Generator for road logic
const UVGenerator = (() => {
    let i = 0; // face id
    return {
        generateTopUV(...xs) {
            return [new THREE.Vector2(), new THREE.Vector2(), new THREE.Vector2()];
        },
        generateSideWallUV(_geom, _vs, _a, _b, _c, _d) {
            const segments = 5;
            if (i < segments * steps) {
                ++i;
                return [new THREE.Vector2(), new THREE.Vector2(), new THREE.Vector2(), new THREE.Vector2()];
            }
            const n = i - segments * steps;
            const total_col_segments = 7;
            const col = n / steps | 0;
            const left = col / total_col_segments;
            const right = (col + 1) / total_col_segments;
            const row = n % steps;
            const bottom = row / steps;
            const top = (row + 1) / steps;
            ++i;
            return [
                new THREE.Vector2(left, bottom),
                new THREE.Vector2(right, bottom),
                new THREE.Vector2(right, top),
                new THREE.Vector2(left, top)
            ];
        }
    };
})();

const extrudeGeom = new THREE.ExtrudeBufferGeometry(shape, {
    bevelEnabled: false,
    steps,
    extrudePath,
    curveSegments: 5,
    UVGenerator
});

// Sidewall material logic (the road design)
function createSidewallMaterial() {
    const url = 'https://images.unsplash.com/photo-1550747528-cdb45925b3f7?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8dW5pY29ybnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60';
    const tex = new THREE.TextureLoader().load(url);
    tex.wrapS = THREE.MirroredRepeatWrapping;
    tex.wrapT = THREE.RepeatWrapping;

    const shader = THREE.ShaderLib.lambert;
    const uniforms = THREE.UniformsUtils.merge([shader.uniforms, {
        t: { value: 0 },
        stretch: { value: new THREE.Vector2(1, 10) },
        div: { value: new THREE.Vector2(32, 8) },
    }]);

    const vertexShader = `
    uniform sampler2D map;
    uniform vec2 stretch;
    ` + shader.vertexShader.replace('#include <uv_vertex>', `
    #ifdef USE_UV
        vUv = ( uvTransform * vec3( uv, 1 ) ).xy * stretch;
    #endif
    `);

    const fragmentShader = `
    uniform vec2 div;
    uniform vec2 stretch;
    uniform float t;
    ` + shader.fragmentShader.replace('#include <map_fragment>', `
    #ifdef USE_MAP
        {
            vec2 i = vec2(ivec2( vUv * div ));
            vec4 tA = texture2D( map, ( i ) / div );
            vec4 tB = texture2D( map, ( i + 1.0 ) / div );
            vec4 texel = 0.5 * (mix( tA, tB, vUv.x ) + mix( tA, tB, vUv.y )); 
            texel.b = step( 0.5, texel.b ) + ( sin( t * 0.001 ) * 0.5 + 0.5 );
            texel.r *= 2.0;
            texel.g *= 0.5;
            vec2 uv = fract( vUv * stretch * div );
            texel *= step( 0.2, uv.x ) * step ( 0.2, uv.y );
            diffuseColor *= texel;
        }
    #endif
    `);

    const mat = new THREE.ShaderMaterial({
        uniforms, vertexShader, fragmentShader,
        lights: true, fog: true
    });
    mat.map = mat.uniforms.map.value = tex;

    return mat;
}

const matSideWall = createSidewallMaterial();
const mesh = new THREE.Mesh(extrudeGeom, [
    new THREE.MeshBasicMaterial({ color: 0x000000 }), // Top
    matSideWall // Side
]);
mesh.visible = true;
scene.add(mesh);
console.log("Mesh added to scene:", mesh);

// ---- composer ----
const composer = new EffectComposer(renderer);
const renderPass = new RenderPass(scene, camera);
composer.addPass(renderPass);

const bloomPass = new UnrealBloomPass(new THREE.Vector2(window.innerWidth, window.innerHeight), 2, 0.5, 0.7);
composer.addPass(bloomPass);

// ---- animation loop ----
const totalLen = extrudePath.getLength();
const { binormals } = extrudePath.computeFrenetFrames(steps);
const matrix = new THREE.Matrix4();

function animate(t) {
    try {
        requestAnimationFrame(animate);

        // Update tunnel cam
        let u = ((mpms * t) % totalLen) / totalLen;
        if (isNaN(u)) u = 0;

        extrudePath.getPointAt(u, camera.position);

        if (binormals && binormals.length > 0) {
            const lookTarget = extrudePath.getPointAt(Math.min(1.0, u + 0.01));
            camera.setRotationFromMatrix(matrix.lookAt(
                camera.position,
                lookTarget,
                binormals[Math.floor(u * steps)] || binormals[0]
            ));
        }

        // Update tunnel materials
        if (matSideWall.uniforms.t) {
            matSideWall.uniforms.t.value = t;
        }

        // Render 3D scene
        composer.render();
    } catch (err) {
        console.error("Animation Error:", err);
    }
}

requestAnimationFrame(animate);
