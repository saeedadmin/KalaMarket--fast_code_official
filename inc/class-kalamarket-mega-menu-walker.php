<?php
/**
 * Custom walker to render mega menu markup.
 */

if ( ! class_exists( 'KalaMarket_Mega_Menu_Walker' ) ) {
    class KalaMarket_Mega_Menu_Walker extends Walker_Nav_Menu {

        public function start_lvl( &$output, $depth = 0, $args = null ) {
            $indent      = str_repeat( "\t", $depth );
            $classes     = array( 'sub-menu' );
            if ( 0 === $depth ) {
                $classes[] = 'is-mega-menu';
                $classes[] = 'mega-menu-level-two';
            } elseif ( 1 === $depth ) {
                $classes[] = 'mega-menu-level-three';
            } else {
                $classes[] = 'sub-menu-depth-' . ( $depth + 1 );
            }

            $class_names = implode( ' ', array_map( 'sanitize_html_class', $classes ) );
            $output     .= "\n{$indent}<ul class=\"{$class_names}\">\n";
        }

        public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
            $indent  = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;

            $classes[] = 'menu-item-depth-' . $depth;

            if ( 0 === $depth ) {
                $classes[] = 'menu-item';
                if ( in_array( 'menu-item-has-children', $classes, true ) ) {
                    $classes[] = 'nav-overlay';
                }
            } elseif ( 1 === $depth ) {
                $classes[] = 'menu-mega-item';
                $classes[] = 'menu-item-type-mega-menu';
            } else {
                $classes[] = 'menu-mega-item-three';
            }

            $classes     = array_unique( $classes );
            $class_names = implode( ' ', array_map( 'sanitize_html_class', $classes ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $output .= $indent . '<li' . $class_names . '>';

            $atts           = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target ) ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
            $atts['href']   = ! empty( $item->url ) ? $item->url : '';

            $anchor_classes = array();
            if ( 0 === $depth ) {
                $anchor_classes[] = 'current-link-menu';
            } elseif ( 1 === $depth ) {
                $anchor_classes[] = 'mega-menu-link';
            }

            if ( ! empty( $anchor_classes ) ) {
                $atts['class'] = implode( ' ', $anchor_classes );
            }

            $atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( empty( $value ) ) {
                    continue;
                }
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }

            $title = apply_filters( 'the_title', $item->title, $item->ID );
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

            if ( 0 === $depth && in_array( 'menu-item-has-children', $classes, true ) ) {
                $title .= ' <i class="fa fa-angle-down"></i>';
            }

            $item_output  = isset( $args->before ) ? $args->before : '';
            $item_output .= '<a' . $attributes . '>';
            $item_output .= isset( $args->link_before ) ? $args->link_before : '';
            $item_output .= $title;
            $item_output .= isset( $args->link_after ) ? $args->link_after : '';
            $item_output .= '</a>';
            $item_output .= isset( $args->after ) ? $args->after : '';

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        public function end_el( &$output, $item, $depth = 0, $args = null ) {
            $output .= "</li>\n";
        }
    }
}
