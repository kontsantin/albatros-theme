<div class="form form-v2">


	<div class="form__wrapper--row form__wrapper">
		<div class="input__wrapper">
			<input type="text" class="input" name="your-name" placeholder="Ваше имя*" required>
		</div>
		<div class="input__wrapper">
			<textarea name="review-text" class="input" id="review-text" placeholder="Текст отзыва"></textarea>
		</div>
	</div>



	<label for="file">
		<div class="file">
			<span class="file__title btn">Добавить фото</span>
		</div>
		<input id="file" type="file" name="your-file">
	</label>
	<p class="p2 file-text">(.png, jpeg) - Максимальный размер 5Mb, вы можете добавить фото без текста </p>
	<div class="checkbox-wrapper">
		<input type="checkbox" id="privacy-agreement" name="privacy-agreement" required>
		<label for="privacy-agreement">Я согласен на обработку персональных данных</label>
	</div>
	<button class="btn" type="submit" form-send>
		Отправить
	</button>
	<div class="privacy-link">
		*Нажимая на кнопку, Вы соглашаетесь
		<a target="_blank" href="/privacy-policy">
			на обработку персональных данных
		</a>
	</div>
</div>