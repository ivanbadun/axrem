<div class="grid-container" style='display: flex; justify-content: space-between'>
    <div style='width: 70%'>
        <?php if (shortcode_exists('slider')) {
            echo do_shortcode('[slider]');
        } ?>
    </div>
    <div style='width: 20%'>
        <h1> пофиксить сайдбар</h1>
        <div style='background-color: violet'>
            <p><?php get_field('text_tophome_sidepar') ?></p>

        </div>
        <?php if( have_rows('tophome_buttons') ): ?>
            <div class="repeater-wrapper">

            </div>
        <?php endif; ?>
    </div>
</div>
