<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset ="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/node_modules/normalize.css/normalize.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/jquery-ui.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/screen.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/poem.css'; ?>">

    <!-- HTML5 Shiv -->
    <!--[if lt IE 9]>
        <script src="node_modules/html5shiv/dist/html5shiv.js"></script>
    <![endif]-->

    <!-- Javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/popup.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/utility.js"></script>

    <script type="text/javascript">var tb_pathToImage = "<?php echo get_template_directory_uri(); ?>/images/loadingAnimation.gif";</script>

    <?php if ( is_front_page() ) : ?>
        <script type="text/javascript" src="<? echo get_template_directory_uri(); ?>/js/jquery.cycle.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#logo').cycle({
                            fx: 'none',
                            timeout:  100,
                            speed:    500,
                            delay:    -100,
                            nowrap:  1,
                });
             });
        </script>
    <?php endif; ?>

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
        <div class="row">
        <?php $url = home_url(); ?>
        <?php if (is_home()) : ?>
            <div id="logo" class="col-lg-8 col-md-8 col-sm-8">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo01.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo02.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo03.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo04.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo05.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo06.gif" alt="" />
                <a href="<?php echo $url; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="<?php bloginfo('name'); ?>" /></a>
            </div>
        <? else: ?>
            <div id="logo" class="col-lg-8 col-md-8 col-sm-8">
                <a href="<?php echo $url; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="<?php bloginfo('name'); ?>" /></a>
            </div>
        <?php endif; ?>
        <div id="intro" class="col-lg-4 col-md-4 col-sm-4">
            <p><strong><?php bloginfo('name'); ?></strong>: <?php bloginfo('description'); ?></p>
            <h2 id="tagline"><a href="http://www.engl.virginia.edu">a project of the University of Virginia English Department</a></h2>
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

