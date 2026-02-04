<?php
/**
 * Footer.
 */
?>

<!-- BEGIN of footer -->
<footer class="footer" style='background-color: violet;'>
    <div class="grid-container">
        <div class="grid-container" style='display: flex; justify-content: space-between; padding: 20px'>
            <?php if (get_field('footer_big_text')): ?>
                <div>
                    <?php the_field('footer_big_text') ?>
                </div>
            <?php endif; ?>
            <?php if( have_rows('footer_repeater') ): ?>
                <div class="container__news">
                    <?php while( have_rows('footer_repeater') ): the_row(); ?>
                        <?php
                        $link_data = get_sub_field('footer_link');
                        $text = get_sub_field('footer_button_text');
                        ?>
                        <?php if( $link_data ): ?>
                            <div>
                                <a href="<?php echo esc_url($link_data['url']); ?>"
                                   target="<?php echo esc_attr($link_data['target']); ?>"
                                   style="
                                        display: block;
                                        text-decoration: none;
                                        background-color: #ffffff;
                                        color: #000000;
                                        padding: 12px 20px;
                                        font-size: 18px;
                                   ">
                                    <span>
                                        <span>
                                            <?php echo $text ? esc_html($text) : esc_html($link_data['title']); ?>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($copyright = get_field('copyright', 'options')) { ?>
            <div class="grid-container" style='display: flex; justify-content: space-between'>
                <div>
                    <?php echo $copyright; ?>
                </div>
                <?php if (get_field('footer_text')): ?>
                    <div>
                        <?php the_field('footer_text') ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>

</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
