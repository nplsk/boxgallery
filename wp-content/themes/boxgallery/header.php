<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

    <title><?php wp_title( '|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?> >
  
  <div class="site-wrapper">

      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
                <h3 class="masthead-brand"><a href="<?php echo home_url(); ?>">
                    <?php bloginfo('name'); ?>
                </a></h3>
              <nav class="" role="navigation">
                <?php

                    $defaults = array(
                        
                        'menu'            => 'primary',
                        'container'       => 'div',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'nav masthead-nav',
                        'fallback_cb'     => 'wp_page_menu',
                        'depth'           => 0,

                    );

                    wp_nav_menu( $defaults );

                    ?>


              </nav>
            </div>
          </div>
