<?php /* Template Name: About Contacts */ ?>
<?php get_header(); ?>
<div class="main-page">
<img class='page-img-top' src="<?php echo get_template_directory_uri() . '/assets/img/img1.png'; ?>" alt="img">
<?php if ( have_posts() ) :  while ( have_posts() ) : the_post();?>
    <?php the_content(); ?>     
<?php endwhile; endif; wp_reset_postdata(); ?>
<div class="post_gallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class='text-center'><?=get_field( "h3" )?></h3>
            </div>
        </div>
        <div class="row">
            <?php 
            $args = array(
                'posts_per_page' => 4,
                'post_type' => 'post'
            );
            $query = new WP_Query( $args ); $i = 1;
            // print_res($query);
            ?>
            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-md-3">
                    <div class="wrap">
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="wrap-like">
                            <button 
                                style='cursor: pointer;'
                                class='btn like_btn' 
                                data-id='<?php echo $id; ?>' 
                                data-href='<?php echo esc_url(admin_url('admin-ajax.php')); ?>'>
                                <img src="<?php echo get_template_directory_uri() . '/assets/img/like.png'; ?>" alt="like">
                            </button>
                            <span class='like_counter'><?php echo $like = get_post_meta($id, 'like-meta', true); ?></span>
                        </div>
                    
                        <a href='<?=get_post_permalink(); ?>' class="wrap-comments">
                            <span><?=get_comments_number(); ?></span>	
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/comm.png'; ?>" alt="like">
                        </a>
                    </div>
                </div>
            <?php $i++; endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<img class='page-img-foot6er' src="<?php echo get_template_directory_uri() . '/assets/img/img1.png'; ?>" alt="img">
</div>
<?php get_footer(); ?>