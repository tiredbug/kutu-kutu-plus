<?php get_template_part('templates/header'); ?>

<div class="container">
  <div class="row">
    
    <div class="col-sm-8">
      <div id="content" role="main">
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
          <header>
            <h2><?php the_title()?></h2>
            <h5>
              <em>
                <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
                <span class="text-muted" class="author">by <?php the_author() ?> under <?php _e(''); ?> <?php the_category(', ') ?> with <?php comments_popup_link('None', '1', '%'); ?> comments.</span>
              </em>
            </h5>
            <hr/>
          </header>
          <?php the_post_thumbnail(); ?>
          <?php the_content()?>
          <hr/>
        </article>
        <?php comments_template('/templates/comments.php'); ?>
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
