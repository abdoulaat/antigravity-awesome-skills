<?php
/**
 * La Poste Sénégal — Custom Nav Walker
 * Generates clean nav links compatible with lp-nav__links styles
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Laposte_Nav_Walker extends Walker_Nav_Menu {

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;

        $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
        $is_active = in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes );

        $url    = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
        $title  = apply_filters( 'the_title', $item->title, $item->ID );
        $target = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $rel    = ( $item->target === '_blank' ) ? ' rel="noopener noreferrer"' : '';

        $active_class = $is_active ? ' aria-current="page"' : '';

        $output .= '<a href="' . $url . '"' . $target . $rel . $active_class . '>' . esc_html( $title ) . '</a>';
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}
}
