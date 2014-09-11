<?php get_template_part('templates/header'); ?>

<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    
    <div class="col-xs-12 col-sm-8">
      <div id="content" role="main">
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <article role="article" id="post_<?php the_ID()?>">
          <header>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
            <h5>
              <em>
                <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
                <span class="text-muted" class="author">by <?php the_author() ?> under <?php _e(''); ?> <?php the_category(', ') ?> with <?php comments_popup_link('None', '1', '%'); ?> comments.</span>
              </em>
            </h5>
            <hr/>
          </header>
          <?php the_post_thumbnail(); ?>
          <?php the_content( __( '&hellip; Continue reading <i class="glyphicon glyphicon-arrow-right"></i>', 'theme' ) ); ?>
          <hr/>
        </article>
        <?php endwhile; ?>
        <ul class="pagination">
          <li class="older"><?php next_posts_link('&laquo; Older') ?></li>
          <li class="newer"><?php previous_posts_link('Newer &raquo;') ?></li>
        </ul>
        <?php else: ?>
        <?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; ?>
        <?php endif;?>
      </div><!-- #content -->
    </div>
    
    <div class="col-xs-6 col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
        <?php get_template_part('templates/sidebar'); ?>
    </div><!-- /.col-sm-4 .sidebar -->
    
  </div><!-- .row -->
</div><!-- .container -->

<?php get_template_part('templates/footer'); ?>
