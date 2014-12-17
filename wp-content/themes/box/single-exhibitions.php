<?php 
/*
  Template Name: Single Exhibition Page
*/
?>

<?php get_header(); ?>

<div class="inner cover single-exhibitions">
  <div class="row">
    <div class="col-xs-3 prev-next">
          <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>'); ?>
          <a href="<?php bloginfo('url'); ?>/?p=10"><span class="glyphicon glyphicon-th"></span></a>
          <?php next_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>'); ?>
    </div>
  </div>
  <div class="row">    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="portfolio-image col-md-6 col-md-offset-1">
      <?php 
       $thumbnail_id = get_post_thumbnail_id();
       $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full', true );
      ?>
      <p><a href="<?php the_permalink(); ?>">
        <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic">
      </a></p>
    </div>
    <div class="col-md-4 description">
      <h1 class="cover-heading"><?php the_field('artist_name'); ?></h1>  
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>    
  </div>
</div>

<?php get_footer(); ?>