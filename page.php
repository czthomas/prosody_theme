<?php get_header(); ?>

<div id="main">
<div class="container">
<div class="row">
<div class="content post-home col-lg-9 col-md-9 col-sm-12">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div>
                    <?php the_content(); ?>
                </div>

    <?php endwhile; endif; ?>
</div><!-- ends .content -->

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>
