<?php
/**
 * Template Name: Posts Page
 * The template for displaying a full-width page with an intro and posts loop
 *
 * Revised 2-05-17
 *
 **/

get_header(); ?>

<div class="wrap page-full-width">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php /* The loop */
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/page/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      ?>
    <hr>
    <div class="cups-masonry-container">
   <?php rewind_posts(); /*  RESTART LOOP TO GET POSTS */ ?>
        <?php  $args =  array (  //Requests  posts in date order
          'post_type' => 'post',
          'orderby'=> 'date',
          'order' => 'DSC',
          'paged' => $paged,
          'posts_per_page' => 12,
          );

        $wp_query = new WP_Query($args );

      if ( have_posts() ) : ?>
       <div id="masonry-loop">
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();

          /*
           * Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'template-parts/post/content', get_post_format() );

        endwhile; ?>
      </div><!--/#masonry-loop-->
    </div><!--/.cups-masonry-container-->
      <?php
      the_posts_pagination( array(
        'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
      ) );

    else :

      get_template_part( 'template-parts/post/content', 'none' );

    endif; ?>

      <?php wp_reset_postdata();  ?>
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
