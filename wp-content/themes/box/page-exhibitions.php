<?php 
/*
  Template Name: Exhibitions Grid
*/
?>

<?php get_header(); ?>

<div class="inner cover">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <h1 class="hidden-xs"><?php the_title(); ?></h1>
<?php endwhile; endif; ?>

   
    <?php 
      $args = array(
        'post_type' => 'exhibitions',
        'meta_key' => 'exhibition_begin_date', // name of custom field
        'orderby' => 'meta_value_num',
        'order' => 'DSC'
      );
      $the_query = new WP_Query( $args );
    ?>
    <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      
      <?php $exhibition_count = $the_query->current_post+1; ?>

      <?php if ( $exhibition_count%4 == 1 ): ?>
        <!-- row start -->
        <div class="row">
      <?php endif; ?>

      <div class="col-sm-3 portfolio-piece">
        <?php 
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
          $dateBegin = DateTime::createFromFormat('Ymd', get_field('exhibition_begin_date'));
          $dateEnd = DateTime::createFromFormat('Ymd', get_field('exhibition_end_date'));
        ?>
      

        <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?> graphic"></a></p>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <h5><a href="<?php the_permalink(); ?>"><?php the_field('artist_name'); ?></a></h5>
        <p class="date">
          <?php if ( $dateBegin->format('Y') == $dateEnd->format('Y') ): ?>
            <?php if ( $dateBegin->format('m') == $dateEnd->format('m') ): ?>  
              <?php echo $dateBegin->format('F j'); ?>&ndash;<?php echo $dateEnd->format('j, Y'); ?>
            <?php else : ?>
              <?php echo $dateBegin->format('F j'); ?>&ndash;<?php echo $dateEnd->format('F j, Y'); ?>
            <?php endif; ?>
          <?php else : ?>
            <?php echo $dateBegin->format('F j, Y'); ?>&ndash;<?php echo $dateEnd->format('F j, Y'); ?>          
          <?php endif; ?>
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
<?php get_footer(); ?>