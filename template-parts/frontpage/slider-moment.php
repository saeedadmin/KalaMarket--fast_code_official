<?php
/**
 * Front page moment suggestion slider.
 */

$assets = kalamarket_template_asset_url( 'assets/' );

$items = array(
    array(
        'image' => 'slider-moment/sm-1.jpg',
        'title' => 'تیشرت آستین کوتاه مردانه مدل T41',
        'price' => '۲۳,۰۰۰',
    ),
    array(
        'image' => 'slider-moment/sm-2.jpg',
        'title' => 'تی شرت آستین کوتاه تارکان کد btt 152-1',
        'price' => '۵۹,۰۰۰',
    ),
    array(
        'image' => 'slider-moment/sm-3.jpg',
        'title' => 'لپ تاپ 17 اینچی ایسوس مدل VivoBook A712FB-P',
        'price' => '۱۳,۰۰۰,۰۰۰',
    ),
    array(
        'image' => 'slider-moment/sm-4.jpg',
        'title' => 'لپ تاپ 16 اینچی اپل مدل MacBook Pro MVVK2 2019 همراه با تاچ بار',
        'price' => '۴۷,۰۰۰,۰۰۰',
    ),
    array(
        'image' => 'slider-moment/sm-5.jpg',
        'title' => 'گوشی موبایل سامسونگ مدل Galaxy S10 SM-G973F/DS ظرفیت 128 گیگابایت',
        'price' => '۱۱,۰۰۰,۰۰۰',
    ),
);

if ( empty( $items ) ) {
    return;
}
?>

<!-- slider-moment------------------------->
<div class="col-lg-3 col-md-3 col-xs-12 pl order-1 d-block">
    <div class="slider-moments">
        <div class="widget-suggestion widget card">
            <header class="card-header promo-single-headline">
                <h3 class="card-title float-none"><?php esc_html_e( 'پیشنهاد لحظه‌ای', 'kalamarket' ); ?></h3>
            </header>
            <div id="suggestion-slider" class="owl-carousel owl-theme owl-rtl">
                <?php foreach ( $items as $item ) : ?>
                    <div class="item">
                        <a href="#">
                            <img src="<?php echo esc_url( $assets . 'images/' . $item['image'] ); ?>" class="w-100" alt="<?php echo esc_attr( $item['title'] ); ?>">
                        </a>
                        <h3 class="product-title">
                            <a href="#"><?php echo esc_html( $item['title'] ); ?></a>
                        </h3>
                        <div class="price">
                            <span class="amount"><?php echo esc_html( $item['price'] ); ?>
                                <span><?php esc_html_e( 'تومان', 'kalamarket' ); ?></span>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="progressBar">
                <div class="slide-progress"></div>
            </div>
        </div>
    </div>
</div>
