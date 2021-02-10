<?php
/**
 * Core class.
 *
 * @package TestEstate\Core
 */

namespace TestEstate;

use TestEstate\Content\Estate;

/**
 * Core class implementation.
 */
final class Core {

	/**
	 * Base path for classes within package.
	 *
	 * @var [type]
	 */
	public static $classes_base_path;

	/**
	 * Core class instance (singleton).
	 *
	 * @var Core
	 */
	protected static $instance = null;

	/**
	 * Theme class instance
	 *
	 * @var Setup_Theme
	 */
	public $theme;

	/**
	 * Real Estate CPT handling class instance.
	 *
	 * @var Estate
	 */
	public $estate;

	/**
	 * Constructor. Initializes class autoloading.
	 */
	public function __construct() {

		self::$classes_base_path = untrailingslashit( dirname( __FILE__ ) );
		spl_autoload_register( __CLASS__ . '::autoload' );

		$this->theme = new Setup_Theme();
		$this->estate = new Content\Estate();
	}

	/**
	 * Get class instance. Ensure there can be only one.
	 *
	 * @return Core
	 */
	public static function instance() : Core {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Autoload handler.
	 *
	 * @param string $class_name - name of the class to load.
	 * @return void
	 */
	public static function autoload( $class_name ) {

		if ( 0 !== strpos( $class_name, __NAMESPACE__ ) ) {
			return;
		}

		$class_name = str_replace( __NAMESPACE__ . '\\', '', $class_name );
		$class = explode( '\\', $class_name );
		$class_file = 'class-' . str_replace( '_', '-', strtolower( array_pop( $class ) ) ) . '.php';
		$class_path = self::$classes_base_path . DIRECTORY_SEPARATOR . implode( DIRECTORY_SEPARATOR, $class );

		require_once $class_path . DIRECTORY_SEPARATOR . $class_file;
	}

	/**
	 * Cloning is forbidden.
	 */
	public function __clone() {}

	/**
	 * Unserializing instanse is forbidden.
	 */
	public function __wakeup() {}
}
