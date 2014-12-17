<?php get_header(); ?>



<?php 
  $args = array(
    'post_type' => 'exhibitions',
    'posts_per_page' => 1,
    'meta_key' => 'exhibition_begin_date', // name of custom field
    'orderby' => 'meta_value_num',
    'order' => 'DSC'
  );
  $the_query = new WP_Query( $args );
?>
<?php $the_query->the_post(); ?>
<?php 
  $thumbnail_id = get_post_thumbnail_id();
  $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full', true );
  $dateBegin = DateTime::createFromFormat('Ymd', get_field('exhibition_begin_date'));
  $dateEnd = DateTime::createFromFormat('Ymd', get_field('exhibition_end_date'));
  $dateRec = DateTime::createFromFormat('Ymd', get_field('exhibition_opening_reception_date'));
?>
  <style type="text/css">
      header.intro:after {
        background-image: url('<?php echo $thumbnail_url[0]; ?>');
      }
    </style>  

<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  
                   <h1 class="brand-heading"><?php the_field('artist_name'); ?></h1>
                    <p class="intro-text">
                    <b>
                      <?php if ( $dateBegin->format('Y') == $dateEnd->format('Y') ): ?>
                        <?php if ( $dateBegin->format('m') == $dateEnd->format('m') ): ?>  
                          <?php echo $dateBegin->format('M j'); ?>&ndash;<?php echo $dateEnd->format('j, Y'); ?>
                        <?php else : ?>
                          <?php echo $dateBegin->format('M j'); ?>&ndash;<?php echo $dateEnd->format('M j, Y'); ?>
                        <?php endif; ?>
                      <?php else : ?>
                        <?php echo $dateBegin->format('M j, Y'); ?>&ndash;<?php echo $dateEnd->format('M j, Y'); ?>          
                      <?php endif; ?>
                      at Box Gallery <br> 667 Main Street &bull; Buffalo, NY</b>
                    </p>
                     
                    <a href="#upcoming" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Upcoming Section -->
<section id="upcoming" class="content-section text-center">
<div class="container">
  <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
          <h1><?php the_title(); ?></h1>
          <h3>Works by <?php the_field('artist_name'); ?></h3>
         
         <p> 
          <b>
            <?php if ( $dateBegin->format('Y') == $dateEnd->format('Y') ): ?>
              <?php if ( $dateBegin->format('m') == $dateEnd->format('m') ): ?>  
                <?php echo $dateBegin->format('F j'); ?>&ndash;<?php echo $dateEnd->format('j, Y'); ?>
              <?php else : ?>
                <?php echo $dateBegin->format('F j'); ?>&ndash;<?php echo $dateEnd->format('F j, Y'); ?>
              <?php endif; ?>
            <?php else : ?>
              <?php echo $dateBegin->format('F j, Y'); ?>&ndash;<?php echo $dateEnd->format('F j, Y'); ?>          
            <?php endif; ?>
          <br>
          Opening reception: 
          <?php echo $dateRec->format('l, F j'); ?> at 8:00pm     </b>
          </p>
          <p><?php the_content(); ?></p>

         <!--  <p>
          <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-default">See more</a>
          </p> -->

      </div>
      </div>
  </div>
</section>

<!-- About Section -->
<section id="about" class=" content-section text-center">
<div class="container">
  <div class="row">
      <div class="col-lg-10 col-lg-offset-1">

          <h2>About Box Gallery</h2>
          <?php 
            $about = get_post(2);
            echo apply_filters( 'the_content', $about->post_content );
          ?>
          
      </div>
  </div>
  </div>  
</section>

<!-- Exhibition Section -->
<section id="exhibitions" class="content-section text-center">
<div class="container">
    <div class="row">
          <div class="col-lg-10 col-lg-offset-1">
              <h2>Past Exhibitions</h2>
                  
                  <?php 
                    $args = array(
                      'post_type' => 'exhibitions',
                      'meta_key' => 'exhibition_begin_date', // name of custom field
                      'orderby' => 'meta_value_num',
                      'order' => 'DSC',
                      'offset' => '1'
                    );
                    $the_query = new WP_Query( $args );
                  ?>
                  <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    
                    <?php $exhibition_count = $the_query->current_post+1; ?>

                    <?php if ( $exhibition_count%4 == 1 ): ?>
                      <!-- row start -->
                      
                    <?php endif; ?>

                    <div class="col-sm-3 portfolio-piece">
                      <?php 
                        $thumbnail_id = get_post_thumbnail_id();
                        $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail', true );
                        $dateBegin = DateTime::createFromFormat('Ymd', get_field('exhibition_begin_date'));
                        $dateEnd = DateTime::createFromFormat('Ymd', get_field('exhibition_end_date'));
                      ?>
                    

                      <p><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></p>
                      <h4><?php the_field('artist_name'); ?></h4>
                      <h5><?php the_title(); ?></h5>
                      <p class="date">
                        <b><?php if ( $dateBegin->format('Y') == $dateEnd->format('Y') ): ?>
                          <?php if ( $dateBegin->format('m') == $dateEnd->format('m') ): ?>  
                            <?php echo $dateBegin->format('M j'); ?>&ndash;<?php echo $dateEnd->format('j, Y'); ?>
                          <?php else : ?>
                            <?php echo $dateBegin->format('M j'); ?>&ndash;<?php echo $dateEnd->format('M j, Y'); ?>
                          <?php endif; ?>
                        <?php else : ?>
                          <?php echo $dateBegin->format('M j, Y'); ?>&ndash;<?php echo $dateEnd->format('M j, Y'); ?>          
                        <?php endif; ?></b>
                      </p>
                    </div><!--item-->
                    
                    <?php if ( $exhibition_count % 4 == 0 ): ?>
                      </div><!-- 4 items end -->
                    <?php endif; ?>

                  <?php endwhile; endif; ?>

                  <?php if ( $exhibition_count % 4 != 0 && $exhibition_count % 4 != 1 ): ?>    
                      </div><!-- incomplete row end -->
                  <?php endif; ?>

          </div>
        </div>
  </div>
</section>



<!-- Contact Section -->
<section id="contact" class="content-section text-center">
<div class="container">
  <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
          <h2>Contact</h2>
          <p>Feel free to email us if you would like more information.</p>
          <p style="text-align: center;"><a href="mailto:hello@boxgallerybflo.com">hello@boxgallerybflo.com</a>
          </p>
          <ul class="list-inline banner-social-buttons">
              <li>
                  <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
              </li>
              <li>
                  <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-facebook-square fa-fw"></i> <span class="network-name">Facebook</span></a>
              </li>
              <li>
                  <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-foursquare fa-fw"></i> <span class="network-name">FourSquare</span></a>
              </li>
          </ul>
      </div>
  </div>
  </div>
</section>



<!-- Map Section -->
<section><div id="map"></div></section>

<?php get_footer(); ?>

