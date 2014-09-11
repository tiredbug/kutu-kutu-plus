<?php get_template_part('templates/header'); ?>

<div class="container">
  <div class="row">
    
    <div class="col-sm-8">
      <div id="content" role="main">
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
          <header>
            <h2><?php the_title()?></h2>
            <hr/>
          </header>
          <?php the_content()?>
        </article>
        <?php endwhile; ?> 
        <?php else: ?>
        <?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; ?>
        <?php endif;?>
      </div><!-- #content -->
    </div>
    
    <div class="col-sm-4 sidebar" id="sidebar" role="navigation">
        <?php get_template_part('templates/sidebar'); ?>
    </div><!-- /.col-sm-4 .sidebar -->
    
  </div><!-- .row -->
</div><!-- .container -->

<?php get_template_part('templates/footer'); ?>
