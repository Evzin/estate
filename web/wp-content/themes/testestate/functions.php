<?php
/**
 * Theme functions main file.
 *
 * @package TestEstate\Core
 */

define( 'THEME_DIR', get_stylesheet_directory() );
define( 'THEME_URL', get_stylesheet_directory_uri() );

require_once THEME_DIR . '/core/classes/class-core.php';

/**
 * Returns instance of theme's main class.
 *
 * @return TestEstate
 */
function TE() { //phpcs:ignore
	return \TestEstate\Core::instance();
}
TE();
