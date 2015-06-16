<?php get_header(); ?>

<?php
    $poem_args = array(
        'post_type' => 'prosody_poem',
        'category_name' => 'featured'
        );
    $poems = new WP_Query( $poem_args );
?>


<div id="main">
<div class="container">
<div class="row">
<div class="content poem-home col-lg-8 col-md-8 col-sm-8">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div>
                    <?php the_content(); ?>
                    <div class="row" id="utils">
                        <div class="col-sm-4-offset-8 col-md-4-offset-8 col-lg-4-offset-8">
                        Show
                        <span>Stress <input id="togglestress" class="on" onclick="togglestress();" name="togglestress" value="on" type="checkbox" checked="checked"/></span>
                        <span>&#160;&#160;&#160;Foot division <input id="togglefeet" class="on" onclick="togglefeet();" name="togglefeet" value="on" type="checkbox" checked="checked"/></span>
                        <span>&#160;&#160;&#160;Caesura <input id="togglecaesura" class="on" onclick="togglecaesura();" name="togglecaesura" value="on" type="checkbox"/></span>
                        <span id="toggle-discrepancies" style="display:none">&#160;&#160;&#160;Syncopation <input id="togglediscrepancies" onclick="toggledifferences(this)" name="togglediscrepancies" value="off" type="checkbox"/></span>
                        </div>
                    </div>
                </div>

    <?php endwhile; else: ?>

                <h2>Getting Started</h2>
                <p>Select a poem to begin.</p>

    <?php endif; ?>
</div><!-- ends .content -->

<div class="col-lg-4 col-md-4 col-sm-4">
    <?php get_sidebar(); ?>
</div>

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>
