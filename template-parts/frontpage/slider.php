<?php
/**
 * Front page slider section.
 */

$assets = kalamarket_template_asset_url( 'assets/' );

$slides = array(
    'slider-main/sm-1.jpg',
    'slider-main/sm-2.jpg',
    'slider-main/sm-3.jpg',
    'slider-main/sm-4.jpg',
    'slider-main/sm-5.jpg',
);

if ( empty( $slides ) ) {
    return;
}
?>

<!-- slider-main--------------------------->
<div class="container-main">
    <div class="d-block">
        <div id="stories" class="storiesWrapper"></div>
        <div class="col-lg-8 col-xs-12 pr">
            <div class="slider-main-container d-block">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ( $slides as $index => $slide ) : ?>
                            <div class="carousel-item<?php echo 0 === $index ? ' active' : ''; ?>">
                                <img src="<?php echo esc_url( $assets . 'images/' . $slide ); ?>" class="d-block w-100" alt="<?php printf( esc_attr__( 'Slide %1$d', 'kalamarket' ), $index + 1 ); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only"><?php esc_html_e( 'Previous', 'kalamarket' ); ?></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only"><?php esc_html_e( 'Next', 'kalamarket' ); ?></span>
                    </a>
                </div>
            </div>
        </div>
        <?php get_template_part( 'template-parts/frontpage/adplacement' ); ?>
    </div>
</div>
