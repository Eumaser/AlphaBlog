<?php get_header(); ?>



<?php  if(have_posts() ): ?>
  <div class="row">
    <div class="col-xs-12 col-md-8 singlephp">
        <?php while (have_posts() ):the_post(); ?>



        <?php  get_template_part('content','single' );  ?>

        <div class="row ">
            <div class="col-md-6 text-left">

              <button type="button" name="button" class="btn btn-default"><?php previous_post_link('&laquo %link', 'Previous Post') ?></button>
            </div>

            <div class="col-md-6 text-right">
              <button type="button" name="button" class="btn btn-default"><?php next_post_link('%link &raquo', 'Next Post') ?></button>
            </div>
        </div>
      <?php endwhile?>


        <?php if (comments_open() || get_comments_number() ):
                comments_template();
              endif
          ?>




      </div>
        <div class="col-md-4">
          <?php get_sidebar(); ?>
        </div>
    </div>
<?php endif?>


<?php get_footer(); ?>
