<?php

class Smilepure_Walker_Nav_Menu extends Walker_Nav_Menu {

	private $mega_menu = false;

	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent          = '';
		$this->mega_menu = false;
		if ( $depth ) {
			$indent = str_repeat( "\t", $depth );
		}

		$classes = array();
		if ( ! empty( $item->classes ) ) {
			$classes = (array) $item->classes;
		}

		$classes[] = 'menu-item-' . $item->ID;

		$post_args = array(
			'post_type'   => 'nav_menu_item',
			'nopaging'    => true,
			'numberposts' => 1,
			'meta_key'    => '_menu_item_menu_item_parent',
			'meta_value'  => $item->ID,
		);

		if ( $item->menu_item_parent === '0' ) {
			$classes[] = 'level-1';
		}

		$children = get_posts( $post_args );

		foreach ( $children as $child ) {
			$obj = get_post_meta( $child->ID, '_menu_item_object' );
			if ( $obj[0] === 'ic_mega_menu' ) {
				$classes[]       = apply_filters( 'insight_core_mega_menu_css_class', 'has-mega-menu', $item, $args, $depth );
				$this->mega_menu = true;
			}
		}

		if ( isset( $item->image_hover ) && $item->image_hover !== '' ) {
			$classes[] = ' has-image-hover';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				if ( $attr === 'href' ) {
					$value = esc_url( $value );
				} else {
					$value = esc_attr( $value );
				}
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '><div class="menu-item-wrap">';
		$item_output .= '<span class="menu-item-title">' . $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after . '</span>';
		if ( isset( $item->feature ) && $item->feature === '1' ) {
			$item_output .= '<span class="menu-item-feature"></span>';
		}

		if ( isset( $item->image_hover ) && $item->image_hover !== '' ) {
			$item_output .= '<div class="menu-item-image_hover"><img src="' . esc_url( $item->image_hover_url ) . '" width="150" height="150" alt="' . esc_attr__( 'Item image hover', 'smilepure' ) . '"></div>';
		}

		if ( $args->has_children ) {
			$item_output .= '<span class="toggle-sub-menu"> </span>';
		}
		$item_output .= '</div></a>';
		$item_output .= $args->after;

		if ( $item->object === 'ic_mega_menu' ) {
			$menu_post               = get_post( $item->object_id );

			// remove wp auto p.
			$_content = $menu_post->post_content;
			$_content = trim( $_content );
			$_content = ltrim( $_content, "<p>" );
			$_content = rtrim( $_content, "</p>" );

			$mega_menu_content_class = apply_filters( 'insight_core_mega_menu_content_css_class', 'mega-menu-content', $item, $args, $depth );
			$output .= '<div><div class="' . esc_attr( $mega_menu_content_class ) . '"><div class="container"><div class="row"><div class="col-md-12">' . do_shortcode( $_content ) . '</div></div></div></div></div>';
		} else {
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$class = 'sub-menu';

		if ( $this->mega_menu ) {
			$class .= ' mega-menu';
		}

		$indent = str_repeat( "\t", $depth );
		$output .= $indent . '<ul class="' . $class . '">';
	}
}
