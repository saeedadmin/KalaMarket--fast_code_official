<?php
/**
 * Generic product carousel section for front page.
 *
 * @param array $args {
 *     Optional. Arguments for carousel section.
 *
 *     @type string $title            Section title.
 *     @type array  $products         List of products (image, title, old_price, new_price).
 *     @type string $wrapper_class    CSS classes for the column wrapper.
 *     @type string $widget_extra_cls Extra classes for widget card element.
 * }
 */

$default_products = array();

$args = wp_parse_args(
    $args,
    array(
        'title'            => __( 'محصولات', 'kalamarket' ),
        'products'         => $default_products,
        'wrapper_class'    => 'col-lg-9 col-md-9 col-xs-12 pr order-1 d-block',
        'widget_extra_cls' => '',
    )
);

if ( empty( $args['products'] ) ) {
    return;
}

$assets = kalamarket_template_asset_url( 'assets/' );
$wrapper_class = $args['wrapper_class'];
$widget_classes = trim( 'widget widget-product card ' . $args['widget_extra_cls'] );
?>

<!-- slider-product------------------------>
<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="slider-widget-products">
        <div class="<?php echo esc_attr( $widget_classes ); ?>">
            <header class="card-header">
                <span class="title-one"><?php echo esc_html( $args['title'] ); ?></span>
                <h3 class="card-title"></h3>
            </header>
            <div class="product-carousel owl-carousel owl-theme owl-rtl">
                <?php foreach ( $args['products'] as $product ) : ?>
                    <div class="item">
                        <a href="#" class="d-block hover-img-link" data-toggle="modal" data-target="#exampleModal">
                            <img src="<?php echo esc_url( $assets . 'images/' . $product['image'] ); ?>" class="img-fluid" alt="<?php echo esc_attr( $product['title'] ); ?>">
                            <span class="icon-view">
                                <strong><span><?php esc_html_e( 'مشاهده جزئیات', 'kalamarket' ); ?></span></strong>
                            </span>
                        </a>
                        <h2 class="post-title">
                            <a href="#"><?php echo esc_html( $product['title'] ); ?></a>
                        </h2>
                        <div class="price">
                            <del><span><?php echo esc_html( $product['old_price'] ); ?><span><?php esc_html_e( 'تومان', 'kalamarket' ); ?></span></span></del>
                            <ins><span><?php echo esc_html( $product['new_price'] ); ?><span><?php esc_html_e( 'تومان', 'kalamarket' ); ?></span></span></ins>
                        </div>
                        <div class="actions">
                            <ul>
                                <li class="action-item like">
                                    <button class="btn btn-light add-product-wishes" type="button">
                                        <i class="fa fa-heart-o"></i>
                                    </button>
                                </li>
                                <li class="action-item compare">
                                    <button class="btn btn-light btn-compare" type="button">
                                        <i class="fa fa-random"></i>
                                    </button>
                                </li>
                                <li class="action-item add-to-cart">
                                    <button class="btn btn-light btn-add-to-cart" type="button">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
