<!DOCTYPE html>
<html <?php language_attributes() ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description')?>">
    <meta name="author" content="EDR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> </title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(''); ?>>

    <div id="pageWrapper">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <?php wp_nav_menu(array(
                'theme_location'=> 'Header_nav',
                'menu_class'  => 'nav navbar-nav'
            )); ?>
            <ul class="nav navbar-nav navbar-right">
              <?php if (is_user_logged_in() ): ?>
                <?php
                      $user = wp_get_current_user();
                 ?>
                   <li><a href="#"> <strong><?php echo $user->display_name ?> </strong>  </a> </li>
                  <li><a href="<?php echo wp_logout_url( home_url() ); ?>" title="Login">Logout</a></li>
              <?php else: ?>
                  <li><a href="<?php echo wp_login_url( home_url() ); ?>" title="Login">Login</a></li>
              <?php endif ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <br><br>
      <div id="theBanner">
        <img src="<?php header_image() ;?>" alt="" class="img-responsive" width=100%;>
      </div>
