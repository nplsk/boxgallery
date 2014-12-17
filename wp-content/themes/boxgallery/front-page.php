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
  <span class="hidden-url hidden-xs hidden-sm hidden-md hidden-lg"><?php echo $thumbnail_url[0]; ?></span>
  <div class="inner cover">
    <h1 class="cover-heading"><?php the_field('artist_name'); ?></h1>
    <h2><?php the_title(); ?></h2>
    <p>On display:</p>
    <h3 class="date">
           <?php if ( $dateBegin->format('Y') == $dateEnd->format('Y') ): ?>
            <?php if ( $dateBegin->format('m') == $dateEnd->format('m') ): ?>  
              <?php echo $dateBegin->format('F j'); ?>&ndash;<?php echo $dateEnd->format('j, Y'); ?>
            <?php else : ?>
              <?php echo $dateBegin->format('F j'); ?>&ndash;<?php echo $dateEnd->format('F j, Y'); ?>
            <?php endif; ?>
          <?php else : ?>
            <?php echo $dateBegin->format('F j, Y'); ?>&ndash;<?php echo $dateEnd->format('F j, Y'); ?>          
          <?php endif; ?>
        </h3>
    <p>Opening reception:</p>
    <h3>
      <?php echo $dateRec->format('F j, Y'); ?> at 8:00pm     
    </h3>
    <br>
    <p class="lead">
      <a href="<?php the_permalink(); ?>" class="btn btn-lg btn-default">See more</a>
    </p>
  </div>

<?php get_footer(); ?>

