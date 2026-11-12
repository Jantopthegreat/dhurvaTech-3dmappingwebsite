document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-menu-toggle]');
    const nav = document.querySelector('[data-main-nav]');

    if (!toggle || !nav) return;

    const closeMenu = () => {
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open navigation');
        nav.classList.remove('is-open');
    };

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
        nav.classList.toggle('is-open', !isOpen);
    });

    nav.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
            nav.querySelectorAll('details[open]').forEach((dropdown) => dropdown.removeAttribute('open'));
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 860) closeMenu();
    });
});

// Scroll reveal animation
document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll(".reveal");

    if (!elements.length) return;

    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (
        prefersReducedMotion ||
        !("IntersectionObserver" in window)
    ) {
        elements.forEach((element) => {
            element.classList.add("is-visible");
        });

        return;
    }

    document.documentElement.classList.add("js-reveal");

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.12,
            rootMargin: "0px 0px -40px 0px",
        }
    );

    elements.forEach((element) => {
        observer.observe(element);
    });
});


/* =====================================
   HOMEPAGE SERVICE SLIDER
===================================== */

function initHomeServiceSlider() {

    const slider = document.querySelector('[data-service-slider]');

    if (!slider || slider.dataset.initialized === 'true') {
        return;
    }

    slider.dataset.initialized = 'true';

    const slides = Array.from(
        slider.querySelectorAll('[data-service-slide]')
    );

    const dots = Array.from(
        slider.querySelectorAll('[data-service-dot]')
    );

    if (slides.length <= 1) {
        return;
    }

    let currentIndex = slides.findIndex(
        slide => slide.classList.contains('is-active')
    );

    if (currentIndex < 0) {
        currentIndex = 0;
    }

    let autoplayTimer = null;

    const interval = Math.max(
        2000,
        Number(slider.dataset.interval) || 5000
    );

    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;


    // Change active slide
    function showSlide(index) {

        currentIndex = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {

            const isActive = i === currentIndex;

            slide.classList.toggle('is-active', isActive);
            slide.setAttribute('aria-hidden', String(!isActive));

            const link = slide.querySelector('.home-service-slide-link');

            if (link) {
                link.tabIndex = isActive ? 0 : -1;
            }

        });

        dots.forEach((dot, i) => {

            const isActive = i === currentIndex;

            dot.classList.toggle('is-active', isActive);
            dot.setAttribute('aria-pressed', String(isActive));

        });

    }


    // Next slide
    function nextSlide() {
        showSlide(currentIndex + 1);
    }


    // Stop autoplay
    function stopAutoplay() {

        if (autoplayTimer !== null) {
            window.clearInterval(autoplayTimer);
            autoplayTimer = null;
        }

    }


    // Start autoplay
    function startAutoplay() {

        stopAutoplay();

        if (prefersReducedMotion || document.hidden) {
            return;
        }

        autoplayTimer = window.setInterval(
            nextSlide,
            interval
        );

    }


    // Click on indicators
    dots.forEach((dot, index) => {

        dot.addEventListener('click', () => {

            showSlide(index);

            // Restart interval after manual selection
            startAutoplay();

        });

    });


    // Pause when user hovers over slider
    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);


    // Pause when slider receives keyboard focus
    slider.addEventListener('focusin', stopAutoplay);

    slider.addEventListener('focusout', event => {

        if (!slider.contains(event.relatedTarget)) {
            startAutoplay();
        }

    });


    // Pause when browser tab is not visible
    document.addEventListener('visibilitychange', () => {

        if (document.hidden) {
            stopAutoplay();
        } else {
            startAutoplay();
        }

    });


    // Initialize
    showSlide(currentIndex);
    startAutoplay();

}


// Initialize after page is ready
if (document.readyState === 'loading') {

    document.addEventListener(
        'DOMContentLoaded',
        initHomeServiceSlider,
        { once: true }
    );

} else {

    initHomeServiceSlider();

}
