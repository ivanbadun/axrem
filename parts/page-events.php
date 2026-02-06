<?php
/**
 * Template Name: Events Page
 */
get_header(); ?>
<div class="grid-container breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

    <main class="main-content events-grid-layout"> <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="large-12 cell">

                    <h1 class="page-title"><?php the_title(); ?></h1>

                    <div class="page-description">
                        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
                    </div>

                    <div class='container__news'>
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $events_query = new WP_Query([
                            'post_type'      => 'event',
                            'posts_per_page' => 12,
                            'paged'          => $paged
                        ]);

                        if ($events_query->have_posts()) :
                            while ($events_query->have_posts()) : $events_query->the_post();
                                // Просто выводим loop-post без лишних оберток cell
                                get_template_part('parts/loop', 'post');
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>

                    <div class="pagination-container">
                                <?php
                                global $wp_query;
                                $temp_query = $wp_query;
                                $wp_query = $events_query;
                                if ( $events_query->max_num_pages > 1 ) :
                                    foundation_pagination();
                                else :
                                    ?>
                                    <ul class="pagination">
                                        <li class="current">1</li>
                                    </ul>
                                <?php endif; ?>

                                <?php
                                $wp_query = $temp_query;
                                wp_reset_postdata();
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>
