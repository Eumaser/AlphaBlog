<?php

/*
=================
Theme Setup
=================
*/

function alphaBlog_setup(){

  add_theme_support('menus');
  add_theme_support('automatic-feed-links');
  add_theme_support('post-formats', array(
    'aside',
    'gallery',
    'image',
    'video',
    'quote',
    'link',
    'status',
    'audio',
    'chat'

  ));

  add_theme_support('post-thumbnails');
  add_theme_support('custom-background');
  add_theme_support('custom-header');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
  ));

  add_theme_support('custom-logo');
  register_nav_menus(array(
    'Header_nav' =>('Header Navigation Menu'),
    'Header2_nav' =>('Header Navigation Right Menu'),
    'Footer_nav' =>('Footer Navigation Menu'),

  ));
  add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action('after_setup_theme', 'alphaBlog_setup');


/*
=================
Widget Setup
=================
*/

function alphaBlog_widgets() {
  register_sidebar(array(
    'name'=>'Sidebar',
    'id'=>'sidebar-1',
    'description'=>'Add widgets here to appear on right side sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',


  ));

}
add_action('widgets_init','alphaBlog_widgets');

/*
=================
Styles and scripts Setup
=================
*/

function alphaBlog_styles() {
    wp_enqueue_style('nunito-sans', 'https://fonts.googleapis.com/css?family=Nunito+Sans', array(), null );

  //	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '3.3.7');
//    wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font_awesome/css/font-awesome.css', array(), '4.7.0');
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7');
    wp_enqueue_style('font-awesome', 'https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css', array(), '4.7.0');

    wp_enqueue_style('alpha_style',	 get_stylesheet_uri() );

    //wp_enqueue_script('alphaBlog_js',get_template_directory_uri().'/js/bootstrap.js',array(), '3.3.7');
    wp_enqueue_script('alphaBlog_js','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',array(), '3.3.7');

}

add_action('wp_enqueue_scripts','alphaBlog_styles');


/*
=================
Customize the comment list wp_comment_list
=================
*/

function alphaBlog_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>

    <div class="comment-author vcard pull-left">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="comment-data-right clearfix">
          <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?><br>
          <?php echo get_comment_date().' ' .get_comment_time(); ?>
          <div class="reply edit-comment">
            <?php edit_comment_link(__('Edit comment'), '', ''); ?>  ||
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <div class="commentText">
          <?php comment_text(); ?>
        </div>
      </div>
    </div>

    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }






/*
=======================
email SMTP function
=======================
*/

add_action( 'phpmailer_init', 'mailer_config', 10, 1);

function mailer_config(PHPMailer $mailer){
      $mailer->IsSMTP();
      $mailer->Host = "smtp.google.com"; // your SMTP server
      $mailer->SMTPAuth = true;
    //  $mailer->SMTPDebug = 0; // write 0 if you don't want to see client/server communication in page
    //  $mailer->Debugoutput = 'html';

      $mailer->Port = 465;
      $mailer->SMTPSecure = 'ssl';
      $mailer->Host= 'smtp.gmail.com';
      $mailer->Username = ''; //email
      $mailer->Password = ''; //email password
}
//add_action( 'phpmailer_init', 'mailer_config', 10, 1);




 ?>
