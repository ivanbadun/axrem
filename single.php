<?php
/**
 * Single.
 *
 * Loop container for single post content
 */
get_header(); ?>
<main class="main-content">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <!-- BEGIN of post content -->
            <div class="large-8 medium-8 small-12 cell">
                <?php if (have_posts()) { ?>
                    <?php while (have_posts()) {
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

                            <h1 class="page-title entry__title"><?php the_title(); ?></h1>

                            <p class="entry__date"><?php echo get_the_time(get_option('date_format')); ?></p>

                            <div class="social-placeholder">
                                <?php echo DISPLAY_ULTIMATE_PLUS(); ?>
                            </div>

                            <?php if (has_post_thumbnail()) { ?>
                                <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php } ?>

                            <div class="post-tags">
                                <?php the_tags('', ' ', ''); ?>
                            </div>

                            <div class="entry__content clearfix">
                                <?php the_content('', true); ?>
                            </div>

                        </article>
                    <?php } ?>
                <?php } ?>
            </div>
            <!-- END of post content -->

            <!-- BEGIN of sidebar -->
            <div class="large-4 medium-4 small-12 cell sidebar">
                <?php get_sidebar('right'); ?>
                <?php
                get_template_part('templates/events-sidebar');
                ?>
            </div>
            <!-- END of sidebar -->
        </div>
    </div>
</main>

<?php get_footer(); ?>
