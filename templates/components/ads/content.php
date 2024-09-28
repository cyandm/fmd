<section class="container content">
    <h1><?= get_field('content_title'); ?> <span class="purple-text"><?= get_field('color_title'); ?></span></h1>
    <div class="flex-part">
        <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'ads-img']) ?>
        <div>
            <h2><?= get_field('first_head'); ?></h2>
            <?= get_field('image_part_text'); ?>
        </div>
    </div>
    <?= the_content(); ?>
</section>