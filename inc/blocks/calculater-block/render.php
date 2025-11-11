<?php


$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) &&
    !empty($block['align'])) ? 'align' . $block['align'] : '';


$api = get_field('api');
$title = get_field('title');
$static_city = get_field('first_citys');
$destination = get_field('second_citys');
$cargo = get_field('cargo'); ?>

<section id="calcuiator-block" class="calcuiator-block <?= $classes; ?> <?= $align; ?>">
    <div class="container">
        <?php if (!empty($title)): { ?>
                <h2 class="calcuiator-block__title">
                    <?= $title ?>
                </h2>
            <?php }endif ?>


        <div class="form form-v2">
            <div class="form-wrapper">
                <div class="form-wrapper__top">
                    <div class="form-wrapper__calculater">
                        <div class="calculater-top">
                            <select class="input-item" name="static_city" id="static_city" required>
                                <option value="" disabled selected>Выберите точку отправления</option>
                                <?php foreach ($static_city as $item) {
                                    $name = $item['name']; ?>
                                    <option data-value="<?= $name ?>">
                                        <?= $name ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <div class="calculater-top__destination">
                                <select class="input-item" name="destination" id="destination" required>
                                    <option value="" disabled selected>Выберите направление</option>
                                    <?php foreach ($destination as $item) {
                                        $name = $item['name']; ?>
                                        <option data-value="<?= $name ?>">
                                            <?= $name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <?php if ($cargo) { ?>
                                <div class="calculater-top__cargo">
                                    <select class="input-item" name="cargo" id="cargo" required>
                                        <option value="" disabled selected>Выберите тип груза</option>
                                        <?php foreach ($cargo as $item) {
                                            $name = $item['name_cargo'];
                                            $value = $item['value_cargo'] ?>
                                            <option data-value="<?= $value ?>">
                                                <?= $name ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>

                            <button id="calculate-btn" class="call-back">Рассчитать</button>

                        </div>

                        <!-- Подключаем API Яндекс.Карт -->
                        <script src="https://api-maps.yandex.ru/2.1/?apikey=<?= $api ?>&lang=ru_RU" type="text/javascript"></script>

                        <script>
                            document.getElementById('calculate-btn').addEventListener('click', function() {
                                const fromCity = document.getElementById('static_city').selectedOptions[0].text;
                                const toCity = document.getElementById('destination').selectedOptions[0].text;
                                const cargoType = document.getElementById('cargo') ?
                                    document.getElementById('cargo').selectedOptions[0].dataset.value : 1;

                                if (!fromCity || !toCity) {
                                    alert('Пожалуйста, выберите города отправления и назначения');
                                    return;
                                }

                                // Инициализация Яндекс.Карт
                                ymaps.ready(function() {
                                    // Поиск координат для городов
                                    Promise.all([
                                        geocode(fromCity),
                                        geocode(toCity)
                                    ]).then(function(results) {
                                        const fromCoords = results[0];
                                        const toCoords = results[1];

                                        // Расчет расстояния между точками
                                        const distance = calculateDistance(fromCoords, toCoords);

                                        // Расчет стоимости
                                        const price = distance * cargoType;

                                        // Показываем результат
                                        // document.getElementById('distance-result').textContent = distance.toFixed(1);
                                        document.getElementById('price-result').textContent = price.toFixed(2);
                                        // document.getElementById('calculation-result').style.display = 'block';
                                    }).catch(function(error) {
                                        console.error('Ошибка:', error);
                                        alert('Не удалось рассчитать расстояние. Пожалуйста, проверьте названия городов.');
                                    });
                                });
                            });

                            // Функция для геокодирования (получения координат по названию города)
                            function geocode(cityName) {
                                return new Promise(function(resolve, reject) {
                                    ymaps.geocode(cityName, {
                                        results: 1
                                    }).then(function(res) {
                                        const firstGeoObject = res.geoObjects.get(0);
                                        if (firstGeoObject) {
                                            const coords = firstGeoObject.geometry.getCoordinates();
                                            resolve(coords);
                                        } else {
                                            reject('Город не найден');
                                        }
                                    }).catch(function(err) {
                                        reject(err);
                                    });
                                });
                            }

                            // Функция для расчета расстояния между двумя точками (в км)
                            function calculateDistance(fromCoords, toCoords) {
                                // Используем формулу гаверсинусов для расчета расстояния между точками на сфере
                                const R = 6371; // Радиус Земли в км
                                const dLat = toRad(toCoords[0] - fromCoords[0]);
                                const dLon = toRad(toCoords[1] - fromCoords[1]);
                                const lat1 = toRad(fromCoords[0]);
                                const lat2 = toRad(toCoords[0]);

                                const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                                    Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
                                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                                return R * c;
                            }

                            function toRad(degrees) {
                                return degrees * Math.PI / 180;
                            }
                        </script>
                        <div class="calculater-bot">
<!--                            <div id="calculation-result" style="display: none; margin-top: 20px;">-->
<!--                                <p>Расстояние: <span id="distance-result">0</span> км</p>-->
<!--                                <p>Стоимость: <span id="price-result">0</span> руб.</p>-->
<!--                            </div>-->
                            <div class="calculater-bot__answer">
                                Стоимость грузоперевозки составит: <div id="price-result"></div>
                            </div>
                            <div class="calculator-bot__policy">
                                <p>* Указана ориентировочная стоимость. Чтобы получить точный расчет, <a
                                        class="callback-privacy" data-modal data-src="#modal-callback">оставьте
                                        заявку</a> на сайте или позвоните нам.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-wrapper__bot">
                    <div class="form-wrapper__inputs">
                        <div class="input-group">
                            <label for="organization-name">Название организации*</label>
                            <input type="text" id="organization-name" name="org-name" class="input-item"
                                required>
                        </div>

                        <div class="input-group">
                            <label for="contact-person">Контактное лицо*</label>
                            <input type="text" id="contact-person" name="contact-person" class="input-item"
                               required>
                        </div>

                        <div class="input-group">
                            <label for="phone">Телефон*</label>
                            <input type="tel" id="phone" name="phone" class="input-item" 
                                required pattern="\+7\(\d{3}\)\d{3}-\d{4}">
                        </div>

                        <div class="input-group">
                            <label for="email">E-mail*</label>
                            <input type="email" id="email" name="email" class="input-item"
                                required>
                        </div>

                        <div class="input-group">
                            <label for="cargo-weight">Вес груза (кг)*</label>
                            <input type="number" id="cargo-weight" name="cargo-weight" class="input-item"
                               required min="1">
                        </div>

                        <div class="input-group">
                            <label for="cargo-dimensions">Габариты груза (м³)*</label>
                            <input type="number" id="cargo-dimensions" name="cargo-dimensions" class="input-item"
                                required min="0.1" step="0.1">
                        </div>

                        <div class="input-group">
                            <label for="route">Маршрут*</label>
                            <input type="text" id="route" name="route" class="input-item"
                                required>
                        </div>

                        <div class="input-group">
                            <label for="cargo-description">Описание груза и дополнительная информация*</label>
                            <textarea id="cargo-description" name="cargo-description" class="input-item" rows="4"
                                required></textarea>
                        </div>
                        <div class="input-group" style="display: none;">
                            <input type="hidden" id="calculated-price" name="calculated_price">
                        </div>
                    </div>
                    <div class="form-wrapper__button">
                        <div class="form-wrapper__privacy">
                            <p>*Все поля являются обязательными для заполнения.</p>
                            <div class="checkbox">
                                <input type="checkbox" id="privacy-policy" name="privacy_policy" required >
                                <label for="privacy-policy" class="checkbox-label">
                                    Согласен с обработкой моих персональных данных в соответствии с
                                    <a href="/privacy-policy/" target="privacy-policy">политикой конфиденциальности</a>.
                                </label>
                            </div>
                        </div>
                        <button class="call-back" type="submit" form-send>
                            Отправить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

