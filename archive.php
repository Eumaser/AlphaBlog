<?php get_header(); ?>


<div class="row">
  <div class="col-md-8">


<?php  if(have_posts() ): ?>
<header class="text-center well">
    <?php the_archive_title('<h2>','</h2>'); ?>
    <?php the_archive_description(); ?>
</header>



        <?php while (have_posts() ):the_post(); ?>

                  <?php  get_template_part('content','archive');  ?>

        <?php endwhile?>

        <div class="text-center">
          <?php the_posts_pagination(array(
              'mid_size' => 5,
              'screen_reader_text' => 'Navigate here',

          )) ?>
        </div>

<?php endif?>
</div>

<div class="col-md-4">
  <?php get_sidebar(); ?>
</div>




</div>
<?php get_footer(); ?>
