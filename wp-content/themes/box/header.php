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

  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" <?php body_class(); ?> >
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars fa-lg"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo home_url(); ?>/#page-top">
                    
                </a>
            </div>

            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                     <li>
                        <a class="page-scroll" href="#upcoming">Upcoming</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="#exhibitions">Exhibitions</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



 
