// Navbar functionality
class Navbar {
    constructor() {
        this.navbar = document.querySelector('.navbar');
        this.menuBar = document.querySelector('#menu-bar');
        this.closeButton = document.querySelector('#close');
    }

    toggleMenu() {
        this.navbar.classList.toggle('active');
    }

    closeMenu() {
        this.navbar.classList.remove('active');
    }

    init() {
        this.menuBar.onclick = () => this.toggleMenu();
        this.closeButton.onclick = () => this.closeMenu();
    }
}

// Theme Toggler functionality
class ThemeToggler {
    constructor() {
        this.themeToggler = document.querySelector('#theme-toggler');
    }

    toggleTheme() {
        this.themeToggler.classList.toggle('fa-sun');
        if (this.themeToggler.classList.contains('fa-sun')) {
            document.querySelector('body').classList.add('active');
        } else {
            document.querySelector('body').classList.remove('active');
        }
    }

    init() {
        this.themeToggler.onclick = () => this.toggleTheme();
    }
}

// Image Change functionality (for gallery images)
class ImageChanger {
    constructor(selector, bigImageClass) {
        this.images = document.querySelectorAll(selector);
        this.bigImage = document.querySelector(bigImageClass);
    }

    changeImage() {
        this.images.forEach(image => {
            image.onclick = () => {
                this.bigImage.src = image.getAttribute('src');
            }
        });
    }

    init() {
        this.changeImage();
    }
}

// Countdown Timer functionality
class CountdownTimer {
    constructor(targetDate) {
        this.targetDate = new Date(targetDate).getTime();
    }

    startCountdown() {
        setInterval(() => {
            this.countDown();
        }, 1000);
    }

    countDown() {
        let now = new Date().getTime();
        let gap = this.targetDate - now;

        let seconds = 1000;
        let minutes = seconds * 60;
        let hours = minutes * 60;
        let days = hours * 24;

        let d = Math.floor(gap / (days));
        let h = Math.floor((gap % (days)) / (hours));
        let m = Math.floor((gap % (hours)) / (minutes));
        let s = Math.floor((gap % (minutes)) / (seconds));

        document.getElementById('days').innerText = d;
        document.getElementById('hours').innerText = h;
        document.getElementById('minutes').innerText = m;
        document.getElementById('seconds').innerText = s;
    }
}

// Swiper functionality for product slider
class SwiperSlider {
    constructor(selector, config) {
        this.selector = selector;
        this.config = config;
    }

    init() {
        new Swiper(this.selector, this.config);
    }
}

// Factory class that will generate objects based on type
class UIElementFactory {
    static create(type) {
        switch (type) {
            case 'navbar':
                return new Navbar();
            case 'themeToggler':
                return new ThemeToggler();
            case 'imageChanger':
                return new ImageChanger('.small-image-1', '.big-image-1');
            case 'countdownTimer':
                return new CountdownTimer('aug 19, 2023 00:00:00');
            case 'swiperSlider':
                return new SwiperSlider('.product-slider', {
                    slidesPerView: 3,
                    loop: true,
                    spaceBetween: 10,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        0: { slidesPerView: 1 },
                        550: { slidesPerView: 2 },
                        800: { slidesPerView: 3 },
                        1000: { slidesPerView: 3 },
                    },
                });
            default:
                throw new Error("Unknown UI Element");
        }
    }
}

// Initialize all UI elements
const navbar = UIElementFactory.create('navbar');
navbar.init();

const themeToggler = UIElementFactory.create('themeToggler');
themeToggler.init();

const imageChanger1 = UIElementFactory.create('imageChanger');
imageChanger1.init();

const countdownTimer = UIElementFactory.create('countdownTimer');
countdownTimer.startCountdown();

const swiperSlider = UIElementFactory.create('swiperSlider');
swiperSlider.init();

