<form class="search-form form-inline" action="<?php echo home_url('/'); ?>" method="get" role="search">
  <input type="search" name="s" value="<?php the_search_query();?>" class="form-control searchBox" placeholder="Search">
  <button type="submit" name="button" class="btn btn-info "><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
</form>
