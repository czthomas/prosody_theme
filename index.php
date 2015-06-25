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
<div>
<div class="content poem-home">

    <?php if ( $poems->have_posts() ) : while ( $poems->have_posts() ) : $poems->the_post(); ?>

                <div>
                    <?php the_content(); ?>
                </div>
                <div id="utils">
                    <div>
                        Show
                        <span>Stress <input id="togglestress" class="on" onclick="togglestress();" name="togglestress" value="on" type="checkbox" checked="checked"/></span>
                        <span>&#160;&#160;&#160;Foot division <input id="togglefeet" class="on" onclick="togglefeet();" name="togglefeet" value="on" type="checkbox" checked="checked"/></span>
                        <span>&#160;&#160;&#160;Caesura <input id="togglecaesura" class="on" onclick="togglecaesura();" name="togglecaesura" value="on" type="checkbox"/></span>
                        <span id="toggle-discrepancies" style="display:none">&#160;&#160;&#160;Syncopation <input id="togglediscrepancies" onclick="toggledifferences(this)" name="togglediscrepancies" value="off" type="checkbox"/></span>
                    </div>
                </div>

    <?php endwhile; else: ?>

                <h2>Getting Started</h2>
                <p>Select a poem to begin.</p>

    <?php endif; ?>
</div><!-- ends .content -->

<div>
    <?php get_sidebar(); ?>
</div>

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>
