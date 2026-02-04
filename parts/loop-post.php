<?php
$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$is_cat    = has_category('Members Document');

// 1. Define $cat_name (it was missing in your snippet)
$categories = get_the_category();
$cat_name   = !empty($categories) ? $categories[0]->name : '';

$text_color = $thumb_url ? '#ffffff' : '#333333';
$overlay    = $is_cat ? 'rgba(255, 65, 96, 0.5)' : 'rgba(0,0,0,0.3)';

// 2. Use double quotes so PHP can "see" your variables inside the string
$style = $thumb_url
    ? "background-image: linear-gradient({$overlay}, {$overlay}), url('{$thumb_url}'); color: {$text_color};"
    : "background-color: #ffffff; color: {$text_color};";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('preview preview--' . get_post_type()); ?>>
    <div class='card__news' style="<?php echo $style; ?>">

        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
            <div>
                <p class='cat__news'>
                    <?php echo esc_html($cat_name); ?>
                </p>
                <h2>
                    <?php the_title(); ?>
                </h2>
                <p>
                    <?php echo get_the_date(); ?>
                </p>
            </div>
        </a>
    </div>
</article>
