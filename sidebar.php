<div id="sidebar">
    <h3>List of Poems</h3>
    <div id="poem-sorting">
        <h4 class="poem-sort-method">By Title</h4>
        <!-- By Title will need to get all poems and sort by ascending order -->
            <div class="poem-results">
                <ul class="titles">
                    <?php
                        $args = array(
                            'post_type' => 'prosody_poem',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                        );
                        $poems_by_title = new WP_Query( $args );
                    ?>
                    <?php if ( $poems_by_title->have_posts() ) : while ($poems_by_title->have_posts() ) : $poems_by_title->the_posts();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        <h4 class="poem-sort-method">By Difficulty</h4>
        <!-- By Difficulty will require that all poems have a difficulty assigned by category. The query will then sort by category, displaying in a particular order -->
        <h4 class="poem-sort-method">By Type</h4>
        <!-- Type will also require assignment by category and then sorting by category -->
        <h4 class="poem-sort-method">By Author</h4>
        <!-- Author will require creating an author meta box for each post, getting that data, and then sorting by meta_value -->
    </div>
</div>
