<?php get_header(); ?>
<?php  if(have_posts() ): ?>
  <div class="row">
    <div class="col-xs-12 col-md-8">
        <?php while (have_posts() ):the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile?>

      <div class="row text-center">
        <div class="col-md-12">
          <?php the_posts_pagination(array(
              'mid_size' => 5,
              'screen_reader_text' => 'Navigate here',

          )) ?>
        </div>
      </div>
      </div>
        <div class="col-md-4">
          <?php get_sidebar(); ?>
        </div>
    </div>
<?php endif?>


<?php get_footer(); ?>
