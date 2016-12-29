<div class="panel panel-default blogWrapper">
  <div class="panel-heading">
    <header>
      <a href="<?php the_permalink(); ?>" class="theBigIndex">  <h1> <?php the_title() ?> </h1></a>
      <small><p>
          Author: <strong> <?php /*the_author()*/ the_author_posts_link();?></strong> Category: <span class="theSmallIndex"><?php the_category(','); ?> </span>
          Date: <?php the_time(Y .'-'. m. '-'. d. ' '.T)?>
        <br> <span class="theSmallIndex"><?php the_tags(); ?> </span>
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

    <article class="archiveExcerpts clear-fix">
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink();?>" class="btn btn-primary btn-lg">Read More</a>
    </article>
  </div>
</div>
