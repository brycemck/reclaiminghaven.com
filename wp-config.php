<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bitnami_wordpress');

/** MySQL database username */
define('DB_USER', 'bn_wordpress');

/** MySQL database password */
define('DB_PASSWORD', '587684a3b5');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '4f11c20ae8ce9fc250648badcb7405b94f9a9fc240950a49d8f03dc10a89e096');
define('SECURE_AUTH_KEY', 'e0acde2f53130d870abb716f4e1fcae26041573f5ebeab2fb1e1737f54e84088');
define('LOGGED_IN_KEY', '2aa1936686701a32a481ba0104fb6b55ae01778f5e422612217974a6cdaa6e58');
define('NONCE_KEY', 'e6c21bcc3de0d0c025f6eba33aec26abf6244df14b07461749555b87aae22088');
define('AUTH_SALT', '3e9f339578578e79958081cb62adf16a892c414fbbf8f1df58723a6048189feb');
define('SECURE_AUTH_SALT', '7faf03b44a1b266d5723635cc618b5860f4a5dc7b92ee1b997dcc16eac2f0c74');
define('LOGGED_IN_SALT', '5335e2bb4a9ec7f609e3b4e9b41fe26ed9ad8ef498a38396e6172aaccde7cd74');
define('NONCE_SALT', '33cc2817d428677a4b9441016be9771787c9f3665e82a386869cc89b4464bea7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

define('WP_SITEURL', 'http://reclaiminghaven.com/');
define('WP_HOME', 'http://reclaiminghaven.com/');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/wordpress/tmp');


define('FS_METHOD', 'ftpext');
define('FTP_BASE', '/opt/bitnami/apps/wordpress/htdocs/');
define('FTP_USER', 'bitnamiftp');
define('FTP_PASS', 'nsWiSXRmgkM0vx1lQPyU6AcKNyjw4VrwSTg6fhLkSSb9kf8krY');
define('FTP_HOST', '127.0.0.1');
define('FTP_SSL', false);



//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://wiki.bitnami.com/Applications/Bitnami_Wordpress#XMLRPC_and_Pingback

// remove x-pingback HTTP header
add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
// disable pingbacks
add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
});
