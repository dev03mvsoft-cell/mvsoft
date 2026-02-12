const Toaster = {
    container: null,

    init() {
        if (!document.getElementById('toaster-container')) {
            this.container = document.createElement('div');
            this.container.id = 'toaster-container';
            document.body.appendChild(this.container);
        } else {
            this.container = document.getElementById('toaster-container');
        }
    },

    /**
     * Show a toast notification
     * @param {string} message - The message to display
     * @param {string} type - 'success', 'error', or 'info'
     * @param {number} duration - Time in ms before auto-removal (default: 5000)
     */
    show(message, type = 'success', duration = 5000) {
        if (!this.container) this.init();

        const toast = document.createElement('div');
        toast.className = `nexus-toast ${type}`;

        const iconMap = {
            'success': 'fa-circle-check',
            'error': 'fa-circle-exclamation',
            'info': 'fa-circle-info'
        };

        toast.innerHTML = `
            <i class="fa-solid ${iconMap[type] || 'fa-circle-info'}"></i>
            <div class="nexus-toast-content">
                <p class="nexus-toast-message">${message}</p>
            </div>
            <button class="nexus-toast-close">&times;</button>
        `;

        this.container.appendChild(toast);

        // Force reflow for animation
        toast.offsetHeight;
        toast.classList.add('show');

        // Close button event
        toast.querySelector('.nexus-toast-close').addEventListener('click', () => {
            this.remove(toast);
        });

        // Auto remove
        if (duration > 0) {
            setTimeout(() => {
                this.remove(toast);
            }, duration);
        }
    },

    remove(toast) {
        toast.classList.remove('show');
        toast.addEventListener('transitionend', () => {
            if (toast.parentNode === this.container) {
                this.container.removeChild(toast);
            }
        });
    }
};

// Initialize on DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => Toaster.init());
