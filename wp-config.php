<?php
/**
 * The base configuration for WordPress
 */

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Authentication Unique Keys and Salts. */
define( 'AUTH_KEY', 'xuKMrsxqTemszAQogvZkRxERefWBdrqUfTgnZusUXCHcQkPOJkLhpLgWLBTtMVcu' );
define( 'SECURE_AUTH_KEY', 'cHGsFgyYHNDnHtpzXKtEdltVWGnZuWzbZnCvMudmBChfOdAPyPIoJDWahXRxIkvg' );
define( 'LOGGED_IN_KEY', 'sFYJSBoVROFHXDoRbvRQxZWqNsShbanHtHwnFxSuAKFooXhwfhdcAruVZnDhvfho' );
define( 'NONCE_KEY', 'idzsafJHhGDjuBccibVfqAmZTIAvMgxQkGynWTKpSJrkQMLEhuaSCYTIovVDzpDy' );
define( 'AUTH_SALT', 'lftnzdrTsWEOlsxbTvTCtUOcRqAJCphzEheluehqwTLvRJdaZqBQaKqAdRSvuOuT' );
define( 'SECURE_AUTH_SALT', 'kHtwZSuWVqxZjsboSizxvZtPLawBIjRDeXQEbKffUvhHBhhFVOjeCQedkcABwCET' );
define( 'LOGGED_IN_SALT', 'EvvckzaRdnuLwTAmAIxaSFRRfXWDWuxHdSnAZFGWzXdRDqAtbNHpfpTkynvHsNKW' );
define( 'NONCE_SALT', 'fNFsqoAVpNZAqCoIEKkDuRzGmXMUsmtcrAGvGHmTdmYQPuvcfOEyQLREJrBTPETd' );

/**
 * Cloudways Production Database Settings
 * These settings will be used when NOT running on DDEV.
 */
if ( getenv( 'IS_DDEV_PROJECT' ) !== 'true' ) {
    /** The name of the database for WordPress on Cloudways */
    define( 'DB_NAME', 'vhbswphgem' );

    /** MySQL database username on Cloudways */
    define( 'DB_USER', 'vhbswphgem' );

    /** MySQL database password on Cloudways */
    define( 'DB_PASSWORD', 'Q26F3hR88m' );

    /** MySQL hostname on Cloudways - usually localhost */
    define( 'DB_HOST', 'localhost' );

    // Redis Configuration for Cloudways
    define( 'WP_REDIS_CONFIG', [
        'host' => '127.0.0.1',
        'port' => 6379,
    ] );
}

/**
 * WordPress Database Table prefix.
 */
$table_prefix = 'wp_';

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
defined( 'ABSPATH' ) || define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/**
 * DDEV Local Settings
 * This block loads local credentials from wp-config-ddev.php when on DDEV.
 */
$ddev_settings = __DIR__ . '/wp-config-ddev.php';
if ( ! defined( 'DB_USER' ) && getenv( 'IS_DDEV_PROJECT' ) == 'true' && is_readable( $ddev_settings ) ) {
    require_once( $ddev_settings );

    // Redis Configuration for DDEV (Standard DDEV Redis service)
    if (!defined('WP_REDIS_CONFIG')) {
        define( 'WP_REDIS_CONFIG', [
            'host' => 'redis',
            'port' => 6379,
        ] );
    }
}

/** Include wp-settings.php */
if ( file_exists( ABSPATH . '/wp-settings.php' ) ) {
	require_once ABSPATH . '/wp-settings.php';
}