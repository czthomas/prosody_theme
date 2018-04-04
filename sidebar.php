<?php require_once('sidebarconfig.php'); ?>

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
    ?>

    <h2><?php echo $category->description ?></h2>

    <div id="poem-sorting">
    <div id="accordion">
        <?php
            if(array_key_exists($category->slug, $sidebar_filters)):
            foreach($sidebar_filters[$category->slug] as $method):
                ?>
                    <h3 class="poem-sort-method"><?php echo $method["title"] ?></h3>
                    <div class="poem-results">
                        <?php
                            if(empty($method["by"]) || $method["by"][0] != '!'):
                                foreach($method['filters'] as $filter_key=>$filter_name):
                                    $args = array(
                                        'category_name' => $category->slug,
                                        'post_type' => 'prosody_poem',
                                        'orderby' => 'title',
                                        'order' => 'ASC',
                                        'posts_per_page' => -1
                                    );

                                    if(!empty($method['by'])) {
                                        $args['meta_key'] = $method['by'];
                                        $args['meta_value'] = $filter_key;
                                    }

                                    $results = new WP_Query( $args );

                                    if(!empty($filter_key) && $results->have_posts()) {
                                        echo "<h4>" . $filter_name . "</h4>";
                                    }

                                    ?> <ul class='titles'> <?php
                                    while($results->have_posts()) {
                                        $results->the_post();
                                        ?>
                                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                        <?php
                                    }
                                ?> </ul> <?php 
                                endforeach;
                            else:
                                // special key handlers
                                switch($method['by']) {
                                    // builds sidebar menu from custom taxonomy
                                    case '!taxonomy':
                                        $terms = get_terms(array(
                                            'taxonomy' => $method['taxonomy'],
                                            'hide_empty' => true
                                        ));

                                        foreach($terms as $term) {
                                            $args = array(
                                                'category_name' => $category->slug,
                                                'post_type' => 'prosody_poem',
                                                'orderby' => 'title',
                                                'order' => 'ASC',
                                                'posts_per_page' => -1,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => $method['taxonomy'],
                                                        'terms' => $term->term_id
                                                    )
                                                )
                                            );

                                            $results = new WP_Query( $args );

                                            if(!empty($term->name) && $results->have_posts()) {
                                                echo "<h4>" . $term->name . "</h4>";
                                            }

                                            ?> <ul class='titles'> <?php
                                            while($results->have_posts()) {
                                                $results->the_post();
                                                ?>
                                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                <?php
                                            }
                                            ?> </ul> <?php
                                        }
                                    break;
                                    // author collation via original prosody method
                                    case '!author':
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
                                    break; // end case !author
                                }
                            endif
                        ?>
                    </div>
                <?php
            endforeach;
            endif;
        ?>
        </div><!-- closes accordion -->
    </div><!-- close poem-sorting -->
</div><!-- close #sidebar -->
