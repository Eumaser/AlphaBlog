
<div class="contentonly">
  <div class="text-center blogHeader panel panel-default">
    <div class="panel-heading">
      <h1 class='text-center'><?php the_title() ?></h1>
      <small><p>
          Author: <strong> <?php the_author(); ?></strong> || Category:  <span class="theSmallIndex"><?php the_category(','); ?></span> ||
          Date: <?php the_time(Y .'-'. m. '-'. d. ' '.T)?>
        <br>  <span class="theSmallIndex"><?php the_tags(); ?></span> || <?php edit_post_link(); ?>
      </p></small>
    </div>
    <div class="panel-body">
      <article class="">

          <div class="featureImage text-center">
            <?php if(has_post_thumbnail() ){
                  the_post_thumbnail('medium');

            }
            ?>


          </div>

          <?php the_content() ?>

      </article>

    </div>
  </div>


</div>
