<?php /** * The template for displaying the footer * * Contains the closing of the #content div and all content after.
  * * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials 
  * * @package Company */

$socials = @settings('socials');
$emails = @settings('emails');
$phones = @settings('phones');
$copyright = @settings('copyright');
$requisites = @settings('requisites');
$footer_logo = @settings('footer_logo');
$type = theme('type');
$logo = @settings('logotype');
$siteTitle = theme('site-title');
?>

<footer id="footer" class="site-footer">
	<div class="container footer__container">
		<div class="footer__top">


			<div class="footer__column">
				<!-- <?php if (!empty($requisites)) { ?>
					<div class="footer__requisites">
						<?= $requisites ?>
					</div>
				<?php } ?> -->
				<?php
				wp_nav_menu([
					'theme_location' => 'footMenu',
					'container' => false,
					'menu' => 'Страницы (футер)',
					'menu_class' => 'footer__list',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
					'depth' => 1,
				]);
				?>
			</div>

			<div class="footer__column">
				<?php
				wp_nav_menu([
					'theme_location' => 'footCat',
					'container' => false,
					'menu' => 'Услуги(футер)',
					'menu_class' => 'footer__list services',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
					'depth' => 2,
				]);
				?>
			</div>
			<?php if ($type === true) { ?>
				<a href="/" class="footer__logo logo"><img src="<?= $logo ?>" alt=""></a>
			<?php } ?>
			<?php if ($type === "" && !empty($siteTitle)) { ?>
				<a href="/" class="footer__logo title"><?php echo $siteTitle ?></a>
			<?php } ?>
			<div class="footer__column">
				<div class="footer__phone">
					<?php if (!empty($phones)): { ?>
							<?php foreach ($phones as $phone) { ?>
								<a href="<?= format('phone', $phone['value']); ?>" class="phones__link num">
									<?= $phone['value']; ?>
								</a>
							<?php } ?>
						<?php }endif ?>

						<?php if (!empty($emails)): ?>
							<div class="emails-holder">
								<?php foreach ($emails as $email) { ?>
									<a href="<?= format('email', $email['value']); ?>" class="email p2">
										<?php echo $email['value']; ?>
									</a>
								<?php } ?>
							</div>
						<?php endif ?>
				</div>
				<div class="footer__contacts">
					<div class="footer__contacts-wrapper">
						<!-- <?php if ($phones) { ?>
								<div class="phones-holder">
									<?php foreach ($phones as $phone) { ?>
										<a href="<?= format('phone', $phone['value']); ?>" class="phones__link num">
											<?= $phone['value']; ?>
										</a>
									<?php } ?>
								</div>
							<?php } ?> -->
						
					</div>
					<?php if (!empty($socials)): ?>
						<div class="soc-holder">
							<?php foreach ($socials as $item) { ?>
								<a target="_blank" href="<?= $item['value']; ?>" class="soc">
									<?= get_image($item['icon'], [24, 24]); ?>
								</a>
							<?php } ?>
						</div>
					<?php endif ?>
					<button data-modal data-src="#modal-callback" class="btn">
						Задать вопрос
					</button>
				</div>
			</div>


		</div>

		<div class="footer__bottom">
			<a target="_blank" href="/privacy-policy" class="p2 privacy-policy">Политика конфиденциальности</a>
			<div class="example-holder">
				<a href="https://grampus-studio.ru/?utm_source=client&utm_keyword=<?= get_site_url(); ?>"
					target="_blank" class="dev" rel="nofollow">
					Сайт разработан
					<div class="glogo"></div>
				</a>
			</div>
			<?php if (!empty($copyright)): { ?>
					<p class="copyright p2">

						<?php echo '© ' . date('Y. ') . $copyright ?>

					</p>
				<?php }endif ?>
		</div>
	</div>
	</div>
</footer>
<?php get_template_part('inc/parts/modals'); ?>

<?php wp_footer(); ?>

</body>

</html>