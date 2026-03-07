<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class acf_field_menu_chooser extends acf_field {


	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/

	function __construct() {

		$this->name = 'menu-chooser';

		$this->label = __( 'Menu Chooser', 'acf-menu-chooser' );

		$this->category = 'choice';

		$this->defaults = array();

		$this->l10n = array(
			'error' => __( 'Error! Please enter a higher value', 'acf-menu-chooser' ),
		);

		// do not delete!
		parent::__construct();

	}


	function render_field_settings( $field ) {

		// No settings for v5.

	}


	function render_field( $field ) {

		$field_value = $field['value'];

		$menus = wp_get_nav_menus();

		echo '<select name="' . esc_attr( $field['name'] ) . '" class="acf-menu-chooser">';

		if ( ! empty( $menus ) ) {
			foreach ( $menus as $choice ) {
				echo '<option value="' . esc_attr( $choice->term_id ) . '" ' . selected( $field_value, $choice->term_id, false ) . '>' . esc_html( $choice->name ) . '</option>';
			}
		}

		echo '</select>';

	}

}


// create field
new acf_field_menu_chooser();
