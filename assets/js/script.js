/**
 * Mvsoft Main Script (Entry Point)
 * Initializes modular engines for UI, 3D, and Animations
 */
document.addEventListener('DOMContentLoaded', () => {
	// 1. Register Plugins (Must be global)
	if (typeof gsap !== 'undefined') {
		gsap.registerPlugin(ScrollTrigger);
	}

	// 2. Initialize UI (Navbar, Cursor, Common UI)
	if (typeof UICore !== 'undefined') {
		UICore.init();
	}

	// 3. Initialize Animations (SplitText, ScrollTrigger, Pins)
	if (typeof AnimationEngine !== 'undefined') {
		if (document.fonts) {
			document.fonts.ready.then(() => {
				AnimationEngine.init();
			});
		} else {
			// Fallback for older browsers
			AnimationEngine.init();
		}
	}

	// 4. Initialize 3D Visuals (Galaxy, Cube, Neural)
	if (typeof ThreeEngine !== 'undefined') {
		ThreeEngine.init();
	}

	// 5. Horizontal Tech Navigation
	const techNavBtns = document.querySelectorAll('.tech-nav-btn');
	const techPanes = document.querySelectorAll('.tech-content-pane');

	if (techNavBtns.length > 0) {
		techNavBtns.forEach(btn => {
			btn.addEventListener('click', (e) => {
				e.preventDefault();
				const targetId = btn.getAttribute('data-tab');
				const targetPane = document.getElementById(`pane-${targetId}`);

				if (!targetPane) return;

				// Update nav buttons
				techNavBtns.forEach(b => b.classList.remove('active'));
				btn.classList.add('active');

				// Update content panes
				techPanes.forEach(pane => pane.classList.remove('active'));
				targetPane.classList.add('active');

				// Refresh ScrollTrigger as height might change
				if (typeof ScrollTrigger !== 'undefined') {
					ScrollTrigger.refresh();
				}
			});
		});
	}

	// 7. Final Refresh for Smooth ScrollTriggers
	if (typeof ScrollTrigger !== 'undefined') {
		ScrollTrigger.refresh();
	}
});

/* Airplane Mode Button Logic */
window.addEventListener('DOMContentLoaded', () => {
	const am = new AirplaneMode('#am');
});

class AirplaneMode {
	constructor(el) {
		this.input = document.querySelector(el);
		if (this.input) this.init();
	}
	init() {
		this.input.checked = false;
		// the CSS selector for the input prevents animation on load
		this.input.indeterminate = true;
		this.input.addEventListener('change', this.emitSmoke.bind(this));
		this.input.addEventListener('change', () => {
			// Navigate after a short delay for animation
			setTimeout(() => {
				window.location.href = "about";
			}, 800);
		});
	}
	clearSmoke() {
		const parent = this.input.parentElement;
		// all smoke particles should be the last inserted
		while (parent?.querySelector('.am__smoke')) {
			parent.removeChild(parent.lastChild);
		}
	}
	emitSmoke() {
		// clearing is necessary to not cause lag due to so many particles
		this.clearSmoke();

		const parent = this.input.parentElement;
		const spawnIterations = 40; // per ring
		const pivotY = -2.5;
		const rightRadius = 1.625;
		const leftRadius = 3.375;
		const rotateMin = -5;
		const rotateMax = 5;
		const distanceMin = 0.25;
		const distanceMax = 0.5;
		const duration = 1000;
		const takeOffDelay = duration * 0.3;

		for (let s = 0; s < spawnIterations; ++s) {
			const percent = s / spawnIterations;
			const percentEase = AmUtils.easeInOutCubic(percent);
			const angle = -360 * percentEase;
			let tempDuration = duration;
			let delay = tempDuration * percent;
			// the plane delays before taking off
			if (this.input.checked) {
				tempDuration -= takeOffDelay;
				delay = takeOffDelay + tempDuration * percent;
			}
			// right
			const rightX = rightRadius * Math.sin(AmUtils.degToRad(angle));
			const rightY = pivotY + rightRadius * Math.cos(AmUtils.degToRad(angle));
			const rightRotate = -angle + AmUtils.randomFloat(rotateMin, rotateMax);
			const rightDistance = AmUtils.randomFloat(distanceMin, distanceMax);
			const rightParticle = new AirplaneModeSmoke(rightX, rightY, rightRotate, rightDistance, tempDuration, delay);

			parent?.appendChild(rightParticle.el);
			rightParticle.move();
			// left
			const leftX = leftRadius * Math.sin(AmUtils.degToRad(angle));
			const leftY = pivotY + leftRadius * Math.cos(AmUtils.degToRad(angle));
			const leftRotate = -angle + AmUtils.randomFloat(rotateMin, rotateMax);
			const leftDistance = AmUtils.randomFloat(distanceMin, distanceMax);
			const leftParticle = new AirplaneModeSmoke(leftX, leftY, leftRotate, leftDistance, tempDuration, delay);

			parent?.appendChild(leftParticle.el);
			leftParticle.move();
		}
	}
}
class AirplaneModeSmoke {
	constructor(x, y, angle = 0, distance = 0, duration = 1000, delay = 0) {
		this.x = x; // in ems
		this.y = y; // in ems
		this.angle = angle; // in degrees
		this.distance = distance; // in ems
		this.duration = duration;
		this.delay = delay;

		this.init();
	}
	init() {
		const el = document.createElement('span');
		el.className = 'am__smoke';

		this.el = el;
	}
	move() {
		const start = `translate(${this.x}em,${this.y}em) rotate(${this.angle}deg)`;
		const anim = this.el?.animate(
			[
				{ opacity: 1, transform: `${start} translateX(0) scale(1)` },
				{ opacity: 0, transform: `${start} translateX(${this.distance}em) scale(2)` }
			],
			{ duration: this.duration, delay: this.delay, easing: 'ease-out' }
		);
		anim.onfinish = () => {
			this.el?.parentElement?.removeChild(this.el);
			this.el = null;
		};
	}
}
class AmUtils {
	static degToRad(deg) {
		return deg * Math.PI / 180;
	}
	// https://easings.net/#easeInOutCubic
	static easeInOutCubic(x) {
		return x < 0.5 ? 4 * x ** 3 : 1 - Math.pow(-2 * x + 2, 3) / 2;
	}
	static randomFloat(min = 0, max = 2 ** 32) {
		const percent = crypto.getRandomValues(new Uint32Array(1))[0] / 2 ** 32;
		const relativeValue = (max - min) * percent;
		const plusMin = min + relativeValue;

		return +(plusMin).toFixed(2);
	}
}
