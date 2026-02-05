<footer class="footer">
    <div class="grid-container">
        <div class="grid-container flex-between footer__text">
            <?php
            // Добавляем 'options', чтобы данные брались из общих настроек темы
            if (get_field('footer_big_text', 'options')): ?>
                <div>
                    <?php the_field('footer_big_text', 'options') ?>
                </div>
            <?php endif; ?>

            <?php if( have_rows('footer_repeater', 'options') ): ?>
                <div class="container__news f__card">
                    <?php while( have_rows('footer_repeater', 'options') ): the_row(); ?>
                        <?php
                        $link_data = get_sub_field('footer_link');
                        $text = get_sub_field('footer_button_text');
                        ?>
                        <?php if( $link_data ): ?>
                            <div>
                                <a href="<?php echo esc_url($link_data['url']); ?>"
                                   target="<?php echo esc_attr($link_data['target']); ?>"
                                   class='footer__card'
                                >
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
            <div class="grid-container flex-between footer__copyright">
                <div>
                    <?php echo $copyright; ?>
                </div>
                <?php if (get_field('footer_text', 'options')): ?>
                    <div>
                        <?php the_field('footer_text', 'options') ?>
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
