<?php
/**
 * Category: Programs
 */

get_header();
global $post;
?>

    <?php ttfmake_maybe_show_sidebar( 'left' ); ?>

        <main id="site-main" class="site-main" role="main">
            <?php $query = new WP_Query( array( 'page_id' => 441 ) ); 
            
            /**
            * display static Programs page 
            */
            
            ?> 
              
                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                     <?php the_content(); ?>
                <?php endwhile; ?>
                <?php else : ?>
                    <?php get_template_part( 'partials/content', 'none' ); ?>
                <?php endif; ?>
             

            <?php if ( have_posts() ) : 
            
            /**
            * repeat loop for featured programs
            */
            
            ?>

                <?php while ( have_posts() ) : the_post(); ?>
            <?php
		/**
		 * Allow for changing the template partial.
		 *
		 * @since 1.2.3.
		 *
		 * @param string     $type    The default template type to use.
		 * @param WP_Post    $post    The post object for the current post.
		 */
		$template_type = apply_filters( 'make_template_content_archive', 'archive', $post );
		get_template_part( 'partials/content', $template_type ); ?>
                                                     
                                                        <?php endwhile; ?>

                                                            <?php get_template_part( 'partials/nav', 'paging' ); ?>

                                                                <?php else : ?>
                                                                    <?php get_template_part( 'partials/content', 'none' ); ?>
                                                                        <?php endif; ?>
        </main>

        <?php ttfmake_maybe_show_sidebar( 'right' ); ?>

            <?php get_footer(); ?>