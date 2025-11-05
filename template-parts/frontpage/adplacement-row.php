<?php
/**
 * Front page mid ad placement row.
 */

$assets = kalamarket_template_asset_url( 'assets/' );

$top_banner = array(
    'image' => 'adplacement/a-8.jpg',
    'url'   => '#',
);

$grid_banners = array(
    array(
        'image' => 'adplacement/a-4.jpg',
        'url'   => '#',
    ),
    array(
        'image' => 'adplacement/a-5.jpg',
        'url'   => '#',
    ),
    array(
        'image' => 'adplacement/a-6.jpg',
        'url'   => '#',
    ),
    array(
        'image' => 'adplacement/a-7.jpg',
        'url'   => '#',
    ),
);
?>

<!-- adplacement--------------------------->
<div class="d-block">
    <div class="adplacement-container-row">
        <div class="col-12">
            <a href="<?php echo esc_url( $top_banner['url'] ); ?>" class="adplacement-item mb-4">
                <div class="adplacement-sponsored_box">
                    <img src="<?php echo esc_url( $assets . 'images/' . $top_banner['image'] ); ?>" alt="">
                </div>
            </a>
        </div>
        <?php foreach ( $grid_banners as $banner ) : ?>
            <div class="col-6 col-lg-3 pr">
                <a href="<?php echo esc_url( $banner['url'] ); ?>" class="adplacement-item">
                    <div class="adplacement-sponsored_box">
                        <img src="<?php echo esc_url( $assets . 'images/' . $banner['image'] ); ?>" alt="">
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
