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

<?php
$page_id = 1230;
$disp_service = get_field('disp_service', $page_id);
if (!empty($disp_service)) {
	$services = $disp_service;
} else {
	// создаем экземпляр
	$my_posts = new WP_Query;

	// делаем запрос
	$services = $my_posts->query([
		'post_type' => 'services'
	]);
}




?>

<main id="primary" class="archive">
	<div class="container">
		<?php render_breads(); ?>
		<h1 class="page-title">
			Услуги
		</h1>
		<?php if (!empty($services)): { ?>
				<div class="services__list archive-holder">
					<?php foreach ($services as $service): ?>
						<?php
						$title = $service->post_title;
						$descr = get_field('short_descr', $service);
						$link = get_permalink($service);
						$img = get_the_post_thumbnail_url($service);
						?>
						<a href="<?= $link ?>" class="list__item">
							<div class="item__text">
								<div class="item__title h5">
									<?= $title ?>
								</div>
								<?php if (!empty($descr)) { ?>
									<p class="p1 item__descr">
										<?= $descr ?>
									</p>
								<?php } ?>
								<div class="item__btn ">
									Подробнее
									<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="#0054F5" />
										<g clip-path="url(#clip0_521_335)">
											<path
												d="M37.3547 30.6058L30.8259 37.1348C30.6672 37.2872 30.4549 37.3714 30.2348 37.3692C30.0147 37.3669 29.8042 37.2785 29.6486 37.1228C29.4929 36.9672 29.4045 36.7567 29.4023 36.5366C29.4 36.3165 29.4842 36.1042 29.6367 35.9455L34.7301 30.8512H23.2411C23.0201 30.8482 22.8091 30.7582 22.6539 30.6008C22.4987 30.4434 22.4116 30.2313 22.4116 30.0102C22.4116 29.7891 22.4987 29.5769 22.6539 29.4195C22.8091 29.2622 23.0201 29.1722 23.2411 29.1692H34.7301L29.6368 24.0752C29.5561 23.9977 29.4917 23.9049 29.4473 23.8022C29.4029 23.6995 29.3795 23.589 29.3784 23.4771C29.3772 23.3652 29.3984 23.2542 29.4407 23.1506C29.483 23.047 29.5456 22.9529 29.6247 22.8738C29.7038 22.7947 29.7979 22.7321 29.9015 22.6899C30.0051 22.6476 30.1161 22.6264 30.2279 22.6275C30.3398 22.6286 30.4504 22.6521 30.5531 22.6964C30.6558 22.7408 30.7486 22.8052 30.8261 22.886L37.3549 29.4151C37.3944 29.4544 37.4298 29.4978 37.4605 29.5442C37.4735 29.564 37.4829 29.5863 37.4941 29.6066C37.5098 29.6338 37.5239 29.6618 37.5362 29.6906C37.5466 29.7181 37.5552 29.7461 37.5623 29.7748C37.5693 29.7991 37.5791 29.8228 37.584 29.8479C37.6056 29.9567 37.6056 30.0685 37.584 30.1772C37.5791 30.2024 37.5693 30.2255 37.5623 30.25C37.5552 30.2784 37.5465 30.3065 37.5362 30.334C37.5239 30.3628 37.5098 30.3909 37.4941 30.4181C37.4829 30.4388 37.4735 30.4602 37.4605 30.4805C37.4293 30.5255 37.394 30.5674 37.3549 30.6056L37.3547 30.6058Z"
												fill="#0054F5" />
										</g>
										<defs>
											<clipPath id="clip0_521_335">
												<rect width="16" height="16" fill="white" transform="translate(22 22)" />
											</clipPath>
										</defs>
									</svg>

								</div>
							</div>
							<?php if (!empty($img)) { ?>
								<div class="services__img">
									<img src="<?= $img ?>" alt="">
								</div>
							<?php } ?>
						</a>
					<?php endforeach ?>
				</div>
			<?php }endif ?>
	</div>
	<?= get_page_content(374); ?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
