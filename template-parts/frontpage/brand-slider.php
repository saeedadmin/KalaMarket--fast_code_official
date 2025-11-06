<?php
/**
 * Front page brand slider section.
 */

$assets = kalamarket_template_asset_url( 'assets/' );

$brands = array(
    'brand/shahab.png',
    'brand/adata.png',
    'brand/huawei.png',
    'brand/nokia.png',
    'brand/panasonic.png',
    'brand/parskhazar.png',
    'brand/samsung.png',
    'brand/xvison.png',
);

if ( empty( $brands ) ) {
    return;
}
?>

<!-- brand--------------------------------------->
<div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
    <div class="slider-widget-products">
        <div class="widget widget-product card mb-0">
            <div class="product-carousel-brand owl-carousel owl-theme owl-rtl">
                <?php foreach ( $brands as $brand ) : ?>
                    <div class="item">
                        <a href="#" class="d-block hover-img-link">
                            <img src="<?php echo esc_url( $assets . 'images/' . $brand ); ?>" class="img-fluid img-brand" alt="Brand">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
