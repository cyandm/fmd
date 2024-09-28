<?php

//defaults
$card_image_size = 'full';
$card_class = '';
$image_class = '';
$link_rel = 'dofollow';
//setCheck
isset( $args['image_size'] ) && $card_image_size = $args['image_size'];
isset( $args['card_class'] ) && $card_class = $args['card_class'];
isset( $args['image_class'] ) && $image_class = $args['image_class'];
isset( $args['link_rel'] ) && $link_rel = $args['link_rel'];


?>

<a href="<?= $args['url'] ?>" class="<?= $card_class ?> card" rel=<?= $link_rel ?>>
	<?= wp_get_attachment_image( $args['image_id'], $card_image_size, false, [ 'class' => $image_class ] ) ?>
	<div class="card-information">
		<div>
			<p class="card-title">
				<?= $args['card_title'] ?>
			</p>
			<p class="card-description">
				<?= $args['card_description'] ?>
			</p>
		</div>

		<i class="icon-arrow-down-right"></i>
	</div>
</a>