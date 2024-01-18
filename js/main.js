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



// ------------------------------------------------------------------------------

$(document).ready(function () {
    $('#searchInput').on('input', function () {
        var query = $(this).val();
        if (query.length >= 2) {
            $.ajax({
                url: 'ajax-autocomplete.php',
                method: 'POST',
                data: { query: query },
                success: function (data) {
                    $('.resultBox').html(data);
                    $('.resultBox').show();
                }
            });
        } else {
            $('.resultBox').hide();
        }
    });

    // Событие при клике на элемент автоподбора
    $('.resultBox').on('click', '.autocomplete-item', function () {
        // Заполняем поле поиска выбранным значением
        $('#searchInput').val($(this).text());
        // Скрываем результаты автоподбора
        $('.resultBox').hide();
        // Теперь можно выполнить дополнительные действия, например, отправить форму поиска
        // Например, $('#searchForm').submit();
    });

    // Скрыть контейнер при клике за его пределами
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.resultBox').length && !$(e.target).is('#searchInput')) {
            $('.resultBox').hide();
        }
    });
});



console.log('hello');