<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 */
class GW2_Embeddings_Activator {

	private static $required_php;
	private static $required_wp;

	/**
	 * Plugin activation.
	 */
	public static function activate() {

		self::$required_php = '5.3';
		self::$required_wp  = '4.5';

		self::check_php_version();
		self::check_wp_version();
		self::setup_defaults();

	}

	/**
	 * Check PHP version.
	 */
	private static function check_php_version() {

		$current = phpversion();

		if ( version_compare( $current, self::$required_php, '>=' ) ) {
			return;
		}

		$message = sprintf(
			// Translators: %1$s - required version number, %2$s - current version number
			__( 'GW2 Embeddings is not activated, because it requires PHP version %1$s (or higher). You have version %2$s.', 'gw2-embeddings' ),
			self::$required_php,
			$current
		);

		die( esc_html( $message ) );

	}

	/**
	 * Check WordPress version.
	 */
	private static function check_wp_version() {

		$current = get_bloginfo( 'version' );

		if ( version_compare( $current, self::$required_wp, '>=' ) ) {
			return;
		}

		$message = sprintf(
			// Translators: %1$s - required version number, %2$s - current version number
			__( 'GW2 Embeddings is not activated, because it requires WordPress version %1$s (or higher). You have version %2$s.', 'gw2-embeddings' ),
			self::$required_wp,
			$current
		);

		die( esc_html( $message ) );

	}

}
