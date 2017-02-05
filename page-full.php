<?php
/**
 * Template Name: Full Width
 * The template for displaying a full-width page
 *
 * Designed by Sarah Maris for CupsandCakesRumson.com based on TwentySeventeen theme
 * Revised 1-12-17
 */

get_header(); ?>

<div class="wrap page-full-width">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/page/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
