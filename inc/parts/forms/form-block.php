<div class="form form-v2">
	<div class="form__wrapper--row form__wrapper">
		<div class="input__wrapper">
			<input type="text" class="input" name="your-name" placeholder="Ваше имя">
		</div>
		<div class="input__wrapper">
			<input type="tel" class="input" name="your-tel" placeholder="Ваш телефон*" required>
		</div>
	</div>
	<div class="checkbox-wrapper">
		<input type="checkbox" id="privacy-agreement" name="privacy-agreement" required>
		<label for="privacy-agreement">Я согласен на обработку персональных данных</label>
	</div>

	<!-- Скрытые поля с контекстом страницы отправки -->
	<?php
	// Попытка получить читаемое название страницы из WP. Если не доступно — подставляем путь или "Главная"
	$page_name = '';
	if ( function_exists('is_front_page') && (is_front_page() || is_home()) ) {
		$page_name = 'Главная';
	} else {
		global $post;
		if ( isset($post) && $post ) {
			$page_name = get_the_title($post->ID);
		} else {
			$queried = get_queried_object();
			if ( $queried && ! empty($queried->post_title) ) {
				$page_name = $queried->post_title;
			} else {
				$path = isset($_SERVER['REQUEST_URI']) ? trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '';
				if ( empty($path) ) {
					$page_name = 'Главная';
				} else {
					// Попробуем найти страницу/запись по пути
					$found = get_page_by_path($path, OBJECT, array('page','post'));
					if ( $found ) {
						$page_name = get_the_title($found->ID);
					} else {
						$segments = explode('/', $path);
						$slug = end($segments);
						$found2 = get_page_by_path($slug, OBJECT, array('page','post'));
						if ( $found2 ) {
							$page_name = get_the_title($found2->ID);
						} else {
							$page_name = urldecode($slug);
						}
					}
				}
			}
		}
	}
	$page_name = sanitize_text_field( trim( $page_name ) );
	?>
	<input type="hidden" name="page" class="form-page" value="<?php echo esc_attr( $page_name ); ?>">
	<input type="hidden" name="referrer" class="form-referrer" value="<?php echo esc_attr( wp_get_referer() ? wp_get_referer() : '' ); ?>">

	<button class="btn" type="submit" form-send>
		Отправить
	</button>
	<div class="privacy-link">
		*Нажимая на кнопку, Вы соглашаетесь <br>
		<a target="_blank" href="/privacy-policy">
			на обработку персональных данных
		</a>
	</div>
</div>

<script>
// Гарантированно установим текущий URL и реферер на клиенте (в случае динамических модальных вставок)
(function(){
	try{
		var forms = document.querySelectorAll('.form');
		forms.forEach(function(f){
			var p = f.querySelector('.form-page');
			if(p) {
				// если URL без пути — считаем главной, иначе ставим заголовок страницы (document.title) как запасной вариант
				var path = window.location.pathname.replace(/^\/+|\/+$/g, '');
				if(!path) p.value = 'Главная';
				else p.value = document.title || path;
			}
			var r = f.querySelector('.form-referrer');
			if(r) r.value = document.referrer || r.value || '';
		});
	}catch(e){console && console.warn && console.warn('form context set error', e)}
})();
</script>