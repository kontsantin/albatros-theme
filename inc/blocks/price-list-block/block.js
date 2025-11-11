jQuery(document).ready(function ($) {

    // Функция для определения мобильного устройства
    function isMobile() {
        return window.innerWidth <= 768;
    }

    // Инициализация таблиц
    $('.price-list').each(function () {
        var $table = $(this).find('table');
        var $rows = $table.find('tbody tr:not(.mobile_title)');
        var visibleRows = $rows.filter(':visible');

        // Скрываем строки, которые должны быть скрыты на текущем устройстве
        if (isMobile()) {
            $rows.filter('.title_row').addClass('hidden-row');
        } else {
            $table.find('.mobile_title').addClass('hidden-row');
        }

        // Если строк больше 2, добавляем кнопки
        if ($rows.not('.hidden-row').length > 2) {
            $(this).append('<button class="show-more-btn">Показать ещё</button>');
            $(this).append('<button class="show-less-btn" style="display:none;">Свернуть</button>');

            // Скрываем все строки кроме первых двух
            $rows.not('.hidden-row').slice(2).addClass('hidden-row');
        }
    });

    // Обработчик кнопки "Показать ещё"
    $(document).on('click', '.show-more-btn', function () {
        var $priceList = $(this).parent();
        var $table = $priceList.find('table');

        // Показываем только те строки, которые должны быть видны на текущем устройстве
        if (isMobile()) {
            $table.find('tbody tr.hidden-row:not(.title_row)').show();
        } else {
            $table.find('tbody tr.hidden-row:not(.mobile_title)').show();
        }

        $(this).hide();
        $priceList.find('.show-less-btn').show();
    });

    // Обработчик кнопки "Свернуть"
    $(document).on('click', '.show-less-btn', function () {
        var $priceList = $(this).parent();
        var $table = $priceList.find('table');

        // Скрываем все строки кроме первых двух (учитывая текущее устройство)
        $table.find('tbody tr:not(.mobile_title)').slice(2).addClass('hidden-row').hide();

        $(this).hide();
        $priceList.find('.show-more-btn').show();
    });

    // Обработчик изменения размера окна
    $(window).on('resize', function () {
        $('.price-list').each(function () {
            var $table = $(this).find('table');

            if (isMobile()) {
                $table.find('.title_row').addClass('hidden-row').hide();
                $table.find('.mobile_title').removeClass('hidden-row').show();
            } else {
                $table.find('.mobile_title').addClass('hidden-row').hide();
                $table.find('.title_row').removeClass('hidden-row').show();
            }
        });
    });
});