<?php get_header(); ?>

<div id="main">
<div class="container">
<div class="row">
<div class="content col-lg-8 col-md-8 col-sm-8">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div>
                    <?php the_content(); ?>
                </div>

    <?php endwhile; endif; ?>
</div><!-- ends .content -->

<div class="col-lg-4 col-md-4 col-sm-4">
    <?php get_sidebar(); ?>
</div>

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>


