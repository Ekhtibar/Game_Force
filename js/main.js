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




// Функция для открытия модального окна
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "block";
    }
}

// Функция для закрытия модального окна
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "none";
    }
}

// Закрытие модального окна при клике на крестик
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("mo-close")) {
        var modal = event.target.closest(".modal-page");
        if (modal) {
            modal.style.display = "none";
        }
    }
});

// Закрытие модального окна при клике вне его области
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("modal-page")) {
        event.target.style.display = "none";
    }
});

// Отмена закрытия модального окна при клике внутри его содержимого
document.querySelectorAll(".modal-content").forEach(function (content) {
    content.addEventListener("click", function (event) {
        event.stopPropagation();
    });
});
