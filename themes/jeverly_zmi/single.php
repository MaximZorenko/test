<?php get_header(); ?>
	<main class="main-single">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="article-single">
				<img class='article-blog-img' src="<?php echo get_template_directory_uri() . '/assets/img/img1.png'; ?>" alt="img"> 
				
				<h2><?php the_title(); ?></h2>
				<?php the_post_thumbnail(); ?>
				<div class='data'><?php the_time('F j') ?>, <?php the_author(); ?></div>
				<?php the_content(); ?>
				
				<div class="wrap_naw"></div>
			</article>
			<div class="link">
				<?php previous_post_link('%link'); ?>
				<?php next_post_link('%link'); ?>
			</div>
			<?php 
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif; 
			?>
		<?php endwhile; ?>
		<?php endif; ?>
	</main>
<?php get_footer(); ?>