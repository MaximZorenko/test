<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jeverly_zmi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


	<header class="main-header">
		<nav class="navbar navbar-expand-md navbar-light">
			<?php the_custom_logo();?>
			<div class="wrap_naw"></div>
			<div class="wrap_search">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/search.png' ?>" alt="search">
				<img class='clos' src="<?php echo get_template_directory_uri() . '/assets/img/x.png' ?>" alt="x">
			</div>

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-header',
							'menu_id'        => 'primary-menu',
							'container' => false,
							// 'menu_class' => 'navbar-nav'
						)
					);
				?>

			<?=get_search_form(); ?>
		</nav>
			
			
	</header>
