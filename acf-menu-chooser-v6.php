<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class acf_field_menu_chooser extends acf_field {


	/*
	*  initialize
	*
	*  This function will setup the field type data.
	*  ACF 6 uses initialize() instead of __construct().
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	6.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/

	public $supports = array(
		'escaping_html' => true,
	);

	function initialize() {

		$this->name     = 'menu-chooser';
		$this->label    = __( 'Menu Chooser', 'acf-menu-chooser' );
		$this->category = 'choice';
		$this->defaults = array(
			'allow_null' => 0,
		);
		$this->l10n     = array(
			'error' => __( 'Error! Please enter a higher value', 'acf-menu-chooser' ),
		);

	}


	/*
	*  render_field_general_settings()
	*
	*  Creates field settings in the General tab (ACF 6 tabbed UI).
	*/

	function render_field_general_settings( $field ) {

		acf_render_field_setting(
			$field,
			array(
				'label'        => __( 'Allow Null?', 'acf-menu-chooser' ),
				'instructions' => '',
				'name'         => 'allow_null',
				'type'         => 'true_false',
				'ui'           => 1,
			)
		);

	}


	/*
	*  render_field()
	*
	*  Creates the field input HTML.
	*/

	function render_field( $field ) {

		$field_value = $field['value'];

		$menus = wp_get_nav_menus();

		echo '<select name="' . esc_attr( $field['name'] ) . '" class="acf-menu-chooser">';

		if ( $field['allow_null'] ) {
			echo '<option value="">' . esc_html__( '- Select Menu -', 'acf-menu-chooser' ) . '</option>';
		}

		if ( ! empty( $menus ) ) {
			foreach ( $menus as $choice ) {
				echo '<option value="' . esc_attr( $choice->term_id ) . '" ' . selected( $field_value, $choice->term_id, false ) . '>' . esc_html( $choice->name ) . '</option>';
			}
		}

		echo '</select>';

	}


	/*
	*  format_value()
	*
	*  This filter is applied to the $value after it is loaded from the db and before it is returned to the template.
	*  ACF 6.2.5+ passes $escape_html to support safe HTML output.
	*
	*  @param	mixed	$value		the value found in the database
	*  @param	int	$post_id	the post ID the value was loaded from
	*  @param	array	$field		the field array holding all settings
	*  @param	bool	$escape_html	whether to escape the value for safe HTML output
	*  @return	mixed	$value		the modified value
	*/

	function format_value( $value, $post_id, $field, $escape_html = false ) {

		if ( empty( $value ) ) {
			return $value;
		}

		if ( $escape_html ) {
			return esc_html( $value );
		}

		return $value;

	}

}


// create field
new acf_field_menu_chooser();
