<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset ="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Javascripts -->
    <!-- HTML5 Shiv -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->

    <script type="text/javascript">var tb_pathToImage = "<?php echo get_template_directory_uri(); ?>/images/loadingAnimation.gif";</script>

    <!-- RSS feed, Atom feed, pingback url -->

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- wp_head is necessary for a lot of wp hooks and actions, such as javascript queueing  -->
    <?php wp_head(); ?>

</head>
<body>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/wz_tooltip.js"></script>
    <div class="container">
        <header>
        <div class="row center-block">
            <div id="logo" class="center-block">
                <a href="<?php echo $url; ?>"><img class="center-block" src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="<?php bloginfo('name'); ?>" /></a>
            </div>
        </div>
        </header>
        <nav>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php wp_nav_menu(); ?>
                </div>
            </div>
        </nav>
        </div><!-- closes .container -->
