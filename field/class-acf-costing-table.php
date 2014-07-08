<?php
/**
 * ACF Costing Table field
 *
 * @package   ACF Costing Table
 * @author    nekojira <fulvio@nekojira.com>
 * @license   GPL-2.0+
 * @link      https://github.com/nekojira/acf-costing-table/
 * @copyright 2014 nekojira
 */

/**
 * Class ACF Costing Table
 * Creates a costing table ACF field
 *
 * @since 1.0.0
 */
class ACF_Costing_Table extends acf_field {

	/**
	 * Setup field data
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// field name
		$this->name = 'costing_table';
		$this->label = __( 'Costing table', 'acf-costing_table' );
		// field type
		$this->category = 'jquery';
		// default settings
		$this->defaults = array();

		// do not delete!
		parent::__construct();

	}

	/**
	 * Field settings
	 * Creates extra settings for the field, when editing a new field
	 *
	 * @param	array	$field	the field
	 *
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	function render_field_settings( $field ) {

		// currently no options are offered

	}

	/**
	 * Render the field HTML
	 * Creates the HTML interface of the field
	 *
	 * @param	array	$field	the field
	 *
	 * @since 	1.0.0
	 *
	 * @return void
	 */
	function render_field( $field ) {

		require_once 'includes/acf-costing-table-html.php';

	}

	/**
	 * Add CSS and Javascripts when render_field() is called
	 * This action is called in the admin_enqueue_scripts action on the edit screen where the field is created.
	 *
	 * @since	1.0.0
	 *
	 * @return void
	 */
	function input_admin_enqueue_scripts() {

		$dir = plugin_dir_url( __FILE__ );

		// register & include JS
		wp_register_script( 'acf-input-costing_table', "{$dir}assets/js/min/input.min.js" );
		wp_enqueue_script('acf-input-costing_table');

		// register & include CSS
		wp_register_style( 'acf-input-costing_table', "{$dir}assets/css/min/input.css" );
		wp_enqueue_style('acf-input-costing_table');

	}

	/**
	 * Format value
	 *
	 * This filter is applied to the $value after it is loaded from the db and before it is returned to the template
	 *
	 * @param	mixed	$value		the field value
	 * @param 	int		$post_id	post to which the field is attached
	 * @param 	object	$field		the field
	 *
	 * @return	array	will return an array with the costing table totals
	 */
	function format_value( $value, $post_id, $field ) {

		// bail early if no value
		if( empty($value) ) {

			return $value;

		}

		$data =  json_decode( $value );
		$totals = isset( $data->finals ) ? $data->finals : '';

		return (array) $totals;
	}

}

// create field
new ACF_Costing_Table();