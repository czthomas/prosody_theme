<div id="sidebar">
    <?php
        if(get_query_var('cat')) {
            $category = get_category(get_query_var('cat'));
        } else {
            $categories = get_the_category();

            $category = $categories[0];
            if($category->slug == 'featured') {
                $category = $categories[1];
            }
        }

        // bail out with empty sidebar on invalid categories
        if(is_null($category)): ?>
            </div>
        <?php return; endif;

        $tei_type = get_post_meta( $post->ID, 'tei_type', true);
    ?>

    <h2><?php echo $category->name ?></h2>

    <div id="poem-sorting">
    <div id="accordion">

        <h3 class="poem-sort-method">By Title</h3>

            <div class="poem-results">
                <ul class="titles">
                    <?php
                        $args = array(
                            'category_name' => $category->slug,
                            'post_type' => 'prosody_poem',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                        );
                        $poems_by_title = new WP_Query( $args );
                    ?>
                    <?php if ( $poems_by_title->have_posts() ) : while ($poems_by_title->have_posts() ) : $poems_by_title->the_post();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        <h3 class="poem-sort-method">By Difficulty</h3>

            <div class="poem-results">
            <?php

            $difficulty_levels = array( 'warming_up', 'moving_along', 'special_challenge' );


            foreach ($difficulty_levels as $difficulty ) {
                echo "<h4>" . strtoupper(str_replace('_', ' ', $difficulty)) . "</h4>";
                echo "<ul class='titles'>";
                global $post;

                $args = array(
                        'category_name' => $category->slug,
                        'post_type' => 'prosody_poem',
                        'meta_key' => 'Difficulty',
                        'meta_value' => $difficulty,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => -1
                );

                $difficulty_posts = get_posts( $args );
                foreach ($difficulty_posts as $post ) :
                    setup_postdata( $post );
            ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php
                endforeach;
                wp_reset_postdata();
                echo "</ul>";
            }
            ?>

            </div>
        <?php if($tei_type == 'poem'): ?>
            <h3 class="poem-sort-method">By Type</h3>

                <div class="poem-results">
                    <?php

                    $poem_types = array( 'Ode', 'Sonnet', 'Onegin Stanza', 'Ballad', 'Elegy', 'Blank verse (Белый стих)', 'Free verse with rhyme (Вольный стих)', 'Free verse (Свободный стих)', 'Syllabic verse' );


                    foreach ($poem_types as $type ) {
                        echo "<h4>" . strtoupper(str_replace('_', ' ', $type)) . "</h4>";
                        echo "<ul class='titles'>";
                        global $post;

                        $args = array(
                                'category_name' => $category->slug,
                                'post_type' => 'prosody_poem',
                                'meta_key' => 'Type',
                                'meta_value' => $type,
                                'orderby' => 'title',
                                'order' => 'ASC',
                                'posts_per_page' => -1
                        );

                        $poem_types_posts = get_posts( $args );
                        foreach ($poem_types_posts as $post ) :
                            setup_postdata( $post ); ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php
                        endforeach;
                        wp_reset_postdata();
                        echo "</ul>";
                    }
                    ?>
                </div>
        <?php endif ?>
        <h3 class="poem-sort-method">By Author</h3>

            <div class="poem-results">
                <?php

                $authors = array();

                $args = array(
                    'category_name' => $category->slug,
                    'post_type' => 'prosody_poem',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC'
                );

                $poems = get_posts( $args );
                foreach ($poems as $poem ) {
                    $author_name = get_post_meta( $poem->ID, 'Author', true );
                    if (array_key_exists($author_name, $authors)) {
                      $authors[$author_name][] = $poem;
                    } else {
                      $authors[$author_name] = array($poem);
                    }
                }

                wp_reset_postdata();

                ksort($authors);

                foreach ($authors as $author=>$author_posts ) {
                    $author_full = explode(",", $author);
                    $num_names = count($author_full);
                    $author_last = $author_full[0];
                    if (! isset($author_full[1])) {
                      $author_full[1] = null;
                    }
                    if (! isset($author_full[2])) {
                      $author_full[2] = null;
                    }
                    if ($num_names == 1) {
                      $author_right = $author_last;
                    }
                    if ($num_names == 2) {
                      $author_first = $author_full[1];
                      $author_right = $author_first . ' ' . $author_last;
                    } elseif ($num_names == 3) {
                      $author_first = $author_full[2];
                      $author_suffix = $author_full[1];
                      $author_right = $author_first . ' ' . $author_last . ' '; $author_right .= $author_suffix;
                    }
                    echo "<h4>" . strtoupper(str_replace('_', ' ', $author_right)) . "</h4>";
                    echo "<ul class='titles'>";

                    foreach ($author_posts as $post ) :
                        setup_postdata( $post );
                ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
                    endforeach;
                    wp_reset_postdata();
                    echo "</ul>";
                }
                ?>
            </div>
        </div><!-- closes accordion -->
    </div><!-- close poem-sorting -->
</div><!-- close #sidebar -->
