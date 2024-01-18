// search.js
$(document).ready(function () {
    $('#searchInput').on('input', function () {
        var query = $(this).val();
        if (query.length >= 2) {
            $.ajax({
                url: 'ajax-autocomplete.php',
                method: 'POST',
                data: { query: query },
                success: function (data) {
                    console.log(data);  // Вывести данные в консоль для отладки
                    $('.resultBox').html(data);
                    $('.resultBox').show();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);  // Вывести ошибку в консоль для отладки
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

        // Выполняем дополнительные действия, например, отправляем форму поиска
        $('#searchForm').submit();
    });

    // Скрыть контейнер при клике за его пределами
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.resultBox').length && !$(e.target).is('#searchInput')) {
            $('.resultBox').hide();
        }
    });
});
