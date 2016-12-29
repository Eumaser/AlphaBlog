
<?php
/*
//Template Name: Home Page
  page template for the Home page
*/
 ?>

<?php get_header(); ?>

  <div class="row">
    <div class="col-xs-12 col-md-9">
      <?php  if(have_posts() ): ?>
          <?php while (have_posts() ):the_post(); ?>

            <div class="theHome well">
              <?php the_content(); ?>
            </div>



        <?php endwhile?>
      <?php endif ?>


      <!---The post loop to get the current news from News Category -->
      <?php
      $args = array(
          'type' => 'post',
          'category_name' => 'News',
          'posts_per_page' => 4,

      );

      $homeBlog = new WP_Query($args);
       ?>

      <?php  if($homeBlog->have_posts() ): ?>

          <?php while ($homeBlog->have_posts() ):$homeBlog->the_post(); ?>

            <div class="panel panel-default">
              <div class="panel-heading">
                  <h1><?php the_title() ?></h1>
              </div>
              <div class="panel-body">
                    <?php the_excerpt(); ?>
                <a href="<?php the_permalink();?>" class="btn btn-primary btn-lg">Read More</a>
              </div>
            </div>




            <?php endwhile?>
              </div>
              <?php wp_reset_postdata(); ?>
        <?php endif?>

        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>


    </div>






<?php get_footer(); ?>
