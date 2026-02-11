const ThreeEngine = (() => {
    const isMobile = window.innerWidth <= 991;

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

    const setupVisibilityObserver = (container, onVisible, onHidden) => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    onVisible();
                } else {
                    onHidden();
                }
            });
        }, { threshold: 0.05 }); // Lower threshold for earlier activation
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
            this.renderer = new THREE.WebGLRenderer({ alpha: true, antialias: !isMobile }); // Disable antialias on mobile
            this.renderer.setSize(this.width, this.height);
            this.renderer.setPixelRatio(isMobile ? 1 : Math.min(window.devicePixelRatio, 2));
            this.container.appendChild(this.renderer.domElement);
            this.cubesGroup = new THREE.Object3D();
            this.cubes = [];
            this.cubeSize = isMobile ? 12 : 10; // Slightly larger for visibility
            this.cubeOffset = 10;
            this.isPaused = true;
            this.drawCubes();
            this.animation();

            setupVisibilityObserver(this.container,
                () => { if (this.isPaused) { this.isPaused = false; this.render(); } },
                () => { this.isPaused = true; }
            );
        }
        drawCubes() {
            const range = isMobile ? 1 : 2; // Reduce grid size on mobile (3x3x3 vs 5x5x5)
            for (let i = -range; i <= range; i++) {
                for (let j = -range; j <= range; j++) {
                    for (let k = -range; k <= range; k++) {
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
            this.scene.rotation.z += 0.005; // Slower for smoother feel
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
            this.renderer = new THREE.WebGLRenderer({ alpha: true, antialias: false }); // Antialias off for background
            this.renderer.setSize(this.width, this.height);
            this.renderer.setPixelRatio(isMobile ? 1 : 1.5);
            this.container.appendChild(this.renderer.domElement);
            this.particles = new THREE.Group();
            this.scene.add(this.particles);
            this.lines = new THREE.Group();
            this.scene.add(this.lines);
            this.isPaused = true;
            this.initParticles();

            setupVisibilityObserver(this.container,
                () => { if (this.isPaused) { this.isPaused = false; this.animate(); } },
                () => { this.isPaused = true; }
            );
        }
        initParticles() {
            const count = isMobile ? 25 : 40;
            const geometry = new THREE.SphereBufferGeometry(1, 6, 6); // Lower segments
            const material = new THREE.MeshBasicMaterial({ color: 0x003aaf });
            this.points = [];
            for (let i = 0; i < count; i++) {
                const mesh = new THREE.Mesh(geometry, material);
                mesh.position.set((Math.random() - 0.5) * 150, (Math.random() - 0.5) * 150, (Math.random() - 0.5) * 150);
                mesh.userData.velocity = new THREE.Vector3((Math.random() - 0.5) * 0.15, (Math.random() - 0.5) * 0.15, (Math.random() - 0.5) * 0.15);
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
            const material = new THREE.LineBasicMaterial({ color: 0x003aaf, transparent: true, opacity: 0.3 });
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
            this.particles.rotation.y += 0.0005;
            if (this.connectionLine) this.connectionLine.rotation.y += 0.0005;
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

    class Laptop {
        constructor(container) {
            this.container = container;
            this.width = container.offsetWidth;
            this.height = container.offsetHeight;
            this.scene = new THREE.Scene();
            this.camera = new THREE.PerspectiveCamera(35, this.width / this.height, 0.1, 1000);
            this.camera.position.set(0, 3, 30);
            this.camera.lookAt(0, 0, 0);

            this.renderer = new THREE.WebGLRenderer({ alpha: true, antialias: !isMobile });
            this.renderer.setSize(this.width, this.height);
            this.renderer.setPixelRatio(isMobile ? 1 : Math.min(window.devicePixelRatio, 2));
            this.renderer.shadowMap.enabled = !isMobile; // Disable shadows on mobile for performance
            this.renderer.shadowMap.type = THREE.PCFSoftShadowMap;
            this.renderer.outputEncoding = THREE.sRGBEncoding;
            this.container.appendChild(this.renderer.domElement);

            this.scene.fog = new THREE.FogExp2(0x000000, 0.015);
            this.mouse = { x: 0, y: 0 };
            this.targetCameraPos = new THREE.Vector3(0, 3, 30);

            if (!isMobile) {
                window.addEventListener('mousemove', (e) => this.onMouseMove(e));
            }

            const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
            this.scene.add(ambientLight);

            const keyLight = new THREE.SpotLight(0xffffff, 1.5);
            keyLight.position.set(20, 40, 20);
            keyLight.angle = Math.PI / 6;
            keyLight.penumbra = 0.5;
            keyLight.castShadow = !isMobile;
            this.scene.add(keyLight);

            const rimLight = new THREE.DirectionalLight(0xffffff, 0.8);
            rimLight.position.set(-20, 10, -10);
            this.scene.add(rimLight);

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
                () => { if (this.isPaused) { this.isPaused = false; this.animate(); } },
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
            const bodyMat = new THREE.MeshStandardMaterial({
                color: 0xdcdee0,
                roughness: 0.2,
                metalness: 0.8
            });

            const lidMat = new THREE.MeshStandardMaterial({
                color: 0xdcdee0,
                roughness: 0.2,
                metalness: 0.8
            });

            const baseGroup = new THREE.Group();
            this.group.add(baseGroup);

            const baseShape = this.createRoundedRectShape(16, 11, 0.8);
            const baseExtrudeSettings = { depth: 0.6, bevelEnabled: true, bevelThickness: 0.1, bevelSize: 0.1, curveSegments: isMobile ? 8 : 16 };
            const baseGeom = new THREE.ExtrudeBufferGeometry(baseShape, baseExtrudeSettings);
            const mainBase = new THREE.Mesh(baseGeom, bodyMat);
            mainBase.rotation.x = -Math.PI / 2;
            mainBase.position.y = -0.3;
            mainBase.castShadow = !isMobile;
            mainBase.receiveShadow = !isMobile;
            baseGroup.add(mainBase);

            const kbTexture = textureLoader.load('assets/img/laptop-keyboard-apple.jpg');
            const kbMat = new THREE.MeshStandardMaterial({
                map: kbTexture,
                roughness: 0.6,
                metalness: 0.1,
                emissive: 0xffffff,
                emissiveIntensity: 0.05
            });

            const kbArea = new THREE.Mesh(new THREE.PlaneBufferGeometry(15.5, 10.5), kbMat);
            kbArea.rotation.x = -Math.PI / 2;
            kbArea.position.y = 0.47;
            baseGroup.add(kbArea);

            this.screenGroup = new THREE.Group();
            this.screenGroup.position.set(0, 0.3, -5.4);
            this.group.add(this.screenGroup);

            const hinge = new THREE.Mesh(new THREE.CylinderBufferGeometry(0.3, 0.3, 15.5, isMobile ? 8 : 12), lidMat);
            hinge.rotation.z = Math.PI / 2;
            this.screenGroup.add(hinge);

            const lipShape = this.createRoundedRectShape(16, 10, 0.8);
            const lipExtrudeSettings = { depth: 0.4, bevelEnabled: true, bevelThickness: 0.1, bevelSize: 0.1, curveSegments: isMobile ? 8 : 16 };
            const lipGeom = new THREE.ExtrudeBufferGeometry(lipShape, lipExtrudeSettings);
            const screenLip = new THREE.Mesh(lipGeom, lidMat);
            screenLip.position.set(0, 5, -0.2);
            screenLip.castShadow = !isMobile;
            screenLip.receiveShadow = !isMobile;
            this.screenGroup.add(screenLip);

            const backTexture = textureLoader.load('assets/img/laptop-back-apple.png');
            const backMat = new THREE.MeshStandardMaterial({
                map: backTexture,
                roughness: 0.2,
                metalness: 0.5,
                emissive: 0xffffff,
                emissiveMap: backTexture,
                emissiveIntensity: 0.3,
                side: THREE.BackSide
            });
            const screenBack = new THREE.Mesh(new THREE.PlaneBufferGeometry(15.8, 9.8), backMat);
            screenBack.position.set(0, 5, -0.5);
            screenBack.rotation.y = Math.PI;
            this.screenGroup.add(screenBack);

            const screenTexture = textureLoader.load('assets/img/laptop-screen-dev.png');
            const screenContentMat = new THREE.MeshStandardMaterial({
                map: screenTexture,
                emissive: 0xffffff,
                emissiveMap: screenTexture,
                emissiveIntensity: 0.1,
                roughness: 0.2,
                metalness: 0.2
            });

            const activeScreen = new THREE.Mesh(new THREE.PlaneBufferGeometry(15.2, 9.2), screenContentMat);
            activeScreen.position.set(0, 5, 0.37);
            this.screenGroup.add(activeScreen);

            const bezelShape = this.createRoundedRectShape(15.6, 9.6, 0.7);
            const bezelGeom = new THREE.ShapeBufferGeometry(bezelShape);
            const innerBezel = new THREE.Mesh(bezelGeom, new THREE.MeshStandardMaterial({ color: 0x000000, roughness: 0.05 }));
            innerBezel.position.set(0, 5, 0.205);
            this.screenGroup.add(innerBezel);

            this.screenGroup.rotation.x = 1.6;
        }

        createTechBadges() {
            const techs = [
                { name: 'React JS', color: '#61DAFB' },
                { name: 'Next JS', color: '#ffffff' },
                { name: 'PHP', color: '#777BB4' },
                { name: 'Laravel', color: '#FF2D20' },
                { name: 'MySQL', color: '#4479A1' },
                { name: 'GSAP', color: '#88CE02' },
                { name: 'Three JS', color: '#ffffff' },
                { name: 'Flutter', color: '#02569B' }
            ]; // Reduced set for mobile

            this.badges = [];
            techs.forEach((tech, i) => {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = 256; // Reduced resolution
                canvas.height = 64;

                ctx.fillStyle = tech.color + '22';
                ctx.beginPath();
                if (ctx.roundRect) {
                    ctx.roundRect(0, 0, 256, 64, 32);
                } else {
                    ctx.rect(0, 0, 256, 64); // Fallback to normal rect
                }
                ctx.fill();

                ctx.strokeStyle = tech.color;
                ctx.lineWidth = 2;
                ctx.stroke();

                ctx.fillStyle = 'white';
                ctx.font = 'bold 24px Raleway, sans-serif';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(tech.name, 128, 32);

                const texture = new THREE.CanvasTexture(canvas);
                const badgeGeom = new THREE.PlaneBufferGeometry(isMobile ? 8 : 6, isMobile ? 2 : 1.5);
                const badgeMesh = new THREE.Mesh(badgeGeom, new THREE.MeshStandardMaterial({
                    map: texture,
                    transparent: true,
                    opacity: 0.8,
                    emissive: new THREE.Color(tech.color),
                    emissiveIntensity: 0.2
                }));

                const angle = (i / techs.length) * Math.PI * 2;
                const radius = isMobile ? 15 : 20 + Math.random() * 5;
                badgeMesh.position.set(Math.cos(angle) * radius, (Math.random() - 0.5) * 10, Math.sin(angle) * radius);

                badgeMesh.userData = {
                    angle: angle,
                    radius: radius,
                    yOffset: badgeMesh.position.y,
                    floatSpeed: 0.001,
                    orbitSpeed: isMobile ? 0.002 : 0.003,
                    phase: Math.random() * Math.PI * 2
                };

                this.scene.add(badgeMesh);
                this.badges.push(badgeMesh);
            });
        }

        animate() {
            if (this.isPaused) return;
            const time = Date.now() * 0.001;

            if (!isMobile) {
                const targetX = this.mouse.x * 15;
                const targetY = (-this.mouse.y * 15) + 3;
                this.camera.position.x += (targetX - this.camera.position.x) * 0.05;
                this.camera.position.y += (targetY - this.camera.position.y) * 0.05;
            }

            this.camera.lookAt(0, 0, 0);

            if (this.badges) {
                this.badges.forEach(badge => {
                    const data = badge.userData;
                    data.angle += data.orbitSpeed;
                    badge.position.x = Math.cos(data.angle) * data.radius;
                    badge.position.z = Math.sin(data.angle) * data.radius;
                    badge.position.y = data.yOffset + Math.sin(time + data.phase) * 0.3;
                    badge.lookAt(this.camera.position);
                });
            }

            this.renderer.render(this.scene, this.camera);
            requestAnimationFrame(() => this.animate());
        }

        updateCameraPosition() {
            const aspect = this.width / this.height;
            if (aspect < 1) {
                this.camera.position.z = isMobile ? 50 : 45;
                this.group.scale.set(0.65, 0.65, 0.65);
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
