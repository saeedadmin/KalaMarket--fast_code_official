<?php
/**
 * Front page ad placement columns.
 */

$assets = kalamarket_template_asset_url( 'assets/' );

$primary_ads = array(
    array(
        'image' => 'adplacement/a-1.jpg',
        'url'   => '#',
    ),
    array(
        'image' => 'adplacement/a-2.jpg',
        'url'   => '#',
    ),
);

$secondary_ad = array(
    'image' => 'adplacement/a-3.jpg',
    'url'   => '#',
);
?>

<!-- adplacement--------------------------->
<div class="col-lg-4 col-md-4 col-xs-12 pl mt-1">
    <div class="adplacement-container-column">
        <?php foreach ( $primary_ads as $ad ) : ?>
            <a href="<?php echo esc_url( $ad['url'] ); ?>" class="adplacement-item">
                <div class="adplacement-sponsored-box">
                    <img src="<?php echo esc_url( $assets . 'images/' . $ad['image'] ); ?>" alt="">
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-xs-12 pr">
    <div class="adplacement-container-column mt-4">
        <a href="<?php echo esc_url( $secondary_ad['url'] ); ?>" class="adplacement-item img-banner">
            <div class="adplacement-sponsored-box">
                <img src="<?php echo esc_url( $assets . 'images/' . $secondary_ad['image'] ); ?>" alt="">
            </div>
        </a>
    </div>
</div>
