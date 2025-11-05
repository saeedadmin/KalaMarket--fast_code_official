<?php
/**
 * Front page amazing products carousel.
 */

$assets = kalamarket_template_asset_url( 'assets/' );

$products = array(
    array(
        'image'       => 'slider-amazing/as-1.jpg',
        'title'       => 'لپ تاپ ۱۵ اینچی ایسوس مدل VivoBook Flip TP510UQ – C',
        'old_price'   => '12,000,000',
        'new_price'   => '11,180,000',
        'countdown'   => '10/10/2025 12:00',
    ),
    array(
        'image'       => 'slider-amazing/as-2.jpg',
        'title'       => 'یخچال و فریزر سامسونگ مدل HM34',
        'old_price'   => '9,000,000',
        'new_price'   => '8,500,000',
        'countdown'   => '10/10/2025 12:00',
    ),
    array(
        'image'       => 'slider-amazing/as-3.jpg',
        'title'       => 'کامپیوتر همه کاره 21.5 اینچی ایسوس مدل AIO V222UAK-B',
        'old_price'   => '12,000,000',
        'new_price'   => '11,180,000',
        'countdown'   => '10/10/2025 12:00',
    ),
    array(
        'image'       => 'slider-amazing/as-4.jpg',
        'title'       => 'شارژر بی سیم مدل EP-NG930',
        'old_price'   => '8,000,000',
        'new_price'   => '6,500,000',
        'countdown'   => '10/10/2025 12:00',
    ),
    array(
        'image'       => 'slider-amazing/as-5.jpg',
        'title'       => 'تلویزیون ال ای دی هوشمند سامسونگ مدل 55NU7900 سایز 55 اینچ',
        'old_price'   => '14,500,000',
        'new_price'   => '13,500,000',
        'countdown'   => '10/10/2025 12:00',
    ),
);

if ( empty( $products ) ) {
    return;
}
?>

<!-- slider-amazing------------------------>
<div class="slider-widget-products slider-content-tabs slider-amazing-product">
    <div class="widget widget-product card slider-content-tabs">
        <header class="card-header">
            <span class="title-one"><?php echo esc_html__( 'محصولات شگفت انگیز', 'kalamarket' ); ?></span>
            <h3 class="card-title"></h3>
        </header>
        <div class="product-carousel product-amazing owl-carousel owl-theme owl-rtl">
            <?php foreach ( $products as $product ) : ?>
                <div class="item">
                    <a href="#" class="d-block hover-img-link">
                        <img src="<?php echo esc_url( $assets . 'images/' . $product['image'] ); ?>" class="img-fluid" alt="<?php echo esc_attr( $product['title'] ); ?>">
                    </a>
                    <h2 class="post-title">
                        <a href="#"><?php echo esc_html( $product['title'] ); ?></a>
                    </h2>
                    <div class="price">
                        <del><span><?php echo esc_html( $product['old_price'] ); ?><span><?php esc_html_e( 'تومان', 'kalamarket' ); ?></span></span></del>
                        <ins><span><?php echo esc_html( $product['new_price'] ); ?><span><?php esc_html_e( 'تومان', 'kalamarket' ); ?></span></span></ins>
                    </div>
                    <div class="countdown-timer">
                        <div class="countdown h4" data-date-time="<?php echo esc_attr( $product['countdown'] ); ?>" data-labels='{"label-day":"روز","label-hour":"ساعت","label-minute":"دقیقه","label-second":"ثانیه"}'>
                            <div class="countdown-item">
                                <div class="countdown-value">155</div>
                                <div class="countdown-label"><?php esc_html_e( 'روز', 'kalamarket' ); ?></div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-value">10</div>
                                <div class="countdown-label"><?php esc_html_e( 'ساعت', 'kalamarket' ); ?></div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-value">16</div>
                                <div class="countdown-label"><?php esc_html_e( 'دقیقه', 'kalamarket' ); ?></div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-value">01</div>
                                <div class="countdown-label"><?php esc_html_e( 'ثانیه', 'kalamarket' ); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
