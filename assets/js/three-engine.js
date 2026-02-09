/**
 * Three.js Engine Module
 * Handles 3D environments (Hero Galaxy, About Cube, Legacy Neural Network)
 */
const ThreeEngine = (() => {
    // Shared Cube Class for About Section
    class Cube extends THREE.Object3D {
        constructor(size) {
            super();
            this.colors = [0xB7E8D8, 0xE86344, 0xE8AB9C];
            const geometry = new THREE.BoxBufferGeometry(size, size, size);
            const count = geometry.attributes.position.count;
            geometry.setAttribute('color', new THREE.BufferAttribute(new Float32Array(count * 3), 3));
            const colorRadomizer = Math.random() * (1.1 - 0.7) + 0.7;
            const colors = geometry.attributes.color;
            for (let i = 0; i < count; i++) {
                const color = new THREE.Color(this.colors[Math.floor(i / (count / 3)) % this.colors.length]);
                colors.setXYZ(i, color.r * colorRadomizer, color.g * colorRadomizer, color.b * colorRadomizer);
            }
            this.mat = new THREE.MeshBasicMaterial({ vertexColors: true, wireframe: false });
            this.mesh = new THREE.Mesh(geometry, this.mat);
            this.add(this.mesh);
        }
    }

    // Helper for Intersection Observer visibility
    const setupVisibilityObserver = (container, onVisible, onHidden) => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    onVisible();
                } else {
                    onHidden();
                }
            });
        }, { threshold: 0.1 });
        observer.observe(container);
        return observer;
    };

    class CubeWorld {
        constructor(container) {
            this.container = container;
            this.width = container.offsetWidth;
            this.height = container.offsetHeight;
            this.scene = new THREE.Scene();
            this.aspectRatio = this.width / this.height;
            this.distance = 100;
            this.camera = new THREE.OrthographicCamera(-this.distance * this.aspectRatio, this.distance * this.aspectRatio, this.distance, -this.distance, 1, 1000);
            this.camera.position.set(0, 0, 150);
            this.renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            this.renderer.setSize(this.width, this.height);
            this.container.appendChild(this.renderer.domElement);
            this.cubesGroup = new THREE.Object3D();
            this.cubes = [];
            this.cubeSize = 10;
            this.cubeOffset = 10;
            this.isPaused = true;
            this.drawCubes();
            this.animation();

            setupVisibilityObserver(this.container,
                () => { this.isPaused = false; this.render(); },
                () => { this.isPaused = true; }
            );
        }
        drawCubes() {
            for (let i = -2; i <= 2; i++) {
                for (let j = -2; j <= 2; j++) {
                    for (let k = -2; k <= 2; k++) {
                        const cube = new Cube(this.cubeSize);
                        cube.position.set(i * this.cubeSize, k * this.cubeSize, j * this.cubeSize);
                        this.cubes.push(cube);
                        this.cubesGroup.add(cube);
                    }
                }
            }
            this.scene.add(this.cubesGroup);
        }
        animation() {
            gsap.to(this.cubesGroup.rotation, { x: 2 * Math.PI + 0.6, y: 2 * Math.PI - 0.8, duration: 0.7, ease: "power2.out" });
            this.cubes.forEach((cube, i) => {
                const newX = (cube.position.x + this.cubeOffset) * 2.5;
                const newY = (cube.position.y + this.cubeOffset) * 2.5;
                const newZ = (cube.position.z + this.cubeOffset) * 2.5;
                const delay = 0.7 + 0.03 * (i < this.cubes.length / 2 ? i : this.cubes.length - i);
                gsap.timeline({ delay, repeat: -1, repeatDelay: 1, yoyo: true })
                    .to(cube.position, { x: newX, y: newY, z: newZ, duration: 0.5, ease: "back.out(1.7)" })
                    .to(cube.rotation, { x: Math.PI, y: -Math.PI, duration: 0.5, ease: "power2.out" }, "-=0.3")
                    .to(cube.scale, { x: 0.5, y: 0.5, z: 0.5, duration: 0.5, ease: "power2.out" }, "-=0.4");
            });
        }
        render() {
            if (this.isPaused) return;
            this.scene.rotation.z += 0.01;
            this.renderer.render(this.scene, this.camera);
            requestAnimationFrame(() => this.render());
        }
        resize() {
            this.width = this.container.offsetWidth;
            this.height = this.container.offsetHeight;
            this.aspectRatio = this.width / this.height;
            this.camera.left = -this.distance * this.aspectRatio;
            this.camera.right = this.distance * this.aspectRatio;
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(this.width, this.height);
        }
    }

    class LegacyVisual {
        constructor(container) {
            this.container = container;
            this.width = container.offsetWidth;
            this.height = container.offsetHeight;
            this.scene = new THREE.Scene();
            this.camera = new THREE.PerspectiveCamera(75, this.width / this.height, 0.1, 1000);
            this.camera.position.z = 150;
            this.renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            this.renderer.setSize(this.width, this.height);
            this.container.appendChild(this.renderer.domElement);
            this.particles = new THREE.Group();
            this.scene.add(this.particles);
            this.lines = new THREE.Group();
            this.scene.add(this.lines);
            this.isPaused = true;
            this.initParticles();

            setupVisibilityObserver(this.container,
                () => { this.isPaused = false; this.animate(); },
                () => { this.isPaused = true; }
            );
        }
        initParticles() {
            const geometry = new THREE.SphereBufferGeometry(1, 8, 8);
            const material = new THREE.MeshBasicMaterial({ color: 0x003aaf });
            this.points = [];
            for (let i = 0; i < 40; i++) {
                const mesh = new THREE.Mesh(geometry, material);
                mesh.position.set((Math.random() - 0.5) * 150, (Math.random() - 0.5) * 150, (Math.random() - 0.5) * 150);
                mesh.userData.velocity = new THREE.Vector3((Math.random() - 0.5) * 0.2, (Math.random() - 0.5) * 0.2, (Math.random() - 0.5) * 0.2);
                this.particles.add(mesh);
                this.points.push(mesh);
            }
        }
        updateConnections() {
            const positions = [];
            const maxDist = 45;
            for (let i = 0; i < this.points.length; i++) {
                for (let j = i + 1; j < this.points.length; j++) {
                    const dist = this.points[i].position.distanceTo(this.points[j].position);
                    if (dist < maxDist) {
                        positions.push(
                            this.points[i].position.x, this.points[i].position.y, this.points[i].position.z,
                            this.points[j].position.x, this.points[j].position.y, this.points[j].position.z
                        );
                    }
                }
            }
            if (this.connectionLine) {
                this.scene.remove(this.connectionLine);
                this.connectionLine.geometry.dispose();
            }
            const geometry = new THREE.BufferGeometry().setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
            const material = new THREE.LineBasicMaterial({ color: 0x003aaf, transparent: true, opacity: 0.4 });
            this.connectionLine = new THREE.LineSegments(geometry, material);
            this.scene.add(this.connectionLine);
        }
        animate() {
            if (this.isPaused) return;
            this.points.forEach(p => {
                p.position.add(p.userData.velocity);
                if (Math.abs(p.position.x) > 75) p.userData.velocity.x *= -1;
                if (Math.abs(p.position.y) > 75) p.userData.velocity.y *= -1;
                if (Math.abs(p.position.z) > 75) p.userData.velocity.z *= -1;
            });
            this.updateConnections();
            this.particles.rotation.y += 0.001;
            if (this.connectionLine) this.connectionLine.rotation.y += 0.001;
            this.renderer.render(this.scene, this.camera);
            requestAnimationFrame(() => this.animate());
        }
        resize() {
            this.width = this.container.offsetWidth; this.height = this.container.offsetHeight;
            this.camera.aspect = this.width / this.height;
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(this.width, this.height);
        }
    }

    const initGalaxy = () => {
        const canvas = document.getElementById('hero-three-canvas');
        if (!canvas) return;
        const parameters = { count: 52200, size: 0.006, radius: 19.03, branches: 6, spin: -1.577, randomness: 0.864, randomnessPower: 5.855, insideColor: '#f3af1b', outsideColor: '#2d54b9' };
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 100);
        camera.position.set(0, 3, 5);
        const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        let geometry, material, points;
        const generateGalaxy = () => {
            if (points) { geometry.dispose(); material.dispose(); scene.remove(points); }
            geometry = new THREE.BufferGeometry();
            const positions = new Float32Array(parameters.count * 3);
            const colors = new Float32Array(parameters.count * 3);
            const colorInside = new THREE.Color(parameters.insideColor);
            const colorOutside = new THREE.Color(parameters.outsideColor);

            for (let i = 0; i < parameters.count; i++) {
                const i3 = i * 3;
                const radius = Math.random() * parameters.radius;
                const spinAngle = radius * parameters.spin;
                const branchAngle = (i % parameters.branches) / parameters.branches * Math.PI * 2;
                const rX = Math.pow(Math.random(), parameters.randomnessPower) * (Math.random() < 0.5 ? 1 : -1) * parameters.randomness * radius;
                const rY = Math.pow(Math.random(), parameters.randomnessPower) * (Math.random() < 0.5 ? 1 : -1) * parameters.randomness * radius;
                const rZ = Math.pow(Math.random(), parameters.randomnessPower) * (Math.random() < 0.5 ? 1 : -1) * parameters.randomness * radius;
                positions[i3] = Math.cos(branchAngle + spinAngle) * radius + rX;
                positions[i3 + 1] = rY;
                positions[i3 + 2] = Math.sin(branchAngle + spinAngle) * radius + rZ;
                const mixedColor = colorInside.clone().lerp(colorOutside, radius / parameters.radius);
                colors[i3] = mixedColor.r; colors[i3 + 1] = mixedColor.g; colors[i3 + 2] = mixedColor.b;
            }
            geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
            material = new THREE.PointsMaterial({ size: parameters.size, sizeAttenuation: true, depthWrite: false, blending: THREE.AdditiveBlending, vertexColors: true });
            points = new THREE.Points(geometry, material);
            scene.add(points);
        };
        generateGalaxy();
        const clock = new THREE.Clock();
        const animate = () => {
            if (points) points.rotation.y = clock.getElapsedTime() * 0.2;
            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        };
        animate();
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight; camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    };

    class Laptop {
        constructor(container) {
            this.container = container;
            this.width = container.offsetWidth;
            this.height = container.offsetHeight;
            this.scene = new THREE.Scene();
            this.camera = new THREE.PerspectiveCamera(35, this.width / this.height, 0.1, 1000);
            this.camera.position.set(0, 3, 30);
            this.camera.lookAt(0, 0, 0);

            this.renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            this.renderer.setSize(this.width, this.height);
            this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            this.renderer.shadowMap.enabled = true;
            this.renderer.shadowMap.type = THREE.PCFSoftShadowMap;
            this.renderer.outputEncoding = THREE.sRGBEncoding;
            this.container.appendChild(this.renderer.domElement);

            // Atmospheric Depth (Fog)
            this.scene.fog = new THREE.FogExp2(0x000000, 0.015);

            // Mouse Interactivity State
            this.mouse = { x: 0, y: 0 };
            this.targetCameraPos = new THREE.Vector3(0, 3, 30);
            window.addEventListener('mousemove', (e) => this.onMouseMove(e));

            // Premium Studio Lighting (Apple-style)
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
            this.scene.add(ambientLight);

            // Key Light - Main source of highlights
            const keyLight = new THREE.SpotLight(0xffffff, 1.5);
            keyLight.position.set(20, 40, 20);
            keyLight.angle = Math.PI / 6;
            keyLight.penumbra = 0.5;
            keyLight.castShadow = true;
            keyLight.shadow.mapSize.width = 2048;
            keyLight.shadow.mapSize.height = 2048;
            this.scene.add(keyLight);

            // Rim Light - For edge definition
            const rimLight = new THREE.DirectionalLight(0xffffff, 0.8);
            rimLight.position.set(-20, 10, -10);
            this.scene.add(rimLight);

            // Inner Glow (RectAreaLight) - Simulates screen light on keyboard
            const rectLight = new THREE.RectAreaLight(0x003aaf, 5, 14, 8);
            rectLight.position.set(0, 0.5, -5);
            rectLight.lookAt(0, 0, 0);
            this.scene.add(rectLight);
            this.screenGlow = rectLight;

            this.group = new THREE.Group();
            this.scene.add(this.group);

            this.isPaused = true;
            this.createDetailedLaptop();
            this.createTechBadges();
            this.updateCameraPosition();

            setupVisibilityObserver(this.container,
                () => { this.isPaused = false; this.animate(); },
                () => { this.isPaused = true; }
            );
        }

        onMouseMove(e) {
            this.mouse.x = (e.clientX / window.innerWidth) - 0.5;
            this.mouse.y = (e.clientY / window.innerHeight) - 0.5;
        }
        createRoundedRectShape(width, height, radius) {
            const shape = new THREE.Shape();
            shape.moveTo(-width / 2 + radius, -height / 2);
            shape.lineTo(width / 2 - radius, -height / 2);
            shape.quadraticCurveTo(width / 2, -height / 2, width / 2, -height / 2 + radius);
            shape.lineTo(width / 2, height / 2 - radius);
            shape.quadraticCurveTo(width / 2, height / 2, width / 2 - radius, height / 2);
            shape.lineTo(-width / 2 + radius, height / 2);
            shape.quadraticCurveTo(-width / 2, height / 2, -width / 2, height / 2 - radius);
            shape.lineTo(-width / 2, -height / 2 + radius);
            shape.quadraticCurveTo(-width / 2, -height / 2, -width / 2 + radius, -height / 2);
            return shape;
        }

        createDetailedLaptop() {
            const textureLoader = new THREE.TextureLoader();
            const onLoad = (tex) => console.log('Texture loaded successfully:', tex.image.src);
            const onError = (err) => console.error('Error loading texture:', err);

            // User-specified silver color #dcdee0
            const bodyMat = new THREE.MeshStandardMaterial({
                color: 0xdcdee0,
                roughness: 0.15,
                metalness: 0.85,
                envMapIntensity: 1
            });

            const lidMat = new THREE.MeshStandardMaterial({
                color: 0xdcdee0,
                roughness: 0.1,
                metalness: 0.9
            });

            const screenMat = new THREE.MeshStandardMaterial({
                color: 0x000000,
                emissive: 0x003aaf,
                emissiveIntensity: 0.5,
                roughness: 0.05,
                metalness: 0.1
            });

            // 1. Base (Rounded)
            const baseGroup = new THREE.Group();
            this.group.add(baseGroup);

            const baseShape = this.createRoundedRectShape(16, 11, 0.8);
            const baseExtrudeSettings = { depth: 0.6, bevelEnabled: true, bevelThickness: 0.1, bevelSize: 0.1, curveSegments: 16 };
            const baseGeom = new THREE.ExtrudeBufferGeometry(baseShape, baseExtrudeSettings);
            const mainBase = new THREE.Mesh(baseGeom, bodyMat);
            mainBase.rotation.x = -Math.PI / 2;
            mainBase.position.y = -0.3; // Offset for extrude depth
            mainBase.castShadow = true;
            mainBase.receiveShadow = true;
            baseGroup.add(mainBase);

            // 2. Keyboard & Trackpad Area
            const kbTexture = textureLoader.load('assets/img/laptop-keyboard-apple.jpg', onLoad, undefined, onError);
            const kbMat = new THREE.MeshStandardMaterial({
                map: kbTexture,
                color: 0xffffff,
                roughness: 0.6,
                metalness: 0.1,
                emissive: 0xffffff,
                emissiveIntensity: 0.1, // Increased visibility
                side: THREE.DoubleSide // Ensure it shows even if flipped
            });

            // Restore PlaneBufferGeometry for UV stability (Guarantees texture shows)
            const kbArea = new THREE.Mesh(new THREE.PlaneBufferGeometry(15.5, 10.5), kbMat);
            kbArea.rotation.x = -Math.PI / 2;
            kbArea.position.y = 0.47; // Slightly higher to be safe
            kbArea.position.z = 0;
            baseGroup.add(kbArea);

            // 3. Screen (Detailed with Hinge and Rounded Corners)
            this.screenGroup = new THREE.Group();
            this.screenGroup.position.set(0, 0.3, -5.4);
            this.group.add(this.screenGroup);

            // Hinge Bar (Silver)
            const hinge = new THREE.Mesh(new THREE.CylinderBufferGeometry(0.3, 0.3, 15.5, 12), lidMat);
            hinge.rotation.z = Math.PI / 2;
            this.screenGroup.add(hinge);

            const lipShape = this.createRoundedRectShape(16, 10, 0.8);
            const lipExtrudeSettings = { depth: 0.4, bevelEnabled: true, bevelThickness: 0.1, bevelSize: 0.1, curveSegments: 16 };
            const lipGeom = new THREE.ExtrudeBufferGeometry(lipShape, lipExtrudeSettings);
            const screenLip = new THREE.Mesh(lipGeom, lidMat);
            screenLip.position.set(0, 5, -0.2); // Center of extrude
            screenLip.castShadow = true;
            screenLip.receiveShadow = true;
            this.screenGroup.add(screenLip);

            // Screen Back Cover (Glowing Apple Logo)
            const backTexture = textureLoader.load('assets/img/laptop-back-apple.png', onLoad, undefined, onError);
            const backMat = new THREE.MeshStandardMaterial({
                map: backTexture,
                color: 0xffffff,
                roughness: 0.2,
                metalness: 0.5,
                emissive: 0xffffff,
                emissiveMap: backTexture,
                emissiveIntensity: 0.4, // Increased for clarity
                side: THREE.DoubleSide
            });
            // Restore PlaneBufferGeometry for UV stability (Guarantees texture shows)
            const screenBack = new THREE.Mesh(new THREE.PlaneBufferGeometry(15.8, 9.8), backMat);
            // Positioned clearly behind the bevel
            screenBack.position.set(0, 5, -0.5);
            screenBack.rotation.y = Math.PI;
            this.screenGroup.add(screenBack);

            // Screen Content with Texture (Dev Skills)
            const screenTexture = textureLoader.load('assets/img/laptop-screen-dev.png', onLoad, undefined, onError);
            const screenContentMat = new THREE.MeshStandardMaterial({
                map: screenTexture,
                color: 0xffffff,
                emissive: 0xffffff,
                emissiveMap: screenTexture,
                emissiveIntensity: 0.15, // Increased pop
                roughness: 0.2,
                metalness: 0.2,
                side: THREE.DoubleSide
            });

            // Texture for the old laptop parts (backwards compatibility if needed)
            // textureLoader.load('assets/img/laptop-keyboard-v2.png', onLoad, undefined, onError);
            // textureLoader.load('assets/img/laptop-screen.png', onLoad, undefined, onError);
            // textureLoader.load('assets/img/laptop-back.png', onLoad, undefined, onError);

            // Restore PlaneBufferGeometry for UV stability (Guarantees texture shows)
            const activeScreen = new THREE.Mesh(new THREE.PlaneBufferGeometry(15.2, 9.2), screenContentMat);
            // Positioned in front of the bevel
            activeScreen.position.set(0, 5, 0.37);
            this.screenGroup.add(activeScreen);

            // Inner bezel remains a shape as it's a solid color
            const bezelShape = this.createRoundedRectShape(15.6, 9.6, 0.7);
            const bezelGeom = new THREE.ShapeBufferGeometry(bezelShape);
            const innerBezel = new THREE.Mesh(bezelGeom, new THREE.MeshStandardMaterial({ color: 0x000000, roughness: 0.01 }));
            innerBezel.position.set(0, 5, 0.205);
            this.screenGroup.add(innerBezel);

            // Removed topBar bezel detail as requested

            // Initial state: starts open (1.6 rad)
            this.screenGroup.rotation.x = 1.6;
        }

        createTechBadges() {
            const techs = [
                { name: 'React JS', color: '#61DAFB' },
                { name: 'Next JS', color: '#ffffff' },
                { name: 'Bootstrap', color: '#7952B3' },
                { name: 'PHP', color: '#777BB4' },
                { name: 'Laravel', color: '#FF2D20' },
                { name: 'MySQL', color: '#4479A1' },
                { name: 'Tailwind', color: '#06B6D4' },
                { name: 'GSAP', color: '#88CE02' },
                { name: 'Three JS', color: '#ffffff' },
                { name: 'JavaScript', color: '#F7DF1E' },
                { name: 'React Native', color: '#61DAFB' },
                { name: 'Flutter', color: '#02569B' }
            ];

            this.badges = [];
            techs.forEach((tech, i) => {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = 512;
                canvas.height = 128;

                // Refined Glassy Badge (Frosted Look)
                const gradient = ctx.createRadialGradient(256, 64, 0, 256, 64, 256);
                gradient.addColorStop(0, tech.color + '33');
                gradient.addColorStop(1, tech.color + '05');

                ctx.fillStyle = gradient;
                ctx.beginPath();
                ctx.roundRect(0, 0, 512, 128, 64);
                ctx.fill();

                ctx.strokeStyle = tech.color;
                ctx.lineWidth = 4;
                ctx.globalAlpha = 0.5;
                ctx.stroke();
                ctx.globalAlpha = 1.0;

                ctx.fillStyle = 'white';
                ctx.shadowColor = tech.color;
                ctx.shadowBlur = 15;
                ctx.font = 'bold 50px Raleway, sans-serif';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(tech.name, 256, 64);

                const texture = new THREE.CanvasTexture(canvas);
                const badgeGeom = new THREE.PlaneBufferGeometry(6, 1.5);
                const badgeMesh = new THREE.Mesh(badgeGeom, new THREE.MeshStandardMaterial({
                    map: texture,
                    transparent: true,
                    opacity: 0.9,
                    side: THREE.DoubleSide,
                    emissive: new THREE.Color(tech.color),
                    emissiveIntensity: 0.4
                }));

                const angle = (i / techs.length) * Math.PI * 2;
                const radius = 18 + Math.random() * 8;
                badgeMesh.position.set(
                    Math.cos(angle) * radius,
                    (Math.random() - 0.5) * 15,
                    Math.sin(angle) * radius
                );

                badgeMesh.userData = {
                    angle: angle,
                    radius: radius,
                    yOffset: badgeMesh.position.y,
                    floatSpeed: 0.001 + Math.random() * 0.001,
                    orbitSpeed: 0.002 + Math.random() * 0.003,
                    phase: Math.random() * Math.PI * 2
                };

                this.scene.add(badgeMesh);
                this.badges.push(badgeMesh);
            });
        }

        animate() {
            if (this.isPaused) return;
            const time = Date.now() * 0.001;

            // Smooth Parallax Camera
            const targetX = this.mouse.x * 20;
            const targetY = (-this.mouse.y * 20) + 3;

            this.camera.position.x += (targetX - this.camera.position.x) * 0.05;
            this.camera.position.y += (targetY - this.camera.position.y) * 0.05;
            this.camera.lookAt(0, 0, 0);

            if (this.badges) {
                this.badges.forEach(badge => {
                    const data = badge.userData;
                    data.angle += data.orbitSpeed;
                    badge.position.x = Math.cos(data.angle) * data.radius;
                    badge.position.z = Math.sin(data.angle) * data.radius;
                    badge.position.y = data.yOffset + Math.sin(time + data.phase) * 0.5;
                    badge.lookAt(this.camera.position);
                });
            }

            this.renderer.render(this.scene, this.camera);
            requestAnimationFrame(() => this.animate());
        }

        updateCameraPosition() {
            const aspect = this.width / this.height;
            // On portrait screens (mobile), move camera back so laptop fits
            if (aspect < 1) {
                this.camera.position.z = 45;
                this.group.scale.set(0.7, 0.7, 0.7); // Slightly smaller model on mobile
            } else {
                this.camera.position.z = 30;
                this.group.scale.set(1, 1, 1);
            }
        }

        resize() {
            this.width = this.container.offsetWidth;
            this.height = this.container.offsetHeight;
            this.camera.aspect = this.width / this.height;
            this.updateCameraPosition();
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(this.width, this.height);
        }
    }



    const init = () => {
        // initGalaxy(); // Hero Galaxy removed as per user request
        const aboutContainer = document.getElementById('about-canvas-container');
        if (aboutContainer) {
            const cubeWorld = new CubeWorld(aboutContainer);
            window.addEventListener('resize', () => cubeWorld.resize());
        }

        const legacyContainer = document.getElementById('legacy-canvas-container');
        if (legacyContainer) {
            const legacyVisual = new LegacyVisual(legacyContainer);
            window.addEventListener('resize', () => legacyVisual.resize());
        }

        const laptopContainer = document.getElementById('laptop-canvas-container');
        if (laptopContainer) {
            window.laptopEffect = new Laptop(laptopContainer);
            window.addEventListener('resize', () => window.laptopEffect.resize());
        }


    };

    return { init };
})();
