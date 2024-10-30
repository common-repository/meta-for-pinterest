<?php
/**
 * Plugin Name: MetaPin
 * Description: Adds HTML5 data fields containing metadata for pinterest when a user pins an images
 * Author: Ilektronx
 * Author URI: socialau.com
 * Version: 1.0.2
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: meta-for-pinterest
 * Domain Path: /languages/
 *
 * @package meta-for-pinterest
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// This is for the Gutenberg block editor
add_action( 'enqueue_block_editor_assets', 'meta_for_pinterest_assets' );

function meta_for_pinterest_assets() {
    // Enqueue our script
    wp_enqueue_script(
        'meta-for-pinterest-js',
        esc_url( plugins_url( '/dist/meta-for-pinterest.js', __FILE__ ) ),
        array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
        '1.0.0',
        true // Enqueue the script in the footer.
    );
}

// This is for the classic editor
if ( is_admin() ) {
    // we are in admin mode
    require_once( dirname( __FILE__ ) . '/admin/meta-for-pinterest-admin.php' );
}
