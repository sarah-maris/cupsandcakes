<?php
/**
 * Additional Functions
 *
 * Designed by Sarah Maris for CupsandCakesRumson.com based on TwentySeventeen theme
 * revised  2/28/2017
 *
 **/

 /*
 * Contents:
 *  1.0 - Add scripts
 *
 *  2.0 - Create Class Taxonomy for pages
 *
 *  3.0 - Customize comment output
 *
 *  4.0 - Customize footer widgets
 *
 *  5.0 - Comments carousel shortcode
 *
 */


/* 1.0  ADD THEME SCRIPTS
 * --------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
  wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Changa+One|Crimson+Text:400,700|Open+Sans:400,700', false );
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
  wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri().'/css/owl.carousel.css' );
  wp_enqueue_script( 'scrollaction',get_stylesheet_directory_uri().'/js/scrollaction.js');
  wp_enqueue_script( 'owl',get_stylesheet_directory_uri().'/js/owl-action.js');
  wp_enqueue_script( 'owl-carousel',get_stylesheet_directory_uri().'/js/owl.carousel.min.js');
  wp_enqueue_script( 'masonry-init' , get_stylesheet_directory_uri() . '/js/masonry-init.js', array('jquery-masonry'), '1', true );
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
}

/*  2.0 CREATE CLASS TAXONOMY FOR PAGES
 * --------------------------------------------------*/
 // hook into the init action and call create_class_taxonomy when it fires
 add_action( 'init', 'create_class_taxonomy', 0 );

 // create taxonomy to add CSS class to page/section
 function create_class_taxonomy() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Page Class', 'taxonomy general name', 'textdomain' ),
    'singular_name'     => _x( 'Page Class', 'taxonomy singular name', 'textdomain' ),
    'search_items'      => __( 'Search Page Classes', 'textdomain' ),
    'all_items'         => __( 'All Page Classes', 'textdomain' ),

    'edit_item'         => __( 'Edit Page Class', 'textdomain' ),
    'update_item'       => __( 'Update Page Class', 'textdomain' ),
    'add_new_item'      => __( 'Add New Page Class', 'textdomain' ),
    'new_item_name'     => __( 'New Page Class Name', 'textdomain' ),
    'menu_name'         => __( 'Page Class', 'textdomain' ),
  );

  $args = array(
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
  );

  register_taxonomy( 'page_classes', 'page', $args );
}

/*  3.0 CUSTOM COMMENT OUTPUT
 * --------------------------------------------------*/
// source:  https://saltnpixels.com/customizing-the-wp-comments-section-using-callback/

function cups_comments($comment, $args, $depth){
   //checks if were using a div or ol|ul for our output
   $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
      <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
         <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
               <div class="comment-author vcard">
                  <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                  <?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) ); ?>
               </div><!-- .comment-author -->

               <div class="comment-metadata">

                     <time datetime="<?php comment_time( 'c' ); ?>">
                        <?php
                           /* translators: 1: comment date, 2: comment time */
                           printf( __( '%1$s' ), get_comment_date( '', $comment )); // CUPS CHANGE - REMOVE COMMENT TIME
                        ?>
                     </time>

                  <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
               </div><!-- .comment-metadata -->

               <?php if ( '0' == $comment->comment_approved ) : ?>
               <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
               <?php endif; ?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
               <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <?php
            comment_reply_link( array_merge( $args, array(
               'add_below' => 'div-comment',
               'depth'     => $depth,
               'max_depth' => $args['max_depth'],
               'before'    => '<div class="reply">',
               'after'     => '</div>'
            ) ) );
            ?>
         </article><!-- .comment-body -->
         <?php
}

/*  4.0 CUSTOMIZE FOOTER WIDGETS
 * --------------------------------------------------*/
function cups_remove_footer_widgets(){

// Unregister twentyseventeen footer widgets
  unregister_sidebar( 'sidebar-2' );
  unregister_sidebar( 'sidebar-3' );
}

add_action( 'widgets_init', 'cups_remove_footer_widgets', 11 );


function cups_add_footer_widget() {

  register_sidebar( array(
    'name'          => __( 'Footer 1 (left)', 'twentyseventeen' ),
    'id'            => 'left-footer-widget',
    'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 2 (center)', 'twentyseventeen' ),
    'id'            => 'center-footer-widget',
    'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 3 (right)', 'twentyseventeen' ),
    'id'            => 'right-footer-widget',
    'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

}

add_action( 'widgets_init', 'cups_add_footer_widget' );


/*  5.0 COMMENTS CAROUSEL SHORTCODE
 * --------------------------------------------------*/

function comments_carousel_shortcode( $atts ) {

    // Attributes
  $atts = shortcode_atts(
    array(
      'postID' => ''
    ),
    $atts,
    'comments-carousel'
  );

     $output = '<div id="owl-comments-caro" class="owl-carousel owl-theme">';
     // echo $output;
         $comments = get_comments('post_id=' . postID);
   // $comments = get_comments('post_id=1218');
    $d = "F j, Y";
    $d = "F j, Y";
      foreach($comments as $comment) :
        $id =  $comment->comment_ID;
        $comment_date = get_comment_date( $d, $id );
        $comment_text = get_comment_text($id);
        $output .= '<div class="item">' .
            '<h4 class="cups-comment-date">' .$comment_date .'</h4>' .
            '<p class="cups-comment">' . $comment_text .'</p>' .
          '</div>';
      endforeach;
     $output .= '</ul>';

  // Return code
  return $output;

}
add_shortcode( 'comments-carousel', 'comments_carousel_shortcode' );

?>
