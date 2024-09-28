<?php
/* Template Name: ADS */
get_header(null, ['border' => true, 'preloader' => false]);
$product_card = get_field('ads_product'); ?>
<main class=" ads-page ">
    <?=
        get_template_part('/templates/components/ads/ads-product', '');
    get_template_part('/templates/components/ads/call', '');
    get_template_part('/templates/components/ads/content', '');
    get_template_part('/templates/components/ads/faq', '');
    get_template_part('/templates/components/ads/call', '');
    get_template_part('/templates/components/ads/hours', '');
    ?>
</main>
<?php get_footer() ?>