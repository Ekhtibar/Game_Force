let currentIndex = 0;
    const totalItems = document.querySelectorAll('.carousel-item').length;

    let debouncedPrevSlide = debounce(prevSlide, 300);
    let debouncedNextSlide = debounce(nextSlide, 300);

    function debounce(func, delay) {
        let timeout;
        return function () {
            clearTimeout(timeout);
            timeout = setTimeout(func, delay);
        };
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) - totalItems;
        updateCarousel();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1 + totalItems) % totalItems;
        updateCarousel();
    }

    function updateCarousel() {
        const carousel = document.getElementById('carousel');
        if ('scrollBehavior' in document.documentElement.style) {
            carousel.scrollTo({
                left: document.querySelector('.carousel-item').offsetWidth * currentIndex,
                behavior: 'smooth'
            });
        } else {
            carousel.scrollLeft = document.querySelector('.carousel-item').offsetWidth * currentIndex;
        }
    }

    // Initial update after the page has loaded
    document.addEventListener('DOMContentLoaded', function () {
        updateCarousel();
    });