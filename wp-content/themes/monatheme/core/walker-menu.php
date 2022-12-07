<?php

class Mona_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class='child submenu'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$object      = $item->object;
		$type        = $item->type;
		$title       = $item->title;
		$description = $item->description;
		$permalink   = $item->url;

		if ( $depth == 0 ) {
			$output .= "<li class='menu-item parent fz16 fw6 " . implode( " ", $item->classes ) . "'>";
		} else {
			$output .= "<li class='menu-item child submenu-item dropdown parent" . implode( " ", $item->classes ) . "'>";

		}


		//Add SPAN if no Permalink
		if ( $permalink && $permalink != '#' ) {
			$output .= '<a class="menu-link" href="' . $permalink . '">';
		} else {
			$output .= '<a class="menu-link" href="javascript:;">';
		}

		$output .= $title;

		if ( $permalink && $permalink != '#' ) {
			if ( $args->walker->has_children ) {
				$output .= '<span class="dropdown-icon">
                          <iconify-icon icon="charm:chevron-down"></iconify-icon>
                        </span>';
			}
			$output .= '</a>';
		} else {
			if ( $args->walker->has_children ) {
				$output .= '<span class="dropdown-icon">
                          <iconify-icon icon="charm:chevron-down"></iconify-icon>
                        </span>';
			}
			$output .= '</a>';
		}


	}

}

class Mona_Walker_Main_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class='child submenu'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$object      = $item->object;
		$type        = $item->type;
		$title       = $item->title;
		$description = $item->description;
		$permalink   = $item->url;

		if ( $depth == 0 ) {
			$output .= "<li class='menu-item parent fz16 fw6 menu-main__item" . implode( " ", $item->classes ) . "'>";
		} else {
			$output .= "<li class='menu-item child submenu-item dropdown parent menu-main__item" . implode( " ", $item->classes ) . "'>";

		}


		//Add SPAN if no Permalink
		if ( $permalink && $permalink != '#' ) {
			$output .= '<a class="menu-link menu-main__link" href="' . $permalink . '">';
		} else {
			$output .= '<a class="menu-link menu-main__link" href="javascript:;">';
		}

		$output .= $title;

		if ( $permalink && $permalink != '#' ) {
			if ( $args->walker->has_children ) {
				$output .= '<span class="dropdown-icon expand-icon">
                                  <iconify-icon icon="entypo:chevron-down"></iconify-icon>
                                </span>';
			}
			$output .= '</a>';
		} else {
			if ( $args->walker->has_children ) {
				$output .= '<span class="dropdown-icon expand-icon">
                                  <iconify-icon icon="entypo:chevron-down"></iconify-icon>
                                </span>';
			}
			$output .= '</a>';
		}


	}

}

class Mona_Walker_Sub_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class='menu-sub__list menu-list'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$object      = $item->object;
		$type        = $item->type;
		$title       = $item->title;
		$description = $item->description;
		$permalink   = $item->url;

		if ( $depth == 0 ) {
			$output .= "<li class='menu-item parent fz16 fw6 menu-sub__item" . implode( " ", $item->classes ) . "'>";
		} else {
			$output .= "<li class='menu-item child submenu-item dropdown parent menu-sub__item" . implode( " ", $item->classes ) . "'>";

		}


		//Add SPAN if no Permalink
		if ( $permalink && $permalink != '#' ) {
			$output .= '<a class="menu-link menu-sub__link" href="' . $permalink . '">';
		} else {
			$output .= '<a class="menu-link menu-sub__link" href="javascript:;">';
		}

		$output .= $title;

		if ( $permalink && $permalink != '#' ) {
			if ( $args->walker->has_children ) {
				$output .= '<span class="dropdown-icon expand-icon">
                                  <iconify-icon icon="entypo:chevron-down"></iconify-icon>
                                </span>';
			}
			$output .= '</a>';
		} else {
			if ( $args->walker->has_children ) {
				$output .= '<span class="dropdown-icon expand-icon">
                                  <iconify-icon icon="entypo:chevron-down"></iconify-icon>
                                </span>';
			}
			$output .= '</a>';
		}


	}

}