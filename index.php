<?php get_header(); ?>

<?php  if(have_posts() ): ?>
  <div class="row">
    <div class="col-xs-12 col-md-8">
        <?php while (have_posts() ):the_post(); ?>

          <div class="panel panel-default blogWrapper">
              <div class="panel-heading">  <header>
                <a href=<?php the_permalink(); ?> class="theBigIndex">  <h1> <?php the_title() ?> </h1></a>

                  <small><p>
                      Author: <strong> <?php the_author(); ?></strong> || Category: <span class="theSmallIndex"><?php the_category(','); ?></span> ||
                      Date: <?php the_time(Y .'-'. m. '-'. d. ' '.T)?> <br>
                    <span class="theSmallIndex"><?php the_tags(); ?></span>
                  </p></small>
                </header>

              </div>
              <div class="panel-body">
                <div class="featureImage pull-right">
                  <?php if(has_post_thumbnail() ) {
                     the_post_thumbnail('thumbnail');
                  }
                  ?>
                </div>

                <article class="clearfix" >
                  <?php the_excerpt(); ?>
                  <a href="<?php the_permalink();?>" class="btn btn-primary btn-lg">Read More</a>
                </article>
              </div>
            </div>

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
