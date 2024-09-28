<?php $product_card = get_field('ads_product'); ?>
<section class="product-container container">
    <div class="product-wrapper">
        <?php
        foreach ($product_card as $product_id) {
            get_template_part('/templates/components/product-card', '', ['product' => $product_id]);
        }
        ?>
    </div>
</section>