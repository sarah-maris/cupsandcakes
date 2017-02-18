<?php
/**
 * Displays footer widgets if assigned
 *
 * Revised by Sarah Maris for CupsandCakes.com
 * Updated: 02-17-17
 *
 **/

?>

<?php
if ( is_active_sidebar( 'left-footer-widget' ) ||
   is_active_sidebar( 'center-footer-widget' ) ||
   is_active_sidebar( 'right-footer-widget' ) ) :
?>

  <aside class="widget-area" role="complementary">
      <?php
      if ( is_active_sidebar( 'left-footer-widget' ) ) { ?>
      <div class="widget-column footer-widget-1">
        <?php dynamic_sidebar( 'left-footer-widget' ); ?>
      </div>
    <?php }
    if ( is_active_sidebar( 'center-footer-widget' ) ) { ?>
      <div class="widget-column footer-widget-2">
        <?php dynamic_sidebar( 'center-footer-widget' ); ?>
      </div>
    <?php }

    if ( is_active_sidebar( 'right-footer-widget' ) ) { ?>
      <div class="widget-column footer-widget-3">
        <?php dynamic_sidebar( 'right-footer-widget' ); ?>
      </div>
    <?php } ?>

  </aside><!-- .widget-area -->

<?php endif; ?>
