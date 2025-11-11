<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme
 */

get_header();
?>

<?php
$img = settings('404_img') ?>

<main id="main" class="site-main error-page">
	<div class="container">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php if (function_exists('bcn_display')) {
				bcn_display();
			} ?>
		</div>
		<?php if (!empty($img)): { ?>
				<div class="img-404">
					<img src="<?= $img ?>" alt="">
				</div>
			<?php }endif ?>
		<h3 class="title-404">
			Ой, произошла ошибка!
		</h3>
		<p class="p1 descr-404">
			Извините, но запрашиваемая Вами страница <br>
			на нашем сайте не найдена.
		</p>
		<a href="/" class="btn btn-404">
			Вернуться на главную страницу
		</a>
	</div>
</main><!-- #main -->

<?php
get_footer();
