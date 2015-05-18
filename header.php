<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset ="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/node_modules/normalize.css/normalize.css'; ?>">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/screen.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/scripts/thickbox.css'; ?>">
    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">

    <!-- HTML5 Shiv -->
    <!--[if lt IE 9]>
        <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
    <![endif]-->

    <!-- Javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/thickbox-compressed.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/popup.js"></script>

    <script type="text/javascript">var tb_pathToImage = "<?php echo get_template_directory_uri(); ?>/scripts/images/loadingAnimation.gif";</script>

    <!-- This is to be reworked using localStorage -->
    <script type="text/javascript">
    //     $(document).ready(function(){
    //             var cookieName = 'stickyAccordion';

    //             $("#poem_sorting").accordion({
    //                 active: ( $.cookies.get( cookieName ) || 0 ),
    //                 header: 'h4',
    //                                 collapsible: true,
    //                 change: function( e, ui ) {
    //                     $.cookies.set( cookieName, $( this ).find( 'h4' ).index ( ui.newHeader[0] ) );
    //                 }
    //             } );
    //     });
    // </script>

<!-- This controlled the page/tab structure. Better to redo this with the actual WP nav menu, and attach resources to end of each poem directly (i.e. not in a new tab) -->
    <?php if(!is_page()) : ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#poem-tabs').tabs({
                    load: function(event, ui) {
                        $('a', ui.panel).click(function() {
                            $(ui.panel).load(this.href);
                            return false;
                        });
                    }
                }  );
                $('#subnav-wrapper').tabs({
                    load: function(event, ui) {
                        $('a', ui.panel).click(function() {
                            $(ui.panel).load(this.href);
                            return false;
                        });
                    }
                });
          });
        </script>
    <?php endif; ?>

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
                // $('#poem-tabs').tabs();
             });
        </script>
    <?php endif; ?>

<!-- RSS feed, Atom feed, pingback url, favicon - Are these necessary? -->

<!--     <link rel="alternate" type="application/rss+xml" title="<?php //bloginfo('name'); ?> RSS Feed" href="<?php //bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php //bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php //bloginfo('pingback_url'); ?>" />

    <link rel="shortcut icon" href="/favicon.ico" /> -->

<!-- wp_head is necessary for a lot of wp hooks and actions, such as javascript queueing  -->
    <?php wp_head(); ?>

</head>
<body>
    <div class="container-fluid">
    <div class="wrapper">
        <header>
        <div class="row">
        <?php if (is_home()) : ?>
            <div id="logo" class="col-md-8">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo01.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo02.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo03.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo04.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo05.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo06.gif" alt="" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="<?php bloginfo('name'); ?>" />
            </div>
        <? else: ?>
            <div class="col-md-8"></div><h1 class="logo"><a href="/"><?php bloginfo('name'); ?></a></h1></div>
        <?php endif; ?>
        <div id="intro" class="col-md-4">
            <p><strong><?php bloginfo('name'); ?></strong>: <?php bloginfo('description'); ?></p>
            <h2 id="tagline"><a href="http://www.engl.virginia.edu">a project of the University of Virginia English Department</a></h2>
        </div>
        </div>
        </header>
        <nav>
            <div class="row">
                <div class="col-md-12">
                    <?php wp_nav_menu(); ?>
                </div>
            </div>
        </nav>

