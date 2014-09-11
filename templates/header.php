<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php bloginfo('name'); ?> <?php wp_title('•', true, ''); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
  You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->    

<!-- Navbar -->
<?php if ( get_theme_mod( 'navbar_toggle' ) == 1 ) { ?>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
<?php } else { ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
<?php } ?>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><i class="fa fa-bug"></i>&nbsp; <?php bloginfo('name'); ?></a>
    </div><!-- /.navbar-header -->
        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
  	        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
  </div>
</nav>
<!-- End Navbar -->

<?php if ( !is_page('frontpage') ) : ?>
<!-- Header -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="site-title"> 
      <a class="text-muted" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </h1>
      <h4 class="site-description"><?php bloginfo('description'); ?></h4>
    </div>
  </div>
  <hr/>
</div>
<!-- End Header -->
<?php endif; ?>
