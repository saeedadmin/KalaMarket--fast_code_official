<?php
/**
 * KalaMarket theme functions and definitions
 */

define( 'KALAMARKET_VERSION', '0.1.0' );

function kalamarket_template_asset_url( $path ) {
    return trailingslashit( get_template_directory_uri() ) . 'template/' . ltrim( $path, '/' );
}

$walker_file = get_template_directory() . '/inc/class-kalamarket-mega-menu-walker.php';
if ( file_exists( $walker_file ) ) {
    require_once $walker_file;
}

add_action( 'after_setup_theme', 'kalamarket_setup' );
function kalamarket_setup() {
    load_theme_textdomain( 'kalamarket', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'kalamarket' ),
        )
    );
}

add_action( 'wp_enqueue_scripts', 'kalamarket_enqueue_assets' );
function kalamarket_enqueue_assets() {
    wp_enqueue_style( 'kalamarket-font-awesome', kalamarket_template_asset_url( 'assets/css/vendor/font-awesome.min.css' ), array(), '4.7.0' );
    wp_enqueue_style( 'kalamarket-material-icons', kalamarket_template_asset_url( 'assets/css/vendor/materialdesignicons.css' ), array(), KALAMARKET_VERSION );
    wp_enqueue_style( 'kalamarket-bootstrap', kalamarket_template_asset_url( 'assets/css/vendor/bootstrap.css' ), array(), '4.2.1' );
    wp_enqueue_style( 'kalamarket-owl-carousel', kalamarket_template_asset_url( 'assets/css/vendor/owl.carousel.min.css' ), array( 'kalamarket-bootstrap' ), '2.3.4' );
    wp_enqueue_style( 'kalamarket-nice-select', kalamarket_template_asset_url( 'assets/css/vendor/nice-select.css' ), array( 'kalamarket-bootstrap' ), '1.0.0' );
    wp_enqueue_style( 'kalamarket-jqzoom', kalamarket_template_asset_url( 'assets/css/vendor/jquery.jqZoom.css' ), array( 'kalamarket-bootstrap' ), KALAMARKET_VERSION );
    wp_enqueue_style( 'kalamarket-sweetalert', kalamarket_template_asset_url( 'assets/css/vendor/sweetalert2.min.css' ), array(), '11.0.0' );
    wp_enqueue_style( 'kalamarket-main-style', kalamarket_template_asset_url( 'assets/css/main.css' ), array( 'kalamarket-font-awesome', 'kalamarket-material-icons', 'kalamarket-bootstrap' ), KALAMARKET_VERSION );
    wp_enqueue_style( 'kalamarket-responsive-style', kalamarket_template_asset_url( 'assets/css/responsive.css' ), array( 'kalamarket-main-style' ), KALAMARKET_VERSION );

    wp_enqueue_script( 'kalamarket-bootstrap-js', kalamarket_template_asset_url( 'assets/js/vendor/bootstrap.js' ), array( 'jquery' ), '4.2.1', true );
    wp_enqueue_script( 'kalamarket-owl-carousel-js', kalamarket_template_asset_url( 'assets/js/vendor/owl.carousel.min.js' ), array( 'jquery' ), '2.3.4', true );
    wp_enqueue_script( 'kalamarket-countdown-js', kalamarket_template_asset_url( 'assets/js/vendor/jquery.countdown.js' ), array( 'jquery' ), KALAMARKET_VERSION, true );
    wp_enqueue_script( 'kalamarket-nice-select-js', kalamarket_template_asset_url( 'assets/js/vendor/jquery.nice-select.min.js' ), array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'kalamarket-jqzoom-js', kalamarket_template_asset_url( 'assets/js/vendor/jquery.jqZoom.js' ), array( 'jquery' ), KALAMARKET_VERSION, true );
    wp_enqueue_script( 'kalamarket-sweetalert-js', kalamarket_template_asset_url( 'assets/js/vendor/sweetalert2.all.min.js' ), array(), '11.0.0', true );
    wp_enqueue_script( 'kalamarket-main-js', kalamarket_template_asset_url( 'assets/js/main.js' ), array( 'jquery', 'kalamarket-owl-carousel-js', 'kalamarket-nice-select-js' ), KALAMARKET_VERSION, true );
}
