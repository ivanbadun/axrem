<?php
$title = get_field('title') ?: 'Media Enquiries';
$name  = get_field('person_name');
$phone = get_field('phone');
$email = get_field('email');
?>

<div class="media-enquiry-widget">
    <h2 class="widget-main-title"><?php echo esc_html(get_field('title') ?: 'Media Enquiries'); ?></h2>

    <div class="contact-info">
        <p><strong><?php echo esc_html(get_field('person_name')); ?></strong></p>

        <?php if($phone = get_field('phone')): ?>
            <p>Tel: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="tel-link">
                    <?php echo esc_html($phone); ?>
                </a></p>
        <?php endif; ?>

        <?php if($email = get_field('email')): ?>
            <p>Email: <a href="mailto:<?php echo esc_attr($email); ?>" class="email-link">
                    <?php echo esc_html($email); ?>
                </a></p>
        <?php endif; ?>
    </div>
</div>
