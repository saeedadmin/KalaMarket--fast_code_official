<?php
/**
 * Template for the front page (converted from home-1.html)
 */

get_header();

$assets              = kalamarket_template_asset_url( 'assets/' );
$search_taxonomy     = taxonomy_exists( 'product_cat' ) ? 'product_cat' : 'category';
$search_dropdown_args = array(
    'show_option_all' => taxonomy_exists( 'product_cat' ) ? __( 'همه دسته ها', 'kalamarket' ) : __( 'همه دسته‌ها', 'kalamarket' ),
    'name'            => $search_taxonomy === 'product_cat' ? 'product_cat' : 'cat',
    'taxonomy'        => $search_taxonomy,
    'orderby'         => 'name',
    'hierarchical'    => true,
    'hide_empty'      => false,
    'class'           => 'right',
    'value_field'     => 'slug',
    'echo'            => false,
);

$search_dropdown = wp_dropdown_categories( $search_dropdown_args );

if ( $search_taxonomy === 'category' ) {
    $search_dropdown = str_replace( "name='cat'", "name='cat'", $search_dropdown );
}

?>

<!-- header-------------------------------->
<header class="header-main">
    <div class="d-block">
        <section class="h-main-row">
            <div class="col-lg-9 col-md-12 col-xs-12 pr">
                <div class="header-right">
                    <div class="col-lg-3 pr">
                        <div class="header-logo row text-right">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url( $assets . 'images/logo.png' ); ?>" alt="<?php esc_attr_e( 'کالامارکت', 'kalamarket' ); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 pr">
                        <div class="header-search row text-right">
                            <div class="header-search-box">
                                <form class="form-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="search" class="header-search-input" name="s" placeholder="<?php esc_attr_e( 'نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…', 'kalamarket' ); ?>" value="<?php echo get_search_query(); ?>">
                                    <div class="action-btns">
                                        <button class="btn btn-search" type="submit">
                                            <img src="<?php echo esc_url( $assets . 'images/search.png' ); ?>" alt="search">
                                        </button>
                                        <div class="search-filter">
                                            <div class="form-ui">
                                                <div class="custom-select-ui">
                                                    <?php
                                                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Safe output from wp_dropdown_categories.
                                                    echo $search_dropdown;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="search-result">
                                    <div class="localSearchSimple"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-0 col-xs-12 pl">
                <div class="header-left">
                    <div class="header-account text-left">
                        <div class="d-block">
                            <div class="account-box">
                                <div class="nav-account d-block pl">
                                    <span class="title-account"><?php esc_html_e( 'حساب کاربری', 'kalamarket' ); ?></span>
                                    <span class="icon-account">
                                        <i class="mdi mdi-account-circle"></i>
                                    </span>
                                    <div class="dropdown-menu">
                                        <ul class="account-uls mb-0">
                                            <?php if ( is_user_logged_in() ) : ?>
                                                <?php
                                                $user_id          = get_current_user_id();
                                                $account_dashboard = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : get_edit_user_link( $user_id );
                                                $orders_link      = function_exists( 'wc_get_account_endpoint_url' ) ? wc_get_account_endpoint_url( 'orders' ) : admin_url( 'edit.php' );
                                                ?>
                                                <li class="account-item"><a href="<?php echo esc_url( $account_dashboard ); ?>" class="account-link"><?php esc_html_e( 'پنل کاربری', 'kalamarket' ); ?></a></li>
                                                <li class="account-item"><a href="<?php echo esc_url( $orders_link ); ?>" class="account-link"><?php esc_html_e( 'سفارشات من', 'kalamarket' ); ?></a></li>
                                                <li class="account-item"><a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="account-link"><?php esc_html_e( 'خروج', 'kalamarket' ); ?></a></li>
                                            <?php else : ?>
                                                <li class="account-item"><a href="<?php echo esc_url( wp_login_url() ); ?>" class="account-link"><?php esc_html_e( 'ورود', 'kalamarket' ); ?></a></li>
                                                <li class="account-item"><a href="<?php echo esc_url( wp_registration_url() ); ?>" class="account-link"><?php esc_html_e( 'ثبت نام', 'kalamarket' ); ?></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <nav class="header-main-nav">
            <div class="d-block">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'menu-ul mega-menu-level-one',
                        'walker'         => class_exists( 'KalaMarket_Mega_Menu_Walker' ) ? new KalaMarket_Mega_Menu_Walker() : null,
                    )
                );
                ?>
            </div>
        </nav>
    </div>
</header>
<!-- header-------------------------------->

<div class="front-page-content">
    <?php
    while ( have_posts() ) {
        the_post();
        the_content();
    }

    get_template_part( 'template-parts/frontpage/slider' );
    get_template_part( 'template-parts/frontpage/product-amazing' );
    get_template_part( 'template-parts/frontpage/adplacement-row' );
    get_template_part( 'template-parts/frontpage/product-carousel', null, array(
        'title'    => __( 'دوربین', 'kalamarket' ),
        'products' => array(
            array(
                'image'     => 'slider-product/camera-canon-4000D.jpg',
                'title'     => 'دوربین دیجیتال کانن مدل EOS 4000D به همراه لنز 18-55 میلی متر IS II',
                'old_price' => '۱۲,۰۰۰,۰۰۰',
                'new_price' => '۱۰,۵۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/camera-samsung.jpg',
                'title'     => 'دوربین دیجیتال سامسونگ مدل ST150F',
                'old_price' => '۳,۲۰۰,۰۰۰',
                'new_price' => '۲,۵۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/camera-nikon-3500D.jpg',
                'title'     => 'دوربین دیجیتال نیکون مدل D3500 به همراه لنز 18-55 میلی متر VR AF-P',
                'old_price' => '۳,۵۰۰,۰۰۰',
                'new_price' => '۲,۰۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/camera-instax-mini-70.jpg',
                'title'     => 'دوربین عکاسی چاپ سریع فوجی فیلم مدل Instax mini 70',
                'old_price' => '۶,۵۰۰,۰۰۰',
                'new_price' => '۴,۲۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/camera-nikon.jpg',
                'title'     => 'دوربین دیجیتال بدون آینه نیکون مدل Z6 به همراه لنز 24-70 میلی متر f/4 S',
                'old_price' => '۷,۵۰۰,۰۰۰',
                'new_price' => '۶,۰۰۰,۰۰۰',
            ),
        ),
    ) );
    get_template_part( 'template-parts/frontpage/slider-moment' );
    get_template_part( 'template-parts/frontpage/product-carousel', null, array(
        'title'         => __( 'گوشی موبایل', 'kalamarket' ),
        'wrapper_class' => 'col-lg-12 col-md-12 col-xs-12 pr order-1 d-block',
        'products'      => array(
            array(
                'image'     => 'slider-product/Samsung-S10Plus.jpg',
                'title'     => 'سامسونگ گلکسی اس 10 پلاس – 128 گیگابایت – دو سیم کارت',
                'old_price' => '۱۲,۰۰۰,۰۰۰',
                'new_price' => '۱۰,۵۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/huawei-p-smart.jpg',
                'title'     => 'هوآوی مدل P Smart 2019 دو سیم کارت ظرفیت 64 گیگابایت',
                'old_price' => '۳,۲۰۰,۰۰۰',
                'new_price' => '۲,۵۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/iphone-xs-max-space.jpg',
                'title'     => 'اپل آیفون ایکس اس مکس – 256 گیگابایت – دو سیم کارت',
                'old_price' => '۳,۵۰۰,۰۰۰',
                'new_price' => '۲,۰۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/honer.jpg',
                'title'     => 'هواوی هانر ویوو 20 – 256 گیگابایت – دو سیم کارت',
                'old_price' => '۶,۵۰۰,۰۰۰',
                'new_price' => '۴,۲۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/huawei.jpg',
                'title'     => 'هواوی پی 20 پرو 128 گیگابایت – دو سیم کارت',
                'old_price' => '۷,۵۰۰,۰۰۰',
                'new_price' => '۶,۰۰۰,۰۰۰',
            ),
        ),
    ) );
    get_template_part( 'template-parts/frontpage/product-carousel', null, array(
        'title'         => __( 'لوازم خانگی', 'kalamarket' ),
        'wrapper_class' => 'col-lg-12 col-md-12 col-xs-12 pr order-1 d-block',
        'products'      => array(
            array(
                'image'     => 'slider-product/Stove-lopez.jpg',
                'title'     => 'اجاق گاز طرح فر لوپز مدل 10000S',
                'old_price' => '۱۲,۰۰۰,۰۰۰',
                'new_price' => '۱۰,۵۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/SWF-40R.jpg',
                'title'     => 'آون توستر سان ورد مدل SWF-40R',
                'old_price' => '۳,۲۰۰,۰۰۰',
                'new_price' => '۲,۵۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/ECM2013.jpg',
                'title'     => 'اسپرسوساز مباشی مدل ECM2013',
                'old_price' => '۳,۵۰۰,۰۰۰',
                'new_price' => '۲,۰۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/DNR 290T-366T.jpg',
                'title'     => 'یخچال و فریزر دو قلوی دونار مدل DNR 290T-366T',
                'old_price' => '۶,۵۰۰,۰۰۰',
                'new_price' => '۴,۲۰۰,۰۰۰',
            ),
            array(
                'image'     => 'slider-product/Avocado.jpg',
                'title'     => 'آب میوه گیری پارس خزر مدل Avocado',
                'old_price' => '۷,۵۰۰,۰۰۰',
                'new_price' => '۶,۰۰۰,۰۰۰',
            ),
        ),
    ) );
    get_template_part( 'template-parts/frontpage/brand-slider' );
    // get_template_part( 'template-parts/frontpage/features' );
    // get_template_part( 'template-parts/frontpage/product-tabs' );
    // get_template_part( 'template-parts/frontpage/blog' );
    ?>
</div>

<?php
get_template_part( 'template-parts/frontpage/footer' );
get_footer();
