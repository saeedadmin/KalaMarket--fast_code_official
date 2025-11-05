<?php
/**
 * Main template file
 */

global $wp_query;
get_header();

if ( have_posts() ) :
    if ( is_home() && ! is_front_page() ) {
        echo '<header class="page-header"><h1 class="page-title">' . esc_html( get_the_title( get_option( 'page_for_posts', true ) ) ) . '</h1></header>';
    }

    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content', get_post_type() );
    endwhile;

    the_posts_navigation();
else :
    get_template_part( 'template-parts/content', 'none' );
endif;

get_footer();
