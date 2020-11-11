<?php get_header(); ?>
	<main class="main-blog">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="article-blog">
				<img class='article-blog-img' src="<?php echo get_template_directory_uri() . '/assets/img/img1.png'; ?>" alt="img"> 
				<?php the_post_thumbnail(); ?>
				<div class="wrap">
					<div class='data'><?php the_time('F j') ?>, <?php the_author(); ?></div>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<div class="wrap_btn">
						<a class='btn btn_buttom' href="<?=get_post_permalink(); ?>">read post</a>
						<div class="wrap-like">
							<span class='like_counter'><?php echo $like = get_post_meta($id, 'like-meta', true); ?></span>
							<button 
								style='cursor: pointer;'
								class='btn like_btn' 
								data-id='<?php echo $id; ?>' 
								data-href='<?php echo esc_url(admin_url('admin-ajax.php')); ?>'>
								<img src="<?php echo get_template_directory_uri() . '/assets/img/like-blog.png'; ?>" alt="like">
							</button>
						</div>
						<a href='<?=get_post_permalink(); ?>' class="wrap-comments">
						<span><?=get_comments_number(); ?></span>	
						<img src="<?php echo get_template_directory_uri() . '/assets/img/comm-blog.png'; ?>" alt="like">
						</a>
					</div>
				</div>
				<div class="wrap_naw"></div>
			</article>
		<?php endwhile; ?>
			<?php 
				$args = array(
					'show_all'     => false, // показаны все страницы участвующие в пагинации
					'end_size'     => 1,     // количество страниц на концах
					'mid_size'     => 1,     // количество страниц вокруг текущей
					'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
					'prev_text'    => '<',
					'next_text'    => '>',
					'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
					'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
					'screen_reader_text' => __( 'Posts navigation' ),
				);
				the_posts_pagination($args); 
			?>
		<?php endif; ?>
	</main>
<?php get_footer(); ?>



	

