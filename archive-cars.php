<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme
 */

get_header();
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<main id="primary" class="archive">
	<div class="container">
		<?php render_breads(); ?>
		<h1 class="page-title">
			Наш автопарк
		</h1>
		<?php if (have_posts()) { ?>

			<div class="archive__holder">
				<?php
				/* Start the Loop */
				while (have_posts()):
					the_post();
					?>



					<div class="cars__item">
						<?php
						$item = $post;
						$carName = get_field('car-name', $item);
						$image = get_field('car-image', $item);
						$carDescr = get_field('car-description', $item);
						?>

						<div class="car_item">

							<?php if (!empty($image)) { ?>
								<div class="car_image">

									<img src="<?php echo $image; ?>">

									<div class="h6 cars_title">
										<?= $carName ?>
									</div>

								</div>

							<?php } ?>

							<div class="car_info">

								<div class="car_description">

									<?= $carDescr ?>

									<a class="cars__btn-more h6">Читать полностью</a>
								</div>
								<div class="car_specifications">
									<?php
									$specifications = get_field('specifications'); // Получаем массив спецификаций
									if ($specifications) {
										foreach ($specifications as $spec) {
											$title = isset($spec['title']) ? $spec['title'] : '';
											$value = isset($spec['value']) ? $spec['value'] : '';
											?>
											<div class="spec_info">
												<p class="car_specifications-title">
													<?= esc_html($title); ?>
												</p>
												<p class="car_specifications-value">
													<?= esc_html($value); ?>
												</p>
											</div>
											<?php
										}
									}
									?>
								</div>

							</div>

						</div>

					</div>
					<!-- <?php if (!empty($item->post_content)) { ?>
						<div class="reviews__content">
							<?= $item->post_content; ?>
						</div>
					<?php } ?> -->


				<?php endwhile; ?>
			</div>

			<?php
			get_template_part('inc/parts/pagination');

		} else {

			get_template_part('template-parts/content', 'none');

		}
		?>
	</div>

</main><!-- #main -->

<script>
	jQuery(document).ready(function ($) {
		$('.cars__btn-more').on('click', function () {
			var $description = $(this).closest('.car_info').find('.car_description p');
			var $button = $(this);

			if ($description.hasClass('expanded')) {
				$description.removeClass('expanded');
				$button.text('Читать полностью');
			} else {
				$description.addClass('expanded');
				$button.text('Скрыть');
			}
		});
	});
</script>


<?php
// get_sidebar();
get_footer();
