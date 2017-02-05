<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * Added cupscakes class
 *
 * Revised 1-12-17
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site cupscakes">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>
        <?php if ( has_nav_menu( 'social' ) ) : ?>
          <div class="social-navigation header-social" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'social',
                'menu_class'     => 'social-links-menu',
                'depth'          => 1,
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
              ) );
            ?>
          </div><!-- .social-navigation -->
        <?php endif;?>
<div class="cupscakes-hours">
  <!--Mon-Wed 6:00AM-5:00PM<br>
  Thurs–Sat: 6:00AM-10:00PM<br>-->
  Mon-Sat 6:00AM-5:00PM<br>
  Sunday: 6:00AM–2:00PM
</div>
  <header id="masthead" class="site-header" role="banner">

    <?php get_template_part( 'template-parts/header/header', 'image' ); ?>

    <?php if ( has_nav_menu( 'top' ) ) : ?>
      <div class="navigation-top">
        <div class="wrap">
          <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
        </div><!-- .wrap -->
      </div><!-- .navigation-top -->
    <?php endif; ?>

  </header><!-- #masthead -->

  <?php
  // If a regular post or page, and not the front page, show the featured image.
  if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) :
    echo '<div class="single-featured-image-header">';
    the_post_thumbnail( 'twentyseventeen-featured-image' );
    echo '</div><!-- .single-featured-image-header -->';
  endif;
  ?>

  <div class="site-content-contain">
    <div id="content" class="site-content">
