<?php
/**
 * Advanced Custom Fields - Costing Table field
 *
 * A WordPress plugin to extend Advanced Custom Fields 5 with a new field type meant for tabular costing data calculations.
 *
 * @package   ACF Costing Table
 * @author    nekojira <fulvio@nekojira.com>
 * @license   GPL-2.0+
 * @link      https://github.com/nekojira/acf-costing-table
 * @copyright 2014 nekojira
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Custom Fields: Costing Table field
 * Plugin URI:        https://github.com/nekojira/acf-costing-table
 * Description:       Costing Table field for Advanced Custom Fields 5.
 * Version:           1.0
 * Author:            nekojira
 * Author URI:        https://github.com/nekojira/
 * Text Domain:       acf-costing_table
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: https://github.com/nekojira/acf-costing-table
 */

// abort if file is called directly
if ( ! defined( 'WPINC' ) )
	die;

// set plugin text domain
load_plugin_textdomain( 'acf-costing-table', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );

// plug into ACF5
add_action('acf/include_field_types', function() { require_once 'field/class-acf-costing-table.php'; } );


function my_the_content_filter($content) {
	// assuming you have created a page/post entitled 'debug'
	    $test = get_field( 'calculator', 133 );

		print_r( $test );
}

add_filter( 'wp_footer', 'my_the_content_filter' );