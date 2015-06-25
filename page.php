<?php get_header(); ?>

<div id="main">
<div class="container">
<div>
<div class="content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div>
                    <?php the_content(); ?>
                </div>

    <?php endwhile; endif; ?>
</div><!-- ends .content -->

<div>
    <?php get_sidebar(); ?>
</div>

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>


