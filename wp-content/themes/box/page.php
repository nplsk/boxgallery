<?php get_header(); ?>

<div class="inner cover">
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     <h1 class="hidden-xs"><?php the_title(); ?></h1>
  <?php the_content(); ?>
<?php endwhile; endif; ?>
</div>
</div>
</div>

<?php get_footer(); ?>