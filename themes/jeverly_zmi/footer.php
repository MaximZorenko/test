<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jeverly_zmi
 */

?>

	<footer class="main-footer">
		<div class="wrap_naw"></div>
		<?php the_custom_logo();?>
		<?php if(is_active_sidebar('sidebar-social-footer')): ?> 
			<?php dynamic_sidebar( 'sidebar-social-footer' ); ?>
		<?php endif; ?>
		<div class="wrap_footer_form">
			<?=do_shortcode('[contact-form-7 id="62" title="footer"]');  ?>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
