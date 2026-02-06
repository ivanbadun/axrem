<?php
$post_id = get_the_ID();
$thumb_url = get_the_post_thumbnail_url($post_id, 'full');
$categories = get_the_category($post_id);
$cat_display_name = !empty($categories) ? $categories[0]->name : '';

$home_page_id = get_option('page_on_front');
$special_cat_id = get_field('special_category', $home_page_id);

$is_special_cat = false;
if ($special_cat_id) {
    $is_special_cat = has_term($special_cat_id, 'category', $post_id);
}

$text_color = $thumb_url ? '#ffffff' : '#41296e';

if ($thumb_url) {
    if ($is_special_cat) {
        $overlay = "linear-gradient(rgba(244, 0, 144, 0.6), rgba(244, 0, 144, 0.6))";
    } else {
        $overlay = "linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.9) 100%)";
    }
    $style = "background-image: {$overlay}, url('{$thumb_url}'); color: {$text_color}; background-size: cover; background-position: center;";
} else {
    $bg_color = $is_special_cat ? '#f40090' : '#ffffff';
    $style = "background-color: {$bg_color}; color: {$text_color};";
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('preview preview--' . get_post_type()); ?>>
    <div class='card__news' style="<?php echo $style; ?>">
        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit; display: block; height: 100%;">
            <div style="height: 100%; display: flex; flex-direction: column; justify-content: flex-end;">
                <p class='cat__news'>
                    <?php echo esc_html($cat_display_name); ?>
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
